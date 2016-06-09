@extends('layouts.app')

@section('content')


<h1>Showing {{ $contact->firstname }} {{ $contact->lastname }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>First Name:</strong> {{ $contact->firstname }}<br>
            <strong>Last Name:</strong> {{ $contact->lastname }}<br>
            <strong>Email:</strong> {{ $contact->email }}<br>
            <strong>Phone Number:</strong> {{ $contact->phone }}<br>
            <strong>Birthday:</strong> {{ $contact->birthday }}<br>
            <strong>Address:</strong> {{ $contact->address }}<br>
            <strong>City:</strong> {{ $contact->city }}<br>
            <strong>State:</strong> {{ $contact->state }}<br>
            <strong>Zip:</strong> {{ $contact->zip }}<br>

            <!-- show google map if a valid address is provided -->
            <div id="map" style="height:300px;width:500px;visibility:hidden;margin-left:auto;margin-right:auto"></div>
            <script>
            var map;
              function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 8,
                  center: {lat: -34.397, lng: 150.644}
                });
                var geocoder = new google.maps.Geocoder();

                geocodeAddress(geocoder, map);
              }

              function geocodeAddress(geocoder, resultsMap) {
                var address = "{{ $contact->address }},{{ $contact->city }},{{ $contact->state }},{{ $contact->zip }}";
                geocoder.geocode({'address': address}, function(results, status) {
                  if (status === google.maps.GeocoderStatus.OK) {
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                      map: resultsMap,
                      position: results[0].geometry.location,
                      title: "{{ $contact->firstname }} {{ $contact->lastname }}\n{{ $contact->address }}\n{{ $contact->city }}, {{ $contact->state }} {{ $contact->zip }}",
                      animation: google.maps.Animation.DROP,
                      icon: 'http://maps.google.com/mapfiles/ms/icons/grn-pushpin.png'
                    });

                    var contentString = "{{ $contact->firstname }} {{ $contact->lastname }}<br>{{ $contact->address }}<br>{{ $contact->city }}, {{ $contact->state }} {{ $contact->zip }}"

                    var infowindow = new google.maps.InfoWindow({
                      content: contentString
                    });

                    infowindow.open(map, marker);

                    marker.addListener('click', function() {
                      infowindow.open(map, marker);
                    });

                    // only show map if geocoding worked
                    document.getElementById('map').style.visibility = "visible";
                    document.getElementById('map').style.width = "500px";
                    document.getElementById('map').style.height = "300px";
                  } else {
                    // hide map if geocoding didn't work
                    document.getElementById('map').style.width = "0px";
                    document.getElementById('map').style.height = "0px";
                    document.getElementById('map').style.visibility = "hidden";
                  }
                });
              }
            </script>
            <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApZC3CY_Hmvj_5PIW_O1dY2lCQQvZ1z4c&callback=initMap">
            </script>

            <form action="{{ url('contacts/'.$contact->id.'/edit') }}" method="GET">
                {{ csrf_field() }}
                {{ method_field('GET') }}

                <button type="submit" class="btn btn-default">
                     Edit
                </button>
            </form><br>
            <form action="{{ url('contact/'.$contact->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </form>
        </p>
    </div>


@endsection
