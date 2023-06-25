<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

<!-- aside -->
<aside x-show="asideOpen" class="flex w-52 flex-col space-y-2 border-r-2 border-gray-200 bg-white p-2 min-h-screen" style="height: 90.5vh">
<a href="{{ route('dashboard') }}" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
    <span class="text-2xl"><i class="bx bx-home"></i></span>
    <span>Accueil</span>
</a>

<a href="{{ route('valider') }}" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
    <span class="text-2xl"><i class="bx bx-file"></i></span>
    <span>Planning</span>
</a>

</aside>
