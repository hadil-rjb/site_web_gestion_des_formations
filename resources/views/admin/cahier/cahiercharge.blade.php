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
                <header class="px-5 py-4 border-b border-gray-100">
                    <div class="font-semibold text-xl text-gray-800 leading-tight">Cahier de charge formation</div>
                </header>
                <div class="bg-white overflow-hidden rounded-lg mr">
                    <div class="shadow-xs rounded-lg overflow-hidden w-full">
                        <div class="overflow-x-auto w-full p-4">
                            <table id="example"
                                class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Titres</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Thèmes de
                                            formation</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Objectifs de la
                                            formation</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Recommandations
                                            pédagogiques</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Mode d'évaluation
                                        </th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Durée</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date estimé</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Personnel à
                                            former</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Profil du
                                            formateur</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Cabinet
                                        </th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($formations as $formation)
                                    @if ($formation->demandes->first() && $formation->demandes->first()->formateur=='externe')
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">
                                            Formation N°{{ $count }} : {{ $formation->titre }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @php
                                                $countdemande = 1;
                                            @endphp
                                            @foreach ($formation->demandes as $demande)
                                                Demande N°{{ $countdemande }} : {{ $demande->themes }}<br>
                                                @php
                                                    $countdemande++;
                                                @endphp
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4">
                                            @foreach ($formation->demandes as $demande)
                                                {{ $demande->objectifs }}<br>
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $formation->cahierDeCharge ? $formation->cahierDeCharge->recommandations : '' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $formation->cahierDeCharge ? $formation->cahierDeCharge->mode : '' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $formation->cahierDeCharge ? $formation->cahierDeCharge->duree : '' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $formation->cahierDeCharge ? $formation->cahierDeCharge->date : '' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $formation->cahierDeCharge ? $formation->cahierDeCharge->personnel : '' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $formation->cahierDeCharge ? $formation->cahierDeCharge->profil : '' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($formation->cahierDeCharge && $formation->cahierDeCharge->cabinets->isNotEmpty())
                                                @foreach ($formation->cahierDeCharge->cabinets as $cabinet)
                                                    {{ $cabinet->name }}@if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>


                                        <td class="px-6 py-4">
                                            @php
                                                $cahierExiste = $formation->cahierDeCharge == null;
                                            @endphp

                                            @if ($plannings->annee >= date('Y') && $cahierExiste)
                                                <div class="flex justify-end gap-4">
                                                    <a href="{{ route('cahier-de-charge.create', ['id' => $formation->id]) }}"
                                                        class="px-2 py-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="h-6 w-6"
                                                            x-tooltip="tooltip">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            @endif

                                        </td>
                                    </tr>
                                    @php
                                        $count++;
                                    @endphp
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
