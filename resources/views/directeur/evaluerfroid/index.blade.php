<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('evaluation') }}"
                        class="font-semibold text-base text-black hover:text-primary">
                        Évaluation </a>
                </li>
            </ul>
        </div>
    </x-slot>

    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-12 px-5">
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
                    <div class="font-semibold text-xl text-gray-800 leading-tight">Liste des formations en attente d'évaluation</div>
                </header>
                <div class="bg-white overflow-hidden rounded-lg mr">
                    <div class="shadow-xs rounded-lg overflow-hidden w-full">
                        <div class="overflow-x-auto w-full p-4">
                            <table id="example2"
                                class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Id</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Formation</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Demandes</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                    @php
                                        $count = 1;
                                    @endphp

                                    @foreach ($formations as $formation)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4">Formation N° {{ $count }}</td>
                                            <td class="px-6 py-4">{{ $formation->titre }}</td>
                                            <td class="px-6 py-4">
                                                @php
                                        $countdemande = 1;
                                    @endphp
                                                @foreach ($formation->demandes as $demande)
                                                Demande N° {{ $countdemande }} : {{ $demande->themes }}<br>
                                                @php
                                                $countdemande++;
                                            @endphp
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-4">
                                            {{--  les formations apres 6 mois --}}
                                               {{-- @if (strtotime('+6 months', strtotime($formation->date)) <= strtotime(date('Y-m-d')))
                                                <div class="flex flex-row justify-end">
                                                    <a href="{{ route('evaluerfroid.show', $formation->id) }}"
                                                        class="px-2 py-1 text-gray-700 hover:text-gray-900">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                @endif --}}
                                                <div class="flex flex-row justify-end">
                                                    <a href="{{ route('evaluerfroid.show', $formation->id) }}"
                                                        class="px-2 py-1 text-gray-700 hover:text-gray-900">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
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

                <header class="px-5 py-4 border-b border-gray-100">
                    <div class="font-semibold text-xl text-gray-800 leading-tight">Liste des formations évaluées</div>
                </header>
                <div class="bg-white overflow-hidden rounded-lg mr">
                    <div class="shadow-xs rounded-lg overflow-hidden w-full">
                        <div class="overflow-x-auto w-full p-4">
                            <table id="example"
                                class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Id</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Formation
                                        </th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Demandes
                                        </th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                    @php
                                        $count = 1;
                                    @endphp

                                    @foreach ($formations2 as $formation)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4">Formation N° {{ $count }}</td>
                                            <td class="px-6 py-4">{{ $formation->titre }}</td>
                                            <td class="px-6 py-4">
                                                @php
                                        $countdemande = 1;
                                    @endphp
                                                @foreach ($formation->demandes as $demande)
                                                Demande N° {{ $countdemande }} {{ $demande->themes }}<br>
                                                @php
                                                $countdemande++;
                                            @endphp
                                                @endforeach</td>
                                            <td class="px-6 py-4">

                                                <div class="flex flex-row justify-end">
                                                    <a href="{{ route('apresEvaluerFroid.show', $formation->id) }}"
                                                        class="px-2 py-1 text-gray-700 hover:text-gray-900">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" class="w-6 h-6">
                                                            <path fill-rule="evenodd"
                                                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>

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
                <br>
            </div>
        </div>
    </div>


</x-app-layout>
