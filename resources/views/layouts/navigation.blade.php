<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center -translate-y-0.25 scale-90">
                    <a href="{{ route('home_page') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <div class="flex items-center space-x-3">
                        <div class="space-x-3 text-[1.6rem] mr-2 leading-5">
                            <a href="{{ route('home_page') }}">
                                {!! url()->current() == route('home_page')
                                    ? '<i class="bx bx-home-alt-2 dark:text-white" ></i>'
                                    : '<i class="bx bx-home alt-2 dark:text-white"></i>' !!}
                            </a>
                            <a href="{{ route('explore') }}">
                                {!! url()->current() == route('explore')
                                    ? '<i class="bx bx-compass dark:text-white" ></i>'
                                    : '<i class="bx bx-compass dark:text-white"></i>' !!}
                            </a>
                            <a href="{{ route('create_post') }}">
                                {!! url()->current() == route('create_post')
                                    ? '<i class="bx bx-message-square-add dark:text-white" ></i>'
                                    : '<i class="bx bx-message-square-add dark:text-white"></i>' !!}
                            </a>
                        </div>
                    </div>
                @endauth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <div class="ml-4">
                            <img src="{{ asset('/Storage/' . auth()->user()->image) }}" class="w-10 rounded-full">
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('user_profile', auth()->user())">{{ __('Profile') }}</x-dropdown-link>

                        <!-- Authentication and dark mode -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            {{-- dark mode --}}
                            <x-dropdown-link>
                                <input data-hs-theme-switch
                                    class="relative w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-slate-700 focus:ring-slate-700 focus:outline-none appearance-none

                                before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200

                                after:absolute after:right-1.5 after:top-[calc(50%-0.40625rem)] after:w-[.8125rem] after:h-[.8125rem] after:bg-no-repeat after:bg-[right_center] after:bg-[length:.8125em_.8125em] after:bg-[url('../svg/illustration/moon-stars.svg')] checked:after:bg-[url('../svg/illustration/brightness-high.svg')] after:transform after:transition-all after:ease-in-out after:duration-200 after:opacity-70 checked:after:left-1.5 checked:after:right-auto"
                                    type="checkbox" id="darkSwitch">
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
