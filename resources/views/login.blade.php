@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/form.css')}}" type="text/css">
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <form action="{{route('UserLogin')}}" method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" {{$errors->has('email') ? 'class=has-error' : ''}} value="{{Request::old('email')}}">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"  {{$errors->has('password') ? 'class=has-error' : ''}}>
            </div>

            <div>
                {!! csrf_field() !!}
                <button type="submit" class="btn">Log In</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </div>

        </form>
        <br/>
        <form method="get" action="{{route('registerPage')}}">
            <div>
                <button type="submit" class="btn">Register</button>
            </div>
        </form>
    </div>
@endsection