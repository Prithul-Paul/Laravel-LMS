@extends('layouts.app')
@section('page_title', 'Edit Author')
@section('author_active_class', 'active')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">{{ __('Edit Author') }}</h2>
            <a href="{{ route('authors') }}" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-arrow-left"></i>Back</a>
        </div>
    </div>
</div>
<div class="row m-t-30">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('authors.update', $author->id) }}" method="post">
                    @csrf
                    {{ method_field('PUT')}}
                    <div class="form-group">
                        <label for="author" class="control-label mb-1">Author name</label>
                        <input id="author" name="author" type="text" value="{{ $author->name }}" class="form-control">
                        @error('author')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <input value="{{  }}" type="hidden" name="author_id"> --}}
                    <div>
                        <button type="submit" class="btn btn-lg btn-info btn-block">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
@endsection