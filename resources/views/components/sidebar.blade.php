<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>

<script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>

<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

<!-- aside -->

<aside x-show="asideOpen" class="flex w-52 flex-col space-y-2 border-r-2 border-gray-200 bg-white p-2 min-h-screen"
    style="height: 90.5vh">
    <a href="{{ route('dashboard') }}"
        class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
        <span class="text-2xl"><i class="bx bx-home"></i></span>
        <span>Accueil</span>
    </a>

    @php
        $countNouveaus = \App\Models\User::where('role', '=', 0)->count();
    @endphp

    <a href="{{ route('roles') }}"
        class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
        <span class="text-2xl"><i class="bx bx-shield-keyhole"></i><i class="bx bx-group"></i></span>
        <span class="mr-8">Les comptes</span>
        @if ($countNouveaus > 0)
            <span
                class="inline-flex items-center px-2.5 py-0.5 rounded-md bg-blue-300 text-sm font-medium text-white mx-4">{{ $countNouveaus }}</span>
        @endif
    </a>


    <button type="button"
        class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600"
        aria-controls="planning" data-collapse-toggle="planning">
        <span class="text-2xl"><i class="bx bx-calendar"></i></span>
        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Les formations</span>
        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
    <ul id="planning" class="hidden py-2 space-y-2">
        <li>
            @php
                $count = \App\Models\Demande::with('user')
                    ->whereDoesntHave('formations')
                    ->where('statut',null)
                    ->count();
            @endphp
            <a href="{{ route('besoin') }}" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <span class="text-2xl"><i class='bx bx-task'></i></span>
                <span class="mr-8">Demandes</span>
                @if ($count > 0)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md bg-blue-300 text-sm font-medium text-white mx-4">{{ $count }}</span>
                @endif
            </a>

        </li>
        <li>
            <a href="{{ route('planning') }}"
                class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <span class="text-2xl"><i class="bx bx-calendar"></i></span>
                <span>Formations</span>
            </a>
        </li>
    </ul>

    <button type="button"
        class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600"
        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
        <span class="text-2xl"><i class='bx bx-cabinet'></i></span>
        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Les cabinets</span>
        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
    <ul id="dropdown-example" class="hidden py-2 space-y-2">
        <li>
            <a href="{{ route('cabinet') }}"
                class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <span class="text-2xl"><i class='bx bx-cabinet'></i></span>
                <span>Cabinets</span>
            </a>
        </li>
        <li>
            <a href="{{ route('planningCahier') }}"
                class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <span class="text-2xl"><i class='bx bx-file'></i></span>
                <span>Cahier de charge</span>
            </a>
        </li>
        <li>
            <a href="{{ route('formateur') }}"
                class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <span class="text-2xl"><i class='bx bx-star'></i></span>
                <span>Formateur</span>
            </a>
        </li>
    </ul>

            <a href="{{ route('presence') }}"
                class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <span class="text-2xl"><i class='bx bx-file'></i></span>
                <span>Présence</span>
            </a>

            <a href="{{ route('evaladmin') }}" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <span class="text-2xl"><i class="bx bx-star"></i></span>
                <span>Évaluation</span>
            </a>

    <a href="{{ route('statistiques') }}" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
        <span class="text-2xl"><i class='bx bx-bar-chart-alt-2'></i></span>
        <span>Statistique</span>
    </a>

</aside>

