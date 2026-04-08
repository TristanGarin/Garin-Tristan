@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="list-group shadow-sm">
            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action active bg-dark border-dark">Dashboard Overview</a>
            <a href="{{ route('user.settings') }}" class="list-group-item list-group-item-action">Profile Settings</a>
            <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                @csrf
                <button type="submit" class="list-group-item list-group-item-action text-danger fw-bold w-100 text-start">Logout</button>
            </form>
        </div>
    </div>
    
    <div class="col-md-9">
        <div class="card mb-4 bg-white border-0">
            <div class="card-body p-4">
                <h4 class="fw-bold">Welcome, {{ $user->first_name }} {{ $user->last_name }}!</h4>
                <p class="text-muted mb-0">Student ID: <strong>{{ $user->student_id }}</strong> | Program: <strong>{{ $user->program }} - Year {{ $user->year_level }}</strong></p>
            </div>
        </div>

        <div class="card border-0">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold">Recent Account Activity</h6>
            </div>
            <ul class="list-group list-group-flush">
                @forelse($logs as $log)
                    <li class="list-group-item d-flex justify-content-between align-items-start py-3">
                        <div>
                            <span class="badge bg-secondary mb-1">{{ $log->action }}</span>
                            <p class="mb-0 text-dark small">{{ $log->description }}</p>
                        </div>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($log->created_at)->format('M d, g:i A') }}</small>
                    </li>
                @empty
                    <li class="list-group-item text-muted">No recent activity.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection