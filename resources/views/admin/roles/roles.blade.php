<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('roles') }}"
                        class="font-semibold text-base text-black hover:text-primary"> Roles </a>
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
                <div>
                  </div>
                <header class="px-5 py-4 border-b border-gray-100">
                    <div class="font-semibold text-xl text-gray-800 leading-tight">Nouveaux utilisateurs
                    </div>
                </header>

                <div class="bg-white overflow-hidden rounded-lg mr">
                    <div class="shadow-xs rounded-lg overflow-hidden w-full">
                        <div class="overflow-x-auto w-full p-4">
                            <table id="example"
                                class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Matricule</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nom</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Email</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Service</th>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                    @foreach ($users as $user)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4">{{ $user->matricule }}</td>
                                            <td class="px-6 py-4">{{ $user->name }}</td>
                                            <td class="px-6 py-4">{{ $user->email }}</td>
                                            <td class="px-6 py-4">{{ $user->service }}</td>
                                            <td class="px-6 py-4">
                                                <div class="flex justify-end gap-4">
                                                    <a href="{{ route('admin.edit', $user) }}"
                                                        class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                                          </svg>

                                                    </a>
                                                    <form method="POST" action="{{ url('/admin' . '/' . $user->id) }}"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><svg
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="h-6 w-6"
                                                                x-tooltip="tooltip">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg></button>
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

                <header class="px-5 py-4 border-b border-gray-100">
                    <div class="font-semibold text-xl text-gray-800 leading-tight">Tous les utilisateurs</div>
                </header>

                    <div class="bg-white overflow-hidden rounded-lg mr">
                        <div class="shadow-xs rounded-lg overflow-hidden w-full">
                            <div class="overflow-x-auto w-full p-4">
                                <table id="example2"
                                    class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Matricule</th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nom</th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Email</th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Service</th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Role</th>
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                        @foreach ($nouveaus as $nouveau)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4">{{ $nouveau->matricule}}</td>
                                                <td class="px-6 py-4">{{ $nouveau->name }}</td>
                                                <td class="px-6 py-4">{{ $nouveau->email }}</td>
                                                <td class="px-6 py-4">{{ $nouveau->service }}</td>
                                                <td class="px-6 py-4">
                                                    @if ($nouveau->role==2)
                                                        Directeur
                                                    @elseif ($nouveau->role==3)
                                                        Directeur géneral
                                                    @elseif ($nouveau->role==4)
                                                        Employée
                                                    @endif

                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex justify-end gap-4">
                                                        <a href="{{ route('admin.edit', $nouveau) }}"
                                                            class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                            </svg>
                                                        </a>
                                                        <form method="POST" action="{{ url('/admin' . '/' . $nouveau->id) }}"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="h-6 w-6"
                                                                    x-tooltip="tooltip">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg></button>
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

</x-app-layout>
