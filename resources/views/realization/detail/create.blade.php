@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <!-- Main Content goes here -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('realization.store') }}" method="post">
                        @csrf
                        <input hidden type="text" name="realization_id" class="form-control" value="{{$realization->id}}">
                    <div class="card-title">
                        <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Client ID</label>
                                        <input disabled type="text" name="workplan_id" class="form-control @error('name') is-invalid @enderror"
                                            id="name" autocomplete="off" value="{{$realization->workplan->ticket->client->code}}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Hardware Client</label>
                                        <select name="product_id" id="product_id" class="form-control">
                                            <option value="">-- Pilih Satu --</option>
                                            <option value="{{$realization->workplan->ticket->client->pc_id}}">{{$realization->workplan->ticket->client->pc->code}}</option>
                                            <option value="{{$realization->workplan->ticket->client->printer_id}}">{{$realization->workplan->ticket->client->printer->code}}</option>
                                            <option value="{{$realization->workplan->ticket->client->network_id}}">{{$realization->workplan->ticket->client->network->code}}</option>
                                        </select>
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
                                <label for="name">Date</label>
                                <input type="date" name="date" disabled
                                    class="form-control @error('date') is-invalid @enderror" id="date" value="{{$realization->date->format('Y-m-d')}}">
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="started">Time Start</label>
                                <input type="time" name="started"
                                    class="form-control @error('started') is-invalid @enderror" id="name">
                                @error('started')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="finished">Time End</label>
                                <input type="time" name="finished"
                                    class="form-control @error('finished') is-invalid @enderror" id="finished">
                                @error('finished')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Problem Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ old('description') }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('realization.index') }}" class="btn btn-default">Back to list</a>
                    </div>
                </div>
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
