<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to Our Application') }}
        </h2>
        @auth
            <p>Welcome, {{ auth()->user()->name }}</p>
        @else
            <p>Please login or register to continue.</p>
        @endauth
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    @auth
                        <p>You are logged in!</p>
                    @else
                        <p>Please login or register to continue.</p>
                    @endauth

                    <div class="d-flex justify-content-center mt-4">
                        <!-- Login Button -->
                        <a href="{{ route('login') }}" class="btn btn-primary me-3">Login</a>

                        <!-- Register Button -->
                        <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
