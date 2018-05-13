@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/form.css')}}" type="text/css">
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <form action="{{route('doEditService',['client' => $client])}}" method="post">
            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                       {{$errors->has('title') ? 'class=has-error' : ''}} value="{{Request::old('title')? Request::old('title') : isset($service) ? $service->title : ''}}">
            </div>
            <div class="input-group">
                <label for="type">Type</label>
                <input type="text" name="type" id="type"
                       {{$errors->has('type') ? 'class=has-error' : ''}} value="{{Request::old('type')? Request::old('type') : isset($service) ? $service->type : ''}} ">
            </div>
            <div class="input-group">
                <label for="link">link</label>
                <input type="text" name="link" id="link"
                       {{$errors->has('link') ? 'class=has-error' : ''}} value="{{Request::old('link')? Request::old('link') : isset($service) ? $service->link : ''}}">
            </div>
            <div class="input-group">
                <label for="description">description</label>
                <input type="text" name="description" id="description"
                       {{$errors->has('description') ? 'class=has-error' : ''}}value="{{Request::old('description')? Request::old('description') : isset($service) ? $service->description : ''}}">
            </div>

            <button type="submit" class="btn">Edit</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <input type="hidden" name="service_id" value="{{$service->id}}">

        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('is/post.js')}}"></script>
@endsection