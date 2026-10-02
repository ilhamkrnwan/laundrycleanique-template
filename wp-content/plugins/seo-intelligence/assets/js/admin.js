/**
 * SEO Intelligence — Interactive Admin Dashboard & Crawler Controller
 */
(function ($) {
    'use strict';

    const config = window.SeoIntelligenceConfig || {};
    const restUrl = config.restUrl || '/wp-json/seo-intelligence/v1/';
    const nonce = config.nonce || '';

    // Active findings storage for client-side filtering
    let currentFindings = [];

    // Crawler State
    let crawlerState = {
        isRunning: false,
        isPaused: false,
        isCancelled: false,
        auditId: 0,
        queue: [],
        currentIndex: 0,
        totalItems: 0,
        scoresSum: 0,
        criticalSum: 0,
        warningSum: 0,
        startTime: null,
    };

    $(document).ready(function () {
        initPageAudit();
        initSiteCrawler();
        initSettingsWeights();
        checkPreloadedAudit();
    });

    /**
     * Check if page was loaded with existing audit_page_id
     */
    function checkPreloadedAudit() {
        const urlParams = new URLSearchParams(window.location.search);
        const auditPageId = urlParams.get('audit_page_id');
        const targetUrl = urlParams.get('target_url');

        if (auditPageId) {
            // Load findings for this page ID
            fetchFindings(auditPageId);
        } else if (targetUrl && $('#seoi-page-audit-form').length) {
            // Auto trigger audit if target_url query param is present
            $('#seoi-page-audit-form').trigger('submit');
        }
    }

    /**
     * Fetch findings for existing page audit
     */
    function fetchFindings(pageId) {
        $.ajax({
            url: restUrl + 'page/' + pageId,
            method: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', nonce);
            },
            success: function (res) {
                if (res.success && res.findings) {
                    currentFindings = res.findings;
                    renderFindings(currentFindings, 'all');
                    updateTabCounts(currentFindings);
                }
            }
        });
    }

    /**
     * Initialize Single Page Audit Form and Events
     */
    function initPageAudit() {
        const $form = $('#seoi-page-audit-form');
        const $selector = $('#seoi-page-selector');
        const $urlInput = $('#seoi-target-url');
        const $loading = $('#seoi-audit-loading');
        const $results = $('#seoi-audit-results');
        const $btn = $('#seoi-btn-run-audit');

        // Dropdown page selector handler
        $selector.on('change', function () {
            const val = $(this).val();
            if (val) {
                $urlInput.val(val);
            }
        });

        // Form Submit Handler
        $form.on('submit', function (e) {
            e.preventDefault();

            const url = $urlInput.val().trim();
            if (!url) return;

            $btn.prop('disabled', true).addClass('opacity-50');
            $loading.show();
            $results.hide();

            $.ajax({
                url: restUrl + 'analyze',
                method: 'POST',
                data: JSON.stringify({ url: url }),
                contentType: 'application/json',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', nonce);
                },
                success: function (res) {
                    $loading.hide();
                    $btn.prop('disabled', false).removeClass('opacity-50');

                    if (res.success && res.data) {
                        displayAuditResults(res.data, res.page_id);
                    } else {
                        alert(res.message || 'Analisis gagal dijalankan.');
                    }
                },
                error: function (xhr) {
                    $loading.hide();
                    $btn.prop('disabled', false).removeClass('opacity-50');
                    const err = xhr.responseJSON ? xhr.responseJSON.message : 'Terjadi kendala jaringan.';
                    alert('Error: ' + err);
                }
            });
        });

        // Findings Severity Filter Tabs
        $('#seoi-findings-filter-tabs').on('click', '.seoi-tab', function () {
            $('#seoi-findings-filter-tabs .seoi-tab').removeClass('active');
            $(this).addClass('active');

            const severity = $(this).data('severity');
            renderFindings(currentFindings, severity);
        });
    }

    /**
     * Display Audit Results on Page
     */
    function displayAuditResults(data, pageId) {
        const scores = data.scores || {};
        const overall = scores.overall || 0;
        const results = data.results || {};
        currentFindings = data.all_findings || [];

        // Overall Score Gauge
        $('#seoi-result-overall-score').text(overall);
        $('#seoi-result-page-title').text(data.url);
        $('#seoi-result-page-url').attr('href', data.url).find('span').text(data.url);
        $('#seoi-result-duration').text(data.duration_seconds + 's');
        $('#seoi-result-http-status').text(data.http_status);

        // Counter Badges
        $('#seoi-count-critical').text(scores.critical_count || 0);
        $('#seoi-count-error').text(scores.error_count || 0);
        $('#seoi-count-warning').text(scores.warning_count || 0);

        // Categories Grid
        const $categories = $('#seoi-categories-container');
        $categories.empty();

        const categoryMeta = {
            'content': { icon: 'ri-file-text-line', label: 'Konten' },
            'readability': { icon: 'ri-book-open-line', label: 'Keterbacaan' },
            'headings': { icon: 'ri-heading', label: 'Heading' },
            'images': { icon: 'ri-image-line', label: 'Media & Alt' },
            'assets': { icon: 'ri-speed-line', label: 'Beban Aset' },
            'seo': { icon: 'ri-global-line', label: 'SEO Teknis' },
            'schema': { icon: 'ri-code-box-line', label: 'Schema' },
            'links': { icon: 'ri-links-line', label: 'Tautan' },
            'geo': { icon: 'ri-brain-line', label: 'GEO' },
            'aeo': { icon: 'ri-question-answer-line', label: 'AEO' },
            'ux': { icon: 'ri-smartphone-line', label: 'UX & Mobile' }
        };

        const catScores = scores.categories || {};
        for (const [catKey, catVal] of Object.entries(catScores)) {
            const score = (typeof catVal === 'object' && catVal !== null) ? catVal.score : catVal;
            const meta = categoryMeta[catKey] || { 
                icon: (typeof catVal === 'object' && catVal.icon) ? catVal.icon : 'ri-check-line', 
                label: (typeof catVal === 'object' && catVal.label) ? catVal.label : catKey 
            };
            const scoreColor = score >= 80 ? 'text-success' : (score >= 60 ? 'text-warning' : 'text-danger');

            $categories.append(`
                <div class="seoi-category-card">
                    <span class="seoi-cat-title"><i class="${meta.icon}"></i> ${meta.label}</span>
                    <span class="seoi-cat-score ${scoreColor}">${score}</span>
                </div>
            `);
        }

        // Render Findings & Counts
        updateTabCounts(currentFindings);
        renderFindings(currentFindings, 'all');

        $('#seoi-audit-results').slideDown(300);
    }

    /**
     * Update Counts on Filter Tabs
     */
    function updateTabCounts(findings) {
        let counts = { all: findings.length, critical: 0, error: 0, warning: 0, success: 0 };
        findings.forEach(f => {
            const sev = (f.severity && f.severity.value) ? f.severity.value : f.severity;
            if (counts[sev] !== undefined) {
                counts[sev]++;
            }
        });

        $('#tab-count-all').text(counts.all);
        $('#tab-count-critical').text(counts.critical);
        $('#tab-count-error').text(counts.error);
        $('#tab-count-warning').text(counts.warning);
        $('#tab-count-success').text(counts.success);
    }

    /**
     * Render Findings Cards
     */
    function renderFindings(findings, filterSeverity) {
        const $list = $('#seoi-findings-list');
        $list.empty();

        const filtered = filterSeverity === 'all'
            ? findings
            : findings.filter(f => {
                const sev = (f.severity && f.severity.value) ? f.severity.value : f.severity;
                return sev === filterSeverity;
            });

        if (filtered.length === 0) {
            $list.html(`
                <div class="seoi-empty-state" style="padding: 20px; text-align: center; color: #64748b;">
                    <i class="ri-checkbox-circle-line" style="font-size: 32px; color: #10b981;"></i>
                    <p style="margin: 6px 0 0 0;">Tidak ada temuan dalam kategori severity ini.</p>
                </div>
            `);
            return;
        }

        filtered.forEach(f => {
            const sev = (f.severity && f.severity.value) ? f.severity.value : f.severity;
            const sevLabels = {
                'critical': 'Kritis',
                'error': 'Error',
                'warning': 'Peringatan',
                'notice': 'Pemberitahuan',
                'success': 'Lolos / Sukses',
                'info': 'Info'
            };

            const card = `
                <div class="seoi-finding-card severity-${sev}">
                    <div class="seoi-finding-top">
                        <div class="seoi-finding-title-wrap">
                            <span class="seoi-pill pill-${sev === 'critical' ? 'danger' : (sev === 'error' ? 'danger' : (sev === 'warning' ? 'warning' : 'success'))}">
                                ${sevLabels[sev] || sev}
                            </span>
                            <h4 class="seoi-finding-title">${escapeHtml(f.title)}</h4>
                        </div>
                        <span class="seoi-finding-location">Lokasi: ${escapeHtml(f.location || 'document')}</span>
                    </div>
                    <div class="seoi-finding-desc">
                        ${escapeHtml(f.description)}
                    </div>
                    <div class="seoi-finding-body">
                        <div class="seoi-finding-why">
                            <strong><i class="ri-information-line"></i> Kenapa Berpengaruh:</strong>
                            <p>${escapeHtml(f.why_it_matters || f.whyItMatters || '-')}</p>
                        </div>
                        <div class="seoi-finding-rec">
                            <strong><i class="ri-magic-line"></i> Solusi / Rekomendasi:</strong>
                            <p>${escapeHtml(f.recommendation || '-')}</p>
                        </div>
                    </div>
                </div>
            `;
            $list.append(card);
        });
    }

    /**
     * Site Crawler Sequential Worker
     */
    function initSiteCrawler() {
        const $btnStart = $('#seoi-btn-start-crawl');
        const $progressSection = $('#seoi-crawler-progress-section');
        const $btnPause = $('#seoi-btn-pause-crawl');
        const $btnCancel = $('#seoi-btn-cancel-crawl');
        const $tbody = $('#seoi-crawler-tbody');

        $btnStart.on('click', function () {
            if (!confirm(config.i18n.confirmCrawling || 'Mulai audit menyeluruh seluruh website?')) {
                return;
            }

            $btnStart.prop('disabled', true).hide();
            $progressSection.slideDown();
            $tbody.empty();

            crawlerState = {
                isRunning: true,
                isPaused: false,
                isCancelled: false,
                auditId: 0,
                queue: [],
                currentIndex: 0,
                totalItems: 0,
                scoresSum: 0,
                criticalSum: 0,
                warningSum: 0,
                startTime: Date.now(),
            };

            // Call start endpoint to get queue
            $('#seoi-crawl-status-text').text('Menemukan URL publik...');

            $.ajax({
                url: restUrl + 'crawler/start',
                method: 'POST',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', nonce);
                },
                success: function (res) {
                    if (res.success && res.queue) {
                        crawlerState.auditId = res.audit_id;
                        crawlerState.queue = res.queue;
                        crawlerState.totalItems = res.total_items;
                        crawlerState.currentIndex = 0;

                        $('#seoi-metric-processed').text(`0 / ${crawlerState.totalItems}`);
                        processNextCrawlerItem();
                    } else {
                        alert(res.message || 'Gagal memulai crawler.');
                        resetCrawlerUI();
                    }
                },
                error: function (xhr) {
                    alert('Gagal memulai antrean crawler: ' + (xhr.responseJSON ? xhr.responseJSON.message : ''));
                    resetCrawlerUI();
                }
            });
        });

        // Pause / Resume Button
        $btnPause.on('click', function () {
            if (crawlerState.isPaused) {
                crawlerState.isPaused = false;
                $btnPause.html('<i class="ri-pause-line"></i> Jeda Sementara');
                $('#seoi-crawl-status-text').text('Melanjutkan audit...');
                processNextCrawlerItem();
            } else {
                crawlerState.isPaused = true;
                $btnPause.html('<i class="ri-play-line"></i> Lanjutkan');
                $('#seoi-crawl-status-text').text('Audit dijeda.');
            }
        });

        // Cancel Button
        $btnCancel.on('click', function () {
            if (confirm('Yakin ingin membatalkan pemindaian website?')) {
                crawlerState.isCancelled = true;
                crawlerState.isRunning = false;
                $('#seoi-crawl-status-text').text('Audit dibatalkan.');
                resetCrawlerUI();
            }
        });
    }

    /**
     * Process next item in the crawler sequential queue
     */
    function processNextCrawlerItem() {
        if (!crawlerState.isRunning || crawlerState.isPaused || crawlerState.isCancelled) {
            return;
        }

        if (crawlerState.currentIndex >= crawlerState.totalItems) {
            finishCrawlerRun();
            return;
        }

        const item = crawlerState.queue[crawlerState.currentIndex];
        const percent = Math.round(((crawlerState.currentIndex) / crawlerState.totalItems) * 100);

        $('#seoi-progress-fill').css('width', percent + '%');
        $('#seoi-crawl-percent').text(percent + '%');
        $('#seoi-crawl-status-text').text(`Mengaudit [${crawlerState.currentIndex + 1}/${crawlerState.totalItems}]: ${item.title}`);

        $.ajax({
            url: restUrl + 'crawler/process-item',
            method: 'POST',
            data: JSON.stringify({
                audit_id: crawlerState.auditId,
                url: item.url,
                post_id: item.post_id || 0
            }),
            contentType: 'application/json',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', nonce);
            },
            success: function (res) {
                if (res.success) {
                    crawlerState.scoresSum += res.score;
                    crawlerState.criticalSum += res.critical_count;
                    crawlerState.warningSum += (res.error_count + res.warning_count);
                    crawlerState.currentIndex++;

                    // Update UI Metrics
                    const avg = Math.round(crawlerState.scoresSum / crawlerState.currentIndex);
                    $('#seoi-metric-processed').text(`${crawlerState.currentIndex} / ${crawlerState.totalItems}`);
                    $('#seoi-metric-avg-score').text(avg);
                    $('#seoi-metric-critical').text(crawlerState.criticalSum);
                    $('#seoi-metric-warning').text(crawlerState.warningSum);

                    // Append row to stream table
                    appendCrawlerTableRow(res);

                    // Next iteration
                    setTimeout(processNextCrawlerItem, 150);
                } else {
                    crawlerState.currentIndex++;
                    setTimeout(processNextCrawlerItem, 150);
                }
            },
            error: function () {
                crawlerState.currentIndex++;
                setTimeout(processNextCrawlerItem, 150);
            }
        });
    }

    /**
     * Finish Crawler Run and Notify Server
     */
    function finishCrawlerRun() {
        crawlerState.isRunning = false;
        const duration = ((Date.now() - crawlerState.startTime) / 1000).toFixed(1);

        $('#seoi-progress-fill').css('width', '100%');
        $('#seoi-crawl-percent').text('100%');
        $('#seoi-crawl-status-text').text('Menyelesaikan agregasi skor...');

        $.ajax({
            url: restUrl + 'crawler/finish',
            method: 'POST',
            data: JSON.stringify({
                audit_id: crawlerState.auditId,
                duration_seconds: parseFloat(duration)
            }),
            contentType: 'application/json',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', nonce);
            },
            success: function (res) {
                $('#seoi-crawl-status-text').html('<strong>Audit Website Selesai!</strong> Skor Rata-Rata: ' + res.overall_score);
                $('#seoi-crawl-spinner').hide();
                alert(`Audit Website Berhasil Selesai!\nTotal Halaman: ${res.total_audited}\nSkor Rata-Rata: ${res.overall_score}\nKritis: ${res.critical_count}`);
            }
        });
    }

    function appendCrawlerTableRow(item) {
        const $tbody = $('#seoi-crawler-tbody');
        const pillClass = item.score >= 80 ? 'pill-success' : (item.score >= 60 ? 'pill-warning' : 'pill-danger');

        const row = `
            <tr>
                <td>
                    <div class="seoi-page-cell-title">${escapeHtml(item.title)}</div>
                    <a href="${escapeHtml(item.url)}" target="_blank" class="seoi-page-cell-url">
                        ${escapeHtml(item.url)} <i class="ri-external-link-line"></i>
                    </a>
                </td>
                <td><span class="seoi-badge-status badge-success">Selesai</span></td>
                <td><span class="seoi-pill ${pillClass}">${item.score}</span></td>
                <td><span class="seoi-count-critical">${item.critical_count}</span></td>
                <td><span class="seoi-count-warning">${item.warning_count + item.error_count}</span></td>
                <td>
                    <a href="admin.php?page=seo-intelligence-page-audit&audit_page_id=${item.page_id}" class="seoi-btn seoi-btn-ghost seoi-btn-xs">
                        <i class="ri-eye-line"></i> Rincian
                    </a>
                </td>
            </tr>
        `;
        $tbody.prepend(row);
        $('#seoi-stream-count').text(crawlerState.currentIndex + ' halaman');
    }

    function resetCrawlerUI() {
        $('#seoi-btn-start-crawl').prop('disabled', false).show();
        $('#seoi-crawler-progress-section').hide();
    }

    /**
     * Settings Weight Sum Live Recalculation
     */
    function initSettingsWeights() {
        $('.weight-input').on('input', function () {
            let sum = 0;
            $('.weight-input').each(function () {
                sum += parseInt($(this).val(), 10) || 0;
            });
            $('#seoi-weights-sum').text(sum + '%');
            if (sum !== 100) {
                $('#seoi-weights-sum').css('color', '#ef4444');
            } else {
                $('#seoi-weights-sum').css('color', '#10b981');
            }
        });
    }

    function escapeHtml(string) {
        if (!string) return '';
        const entityMap = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;',
            '/': '&#x2F;'
        };
        return String(string).replace(/[&<>"'\/]/g, function (s) {
            return entityMap[s];
        });
    }

})(jQuery);
