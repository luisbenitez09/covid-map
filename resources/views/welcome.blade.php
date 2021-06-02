<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />

    <title>COVID-19 MAP</title>
</head>

<body class="bg-gray-200">
    <!-- Main row-3 -->
    <div class="w-full h-screen flex flex-col md:flex-row p-10">
        <!-- Fake Links -->
        <div class="w-full mb-6 md:w-1/12 md:h-full md:mb-0 py-5 md:px-3 bg-purple-500 rounded-3xl">
            <div class="flex flex-row md:flex-col">
                <!-- Logo -->
                <div class="w-1/6 md:w-full md:pb-3 md:mb-6 border-r md:border-r-0 md:border-b border-white">
                    <h1 class="text-white font-light text-2xl text-center">RML</h1>
                </div>

                <!-- Fake Links -->
                <div class="w-4/6 md:w-full flex flex-row md:flex-col justify-around">
                    <div
                        class="w-10 p-1 rounded-xl md:mb-6 md:mx-auto hover:bg-purple-800 transform hover:scale-105 transition duration-300 ease-in-out">
                        <img src="{{asset('img/icon-sheet-1.png')}}" class="w-7 mx-auto" alt="Documents">
                    </div>
                    <div
                        class="w-10 p-1 rounded-xl md:mb-6 md:mx-auto hover:bg-purple-800 transform hover:scale-105 transition duration-300 ease-in-out">
                        <img src="{{asset('img/icon-grap-1.png')}}" class="w-7 mx-auto" alt="Graphics">
                    </div>
                    <div
                        class="w-10 p-1 rounded-xl md:mb-6 md:mx-auto hover:bg-purple-800 transform hover:scale-105 transition duration-300 ease-in-out">
                        <img src="{{asset('img/icon-user-1.png')}}" class="w-7 mx-auto" alt="Users">
                    </div>
                    <div
                        class="w-10 p-1 rounded-xl md:mb-6 md:mx-auto hover:bg-purple-800 transform hover:scale-105 transition duration-300 ease-in-out">
                        <img src="{{asset('img/icon-set-1.png')}}" class="w-7 mx-auto" alt="Settings">
                    </div>
                </div>

                <!-- Logout -->
                <div class="w-1/6 md:w-full md:pt-3 border-l md:border-l-0 md:border-t border-white">
                    <div
                        class="w-10 p-1 rounded-xl md:mb-6 md:mx-auto hover:bg-purple-800 transform hover:scale-105 transition duration-300 ease-in-out">
                        <img src="{{asset('img/icon-logout.png')}}" class="w-7 mx-auto" alt="Log Out">
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="w-full flex flex-col md:w-9/12 px-10">
            <!-- Top -->
            <div class="w-full flex flex-row justify-between">
                <!-- Title -->
                <div>
                    <h2 class="text-sm text-gray-500">México</h2>
                    <h1 class="text-xl font-bold text-purple-500">COVID-19 Map</h1>
                </div>

                <!-- Search bar and user photo -->
                <div class="flex flex-row">
                    <div class="w-32 h-10 px-2 py-2 mr-4 flex flex-row justify-start bg-gray-300 rounded-lg">
                        <img src="{{asset('img/icon-search.png')}}" class="w-5 h-5 mr-1" alt="Search">
                        <p class="text-sm font-light text-gray-500">Buscar</p>
                    </div>
                    <div>
                        <img src="{{asset('img/user-photo.jpg')}}" class="w-10 h-10 rounded-full" alt="User">
                    </div>
                </div>
            </div>

            <!-- Main Cards -->
            <div class="w-full flex flex-row">
                <!-- Map Card -->
                <div class="w-3/5 h-96 bg-purple-500 rounded-3xl">
                    <div id='map' class="w-full h-full rounded-3xl"></div>
                </div>

                <!-- Second Card -->
                <div class="w-2/5">

                </div>
            </div>

            <!-- Counters -->
            <div class="w-full">

            </div>
        </div>

        <!-- Users -->
        <div class="w-full md:w-2/12 bg-red-600 p-5">
            <h1>test</h1>
        </div>
    </div>
    <script>
        mapboxgl.accessToken =
            'pk.eyJ1IjoibGJlbml0ZXoiLCJhIjoiY2twZXR5eWlwMGRvZzJ3cDNqYW05ZDJhYyJ9.0oV1feaXlx-K4Z7lnikL-g';

        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-101.535003, 22.599937],
            zoom: 3.3
        });
        
        var hoveredStateId = null;

        map.on('load', function () {
            map.addSource('states', {
                'type': 'geojson',
                'data': '{{asset("assets/mx_states.geojson")}}'
            });

            // The feature-state dependent fill-opacity expression will render the hover effect
            // when a feature's hover state is set to true.
            map.addLayer({
                'id': 'state-fills',
                'type': 'fill',
                'source': 'states',
                'layout': {},
                'paint': {
                    'fill-color': '#627BC1',
                    'fill-opacity': [
                        'case',
                        ['boolean', ['feature-state','hover'],
                            false], 1, 0.5]
                }
            });

            map.addLayer({
                'id': 'state-borders',
                'type': 'line',
                'source': 'states',
                'layout': {},
                'paint': {
                    'line-color': '#627BC1',
                    'line-width': 2
                }
            });

            // When the user moves their mouse over the state-fill layer, we'll update the
            // feature state for the feature under the mouse.
            map.on('mousemove', 'state-fills', function (e) {
                if (e.features.length > 0) {
                    if (hoveredStateId !== null) {
                        map.setFeatureState({
                            source: 'states',
                            id: hoveredStateId
                        }, {
                            hover: false
                        });
                    }
                    hoveredStateId = e.features[0].id;
                    map.setFeatureState({
                        source: 'states',
                        id: hoveredStateId
                    }, {
                        hover: true
                    });
                }
            });

            // When the mouse leaves the state-fill layer, update the feature state of the
            // previously hovered feature.
            map.on('mouseleave', 'state-fills', function () {
                if (hoveredStateId !== null) {
                    map.setFeatureState({
                        source: 'states',
                        id: hoveredStateId
                    }, {
                        hover: false
                    });
                }
                hoveredStateId = null;
            });
        });

    </script>
</body>

</html>
