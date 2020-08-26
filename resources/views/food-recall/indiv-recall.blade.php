@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">

        <a href="{{ route('individual', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn])}}">
            <button type="submit" class="btn btn-secondary" style="background:#e61a2b;">
                <i class="pe-7s-back"></i> Go back
            </button>
        </a>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Form 7.2 - Food Recall - Individual Infomation</h4>
                        <p class="category"> 
                            EACODE : {{$eacode}}<br>
                            HCN : {{$hcn}} - Shsn : {{$shsn}}<br>
                            MEMBER : {{$member}} - {{$givenname}} {{$surname}}
                            AGE : {{$age}}
                        </p>
                    </div>
                    <hr>
                    <div>
                        <h2 class="text-center" style="background:#fafafa; padding:2vmin; color:#548d25;">Select day to start</h2>
                    </div>
                    <div>
                        <div class="content row text-center" style="padding:5vmin;">
                            <div class="col-md-6" style="padding:5vmin;">
                                <a href="{{ route('indiv.recall-edit', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'MEMBER_CODE'=>$member, 'GIVENNAME'=>$givenname, 'SURNAME'=>$surname, 'AGE'=>$age, 'recday'=>1])}}">
                                    <button type="submit" class="btn btn-secondary col-md-12" style="padding:1vmin; border-radius:1em;  font-size:3em;">
                                        <i class="pe-7s-next"></i> DAY 1
                                    </button>
                                </a>
                            </div>
                            <div class="col-md-6" style="padding:5vmin;">
                                <a href="{{ route('indiv.recall-edit', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'MEMBER_CODE'=>$member, 'GIVENNAME'=>$givenname, 'SURNAME'=>$surname, 'AGE'=>$age, 'recday'=>2])}}">
                                    <button type="submit" class="btn btn-secondary col-md-12" style="padding:1vmin; border-radius:1em;  font-size:3em;">
                                        <i class="pe-7s-next"></i> DAY 2
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
