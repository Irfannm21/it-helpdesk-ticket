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
                    <td>{!! $result->checkLabel($result->status) !!}</td>
                    <td>
                        {{-- <div class="d-flex">
                            @if ($result->status == "New" || "Draft") 
                            <a href="{{ route('realization.edit',$result->id) }}" class="btn btn-sm btn-success mr-2">Reschdule</a>
                            <a href="{{ route('realization.detail',$result->id) }}" class="btn btn-sm btn-success mr-2">Detail</a>
                            
                            @elseif($result->status == "Draft") 
                    
                            @endif
                        </div>
                        <a class="dropdown-item" href="{{ route('workplan.edit', $result->id) }}">
                            <button type="button" class="btn btn-sm btn-warning">
                                <i class="fas fa-fw fa-user"></i>
                               <span>{{ __('Edit') }}</span></button>
                        </a> --}}

                        <div class="btn-group">
                            <button class="dropdown-toggle btn-primary" href="#" data-toggle="collapse" data-target="#collapseTwo{{$result->id}}"
                            aria-expanded="false" aria-controls="collapseTwo{{$result->id}}">
                               <span>{{ __('Action') }}</span></button>
                            </button>
                        </div>
                            <div id="collapseTwo{{$result->id}}" class="collapse" aria-labelledby="headingTwo"
                            style="width:50px;">
                           
                            <div class="collapse-inner rounded bg-white py-2">
                                <a class="dropdown-item" href="{{ route('realization.show', $result->id) }}">
                                    <button type="button" class="btn btn-sm btn-success">
                                     <i class="fas fa-fw fa-eye"></i>
                                    <span>{{ __('Show') }}</span></button>
                                </a>


                                @if (($result->status == "New") && $result->details->isNotEmpty() == false) 
                                <a class="dropdown-item" href="{{ route('realization.edit', $result->id) }}">
                                    <button type="button" class="btn btn-sm btn-warning">
                                        <i class="fas fa-fw fa-user"></i>
                                       <span>{{ __('Reschdule') }}</span></button>
                                </a>
                                <a class="dropdown-item" href="{{ route('realization.detail', $result->id) }}">
                                    <button type="button" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-fw fa-tools"></i>
                                       <span>{{ __('Detail') }}</span></button>
                                </a>

                                @elseif (($result->status == "Draft" || $result->status == "New") && ($result->details->isNotEmpty() == true))
                              
                                <a class="dropdown-item" href="{{ route('realization.detail', $result->id) }}">
                                    <button type="button" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-fw fa-tools"></i>
                                       <span>{{ __('Detail') }}</span></button>
                                </a>

                                @elseif($result->status == "Completed")

                                <a class="dropdown-item" href="{{ route('realization.print', $result->id) }}">
                                    <button type="button" class="btn btn-sm btn-secondary">
                                     <i class="fas fa-fw fa-print"></i>
                                    <span>{{ __('Print') }}</span></button>
                                </a>

                                @endif
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
