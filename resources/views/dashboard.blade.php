<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Auth::user()->role === 'admin')
                        <h1>Admin Dashboard</h1>
                    @else
                        <h1>Get Stories</h1>

                        <form id="storiesForm" action="{{ route('stories') }}" method="POST">
                            @csrf
                            @method('POST')
                            <!-- username -->
                            <div class="my-4">
                                <x-input-label for="username" :value="__('username')" />

                                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                                    required />

                                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                            </div>

                            <!-- button -->
                            <x-secondary-button type="submit" class="my-3">
                                {{ __('Get Stories') }}
                            </x-secondary-button>
                        </form>

                        <form id="checkoutForm" action="{{ route('checkout') }}" method="POST">
                            @csrf
                            @method('POST')
                            <!-- button -->
                            <x-primary-button type="submit" class="my-3">
                                {{ __('Checkout') }}
                            </x-primary-button>
                        </form>
                        {{-- {{ dd(Auth::user()->subscribed(), Auth::user()->subscribedToPrice('price_1OvlgGJO4K6lIZ8tTYb2cezX')) }} --}}
                        @if (Auth::user()->subscribed())
                            <p>You are subscribed.</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
