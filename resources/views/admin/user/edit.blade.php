@extends('admin.layouts.main')
@section('container')

<div class="col-lg-8">
    <form method="post" action="/admin/user/{{ $data->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $data->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required value="{{ old('username', $data->username) }}">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $data->email) }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="authenticate" class="form-label">Teach Subject</label>
            <select class="form-select @error('authenticate') is-invalid @enderror" id="authenticate" name="authenticate" aria-label="Default select example">
            <option value="0" @if (old('authenticate', $data->authenticate) == '0') selected @endif>User</option>
            <option value="1" @if (old('authenticate', $data->authenticate) == '1') selected @endif >Staff</option>
            <option value="2" @if (old('authenticate', $data->authenticate) == '2') selected @endif>Admin</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Upadate Data</button>
    </form>
    </div>


@endsection
