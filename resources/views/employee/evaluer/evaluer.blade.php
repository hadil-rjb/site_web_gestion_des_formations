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
                    <h2 class="mb-5 text-center text-2xl text-gray-900 font-bold md:text-4xl">Merci d'évaluer cette
                        formation
                    </h2>
                    <div class="grid gap-8 md:grid-rows-1 lg:grid-cols-1">
                        <div class="p-6 border border-gray-100 rounded-xl bg-gray-50 sm:flex sm:space-x-8 sm:p-8">
                            <img class="w-80 h-90"
                                src="https://i.pinimg.com/564x/8d/5e/e5/8d5ee5fc2c0fbfc1e6faf4248520f810.jpg"
                                alt="user avatar" height="220" width="220" loading="lazy">
                            <div class="space-y-4 text-center sm:text-left">
                                <p class="text-gray-600">
                                    Les informations :
                                </p>
                                <p class="text-gray-600">
                                    <span class="font-medium">Themes :</span>
                                    @foreach ($formations->demandes as $demande)
                                    {{ $demande->themes }}<br>
                                    @endforeach
                                </p>
                                <p class="text-gray-600">
                                    <span class="font-medium">Durée :</span> {{ $formations->duree }} jours
                                </p>
                            </div>

                        </div>

                    </div>
                </div>
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

                <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6 p-4">
                    <div class="grid gap-8 md:grid-rows-1 lg:grid-cols-1">
                        <div class="p-6 border border-gray-100 rounded-xl bg-gray-50 ">
                            <div class="space-y-4 mt-4 text-center sm:mt-0 sm:text-left">

                                <div class="mb-5">
                                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Quelle est votre appréciation de chaque critère sachant que :
                                        <br>
                                        <div class="flex items-center">
                                            <i class='bx bxs-star text-yellow-400'></i>
                                            <i class='bx bxs-star text-yellow-400'></i>
                                            <i class='bx bxs-star text-yellow-400'></i>
                                            <i class='bx bxs-star text-yellow-400'></i>
                                            <span class="ml-2 text-gray-500">Excellent</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class='bx bxs-star text-yellow-400'></i>
                                            <i class='bx bxs-star text-yellow-400'></i>
                                            <i class='bx bxs-star text-yellow-400'></i>
                                            <i class='bx bx-star text-yellow-400'></i>
                                            <span class="ml-2 text-gray-500">Bon</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class='bx bxs-star text-yellow-400'></i>
                                            <i class='bx bxs-star text-yellow-400'></i>
                                            <i class='bx bx-star text-yellow-400'></i>
                                            <i class='bx bx-star text-yellow-400'></i>
                                            <span class="ml-2 text-gray-500">Moyen</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class='bx bxs-star text-yellow-400'></i>
                                            <i class='bx bx-star text-yellow-400'></i>
                                            <i class='bx bx-star text-yellow-400'></i>
                                            <i class='bx bx-star text-yellow-400'></i>
                                            <span class="ml-2 text-gray-500">Mauvais</span>
                                        </div>
                                    </label>
                                    <hr><br>
                                </div>

                                <form action="{{ route('evaluation.store',  ['id' => $formations->id ,'id2' => $employee->id ]) }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-3 gap-3 items-center">
                                        <div>
                                            <label for="name"
                                                class="block text-base font-medium text-[#07074D] mb-3">Continue
                                                de la formation :
                                            </label>
                                        </div>
                                        <div class="mb-3 text-right">
                                            <fieldset x-data="{ rating1: null }" class="flex items-center" aria-label="Star rating1 system">
                                                @foreach (range(1, 4) as $value)
                                                    <label class="inline-block">
                                                        <input type="radio" x-bind:value="{{ $value }}" x-model="rating1" name="rating1" tabindex="0"
                                                            class="sr-only" aria-checked="false" required>
                                                        <i class="bx" x-bind:class="rating1 >= {{ $value }} ? 'bxs-star text-yellow-400' : 'bx-star text-yellow-400'"></i>
                                                    </label>
                                                @endforeach
                                            </fieldset>
                                        </div>
                                        <input type="text" id="observation1" name="observation1" value="{{ old('observation1') }}"
                                            placeholder="Observation" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    <br>
                                    <div class="grid grid-cols-3 gap-3 items-center">
                                        <div>
                                            <label for="name"
                                                class="block text-base font-medium text-[#07074D] mb-3">Méthode
                                                pédagogique :
                                            </label>
                                        </div>
                                        <div class="mb-3 text-right">
                                            <fieldset x-data="{ rating2: null }" class="flex items-center"
                                                aria-label="Star rating2 system">
                                                @foreach (range(1, 4) as $value)
                                                    <label class="inline-block">
                                                        <input type="radio" x-bind:value="{{ $value }}"
                                                            x-model="rating2" name="rating2" tabindex="0"
                                                            class="sr-only" aria-checked="false" required>
                                                        <i class="bx"
                                                            x-bind:class="rating2 >= {{ $value }} ?
                                                                'bxs-star text-yellow-400' :
                                                                'bx-star text-yellow-400'"></i>
                                                    </label>
                                                @endforeach
                                            </fieldset>

                                        </div>
                                        <input type="text" id="observation2" name="observation2"
                                            value="{{ old('observation2') }}" placeholder="Observation"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />

                                    </div>
                                    <br>
                                    <div class="grid grid-cols-3 gap-3 items-center">
                                        <div>
                                            <label for="name"
                                                class="block text-base font-medium text-[#07074D] mb-3">Les
                                                documents remis aux participants :
                                            </label>
                                        </div>
                                        <div class="mb-3 text-right">
                                            <fieldset x-data="{ rating3: null }" class="flex items-center"
                                                aria-label="Star rating3 system">
                                                @foreach (range(1, 4) as $value)
                                                    <label class="inline-block">
                                                        <input type="radio" x-bind:value="{{ $value }}"
                                                            x-model="rating3" name="rating3" tabindex="0"
                                                            class="sr-only" aria-checked="false" required>
                                                        <i class="bx"
                                                            x-bind:class="rating3 >= {{ $value }} ?
                                                                'bxs-star text-yellow-400' :
                                                                'bx-star text-yellow-400'"></i>
                                                    </label>
                                                @endforeach
                                            </fieldset>

                                        </div>
                                        <input type="text" id="observation3" name="observation3"
                                            value="{{ old('observation3') }}" placeholder="Observation"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />


                                    </div>
                                    <br>
                                    <div class="grid grid-cols-3 gap-3 items-center">
                                        <div>
                                            <label for="name"
                                                class="block text-base font-medium text-[#07074D] mb-3">Les
                                                conditions de déroulement :
                                            </label>
                                        </div>
                                        <div class="mb-3 text-right">
                                            <fieldset x-data="{ rating4: null }" class="flex items-center"
                                                aria-label="Star rating4 system">
                                                @foreach (range(1, 4) as $value)
                                                    <label class="inline-block">
                                                        <input type="radio" x-bind:value="{{ $value }}"
                                                            x-model="rating4" name="rating4" tabindex="0"
                                                            class="sr-only" aria-checked="false" required>
                                                        <i class="bx"
                                                            x-bind:class="rating4 >= {{ $value }} ?
                                                                'bxs-star text-yellow-400' :
                                                                'bx-star text-yellow-400'"></i>
                                                    </label>
                                                @endforeach
                                            </fieldset>

                                        </div>
                                        <input type="text" id="observation4" name="observation4"
                                            value="{{ old('observation4') }}" placeholder="Observation"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />

                                    </div>
                                    <br>
                                    <div class="grid grid-cols-3 gap-3 items-center">
                                        <div>
                                            <label for="name"
                                                class="block text-base font-medium text-[#07074D] mb-3">L'applicatons
                                                pratique :
                                            </label>
                                        </div>
                                        <div class="mb-3 text-right">
                                            <fieldset x-data="{ rating5: null }" class="flex items-center"
                                                aria-label="Star rating5 system">
                                                @foreach (range(1, 4) as $value)
                                                    <label class="inline-block">
                                                        <input type="radio" x-bind:value="{{ $value }}"
                                                            x-model="rating5" name="rating5" tabindex="0"
                                                            class="sr-only" aria-checked="false" required>
                                                        <i class="bx"
                                                            x-bind:class="rating5 >= {{ $value }} ?
                                                                'bxs-star text-yellow-400' :
                                                                'bx-star text-yellow-400'"></i>
                                                    </label>
                                                @endforeach
                                            </fieldset>

                                        </div>
                                        <input type="text" id="observation5" name="observation5"
                                            value="{{ old('observation5') }}" placeholder="Observation"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    <br>
                                    <div class="grid grid-cols-3 gap-3 items-center">
                                        <div>
                                            <label for="name"
                                                class="block text-base font-medium text-[#07074D] mb-3">Débats
                                                et discussions :
                                            </label>
                                        </div>
                                        <div class="mb-3 text-right">
                                            <fieldset x-data="{ rating6: null }" class="flex items-center"
                                                aria-label="Star rating6 system">
                                                @foreach (range(1, 4) as $value)
                                                    <label class="inline-block">
                                                        <input type="radio" x-bind:value="{{ $value }}"
                                                            x-model="rating6" name="rating6" tabindex="0"
                                                            class="sr-only" aria-checked="false" required>
                                                        <i class="bx"
                                                            x-bind:class="rating6 >= {{ $value }} ?
                                                                'bxs-star text-yellow-400' :
                                                                'bx-star text-yellow-400'"></i>
                                                    </label>
                                                @endforeach
                                            </fieldset>

                                        </div>
                                        <input type="text" id="observation6" name="observation6"
                                            value="{{ old('observation6') }}" placeholder="Observation"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />

                                    </div>
                                    <br>
                                    <div class="grid grid-cols-3 gap-3 items-center">
                                        <div>
                                            <label for="name"
                                                class="block text-base font-medium text-[#07074D] mb-3">Impression
                                                d'ensemble :
                                            </label>
                                        </div>
                                        <div class="mb-3 text-right">
                                            <fieldset x-data="{ rating7: null }" class="flex items-center"
                                                aria-label="Star rating system">
                                                @foreach (range(1, 4) as $value)
                                                    <label class="inline-block">
                                                        <input type="radio" x-bind:value="{{ $value }}"
                                                            x-model="rating7" name="rating7" tabindex="0"
                                                            class="sr-only" aria-checked="false" required>
                                                        <i class="bx"
                                                            x-bind:class="rating7 >= {{ $value }} ?
                                                                'bxs-star text-yellow-400' :
                                                                'bx-star text-yellow-400'"></i>
                                                    </label>
                                                @endforeach
                                            </fieldset>

                                        </div>
                                        <input type="text" id="observation7" name="observation7"
                                            value="{{ old('observation7') }}" placeholder="Observation"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    <br>
                                    <div class="grid grid-cols-3 gap-3 items-center">
                                        <div>
                                            <label for="name"
                                                class="block text-base font-medium text-[#07074D] mb-3">Equipement
                                                de la salle de formation :
                                            </label>
                                        </div>
                                        <div class="mb-3 text-right">
                                            <fieldset x-data="{ rating8: null }" class="flex items-center"
                                                aria-label="Star rating8 system">
                                                @foreach (range(1, 4) as $value)
                                                    <label class="inline-block">
                                                        <input type="radio" x-bind:value="{{ $value }}"
                                                            x-model="rating8" name="rating8" tabindex="0"
                                                            class="sr-only" aria-checked="false" required>
                                                        <i class="bx"
                                                            x-bind:class="rating8 >= {{ $value }} ?
                                                                'bxs-star text-yellow-400' :
                                                                'bx-star text-yellow-400'"></i>
                                                    </label>
                                                @endforeach
                                            </fieldset>

                                        </div>
                                        <input type="text" id="observation8" name="observation8"
                                            value="{{ old('observation') }}" placeholder="Observation"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>

                                    <br><hr><br>
                                    <div class="mb-5" id="reponseContainer">
                                        <label for="reponse" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Pour les réponses qui sont notées
                                            <i class='bx bxs-star text-yellow-400'></i>
                                            <i class='bx bx-star text-yellow-400'></i>
                                            <i class='bx bx-star text-yellow-400'></i>
                                            <i class='bx bx-star text-yellow-400'></i>
                                            ou
                                            <i class='bx bxs-star text-yellow-400'></i>
                                            <i class='bx bxs-star text-yellow-400'></i>
                                            <i class='bx bx-star text-yellow-400'></i>
                                            <i class='bx bx-star text-yellow-400'></i>
                                            , prière expliquer ?
                                        </label>
                                        <textarea id="reponse" name="reponse" placeholder="Entrez votre réponse ici..."
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>{{ old('reponse') }}</textarea>
                                    </div>
                                    <script>
                                        const observation1Input = document.getElementById('reponse');
                                        const rating1Inputs = document.querySelectorAll('input[name="rating1"], input[name="rating2"], input[name="rating3"], input[name="rating4"], input[name="rating5"], input[name="rating6"], input[name="rating7"], input[name="rating8"]');
                                        const reponseContainer = document.getElementById('reponseContainer');

                                        rating1Inputs.forEach((input) => {
                                            input.addEventListener('change', () => {
                                                const selectedRatings = Array.from(rating1Inputs).filter((input) => input.checked).map((input) => input.value);

                                                if (selectedRatings.includes('1') || selectedRatings.includes('2')) {
                                                    observation1Input.style.display = 'block'; // Afficher l'input
                                                    reponseContainer.style.display = 'block'; // Afficher le label
                                                } else {
                                                    observation1Input.value = ''; // Vider la valeur de l'input
                                                    observation1Input.style.display = 'none'; // Cacher l'input
                                                    reponseContainer.style.display = 'none'; // Cacher le label
                                                }
                                            });
                                        });
                                    </script>


                                    <div class="mb-5">
                                        <div>
                                            <label for="reponse2"
                                                class="block text-base font-medium text-[#07074D] mb-3">
                                                Souhaitez-vous recevoir des informations sur d'autres thèmes de
                                                formation ? Précisez ?
                                            </label>
                                            <textarea id="reponse2" name="reponse2" placeholder="Entrez votre réponse ici..."
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>{{ old('reponse2') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label for="reponse3" class="mb-3 block text-base font-medium text-[#07074D]">
                                            A qui recommandez-vous ce séminaire ? (Tél, Email) ?
                                        </label>
                                        <textarea id="reponse3" name="reponse3" placeholder="Entrez votre réponse ici..."
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>{{ old('reponse3') }}</textarea>
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
