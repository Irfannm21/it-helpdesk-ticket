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
                <th>Ticket Info</th>
                <th>Issue Datetime</th>
                <th>Technician Name</th>
                <th>Repair Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{!! $result->client->name . "<br>" . $result->code !!}</td>
                    <td>{{ $result->datetime->format('d-m-Y')}} <br> {{$result->datetime->format('H : i') }}</td>
                    <td>{{ $result->workplan->realizations ? $result->workplan->realizations->user->name : '' }} <br> {{$result->workplan->realizations ? $result->workplan->realizations->user->position->name : ''}}</td>
                    <td>{{ $result->workplan->realizations ? $result->workplan->realizations->date->format('d-m-Y') : ''  }}</td>
                    <td>{!! $result->checkLabel($result->checkStatus($result->id)) !!}</td>
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
