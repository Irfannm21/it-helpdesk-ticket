@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <!-- Main Content goes here -->
<div class="row">
    <div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="card-title"><h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1></div>
            <hr>
            <div class="row">
                <div class="col-md-12">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Issue</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="10" disabled>{{ $realization->workplan->ticket->description ?? ' - ' }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="card-title"><h1 class="h3 mt-2 text-gray-800">{{ $title_2 ?? __('Blank Page') }}</h1>   </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                     <div class="form-group">
                <label for="name">Select Technician</label>
                <select disabled name="technician_id" id="technician_id" class="form-control">
                        <option>{{ $realization->workplan->user->name }}</option>
                </select>
                @error('technician_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="name">Date</label>
                  <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="date" @isset($realization->workplan->started)
                  value="{{$realization->workplan->started->format('Y-m-d')}}"
              @endisset disabled>
                  @error('date')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="started">Time Start</label>
                  <input type="time" name="started" class="form-control @error('started') is-invalid @enderror" id="name" @isset($realization->workplan->started)
                  value="{{$realization->workplan->started->format('H:i')}}"
              @endisset disabled>
                  @error('started')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="finished">Time End</label>
                  <input type="time" name="finished" class="form-control @error('finished') is-invalid @enderror" id="finished" @isset($realization->workplan->finished)
                      value="{{$realization->workplan->finished->format('H:i')}}"
                  @endisset disabled>
                  @error('finished')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              </div>
            </div>
    
            <div class="form-group">
                <label for="description">Note</label>
                <textarea disabled name="description" id="description" class="form-control" cols="30" rows="10">{{$realization->workplan->description ?? ''}}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>
</div>

    <div class="card mt-5">
        <div class="card-body">
            <div class="card-title">
                <h1 class="h3 mt-4 text-gray-800">{{ $title_3 ?? __('Blank Page') }}</h1>
            </div>
            <hr>
              <a href="{{ route('realization.create',$realization->id) }}" class="btn btn-primary mb-3">Add Realization</a>
            <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Hardware ID</th>
                <th>Repair Date</th>
                <th>Issue Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $result->product->code }}</td>
                    <td> {{ $result->realization->date->format('d-M-Y')  }}<br> {{" (" . $result->started->format("H:i") . " - " . $result->finished->format("H:i") . ")" }}</td>
                    {{-- <td>
                        {!! $result->workplan->getDescriptionRaw($result->workplan->ticket->description) !!}
                    </td> --}}
                    {{-- <td>{{ $result->workplan->user->name ?? '' }} <br> {{ $result->workplan->started->format('d M Y') ?? '' }}  ( {{ $result->workplan->started->format('H:i') ?? '' }} - {{ $result->workplan->finished->format('H:i') ?? '' }} ) </td> --}}
                    <td>
                        {!! $result->getDescriptionRaw($result->description) !!}
                    </td> 
                    {{-- <td>{{ $result->workplan->ticket->datetime->format('d-m-Y')}} <br> {{$result->workplan->ticket->datetime->format('H : i') }}</td> --}}
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('realization.detailEdit', $result->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                            <form action="{{ route('realization.edit', $result->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('realization.index') }}" class="btn btn-default">Back to list</a>
           
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
