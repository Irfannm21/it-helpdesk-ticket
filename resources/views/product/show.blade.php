@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="code">Code</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" placeholder="000/ABC/II/24" autocomplete="off" disabled value="{{ old('code') ?? $product->code }}">
                    @error('code')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name Product" autocomplete="off" disabled value="{{ old('name') ?? $product->name }}">
                    @error('name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" placeholder="Email" autocomplete="off" disabled value="{{ old('date') ?? $product->date }}">
                    @error('date')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
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
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="20000000" autocomplete="off" disabled value="{{ old('price') ?? $product->price }}">
                    @error('price')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea disabled name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                    @error('description')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>
             
                <a href="{{ route('basic.index') }}" class="btn btn-default">Back to list</a>

        </div>
    </div>

    <div class="card mt-5">
      <div class="card-body">
          <div class="card-title">
              <h1 class="h3 mt-4 text-gray-800">{{ $title_3 ?? __('Riwayat Perbaikan') }}</h1>
          </div>
          <hr>
          <table class="table table-bordered table-stripped">
      <thead>
          <tr>
              <th>No</th>
              <th>Hardware ID</th>
              <th>Repair Date</th>
              <th>Issue Description</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($product->details as $result)
              <tr>
                  <td scope="row">{{ $loop->iteration }}</td>
                  <td>{{ $result->product->code ?? '' }}</td>
                  <td> {{ $result->realization->date->format('d-M-Y') ?? '' }}<br> {{" (" . $result->started->format("H:i")  . " - " . $result->finished->format("H:i") . ")" }}</td>
                  {{-- <td>
                      {!! $result->workplan->getDescriptionRaw($result->workplan->ticket->description) !!}
                  </td> --}}
                  {{-- <td>{{ $result->workplan->user->name ?? '' }} <br> {{ $result->workplan->started->format('d M Y') ?? '' }}  ( {{ $result->workplan->started->format('H:i') ?? '' }} - {{ $result->workplan->finished->format('H:i') ?? '' }} ) </td> --}}
                  <td>
                      {!! $result->getDescriptionRaw($result->description)  !!}
                  </td> 
                  {{-- <td>{{ $result->workplan->ticket->datetime->format('d-m-Y')}} <br> {{$result->workplan->ticket->datetime->format('H : i') }}</td> --}}
              </tr>
          @endforeach
      </tbody>
  </table>
         
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
