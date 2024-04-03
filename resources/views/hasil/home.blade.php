@extends('layouts.dashboard-volt')

@section('css')
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.9/dist/leaflet-search.src.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.css">
@endsection
@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Maps</div>
                    <div class="card-body">
                        <div id="map" style="height: 500px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.9/dist/leaflet-search.src.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.js"></script>

    <script>
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        
        var Esri_World = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
        });

        var Esri_Map = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; National Geographic, Esri, DeLorme, NAVTEQ, UNEP-WCMC, USGS, NASA, ESA, METI, NRCAN, GEBCO, NOAA, iPC',
            maxZoom: 16
        });

        var Stadia_Dark = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.{ext}', {
            minZoom: 0,
            maxZoom: 20,
            attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            ext: 'png'
        });

            var map = L.map('map', {
            center: [{{ $centerPoint->koordinat }}],
            zoom: 10,
            layers: [osm],
            fullscreenControl: {
            pseudoFullscreen: false
            }
        })

        
        // Membuat ikon marker kustom
        var iconMarker = L.icon({
            iconUrl :"{{ asset('storage/marker/marker.png') }}",
            iconSize:     [30, 46], // ukuran ikon
        })

        var baseLayers ={
            'Open Street Map' : osm,
            'Esri World Imaginary Map' : Esri_World,
            'Esri Nat Geo World Imaginary Map' : Esri_Map,
            'Stadia Alidade Dark Map':Stadia_Dark
        }

        var datas = [
            @foreach ($spot as $key => $value)
                {
                    "loc": [{{ $value->koordinat }}],
                    "title": '{!! $value->nama_dinas !!}'
                },
            @endforeach
        ]

        var markersLayer = new L.layerGroup()
        map.addLayer(markersLayer)

        var controlSearch = new L.Control.Search({
            position: 'topleft',
            layer: markersLayer,
            zoom: 15,
            markerLocation: true
        })

        map.addControl(controlSearch)

        for (i in datas) {
            var title = datas[i].title,
                loc = datas[i].loc,
                marker = new L.Marker(new L.latLng(loc), {
                    title: title,
                    icon:iconMarker
                })
            markersLayer.addLayer(marker)

            @foreach ($spot as $item)
                L.marker([{{ $item->koordinat }}],{ icon: iconMarker })
                    .bindPopup(
                        "<div class='my-2'><img src='{{ $item->getImageAsset() }}' class='img-fluid' width='700px'></div>" +
                        "<div class='my-2'><b>{{ $item->nama_dinas }}</b></div>" +
                        "<div><a href='{{ route('detail-spot',$item->id) }}' class='btn btn-outline-info'>Detail Lokasi</a></div>"
                    )
                    .addTo(map)
            @endforeach
        }

        const layerControl = L.control.layers(baseLayers).addTo(map)
        

    </script>
@endpush