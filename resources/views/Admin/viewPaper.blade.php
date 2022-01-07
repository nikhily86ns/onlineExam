@extends('Admin.master')

@section('content')

<div class="conatainer">
    <h2 class="text-center">Exams</h2> <br>
    @foreach($data as $res)
    <div>
     <h3 class="text-uppercase"> <i class="fa fa-hand-o-right" style="font-size:36px"></i> &nbsp; <a href="{{ route('admin.viewquestion',$res->id) }}">{{ $res->subject }}</a></h3>
    </div>
    @endforeach
</div>


@endsection