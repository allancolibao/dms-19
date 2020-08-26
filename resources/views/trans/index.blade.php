@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2 class="title">Transmit Data 🚀</h2><br/>
                        <p class="category">Please enter the 12 digits eacode and click search</p>
                        <div class="content table-responsive table-full-width search">
                            @include('inc.messages')
                            <form action="{{ route('search.area') }}" method="POST" role="search">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="number" step="any" class="form-control" name="key" placeholder="143201002000" autofocus required> 
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btnsearch">
                                                <i class="pe-7s-download"></i> Search
                                        </button>
                                    </span>
                                </div>
                            </form>
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
