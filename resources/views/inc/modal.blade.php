<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="foodrecordmodal_1" tabindex="-1" role="document" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Form 7.2 - Food Recall</h3>
          <p class="category">Based on data transmission</p>
        </div>
        <div class="modal-body">
            @if(isset($foodrecall))
                @if($foodrecall->count() > 0)
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div><br>
                                            <table class="summarytransmitted">
                                                <thead>
                                                    <th>Total number of Individuals</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <td id="totalcount">{{$countrecall}}</td>
                                                    </tr>    
                                                </tbody>
                                            </table>
                                        </div>   
                                        <div class="content table-responsive table-full-width">
                                            <table class="table table-hover table-striped ">
                                                <thead>
                                                    <th>Eacode</th>
                                                    <th>Hcn</th>
                                                    <th>Shsn</th>
                                                    <th>Member no.</th>
                                                    <th>Name</th>
                                                    <th>Age</th>
                                                    <th>Check 7.2</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($foodrecall as $value)
                                                    <tr>
                                                        <td>{{ $value->eacode }}</td>
                                                        <td>{{ $value->hcn }}</td>
                                                        <td>{{ $value->shsn }}</td>
                                                        <td>{{ $value->MEMBER_CODE }}</td>
                                                        <td>{{ $value->GIVENNAME }} {{ $value->SURNAME }}</td>
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
                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-12" style="padding-top:5vmin">
                        <div class="card">
                            <div class="header" >
                                <h5 class="alert alert-warning">No records to display</h5><hr>
                        </div>  
                    </div>
                </div> 
            @endif
        @endif 
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
