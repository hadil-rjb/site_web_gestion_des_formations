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
                <li class="font-semibold text-base text-body-color"> Présences
                </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                        <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                    </svg></span>
                <li class="font-semibold text-base text-body-color"> Formulaire présences
                </li>
            </ul>
        </div>
    </x-slot>

    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-12 p-5">

                <header class="px-5 py-4 border-b border-gray-100">
                    <div class="font-semibold text-xl text-gray-800 leading-tight">Le Présence formation /
                        sensibilisation</div>
                </header>
                <div class="bg-white overflow-hidden rounded-lg mr">
                    <div class="shadow-xs rounded-lg overflow-hidden w-full">
                        <div class="overflow-x-auto w-full p-4">

                            @if (
                                !(
                                    $presencesglobal->count() ===
                                    $formations->duree *
                                        $formations->demandes->pluck('employees')->flatten()->count() -
                                        $formations->demandes->pluck('employees')->flatten()->count()
                                ))

                                <form action="{{ route('date.store', ['id' => $formations->id]) }}" method="POST">
                                    @csrf
                                    <table id="example3"
                                        class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Employees
                                                </th>

                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                                                    @php
                                                        $firstDate = reset($availableDates);
                                                    @endphp
                                                    <span>{{ $firstDate }}</span>
                                                    <input type="hidden" name="dates" value="{{ $firstDate }}">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                            @php
                                                $displayedids = []; // Initialisation de la variable $displayedNames
                                            @endphp
                                            @foreach ($formations->demandes as $demande)
                                                @foreach ($demande->employees as $employee)
                                                    @php
                                                        $employeeids = $employee->id;
                                                    @endphp
                                                    @if (!in_array($employeeids, $displayedids))
                                                        <tr class="hover:bg-gray-50">
                                                            <td class="px-6 py-4">
                                                                {{ $employee->name }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <div class="flex items-center space-x-6">
                                                                    <label class="flex items-center">
                                                                        <input type="radio"
                                                                            class="form-radio text-blue-500"
                                                                            name="etat[{{ $employee->id }}]"
                                                                            value="present" required>
                                                                        <span
                                                                            class="ml-2 text-gray-700 font-medium">Présent</span>
                                                                    </label>
                                                                    <label class="flex items-center">
                                                                        <input type="radio"
                                                                            class="form-radio text-blue-500"
                                                                            name="etat[{{ $employee->id }}]"
                                                                            value="absent" required>
                                                                        <span
                                                                            class="ml-2 text-gray-700 font-medium">Absent</span>
                                                                    </label>
                                                                    <label class="flex items-center">
                                                                        <input type="radio"
                                                                            class="form-radio text-blue-500"
                                                                            name="etat[{{ $employee->id }}]"
                                                                            value="remplacer" required>
                                                                        <span
                                                                            class="ml-2 text-gray-700 font-medium">Remplacé</span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $displayedids[] = $employeeids;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="flex">
                                        <button type="submit"
                                            class="px-4 py-2 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Enregistrer</button>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('date.storeNote', ['id' => $formations->id]) }}" method="POST">
                                    @csrf
                                    <table id="example3"
                                        class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Employees
                                                </th>

                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                                                    @php
                                                        $firstDate = reset($availableDates);
                                                    @endphp
                                                    <span>{{ $firstDate }}</span>
                                                    <input type="hidden" name="dates" value="{{ $firstDate }}">
                                                </th>

                                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Note
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                                            @php
                                                $displayedids = []; // Initialisation de la variable $displayedNames
                                            @endphp
                                            @foreach ($formations->demandes as $demande)
                                                @foreach ($demande->employees as $employee)
                                                    @php
                                                        $employeeids = $employee->id;
                                                    @endphp
                                                    @if (!in_array($employeeids, $displayedids))
                                                        <tr class="hover:bg-gray-50">
                                                            <td class="px-6 py-4">
                                                                {{ $employee->name }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <div class="flex items-center space-x-6">
                                                                    <label class="flex items-center">
                                                                        <input type="radio"
                                                                            class="form-radio text-blue-500"
                                                                            name="etat[{{ $employee->id }}]"
                                                                            value="present" required>
                                                                        <span
                                                                            class="ml-2 text-gray-700 font-medium">Présent</span>
                                                                    </label>
                                                                    <label class="flex items-center">
                                                                        <input type="radio"
                                                                            class="form-radio text-blue-500"
                                                                            name="etat[{{ $employee->id }}]"
                                                                            value="absent" required>
                                                                        <span
                                                                            class="ml-2 text-gray-700 font-medium">Absent</span>
                                                                    </label>
                                                                    <label class="flex items-center">
                                                                        <input type="radio"
                                                                            class="form-radio text-blue-500"
                                                                            name="etat[{{ $employee->id }}]"
                                                                            value="remplacer" required>
                                                                        <span
                                                                            class="ml-2 text-gray-700 font-medium">Remplacé</span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="number" min="0" max="20"
                                                                    id="note[{{ $formations->id }}][{{ $employee->id }}]"
                                                                    name="note[{{ $formations->id }}][{{ $employee->id }}]"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                    placeholder="Note" required>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $displayedids[] = $employeeids;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="flex">
                                        <button type="submit"
                                            class="px-4 py-2 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Enregistrer</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
