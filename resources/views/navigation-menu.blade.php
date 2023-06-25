@if (auth()->check())
    <nav class="flex  w-full items-center justify-between border-b-2 border-gray-200 bg-white p-2">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            @if (Auth::check() && auth()->user()->role == '0')
                <div></div>
            @else
                <button class="p-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    @click="asideOpen = !asideOpen" aria-label="Menu">
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            @endif
            <div>
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('img/Group.png') }}" alt="VitaForma" class="h-10 w-60 ">
                </a>
            </div>
        </div>

        <div class="flex items-center ml-1 space-x-2">
            @if (Auth::check() && auth()->user()->role == '0' || auth()->user()->role == '4')
            @else
                <div @click.away="open = false" class="" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="block p-0 text-gray-400 hover:text-gray-500 transition-all text-sm ease-nav-brand relative">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                        @if (auth()->check())
                            @php
                                $count = auth()->user()->unreadNotifications->count();
                            @endphp
                            @if ($count > 0)
                                <span
                                    class="absolute -top-1 -right-1 px-1 text-xs bg-red-500 rounded-full text-white">{{ $count }}</span>
                            @endif
                        @endif
                    </button>
                    <div x-show="open" class="absolute right-12 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        @if (auth()->user()->notifications->isEmpty())
                            <div class="bg-white px-5 py-3.5 rounded-lg shadow hover:shadow-xl max-w-sm mx-auto transform hover:-translate-y-[0.125rem] transition duration-100 ease-linear">
                                <div class="w-full flex items-center justify-between">
                                    <span class="font-medium text-sm text-gray-400">Aucune notification</span>
                                </div>
                            </div>
                        @else
                            <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-800 overflow-auto">
                                <div class="px-2 py-1">
                                    <span class="font-medium text-sm text-gray-400">Nouvelle notification</span>
                                </div>
                                <hr>
                                <div class="h-[200px] overflow-auto">
                                    @foreach (auth()->user()->notifications as $notification)
                                        <div class="flex items-center mt-2 rounded-lg px-1 py-1 cursor-pointer {{ $notification->read_at ? '' : 'bg-gray-100' }}">
                                            <div class="ml-1">
                                                <span class="font-semibold tracking-tight text-xs">{{ $notification->data['message'] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a href="{{ route('mark-all-as-read') }}" class="block w-full text-left text-sm py-2 px-4 bg-white hover:bg-gray-100 focus:outline-none">
                                    Tout marquer comme lu
                                </a>
                            </div>
                        @endif
                    </div>




                </div>
            @endif










            <div class="flex items-center ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Gérer le compte') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profil') }}
                            </x-dropdown-link>

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Déconnexion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </nav>
@endif
