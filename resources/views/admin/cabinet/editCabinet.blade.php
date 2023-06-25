<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('cabinet') }}"
                    class="font-semibold text-base text-black hover:text-primary"> Cabinets </a>
            </li>
                <span class="px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path><path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path></svg></span>
                <li class="font-semibold text-base text-body-color">Modifier {{ $cabinets->name }} </li>
            </ul>
        </div>
    </x-slot>
    <div class="container mx-auto">
        <div class="p-6">
            <div class="bg-white rounded-lg border border-gray-300 shadow-md p-6">
                <form action="{{ route('cabinets.update', $cabinets) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nom
                        </label>
                        <input type="text" id="name" name="name" value="{{ $cabinets->name }}"
                            placeholder="Name"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                    </div>
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Email
                        </label>
                        <input type="text" id="email" name="email" value="{{ $cabinets->email }}"
                            placeholder="Email"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                    </div>
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Adresse
                        </label>
                        <input type="text" id="address" name="address" value="{{ $cabinets->address }}"
                            placeholder="Adresse"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                    </div>
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Numéro Tél
                        </label>
                        <input type="text" id="phone_number" name="phone_number" value="{{ $cabinets->phone_number }}"
                            placeholder="Numéro Tél"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required/>
                    </div>
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Web site
                        </label>
                        <input type="text" id="website" name="website" value="{{ $cabinets->website }}"
                            placeholder="Web site"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                            Enregistrer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
