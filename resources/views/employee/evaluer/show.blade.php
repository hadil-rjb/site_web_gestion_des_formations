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
                                    <span class="font-medium">Titres :</span> {{ $formations->titre }}
                                </p>
                                <p class="text-gray-600">
                                    <span class="font-medium">Durée :</span> {{ $formations->duree }} jours
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
                                    <p class="mt-2 text-gray-500">
                                        Voila les informations
                                    </p>
                                </div>
                                <div>
                                    <ul class="flex flex-col text-left space-y-1.5">
                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>Continue de la formation :</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                            <p>Commentaire : </p>
                                            @foreach ($evaluations as $evaluation)
                                                {{ $evaluation->observation1 }}
                                            @endforeach
                                        </li>
                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>Méthode pédagogique :</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                            <p>Commentaire : </p>
                                            @foreach ($evaluations as $evaluation)
                                                {{ $evaluation->observation2 }}
                                            @endforeach
                                        </li>

                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>Méthode pédagogique :</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                            <p>Commentaire : </p>
                                            @foreach ($evaluations as $evaluation)
                                                {{ $evaluation->observation3 }}
                                            @endforeach
                                        </li>

                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>Méthode pédagogique :</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                            <p>Commentaire : </p>
                                            @foreach ($evaluations as $evaluation)
                                                {{ $evaluation->observation4 }}
                                            @endforeach
                                        </li>

                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>Méthode pédagogique :</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                            <p>Commentaire : </p>
                                            @foreach ($evaluations as $evaluation)
                                                {{ $evaluation->observation5 }}
                                            @endforeach
                                        </li>

                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>Méthode pédagogique :</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                            <p>Commentaire : </p>
                                            @foreach ($evaluations as $evaluation)
                                                {{ $evaluation->observation6 }}
                                            @endforeach
                                        </li>

                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>Méthode pédagogique :</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                            <p>Commentaire : </p>
                                            @foreach ($evaluations as $evaluation)
                                                {{ $evaluation->observation7 }}
                                            @endforeach
                                        </li>

                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>Méthode pédagogique :</p>
                                            @foreach ($evaluations as $evaluation)
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
                                            @endforeach
                                            <p>Commentaire : </p>
                                            @foreach ($evaluations as $evaluation)
                                                {{ $evaluation->observation8 }}
                                            @endforeach
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
                                                , prière expliquer :</p>
                                            @foreach ($evaluations as $evaluation)
                                                {{ $evaluation->reponse }}
                                            @endforeach
                                        </li>
                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>Souhaitez-vous recevoir des informations sur d'autres thèmes de
                                                formation :</p>
                                            @foreach ($evaluations as $evaluation)
                                                {{ $evaluation->reponse2 }}
                                            @endforeach
                                        </li>
                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>A qui recommandez-vous ce séminaire :</p>
                                            @foreach ($evaluations as $evaluation)
                                                {{ $evaluation->reponse3 }}
                                            @endforeach
                                        </li>

                                        <li class=" flex gap-x-4 pb-7 overflow-hidden">
                                            <p>Merci</p>
                                        </li>


                                    </ul>
                                </div>



                            </div>

                            <div
                                class="absolute top-1/2 -left-1/2 -z-[1] w-60 h-32 bg-purple-200 blur-[100px] -translate-y-1/2 dark:bg-violet-900/30">
                            </div>
                        </div>
                    </a>

                </div>

            </div>
        </div>
    </div>



</x-app-layout>
