@extends('layouts.app')
@section('page_title', 'Edit Book')
@section('book_active_class', 'active')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">{{ __('Edit Book') }}</h2>
            <a href="{{ route('books') }}" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-arrow-left"></i>Back</a>
        </div>
    </div>
</div>
<div class="row m-t-30">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('books.update', $book->id) }}" method="post">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="book_name" class="control-label mb-1">Book name</label>
                        <input id="book_name" name="book_name" type="text" value="{{ $book->book_name }}" class="form-control">
                        @error('book_name')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="book_category" class="control-label mb-1">Category</label>
                        <select class="js-example-basic-multiple form-control" id="book_category"  name="book_category[]" multiple="multiple">
                            @foreach ($category as $item)
                                <option value="{{$item->id}}" {{ in_array($item->id, $books_cat_array) ? "selected" : ""}}>
                                    {{$item->category_name}}
                                </option>
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
                            @foreach ($author as $item)
                                <option value="{{$item->id}}" @if($item->id == $book->author_id) selected @endif >{{$item->name}}</option>
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
                            @foreach ($publisher as $item)
                                <option value="{{$item->id}}" @if($item->id == $book->publisher_id) selected @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('book_publisher')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="book_qty" class="control-label mb-1">Qty</label>
                        <input id="book_qty" name="book_qty" type="text" value="{{ $book->qty }}" class="form-control">
                        @error('book_qty')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-lg btn-info btn-block">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection