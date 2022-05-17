
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header px-5">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Create New Attribute</h3>
                            @if(isset($product))
                             <span class="h4">product Name:</span><span class="h4 bolder">
                                 <a href="{{ route('admin.editproduct',$product->product_slug) }}">{{ ucfirst($product->product_name) }}</a></span>
                           
                            @endif
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="link pull-right"><i class="tim-icons icon-double-left"></i>Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-5">

                        @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{Session::get('message')}}
                                </div>
                            @endif


                        <form  id="attr_form_create" method="post" action="{{ route('admin.storeattribute')}}">

                            <input class="product_id" type="hidden" value="{{$product->product_id}}" name="product_id">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="attr_name" class=" control-label" style="font-size:14px;">Attribute Name:</label>
                                    <input type="text" name="attr_name" id="attr_name" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="center h3">Add Attribute Value:</div>
                            <div class="table-responsive ps">
                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Values</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>  <input type="text" id="value" name="value[]" class="input form-control valuesCreate" placeholder="Value"></td>
                                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"><i class="tim-icons icon-simple-add"></i>Add Value</button></td>
                                </tr>
                                <tr>
                                    
                                </tr>
                            </table>
                            </div>

                            <div class="d-grid">
                            <input type="submit" class="btn btn-submit btn-success" value="SAVE">
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <div class="card-header">
                        <h3>Attribute Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="list-group" id="myFileContainer">
                            
                            <table class="table"> 
                                <thead>
                                    <tr>
                                    <th>Attribute Name</th>
                                    <th>Values</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                    @forelse($product->attributes as $attribute)
                                    <tr>

                                    <td>{{ $attribute->attr_name }}</td>
                                    <td>
                                    @foreach($attribute->attributeValues as $value)
                                           <span>{{$value->value}},</span> 
                                    @endforeach
                                    </td>
                                    <td>
                                    <a href="{{ route('admin.deleteattr',$attribute->attr_id) }}" id="" class="btn btn-danger btn-sm btn-round btn-icon deleteAttribute" data-id="{{ $attribute->attr_id }}">
                                    <i class="tim-icons icon-simple-remove"></i>
                                    </a>
                                   
                                    </td>
                                    </tr>
                                    
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">  No data...</td>
                                      
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- End card body -->

                </div>
            </div>
        </div>
    </div>
</div>
@section('extra_js')
<script>
$(document).ready(function(){

    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" id="value" name="value[]" class="input form-control valuesCreate" placeholder="Value"></td><td><button type="button" class="btn btn-danger btn-md remove-input-field"><i class="tim-icons icon-simple-delete"></i> Remove</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });


    $('.btn-submit').on('click', (function (e) {
        e.preventDefault();

        var token = $('meta[name="csrf-token"]').attr('content');
        
        var valuesArray = [];
        
        $('.valuesCreate').map(function () {
            valuesArray.push($(this).val());
        });

        var product_id = $('.product_id').val();
        var attr_name = $('#attr_name').val();
        
            $.ajax({
                url:'{{route('admin.storeattribute')}}',
                type: 'POST',
                data:{ _token: token,product_id:product_id,attr_name:attr_name, value:valuesArray},
                dataType: 'JSON',
                success:function(data){
                    window.location.reload();
                    $("#attr_form_create")[0].reset(); 
                    $('.list-group').html(data);
                 
                },
                error: function (data) {
                    alert(data);
                }
            });
    }));

    $('.deleteAttribute').on('click', function(event){
        if(!confirm("ARE YOU SURE TO DELETE IT?")) {
        return false;
        }
        var url = event.target.href;
        alert(url);
        
        event.preventDefault();
        var id = $(this).data("id");

        var token = $("meta[name='csrf-token']").attr("content");
        
        $.ajax(
            {
            url: url, //or you can use url: "company/"+id,
            type: 'DELETE',
            data: {
                _token: token,
                    id: id
            },
            success: function (response){
                alert($results.message);
                window.location.reload();
                $("#success").html(response.message)

            },
            error: function (xhr) {
                alert(xhr.responseText.message);
                console.log(xhr.responseText);
            }
        });
        return false;
    });
}); 

</script>

@endsection