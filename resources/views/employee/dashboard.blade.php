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
                <div class=" grid grid-cols-1 sm:grid-cols-1 gap-4">
                    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <span
                                    class="text-2xl sm:text-3xl font-bold text-gray-900">{{ count($formations) }}</span>
                                <h3 class="text-base font-normal text-gray-500">Formations auxquelles vous avez participé</h3>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

</x-app-layout>
