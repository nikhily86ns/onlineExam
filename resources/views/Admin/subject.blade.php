@extends('Admin.master')

@section('extra-css')
<style>
	#subjectTable_filter{
		float:right;
	}
</style>
@endsection

@section('content')

    <div class="container pb-5">
        <div class="col-md-4">
            <form action="{{ route('admin.createSubject') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Enter Exam Name" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <section class="card py-5">
        <h1 class="text-center">All Exam</h1>
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
            <table class="table text-nowrap bg-light" id="subjectTable">
                <div class="d-flex justify-content-center">
                    
                <thead>
                    <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">View Question Paper</th>
                    <th class="border-top-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key=>$row)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $row->subject }}</td>
                        <td>
                            <a href="{{ route('admin.viewquestion',$row->id) }}" class="btn btn-primary">View</a>
                        </td>
                        <td> 
                            <a href="{{ route('admin.deleteSubject',$row->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </div>
            </table>

            </div>
        </div>
    </section>

@endsection


@section('extra-script')
<script>
	 $('#subjectTable').DataTable();
</script>

@endsection