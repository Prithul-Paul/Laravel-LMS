@extends('layouts.app')
@section('page_title', 'Add Student')
@section('student_active_class', 'active')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">{{ __('Add New Student') }}</h2>
            <a href="{{ route('students') }}" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-arrow-left"></i>Back</a>
        </div>
    </div>
</div>
<div class="row m-t-30">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('students.create_process') }}" method="post">
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
                        <label for="phone_number" class="control-label mb-1">Phone Number</label>
                        <input id="phone_number" name="phone_number" type="text" value="{{ old('phone_number') }}" class="form-control">
                        @error('phone_number')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1">Gender</label><br>
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label ">
                                <input type="radio" id="inline-radio1" name="gender" value="M" class="form-check-input">Male
                            </label>
                            <label for="inline-radio2" style="margin-left: 17px;" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="gender" value="F" class="form-check-input">Female
                            </label>
                        </div>
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