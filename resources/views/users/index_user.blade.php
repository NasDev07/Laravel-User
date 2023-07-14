@extends('layouts.admin_template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Users /</span> List
        </h4>
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                @include('notif')
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title text-primary">Halaman User</h5>

                                    <a href="{{ route('users.create') }}">
                                        <button class="btn btn-primary">Tambah</button>
                                    </a>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Is Admin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->is_admin }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('users.edit', $row->id) }}">
                                                            <button class="btn btn-primary">Edit</button>
                                                        </a>
                                                        &nbsp;
                                                        <form onsubmit="return confirm('are you sore?')"
                                                            action="{{ route('users.destroy', $row->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
