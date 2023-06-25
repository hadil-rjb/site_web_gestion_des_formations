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
                <li class="font-semibold text-base text-body-color"> Utilisateurs </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path>
                        <path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path>
                    </svg></span>
                <li class="font-semibold text-base text-body-color"> Directeur
                </li>
            </ul>
        </div>
    </x-slot>

    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-12 p-5">
                <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
                    <h2 class="mb-5 text-center text-2xl text-gray-900 font-bold md:text-4xl">L'evaluation de cette
                        formation
                    </h2>
                    <div class="grid gap-8 md:grid-rows-1 lg:grid-cols-1">
                        <div class="p-6 border border-gray-100 rounded-xl bg-gray-50 sm:flex sm:space-x-8 sm:p-8">
                            <div class="space-y-4 text-center sm:text-left">
                                <p class="text-gray-600">
                                    <span class="font-medium">Titre :</span> {{ $formations->titre }}
                                </p>
                                <p class="text-gray-600">
                                    @php
                                      $countdemande = 1;
                                    @endphp
                                    <span class="font-medium">Demandes :</span><br>
                                    @foreach ($formations->demandes as $demande)
                                      <span class="block">Demande N° {{ $countdemande }} : {{ $demande->themes }}</span>
                                      @php
                                        $countdemande++;
                                      @endphp
                                    @endforeach
                                </p>
                                <p class="text-gray-600">
                                    <span class="font-medium">Durée :</span> {{ $formations->duree }} jour
                                </p>
                            </div>

                        </div>

                    </div>
                </div> <br>

                <div class="col-span-12 md:col-span-6 lg:col-span-4 md:order-1 grid gap-4 xl:gap-6">
                    <a
                        class="md:order-2 block rounded-xl border border-gray-200 hover:border-blue-600 transition-shadow hover:shadow-lg group">
                        <div class="overflow-hidden w-full h-full">
                            <div
                                class="p-6 flex bg-white flex-col justify-between md:min-h-[480px] text-center rounded-xl dark:border-gray-700">
                                <div>
                                    @if (isset($message))
                                        <p class="text-gray-500">{{ $message }}</p>
                                    @else
                                        <p class="text-gray-500">
                                            Voila les informations
                                        </p>
                                </div><br>
                                @foreach ($evaluations as $evaluation)
                                    <div>
                                        <ul class="">
                                            <li class="flex gap-x-4 pb-7 overflow-hidden">
                                                <p>Suite à la formation suivie par votre personnel, avez-vous constaté
                                                    des
                                                    résultats tangibles :</p>

                                                {{ $evaluation->resultat }}

                                            </li>
                                            <div class="space-y-4 text-center sm:text-left">
                                                <p class="text-gray-600">
                                                    <span class="font-medium">Si oui, cet impact de la formation, vous
                                                        l'avez observé particulièrement sur
                                                        :
                                                </p>
                                            </div><br>
                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>1-La qualité des tâches exécutées</p>
                                                @if ($evaluation->qualite == 'Oui')
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-green-500">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white translate-x-2 transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @elseif ($evaluation->qualite == 'Non')
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-red-500">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white -translate-x-2 transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>2-Le savoir-faire, les compétences</p>
                                                @if ($evaluation->competences == 'Oui')
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-green-500">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white translate-x-2 transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @elseif ($evaluation->competences == 'Non')
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-red-500">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white -translate-x-2 transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>3-La productivité</p>
                                                @if ($evaluation->productivite == 'Oui')
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-green-500">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white translate-x-2 transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @elseif ($evaluation->productivite == 'Non')
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-red-500">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white -translate-x-2 transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>4-La motiviation du personnel</p>
                                                @if ($evaluation->motiviation == 'Oui')
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-green-500">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white translate-x-2 transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @elseif ($evaluation->motiviation == 'Non')
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-red-500">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white -translate-x-2 transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>5-L'esprit d'initiative du personnel</p>
                                                @if ($evaluation->esprit == 'Oui')
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-green-500">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white translate-x-2 transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @elseif ($evaluation->esprit == 'Non')
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-red-500">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white -translate-x-2 transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>Est-ce que vous avez mis en place un système de mesure de l'impact
                                                    des
                                                    formations :</p>
                                                @if ($evaluation->systeme == 'Oui')
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-green-500">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white translate-x-2 transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @elseif ($evaluation->systeme == 'Non')
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-red-500">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white -translate-x-2 transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex items-center m-2 cursor-pointer cm-toggle-wrapper mb-6">
                                                            <span class="font-semibold text-xs mr-1">
                                                                Non
                                                            </span>
                                                            <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300">
                                                                <div
                                                                    class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out">
                                                                </div>
                                                            </div>
                                                            <span class="font-semibold text-xs ml-1">
                                                                Oui
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p> Que suggérez-vous de faire pour consolider ou améliorer l'impact de
                                                    la
                                                    formation
                                                    dans votre service, et dans l'entreprise en général :</p>
                                                {{ $evaluation->suggerer }}
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
