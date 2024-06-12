@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
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
                @foreach ($results as $result)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $result->product->code ?? '' }}</td>
                        <td> {{ $result->realization->date->format('d-M-Y') ?? '' }}<br> {{" (" . $result->started->format("H:i")  . " - " . $result->finished->format("H:i") . ")" }}</td>
                        <td>
                            {!! $result->getDescriptionRaw($result->description)  !!}
                        </td> 
                   
                    </tr>
                @endforeach
            </tbody>
        </table>
    
                <div class="form-group">
                  <label for="description">Feedback Date</label>
                 <input disabled type="date" class="form-control" name="date" value="{{$review->date ? $review->date->format('Y-m-d') : ''}}">
                  @error('description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              
                <div class="form-group">
                  <label for="description">Feedback</label>
                  <textarea disabled name="description" id="description" class="form-control" cols="30" rows="10">{{$review->description}}</textarea>
                  @error('description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
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
