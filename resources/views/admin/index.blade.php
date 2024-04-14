@extends('layouts.admin.master')


@section('title', 'Dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashboard.css') }}">
    <style>
        .line-chart {
            -webkit-animation: fadeIn 600ms cubic-bezier(0.57, 0.25, 0.65, 1) 1 forwards;
            animation: fadeIn 600ms cubic-bezier(0.57, 0.25, 0.65, 1) 1 forwards;
            opacity: 0;
            max-width: 780px;
            width: 100%;
        }

        .aspect-ratio {
            height: 0;
            padding-bottom: 50%;
        }

        @-webkit-keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
@endsection

@section('content')
    <div class="app-container">
        <div class="app-content">

            <div class="projects-section">
                <div class="projects-section-header">
                    <p>Request Number Today</p>
                    <p class="time">
                        {{ now()->format('M d, Y') }}
                    </p>
                </div>
                <div class="projects-section-line">
                    <div class="projects-status">
                        <div class="item-status">
                            <span class="status-number">
                                {{ get_session_requests_count() }}
                            </span>
                            <span class="status-type">Total</span>
                        </div>
                    </div>
                </div>
                <div class="line-chart">
                    <div class="aspect-ratio">
                        <canvas id="chart"></canvas>
                    </div>
                </div>

            </div>

            <div class="messages-section">
                <button class="messages-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x-circle">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="15" y1="9" x2="9" y2="15" />
                        <line x1="9" y1="9" x2="15" y2="15" />
                    </svg>
                </button>
                <div class="projects-section-header">
                    <p>Last Requests</p>
                </div>
                <div class="messages">
                    @foreach (last_requests() as $last)
                        @php
                            $backgroundColors = ['#fee4cb', '#e9e7fd', '#ffd3e2', '#c8f7dc', '#d5deff'];
                            $randomBackgroundColor = $backgroundColors[array_rand($backgroundColors)];

                            $avatars = [
                                'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80',
                                'https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80',
                            ];
                            $randomAvatar = $avatars[array_rand($avatars)];
                            $user_name = $last->user !== null ? $last->user->name : 'Guest';
                            $UrlAvatar =
                                'https://ui-avatars.com/api/?name=' .
                                $user_name .
                                '&background=' .
                                substr($randomBackgroundColor, 1) .
                                '&color=fff';
                        @endphp
                        <div class="message-box">
                            <img src="{{ $UrlAvatar }}" alt="profile image">
                            <div class="message-content">
                                <div class="message-header">
                                    <div class="name">
                                        {{ $user_name }}
                                    </div>
                                    <div class="star-checkbox">
                                        <input type="checkbox" id="star-1">
                                        <label for="star-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                                @php
                                    $country = get_flag_by_ip($last->user_ip); // example: https://www.countryflags.io/US/flat/64.png
                                @endphp
                                <p class="message-line"
                                    style="display: flex; justify-content: center; align-items: center;">
                                    request getting successfully
                                    from {{ $user_name }} in
                                    [{{ get_city_name_by_ip($last->user_ip) }}]
                                    @if ($country !== null)
                                        <img src="https://flagsapi.com/{{ $country }}/flat/64.png" alt="flag"
                                            style="width: 20px; height: 20px;">
                                    @endif
                                </p>
                                <p class="message-line time">
                                    {{ $last->updated_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin/assets/js/dashboard.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        // ============================================
        // As of Chart.js v2.5.0
        // http://www.chartjs.org/docs
        // ============================================

        var chart = document.getElementById('chart').getContext('2d'),
            gradient = chart.createLinearGradient(0, 0, 0, 450);

        gradient.addColorStop(0, 'rgba(255, 0,0, 0.5)');
        gradient.addColorStop(0.5, 'rgba(255, 0, 0, 0.25)');
        gradient.addColorStop(1, 'rgba(255, 0, 0, 0)');


        var data = {
            labels: ['12', '2', '4', '8', '10', '12'],
            datasets: [{
                label: 'Custom Label Name',
                backgroundColor: gradient,
                pointBackgroundColor: 'white',
                borderWidth: 1,
                borderColor: '#911215',
                data: [50, 55, 60, 75, 54, 50]
            }]
        };


        var options = {
            responsive: true,
            maintainAspectRatio: true,
            animation: {
                easing: 'easeInOutQuad',
                duration: 520
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        color: 'rgba(200, 200, 200, 0.05)',
                        lineWidth: 1
                    }
                }],
                yAxes: [{
                    gridLines: {
                        color: 'rgba(200, 200, 200, 0.08)',
                        lineWidth: 1
                    }
                }]
            },
            elements: {
                line: {
                    tension: 0.4
                }
            },
            legend: {
                display: false
            },
            point: {
                backgroundColor: 'white'
            },
            tooltips: {
                titleFontFamily: 'Open Sans',
                backgroundColor: 'rgba(0,0,0,0.3)',
                titleFontColor: 'red',
                caretSize: 5,
                cornerRadius: 2,
                xPadding: 10,
                yPadding: 10
            }
        };


        var chartInstance = new Chart(chart, {
            type: 'line',
            data: data,
            options: options
        });
    </script>
@endsection
