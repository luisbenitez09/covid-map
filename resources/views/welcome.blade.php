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

<body class="bg-blue-100">
    <!-- Main row-3 -->
    <div class="w-full lg:h-screen flex flex-col lg:flex-row py-10 px-10 lg:px-0">
        <!-- Fake Links -->
        <div class="w-full mb-6 lg:ml-10 lg:w-1/12 lg:h-full lg:mb-0 py-5 md:px-3 bg-blue-500 rounded-3xl shadow-2xl">
            <div class="flex flex-row lg:flex-col">
                <!-- Logo -->
                <div class="w-1/6 lg:w-full lg:pb-3 lg:mb-6 border-r lg:border-r-0 lg:border-b border-white">
                    <h1 class="text-white font-light text-2xl text-center">RML</h1>
                </div>

                <!-- Fake Links -->
                <div class="w-4/6 lg:w-full flex flex-row lg:flex-col justify-around">
                    <div class="w-10 p-1 rounded-xl lg:mb-6 lg:mx-auto hover:bg-blue-900 transform hover:scale-105 transition duration-300 ease-in-out">
                        <img src="{{asset('img/icon-sheet-1.png')}}" class="w-7 mx-auto" alt="Documents">
                    </div>
                    <div class="w-10 p-1 rounded-xl lg:mb-6 lg:mx-auto hover:bg-blue-900 transform hover:scale-105 transition duration-300 ease-in-out">
                        <img src="{{asset('img/icon-grap-1.png')}}" class="w-7 mx-auto" alt="Graphics">
                    </div>
                    <div class="w-10 p-1 rounded-xl lg:mb-6 lg:mx-auto hover:bg-blue-900 transform hover:scale-105 transition duration-300 ease-in-out">
                        <img src="{{asset('img/icon-user-1.png')}}" class="w-7 mx-auto" alt="Users">
                    </div>
                    <div class="w-10 p-1 rounded-xl lg:mb-6 lg:mx-auto hover:bg-blue-900 transform hover:scale-105 transition duration-300 ease-in-out">
                        <img src="{{asset('img/icon-set-1.png')}}" class="w-7 mx-auto" alt="Settings">
                    </div>
                </div>

                <!-- Logout -->
                <div class="w-1/6 lg:w-full lg:pt-3 border-l lg:border-l-0 lg:border-t border-white bottom-0">
                    <div
                        class="w-10 p-1 rounded-xl lg:mb-6 md:mx-auto hover:bg-blue-900 transform hover:scale-105 transition duration-300 ease-in-out">
                        <img src="{{asset('img/icon-logout.png')}}" class="w-7 mx-auto" alt="Log Out">
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="w-full flex flex-col lg:w-8/12 xl:9/12 lg:px-10 lg:overflow-y-auto">
            <!-- Top -->
            <div class="w-full mb-6 flex flex-row justify-between">
                <!-- Title -->
                <div>
                    <h2 class="text-sm text-gray-500">México</h2>
                    <h1 class="text-xl font-bold text-blue-500">COVID-19 Map</h1>
                </div>

                <!-- Search bar and user photo -->
                <div class="flex flex-row">
                    <div class="w-32 h-10 px-2 py-2 mr-4 flex flex-row justify-start bg-gray-300 rounded-lg">
                        <img src="{{asset('img/icon-search.png')}}" class="w-5 h-5 mr-1" alt="Search">
                        <p class="text-sm font-light text-gray-500">Buscar</p>
                    </div>
                    <div>
                        <img src="{{asset('img/user-photo.jpg')}}" class="w-12 h-12 rounded-full" alt="User">
                    </div>
                </div>
            </div>
            <!-- Counters -->
            <div class="w-full flex flex-col lg:flex-row gap-10 pt-10 mb-10">
                
                <div class="w-full lg:w-1/3 h-64 mb-10 rounded-3xl bg-white shadow-2xl">
                    <!-- Icon -->
                    <div class="w-20 h-20 mx-auto rounded-3xl -mt-10 bg-red-500">
                        <img src="{{asset('img/icon-positive.png')}}" class="w-12 mx-auto py-4" alt="Positive">
                    </div>
                    <h1 class="text-3xl font-bold text-center mt-6 text-red-500">Confirmados</h1>
                    <h3 class="text-md font-light text-center mb-10 text-gray-500">Registrados</h3>
                    <h2 class="text-4xl font-bold text-center text-gray-900">809751</h2>
                </div>
                
                <div class="w-full lg:w-1/3 h-64 mb-10 rounded-3xl bg-white shadow-2xl">
                    <!-- Icon -->
                    <div class="w-20 h-20 mx-auto rounded-3xl -mt-10 bg-yellow-500">
                        <img src="{{asset('img/icon-sus.png')}}" class="w-12 mx-auto py-4" alt="Positive">
                    </div>
                    <h1 class="text-3xl font-bold text-center mt-6 text-yellow-500">Sospechosos</h1>
                    <h3 class="text-md font-light text-center mb-10 text-gray-500">Estimados</h3>
                    <h2 class="text-4xl font-bold text-center text-gray-900">809751</h2>
                </div>
                
                <div class="w-full lg:w-1/3 h-64 mb-10 rounded-3xl bg-white shadow-2xl">
                    <!-- Icon -->
                    <div class="w-20 h-20 mx-auto rounded-3xl -mt-10 bg-gray-900">
                        <img src="{{asset('img/icon-dead.png')}}" class="w-12 mx-auto py-4" alt="Positive">
                    </div>
                    <h1 class="text-3xl font-bold text-center mt-6 text-gray-900">Defunciones</h1>
                    <h3 class="text-md font-light text-center mb-10 text-gray-500">Registrados</h3>
                    <h2 class="text-4xl font-bold text-center text-gray-900">809751</h2>
                </div>
            </div>

            <!-- Main Cards -->
            <div class="w-full lg:h-screen flex flex-col gap-10 mb-10">
                <!-- Map Card -->
                <div class="w-full h-96 bg-blue-500 rounded-3xl shadow-2xl">
                    <div id='map' class="w-full h-full rounded-3xl"></div>
                </div>

                <!-- Second Card -->
                <div class="w-full h-96 bg-pink-400 rounded-3xl shadow-2xl">

                </div>
            </div>

        </div>

        <!-- Users -->
        <div class="w-full h-screen lg:-mt-10 lg:w-3/12 xl:2/12 bg-white px-5 py-10">
            <!-- Top -->
            <div class="w-full flex flex-row justify-between mb-10">
                <div class="flex flex-row">
                    <img src="{{asset('img/icon-people.png')}}" class="w-8 h-8 mr-4" alt="Integrantes">
                    <h3 class="text-2xl font-bold align-middle text-blue-500">Integrantes</h3>
                </div>
            </div>

            <!-- Color rectangle -->
            <div class="w-full flex flex-row justify-between p-5 mb-10 rounded-3xl bg-blue-100">
                <div class="w-1/2 py-2 px-5 rounded-2xl bg-blue-400">
                    <h1 class="text-white text-lg text-center">IDS</h1>
                </div>
                <div class="w-1/2 m-auto">
                    <h1 class="text-gray-500 text-lg text-center">T.V.</h1>
                </div>
            </div>

            <!-- List -->
            <div class="w-full flex flex-col">
                <!-- User -->
                <div class="flex flex-row mb-10 lg:justify-between xl:justify-start">
                    <!-- Photo -->
                    <div class="mr-2 lg:mr-0 xl:mr-2">
                        <img src="{{asset('img/user-photo.jpg')}}" class="w-12 h-12 rounded-full" alt="User">
                    </div>
                    <!-- Data -->
                    <div class="flex flex-col mr-10 lg:mr-0 xl:mr-10">
                        <h1 class="font-bold text-base text-blue-500">Román Romero</h1>
                        <h2 class="font-light text-sm text-blue-500">Software Developer</h2>
                        <h3 class="font-light text-xs text-blue-500">IDS TV 8vo</h3>
                    </div>
                    <!-- Msg icon -->
                    <div class="my-auto">
                        <img src="{{asset('img/icon-mail.png')}}" class="w-8 h-8" alt="User">
                    </div>
                </div>
                <!-- User -->
                <div class="flex flex-row mb-10 lg:justify-between xl:justify-start">
                    <!-- Photo -->
                    <div class="mr-2 lg:mr-0 xl:mr-2">
                        <img src="{{asset('img/user-photo.jpg')}}" class="w-12 h-12 rounded-full" alt="User">
                    </div>
                    <!-- Data -->
                    <div class="flex flex-col mr-10 lg:mr-0 xl:mr-10">
                        <h1 class="font-bold text-base text-blue-500">María Meza</h1>
                        <h2 class="font-light text-sm text-blue-500">Software Developer</h2>
                        <h3 class="font-light text-xs text-blue-500">IDS TV 8vo</h3>
                    </div>
                    <!-- Msg icon -->
                    <div class="my-auto">
                        <img src="{{asset('img/icon-mail.png')}}" class="w-8 h-8" alt="User">
                    </div>
                </div>
                <!-- User -->
                <div class="flex flex-row mb-10 lg:justify-between xl:justify-start">
                    <!-- Photo -->
                    <div class="mr-2 lg:mr-0 xl:mr-2">
                        <img src="{{asset('img/user-photo.jpg')}}" class="w-12 h-12 rounded-full" alt="User">
                    </div>
                    <!-- Data -->
                    <div class="flex flex-col mr-10 lg:mr-0 xl:mr-10">
                        <h1 class="font-bold text-base text-blue-500">Luis Benitez</h1>
                        <h2 class="font-light text-sm text-blue-500">Software Developer</h2>
                        <h3 class="font-light text-xs text-blue-500">IDS TV 8vo</h3>
                    </div>
                    <!-- Msg icon -->
                    <div class="my-auto">
                        <img src="{{asset('img/icon-mail.png')}}" class="w-8 h-8" alt="User">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        mapboxgl.accessToken =
            'pk.eyJ1IjoibGJlbml0ZXoiLCJhIjoiY2twZXR5eWlwMGRvZzJ3cDNqYW05ZDJhYyJ9.0oV1feaXlx-K4Z7lnikL-g';

        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/lbenitez/ckpf2ttue0du617mki59aidzs',
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
                    'fill-color': '#d816e9',
                    'fill-opacity': [
                        'case',
                        ['boolean', ['feature-state','hover'],
                            false], 0.5, 0]
                }
            });

            map.addLayer({
                'id': 'state-borders',
                'type': 'line',
                'source': 'states',
                'layout': {},
                'paint': {
                    'line-color': '#d816e9',
                    'line-width': 0.5
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