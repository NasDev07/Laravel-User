@extends('layouts.admin_template')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Add User</h4>

        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($message = Session::get('failed'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Tanbah User</h5>
                    <div class="card-body">
                        <form action="{{ route('users.update', $edit->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Input Usrname" aria-describedby="defaultFormControlHelp"
                                    value="{{ $edit->name }}">
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Input Email" aria-describedby="defaultFormControlHelp"
                                    value="{{ $edit->email }}">
                                @error('email')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="is_admin" class="form-label">Is Admin</label>
                                <input type="number" class="form-control" id="is_admin" name="is_admin"
                                    placeholder="Input is_admin" aria-describedby="defaultFormControlHelp"
                                    value="{{ $edit->is_admin }}">
                                @error('is_admin')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Input password" aria-describedby="defaultFormControlHelp">
                                <span>Biarkan kosong, jika tidak ingin mengantikan password</span>
                                @error('password')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <input type="submit" value="Update" id="save" name="save" class="btn btn-info">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
