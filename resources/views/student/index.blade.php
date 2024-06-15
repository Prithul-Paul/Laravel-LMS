@extends('layouts.app');
@section('book_active_class', 'active')
@section('page_title', 'Books')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">{{ __('Books') }}</h2>
            <a href="{{ route('books.create') }}" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>add book</a>
        </div>
    </div>
</div>

<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        @if(session()->has('success'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" role="alert">
            {{session()->get('success')}}
        </div>
        @endif
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Book Name</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($result as $book)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $book->book_name }}</td>
                            <td>
                                @foreach($book->categories as $cat)
                                    {{$cat->category_name}},
                                @endforeach
                            </td>
                            <td>{{ $book->authors->name }}</td>
                            <td>{{ $book->publishers->name }}</td>
                            <td>
                                @if ($book->status == 1)
                                 <span class="badge badge-success">Available</span>
                                @else
                                 <span class="badge badge-danger">Danger</span>
                                @endif
                            </td>
                            <td><a href="{{ route('books.edit', $book) }}" class="btn btn-success btn-sm">Edit</a>
                            <button id="book_delete" data-url="{{ route('books.destroy', $book) }}" class="btn btn-danger btn-sm">Delete</button></td>
                        </tr> 
                        @php $i++; @endphp 
                    @endforeach
                </tbody>
            </table>
            {{ $result->links('vendor/pagination/bootstrap-5') }}
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection
@push('ajax-js')  
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
@endpush