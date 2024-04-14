@extends('layouts.admin.master')


@section('title', 'Users')

@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashboard.css') }}">
@endsection

@section('content')
    <div class="app-container">
        <div class="app-content">

            <div class="projects-section">
                <div class="projects-section-header">
                    <p>Users</p>
                </div>
                <div class="projects-section-line">
                    <div class="projects-status">
                        <div class="item-status">
                            <span class="status-number">
                                {{ count($users) }}
                            </span>
                            <span class="status-type">
                                Total Users
                            </span>
                        </div>
                        <div class="item-status">
                            <span class="status-number">
                                {{ count($users) }}
                            </span>
                            <span class="status-type">Total Subscription Users</span>
                        </div>
                    </div>
                    <div class="view-actions">
                        <button class="view-btn list-view" title="List View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-list">
                                <line x1="8" y1="6" x2="21" y2="6" />
                                <line x1="8" y1="12" x2="21" y2="12" />
                                <line x1="8" y1="18" x2="21" y2="18" />
                                <line x1="3" y1="6" x2="3.01" y2="6" />
                                <line x1="3" y1="12" x2="3.01" y2="12" />
                                <line x1="3" y1="18" x2="3.01" y2="18" />
                            </svg>
                        </button>
                        <button class="view-btn grid-view active" title="Grid View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-grid">
                                <rect x="3" y="3" width="7" height="7" />
                                <rect x="14" y="3" width="7" height="7" />
                                <rect x="14" y="14" width="7" height="7" />
                                <rect x="3" y="14" width="7" height="7" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="project-boxes jsGridView">
                    @foreach ($users as $user)
                        @php
                            $backgroundColors = ['#fee4cb', '#e9e7fd', '#ffd3e2', '#c8f7dc', '#d5deff'];
                            $randomBackgroundColor = $backgroundColors[array_rand($backgroundColors)];
                        @endphp
                        <div class="project-box-wrapper">
                            <div class="project-box" style="background-color:{{ $randomBackgroundColor }};">

                                <div class="project-box-header">
                                    <span>
                                        @php
                                            // create_at like  December 10, 2020
                                            $created_at = date('F d, Y', strtotime($user->created_at));
                                        @endphp
                                        Register In: {{ $created_at }}
                                    </span>
                                    {{-- <div class="more-wrapper">
                                        <button class="project-btn-more">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-more-vertical">
                                                <circle cx="12" cy="12" r="1" />
                                                <circle cx="12" cy="5" r="1" />
                                                <circle cx="12" cy="19" r="1" />
                                            </svg>
                                        </button>
                                    </div> --}}
                                </div>
                                <div class="project-box-content-header">
                                    <p class="box-content-header">
                                        {{ $user->name }}
                                    </p>
                                    <p class="box-content-subheader">
                                        {{ $user->email }}
                                    </p>
                                </div>

                                <div class="project-box-footer">
                                    <div class="participants">
                                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80"
                                            alt="participant">
                                        <img src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTB8fG1hbnxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60"
                                            alt="participant">
                                        <button class="add-participant" style="color: #ff942e;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-plus">
                                                <path d="M12 5v14M5 12h14" />
                                            </svg>
                                        </button>
                                    </div>
                                    @if ($user->subscribed() == true)
                                        <div class="days-left" style="color: #18ac38;">
                                            <span style="margin-right: 2px">Plan active</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-check-circle">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                                <polyline points="22 4 12 14.01 9 11.01" />
                                            </svg>
                                        </div>
                                    @else
                                        <div class="days-left" style="color: #ff942e;">
                                            <span style="margin-right: 2px">Plan inactive</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-x-circle">
                                                <circle cx="12" cy="12" r="10" />
                                                <line x1="15" y1="9" x2="9" y2="15" />
                                                <line x1="9" y1="9" x2="15" y2="15" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
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
@endsection
