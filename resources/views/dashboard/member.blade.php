@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            @if(isset($foodrecall))
                @if($foodrecall->count() > 0)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Form 7.2 - Food Recall</h4>
                                <p class="category"> 
                                    Eacode : {{$eacode}}<br>
                                    Hcn : {{$hcn}} - 
                                    Shsn : {{$shsn}}<br>
                                    Household Head : {{$hhead->GIVENNAME}}&nbsp;&nbsp;{{$hhead->SURNAME}} {{ number_format($hhead->AGE, 2) }}
                                </p>
                            </div>
                            <div><br>
                                <table class="summarytransmitted">
                                    <thead>
                                        <th>Total number of individuals</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td id="totalcount">{{$members}}</td>
                                        </tr>    
                                    </tbody>
                                </table>
                            </div>   
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped ">
                                        <thead>
                                            <th>Member no.</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Food Recall</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($foodrecall as $value)
                                        <tr>
                                            <td>{{ $value->MEMBER_CODE }}</td>
                                            <td>{{ $value->GIVENNAME }}&nbsp;&nbsp;&nbsp;{{ $value->SURNAME }}</td>
                                            <td>{{ number_format($value->AGE, 2) }}</td>
                                            <td> 
                                                <a href="{{ route('mem_recall', ['eacode'=>$value->eacode, 'hcn'=>$value->hcn, 'shsn'=>$value->shsn, 'MEMBER_CODE'=>$value->MEMBER_CODE, 'GIVENNAME'=>$value->GIVENNAME, 'SURNAME'=>$value->SURNAME, 'AGE'=>$value->AGE])}}">
                                                    <button type="submit" class="btn btn-secondary">
                                                        <i class="pe-7s-coffee"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                @else
                <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                    <h4 class="title">List of members</h4>
                                    <p class="category"></p>
                                    <h5 class="alert alert-info">No members</h5><hr>
                        </div>  
                    </div>
                </div> 
            @endif
        @endif  
    </div>
</div>
</div>

@endsection
