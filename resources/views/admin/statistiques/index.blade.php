<x-app-layout>
    <x-slot name="header">
        <div class=" bg-white border border-light shadow-card rounded-lg py-4 px-4 sm:px-6 md:px-8 md:py-1 ">
            <ul class="flex items-center">
                <li class="flex items-center"> <a href="{{ route('statistiques') }}"
                        class="font-semibold text-base text-black hover:text-primary"> Statistiques </a>
                </li>
            </ul>
        </div>
    </x-slot>


    <div class="container mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-5 p-4">
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-50">Nombre de formations annuelles</div>
                <div class="p-3">
                    <canvas id="chart" class="w-full" height="300" width="400"></canvas>
                </div>
            </div>
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-50">Budget annuel alloué aux formations</div>
                <div class="p-3">
                    <canvas id="chart2" class="w-full" height="300" width="400"></canvas>
                </div>
            </div>

        </div>
        <hr class="my-4">
        <div class="p-4">
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-50">Statistiques de présence du personnel</div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-5 p-4">
                    <div class="shadow-lg rounded-lg overflow-hidden">
                        <div class="p-3">
                            <canvas id="chart3" class="w-full h-64"></canvas>
                        </div>
                    </div>
                    <div class="shadow-lg rounded-lg overflow-hidden">
                        <table class="w-full mx-auto">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4 bg-gray-200">Statut</th>
                                    <th class="py-3 px-4 bg-gray-200">Pourcentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-4">Présents</td>
                                    <td class="py-2 px-4">
                                        @if($presences->count() > 0)
                                            {{ number_format(($presences->where('presence', 'present')->count() / $presences->count()) * 100, 2) }}%
                                        @else
                                            0%
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td class="py-2 px-4">Absents</td>
                                    <td class="py-2 px-4">
                                        @if($presences->count() > 0)
                                            {{ number_format(($presences->where('presence', 'absent')->count() / $presences->count()) * 100, 2) }}%
                                        @else
                                            0%
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td class="py-2 px-4">Remplacés</td>
                                    <td class="py-2 px-4">
                                        @if($presences->count() > 0)
                                            {{ number_format(($presences->where('presence', 'remplacer')->count() / $presences->count()) * 100, 2) }}%
                                        @else
                                            0%
                                        @endif
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4">
        <div class="grid grid-cols-1 gap-5 p-4">
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-50">Evaluations à chaud</div>
                <div class="p-3">
                    <canvas id="chart4" class="w-full h-64"></canvas>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="grid grid-cols-1 gap-5 p-4">
            <div class="shadow-lg rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-50">Evaluations à froid</div>
                <div class="p-3">
                    <canvas id="chart5" class="w-full h-64"></canvas>
                </div>
            </div>
        </div>


        <script>
            var ctx = document.getElementById('chart').getContext('2d');

            // Données du graphique
            var years = []; // Tableau des années
            var formations = []; // Tableau du nombre de formations

            @foreach ($plannings as $planning)
                years.push('{{ $planning->annee }}');
                formations.push('{{ $planning->formations->count() }}');
            @endforeach

            // Calcul de la valeur maximale en ajoutant une marge
            var maxFormation = Math.max(...formations);
            var maxFormationWithMargin = maxFormation * 1.1; // Ajouter une marge de 10% à la valeur maximale

            // Configuration du graphique
            var config = {
                type: 'bar',
                data: {
                    labels: years,
                    datasets: [{
                        label: 'Nombre de formations',
                        data: formations,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            min: 1,
                            max: maxFormationWithMargin, // Utiliser la valeur maximale avec la marge
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Nombre de formations'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Année'
                            }
                        }
                    },
                    plugins: {
                        roundedBars: {
                            borderRadius: 10 // Définir le rayon des coins arrondis des barres
                        }
                    }
                }
            };

            // Créer le graphique
            var chart = new Chart(ctx, config);
        </script>

        <script>
            var ctx = document.getElementById('chart2').getContext('2d');

            // Données du graphique
            var years = []; // Tableau des années
            var formations = []; // Tableau du budget

            @foreach ($plannings as $planning)
                years.push('{{ $planning->annee }}');
                formations.push('{{ $planning->budget }}');
            @endforeach

            // Calcul de la valeur maximale en ajoutant une marge
            var maxFormation = Math.max(...formations);
            var maxFormationWithMargin = maxFormation * 1.1; // Ajouter une marge de 10% à la valeur maximale

            // Configuration du graphique
            var config = {
                type: 'bar',
                data: {
                    labels: years,
                    datasets: [{
                        label: 'Sommes de budget',
                        data: formations,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            min: 0,
                            max: maxFormationWithMargin, // Utiliser la valeur maximale avec la marge
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Somme de budget'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Année'
                            }
                        }
                    },
                    plugins: {
                        roundedBars: {
                            borderRadius: 10 // Définir le rayon des coins arrondis des barres
                        }
                    }
                }
            };

            // Créer le graphique
            var chart = new Chart(ctx, config);


            // Créer le graphique
            var chart = new Chart(ctx, config);
        </script>

        <script>
            // Récupérer le contexte du canvas
            var ctx = document.getElementById('chart3').getContext('2d');

            // Données du graphique
            var presentPercentage = {{ $presences->where('presence', 'present')->count() }};
            var absentPercentage = {{ $presences->where('presence', 'absent')->count() }};
            var replacedPercentage = {{ $presences->where('presence', 'remplacer')->count() }};

            var data = {
                labels: ['Présents', 'Absents', 'Remplacées'],
                datasets: [{
                    data: [presentPercentage, absentPercentage, replacedPercentage],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                }]
            };

            // Configuration du graphique
            var options = {
                responsive: true,
                maintainAspectRatio: false,
                width: 200,
                height: 200,
            };

            // Création du graphique de type "pie"
            var chart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: options
            });
        </script>

        <script>
            // Données pour le diagramme à barres empilées
            var data = {
                labels: [
                    'Continuité de la formation',
                    'Méthode pédagogique',
                    'Les documents remis aux participants',
                    'Les conditions de déroulement',
                    "L'application pratique",
                    'Débats et discussions',
                    'Impression d\'ensemble',
                    'Équipement de la salle de formation'
                ],
                datasets: [{
                        label: 'Faible',
                        data: [
                            {{ $evaluations->where('rating1', '1')->count() }},
                            {{ $evaluations->where('rating2', '1')->count() }},
                            {{ $evaluations->where('rating3', '1')->count() }},
                            {{ $evaluations->where('rating4', '1')->count() }},
                            {{ $evaluations->where('rating5', '1')->count() }},
                            {{ $evaluations->where('rating6', '1')->count() }},
                            {{ $evaluations->where('rating7', '1')->count() }},
                            {{ $evaluations->where('rating8', '1')->count() }}
                        ],
                        backgroundColor: 'rgba(255, 99, 132, 0.5)'
                    },
                    {
                        label: 'Moyen',
                        data: [
                            {{ $evaluations->where('rating1', '2')->count() }},
                            {{ $evaluations->where('rating2', '2')->count() }},
                            {{ $evaluations->where('rating3', '2')->count() }},
                            {{ $evaluations->where('rating4', '2')->count() }},
                            {{ $evaluations->where('rating5', '2')->count() }},
                            {{ $evaluations->where('rating6', '2')->count() }},
                            {{ $evaluations->where('rating7', '2')->count() }},
                            {{ $evaluations->where('rating8', '2')->count() }}
                        ],
                        backgroundColor: 'rgba(54, 162, 235, 0.5)'
                    },
                    {
                        label: 'Satisfait',
                        data: [
                            {{ $evaluations->where('rating1', '3')->count() }},
                            {{ $evaluations->where('rating2', '3')->count() }},
                            {{ $evaluations->where('rating3', '3')->count() }},
                            {{ $evaluations->where('rating4', '3')->count() }},
                            {{ $evaluations->where('rating5', '3')->count() }},
                            {{ $evaluations->where('rating6', '3')->count() }},
                            {{ $evaluations->where('rating7', '3')->count() }},
                            {{ $evaluations->where('rating8', '3')->count() }}
                        ],
                        backgroundColor: 'rgba(75, 192, 192, 0.5)'
                    },
                    {
                        label: 'Excellent',
                        data: [
                            {{ $evaluations->where('rating1', '4')->count() }},
                            {{ $evaluations->where('rating2', '4')->count() }},
                            {{ $evaluations->where('rating3', '4')->count() }},
                            {{ $evaluations->where('rating4', '4')->count() }},
                            {{ $evaluations->where('rating5', '4')->count() }},
                            {{ $evaluations->where('rating6', '4')->count() }},
                            {{ $evaluations->where('rating7', '4')->count() }},
                            {{ $evaluations->where('rating8', '4')->count() }}
                        ],
                        backgroundColor: 'rgba(75, 102, 192, 0.5)'
                    }
                ]
            };

            var options = {
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        type: 'linear',
                        stacked: true,
                        suggestedMin: 0, // Valeur minimale recommandée pour l'axe des y
                        suggestedMax: {{ $employees->count() }} // Valeur maximale recommandée pour l'axe des y
                    }
                }
            };

            // Création du diagramme à barres empilées
            var ctx = document.getElementById('chart4').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: options
            });
        </script>

        <script>
            var ctx = document.getElementById('chart5').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Qualite', 'Competences', 'Productivite', 'Motivations', 'Esprit', 'Systeme'],
                    datasets: [{
                        label: 'Oui',
                        data: [{{ $evaluations_froids->where('qualite', 'Oui')->count() }},
                            {{ $evaluations_froids->where('competences', 'Oui')->count() }},
                            {{ $evaluations_froids->where('productivite', 'Oui')->count() }},
                            {{ $evaluations_froids->where('motiviation', 'Oui')->count() }},
                            {{ $evaluations_froids->where('esprit', 'Oui')->count() }},
                            {{ $evaluations_froids->where('systeme', 'Oui')->count() }}
                        ],
                        backgroundColor: 'rgba(54, 162, 235, 0.8)',
                        borderRadius: 10 // Ajoutez cette propriété pour définir le rayon des coins
                    }, {
                        label: 'Non',
                        data: [{{ $evaluations_froids->where('qualite', 'Non')->count() }},
                            {{ $evaluations_froids->where('competences', 'Non')->count() }},
                            {{ $evaluations_froids->where('productivite', 'Non')->count() }},
                            {{ $evaluations_froids->where('motiviation', 'Non')->count() }},
                            {{ $evaluations_froids->where('esprit', 'Non')->count() }},
                            {{ $evaluations_froids->where('systeme', 'Non')->count() }}
                        ],
                        backgroundColor: 'rgba(255, 99, 132, 0.8)',
                        borderRadius: 10,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: {{ $users->count() }} // Valeur maximale supplémentaire (ajustez selon vos besoins)
                        }
                    }
                }
            });
        </script>

    </div>

</x-app-layout>
