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
                <li class="font-semibold text-base text-body-color"> Employées
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
                                    @php
                                        $countdemande = 1
                                        ;
                                    @endphp
                                    <span class="font-medium">Themes :</span><br>
                                    @foreach ($formations->demandes as $demande)
                                    Demande N°{{ $countdemande }} : {{ $demande->themes }}<br>
                                    @php
                                        $countdemande++;
                                    @endphp
                                    @endforeach
                                </p>
                                <p class="text-gray-600">
                                    <span class="font-medium">Durée :</span> {{ $formations->duree }}
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
                                        <p class="mt-2 text-gray-500">
                                            Voila les informations
                                        </p>
                                </div>
                                @foreach ($evaluations as $evaluation)
                                    <div>
                                        <ul class="flex flex-col text-left space-y-1.5">
                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>Continue de la formation :</p>
                                                @if ($evaluation->rating1 == '1')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating1 == '2')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating1 == '3')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                    </div>
                                                @endif
                                                <p>Commentaire : </p>
                                                {{ $evaluation->observation1 }}
                                            </li>
                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>Méthode pédagogique :</p>

                                                @if ($evaluation->rating2 == '1')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating2 == '2')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating2 == '3')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                    </div>
                                                @endif

                                                <p>Commentaire : </p>

                                                {{ $evaluation->observation2 }}

                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>Méthode pédagogique :</p>

                                                @if ($evaluation->rating3 == '1')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating3 == '2')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating3 == '3')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                    </div>
                                                @endif

                                                <p>Commentaire : </p>

                                                {{ $evaluation->observation3 }}

                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>Méthode pédagogique :</p>

                                                @if ($evaluation->rating4 == '1')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating4 == '2')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating4 == '3')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                    </div>
                                                @endif

                                                <p>Commentaire : </p>

                                                {{ $evaluation->observation4 }}

                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>Méthode pédagogique :</p>

                                                @if ($evaluation->rating5 == '1')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating5 == '2')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating5 == '3')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                    </div>
                                                @endif

                                                <p>Commentaire : </p>

                                                {{ $evaluation->observation5 }}

                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>Méthode pédagogique :</p>

                                                @if ($evaluation->rating6 == '1')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating6 == '2')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating6 == '3')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                    </div>
                                                @endif

                                                <p>Commentaire : </p>

                                                {{ $evaluation->observation6 }}

                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>Méthode pédagogique :</p>

                                                @if ($evaluation->rating7 == '1')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating7 == '2')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating7 == '3')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                    </div>
                                                @endif

                                                <p>Commentaire : </p>

                                                {{ $evaluation->observation7 }}

                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>Méthode pédagogique :</p>

                                                @if ($evaluation->rating8 == '1')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating8 == '2')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @elseif ($evaluation->rating8 == '3')
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bx-star text-yellow-400'></i>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                        <i class='bx bxs-star text-yellow-400'></i>
                                                    </div>
                                                @endif

                                                <p>Commentaire : </p>

                                                {{ $evaluation->observation8 }}

                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>Pour le réponses qui sont notées
                                                    <i class='bx bxs-star text-yellow-400'></i>
                                                    <i class='bx bx-star text-yellow-400'></i>
                                                    <i class='bx bx-star text-yellow-400'></i>
                                                    <i class='bx bx-star text-yellow-400'></i>
                                                    ou
                                                    <i class='bx bxs-star text-yellow-400'></i>
                                                    <i class='bx bxs-star text-yellow-400'></i>
                                                    <i class='bx bx-star text-yellow-400'></i>
                                                    <i class='bx bx-star text-yellow-400'></i>
                                                    , prière expliquer :
                                                </p>

                                                {{ $evaluation->reponse }}

                                            </li>
                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>Souhaitez-vous recevoir des informations sur d'autres thèmes de
                                                    formation :</p>

                                                {{ $evaluation->reponse2 }}

                                            </li>
                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>A qui recommandez-vous ce séminaire :</p>

                                                {{ $evaluation->reponse3 }}

                                            </li>

                                            <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                                <p>Merci</p>
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
