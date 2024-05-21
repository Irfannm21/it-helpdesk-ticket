@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('department.update', $department->id) }}" method="post">
                @csrf
                @method('put')
                <input type="text" name="type" value="department" hidden>

                <div class="form-group">
                  <label for="code">Code</label>
                  <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" placeholder="000/ABC/II/24" autocomplete="off" value="{{ old('code') ?? $department->code }}">
                  @error('code')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name Product" autocomplete="off" value="{{ old('name') ?? $department->name }}">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>


                <div class="form-group">
                  <label for="name">Parent</label>
                 <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror" >
                  <option value="" selected>-- Select --</option>
                  @foreach ($parents as $item)
                      <option value="{{$item->id}}" {{$item->id == $department->parent_id ? 'selected' : ''}}>{{$item->name}}</option>
                  @endforeach
                </select>
                  @error('parent_id')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('department.index') }}" class="btn btn-default">Back to list</a>

            </form>
        </div>
    </div>

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
