<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('evaluationFroid') }}"
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
                    <h2 class="mb-5 text-center text-2xl text-gray-900 font-bold md:text-4xl">Evaluation d'impact d'une
                        action de formation
                    </h2>
                    <div class="grid gap-8 md:grid-rows-1 lg:grid-cols-1">
                        <div class="p-6 border border-gray-100 rounded-xl bg-gray-50 sm:flex sm:space-x-8 sm:p-8">
                            <div class="space-y-4 text-center sm:text-left">
                                <p class="text-gray-600">
                                    <span class="font-medium">Titre de la formation :</span> {{ $formations->titre }}
                                </p>
                                <p class="text-gray-600">
                                    <span class="font-medium">Thèmes de la formation :</span>
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
                                    <span class="font-medium">Durée :</span> {{ $formations->duree }}
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
                </div>

                <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6 p-4">
                    <div class="grid gap-8 md:grid-rows-1 lg:grid-cols-1">
                        <div class="p-6 border border-gray-100 rounded-xl bg-gray-50 ">
                            <div class="space-y-4 mt-4 text-center sm:mt-0 sm:text-left">
                                <form
                                    action="{{ route('evaluationFroid.store', ['id' => $formations->id, 'id2' => Auth::user()]) }}"
                                    method="POST">
                                    @csrf

                                    <div class="mb-5">
                                        <label for="reponse" class="block text-base font-medium text-[#07074D] mb-3">
                                            Suite à la formation suivie par votre personnel, avez-vous constaté des
                                            résultats tangibles ?
                                        </label>
                                        <div class="flex items-center space-x-4">
                                            <input id="reponse-aucun" type="radio" name="reponse" value="Aucun"
                                                class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                                                checked>
                                            <label for="reponse-aucun"
                                                class="text-sm font-medium text-gray-900">Aucun</label>
                                            <input id="reponse-négligeables" type="radio" name="reponse"
                                                value="Négligeables"
                                                class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300">
                                            <label for="reponse-négligeables"
                                                class="text-sm font-medium text-gray-900">Négligeables</label>
                                            <input id="reponse-appréciables" type="radio" name="reponse"
                                                value="Appréciables"
                                                class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300">
                                            <label for="reponse-appréciables"
                                                class="text-sm font-medium text-gray-900">Appréciables</label>
                                            <input id="reponse-considérables" type="radio" name="reponse"
                                                value="Considérables"
                                                class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300">
                                            <label for="reponse-considérables"
                                                class="text-sm font-medium text-gray-900">Considérables</label>
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <label for="reponse" class="block text-base font-medium text-[#07074D] mb-3">
                                            Si oui, cet impact de la formation, vous l'avez observé particulièrement sur
                                            :
                                        </label>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div x-data="{ value: 'unset', offValue: 'Off', onValue: 'On' }">
                                                <div class="flex items-center cursor-pointer cm-toggle-wrapper"
                                                    x-on:click="value = (value == onValue ? offValue : onValue);">
                                                    <label for="reponse"
                                                        class="text-sm font-medium text-gray-900 p-4">1-La qualité des
                                                        tâches exécutées</label>
                                                    <span class="font-semibold text-xs mr-1">Non</span>
                                                    <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300"
                                                        :class="{ 'bg-red-500': value == offValue, 'bg-green-500': value ==
                                                                onValue }">
                                                        <div class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out"
                                                            :class="{ '-translate-x-2': value ==
                                                                offValue, 'translate-x-2': value == onValue }">
                                                        </div>
                                                    </div>
                                                    <span class="font-semibold text-xs ml-1">Oui</span>
                                                </div>
                                                <input type="hidden" name="question1"
                                                    x-bind:value="(value == onValue ? 'Oui' : 'Non')" />
                                            </div>
                                            <div x-data="{ value: 'unset', offValue: 'Off', onValue: 'On' }">
                                                <div class="flex items-center cursor-pointer cm-toggle-wrapper"
                                                    x-on:click="value = (value == onValue ? offValue : onValue);">
                                                    <label for="reponse"
                                                        class="text-sm font-medium text-gray-900 p-4">2-Le savoir-faire,
                                                        les compétences</label>
                                                    <span class="font-semibold text-xs mr-1">Non</span>
                                                    <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300"
                                                        :class="{ 'bg-red-500': value == offValue, 'bg-green-500': value ==
                                                                onValue }">
                                                        <div class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out"
                                                            :class="{ '-translate-x-2': value ==
                                                                offValue, 'translate-x-2': value == onValue }">
                                                        </div>
                                                    </div>
                                                    <span class="font-semibold text-xs ml-1">Oui</span>
                                                </div>
                                                <input type="hidden" name="question2"
                                                    x-bind:value="(value == onValue ? 'Oui' : 'Non')" />
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div x-data="{ value: 'unset', offValue: 'Off', onValue: 'On' }">
                                                <div class="flex items-center cursor-pointer cm-toggle-wrapper"
                                                    x-on:click="value = (value == onValue ? offValue : onValue);">
                                                    <label for="reponse"
                                                        class="text-sm font-medium text-gray-900 p-4">3-La
                                                        productivité</label>
                                                    <span class="font-semibold text-xs mr-1">Non</span>
                                                    <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300"
                                                        :class="{ 'bg-red-500': value == offValue, 'bg-green-500': value ==
                                                                onValue }">
                                                        <div class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out"
                                                            :class="{ '-translate-x-2': value ==
                                                                offValue, 'translate-x-2': value == onValue }">
                                                        </div>
                                                    </div>
                                                    <span class="font-semibold text-xs ml-1">Oui</span>
                                                </div>
                                                <input type="hidden" name="question3"
                                                    x-bind:value="(value == onValue ? 'Oui' : 'Non')" />
                                            </div>
                                            <div x-data="{ value: 'unset', offValue: 'Off', onValue: 'On' }">
                                                <div class="flex items-center cursor-pointer cm-toggle-wrapper"
                                                    x-on:click="value = (value == onValue ? offValue : onValue);">
                                                    <label for="reponse"
                                                        class="text-sm font-medium text-gray-900 p-4">4-La motiviation
                                                        du personnel</label>
                                                    <span class="font-semibold text-xs mr-1">Non</span>
                                                    <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300"
                                                        :class="{ 'bg-red-500': value == offValue, 'bg-green-500': value ==
                                                                onValue }">
                                                        <div class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out"
                                                            :class="{ '-translate-x-2': value ==
                                                                offValue, 'translate-x-2': value == onValue }">
                                                        </div>
                                                    </div>
                                                    <span class="font-semibold text-xs ml-1">Oui</span>
                                                </div>
                                                <input type="hidden" name="question4"
                                                    x-bind:value="(value == onValue ? 'Oui' : 'Non')" />
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-4">
                                            <div x-data="{ value: 'unset', offValue: 'Off', onValue: 'On' }">
                                                <div class="flex items-center cursor-pointer cm-toggle-wrapper"
                                                    x-on:click="value = (value == onValue ? offValue : onValue);">
                                                    <label for="reponse"
                                                        class="text-sm font-medium text-gray-900 p-4">5-L'esprit
                                                        d'initiative du personnel</label>
                                                    <span class="font-semibold text-xs mr-1">Non</span>
                                                    <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300"
                                                        :class="{ 'bg-red-500': value == offValue, 'bg-green-500': value ==
                                                                onValue }">
                                                        <div class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out"
                                                            :class="{ '-translate-x-2': value ==
                                                                offValue, 'translate-x-2': value == onValue }">
                                                        </div>
                                                    </div>
                                                    <span class="font-semibold text-xs ml-1">Oui</span>
                                                </div>
                                                <input type="hidden" name="question5"
                                                    x-bind:value="(value == onValue ? 'Oui' : 'Non')" />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-5">
                                        <label for="reponse" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Est-ce que vous avez mis en place un système de mesure de l'impact des
                                            formations ?
                                        </label>
                                        <div class="grid grid-cols-1 gap-4">
                                            <div x-data="{ value: 'unset', offValue: 'Off', onValue: 'On' }">
                                                <div class="flex items-center cursor-pointer cm-toggle-wrapper"
                                                    x-on:click="value = (value == onValue ? offValue : onValue);">
                                                    <span class="font-semibold text-xs mr-1">Non</span>
                                                    <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300"
                                                        :class="{ 'bg-red-500': value == offValue, 'bg-green-500': value ==
                                                                onValue }">
                                                        <div class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out"
                                                            :class="{ '-translate-x-2': value ==
                                                                offValue, 'translate-x-2': value == onValue }">
                                                        </div>
                                                    </div>
                                                    <span class="font-semibold text-xs ml-1">Oui</span>
                                                </div>
                                                <input type="hidden" name="reponse2"
                                                    x-bind:value="(value == onValue ? 'Oui' : 'Non')" />
                                            </div>
                                        </div>

                                    </div>


                                    <div class="mb-5">
                                        <label for="reponse" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Que suggérez-vous de faire pour consolider ou améliorer l'impact de la
                                            formation
                                            dans votre service, et dans l'entreprise en général ?
                                        </label>
                                        <textarea id="reponse" name="reponse3" placeholder="Entrez votre réponse ici..."
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ old('reponse') }}</textarea>
                                    </div>

                                    <div class="flex justify-end">
                                        <button
                                            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                                            Submit
                                        </button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
