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
                <li class="font-semibold text-base text-body-color"><a
                        class="font-semibold text-base text-black hover:text-primary"> Formations</a> </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                        <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                    </svg></span>
                <li class="font-semibold text-base text-body-color"> Présences
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

                    @if (
                        $presencesglobal->count() === 0 ||
                            !(
                                $presencesglobal->count() ===
                                $formations->duree *
                                    $formations->demandes->pluck('employees')->flatten()->count()
                            ))
                        <div class="flex justify-end">
                            <a href="{{ route('date', ['id' => $formations->id]) }}"
                                class="px-4 py-2 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Remplire
                                la presence</a>
                        </div>
                    @endif
                </header>
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
                            <table id="example"
                                class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Employees</th>

                                        @foreach ($dates as $dateth)
                                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                                                {{ \Illuminate\Support\Carbon::parse($dateth)->format('d/m/Y') }}
                                            </th>
                                        @endforeach


                                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Note</th>
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
                                                    @foreach ($dates as $datetd)
                                                        <td class="px-6 py-4">
                                                            @foreach ($employee->presences->where('formation_id', $formations->id) as $presence)
                                                                @if ($presence->date == $datetd)
                                                                    {{ $presence->presence }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    @endforeach
                                                    <td class="px-6 py-4">
                                                        @foreach ($employee->presences->where('formation_id', $formations->id) as $presence)
                                                            {{ $presence->note }}
                                                        @endforeach
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
