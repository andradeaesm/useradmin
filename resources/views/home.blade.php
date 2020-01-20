@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <a href="\user" class="btn btn-primary">Página User</a>
                    <a href="\admin" class="btn btn-primary">Página Admin</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
