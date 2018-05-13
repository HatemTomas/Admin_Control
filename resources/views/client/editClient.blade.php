@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/form.css')}}" type="text/css">
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <form action="{{route('doEditClient')}}" method="post">
            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" {{$errors->has('title') ? 'class=has-error' : ''}} value="{{Request::old('title')? Request::old('title') : isset($client) ? $client->title : ''}}" >
            </div>
            <div class="input-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" {{$errors->has('description') ? 'class=has-error' : ''}} value="{{Request::old('description')? Request::old('description') : isset($client) ? $client->description : ''}}" >
            </div>
            <div class="input-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" {{$errors->has('status') ? 'class=has-error' : ''}} value="{{Request::old('status')? Request::old('status') : isset($client) ? $client->status : ''}}" >
            </div>
            <div class="input-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" {{$errors->has('phone') ? 'class=has-error' : ''}} value="{{Request::old('phone')? Request::old('phone') : isset($client) ? $client->phone : ''}}" >
            </div>
            <div class="input-group">
                <label for="contract_start_date">Contract Start Date</label>
                <input type="date" name="contract_start_date" id="contract_start_date" {{$errors->has('contract_start_date') ? 'class=has-error' : ''}} value="{{Request::old('contract_start_date')? Request::old('contract_start_date') : isset($client) ? $client->contract_start_date : ''}}" >
            </div>
            <div class="input-group">
                <label for="contract_end_date">Contract End Date</label>
                <input type="date" name="contract_end_date" id="contract_end_date" {{$errors->has('contract_end_date') ? 'class=has-error' : ''}}value="{{Request::old('contract_end_date')? Request::old('contract_end_date') : isset($client) ? $client->contract_end_date : ''}}">
            </div>

            <button type="submit" class="btn">Edit</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <input type="hidden" name="client_id" value="{{$client->id}}">
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('is/post.js')}}" ></script>
@endsection