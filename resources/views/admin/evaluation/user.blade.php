<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('presence') }}"
                        class="font-semibold text-base text-black hover:text-primary"> Planning </a>
                </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                        <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                    </svg></span>
                <li class="font-semibold text-base text-body-color"> Formations </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                        <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                    </svg></span>
                <li class="font-semibold text-base text-body-color"> Utilisateurs
                </li>
            </ul>
        </div>
    </x-slot>

    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-12 p-5">
                <div class="">
                    <button id="directors-button"
                        class="button-click text-teal-500 bg-transparent border border-solid border-teal-500 hover:bg-teal-500 hover:text-white active:bg-teal-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button">
                        Les Directeurs
                    </button>

                    <button id="employees-button"
                        class="button-click text-teal-500 bg-transparent border border-solid border-teal-500 hover:bg-teal-500 hover:text-white active:bg-teal-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button">
                        Les employés
                    </button>
                </div>

                <div id="directors-table">
                    <header class="px-5 py-4 border-b border-gray-100">
                        <div class="font-semibold text-xl text-gray-800 leading-tight">Les directeurs</div>
                    </header>
                    <div class="bg-white overflow-hidden rounded-lg mr">
                        <div class="shadow-xs rounded-lg overflow-hidden w-full">
                            <div class="overflow-x-auto w-full p-4">
                                <table id="example"
                                    class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Matricule
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                        @foreach ($formations_demandes as $formation)
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-6 py-4">
                                                        {{ $formation->user->matricule }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $formation->user->name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <div class="flex flex-row justify-end">
                                                            <a href="{{ route('evaldirecteur', ['id' => $formations->id, 'id2' => $formation->user->id]) }}"
                                                                class="px-2 py-1 text-gray-700 hover:text-gray-900">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="currentColor"
                                                                    class="w-6 h-6">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="employees-table">
                    <header class="px-5 py-4 border-b border-gray-100">
                        <div class="font-semibold text-xl text-gray-800 leading-tight">Les employées</div>
                    </header>
                    <div class="bg-white overflow-hidden rounded-lg mr">
                        <div class="shadow-xs rounded-lg overflow-hidden w-full">
                            <div class="overflow-x-auto w-full p-4">
                                <table id="example2"
                                    class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Matricule
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                        @foreach ($formations->demandes as $demande)
                                            @foreach ($demande->employees as $employee)
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-6 py-4">
                                                        {{ $employee->matricule }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $employee->name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <div class="flex flex-row justify-end">
                                                            <a href="{{ route('eval', ['id' => $formations->id, 'id2' => $employee->id]) }}"
                                                                class="px-2 py-1 text-gray-700 hover:text-gray-900">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="currentColor"
                                                                    class="w-6 h-6">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
