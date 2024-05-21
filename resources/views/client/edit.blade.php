@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('client.update', $client->id) }}" method="post">
                @csrf
                @method('put')

                <div class="form-group">
                  <label for="code">Client ID</label>
                  <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" placeholder="000/POS/NO/IP" autocomplete="off" value="{{ old('code') ?? $client->code }}">
                  @error('code')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="First name" autocomplete="off" value="{{ old('name') ?? $client->name }}">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" autocomplete="off" value="{{ old('username') ?? $client->username }}">
                  @error('username')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="name">Jabatan</label>
                  <select name="position_id" id="" class="form-control">
                    <option value="" selected>-- Select --</option>
                    @foreach ($so as $item)
                        <option value="{{$item->id}}" {{$item->id == $client->position_id ? 'selected' : ''}}>{{$item->name}}</option>
                    @endforeach
                  </select>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" autocomplete="off" value="{{ old('email') ?? $client->email }}">
                  @error('email')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" autocomplete="off" value="{{  $client->password }}">
                  @error('password')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="name">PC ID</label>
                  <select name="pc_id" id="" class="form-control">
                    <option value="" selected>-- Select --</option>
                    @foreach ($pc as $item)
                        <option value="{{$item->id}}"{{$item->id == $client->pc_id ? 'selected' : ''}}>{{$item->code}}</option>
                    @endforeach
                  </select>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
  
                <div class="form-group">
                  <label for="name">Printer ID</label>
                  <select name="printer_id" id="" class="form-control">
                    <option value="" selected>-- Select --</option>
                    @foreach ($printer as $item)
                        <option value="{{$item->id}}" {{$item->id == $client->printer_id ? 'selected' : ''}} >{{$item->code}}</option>
                    @endforeach
                  </select>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
  
                <div class="form-group">
                  <label for="name">Nerwork ID</label>
                  <select name="network_id" id="" class="form-control">
                    <option value="" selected>-- Select --</option>
                    @foreach ($network as $item)
                        <option value="{{$item->id}}" {{$item->id == $client->network_id ? 'selected' : ''}}>{{$item->code}}</option>
                    @endforeach
                  </select>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
  

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('basic.index') }}" class="btn btn-default">Back to list</a>

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
