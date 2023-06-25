<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('demandes') }}"
                        class="font-semibold text-base text-black hover:text-primary"> Besoins </a>
                </li>
                </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                        <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                    </svg></span>
                <li class="font-semibold text-base text-body-color">Consulter </li>
            </ul>
            </ul>
        </div>
    </x-slot>
    <div class="container mx-auto">
        <div class="p-6">
            <div class="bg-white rounded-lg border border-gray-300 shadow-md p-6">
                <p class="text-lg font-medium mb-2">Domaine de formation : <span class="text-base font-medium text-gray-700 mb-1">{{ $demandes->domaine }}</span></p>
                <p class="text-lg font-medium mb-2">Thèmes de formation : <span class="text-base font-medium text-gray-700 mb-1">{{ $demandes->themes }}</span></p>
                <p class="text-lg font-medium mb-2">Objectifs de la
                    formation : <span class="text-base font-medium text-gray-700 mb-1">{{ $demandes->objectifs }}</span></p>
                <p class="text-lg font-medium mb-2">Formateur : <span class="text-base font-medium text-gray-700 mb-1">{{ $demandes->formateur }}</span></p>
                <p class="text-lg font-medium mb-2">Priorité : <span class="text-base font-medium text-gray-700 mb-1">{{ $demandes->priorite }}</span></p>
                <p class="text-lg font-medium mb-2">Date prévue
                    d'exécution : <span class="text-base font-medium text-gray-700 mb-1">{{ $demandes->date }}</span></p>

                <p class="text-lg font-medium mb-2">Population cible :</p>
                <ul class="list-disc list-inside mb-6">
                    @foreach ($demandes->employees as $employee)
                        <li class="text-base font-medium text-gray-700 mb-1">{{ $employee->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>



</x-app-layout>
