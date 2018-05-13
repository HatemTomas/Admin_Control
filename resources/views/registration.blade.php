@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/form.css')}}" type="text/css">
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <form action="{{route('register')}}" method="post">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" {{$errors->has('name') ? 'class=has-error' : ''}} value="{{Request::old('name')}}" >
            </div>
            <div class="input-group">
                <label for="email">email</label>
                <input type="text" name="email" id="email" {{$errors->has('email') ? 'class=has-error' : ''}}value="{{Request::old('email')}}">
            </div>
            <div class="input-group">
                <label for="password">password</label>
                <input type="password" name="password" id="password" {{$errors->has('password') ? 'class=has-error' : ''}}>
            </div>
            <button type="submit" class="btn">Sign Up</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('is/post.js')}}" ></script>
@endsection