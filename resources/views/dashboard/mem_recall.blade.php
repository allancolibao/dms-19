@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Form 7.2 - Food Recall - Member infomation</h4>
                        <p class="category"> 
                            Eacode : {{$eacode}}<br>
                            Hcn : {{$hcn}} - Shsn : {{$shsn}}<br>
                            Member : {{$member}} - {{$givenname}} {{$surname}}
                            Age : {{$age}}
                        </p>
                        <div style="padding-bottom:2vmin; padding-top:1vmin;">
                            <a href="{{ route('members', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn])}}">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="pe-7s-user"></i> Members
                                </button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <h2 class="text-center" style="background:#fafafa; padding:2vmin; color:#79ab16;">Please select day, Thank you!</h2>
                    </div>
                    <div>
                        <div class="content row text-center" style="padding:5vmin;">
                            <div class="col-md-6" style="padding:5vmin;">
                                <a href="{{ route('mem_recall_edit', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'MEMBER_CODE'=>$member, 'GIVENNAME'=>$givenname, 'SURNAME'=>$surname, 'AGE'=>$age, 'recday'=>1])}}">
                                    <button type="submit" class="btn btn-secondary col-md-12" style="padding:1vmin; border-radius:1em;  font-size:3em;">
                                        <i class="pe-7s-next"></i> DAY 1
                                    </button>
                                </a>
                            </div>
                            <div class="col-md-6" style="padding:5vmin;">
                                <a href="{{ route('mem_recall_edit', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'MEMBER_CODE'=>$member, 'GIVENNAME'=>$givenname, 'SURNAME'=>$surname, 'AGE'=>$age, 'recday'=>2])}}">
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
