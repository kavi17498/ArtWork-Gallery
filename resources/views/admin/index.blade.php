<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Section 1 -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Upload Artwork</h3>
                    <a href="/image/upload">
                        <button class="btn px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                            Upload New Image
                        </button>
                    </a>
                </div>
            </div>

            <!-- Section 2 -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Profile Management</h3>
                    <a href="/profile">
                        <button class="btn px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                            Edit Profile
                        </button>
                    </a>
                </div>
            </div>

            <!-- Section 3 -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Artworks By You</h3>
                    <a href="/profile/artworks">
                        <button class="btn px-4 py-2 bg-purple-500 text-white font-semibold rounded-lg shadow-md hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-opacity-75">
                            View Your Artworks
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Admin - Users</h1>

        @if (session('success'))
            <div class="mb-4 p-4 text-green-800 bg-green-200 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 text-red-800 bg-red-200 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 border border-gray-200 dark:border-gray-700 rounded-lg">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-700 text-left text-sm font-semibold uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-700 text-left text-sm font-semibold uppercase tracking-wider">
                            Name
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-700 text-left text-sm font-semibold uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-700 text-left text-sm font-semibold uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="{{ $loop->odd ? 'bg-gray-50 dark:bg-gray-800' : 'bg-white dark:bg-gray-900' }}">
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 dark:border-gray-700">
                                {{ $user->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 dark:border-gray-700">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 dark:border-gray-700">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 dark:border-gray-700">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
