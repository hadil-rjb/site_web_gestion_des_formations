<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('formateur') }}"
                        class="font-semibold text-base text-black hover:text-primary"> formateurs </a>
                </li>
            </ul>
        </div>
    </x-slot>

    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-12 p-5">
                <div class="mb-6 flex justify-end">
                    <a href="{{ route('formateur.create') }}"
                        class="px-4 py-2 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Ajouter
                        Formateur</a>
                </div>
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
                @if (session('error'))
                    <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <span class="font-medium">{{ session('error') }}</span>
                        </div>
                    </div>
                @endif


                <div class="bg-white overflow-hidden rounded-lg mr">
                    <div class="shadow-xs rounded-lg overflow-hidden w-full">
                      <div class="overflow-x-auto w-full p-4">
                        <table id="example" class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nom Formateur</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tel</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Email</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Adresse</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Specialite</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Experience</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Cabinet</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                @foreach ($formateurs as $formateur)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">{{ $formateur->name }}</td>
                                        <td class="px-6 py-4">{{ $formateur->tel }}</td>
                                        <td class="px-6 py-4">{{ $formateur->email }}</td>
                                        <td class="px-6 py-4">{{ $formateur->adresse }}</td>
                                        <td class="px-6 py-4">{{ $formateur->specialite }}</td>
                                        <td class="px-6 py-4">{{ $formateur->experience }}</td>
                                        <td class="px-6 py-4">{{ $formateur->cabinet ? $formateur->cabinet->name : '' }}</td>


                                        <td class="px-6 py-4">
                                            <div class="flex justify-end gap-4">
                                                <a href="{{ route('formateur.edit', $formateur) }}" class="px-2 py-1"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="h-6 w-6" x-tooltip="tooltip">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                    </svg>
                                                </a>


                                                <form action="{{ route('formateur.destroy',$formateur->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-2 py-1"><svg
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="h-6 w-6" x-tooltip="tooltip">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </form>
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

</x-app-layout>
