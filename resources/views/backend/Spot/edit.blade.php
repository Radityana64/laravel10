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
                        <h2 class="text-black">Update Tempat - {{ $spot->nama_dinas }}</h2>
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
                    <label for=""><h3>Update Tempat - {{ $spot->nama_dinas }}</h3></label>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('spot.update',$spot->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group my-3">
                        <label for="">Koordinat</label>
                        <input type="text" class="form-control @error('coordinate')
                                    is-invalid
                                @enderror" name="koordinat" id="koordinat" value="{{ $spot->koordinat }}">
                                @error('coordinate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                    </div>

                    <div class="form-group my-3">
                        <label for="">Nama Dinas</label>
                        <input type="text" class="form-control @error('nama_dinas')
                        @enderror" name="nama_dinas" id="nama_dinas" value="{{ $spot->nama_dinas }}">
                        @error('nama_dinas')
                            <div class="invalid-feedback">{{ $message }}</div>                        
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control @error('alamat')
                        @enderror" name="alamat" id="alamat" value="{{ $spot->alamat }}">
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="">Deskripsi</label>
                        <textarea type="text" class="form-control @error('deskripsi') @enderror" name="deskripsi" id="deskripsi" cols ="20" rows="8">{{ $spot->deskripsi }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="">Tipe</label>
                        <input type="text" class="form-control @error('tipe') @enderror" name="tipe" id="tipe" value="{{ $spot->tipe }}">
                        @error('tipe')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="">Upload Gambar</label>
                        <img src="{{ $spot->getImageAsset() }}" alt="">
                        <input type="file" class="form-control @error('image')
                            is-invalid
                        @enderror" name="image" >
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm my-2 btn-primary">Update</button>
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
            center:[{{ $spot->koordinat }}],
            minZoom:8,
            zoom:17,
            layers:[osm]
        })

        
        // Membuat ikon marker kustom
        var iconMarker = L.icon({
            iconUrl :"{{ asset('storage/marker/marker.png') }}",
            iconSize:     [30, 46], // ukuran ikon
        })

        // Membuat marker dengan ikon kustom
        var marker = L.marker([{{ $spot->koordinat }}],{
            icon:iconMarker,
            draggable : true // Mengaktifkan fitur drag untuk marker
        })
        .addTo(map); // Menambahkan marker ke peta

        // var marker2 = L.marker([-8.486668932611492, 115.3173047121189],{
        //     icon:iconMarker,
        //     draggable : true
        // })
        // .bindPopup('Marker 2')
        // .addTo(tourism);

        // var marker3 = L.marker([-8.467268260694425, 115.37084147277473],{
        //     icon:iconMarker,
        //     draggable : true
        // })
        // .bindPopup('Marker 3')
        // .addTo(tourism);
        
        // var marker4 = L.marker([-8.463235720208237, 115.38830801672603],{
        //     icon:iconMarker,
        //     draggable : true
        // })
        // .bindPopup('Marker 4')
        // .addTo(tourism);

        // var marker5 = L.marker([-8.45423663551003, 115.3847031280481],{
        //     icon:iconMarker,
        //     draggable : true
        // })
        // .bindPopup('Marker 5')
        // .addTo(tourism);

        // var marker6 = L.marker([-8.447794725914598, 115.38016590877855],{
        //     icon:iconMarker,
        //     draggable : true
        // })
        // .bindPopup('Marker 6')
        // .addTo(public);


        // // Membuat lingkaran 1
        // var circle = L.circle([-8.645429164002962, 115.25432263477632], {
        //     color: 'green',
        //     fillColor: 'green',
        //     fillOpacity: 0.5,
        //     radius: 50
        // }).addTo(map).bindPopup('Circle'); // Menambahkan popup pada lingkaran 1

        


        // //Membuat Polygon
        // var polygon = L.polygon([
        //     [-8.644531134310702, 115.25254693481176],
        //     [-8.648678430809323, 115.24786916259878],
        //     [-8.64688587091655, 115.25431719264468]
	    // ]).addTo(map).bindPopup('I am a polygon.');


        // //  Membuat Polyline
        // var latlng =[
        //     [-8.649450890832753, 115.25999491195525],
        //     [-8.64833420537685, 115.27081653757861],
        //     [-8.646623148659561, 115.27537109381738],
        //     [-8.64688921071602, 115.27490955541373],
        // ]
        // var polyline = L.polyline(latlng).bindPopup('contoh polyline').addTo(map)
        // map.fitBounds(polyline.getBounds())



        // // Membuat Rectangle
        // const koordinat =[
        //     [-8.642182272017498, 115.25638215799657],
        //     [-8.643459354219631, 115.26479699188323],
        //     [-8.647436525353614, 115.25604999350104],
        //     [-8.646122968887697, 115.26553513520663]
	    // ]
        // var rectangle = L.rectangle(koordinat,{
        //         weight:2, 
        //         fillColor:'yellow'
        //     })
        //     .bindPopup('Contoh rectangle')
        //     .addTo(map)
        // map.fitBounds(koordinat)



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