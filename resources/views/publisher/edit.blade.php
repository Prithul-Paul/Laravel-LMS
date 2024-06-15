@extends('layouts.app')
@section('page_title', 'Edit Publisher')
@section('publisher_active_class', 'active')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">{{ __('Edit Publisher') }}</h2>
            <a href="{{ route('publishers') }}" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-arrow-left"></i>Back</a>
        </div>
    </div>
</div>
<div class="row m-t-30">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('publishers.update', $publisher->id) }}" method="post">
                    @csrf
                    {{ method_field('PUT')}}
                    <div class="form-group">
                        <label for="publisher" class="control-label mb-1">Publisher name</label>
                        <input id="publisher" name="publisher" type="text" value="{{ $publisher->name }}" class="form-control">
                        @error('publisher')
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