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

    <div class="container">
        <div class="row">
            <div class="col-12 p-5">
                <div class=" grid grid-cols-1 sm:grid-cols-1 gap-4">
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <span
                                    class="text-2xl sm:text-3xl font-bold text-gray-900">{{ count($demandes) }}</span>
                                <h3 class="text-base font-normal text-gray-500">Besoins</h3>
                            </div>
                            <div class="flex items-center ml-5 text-green-500 text-base font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    <div class="bg-black/60 shadow rounded-lg p-4 sm:p-6 xl:p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-white text-2xl sm:text-3xl font-bold ">{{ count($formation_demandes) }}</span>
                                <h3 class="text-base font-normal text-white">Besoins acceptées</h3>
                            </div>
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
                    <div class="bg-black/60 shadow rounded-lg p-4 sm:p-6 xl:p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <span
                                    class="text-white text-2xl sm:text-3xl font-bold ">{{ count($demandes) - count($formation_demandes) - count($formation_ref) }}</span>
                                <h3 class="text-base font-normal text-white">Besoins en attente</h3>
                            </div>
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
                    <div class="bg-black/60 shadow rounded-lg p-4 sm:p-6 xl:p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <span
                                    class="text-white text-2xl sm:text-3xl font-bold ">{{ count($formation_ref) }}</span>
                                <h3 class="text-base font-normal text-white">Besoins en refusée</h3>
                            </div>
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
            </div>
        </div>
    </div>


</x-app-layout>
