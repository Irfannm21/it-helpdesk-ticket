@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Ticket</th>
                <th>Repair Count</th>
                <th>Technician Name</th>
                <th>Feedback Date</th>
                <th>Feedback</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $result->realization->workplan->ticket->code ?? '' }}</td>
                    <td>{{$result->realization->details->count() ?? ''}}</td>
                    <td>{{ $result->realization->user->name ?? '' }}</td>
                    <td>{{$result->date ? $result->date->format('d-m-Y') : ''}}</td>
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
                                <a class="dropdown-item" href="{{ route('review.show', $result->id) }}">
                                    <button type="button" class="btn btn-sm btn-success">
                                     <i class="fas fa-fw fa-eye"></i>
                                    <span>{{ __('Show') }}</span></button>
                                </a>
                                @if ($result->status == "New") 
                                <a class="dropdown-item" href="{{ route('review.edit', $result->id) }}">
                                    <button type="button" class="btn btn-sm btn-warning">
                                        <i class="fas fa-fw fa-check"></i>
                                       <span>{{ __('Tambah') }}</span></button>
                                </a>
                                  
                                @elseif ($result->status == "Draft")
                                <a class="dropdown-item" href="{{ route('review.edit', $result->id) }}">
                                    <button type="button" class="btn btn-sm btn-warning">
                                        <i class="fas fa-fw fa-check"></i>
                                       <span>{{ __('Edit') }}</span></button>
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
