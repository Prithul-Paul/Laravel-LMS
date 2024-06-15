@extends('layouts.app')
@section('page_title', 'Issue Book')
@section('issuebook_active_class', 'active')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">{{ __('Issue Book') }}</h2>
            <a href="{{ route('books') }}" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-arrow-left"></i>Back</a>
        </div>
    </div>
</div>
<div class="row m-t-30">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('book-issues.create_process') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="student_name" class="control-label mb-1">Student name</label>
                        <input id="student_name" name="student_name" type="text" value="{{ old('student_name') }}" class="form-control">
                        @error('student_name')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="student_email" class="control-label mb-1">Student email</label>
                        <input id="student_email" name="student_email" type="text" value="{{ old('student_email') }}" class="form-control">
                        @error('student_email')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="student_phone" class="control-label mb-1">Student phone</label>
                        <input id="student_phone" name="student_phone" type="text" value="{{ old('student_phone') }}" class="form-control">
                        @error('student_phone')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-lg btn-info btn-block">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection