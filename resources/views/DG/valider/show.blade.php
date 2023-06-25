<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('valider') }}"
                        class="font-semibold text-base text-black hover:text-primary"> Planning </a>
                </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                        <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                    </svg></span>
                <li class="font-semibold text-base text-body-color">Formations</li>
            </ul>
        </div>
    </x-slot>

    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-12 p-5">
                @if (session('success'))
                    <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif
                @if ($plannings->statutAdmin == 'envoyer')
                    @if ($plannings->statut == 'en attente')
                        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-2">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Budget de la
                                                formation
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                        @php
                                            $totalBudget = 0;
                                        @endphp

                                        @foreach ($formations as $formation)
                                            @php
                                                $budget = intval($formation->budget); // ou floatval($formation->budget) si c'est un nombre à virgule flottante
                                                $totalBudget += $budget;
                                            @endphp
                                        @endforeach

                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4">La somme totale du budget est de : {{ $totalBudget }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('planning.refuser') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="budget" class="text-sm font-medium text-gray-900 block mb-2">Proposez-vous
                                    un autre budget ?</label>
                                <input type="text" id="budget" name="budget"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 input-budget"
                                    placeholder="Saisissez un autre budget ici">
                            </div>
                            <div class="flex justify-end">
                                <div class="ml-3">
                                    <a href="{{ route('planning.valider') }}"
                                        class="inline-block px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">Valider</a>
                                </div>
                                <div class="ml-3">
                                    <button type="submit"
                                        class="inline-block px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600">Refuser</button>
                                </div>
                            </div>
                        </form>
                    @endif

                    <header class="px-5 py-4 border-b border-gray-100">
                        <div class="font-semibold text-xl text-gray-800 leading-tight">Planning annuel des formations
                        </div>
                    </header>
                    <div class="bg-white overflow-hidden rounded-lg mr">
                        <div class="shadow-xs rounded-lg overflow-hidden w-full">
                            <div class="overflow-x-auto w-full p-4">
                                <table id="example"
                                    class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Titre</th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Domaine</th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Thèmes de
                                                formation</th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Objectifs de
                                                la
                                                formation
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Population
                                                cible
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Durée de la
                                                formation
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date
                                                d'exécution</th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Budget de la
                                                formation
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($formations as $formation)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4">
                                                    Formation N°{{ $count }} : {{ $formation->titre }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    @php
                                                        $countdemande = 0;
                                                    @endphp
                                                    @foreach ($formation->demandes as $demande)
                                                        Demande N°{{ $countdemande }}: {{ $demande->domaine }}<br>
                                                        @php
                                                            $countdemande++;
                                                        @endphp
                                                    @endforeach
                                                </td>
                                                <td class="px-6 py-4">
                                                    @foreach ($formation->demandes as $demande)
                                                        {{ $demande->themes }}<br>
                                                    @endforeach
                                                </td>
                                                <td class="px-6 py-4">
                                                    @foreach ($formation->demandes as $demande)
                                                        {{ $demande->objectifs }}<br>
                                                    @endforeach
                                                </td>
                                                <td class="px-6 py-4">
                                                    @foreach ($formation->demandes as $demande)
                                                        @if (count($demande->employees) > 2)
                                                            {{ count($demande->employees) }} personne
                                                        @else
                                                            @foreach ($demande->employees as $employee)
                                                                {{ $employee->name }}<br>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td class="px-6 py-4">{{ $formation->duree }}</td>
                                                <td class="px-6 py-4">{{ $formation->date }}</td>
                                                <td class="px-6 py-4">{{ $formation->budget }}</td>
                                            </tr>
                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                @else
                    <header class="px-5 py-4 border-b border-gray-100">
                        <div class="containter mx-auto px-4">
                            <div
                                class="bg-white p-8 rounded-lg shadow-lg relative">
                                <h1 class="text-2xl text-gray-800 font-semibold mb-3">Veuillez patienter, s'il vous
                                    plaît.</h1>
                                <div>
                                    <span
                                        class="absolute py-2 px-8 text-sm text-white top-0 right-0 bg-indigo-600 rounded-md transform translate-x-2 -translate-y-3 shadow-xl">Attent</span>
                                </div>
                            </div>
                        </div>
                    </header>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
