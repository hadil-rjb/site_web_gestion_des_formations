<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('demandes') }}"
                        class="font-semibold text-base text-black hover:text-primary"> Besoins </a>
                </li>
            </ul>
        </div>
    </x-slot>
    <div class="container mx-auto">
        <div class="p-6">
            <div class="flex justify-end">
                <a href="{{ route('demandes.create') }}"
                    class="px-4 py-2 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Ajouter une nouvelle demande</a>
            </div>
            <header class="px-5 border-b border-gray-100">
                <div class="font-semibold text-xl text-gray-800 leading-tight">Liste les besoins</div>
            </header><br>
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

            <div class="bg-white overflow-hidden rounded-lg mr">
                <div class="shadow-xs rounded-lg overflow-hidden w-full">
                    <div class="overflow-x-auto w-full p-4">
                        <table id="example" class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Domaine</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Thèmes de formation
                                    </th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Objectifs de la
                                        formation
                                    </th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Formateur</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Priorité</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Population cible</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date prévue
                                        d'exécution
                                    </th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Statut</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                @foreach ($demandes as $demande)
                                    <tr class="hover:bg-gray-50">
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
                                            @if ($demande->statut == 'accepter')
                                              <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100 dark:bg-gray-800/60">
                                                <svg class="w-6 h-4" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                  <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                              </div>
                                            @elseif ($demande->statut == 'refuser')
                                                <div class="inline-flex items-center px-3 py-1 text-red-500 rounded-full gap-x-2 bg-red-100 dark:bg-gray-800/60">
                                                  <svg class="w-5 h-4" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                  </svg>
                                                </div>
                                            @else
                                              <div class="inline-flex items-center px-3 py-1 text-gray-500 rounded-full gap-x-2 bg-gray-100 dark:bg-gray-800/60">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                  </svg>
                                              </div>
                                            @endif
                                          </td>

                                        <td class="px-6 py-4">
                                            <div class="flex justify-end gap-4">
                                                @if ($demande->statut == 'accepter' || $demande->statut == 'refuser')
                                                <a href="{{ route('demandes.show', $demande) }}" class="px-2 py-1"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>

                                                </a>
                                                @else
                                                <a href="{{ route('demandes.show', $demande) }}" class="px-2 py-1"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>

                                                </a>
                                                <a href="{{ route('demandes.edit', $demande) }}"
                                                    class="px-2 py-1"><svg xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                    </svg></a>
                                                <form action="{{ route('demandes.destroy', $demande) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-2 py-1"><svg
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="h-6 w-6"
                                                            x-tooltip="tooltip">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg></button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <br>

        </div>
    </div>




</x-app-layout>
