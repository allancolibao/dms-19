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
                                    <input type="number" step="any" class="form-control" name="key" placeholder="143201002000" autofocus required autocomplete="true"> 
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
                @if(isset($households))
                    @if($households->count() > 0)   
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">List of Households</h4>
                                        <p class="category">Based on F11</p>
                                    </div>
                                <div> <br>
                                        <table class="summarytransmitted">
                                            <thead>
                                                <th>Total number of households</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td id="totalcount">{{$count}}</td>
                                                </tr>    
                                            </tbody>
                                        </table>
                                    </div>   
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped auto-index">
                                            <thead>
                                                <th>No.</th>
                                                <th>EACODE</th>
                                                <th>HCN</th>
                                                <th>SHSN</th>
                                                <th>Household Membership</th>
                                                <th>Food Record</th>
                                                <th>Food Recall</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($households as $value)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ $value->eacode }}</td>
                                                    <td>{{ $value->hcn }}</td>
                                                    <td>{{ $value->shsn }}</td>
                                                    <td>  
                                                        <a href="{{ route('membership', ['eacode'=>$value->eacode, 'hcn'=>$value->hcn, 'shsn'=>$value->shsn])}}">
                                                                <button type="submit" class="btn btn-secondary" style="background:#aa26af;">
                                                                    <i class="pe-7s-id"></i> Form 6.1
                                                                </button>
                                                            </a>
                                                    </td>
                                                    <td>  
                                                        <a href="{{ route('record', ['eacode'=>$value->eacode, 'hcn'=>$value->hcn, 'shsn'=>$value->shsn])}}">
                                                            <button type="submit" class="btn btn-secondary" style="background:#26af92;">
                                                                <i class="pe-7s-home"></i> Form 6.3
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td> 
                                                        <a href="{{ route('individual', ['eacode'=>$value->eacode, 'hcn'=>$value->hcn, 'shsn'=>$value->shsn])}}">
                                                            <button type="submit" class="btn btn-secondary" style="background:#2248c5;">
                                                                <i class="pe-7s-add-user"></i> Form 7.2
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
                                        <h5 class="alert alert-warning">No records to display</h5><hr>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#foodrecordmodal_1">
                                                Check the Individuals
                                        </button>
                                        <hr>
                                </div>  
                            </div>
                        </div> 
                    @endif
                @endif  
            </div>
        </div>             
    </div>

@endsection
