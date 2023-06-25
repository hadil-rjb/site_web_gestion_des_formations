<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('evaluation') }}"
                        class="font-semibold text-base text-black hover:text-primary"> Evaluation </a>
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
                <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
                    <h2 class="mb-5 text-center text-2xl text-gray-900 font-bold md:text-4xl">Evaluation cette
                        formation
                    </h2>
                    <div class="grid gap-8 md:grid-rows-1 lg:grid-cols-1">
                        <div class="p-6 border border-gray-100 rounded-xl bg-gray-50 sm:flex sm:space-x-8 sm:p-8">
                            <div class="space-y-4 text-center sm:text-left">
                                <p class="text-gray-600">
                                    <span class="font-medium">Titre de la formation :</span> {{ $formations->titre }}
                                </p>
                                <p class="text-gray-600">
                                    <span class="font-medium">Themes de la formation :</span>
                                    @php
                                      $countdemande = 1;
                                    @endphp
                                    @foreach ($formations->demandes as $demande)
                                      <span class="block">Demande N° {{ $countdemande }} : {{ $demande->themes }}</span>
                                      @php
                                        $countdemande++;
                                      @endphp
                                    @endforeach
                                </p>
                                <p class="text-gray-600">
                                    <span class="font-medium">Date de la formation :</span> {{ $formations->date }}
                                </p>
                                <p class="text-gray-600">
                                    <span class="font-medium">Durée :</span> {{ $formations->duree }} jours
                                </p>
                                <p class="text-gray-600">
                                    <span class="font-medium">Formateur :</span> {{ $formations->formateur->name ?? 'Aucun formateur disponible' }}
                                </p>
                                <p class="text-gray-600">
                                    <span class="font-medium">Organisme formateur :</span> {{ $formations->formateur->cabinet->name ?? 'Aucun organisme disponible' }}
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
                                    <p class="text-gray-500">
                                        Voila les informations
                                    </p>
                                </div><br>
                                <div>
                                    <ul class="">
                                        <li class="flex gap-x-4 pb-7 overflow-hidden">
                                            <p>Suite à la formation suivie par votre personnel, avez-vous constaté des
                                                résultats tangibles :</p>
                                            @foreach ($evaluations as $evaluation)
                                                {{ $evaluation->resultat }}
                                            @endforeach
                                        </li>
                                        <div class="space-y-4 text-center sm:text-left">
                                        <p class="text-gray-600">
                                            <span class="font-medium">Si oui, cet impact de la formation, vous l'avez observé particulièrement sur
                                                :
                                        </p></div><br>
                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>1-La qualité des tâches exécutées</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                        </li>

                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>2-Le savoir-faire, les compétences</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                        </li>

                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>3-La productivité</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                        </li>

                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>4-La motiviation du personnel</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                        </li>

                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>5-L'esprit d'initiative du personnel</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                        </li>

                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>Est-ce que vous avez mis en place un système de mesure de l'impact des
                                                formations :</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                        </li>

                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p> Que suggérez-vous de faire pour consolider ou améliorer l'impact de la
                                                formation
                                                dans votre service, et dans l'entreprise en général :</p>
                                            @foreach ($evaluations as $evaluation)
                                                {{ $evaluation->suggerer }}
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
