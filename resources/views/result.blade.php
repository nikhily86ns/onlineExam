@extends('layouts.app')

@section('title')
	Result
@endsection

@section('content')
<section class="section main-banner" id="top" data-section="section1">

        <img src="{{ asset('asset/images/result.jpg') }}" alt="">

        <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
                    <h2>Thank You For Submit Your Exam</h2>
                    <h6>Your Result :- </h6>
              <h3 class="text-white">{{ $result }} %</h3>
              <div class="main-button-red">
                  <!-- <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div> -->
              </div>
          </div>
              </div>
            </div>
          </div>
        </div>
</section>

@php 
 $opt = json_decode($answer->option);
@endphp

<section class="py-5">
  <div class="d-flex justify-content-center">

    <div class="col-md-12">
        <div class="row">
        <h2 class="text-center">Check Your Answers</h2>
            @if(count($answer) > 0)
            @foreach($answer as $key=>$res)
                <h5 class="text-dark"> Q.{{$key+1}}) {{ $res->question }}</h5>
                <div class="col-md-4 my-2">
                    <div class="form-check">
                        <!-- <input class="form-check-input" type="radio" value="a" name="optiona"> -->
                       <h6 class="text-dark">  <label class="form-check-label" >
                       a) {{ $res->a }}
                        </label></h6>
                        <!-- <input class="form-check-input" type="radio" value="c" name="optionc"> -->
                        <h6 class="text-dark"> <label class="form-check-label" >
                        b) {{ $res->c }}
                        </label></h6>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="form-check">
                        <!-- <input class="form-check-input" type="radio" value="b" name="optionb"> -->
                        <h6 class="text-dark">  <label class="form-check-label" >
                        c) {{ $res->b }}
                        </label></h6>
                        <!-- <input class="form-check-input" type="radio" value="d" name="optiond"> -->
                        <h6 class="text-dark">  <label class="form-check-label" >
                        d) {{ $res->d }}
                        </label></h6>
                    </div>
                </div>
                <div class="col-md-2">
                  Your Answer :- {{ $opt[$key] }}
                </div>
                <h5 class="text-dark">Answer :-  Option {{ $res->answer }} </h5>
                <hr>
            @endforeach
            @else
                <h1 class="text-center">No Questions....!!!!</h1>
            @endif
        </div>
    </div>
  </div>
</section>

    <div class="footer bg-dark" style="margin-top:0px;">
      <p>Copyright © 2022 Engineer Masters Solutions. All Rights Reserved. 
          <br>Design: <a href="#" target="_parent" title="free css templates">Nikhil Shukla</a></p>
    </div>

@endsection