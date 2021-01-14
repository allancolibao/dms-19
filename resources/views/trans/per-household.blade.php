@if(isset($households))
    @if($households->count() > 0)   
        <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">List of Households</h4>
                        <p class="category">Based on F11</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped auto-index">
                            <thead>
                                <th>No.</th>
                                <th>EACODE</th>
                                <th>HCN</th>
                                <th>SHSN</th>
                                <th>SEND</th>
                            </thead>
                            <tbody>
                            @foreach ($households as $value)
                                <tr>
                                    <td></td>
                                    <td>{{ $value->eacode }}</td>
                                    <td>{{ $value->hcn }}</td>
                                    <td>{{ $value->shsn }}</td>
                                    <td>  
                                        <button data-url="{{ route('per.household-send', ['eacode'=>$value->eacode, 'hcn'=>$value->hcn, 'shsn'=>$value->shsn])}}" class="btn btn-secondary per-household" style="background:#fd145a;">
                                            <i class="pe-7s-plane"></i> SEND
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        {{-- Loading Spinner --}}
        <div id="loading" class="overlay" style="display:none">
            <div class="overlay__inner">
                <div class="overlay__content">
                    <span class="spinner"></span>
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




<script>
    $('.per-household').on('click', function (event) {
        event.preventDefault();

        $("#loading").removeAttr('style');

        $.ajax({
            url: $(this).data('url'),
            success: function (response) {
                console.log(response)

                setTimeout(()=> {
                    $("#loading").attr('style', 'display:none');
                }, 2000)
                
            }
        });
        return false;
    });
</script>
