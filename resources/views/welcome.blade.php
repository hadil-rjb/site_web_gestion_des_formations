<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestion des formation</title>
    <link rel="icon" href="{{ asset('img/vita.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        header {
            background: url('https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/695db977734281.5c9094a087a35.jpg');
        }
    </style>

</head>

<body class="antialiased">
    <nav id="nav" class="fixed inset-x-0 top-0 flex flex-row justify-between z-10 text-white bg-transparent">
        <div class="p-4">
            <img src="{{ asset('img/Group.png') }}" alt="VitaForma" class="h-10 w-80">
        </div>

        <div class="p-20">
        </div>
    </nav>

    <header class="bg-center bg-fixed bg-no-repeat bg-center bg-cover h-screen">
        <!-- Overlay Background + Center Control -->
        <div class="h-screen bg-opacity-50 bg-black flex items-center justify-center"
            style="background:rgba(0,0,0,0.7);">
            <div class="mx-2 text-center">
                <h1 class="text-gray-100 font-extrabold text-4xl xs:text-5xl md:text-6xl">
                    <span class="text-white">Gestion</span>
                </h1>
                <h2 class="text-gray-300 font-extrabold text-3xl xs:text-4xl md:text-5xl leading-tight">
                    des <span class="text-white">Formations</span> CLM <span class="text-white">-</span> Vitalait
                </h2>
                <br><br>

            @if (Route::has('login'))
            <div class="space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-10 py-2 bg-transparent outline-none border-2 border-indigo-100 rounded text-indigo-100 font-medium active:scale-95 hover:bg-indigo-600 hover:text-white hover:border-transparent focus:bg-indigo-600 focus:text-white focus:border-transparent focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 disabled:bg-gray-400/80 disabled:shadow-none disabled:cursor-not-allowed transition-colors duration-200">Accueil</a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 bg-transparent outline-none border-2 border-indigo-100 rounded text-indigo-100 font-medium active:scale-95 hover:bg-indigo-600 hover:text-white hover:border-transparent focus:bg-indigo-600 focus:text-white focus:border-transparent focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 disabled:bg-gray-400/80 disabled:shadow-none disabled:cursor-not-allowed transition-colors duration-200">Se connecter</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-8 py-2 bg-transparent outline-none border-2 border-indigo-100 rounded text-indigo-100 font-medium active:scale-95 hover:bg-indigo-600 hover:text-white hover:border-transparent focus:bg-indigo-600 focus:text-white focus:border-transparent focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 disabled:bg-gray-400/80 disabled:shadow-none disabled:cursor-not-allowed transition-colors duration-200">S'inscrire</a>
                    @endif
                @endauth
            </div>


            @endif
            </div>
        </div>
    </header>

    <footer class="py-4" style="background:rgba(0,0,0,0.7);">
        <div class="container mx-auto px-4 text-center">
            <p class="text-white text-sm">&copy; {{ date('Y') }} Gestion des formations. Tous droits réservés.</p>
        </div>
    </footer>
</body>


</html>
