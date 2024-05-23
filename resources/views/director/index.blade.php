@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contohModal">Tampilkan Modal</button> --}}
    {{-- <div class="modal fade" id="contohModal" tabindex="0">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('director.store') }}" method="post">
                        @csrf
                        
                        <input type="text" name="type" value="director" hidden>
        
                        <div class="form-group">
                          <label for="code">Code</label>
                          <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" placeholder="DIR00" autocomplete="off" value="{{ old('code') }}">
                          @error('code')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
        
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name Product" autocomplete="off" value="{{ old('name') }}">
                          @error('name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
        
                        <div class="form-group">
                          <label for="name">Parent  ID</label>
                          <select name="parent_id" id="" class="form-control">
                            <option value="" selected>-- Select --</option>
                            @foreach ($parents as $item)
                                <option value="{{$item->id}}" {{$item->id == old('parent_id') ? "selected" : '' }}>{{$item->name}}</option>
                            @endforeach
                          </select>
                          @error('name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
        
                        
        
                       
        
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('director.index') }}" class="btn btn-default">Back to list</a>
        
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <a href="{{ route('director.create') }}" class="btn btn-primary mb-3">New Product</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table-bordered table-stripped table">
        <thead>
            <tr>
                <th>No</th>
                <th>Code</th>
                <th>Name</th>
                <th>Parent Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $result->code }}</td>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->parent->name ?? '' }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('director.edit', $result->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                            <form action="{{ route('director.destroy', $result->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure to delete this?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{ $results->links() }} --}}

    <!-- End of Main Content -->
@endsection

@push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning border-left-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush
