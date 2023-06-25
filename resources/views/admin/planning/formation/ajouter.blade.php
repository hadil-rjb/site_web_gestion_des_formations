<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('planning') }}"
                        class="font-semibold text-base text-black hover:text-primary"> Planning </a>
                </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                        <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                    </svg></span>
                <li class="flex items-center"> <a class="font-semibold text-base text-black hover:text-primary">
                        Formations </a>
                </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                        <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                    </svg></span>
                <li class="font-semibold text-base text-body-color">Ajouter</li>
            </ul>
        </div>
    </x-slot>

    <div class="container mx-auto">
        <div class="p-4">
            <div class="bg-white rounded-lg border border-gray-300 shadow-md p-6">
                <form action="{{ route('formation.ajouter', ['id' => $planning->id]) }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Titre de la formation
                        </label>
                        <input type="text" id="titre" name="titre" value="{{ old('titre') }}"
                            placeholder="Titre de la formation"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            required />
                    </div>
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Domaine
                        </label>
                        <input type="text" id="domaine" name="domaine" value="{{ old('domaine') }}"
                            placeholder="Domaine"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                    </div>
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Thèmes de formation
                        </label>
                        <input type="text" id="themes" name="themes" value="{{ old('Themes') }}"
                            placeholder="Thèmes de formation"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                    </div>
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Objectifs de la formation
                        </label>
                        <input type="text" id="objectifs" name="objectifs" value="{{ old('Objectifs') }}"
                            placeholder="Objectifs de la formation"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                    </div>
                    <div class="mb-5">
                        <label for="formateur" class="mb-3 block text-base font-medium text-[#07074D]">
                            Formateur
                        </label>
                        <div class="flex space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio h-4 w-4 text-[#6B7280]" name="formateurIE"
                                    value="interne">
                                <span class="ml-2 text-sm font-medium text-gray-700">Formateur interne</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio h-4 w-4 text-[#6B7280]" name="formateurIE"
                                    value="externe">
                                <span class="ml-2 text-sm font-medium text-gray-700">Formateur externe</span>
                            </label>
                        </div>
                        @error('formateur')
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
                        <label for="priorite" class="mb-3 block text-base font-medium text-[#07074D]">
                            Priorité
                        </label>

                        <div class="flex items-center space-x-4">
                            <label for="haute" class="inline-flex items-center">
                                <input type="radio" id="haute" name="priorite" value="haute"
                                    class="form-radio h-4 w-4 text-[#6B7280]">
                                <span class="ml-2 text-sm font-medium text-gray-700">Haute priorité</span>
                            </label>

                            <label for="moyenne" class="inline-flex items-center">
                                <input type="radio" id="moyenne" name="priorite" value="moyenne"
                                    class="form-radio h-4 w-4 text-[#6B7280]">
                                <span class="ml-2 text-sm font-medium text-gray-700">Moyenne priorité</span>
                            </label>

                            <label for="faible" class="inline-flex items-center">
                                <input type="radio" id="faible" name="priorite" value="faible"
                                    class="form-radio h-4 w-4 text-[#6B7280]">
                                <span class="ml-2 text-sm font-medium text-gray-700">Faible priorité</span>
                            </label>
                        </div>
                        @error('priorite')
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
                        <label for="employees" class="mb-3 block text-base font-medium text-[#07074D]">
                            Population cible
                        </label>
                        <select name="employees[]" id="employees"
                            class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            multiple>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                        @error('employees')
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


                    @if ($planning->statut == 'en attente')
                        <div class="mb-5">
                            <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                Budget de la formation
                            </label>
                            <input type="number" id="budget" name="budget" value="{{ old('budget') }}"
                                placeholder="Budget de la formation"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                required />
                        </div>
                    @endif
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Date d'exécution
                        </label>
                        <input type="date" id="date" name="date" value="{{ old('date') }}"
                            placeholder="Date d'exécution"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            min="<?php echo date('Y-m-d'); ?>" required />
                    </div>
                    <div class="mb-5">
                        <label for="duree" class="mb-3 block text-base font-medium text-[#07074D]">
                            Durée de la formation
                        </label>
                        <input type="number" id="duree" name="duree" value="{{ old('duree') }}"
                            placeholder="Durée de la formation (en jours)"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            min="1" required />
                    </div>
                    <div class="mb-5">
                        <label for="formateur" class="mb-3 block text-base font-medium text-[#07074D]">
                            Formateur
                        </label>
                        <select id="formateur" name="formateur"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="null" selected>Sélectionner un formateur</option>
                            @foreach ($formateurs as $formateur)
                                <option value="{{ $formateur->id }}">{{ $formateur->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <button
                            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</x-app-layout>
