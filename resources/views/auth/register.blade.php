<x-guest-layout>
    <!-- component -->

    <body class="font-mono bg-gray-100">
        <!-- Container -->
        <div class="container mx-auto">
            <div class="flex justify-center px-6 my-12">
                <!-- Row -->
                <div class="w-full xl:w-9/4 lg:w-12/12 flex">
                    <!-- Col -->
                    <div class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                        style="background-image: url('https://img.freepik.com/free-vector/sign-up-concept-illustration_114360-7965.jpg?w=740&t=st=1682543646~exp=1682544246~hmac=7ea77df3ba0912c9b0c931faf0514114d629e11af6255130654ac66e591c2ab3')">
                    </div>
                    <!-- Col -->
                    <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                        <h3 class="pt-4 text-2xl text-center">Créer un compte</h3>
                        <x-validation-errors />

                        @if (session('status'))
                        <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <div>
                                <span class="font-medium">{{ session('status') }}</span> {{ session('status') }}
                            </div>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}"
                            class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                            @csrf
                            <div class="mb-4">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <x-label class="block mb-2 text-sm font-bold text-gray-700" for="matricule"
                                        value="{{ __('Matricule') }}" />
                                    <x-input id="matricule"
                                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="text" name="matricule" :value="old('matricule')" required autofocus
                                        autocomplete="name" />
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <x-label class="block mb-2 text-sm font-bold text-gray-700" for="name"
                                        value="{{ __('Nom') }}" />
                                    <x-input id="name"
                                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="text" name="name" :value="old('name')" required autofocus
                                        autocomplete="name" />
                                </div>
                            </div>
                            <div class="mb-4">
                                <x-label class="block mb-2 text-sm font-bold text-gray-700" for="email"
                                    value="{{ __('Email') }}" />
                                <x-input id="email"
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    type="email" name="email" :value="old('email')" required autocomplete="username" />
                            </div>
                            <div class="mb-4 flex">
                                <div class="w-1/2 mb-4 md:mr-2 md:mb-0">
                                    <x-label class="block mb-2 text-sm font-bold text-gray-700" for="password"
                                        value="{{ __('Mot de passe') }}" />
                                    <x-input id="password"
                                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="password" name="password" required autocomplete="new-password" />
                                </div>
                                <div class="w-1/2 mb-4 md:mr-2 md:mb-0">
                                    <x-label class="block mb-2 text-sm font-bold text-gray-700"
                                        for="password_confirmation" value="{{ __('Confirmer le mot de passe') }}" />
                                    <x-input id="password_confirmation"
                                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="password" name="password_confirmation" required
                                        autocomplete="new-password" />
                                </div>
                            </div>


                            <div class="mb-4">

                                <label for="service" class="block mb-2 text-sm font-bold text-gray-700">Sélectionner un service</label>
                                <select id="service" name="service"
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    required>
                                    <option value="Aucun">Aucun</option>
                                    <option value="Commercial">Commercial</option>
                                    <option value="Marketing">Marketing</option>
                                </select>
                                <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mb-3">
                                    <x-label for="terms">
                                        <div class="form-check">
                                            <x-checkbox name="terms" id="terms" required />
                                            <label class="form-check-label" for="terms">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' =>
                                                        '<a target="_blank" href="' .
                                                        route('terms.show') .
                                                        '" class="text-sm text-gray-600 hover:text-gray-900">' .
                                                        __('Terms of Service') .
                                                        '</a>',
                                                    'privacy_policy' =>
                                                        '<a target="_blank" href="' .
                                                        route('policy.show') .
                                                        '" class="text-sm text-gray-600 hover:text-gray-900">' .
                                                        __('Privacy Policy') .
                                                        '</a>',
                                                ]) !!}
                                            </label>
                                        </div>
                                    </x-label>
                                </div>
                            @endif

                            <div class="mb-6 text-center">
                                <button
                                    class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline ">
                                    {{ __('S\'inscrire') }}
                                </button>
                            </div>
                            <hr class="mb-6 border-t" />
                            <div class="text-center">
                                <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                    href="{{ route('password.request') }}">{{ __('Mot de passe oublié ?') }}</a>
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
