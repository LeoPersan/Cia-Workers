@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h2 class="card-title">{{ Auth::user()->name }}, Bem vindo ao CIAS&WORKERS</h2>
            </div>
        </div>
    </div>
</div>
@endsection
