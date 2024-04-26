@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">
            {{__('messages.welcome') }}
            
        </h1>
    </div>
@include('Home.partials.register-stats')
@endsection
