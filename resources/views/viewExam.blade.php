@extends('layouts.app')

@section('title')
	Exams
@endsection

@section('extra-css')
<style>
	#examTable_filter{
		float:right;
	}
</style>
@endsection

@section('content')

<section class="section main-banner" id="top" data-section="section1">

        <!-- <video autoplay muted loop id="bg-video">
          <source src="{{ asset('asset/images/course-video.mp4') }}" type="video/mp4" />
        </video> -->
        <img src="{{ asset('asset/images/exam.jpg') }}" alt="">

        <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
              <h6>Hello Students</h6>
              <h2>Welcome to Engineer Masters Examination</h2>
              <p>Engineer Master development centre at Indore, India. We have team of Business Analysts, Designers, Developers and QAs well versed with different technologies, tools and best practices. We began our operations in 2013 with the vision to become an organization that develops partnerships with its clients, believes in aspiring, accountable and action oriented approach to provide excellence and innovation in whatever we do, wherever we go.</p>
              <div class="main-button-red">
                  <!-- <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div> -->
              </div>
          </div>
              </div>
            </div>
          </div>
        </div>
</section>

<!-- <section>
    <div class="conatainer py-5">
        <h2 class="text-center">Exams</h2> <br>
        @foreach($data as $res)
        <div>
        <h3 class="text-uppercase"> <i class="fa fa-hand-o-right" style="font-size:36px"></i> &nbsp; <a href="{{ route('joinExam',$res->id) }}">{{ $res->subject }}</a></h3>
        </div>
        @endforeach
    </div>
</section> -->


<section class="py-5">
  <div class="d-flex justify-content-center">
    <div class="col-md-10">
      <table class="table text-nowrap bg-light" id="examTable">
        <div class="d-flex justify-content-center">
              
          <thead>
            <tr>
              <th class="border-top-0">#</th>
              <th class="border-top-0">Name</th>
              <th class="border-top-0">Timing</th>
              <th class="border-top-0">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach($data as $key=>$row)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $row->subject }}</td>
                <td>30 Minutes</td>
                <td> 
                  <a href="{{ route('joinExam',$row->id) }}" class="btn btn-primary">Join Exam</a>
                </td>
              </tr>
              @endforeach
          </tbody>
        </div>
      </table>

    </div>
  </div>
</section>

    <div class="footer bg-dark" style="margin-top:0px;">
      <p>Copyright © 2022 Engineer Masters Solutions. All Rights Reserved. 
          <br>Design: <a href="#" target="_parent" title="free css templates">Nikhil Shukla</a></p>
    </div>

@endsection

@section('extra-script')
<script>
	 $('#examTable').DataTable();
</script>

@endsection