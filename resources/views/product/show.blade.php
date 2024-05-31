@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
  
                <div class="form-group">
                  <label for="code">Code</label>
                  <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" placeholder="000/ABC/II/24" autocomplete="off" disabled value="{{ old('code') ?? $product->code }}">
                  @error('code')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name Product" autocomplete="off" disabled value="{{ old('name') ?? $product->name }}">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" placeholder="Email" autocomplete="off" disabled value="{{ old('date') ?? $product->date }}">
                  @error('date')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="name">Type Product</label>
                 <select disabled name="types" id="types" class="form-control @error('types') is-invalid @enderror" >
                  <option value="">-- Select Product --</option>
                  <option value="PC" {{$product->types == "PC" ? "selected" : ''}}>PC</option>
                  <option value="Network" {{$product->types == "Network" ? "selected" : ''}}>Network</option>
                  <option value="Printer" {{$product->types == "Printer" ? "selected" : ''}}>Printer</option>
                </select>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="20000000" autocomplete="off" disabled value="{{ old('price') ?? $product->price }}">
                  @error('price')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea disabled name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                  @error('description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <a href="{{ route('basic.index') }}" class="btn btn-default">Back to list</a>

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
