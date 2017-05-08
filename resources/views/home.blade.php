@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h2>Welcome to {{ config('app.name', 'Laravel') }}</h2>
                    <p>
                        Visit your <a href="{{ route('posts', Auth::user()) }}">Profile</a>
                        <small>or</small>
                        Setup your account on the <a href="{{ route('dashboard') }}">dashboard</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
