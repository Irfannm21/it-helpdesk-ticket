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
                            <label for="name">Ticket ID</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Name Product" autocomplete="off"
                                value="{{ old('name') ?? $realization->workplan->ticket->code }}" disabled>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Name Product" autocomplete="off"
                                value="{{ old('name') ?? $realization->workplan->ticket->client->name }}" disabled>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">PC ID</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Name Product" autocomplete="off"
                                value="{{ $realization->workplan->ticket->client->pc->code ?? ' - ' }}" disabled>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Printer ID</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Name Product" autocomplete="off"
                                value="{{ $realization->workplan->ticket->client->printer->code ?? ' - ' }}" disabled>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Network ID</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Name Product" autocomplete="off"
                                value="{{ $realization->workplan->ticket->client->network->code ?? ' - ' }}" disabled>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Issue</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10" disabled>{{ $realization->workplan->ticket->description ?? ' - ' }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-body">
            <form action="{{ route('realization.update', $realization->workplan->id) }}" method="post">
                @csrf
                @method('put')
            <div class="form-group">
                <label for="name">Select Technician</label>
                <select name="technician_id" id="technician_id" class="form-control">
                    <option value="" selected>-- Select --</option>
                    @foreach ($results as $item)
                        <option value="{{ $item->id }}" {{$item->id == $realization->technician_id ? 'selected' : ''}}>{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('technician_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="name">Date</label>
                  <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="date" @isset($realization->started)
                  value="{{$realization->date->format('Y-m-d')}}"
              @endisset>
                  @error('date')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="started">Time Start</label>
                  <input type="time" name="started" class="form-control @error('started') is-invalid @enderror" id="name" @isset($realization->started)
                  value="{{$realization->started->format('H:i')}}"
              @endisset>
                  @error('started')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="finished">Time End</label>
                  <input type="time" name="finished" class="form-control @error('finished') is-invalid @enderror" id="finished" @isset($realization->finished)
                      value="{{$realization->finished->format('H:i')}}"
                  @endisset>
                  @error('finished')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              </div>
            </div>

            <button type="submit" name="action" value="submit" class="btn btn-primary">Save</button>
            <button type="submit" name="action" value="draft" class="btn btn-warning">Draft</button>
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
