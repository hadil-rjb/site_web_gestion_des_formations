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
                <li class="flex items-center"> <a href=""
                        class="font-semibold text-base text-black hover:text-primary"> Formations </a>
                </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                        <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                    </svg></span>
                <li class="font-semibold text-base text-body-color">Remplir</li>
            </ul>
        </div>
    </x-slot>
    <div class="container mx-auto">
        <div class="p-4">
            <div class="bg-white rounded-lg border border-gray-300 shadow-md p-6">
                <form action="{{ route('planning.store', ['id' => $formations->id]) }}" method="POST">
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



</x-app-layout>
