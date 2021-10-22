<div class="card card-info" style="width:100%;">
            <div class="card-header">
                <h3 class="card-title">MAP</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                </div>         
            </div>
            <div class="card-body">
                <div class="map" id="map" style="min-height: 500px; height: 500px; max-height: 250px; max-width: 100%;"></div>
                <div class="table-responsive">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">SYMBOL</th>
                    <th scope="col">JENIS</th>
                    <th scope="col">JUMLAH</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row"><img src="https://maps.google.com/mapfiles/ms/micons/pink-dot.png" alt=""></th>
                    <td>UMUM</td>
                    <td>{{count($umum)}} Indonesia</td>
                    </tr>
                    <tr>
                    <th scope="row"><img src="https://maps.google.com/mapfiles/ms/micons/yellow-dot.png" alt=""></th>
                    <td>ANGGOTA</td>
                    <td>{{count($anggota)}} Indonesia</td>
                    </tr>
                    <tr>
                    <th scope="row"><img src="https://maps.google.com/mapfiles/ms/micons/blue-dot.png" alt=""></th>
                    <td>RANTUS</td>
                    <td>{{count($rantus)}} Indonesia</td>
                    </tr>
                    <tr>
                    <th scope="row"><img src="https://maps.google.com/mapfiles/ms/micons/green-dot.png" alt=""></th>
                    <td>KORUS</td>
                    <td>{{count($korus)}} Indonesia</td>
                    </tr>
                </tbody>
                </table>
                </div>
            </div>
            <!-- /.card-body -->
</div>
<script>
      var map;
      function initMap() {
        map = new google.maps.Map(
            document.getElementById('map'),
            {center: new google.maps.LatLng(-7.4302745,109.1994041), zoom: 10});

        var iconBase =
            'https://maps.google.com/mapfiles/ms/micons/';

        var icons = {
          korus: {
            icon: iconBase + 'green-dot.png'
          },
          rantus: {
            icon: iconBase + 'blue-dot.png'
          },
          umum: {
            icon: iconBase + 'pink-dot.png'
          },
          anggota: {
            icon: iconBase + 'yellow-dot.png'
          }
        };
       
        var features = [
          @foreach($rantus as $rantuss)
          {
            position: new google.maps.LatLng({{$rantuss->lat}}, {{$rantuss->lng}}),
            type: 'rantus',
            title : '{{$rantuss->name}}'
          },
          @endforeach
          @foreach($korus as $koruss)
          {
            position: new google.maps.LatLng({{$koruss->lat}}, {{$koruss->lng}}),
            type: 'korus',
            title : '{{$koruss->name}}'
          },
          @endforeach
          @foreach($umum as $umums)
          {
            position: new google.maps.LatLng({{$umums->lat}}, {{$umums->lng}}),
            type: 'umum',
            title : '{{$umums->name}}'
          },
          @endforeach
          @foreach($anggota as $anggotas)
          {
            position: new google.maps.LatLng({{$anggotas->lat}}, {{$anggotas->lng}}),
            type: 'anggota',
            title : '{{$anggotas->name}}'
          },
          @endforeach
        ];
        
        
        // Create markers.
        for (var i = 0; i < features.length; i++) {
          (function(index){
            var marker = new google.maps.Marker({
              position: features[index].position,
              icon: icons[features[index].type].icon,
              map: map,
            });
            var content = "<Strong> Anggota : "+features[i].type+"</Strong>"+
                          "<p>Nama : "+features[i].title+"</p>";
            
            var infoWindow = new google.maps.InfoWindow({
              content :content
            });

            marker.addListener('mouseover', function() {
                  
                  infoWindow.open(map, marker);
                });
            marker.addListener('mouseout', function() {
                  
                  infoWindow.close();
                });
          })(i);
        };

        

  
      }
    </script>
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDemdFWvj2w0tNeQOYwRqF2hqz09Tr-96A&callback=initMap">
    </script>