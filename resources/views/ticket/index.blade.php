@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('ticket.create') }}" class="btn btn-primary mb-3">New Ticket</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Code</th>
                <th>Date Time</th>
                <th>Client Name</th>
                <th>Client ID</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $result->code }}</td>
                    <td>{{ $result->datetime->format('d-m-Y')}} <br> {{$result->datetime->format('H : i') }}</td>
                    <td>{{ $result->client->name }} ({{ $result->client->position->name }})</td>
                    <td>{{ $result->client->code ?? '' }}</td>
                    <td>{!! $result->getDescriptionRaw($result->description) !!}</td>
                    <td>{!! $result->checkLabel($result->status) !!}</td>
                    <td>
                        <div class="btn-group">
                        <button class="dropdown-toggle btn-primary" href="#" data-toggle="collapse" data-target="#collapseTwo{{$result->id}}"
                        aria-expanded="false" aria-controls="collapseTwo{{$result->id}}">
                           <span>{{ __('Action') }}</span></button>
                        </button>
                    </div>
                        <div id="collapseTwo{{$result->id}}" class="collapse" aria-labelledby="headingTwo"
                        style="width:50px;">
                       
                        <div class="collapse-inner rounded bg-white py-2">
                            @if ($result->status == "Draft") 
                               <a class="dropdown-item" href="{{ route('ticket.show', $result->id) }}">
                                <button type="button" class="btn btn-sm btn-success">
                                 <i class="fas fa-fw fa-eye"></i>
                                <span>{{ __('Show') }}</span></button>
                            </a>
                            <div class="dropdown-item">
                                <form action="{{ route('ticket.destroy', $result->id) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this?')"> <i class="fas fa-fw fa-trash"></i>
                                    <span>{{ __('Delete') }}</span></button>
                              </form>
                              </div>
                              <a class="dropdown-item" href="{{ route('ticket.edit', $result->id) }}">
                                <button type="button" class="btn btn-sm btn-warning">
                                    <i class="fas fa-fw fa-pencil-alt"></i>
                                   <span>{{ __('Edit') }}</span></button>
                            </a>
                            @else
                            <a class="dropdown-item" href="{{ route('ticket.show', $result->id) }}">
                                <button type="button" class="btn btn-sm btn-success">
                                 <i class="fas fa-fw fa-eye"></i>
                                <span>{{ __('Show') }}</span></button>
                            </a>
                           
                            @endif
                        </div>
                        </div>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $results->links() }}

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
