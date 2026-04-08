@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="list-group shadow-sm">
                <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Dashboard Overview</a>
                <a href="{{ route('user.settings') }}"
                    class="list-group-item list-group-item-action active bg-dark border-dark">Profile Settings</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card border-0">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 fw-bold">Update Profile Information</h6>
                    <span class="badge bg-secondary">Student ID: {{ $user->student_id }}</span>
                </div>
                <div class="card-body p-4">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.settings.update') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted small">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}"
                                    required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label text-muted small">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Program / Course</label>
                                <select name="program" class="form-select" required>
                                    <option value="BSIT" {{ $user->program == 'BSIT' ? 'selected' : '' }}>BS Information
                                        Technology</option>
                                    <option value="BSCS" {{ $user->program == 'BSCS' ? 'selected' : '' }}>BS Computer Science
                                    </option>
                                    <option value="BSEMC" {{ $user->program == 'BSEMC' ? 'selected' : '' }}>BS Ent. &
                                        Multimedia Computing</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Year Level</label>
                                <select name="year_level" class="form-select" required>
                                    <option value="1" {{ $user->year_level == 1 ? 'selected' : '' }}>1st Year</option>
                                    <option value="2" {{ $user->year_level == 2 ? 'selected' : '' }}>2nd Year</option>
                                    <option value="3" {{ $user->year_level == 3 ? 'selected' : '' }}>3rd Year</option>
                                    <option value="4" {{ $user->year_level == 4 ? 'selected' : '' }}>4th Year</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted small">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control"
                                    value="{{ $user->date_of_birth }}" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted small">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted small">Contact Number</label>
                                <input type="text" name="contact_number" class="form-control"
                                    value="{{ $user->contact_number }}" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label text-muted small">Complete Address</label>
                                <textarea name="address" class="form-control" rows="3"
                                    required>{{ $user->address }}</textarea>
                            </div>
                            <div class="col-md-12 mt-4 pt-3 border-top">
                                <h6 class="fw-bold mb-1">Change Password</h6>
                                <p class="text-muted small mb-3">Leave these fields blank if you want to keep your current
                                    password.</p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-muted small">New Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="invalid-feedback fw-bold">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-muted small">Confirm New Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark mt-4 px-4 w-100 py-2">Save All Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection