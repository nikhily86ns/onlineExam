@extends('Admin.master')

@section('content')

    <div class="container">
        <div class="col-md-4">
            <form action="{{ route('admin.updateQuestion') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $question->id }}" name="id">
                <input type="hidden" value="{{ $question->subject_id }}" name="subject_id">
                <select name="subject" class="form-select">
                    <option value="">Select Subject</option>
                    @foreach ($data as $value)
                        <option value="{{ $value->id }}" {{ $value->id ==$question->subject_id ? 'selected' : '' }}>{{ $value->subject }}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label for="exampleInputEmail1">Question</label>
                    <input type="text" class="form-control" name="question" value="{{ $question->question }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Question">
                </div>
                @error('question')
                    <small id="usercheck" style="color: red;" >
                        {{$message}}
                    </small>
                @enderror
                <div class="form-group">
                    <label for="option">Option A</label>
                    <input type="text" value="{{ $question->a }}" class="form-control" id="optiona" name="a" >
                </div>
                @error('a')
                    <small id="usercheck" style="color: red;" >
                        {{$message}}
                    </small>
                @enderror
                <div class="form-group">
                    <label for="option">Option B</label>
                    <input type="text" value="{{ $question->b }}" class="form-control" id="optionb" name="b" >
                </div>
                @error('b')
                    <small id="usercheck" style="color: red;" >
                        {{$message}}
                    </small>
                @enderror
                <div class="form-group">
                    <label for="option">Option C</label>
                    <input type="text" value="{{ $question->c }}" class="form-control" id="optionc" name="c" >
                </div>
                @error('c')
                    <small id="usercheck" style="color: red;" >
                        {{$message}}
                    </small>
                @enderror
                <div class="form-group">
                    <label for="option">Option D</label>
                    <input type="text" value="{{ $question->d }}" class="form-control" id="optiond" name="d" >
                </div>
                @error('d')
                    <small id="usercheck" style="color: red;" >
                        {{$message}}
                    </small>
                @enderror
                <div class="form-group">
                    <label for="option">Answer</label>
                    <input type="text" value="{{ $question->answer }}" class="form-control" id="answer" name="answer" >
                </div>
                @error('answer')
                    <small id="usercheck" style="color: red;" >
                        {{$message}}
                    </small>
                @enderror
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection