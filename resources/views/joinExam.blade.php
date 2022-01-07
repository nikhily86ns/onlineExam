@extends('layouts.app')

@section('title')
	Exams
@endsection

@section('extra-css')
<style>
     #footer {
    bottom: 0;
    width: 100%;
    position: relative;
    height: $height-footer;
    background-color: #f5f5f5;
    .footer-block {
      margin: 20px 0;
    }
    .sub-header{
        display:none !important;
    }
</style>
@endsection

@section('content')

<section class="section mt-5">
    
<div class="container-fluid py-5">
    <div class="col-md-12 ">
        <div class="row py-3">
            <div class="col-md-4 bg-light text-center py-3">
                <h4>Exam : {{ $subject[0]->subject }}</h4>
            </div>
            <div class="col-md-4 bg-light text-center py-3"><h4>Time : 30 Minutes</h4></div>
            <div class="col-md-4 bg-light text-center py-3"><h4>Timer : <span class="js-timeout">30:00</span></h4></div>
        </div>
        <div class="row">
            @if(count($data) > 0)
            <form action="{{ route('submitExam') }}" id="examForm" method="POST">
                @csrf
                @foreach($data as $key=>$res)
                    <h4 class="text-dark"> Q.{{$key+1}}) {{ $res->question }}</h4>
                    <input type="hidden" name="question{{$key+1}}" value="{{  $res->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="subject_id" value="{{ $subject[0]->id  }}">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input pt-3" type="radio" value="a" name="option{{ $key+1 }}">
                            <h5 class="text-dark">  <label class="form-check-label pt-1" >
                            a) {{ $res->a }}
                            </label></h5>
                            <input class="form-check-input pt32" type="radio" value="b" name="option{{ $key+1 }}">
                            <h5 class="text-dark"> <label class="form-check-label pt-1" >
                            b) {{ $res->b }}
                            </label></h5>
                            <input class="form-check-input pt-3" type="radio" value="c" name="option{{ $key+1 }}">
                            <h5 class="text-dark">  <label class="form-check-label pt-1" >
                            c) {{ $res->c }}
                            </label></h5>
                            <input class="form-check-input pt-3" type="radio" value="d" name="option{{ $key+1 }}">
                            <h5 class="text-dark">  <label class="form-check-label pt-1" >
                            d) {{ $res->d }}
                            </label></h5>
                            <!-- <input type="radio" checked="checked" name="option[]" style="display:none;"> -->
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <div class="col-md-12 mt-3">
                        <input type="hidden" name="index" value="<?php echo $key+1 ?>">
                        <button type="submit" class="submitExam btn btn-primary w-100">Submit</button>
                    </div>
            </form>
            @else
            <h1 class="text-center">No Question Paper</h1>
            @endif
        </div>
    </div>
</div>

</section>


    <div class="footer bg-dark" id="footer" style="margin-top:0px;">
      <p>Copyright © 2022 Engineer Masters Solutions. All Rights Reserved. 
          <br>Design: <a href="#" target="_parent" title="free css templates">Nikhil Shukla</a></p>
    </div>

@endsection

@section('extra-script')
<script type="text/javascript">
	var interval;
	function countdown() {
	  clearInterval(interval);
	  interval = setInterval( function() {
	      var timer = $('.js-timeout').html();
	      timer = timer.split(':');
	      var minutes = timer[0];
	      var seconds = timer[1];
	      seconds -= 1;
	      if (minutes < 0) return;
	      else if (seconds < 0 && minutes != 0) {
	          minutes -= 1;
	          seconds = 59;
	      }
	      else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;

	      $('.js-timeout').html(minutes + ':' + seconds);

	      if (minutes == 0 && seconds == 0) { 
              clearInterval(interval); alert('time UP');
                $('#examForm').submit();
              }
	  }, 1000);
	}

	$('.js-timeout').text("30:00");
	countdown();
</script>
@endsection
