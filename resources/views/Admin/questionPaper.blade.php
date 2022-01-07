@extends('Admin.master')

@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            @if(count($data) > 0)
            @foreach($data as $key=>$res)
                <h4 class="text-dark"> Q.{{$key+1}}) {{ $res->question }}</h4>
                <div class="col-md-4">
                    <div class="form-check">
                        <!-- <input class="form-check-input" type="radio" value="a" name="optiona"> -->
                       <h5 class="text-dark">  <label class="form-check-label" >
                       a) {{ $res->a }}
                        </label></h5>
                        <!-- <input class="form-check-input" type="radio" value="c" name="optionc"> -->
                        <h5 class="text-dark"> <label class="form-check-label" >
                        b) {{ $res->c }}
                        </label></h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <!-- <input class="form-check-input" type="radio" value="b" name="optionb"> -->
                        <h5 class="text-dark">  <label class="form-check-label" >
                        c) {{ $res->b }}
                        </label></h5>
                        <!-- <input class="form-check-input" type="radio" value="d" name="optiond"> -->
                        <h5 class="text-dark">  <label class="form-check-label" >
                        d) {{ $res->d }}
                        </label></h5>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger deleteQuestion" data-id="{{ $res->id }}" data-token="{{ csrf_token() }}">Delete</button>
                    <a href="{{ route('admin.editQuestion',$res->id)}}" class="btn btn-warning">Update</a>
                </div>
                <h4 class="text-dark">Answer :-  Option {{ $res->answer }} </h4>
                <hr>
            @endforeach
            @else
                <h1 class="text-center">No Questions....!!!!</h1>
            @endif
        </div>
    </div>
</div>

@endsection

@section('extra-script')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
$(".deleteQuestion").click(function(){
        var id = $(this).data("id");
        var token = $(this).data("token");
        $.ajax(
        {
            url: "/delete-question/"+id,
            type: 'delete',
            dataType: "JSON",
            data: {
                "id": id,
                "_token": token,
            },
            success: function ()
            {
                console.log("it Work");
                location.reload();
            }
        });

        console.log("It failed");
    });
</script>
@endsection
