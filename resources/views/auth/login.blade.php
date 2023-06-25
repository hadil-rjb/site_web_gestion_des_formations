<x-guest-layout>
    <!-- component -->
    <body class="font-mono bg-gray-100 ">
        <!-- Container -->
        <div class="container mx-auto">
            <div class="flex justify-center px-6 my-12 p-7">
                <!-- Row -->
                <div class="w-full xl:w-4/4 lg:w-10/12 flex">
                    <!-- Col -->
                    <div
                        class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                        style="background-image: url('https://img.freepik.com/free-vector/tablet-login-concept-illustration_114360-7963.jpg?w=740&t=st=1680555880~exp=1680556480~hmac=be36e60e2f491b3dde104bdbfac7189f3103ac9de4a48c1f12c25c8bf2ec0a12')">
                    </div>
                    <!-- Col -->
                    <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                        <div class="text-center">
                        <h3 class="pt-4 text-2xl text-center">Bienvenue</h3>
                        <x-validation-errors class="mb-4" />

                                            @if (session('status'))
                                                <div class="mb-4 font-medium text-sm text-green-600">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                        </div>

                        <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                            @csrf
                            <div class="mb-4">
                                <x-label class="block mb-2 text-sm font-bold text-gray-700" for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            </div>
                            <div class="mb-4">
                                <x-label class="block mb-2 text-sm font-bold text-gray-700" for="password" value="{{ __('Mot de passe') }}" />
                                <x-input id="password" class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="password" name="password" required autocomplete="current-password" />
                            </div>
                            <div class="mb-6 text-center">
                                <button class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                    {{ __('Se connecter') }}
                                </button>
                            </div>
                            <hr class="mb-6 border-t" />
                            <div class="text-center">
                                <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="{{ route('register') }}">{{ __('Créer un compte') }}</a>
                            </div>
                            <div class="text-center">
                                @if (Route::has('password.request'))
                                <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="{{ route('password.request') }}">{{ __('Mot de passe oublié ?') }}</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </x-guest-layout>
