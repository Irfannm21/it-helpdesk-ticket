@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">


                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name Product" autocomplete="off" value="{{ old('name') ?? Auth::user()->name }}" readonly>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="name">PC ID</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name Product" autocomplete="off" value="{{ Auth::user()->pc->code ?? ' - ' }}" readonly>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Printer ID</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name Product" autocomplete="off" value="{{ Auth::user()->printer->code ?? ' - ' }}" readonly>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Network ID</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name Product" autocomplete="off" value="{{ Auth::user()->network->code ?? ' - ' }}" readonly>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="description">Issue</label>
                  <textarea disabled name="description" id="description" class="form-control" cols="30" rows="10">{{$ticket->description}}</textarea>
                  @error('description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <a href="{{ route('ticket.index') }}" class="btn btn-default">Back to list</a>


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
