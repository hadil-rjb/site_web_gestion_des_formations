<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('roles') }}"
                        class="font-semibold text-base text-black hover:text-primary"> Roles </a>
                </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path><path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path></svg></span>
                <li class="font-semibold text-base text-body-color">
                    @if ($user->role==0)
                    Ajouter
                    @else
                    Modifier
                    @endif
                </li>
            </ul>
        </div>
    </x-slot>
    <div class="container mx-auto">
        <div class="p-6">
            <div class="bg-white rounded-lg border border-gray-300 shadow-md p-6">
                @if ($user->role==0)
                <form action="{{ route('roles.ajout', $user) }}" method="POST">
                    @csrf
                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                            <label for="name" class="font-semibold leading-none">Matricule :</label>
                            {{ $user->matricule }}
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="name" class="font-semibold leading-none">Nom :</label>
                            {{ $user->name }}
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="name" class="font-semibold leading-none">Email :</label>
                            {{ $user->email }}
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="name" class="font-semibold leading-none">Service :</label>
                            {{ $user->service }}
                        </div>
                    </div>
                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                            <label for="role" class="font-semibold leading-none p-2">Rôle:</label>
                            <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" disabled selected>Choisissez un rôle</option>
                                <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Directeur</option>
                                <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Directeur général</option>
                                <option value="4" {{ $user->role == 4 ? 'selected' : '' }}>Employée</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <button type="submit"
                            class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">Enregistrer</button>
                    </div>
                </form>
                    @else
                    <form action="{{ route('admin.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="md:flex items-center mt-8">
                            <div class="w-full flex flex-col">
                                <label for="name" class="font-semibold leading-none">Matricule :</label>
                                {{ $user->matricule }}
                            </div>
                            <div class="w-full flex flex-col">
                                <label for="name" class="font-semibold leading-none">Nom :</label>
                                {{ $user->name }}
                            </div>
                            <div class="w-full flex flex-col">
                                <label for="name" class="font-semibold leading-none">Email :</label>
                                {{ $user->email }}
                            </div>
                            <div class="w-full flex flex-col">
                                <label for="name" class="font-semibold leading-none">Service :</label>
                                {{ $user->service }}
                            </div>
                        </div>
                        <div class="md:flex items-center mt-8">
                            <div class="w-full flex flex-col">
                                <label for="role" class="font-semibold leading-none p-2">Rôle:</label>
                                <select id="role" name="role"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Directeur</option>
                                    <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Directeur général
                                    </option>
                                    <option value="4" {{ $user->role == 4 ? 'selected' : '' }}>Employée</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <button type="submit"
                                class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">Enregistrer</button>
                        </div>
                    </form>
                    @endif
            </div>
        </div>
    </div>

</x-app-layout>
