@extends('layouts.admin.master')


@section('title', 'Dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css"
        integrity="sha512-m52YCZLrqQpQ+k+84rmWjrrkXAUrpl3HK0IO4/naRwp58pyr7rf5PO1DbI2/aFYwyeIH/8teS9HbLxVyGqDv/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .project-card-wrapper {
            margin-bottom: 20px;
            width: 100%;
        }

        .text-bold {
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <div class="app-container">
        <div class="app-content">
            <div class="projects-section">
                <div class="projects-section-header">
                    <p>Settings</p>
                    <p class="time">
                        {{ date('Y-m-d H:i:s') }}
                    </p>
                </div>
                <!-- General Settings -->
                <div class="project-boxes jsGridView">
                    <div class="project-card-wrapper">
                        <div class="project-box" style="background-color: #e9e7fd;">
                            <div class="project-box-header">
                                <span class="text-bold">
                                    General Settings
                                </span>
                            </div>
                            <div class="box-progress-wrapper">
                                <form action="{{ route('admin.settings.generalUpdate') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group"
                                        style="display: flex; flex-direction: column; padding: 10px; width: 100%;">
                                        <!-- name -->
                                        <div class="mt-4">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('name')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Name
                                            </label>
                                            <input type="text" id="name"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('name')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Your Name" name="name"
                                                value="{{ general_settings('name'), old('name') }}" required />

                                            @if ($errors->has('name'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- email -->
                                        <div class="mt-4">
                                            <label for="error"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('email')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Email
                                            </label>
                                            <input type="text" id="error"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('email')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Your Email" name="email"
                                                value="{{ general_settings('email'), old('email') }}" required />

                                            @if ($errors->has('email'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif

                                        </div>

                                        <!-- logo -->
                                        <div class="mt-4">
                                            <label
                                                class="block mb-2 text-sm font-medium @if ($errors->has('logo')) 'text-red-500' @else 'text-gray-900' @endif dark:text-white"
                                                for="file_input">Logo</label>

                                            <input
                                                class="block w-full text-md   @if ($errors->has('logo')) 'border-red-500' @else 'border-gray-900' @endif border border-gray-300 rounded-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                id="file_input" type="file" name="logo"
                                                value="{{ general_settings('logo'), old('logo') }}" required>

                                            @if ($errors->has('logo'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('logo') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- favicon -->
                                        <div class="mt-4">
                                            <label
                                                class="block mb-2 text-sm font-medium @if ($errors->has('favicon')) 'text-red-500' @else 'text-gray-900' @endif dark:text-white"
                                                for="file_input">Favicon</label>

                                            <input
                                                class="block w-full text-md   @if ($errors->has('favicon')) 'border-red-500' @else 'border-gray-900' @endif border border-gray-300 rounded-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                id="file_input" type="file" name="favicon"
                                                value="{{ general_settings('favicon'), old('favicon') }}" required>


                                            @if ($errors->has('favicon'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('favicon') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- description -->
                                        <div class="mt-4">
                                            <label for="description"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('description')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Description
                                            </label>
                                            <textarea id="description"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('description')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Your Description" name="description" value="{{ old('description') }}" required>{{ general_settings('description') }}</textarea>

                                            @if ($errors->has('description'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('description') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- keywords -->
                                        <div class="mt-4">
                                            <label for="keywords"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('keywords')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Keywords
                                            </label>
                                            <textarea id="keywords"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('keywords')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Your Keywords" name="keywords" value="{{ old('keywords') }}" required>{{ general_settings('keywords') }}</textarea>

                                            @if ($errors->has('keywords'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('keywords') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- button -->
                                        <button type="submit"
                                            class="my-5 py-2 px-5 bg-violet-500 text-white font-semibold rounded-full shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75">
                                            Save changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /General Settings -->
                <hr class="my-5">

                <!-- payment settings -->
                <div class="project-boxes jsGridView d-none">
                    <div class="project-card-wrapper">
                        <div class="project-box" style="background-color: #bbecf8;">
                            <div class="project-box-header">
                                <span class="text-bold">
                                    Payment Settings
                                </span>
                            </div>
                            <div class="box-progress-wrapper">
                                <form action="{{ route('admin.settings.paymentUpdate') }}" method="POST">
                                    @csrf
                                    <div class="form-group"
                                        style="display: flex; flex-direction: column; padding: 10px; width: 100%;">
                                        <!-- payment_status -->
                                        <div class="mt-4">
                                            <label for="payment_status"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('payment_status')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Payment Status
                                            </label>
                                            <select id="payment_status"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('payment_status')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                name="payment_status" value="{{ old('payment_status') }}" required>
                                                <option value="1"
                                                    {{ payment_settings('payment_status') == 1 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0"
                                                    {{ payment_settings('payment_status') == 0 ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>

                                            @if ($errors->has('payment_status'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('payment_status') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- subscription_value -->
                                        <div class="mt-4">
                                            <label for="error"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('subscription_value')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Subscription Value [Stripe Product Price(price_1Ov...)]
                                            </label>
                                            <input type="text" id="error"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('subscription_value')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Enter value of Subscription" name="subscription_value"
                                                value="{{ payment_settings('subscription_value'), old('subscription_value') }}"
                                                required />

                                            @if ($errors->has('subscription_value'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('subscription_value') }}
                                                </div>
                                            @endif

                                        </div>

                                        <!-- request_limit_subscribed_user -->
                                        <div class="mt-4">
                                            <label for="error"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('request_limit_subscribed_user')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Request Limit Subscribed User
                                            </label>
                                            <input type="number" id="error"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('request_limit_subscribed_user')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Enter value of Request Limit Subscribed User"
                                                name="request_limit_subscribed_user"
                                                value="{{ payment_settings('request_limit_subscribed_user'), old('request_limit_subscribed_user') }}"
                                                required />

                                            @if ($errors->has('request_limit_subscribed_user'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('request_limit_subscribed_user') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- request_limit_unsubscribed_user -->
                                        <div class="mt-4">
                                            <label for="error"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('request_limit_unsubscribed_user')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Request Limit Unsubscribed User
                                            </label>
                                            <input type="number" id="error"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('request_limit_unsubscribed_user')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Enter value of Request Limit Unsubscribed User"
                                                name="request_limit_unsubscribed_user"
                                                value="{{ payment_settings('request_limit_unsubscribed_user'), old('request_limit_unsubscribed_user') }}"
                                                required />

                                            @if ($errors->has('request_limit_unsubscribed_user'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('request_limit_unsubscribed_user') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- default_request_limit -->
                                        <div class="mt-4">
                                            <label for="error"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('default_request_limit')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Default Request Limit
                                            </label>
                                            <input type="number" id="error"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('default_request_limit')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Enter value of Default Request Limit"
                                                name="default_request_limit"
                                                value="{{ payment_settings('default_request_limit'), old('default_request_limit') }}"
                                                required />

                                            @if ($errors->has('default_request_limit'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('default_request_limit') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- HighLighted_Limit_Number -->
                                        <div class="mt-4">
                                            <label for="error"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('HighLighted_Limit_Number')) 'text-red-500' @else 'text-gray-700' @endif">
                                                HighLighted Limit Number
                                            </label>
                                            <input type="number" id="error"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('HighLighted_Limit_Number')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Enter value of HighLighted Limit Number"
                                                name="HighLighted_Limit_Number"
                                                value="{{ payment_settings('HighLighted_Limit_Number'), old('HighLighted_Limit_Number') }}"
                                                required />

                                            @if ($errors->has('HighLighted_Limit_Number'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('HighLighted_Limit_Number') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- HighLighted_status -->
                                        <div class="mt-4">
                                            <label for="payment_status"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('HighLighted_status')) 'text-red-500' @else 'text-gray-700' @endif">
                                                HighLighted Status
                                            </label>
                                            <select id="payment_status"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('HighLighted_status')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                name="HighLighted_status" value="{{ old('HighLighted_status') }}"
                                                required>
                                                <option value="1"
                                                    {{ payment_settings('HighLighted_status') == 1 ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="0"
                                                    {{ payment_settings('HighLighted_status') == 0 ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>

                                            @if ($errors->has('HighLighted_status'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('HighLighted_status') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Stories_status -->
                                        <div class="mt-4">
                                            <label for="payment_status"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('Stories_status')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Stories Status
                                            </label>
                                            <select id="payment_status"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('Stories_status')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                name="Stories_status" value="{{ old('Stories_status') }}" required>
                                                <option value="1"
                                                    {{ payment_settings('Stories_status') == 1 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0"
                                                    {{ payment_settings('Stories_status') == 0 ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>

                                            @if ($errors->has('Stories_status'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('Stories_status') }}
                                                </div>
                                            @endif
                                        </div>



                                        <!-- Instagram_Api_key -->
                                        <div class="mt-4">
                                            <label for="error"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('Instagram_Api_key')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Instagram Api Key
                                            </label>
                                            <input type="text" id="error"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('Instagram_Api_key')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Enter value of Instagram Api Key" name="Instagram_Api_key"
                                                value="{{ payment_settings('Instagram_Api_key'), old('Instagram_Api_key') }}"
                                                required />

                                            @if ($errors->has('Instagram_Api_key'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('Instagram_Api_key') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Stripe_Api_key -->
                                        <div class="mt-4">
                                            <label for="error"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('Stripe_Api_key')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Stripe Api Key
                                            </label>
                                            <input type="text" id="error"
                                                class="bg-white-50 border-gray-100
                                                    @if ($errors->has('Stripe_Api_key')) 'border-red-500' @else 'border-gray-100' @endif
                                                    focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Enter value of Stripe Api Key" name="Stripe_Api_key"
                                                value="{{ payment_settings('Stripe_Api_key'), old('Stripe_Api_key') }}"
                                                required />

                                            @if ($errors->has('Stripe_Api_key'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('Stripe_Api_key') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Stripe_Secret_key -->
                                        <div class="mt-4">
                                            <label for="error"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('Stripe_Secret_key')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Stripe Secret Key
                                            </label>
                                            <input type="text" id="error"
                                                class="bg-white-50 border-gray-100
                                                    @if ($errors->has('Stripe_Secret_key')) 'border-red-500' @else 'border-gray-100' @endif
                                                    focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Enter value of Stripe Secret Key" name="Stripe_Secret_key"
                                                value="{{ payment_settings('Stripe_Secret_key'), old('Stripe_Secret_key') }}"
                                                required />

                                            @if ($errors->has('Stripe_Secret_key'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('Stripe_Secret_key') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Stripe_webhook_endpoint_url -->
                                        <div class="mt-4">
                                            <label for="error"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('Stripe_webhook_endpoint_url')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Stripe Webhook Endpoint URL
                                            </label>
                                            <input type="text" id="error"
                                                class="bg-white-50 border-gray-100
                                                    @if ($errors->has('Stripe_webhook_endpoint_url')) 'border-red-500' @else 'border-gray-100' @endif
                                                    focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Enter value of Stripe Webhook Endpoint URL"
                                                name="Stripe_webhook_endpoint_url"
                                                value="{{ payment_settings('Stripe_webhook_endpoint_url'), old('Stripe_webhook_endpoint_url') }}"
                                                readonly />

                                            @if ($errors->has('Stripe_webhook_endpoint_url'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('Stripe_webhook_endpoint_url') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Stripe_webhook_secret -->
                                        <div class="mt-4">
                                            <label for="error"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('Stripe_webhook_secret')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Stripe Webhook Secret
                                            </label>
                                            <input type="text" id="error"
                                                class="bg-white-50 border-gray-100
                                                    @if ($errors->has('Stripe_webhook_secret')) 'border-red-500' @else 'border-gray-100' @endif
                                                    focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Enter value of Stripe Webhook Secret"
                                                name="Stripe_webhook_secret"
                                                value="{{ payment_settings('Stripe_webhook_secret'), old('Stripe_webhook_secret') }}"
                                                required />

                                            @if ($errors->has('Stripe_webhook_secret'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('Stripe_webhook_secret') }}
                                                </div>
                                            @endif
                                        </div>



                                        <!-- Stripe_mode -->
                                        <div class="mt-4">
                                            <label for="payment_status"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('Stripe_mode')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Stripe Mode
                                            </label>
                                            <select id="payment_status"
                                                class="bg-white-50 border-gray-100
                                                @if ($errors->has('Stripe_mode')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                name="Stripe_mode" value="{{ old('Stripe_mode') }}" required>
                                                <option value="live"
                                                    {{ payment_settings('Stripe_mode') == 'live' ? 'selected' : '' }}>Live
                                                </option>
                                                <option value="test"
                                                    {{ payment_settings('Stripe_mode') == 'test' ? 'selected' : '' }}>Test
                                                </option>
                                            </select>

                                            @if ($errors->has('Stripe_mode'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('Stripe_mode') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- button -->
                                        <button type="submit"
                                            class="my-5 py-2 px-5 bg-violet-500 text-white font-semibold rounded-full shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75">
                                            Save changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pages Settings -->
                <div class="project-boxes jsGridView">
                    <div class="project-card-wrapper">
                        <div class="project-box" style="background-color: #e9e7fd;">
                            <div class="project-box-header">
                                <span class="text-bold">
                                    Pages Settings
                                </span>
                            </div>
                            <div class="box-progress-wrapper">
                                <form action="{{ route('admin.settings.pageUpdate') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group"
                                        style="display: flex; flex-direction: column; padding: 10px; width: 100%;">

                                        <!-- privacy_policy -->
                                        <div class="mt-4">
                                            <label for="privacy_policy"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('privacy_policy')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Privacy policy
                                            </label>
                                            <textarea id="privacy_policy"
                                                class="bg-white-50 border-gray-100 summernote
                                                @if ($errors->has('privacy_policy')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Your privacy_policy" name="privacy_policy" value="{{ old('privacy_policy') }}" required>{{ page_settings('privacy_policy') }}</textarea>

                                            @if ($errors->has('privacy_policy'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('privacy_policy') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- terms_and_conditions -->
                                        <div class="mt-4">
                                            <label for="terms_and_conditions"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('terms_and_conditions')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Terms and conditions
                                            </label>
                                            <textarea id="terms_and_conditions"
                                                class="bg-white-50 border-gray-100 summernote
                                                @if ($errors->has('terms_and_conditions')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Your terms_and_conditions" name="terms_and_conditions" value="{{ old('terms_and_conditions') }}"
                                                required>{{ page_settings('terms_and_conditions') }}</textarea>

                                            @if ($errors->has('terms_and_conditions'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('terms_and_conditions') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- contact_us -->
                                        <div class="mt-4">
                                            <label for="contact_us"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('contact_us')) 'text-red-500' @else 'text-gray-700' @endif">
                                                Contact us
                                            </label>
                                            <textarea id="contact_us"
                                                class="bg-white-50 border-gray-100 summernote
                                                @if ($errors->has('contact_us')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Your contact_us" name="contact_us" value="{{ old('contact_us') }}" required>{{ page_settings('contact_us') }}</textarea>

                                            @if ($errors->has('contact_us'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('contact_us') }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- about_us -->
                                        <div class="mt-4">
                                            <label for="about_us"
                                                class="block mb-2 text-sm font-medium @if ($errors->has('about_us')) 'text-red-500' @else 'text-gray-700' @endif">
                                                About us
                                            </label>
                                            <textarea id="about_us"
                                                class="bg-white-50 border-gray-100 summernote
                                                @if ($errors->has('about_us')) 'border-red-500' @else 'border-gray-100' @endif
                                                focus:border-violet-400 focus:ring focus:ring-violet-400 focus:ring-opacity-50 rounded-md w-full p-3 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                placeholder="Your about_us" name="about_us" value="{{ old('about_us') }}" required>{{ page_settings('about_us') }}</textarea>

                                            @if ($errors->has('about_us'))
                                                <div class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                    {{ $errors->first('about_us') }}
                                                </div>
                                            @endif
                                        </div>


                                        <!-- button -->
                                        <button type="submit"
                                            class="my-5 py-2 px-5 bg-violet-500 text-white font-semibold rounded-full shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75">
                                            Save changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Pages Settings -->
                <hr class="my-5">
            </div>
        </div>
    </div>
    </div>
@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js"
        integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/lang/summernote-ar-AR.min.js"
        integrity="sha512-uJrAbZZW6Fc2rWFW9bFNkaZdBfNV5b3sS6WeUZ2kn9UCp5MKLBSU10D75O0s6AHYQwtdSckrKzSCBsUVkm4PUQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin/assets/js/ajax-form-submit.js') }}"></script>
    <script>
        submitFormWithAjax(
            'form',
            'تم الانشاء بنجاح',
            "{{ route('admin.settings') }}",
            'توجد بعض الأخطاء في الحقول.',
            'يرجى مراجعة المعلومات المدخلة.'
        );
    </script>


    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                lang: 'ar-AR',

            });
            var noteBar = $('.note-toolbar');
            noteBar.find('[data-toggle]').each(function() {
                $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
            });
        });
    </script>
    {{-- <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('privacy_policy', {
            // هنا يمكنك تخصيص CKEditor بالإعدادات التي تحتاجها
            height: 300,
            language: 'en', // لتعيين اللغة العربية
            // يمكنك إضافة المزيد من الإعدادات هنا
        });
        CKEDITOR.replace('about_us', {
            // إعدادات CKEditor لـ about_us
            height: 300,
            language: 'en',
        });
        CKEDITOR.replace('contact_us', {
            // إعدادات CKEditor لـ contact_us
            height: 300,
            language: 'en',
        });
        CKEDITOR.replace('terms_and_conditions', {
            // إعدادات CKEditor لـ terms_and_conditions
            height: 300,
            language: 'en',
        });
    </script> --}}
@endsection
