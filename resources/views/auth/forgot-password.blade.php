<x-guest-layout>
    <!-- component -->

    <body class="font-mono bg-gray-100">
        <!-- Container -->
        <div class="container mx-auto">
            <div class="flex justify-center px-6 my-12">
                <!-- Row -->
                <div class="w-full xl:w-3/4 lg:w-11/12 flex p-7">
                    <!-- Col -->
                    <div class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                        style="background-image: url('https://img.freepik.com/free-vector/forgot-password-concept-illustration_114360-1123.jpg?w=740&t=st=1679348239~exp=1679348839~hmac=55b17d564f27b5072bdde8dc54cf2c38eaff5cb825f64572ad565f9f6fbfdc93')">
                    </div>
                    <!-- Col -->
                    <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                        <div class="px-8 mb-4 text-center">
                            <h3 class="pt-4 mb-2 text-2xl">Mot de passe oublié ?</h3>
                            {{ __('Pas de problème. Veuillez simplement nous indiquer votre adresse e-mail et nous vous enverrons un lien de réinitialisation de mot de passe par e-mail, qui vous permettra d\'en choisir un nouveau.') }}
                        </div>
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <x-validation-errors />

                        <form method="POST" action="{{ route('password.email') }}"
                            class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                            @csrf
                            <div class="mb-4">
                                <x-label class="block mb-2 text-sm font-bold text-gray-700" for="email"
                                    value="{{ __('Email') }}" />
                                <x-input id="email"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    type="email" name="email" :value="old('email')" required autofocus
                                    autocomplete="username" />
                            </div>
                            <div class="mb-6 text-center">
                                <button
                                    class="w-full px-4 py-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700 focus:outline-none focus:shadow-outline">
                                    {{ __('Réinitialiser le mot de passe') }}
                                </button>
                            </div>
                            <hr class="mb-6 border-t" />
                            <div class="text-center">
                                <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                    href="{{ route('register') }}">{{ __('
                                    Créer un compte') }}</a>
                            </div>
                            <div class="text-center">
                                <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800 "
                                    href="{{ route('login') }}">
                                    {{ __('Vous avez déjà un compte ? Connectez-vous !') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-guest-layout>
