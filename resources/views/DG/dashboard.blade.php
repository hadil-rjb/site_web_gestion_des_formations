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


</x-app-layout>
