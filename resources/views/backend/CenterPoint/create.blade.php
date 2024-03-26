@extends('layouts.dashboard-volt')

@section('css')
    <!-- Menambahkan stylesheet Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        #map { 
            height: 700px; 
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <!-- Judul Tugas -->
                        <h2 class="text-black">Maps</h2>
                    <div class="card-body">
                        <!-- Tempat menampilkan peta -->
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <label for=""><h3>Titik Koordinat</h3></label>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('center-point.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Koordinat</label>
                        <input type="text" class="form-control @error('koordinat')
                                    is-invalid
                                @enderror" name="koordinat" id="koordinat">
                                @error('koordinat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Latitude</label>
                        <input type="text" class="form-control" name="latitude" id="latitude">
                    </div>
                    <div class="form-group">
                        <label for="">Longitude</label>
                        <input type="text" class="form-control" name="longitude" id="longitude">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm my-2 btn-primary">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
                        
        </div>
    </div>
@endsection

@push('javascript')
    <!-- Menambahkan script Leaflet -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <script>
        // Membuat objek peta dengan titik tengah dan level zoom tertentu
        // const map = L.map('map').setView([-8.64356881820705, 115.26822935833701], 15);

        // Menambahkan tile layer (peta dasar) dari OpenStreetMap
        const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            
            maxZoom: 20,
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



        var map = L.map('map',{
            center:[-8.454068513179749, 115.3563600140712],
            minZoom:8,
            zoom:17,
            layers:[osm]
        })

        
        // Membuat ikon marker kustom
        var iconMarker = L.icon({
            iconUrl :"{{ asset('storage/marker/marker.png') }}",
            iconSize:     [50, 50], // ukuran ikon
        })

        // Membuat marker dengan ikon kustom
        var marker = L.marker([-8.454068513179749, 115.3563600140712],{
            icon:iconMarker,
            draggable : true // Mengaktifkan fitur drag untuk marker
        })
        .addTo(map); // Menambahkan marker ke peta


        // Membuat popup baru
        var popup = L.popup({ 
            offset: [0, -20], // Penyesuaian posisi popup
            minWidth:240,
            maxWidth: 500
        })
            .setLatLng(marker.getLatLng())
            .setContent('Ini adalah marker di Bali!');
        
        // Binding popup ke marker
        marker.bindPopup(popup);

        // Format isi popup
        formatContent = function(lat, lng){
            return `
                <div class="wrapper">
                    <div class="row">
                        <div class="cell merged" style="text-align:center"><b>Koordinat</b></div>
                    </div>
                    <div class="row">
                        <div class="col">Latitude</div>
                        <div class="col">${lat}</div>
                    </div>
                    <div class="row">
                        <div class="col">Longitude</div>
                        <div class="col">${lng}</div>
                    </div>
                </div>
            `;
        }
        
        // Menambahkan event listener pada marker untuk menampilkan popup dengan koordinat
        marker.on('click', function() {
            popup.setLatLng(marker.getLatLng()),
            popup.setContent(formatContent(marker.getLatLng().lat,marker.getLatLng().lng));
        });

        // Menambahkan event listener pada marker untuk menampilkan popup saat marker di-drag
        marker.on('drag', function(event) {
            popup.setLatLng(marker.getLatLng()),
            popup.setContent(formatContent(marker.getLatLng().lat,marker.getLatLng().lng));
            marker.openPopup();
        });

        // Mengatur ulang peta setelah beberapa saat
        setTimeout(function () {
            window.dispatchEvent(new Event("resize"));
        }, 500);


        var baseMaps ={
            'Open Street Map' : osm,
            'Esri World Imaginary Map' : Esri_World,
            'Esri Nat Geo World Imaginary Map' : Esri_Map,
            'Stadia Alidade Dark Map':Stadia_Dark
        }
        

        L.control.layers(baseMaps).addTo(map)

        // Cara Pertama
        function onMapClick(e) {
            var koordinat = document.querySelector("[name=koordinat]");
            var latitude = document.querySelector("[name=latitude]");
            var longitude = document.querySelector("[name=longitude]");
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            if (!marker) {
                marker = L.marker(e.latlng).addTo(map);
            } else {
                marker.setLatLng(e.latlng);
            }
            koordinat.value = lat + "," + lng; // Perbaikan operator concatenation
            latitude.value = lat;
            longitude.value = lng;
        }
        map.on('click', onMapClick);
    


        // Cara Kedua
        marker.on('dragend',function(){
            var koordinat = marker.getLatLng();
            marker.setLatLng(koordinat,{
                draggable:true
            })
            $('#koordinat').val(koordinat.lat + "," + koordinat.lng).keyup()
            $('#latitude').val(koordinat.lat).keyup()
            $('#longitude').val(koordinat.lng).keyup()
        })
    </script>
@endpush