@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2 class="title">Update Data 📝</h2><br/>
                        <h4 class="title">✔️ Membership<br/> ✔️ Food Record<br/> ✔️ Food Recall</h4><br/>
                        <p class="category">Please enter the 12 digits eacode</p>
                        <div class="content table-responsive table-full-width search">
                            @include('inc.messages')
                            <form action="{{ route('search') }}" method="POST" role="search">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="number" step="any" class="form-control" name="key" placeholder="143201002000" autofocus required> 
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btnsearch">
                                                <i class="pe-7s-search"></i> Search
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
