<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('formateur') }}"
                    class="font-semibold text-base text-black hover:text-primary"> formateurs </a>
            </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path><path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path></svg></span>
                <li class="font-semibold text-base text-body-color">Ajouter </li>
            </ul>
        </div>
    </x-slot>

    <div class="container mx-auto">
        <div class="p-4">
        <div class="bg-white rounded-lg border border-gray-300 shadow-md p-6">
            <form action="{{ route('formateur.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nom
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Name"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                </div>
                <div class="mb-5">
                    <label for="tel" class="mb-3 block text-base font-medium text-[#07074D]">
                        Tel
                    </label>
                    <input type="text" id="tel" name="tel" value="{{ old('tel') }}" placeholder="Tel"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                        Email
                    </label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Email"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                </div>
                <div class="mb-5">
                    <label for="adresse" class="mb-3 block text-base font-medium text-[#07074D]">
                        Adresse
                    </label>
                    <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}"
                        placeholder="Adresse"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                </div>
                <div class="mb-5">
                    <label for="specialite" class="mb-3 block text-base font-medium text-[#07074D]">
                        Specialite
                    </label>
                    <input type="text" id="specialite" name="specialite" value="{{ old('specialite') }}"
                        placeholder="Specialite"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                </div>
                <div class="mb-5">
                    <label for="experience" class="mb-3 block text-base font-medium text-[#07074D]">
                        Experience
                    </label>
                    <input type="number" id="experience" name="experience" value="{{ old('experience') }}"
                        placeholder="Experience"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                </div>

                <div class="mb-5">
                    <label for="cabinet" class="mb-3 block text-base font-medium text-[#07074D]">
                        Cabinet
                    </label>
                    <select name="cabinet" id="cabinet"
                        class="form-control w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <option value="">Sélectionner un cabinet</option>
                        @foreach ($cabinets as $cabinet)
                            <option value="{{ $cabinet->id }}" {{ old('cabinet') == $cabinet->id ? 'selected' : '' }}>{{ $cabinet->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end">
                    <button
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
        </div>
    </div>


</x-app-layout>
