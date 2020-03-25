@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div>
                        <ul class="nav nav-tabs">
                            <li><a href="{{ url('/summary') }}">Manila</a></li>
                            <li><a href="{{ url('/summary1') }}">Cagayan</a></li>
                            <li><a href="{{ url('/summary2') }}">Bulacan</a></li>
                            <li><a href="{{ url('/summary3') }}">Eastern Samar</a></li>
                            <li><a href="{{ url('/summary4') }}">Taguig City</a></li>
                            <li><a href="{{ url('/summary5') }}">Abra</a></li>
                            <li><a href="{{ url('/summary6') }}">Olongapo City</a></li>
                            <li><a href="{{ url('/summary7') }}">Iloilo City</a></li>
                            <li><a href="{{ url('/summary8') }}">Zamboanga del Norte</a></li>
                            <li><a href="{{ url('/summary9') }}">Cagayan de Oro</a></li>
                            <li><a href="{{ url('/summary10') }}">Quezon City</a></li>
                            <li><a href="{{ url('/summary11') }}">Nueva Vizcaya</a></li>
                            <li><a href="{{ url('/summary12') }}">Laguna</a></li>
                            <li><a href="{{ url('/summary13') }}">Tacloban City</a></li>
                            <li><a href="{{ url('/summary14') }}">Northern Samar</a></li>
                            <li  class="active"><a href="{{ url('/summary15') }}">Maguindanao</a></li>
                            <li><a href="{{ url('/summary16') }}">Iloilo</a></li>
                            <li><a href="{{ url('/summary17') }}">Mandaue</a></li>
                            <li><a href="{{ url('/summary18') }}">Las Pinas</a></li>
                            <li><a href="{{ url('/summary19') }}">Mt. Province</a></li>
                            <li><a href="{{ url('/summary20') }}">Oriental Mindoro</a></li>
                            <li><a href="{{ url('/summary21') }}">Camarines Norte</a></li>
                            <li><a href="{{ url('/summary22') }}">Sultan Kudarat</a></li>
                            <li><a href="{{ url('/summary23') }}">Mandaluyong</a></li>
                            <li><a href="{{ url('/summary24') }}">San Juan</a></li>
                            <li><a href="{{ url('/summary25') }}">Isabela</a></li>
                            <li><a href="{{ url('/summary26') }}">Sorsogon</a></li>
                            <li><a href="{{ url('/summary27') }}">Aklan</a></li>
                            <li><a href="{{ url('/summary28') }}">City of Isabela</a></li>
                            <li><a href="{{ url('/summary29') }}">Baguio City</a></li>
                            <li><a href="{{ url('/summary30') }}">Zambales</a></li>
                            <li><a href="{{ url('/summary31') }}">Siquijor</a></li>
                            <li><a href="{{ url('/summary32') }}">Western Samar</a></li>
                            <li><a href="{{ url('/summary33') }}">Caloocan</a></li>
                            <li><a href="{{ url('/summary34') }}">Butuan City</a></li>
                            <li><a href="{{ url('/summary35') }}">Capiz</a></li>
                            <li><a href="{{ url('/summary36') }}">Camiguin</a></li>
                            <li><a href="{{ url('/summary37') }}">Davao City</a></li>
                            <li><a href="{{ url('/summary38') }}">Davao Occidental</a></li>
                            <li><a href="{{ url('/summary39') }}">Makati City</a></li>
                        </ul>
                    </div>
                    <div class="header">
                    <h4 class="title">Maguindanao</h4>
                        <p class="category">Based on transmission log</p>
                    </div>
                    <div>
                        <table class="summarytransmitted">
                            <thead>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr>
                                <td></td>
                                </tr>    
                            </tbody>
                        </table>
                    </div>   
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name of encoder</th>
                                <th>Area name</th>
                                <th>Status</th>
                                <th>Date started</th>
                                <th>Date finished</th>
                            </thead>
                            <tbody>
                                @foreach ($summary as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->areaname }}</td>
                                    <td>{{ $value->status }}</td>
                                    <td>{{ date('M-d-Y', strtotime($value->dstarted )) }}</td>
                                    <td>{{ date('M-d-Y', strtotime($value->dfinished )) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                 <div class="paginationlink">{{$summary->links()}}</div>
            </div>
        </div>
@endsection
