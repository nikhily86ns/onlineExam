@extends('Admin.master')

@section('content')

    <div class="container">
        <div class="col-md-4">
            <form action="{{ route('admin.createQuestion') }}" method="POST">
                @csrf
                <select name="subject" class="form-select">
                    <option value="">Select Exam</option>
                    @foreach ($data as $value)
                        <option value="{{ $value->id }}" {{ $value->id == old('subject') ? 'selected' : '' }}>{{ $value->subject }}</option>
                    @endforeach
                </select>
                @error('subject')
                    <small id="usercheck" style="color: red;" >
                        {{$message}}
                    </small>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">Question</label>
                    <input type="text" class="form-control" value="{{old('question')}}" name="question" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Question">
                </div>
                @error('question')
                    <small id="usercheck" style="color: red;" >
                        {{$message}}
                    </small>
                @enderror
                <div class="form-group">
                    <label for="option">Option A</label>
                    <input type="text" class="form-control" value="{{old('a')}}" id="optiona" name="a" >
                </div>
                @error('a')
                    <small id="usercheck" style="color: red;" >
                        {{$message}}
                    </small>
                @enderror
                <div class="form-group">
                    <label for="option">Option B</label>
                    <input type="text" class="form-control" value="{{old('b')}}" id="optionb" name="b" >
                </div>
                @error('b')
                    <small id="usercheck" style="color: red;" >
                        {{$message}}
                    </small>
                @enderror
                <div class="form-group">
                    <label for="option">Option C</label>
                    <input type="text" class="form-control" value="{{old('c')}}" id="optionc" name="c" >
                </div>
                @error('c')
                    <small id="usercheck" style="color: red;" >
                        {{$message}}
                    </small>
                @enderror
                <div class="form-group">
                    <label for="option">Option D</label>
                    <input type="text" class="form-control" value="{{old('d')}}" id="optiond" name="d" >
                </div>
                @error('d')
                    <small id="usercheck" style="color: red;" >
                        {{$message}}
                    </small>
                @enderror
                <div class="form-group">
                    <label for="option">Answer</label>
                    <input type="text" class="form-control" value="{{old('answer')}}" id="answer" name="answer" >
                </div>
                @error('answer')
                    <small id="usercheck" style="color: red;" >
                        {{$message}}
                    </small>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection