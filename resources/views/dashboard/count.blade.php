@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Total Count of Individuals</h4>
                                <p class="category">Based on data table 7.1</p>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>FOLDER NO.</th>
                                        <th>EACODE</th>
                                        <th>AREANAME</th>
                                        <th>INDIVIDUALS</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($count as $value)
                                        <tr>
                                            <td></td>
                                            <td>{{ $value->eacode }}</td>
                                            {{-- <td>{{ $value->hcn }}</td> --}}
                                            {{-- <td>{{ $value->shsn }}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>             
    </div>

@endsection