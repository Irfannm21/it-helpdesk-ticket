@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    {{-- <a href="{{ route('ticket.create') }}" class="btn btn-primary mb-3">New Ticket</a> --}}

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Ticket ID</th>
                <th>Client Name</th>
                <th>Issue Description</th>
                <th>Technician Name & Fix date</th> 
                <th>Instruction Description</th> 
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $result->workplan->ticket->code }}</td>
                    <td>{{ $result->workplan->ticket->client->name }} <br>{{ $result->workplan->ticket->client->code }} </td>
                    <td>
                        {!! $result->workplan->getDescriptionRaw($result->workplan->ticket->description) !!}
                    </td>
                    <td>{{ $result->user->name ?? '' }} <br> {{ $result->date->format('d M Y') ?? '' }}  ( {{ $result->started->format('H:i') ?? '' }} - {{ $result->finished->format('H:i') ?? '' }} ) </td>
                    <td>
                        {!! $result->workplan->getDescriptionRaw($result->workplan->description) !!}
                    </td>
                    {{-- <td>{{ $result->workplan->ticket->datetime->format('d-m-Y')}} <br> {{$result->workplan->ticket->datetime->format('H : i') }}</td> --}}
                    <td>{{ $result->status }}</td>
                    <td>
                        <div class="d-flex">
                            @if ($result->status == "New")
                            <a href="{{ route('realization.edit',$result->id) }}" class="btn btn-sm btn-success mr-2">Reschdule</a>
                            <a href="{{ route('realization.detail',$result->id) }}" class="btn btn-sm btn-success mr-2">Detail</a>
                            
                            @elseif($result->status == "Draft") 
                            {{-- <a href="{{ route('realization.edit', $result->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a> --}}
                            {{-- <form action="{{ route('workplan.destroy', $result->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this?')">Delete</button>
                            </form> --}}
                            @endif
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
