@extends('admin.layouts.app')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <form class="card" method="POST" action="{{ route('admin.service-users.store') }}">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title mb-0">Create Service User</h4>
                        </div>
                        <div class="card-body">
                            @include('partials._dashboard_message')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input class="form-control" type="text" name="first_name" value="{{ old('first_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Middle Name</label>
                                        <input class="form-control" type="text" name="middle_name" value="{{ old('middle_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input class="form-control" type="text" name="phone_number" value="{{ old('phone_number') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input class="form-control" type="text" name="address" value="{{ old('address') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input class="form-control" type="text" name="city" value="{{ old('city') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Post Code</label>
                                        <input class="form-control" type="text" name="post_code" value="{{ old('post_code') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">County</label>
                                        <input class="form-control" type="text" name="county" value="{{ old('county') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <select class="form-control btn-square" name="country" required>
                                            @include('partials._select_country')
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control" type="password" name="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input class="form-control" type="password" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Create Service User</button>
                        </div>
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
