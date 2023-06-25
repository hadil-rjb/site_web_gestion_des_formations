<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('besoin') }}"
                        class="font-semibold text-base text-black hover:text-primary"> Demandes </a>
                </li>
            </ul>
        </div>
    </x-slot>

    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-12 p-4">
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
                <form action="{{ route('planning.accepter') }}" method="POST">
                    @csrf
                    <div>
                        <header class="px-5 py-4 border-b border-gray-100">
                            <div class="font-semibold text-xl text-gray-800 leading-tight">Liste des besoin en
                                formation en attente
                            </div>

                            <div class="mb-1 flex justify-end">
                                <button type="submit"
                                    class="px-4 py-2 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Accepter
                                </button>
                            </div>

                        </header>
                        <div class="bg-white overflow-hidden rounded-lg mr">
                            <div class="shadow-xs rounded-lg overflow-hidden w-full">
                                <div class="overflow-x-auto w-full p-4">
                                    <div class="grid gap-6 mb-6 lg:grid-cols-3">
                                        <div>
                                            <label for="domaine"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Domaine</label>
                                            <input type="text" id="domain-filter"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Filtrer par domaine">
                                        </div>
                                        <div>
                                            <label for="priority-filter"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Priorité</label>
                                            <select id="priority-filter"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="">Toutes les priorités</option>
                                                <option value="faible">Faible</option>
                                                <option value="moyenne">Moyenne</option>
                                                <option value="haute">Haute</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="min-date-filter"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                Date de début<span class="ml-24"></span>Date de fin
                                            </label>
                                            <div class="flex items-center ">
                                                <input type="date" id="min-date-filter"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                <div class="inline-block px-2  justify-center">à</div>
                                                <input type="date" id="max-date-filter"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                            </div>
                                        </div>

                                    </div>

                                    <table id="example1"
                                        class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Directeur
                                                </th>
                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Domaine
                                                </th>
                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Thèmes de
                                                    formation</th>
                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Objectifs
                                                    de
                                                    la
                                                    formation
                                                </th>
                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Formateur
                                                </th>
                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Priorité
                                                </th>
                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                                                    Population
                                                    cible
                                                </th>
                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date
                                                    prévue
                                                    d'exécution
                                                </th>
                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                            @foreach ($demandes as $demande)
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-6 py-4">
                                                        <input name="demandes[]" value="{{ $demande->id }}"
                                                            aria-describedby="checkbox-1" type="checkbox"
                                                            class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded">
                                                    </td>
                                                    <td class="px-6 py-4">{{ $demande->user->name }}</td>
                                                    <input type="hidden" name="users[]"
                                                        value="{{ $demande->user->id }}">
                                                    <td class="px-6 py-4">{{ $demande->domaine }}</td>
                                                    <td class="px-6 py-4">{{ $demande->themes }}</td>
                                                    <td class="px-6 py-4">{{ $demande->objectifs }}</td>
                                                    <td class="px-6 py-4">{{ $demande->formateur }}</td>
                                                    <td class="px-6 py-4">{{ $demande->priorite }}</td>
                                                    <td class="px-6 py-4">
                                                        @if (count($demande->employees) > 2)
                                                            {{ count($demande->employees) }} personne
                                                        @else
                                                            @foreach ($demande->employees as $employee)
                                                                {{ $employee->name }}<br>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4">{{ $demande->date }}</td>

                                                    <td class="px-6 py-4">
                                                        <div class="flex justify-end gap-4">
                                                            <a href="{{ route('besoin.show', ['id' => $demande->id]) }}"
                                                                class="px-2 py-1"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                </svg>
                                                            </a>

                                                            <a href="{{ route('besoin.refuser', ['id' => $demande->user->id, 'id2' => $demande->id]) }}"
                                                                style="display: inline;">
                                                                <div type="submit" class="px-2 py-1"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        class="w-6 h-6">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                    </svg>
                                                                </div>
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
                </form>
                <br>
                <hr>
                <div>
                    <header class="px-5 py-4 border-b border-gray-100">
                        <div class="font-semibold text-xl text-gray-800 leading-tight">Liste des besoins en formation
                            refusés
                        </div>
                    </header>
                    <div class="bg-white overflow-hidden rounded-lg mr">
                        <div class="shadow-xs rounded-lg overflow-hidden w-full">
                            <div class="overflow-x-auto w-full p-4">
                                <div class="grid gap-6 mb-6 lg:grid-cols-3">
                                    <div>
                                        <label for="domaine2"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Domaine</label>
                                        <input type="text" id="domain-filter2"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Filtrer par domaine">
                                    </div>
                                    <div>
                                        <label for="priority-filter2"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Priorité</label>
                                        <select id="priority-filter2"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">Toutes les priorités</option>
                                            <option value="faible">Faible</option>
                                            <option value="moyenne">Moyenne</option>
                                            <option value="haute">Haute</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="min-date-filter2"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Date de début<span class="ml-24"></span>Date de fin
                                        </label>
                                        <div class="flex items-center ">
                                            <input type="date" id="min-date-filter2"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                            <div class="inline-block px-2  justify-center">à</div>
                                            <input type="date" id="max-date-filter2"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                        </div>
                                    </div>
                                </div>

                                <table id="example3"
                                    class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Directeur
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Domaine
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Thèmes de
                                                formation</th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Objectifs
                                                de
                                                la
                                                formation
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Formateur
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Priorité
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Population
                                                cible
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date prévue
                                                d'exécution
                                            </th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                        @foreach ($demandesRefuser as $demande)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4">{{ $demande->user->name }}</td>
                                                <td class="px-6 py-4">{{ $demande->domaine }}</td>
                                                <td class="px-6 py-4">{{ $demande->themes }}</td>
                                                <td class="px-6 py-4">{{ $demande->objectifs }}</td>
                                                <td class="px-6 py-4">{{ $demande->formateur }}</td>
                                                <td class="px-6 py-4">{{ $demande->priorite }}</td>
                                                <td class="px-6 py-4">
                                                    @if (count($demande->employees) > 2)
                                                        {{ count($demande->employees) }} personne
                                                    @else
                                                        @foreach ($demande->employees as $employee)
                                                            {{ $employee->name }}<br>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">{{ $demande->date }}</td>

                                                <td class="px-6 py-4">
                                                    <div class="flex justify-end gap-4">
                                                        <a href="{{ route('besoin.show', ['id' => $demande->id]) }}"
                                                            class="px-2 py-1"><svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
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
            </div>
        </div>
    </div>
</x-app-layout>
