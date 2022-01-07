@extends('Admin.master')

@section('extra-css')
<style>
	#subjectTable_filter{
		float:right;
	}
</style>
@endsection

@section('content')


    <section class="card py-5">
        <h1 class="text-center">All Results</h1>
        <div class="d-flex justify-content-center">
            <div class="col-md-10">
            <table class="table text-nowrap bg-light" id="subjectTable">
                <div class="d-flex justify-content-center">
                    
                <thead>
                    <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Student Name</th>
                    <th class="border-top-0">Exam</th>
                    <th class="border-top-0">Result</th>
                    <th class="border-top-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key=>$row)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->subject }}</td>
                        <td>{{ round($row->result,2) }} %</td>
                        <td> 
                            <button type="button" class="btn btn-warning text-dark contact" data-id="{{ $row->id }}">
                                Contact
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </div>
            </table>

            </div>
        </div>
    </section>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Contact Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark">
           Email :- <h5 id="email"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




@endsection


@section('extra-script')
<script>
	 $('#subjectTable').DataTable();
</script>

<script>
    $(".contact").click(function(){
        var id = $(this).data("id");
        $.ajax(
        {
            url: "/view-result-detail/"+id,
            type: 'get',
            data: {
                "id": id
            },
            success: function (data)
            {
                $('#email').text(data.data.email);
                $('#exampleModal').modal('show');
            }
        });
    });
</script>
@endsection