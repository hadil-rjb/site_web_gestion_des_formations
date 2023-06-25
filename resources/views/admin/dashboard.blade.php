<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('dashboard') }}"
                        class="font-semibold text-base text-black hover:text-primary"> Accueil </a>
                </li>
            </ul>
        </div>
    </x-slot>
    <div class="container mx-auto">
        <div class="row">
            <div class="col-12 p-5">
                <div class=" grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <span
                                    class="text-2xl sm:text-3xl font-bold text-gray-900">{{ count($directeurs) }}</span>
                                <h3 class="text-base font-normal text-gray-500">Directeurs</h3>
                            </div>
                            <div class="flex items-center ml-5 text-green-500 text-base font-bold">
                                {{ number_format((count($directeurs) / $total_directeurs) * 100, 2) }}%
                                <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <span
                                    class="text-2xl sm:text-3xl font-bold text-gray-900">{{ count($employees) }}</span>
                                <h3 class="text-base font-normal text-gray-500">Employés</h3>
                            </div>
                            <div class="flex items-center ml-5 text-green-500 text-base font-bold">
                                {{ number_format((count($employees) / $total_employees) * 100, 2) }}%
                                <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-4">
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-2">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl sm:text-3xl font-bold text-gray-900">{{ count($attentes) }}</span>
                                <h3 class="text-base font-normal text-gray-500">Utilisateur en attente</h3>
                            </div>
                            <div class="flex items-center ml-5 text-green-500 text-base font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                    viewBox="0 0 30 25" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                    <path
                                        d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    <div class="bg-black/60 shadow rounded-lg p-4 ">
                        <div class="flex items-center justify-end">
                            <select name="annee" id="annee"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected>Tout</option>
                                @foreach ($annees as $annee)
                                    <option value="{{ $annee }}">{{ $annee }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <div>
                                    <span id="nombre-demandes"
                                        class="text-white text-2xl sm:text-3xl font-bold">{{ count($demandes) }}</span>
                                    <h3 class="text-base font-normal text-white">Demandes</h3>
                                </div>

                                <script>
                                    document.getElementById('annee').addEventListener('change', function() {
                                        var selectedYear = this.value;
                                        var demandes = @json($demandes);
                                        var nombreDemandes = demandes.filter(function(demande) {
                                            var demandeDate = new Date(demande.created_at);
                                            return demandeDate.getFullYear() == selectedYear;
                                        }).length;
                                        document.getElementById('nombre-demandes').textContent = nombreDemandes;
                                    });
                                </script>

                            </div>
                            <div class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-black/60 shadow rounded-lg p-4">
                        <div class="flex items-center justify-end">
                            <select name="annee2" id="annee2"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected>Tout</option>
                                @foreach ($annees as $annee)
                                    <option value="{{ $annee }}">{{ $annee }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span id="nombre-formationsAcc"
                                 class="text-white text-2xl sm:text-3xl font-bold ">{{ count($formationsAcc) }}</span>
                                <h3 class="text-base font-normal text-white">Demandes acceptées</h3>
                            </div>
                            <script>
                                document.getElementById('annee2').addEventListener('change', function() {
                                    var selectedYear = this.value;
                                    var formations = @json($formationsAcc);
                                    var nombreFormationsAcc = formations.filter(function(demande) {
                                        var formationDate = new Date(demande.created_at);
                                        return formationDate.getFullYear() == selectedYear;
                                    }).length;
                                    document.getElementById('nombre-formationsAcc').textContent = nombreFormationsAcc;
                                });
                            </script>
                            <div class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                    <path
                                        d="M20.995 6.9a.998.998 0 0 0-.548-.795l-8-4a1 1 0 0 0-.895 0l-8 4a1.002 1.002 0 0 0-.547.795c-.011.107-.961 10.767 8.589 15.014a.987.987 0 0 0 .812 0c9.55-4.247 8.6-14.906 8.589-15.014zM12 19.897C5.231 16.625 4.911 9.642 4.966 7.635L12 4.118l7.029 3.515c.037 1.989-.328 9.018-7.029 12.264z">
                                    </path>
                                    <path d="m11 12.586-2.293-2.293-1.414 1.414L11 15.414l5.707-5.707-1.414-1.414z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-black/60 shadow rounded-lg p-4">
                        <div class="flex items-center justify-end">
                            <select name="annee3" id="annee3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected>Tout</option>
                                @foreach ($annees as $annee)
                                    <option value="{{ $annee }}">{{ $annee }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span id="nombre-formationsAtt"
                                    class="text-white text-2xl sm:text-3xl font-bold ">{{ count($formationAtt) }}</span>
                                <h3 class="text-base font-normal text-white">Demandes en attente</h3>
                            </div>
                            <script>
                                document.getElementById('annee3').addEventListener('change', function() {
                                    var selectedYear = this.value;
                                    var formationsAtt = @json($formationAtt);
                                    var nombreFormationsAtt = formationsAtt.filter(function(demande) {
                                        var formationDate = new Date(demande.created_at);
                                        return formationDate.getFullYear() == selectedYear;
                                    }).length;
                                    document.getElementById('nombre-formationsAtt').textContent = nombreFormationsAtt;
                                });
                            </script>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                    <path
                                        d="m20.48 6.105-8-4a1 1 0 0 0-.895 0l-8 4a1.002 1.002 0 0 0-.547.795c-.011.107-.961 10.767 8.589 15.014a.99.99 0 0 0 .812 0c9.55-4.247 8.6-14.906 8.589-15.014a1.001 1.001 0 0 0-.548-.795zm-8.447 13.792C5.265 16.625 4.944 9.642 4.999 7.635l7.034-3.517 7.029 3.515c.038 1.989-.328 9.018-7.029 12.264z">
                                    </path>
                                    <path
                                        d="M14.293 8.293 12 10.586 9.707 8.293 8.293 9.707 10.586 12l-2.293 2.293 1.414 1.414L12 13.414l2.293 2.293 1.414-1.414L13.414 12l2.293-2.293z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-4">
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-2">
                        <div class="flex items-center justify-end">
                            <select name="annee4" id="annee4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected>Tout</option>
                                @foreach ($annees as $annee)
                                    <option value="{{ $annee }}">{{ $annee }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span id="nombre-formations"
                                    class="text-2xl sm:text-3xl font-bold text-gray-900">{{ count($formations) }}</span>
                                <h3 class="text-base font-normal text-gray-500">Formations</h3>
                            </div>
                            <script>
                                document.getElementById('annee4').addEventListener('change', function() {
                                    var selectedYear = this.value;
                                    var formations = @json($formations);
                                    var nombreFormations = formations.filter(function(formation) {
                                        var formationDate = new Date(formation.created_at);
                                        return formationDate.getFullYear() == selectedYear;
                                    }).length;
                                    document.getElementById('nombre-formations').textContent = nombreFormations;
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
