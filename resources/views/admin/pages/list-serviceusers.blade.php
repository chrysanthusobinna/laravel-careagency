@extends('admin.layouts.app')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Service Users</h4>
                            <a href="{{ route('admin.service-users.create') }}" class="btn btn btn-outline-secondary">Add New Service User</a>
                        </div>
                        <div class="card-body">
                            @include('partials._dashboard_message')

                            <div class="table-responsive">
                                @if($serviceUsers->isEmpty())

                                    <div class="alert txt-primary border-warning alert-dismissible fade show" role="alert"><i data-feather="clock"></i>
                                        <p class="text-danger"> No service users found.</p>
                                      </div>
                                @else
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>Country</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($serviceUsers as $index => $user)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $user->first_name }}</td>
                                                    <td>{{ $user->last_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->phone_number }}</td>
                                                    <td>{{ $user->address }}</td>
                                                    <td>{{ $user->city }}</td>
                                                    <td>{{ $user->country }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
