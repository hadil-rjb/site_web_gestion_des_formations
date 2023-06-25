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
                <li class="flex items-center"> <a
                        class="font-semibold text-base text-black hover:text-primary"> Formations </a>
                </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                    <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                    <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                </svg></span>
                <li class="flex items-center"> <a
                    class="font-semibold text-base text-black hover:text-primary"> Demande </a>
                </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                        <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                    </svg></span>
                <li class="font-semibold text-base text-body-color">Modifier</li>
            </ul>
        </div>
    </x-slot>


    <div class="container mx-auto">
        <div class="p-4">
        <div class="bg-white rounded-lg border border-gray-300 shadow-md p-6">
            <form action="{{ route('demande.update', ['id' => $planning->id, 'id2' => $formations->id, 'id3' => $demandes->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">Domaine :</label>
                    <input type="text" name="domaine" id="domaine"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        value="{{ $demandes->domaine }}" placeholder="Domaine" required>
                </div>
                <div class="mb-5">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                        Thèmes de formation
                    </label>
                    <input type="text" id="themes" name="themes" value="{{ $demandes->themes }}"
                        placeholder="Thèmes de formation"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                </div>
                <div class="mb-5">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                        Objectifs de la formation
                    </label>
                    <input type="text" id="objectifs" name="objectifs" value="{{ $demandes->objectifs }}"
                        placeholder="Objectifs de la formation"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                </div>
                <div class="mb-5">
                    <label for="formateur" class="mb-3 block text-base font-medium text-[#07074D]">
                        Formateur
                    </label>
                    <div class="flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio h-4 w-4 text-[#6B7280]" name="formateur"
                                value="interne" {{ $demandes->formateur === 'interne' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm font-medium text-gray-700">Formateur interne</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio h-4 w-4 text-[#6B7280]" name="formateur"
                                value="externe" {{ $demandes->formateur === 'externe' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm font-medium text-gray-700">Formateur externe</span>
                        </label>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="priorite" class="mb-3 block text-base font-medium text-[#07074D]">
                        Priorité
                    </label>

                    <div class="flex items-center space-x-4">
                        <label for="haute" class="inline-flex items-center">
                            <input type="radio" id="haute" name="priorite" value="haute"
                                class="form-radio h-4 w-4 text-[#6B7280]" {{ $demandes->priorite === 'haute' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm font-medium text-gray-700">Haute priorité</span>
                        </label>

                        <label for="moyenne" class="inline-flex items-center">
                            <input type="radio" id="moyenne" name="priorite" value="moyenne"
                                class="form-radio h-4 w-4 text-[#6B7280]" {{ $demandes->priorite === 'moyenne' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm font-medium text-gray-700">Moyenne priorité</span>
                        </label>

                        <label for="faible" class="inline-flex items-center">
                            <input type="radio" id="faible" name="priorite" value="faible"
                                class="form-radio h-4 w-4 text-[#6B7280]" {{ $demandes->priorite === 'faible' ? 'checked' : '' }}>
                            <span class="ml-2 text-sm font-medium text-gray-700">Faible priorité</span>
                        </label>
                    </div>
                </div>


                <div class="mb-5">
                    <label for="employees">Employés :</label>
                    <select name="employees[]" id="employees"
                        class="employees form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        multiple required>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}"
                                {{ $demandes->employees->contains($employee) ? 'selected' : '' }}>{{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label for="date_execution" class="mb-3 block text-base font-medium text-[#07074D]">
                        Date prévue d'exécution
                    </label>
                    <input type="date" id="date" name="date" value="{{ $demandes->date }}"
                        placeholder="Date prévue d'exécution"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        min="<?php echo date('Y-m-d'); ?>" required/>
                </div>
                <div>
                    <button type="submit"
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">Enregistrer</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</x-app-layout>
