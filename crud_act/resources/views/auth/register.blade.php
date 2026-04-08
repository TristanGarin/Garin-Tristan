@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card p-4">
                <h3 class="text-center mb-4 text-dark fw-bold">Student Registration</h3>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <p class="mb-0 fw-bold">Please fix the errors below:</p>
                    </div>
                @endif

                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label text-muted small">Student ID Number</label>
                            <input type="text" name="student_id"
                                class="form-control @error('student_id') is-invalid @enderror"
                                value="{{ old('student_id') }}" placeholder="e.g. 20-12345">
                            @error('student_id')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted small">Email Address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="student@example.com">
                            @error('email')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted small">First Name</label>
                            <input type="text" name="first_name"
                                class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name') }}">
                            @error('first_name')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted small">Last Name</label>
                            <input type="text" name="last_name"
                                class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name') }}">
                            @error('last_name')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted small">Program / Course</label>
                            <select name="program" class="form-select @error('program') is-invalid @enderror">
                                <option value="">Select Program...</option>
                                <option value="BSIT" {{ old('program') == 'BSIT' ? 'selected' : '' }}>BS Information
                                    Technology</option>
                                <option value="BSCS" {{ old('program') == 'BSCS' ? 'selected' : '' }}>BS Computer Science
                                </option>
                                <option value="BSEMC" {{ old('program') == 'BSEMC' ? 'selected' : '' }}>BS Ent. & Multimedia
                                    Computing</option>
                            </select>
                            @error('program')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted small">Year Level</label>
                            <select name="year_level" class="form-select @error('year_level') is-invalid @enderror">
                                <option value="">Select Year...</option>
                                <option value="1" {{ old('year_level') == '1' ? 'selected' : '' }}>1st Year</option>
                                <option value="2" {{ old('year_level') == '2' ? 'selected' : '' }}>2nd Year</option>
                                <option value="3" {{ old('year_level') == '3' ? 'selected' : '' }}>3rd Year</option>
                                <option value="4" {{ old('year_level') == '4' ? 'selected' : '' }}>4th Year</option>
                            </select>
                            @error('year_level')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted small">Date of Birth</label>
                            <input type="date" name="date_of_birth"
                                class="form-control @error('date_of_birth') is-invalid @enderror"
                                value="{{ old('date_of_birth') }}">
                            @error('date_of_birth')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted small">Gender</label>
                            <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                <option value="">Select...</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted small">Contact Number</label>
                            <input type="text" name="contact_number"
                                class="form-control @error('contact_number') is-invalid @enderror"
                                value="{{ old('contact_number') }}">
                            @error('contact_number')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label text-muted small">Complete Address</label>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror"
                                rows="2">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted small">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback fw-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted small">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 mt-4 py-2">Create Account</button>
                </form>

                <div class="mt-3 text-center">
                    <a href="{{ route('login') }}" class="text-decoration-none text-muted">Already have an account? </a>
                    <a href="{{ route('login') }}" class="text-decoration-none" style="color:blue">Login
                        here.</a>
                </div>
            </div>
        </div>
    </div>
@endsection