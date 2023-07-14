@extends('layouts.admin_template')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Add User</h4>

        <div class="row">
            @include('notif')
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Tanbah User</h5>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Input Usrname" aria-describedby="defaultFormControlHelp">
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">EMail</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Input Email" aria-describedby="defaultFormControlHelp">
                                @error('email')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Input password" aria-describedby="defaultFormControlHelp">
                                @error('password')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Input password"
                                    aria-describedby="defaultFormControlHelp">
                                @error('password')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <input type="submit" value="Save" id="save" name="save" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
