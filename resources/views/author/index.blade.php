@extends('layouts.app');
@section('author_active_class', 'active')
@section('page_title', 'Authors')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">{{ __('Author') }}</h2>
            <a href="{{ route('authors.create') }}" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>add author</a>
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
                    @foreach ($result as $authoritem)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $authoritem->name }}</td>
                            <td><a href="{{ route('authors.edit', $authoritem) }}" class="btn btn-success btn-sm">Edit</a>
                            <button id="author_delete" data-url="{{ route('authors.destroy', $authoritem->id) }}" class="btn btn-danger btn-sm">Delete</button></td>
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