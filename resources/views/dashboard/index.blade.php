@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <h1 class="mb-4 text-primary font-weight-bold">Dashboard</h1>

        @php
            $lastMonth = \Carbon\Carbon::now()->subMonth()->format('Y-m');
            $thisMonth = \Carbon\Carbon::now()->format('Y-m');
            $lastMonthItem = $items->first(function ($item) use ($lastMonth) {
                return \Carbon\Carbon::parse($item->start_date)->format('Y-m') === $lastMonth;
            });
            $lastMonthUsage = $lastMonthItem ? $lastMonthItem->meter_usage : 0;
            $thisMonthItem = $items->first(function ($item) use ($thisMonth) {
                return \Carbon\Carbon::parse($item->start_date)->format('Y-m') === $thisMonth;
            });
            $thisMonthUsage = $thisMonthItem ? $thisMonthItem->meter_usage : 0;
        @endphp

        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title text-secondary">Total Usage</h5>
                        <p class="card-text display-4 text-primary">
                            <span id="totalUsage" data-value="{{ $items->sum('meter_usage') }}">0</span>
                        </p>
                        <p class="mb-0 text-muted" style="font-size: 1.1rem;">
                            Est. Payment: Rp {{ number_format($items->sum('meter_usage') * 3500, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title text-secondary">Last Month Usage</h5>
                        <p class="card-text display-4 text-success">
                            <span id="lastMonthUsage" data-value="{{ $lastMonthUsage }}">0</span>
                        </p>
                        <p class="mb-0 text-muted" style="font-size: 1.1rem;">
                            Est. Payment: Rp {{ number_format($lastMonthUsage * 3500, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title text-secondary">This Month Usage</h5>
                        <p class="card-text display-4 text-danger">
                            <span id="thisMonthUsage" data-value="{{ $thisMonthUsage }}">0</span>
                        </p>
                        <p class="mb-0 text-muted" style="font-size: 1.1rem;">
                            Est. Payment: Rp {{ number_format($thisMonthUsage * 3500, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function animateNumber(id, endValue, duration = 1200) {
                const el = document.getElementById(id);
                let start = 0;
                const startTime = performance.now();
                function update(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const value = Math.floor(progress * (endValue - start) + start);
                    el.textContent = value;
                    if (progress < 1) {
                        requestAnimationFrame(update);
                    } else {
                        el.textContent = endValue;
                    }
                }
                requestAnimationFrame(update);
            }
            document.addEventListener('DOMContentLoaded', function () {
                animateNumber('totalUsage', parseInt(document.getElementById('totalUsage').dataset.value));
                animateNumber('lastMonthUsage', parseInt(document.getElementById('lastMonthUsage').dataset.value));
                animateNumber('thisMonthUsage', parseInt(document.getElementById('thisMonthUsage').dataset.value));
            });
        </script>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header text-white">
                <h5 class="mb-0">Meter Usage History</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive"></div>
                <table class="table table-striped mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Meter Usage</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->meter_usage }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->start_date)->translatedFormat('l, d F Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->end_date)->translatedFormat('l, d F Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No data available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @php
        // Prepare data for Chart.js
        $monthlyData = $items->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->start_date)->format('F Y');
        })->map(function ($group) {
            return [
                'meter_usage' => $group->sum('meter_usage'),
                'est_paid' => $group->sum('meter_usage') * 3500,
                // Add more metrics here if needed
            ];
        });

        $labels = $monthlyData->keys()->toArray();
        $meterUsages = $monthlyData->pluck('meter_usage')->toArray();
        $estPaids = $monthlyData->pluck('est_paid')->toArray();
    @endphp

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header text-white">
            <h5 class="mb-0">Water Usage Over Time</h5>
        </div>
        <div class="card-body">
            <form id="chartOptionsForm" class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="chartType" class="form-label">Chart Type</label>
                        <select id="chartType" class="form-select">
                            <option value="line">Line</option>
                            <option value="bar">Bar</option>
                            <option value="radar">Radar</option>
                            <option value="pie">Pie</option>
                            <option value="doughnut">Doughnut</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="dataRange" class="form-label">Data Range</label>
                        <select id="dataRange" class="form-select">
                            <option value="all">All</option>
                            <option value="6">Last 6 Months</option>
                            <option value="3">Last 3 Months</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="dataMetric" class="form-label">Data Metric</label>
                        <select id="dataMetric" class="form-select">
                            <option value="meter_usage">Meter Usage</option>
                            <option value="est_paid">Estimation Paid Usage</option>
                        </select>
                    </div>
                </div>
            </form>
            <canvas id="usageChart" height="100"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const allLabels = @json($labels);
        const allMeterUsages = @json($meterUsages);
        const allEstPaids = @json($estPaids);

        let chartInstance = null;

        function getFilteredData(range, metric) {
            let dataArr = metric === 'est_paid' ? allEstPaids : allMeterUsages;
            if (range === 'all') {
                return { labels: allLabels, values: dataArr };
            }
            const n = parseInt(range);
            return {
                labels: allLabels.slice(-n),
                values: dataArr.slice(-n)
            };
        }

        function getDatasetLabel(metric) {
            switch (metric) {
                case 'est_paid': return 'Estimation Paid Usage (Rp)';
                default: return 'Meter Usage';
            }
        }

        function getDatasetColor(metric) {
            if (metric === 'est_paid') {
                return {
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ]
                };
            }
            return {
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ]
            };
        }

        function renderChart(type = 'line', range = 'all', metric = 'meter_usage') {
            const { labels, values } = getFilteredData(range, metric);
            const ctx = document.getElementById('usageChart').getContext('2d');
            if (chartInstance) {
                chartInstance.destroy();
            }
            const color = getDatasetColor(metric);
            chartInstance = new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        label: getDatasetLabel(metric),
                        data: values,
                        borderColor: color.borderColor,
                        backgroundColor: color.backgroundColor,
                        fill: type === 'line' || type === 'radar',
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: type !== 'line' && type !== 'bar' ? true : false },
                        title: { display: false }
                    },
                    scales: (type === 'pie' || type === 'doughnut') ? {} : {
                        y: { beginAtZero: true }
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            const chartTypeSelect = document.getElementById('chartType');
            const dataRangeSelect = document.getElementById('dataRange');
            const dataMetricSelect = document.getElementById('dataMetric');

            function updateChart() {
                renderChart(chartTypeSelect.value, dataRangeSelect.value, dataMetricSelect.value);
            }

            chartTypeSelect.addEventListener('change', updateChart);
            dataRangeSelect.addEventListener('change', updateChart);
            dataMetricSelect.addEventListener('change', updateChart);

            renderChart();
        });
    </script>
@endsection