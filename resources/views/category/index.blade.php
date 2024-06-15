@extends('layouts.app');
@section('category_active_class', 'active')
@section('page_title', 'Categories')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">{{ __('Categories') }}</h2>
            <a href="{{ route('categories.create') }}" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>add category</a>
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
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($result as $category)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td><a href="{{ route('categories.edit', $category) }}" class="btn btn-success btn-sm">Edit</a>
                            <button id="category_delete" data-url="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger btn-sm">Delete</button></td>
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