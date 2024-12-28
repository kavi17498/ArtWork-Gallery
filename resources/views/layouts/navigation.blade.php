<nav x-data="{ open: false }" class="bg-gradient-to-r from-blue-500 to-indigo-500 dark:from-gray-800 dark:to-gray-900 shadow-lg border-b border-gray-200 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-black dark:text-gray-200 hover:text-yellow-400 transition duration-300">
                        <button class="px-4 py-2 bg-transparent text-black rounded-lg hover:bg-yellow-400 hover:text-white transition duration-300 transform hover:scale-105">
                            {{ __('Dashboard') }}
                        </button>
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <ul class="flex space-x-8">
                    <li>
                        <a href="/artworks" class="text-black dark:text-gray-200 hover:text-yellow-400 transition duration-300">
                            <button class="px-4 py-2 bg-transparent text-black rounded-lg hover:bg-yellow-400 hover:text-white transition duration-300 transform hover:scale-105">
                                Art Works
                            </button>
                        </a>
                    </li>
                    <li>
                        <a href="/contactus" class="text-black dark:text-gray-200 hover:text-yellow-400 transition duration-300">
                            <button class="px-4 py-2 bg-transparent text-black rounded-lg hover:bg-yellow-400 hover:text-white transition duration-300 transform hover:scale-105">
                                Contact Us
                            </button>
                        </a>
                    </li>
                    <li>
                        <a href="/aboutus" class="text-black dark:text-gray-200 hover:text-yellow-400 transition duration-300">
                            <button class="px-4 py-2 bg-transparent text-black rounded-lg hover:bg-yellow-400 hover:text-white transition duration-300 transform hover:scale-105">
                                About Us
                            </button>
                        </a>
                    </li>
                </ul>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-lg text-black dark:text-gray-400 bg-yellow-500 dark:bg-yellow-700 hover:bg-yellow-600 dark:hover:bg-yellow-800 focus:outline-none transition ease-in-out duration-150 transform hover:scale-105">
                            @auth
                                <div>{{ Auth::user()->name }}</div>
                            @else
                                <div>Guest</div>
                            @endauth
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @auth
                            <x-dropdown-link :href="route('profile.edit')" class="hover:bg-yellow-100 dark:hover:bg-yellow-700 transition duration-150">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="hover:bg-yellow-100 dark:hover:bg-yellow-700 transition duration-150">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @else
                            <x-dropdown-link :href="route('login')" class="hover:bg-yellow-100 dark:hover:bg-yellow-700 transition duration-150">
                                {{ __('Login') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('register')" class="hover:bg-yellow-100 dark:hover:bg-yellow-700 transition duration-150">
                                {{ __('Register') }}
                            </x-dropdown-link>
                        @endauth
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-lg text-black hover:text-yellow-600 dark:hover:text-yellow-500 focus:outline-none transition transform hover:scale-105">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-black dark:text-yellow-400 hover:text-yellow-600 dark:hover:text-yellow-300 transition duration-300">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
