<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('valider') }}"
                        class="font-semibold text-base text-black hover:text-primary"> Planning </a>
                </li>
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


                <div class="bg-white overflow-hidden rounded-lg mr">
                    <div class="shadow-xs rounded-lg overflow-hidden w-full">
                        <div class="overflow-x-auto w-full p-4">
                            <table id="example2"
                                class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Id</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Budget</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Statut</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Année</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                    @php
                                        $count = 1;
                                    @endphp

                                    @foreach ($plannings as $planning)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4">{{ $count }}</td>
                                            <td class="px-6 py-4">{{ $planning->budget }}</td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center justify-center rounded-lg p-1 text-sm font-medium
                                                            @if($planning->statut == 'valider')
                                                              bg-green-100 text-green-700
                                                            @elseif($planning->statut == 'en attente')
                                                              bg-yellow-200 text-yellow-800
                                                            @endif">
                                                  {{ $planning->statut }}
                                                </div>
                                            </td>

                                            <td class="px-6 py-4">{{ $planning->annee }}</td>
                                            <td class="px-6 py-4">
                                                <div class="flex justify-end gap-4">
                                                    <a href="{{ route('planning.vue', ['id' => $planning->id]) }}" class="px-2 py-1"><svg
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
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
            </div>
        </div>
    </div>
</x-app-layout>
