<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('planningCahier') }}"
                        class="font-semibold text-base text-black hover:text-primary"> Planning </a>
                </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                        <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                    </svg></span>
                <li class="font-semibold text-base text-body-color">Cahier de charge</li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                        <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                    </svg></span>
                <li class="font-semibold text-base text-body-color">Ajouter </li>
            </ul>
        </div>
    </x-slot>

    <div class="container mx-auto">
        <div class="p-4">
            @if (session('error'))
                <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                </div>
            @endif


            <div class="bg-white rounded-lg border border-gray-300 shadow-md p-6">

                <form action="{{ route('cahier-de-charge.store', $formations->id) }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="domaine" class="mb-3 block text-base font-medium text-[#07074D]">
                            Domaine
                        </label>
                        <select id="domaine" name="domaine"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="">Sélectionnez un domaine</option>
                            @foreach ($formations->demandes as $demande)
                                <option value="{{ $demande->domaine }}">{{ $demande->domaine }}</option>
                            @endforeach
                        </select>
                        @error('domaine')
                            <div class="flex bg-red-100 rounded-lg p-3 mb-4 text-sm text-red-700 mt-2" role="alert">
                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="themes" class="mb-3 block text-base font-medium text-[#07074D]">
                            Thèmes de formation
                        </label>
                        <select id="themes" name="themes"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="">Sélectionnez un thème de formation</option>
                            @foreach ($formations->demandes as $demande)
                                <option value="{{ $demande->themes }}">{{ $demande->themes }}</option>
                            @endforeach
                        </select>
                        @error('themes')
                            <div class="flex bg-red-100 rounded-lg p-3 mb-4 text-sm text-red-700 mt-2" role="alert">
                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                    </div>


                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Recommandations pédagogiques
                        </label>
                        <input type="text" id="recommandations" name="recommandations"
                            value="{{ old('recommandations') }}" placeholder="Recommandations pédagogiques"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @error('recommandations')
                            <div class="flex bg-red-100 rounded-lg p-3 mb-4 text-sm text-red-700 mt-2" role="alert">
                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="mode" class="mb-3 block text-base font-medium text-[#07074D]">
                            Mode d'évaluation
                        </label>
                        <input type="text" id="mode" name="mode" value="{{ old('mode') }}"
                            placeholder="Mode evaluation"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @error('mode')
                            <div class="flex bg-red-100 rounded-lg p-3 mb-4 text-sm text-red-700 mt-2" role="alert">
                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="duree" class="mb-3 block text-base font-medium text-[#07074D]">
                            Durée
                        </label>
                        <select id="duree" name="duree"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="">Sélectionnez un durée de la formation (en jours)</option>
                            <option value="{{ $formations->duree }}">{{ $formations->duree }}</option>
                        </select>
                        @error('duree')
                            <div class="flex bg-red-100 rounded-lg p-3 mb-4 text-sm text-red-700 mt-2" role="alert">
                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                            Date estimé
                        </label>
                        <select id="date" name="date"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="">Sélectionnez un date</option>
                            <option value="{{ $formations->date }}">{{ $formations->date }}</option>
                        </select>
                        @error('date')
                            <div class="flex bg-red-100 rounded-lg p-3 mb-4 text-sm text-red-700 mt-2" role="alert">
                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="personnel" class="mb-3 block text-base font-medium text-[#07074D]">
                            Personnel à former
                        </label>
                        <select id="personnel" name="personnel"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="">Sélectionnez le personnel à former</option>
                            @php
                                $employeeCount = 0; // Initialiser le compteur d'employés à 0
                            @endphp

                            @foreach ($formations->demandes as $demande)
                                @php
                                    $employeeCount += count($demande->employees); // Ajouter le nombre d'employés de chaque demande
                                @endphp
                            @endforeach

                            <option value="{{ $employeeCount }}">{{ $employeeCount }} personne</option>
                        </select>

                        @error('personnel')
                            <div class="flex bg-red-100 rounded-lg p-3 mb-4 text-sm text-red-700 mt-2" role="alert">
                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="profil" class="mb-3 block text-base font-medium text-[#07074D]">
                            Profil du formateur
                        </label>
                        <input type="text" id="profil" name="profil" value="{{ old('profil') }}"
                            placeholder="Profil du formateur"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @error('profil')
                            <div class="flex bg-red-100 rounded-lg p-3 mb-4 text-sm text-red-700 mt-2" role="alert">
                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                            Cabinets
                        </label>
                        <select name="cabinet[]" id="cabinet"
                            class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            multiple>
                            @foreach ($cabinets as $cabinet)
                                <option value="{{ $cabinet->id }}"
                                    {{ in_array($cabinet->id, (array) old('cabinet', [])) ? 'selected' : '' }}>
                                    {{ $cabinet->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('cabinet')
                            <div class="flex bg-red-100 rounded-lg p-3 mb-4 text-sm text-red-700 mt-2" role="alert">
                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <button
                            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                            Envoyer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</x-app-layout>
