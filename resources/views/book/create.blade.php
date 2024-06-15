@extends('layouts.app')
@section('page_title', 'Add Book')
@section('book_active_class', 'active')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">{{ __('Add New Book') }}</h2>
            <a href="{{ route('books') }}" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-arrow-left"></i>Back</a>
        </div>
    </div>
</div>
<div class="row m-t-30">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('books.create_process') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="book_name" class="control-label mb-1">Book name</label>
                        <input id="book_name" name="book_name" type="text" value="{{ old('book_name') }}" class="form-control">
                        @error('book_name')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="book_category" class="control-label mb-1">Category</label>
                        <select class="js-example-basic-multiple form-control" id="book_category"  name="book_category[]" multiple="multiple">
                            @foreach ($result['category'] as $item)
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endforeach
                        </select>
                        @error('book_category')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="book_author" class="control-label mb-1">Author</label>
                        <select class="form-control" id="book_author" name="book_author">
                            <option value="">Choose Author</option>
                            @foreach ($result['author'] as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('book_author')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="book_publisher" class="control-label mb-1">Publisher</label>
                        <select class="form-control" id="book_publisher" name="book_publisher">
                            <option value="">Choose Publisher</option>
                            @foreach ($result['publisher'] as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('book_publisher')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="book_qty" class="control-label mb-1">Qty</label>
                        <input id="book_qty" name="book_qty" type="text" value="{{ old('book_qty') }}" class="form-control">
                        @error('book_qty')
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