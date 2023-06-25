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
                <li class="font-semibold text-base text-body-color">Demandes</li>
            </ul>
        </div>
    </x-slot>
    <div class="container mx-auto">


        <div class="p-4">
            @foreach ($formations as $formation)
                @foreach ($formation->demandes as $demande)
                    <header class="px-5 py-4 border-b border-gray-100">
                        <div class="font-semibold text-xl text-gray-800 leading-tight">La demande de :
                            {{ $demande->user->name }}</div>
                    </header>
                        <div class="bg-white rounded-lg border border-gray-300 shadow-md p-6">
                            <p class="text-lg font-medium mb-2">Nom de domaine : {{ $demande->domaine }}</p>
                            <p class="text-lg font-medium mb-2">Thèmes de formation : {{ $demande->themes }}</p>
                            <p class="text-lg font-medium mb-2">Objectifs de la formation : {{ $demande->objectifs }}</p>
                            <p class="text-lg font-medium mb-2">Formateur : {{ $demande->formateur }}</p>
                            <p class="text-lg font-medium mb-2">Priorité : {{ $demande->priorite }}</p>
                            <p class="text-lg font-medium mb-2">Population cible :</p>
                            <ul class="list-disc list-inside mb-2">
                                @foreach ($demande->employees as $employee)
                                    <li class="text-base font-medium text-gray-700 mb-1">{{ $employee->name }}</li>
                                @endforeach
                            </ul>
                            <p class="text-lg font-medium">Date prévue d'exécution : {{ $demande->date }}</p>
                            <div class="flex justify-end">
                                <!-- Ajout de la classe pour le bouton -->
                                <a href="{{ route('demande.modifier', ['id' => $planning->id, 'id2' => $formation->id, 'id3' => $demande->id]) }}"
                                     class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                                    Modifier
                                </a>
                            </div>
                        </div>
                @endforeach
            @endforeach
        </div>



    </div>



</x-app-layout>
