@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/form.css')}}" type="text/css">
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <form action="{{route('AddClient')}}" method="post">
            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                       {{$errors->has('title') ? 'class=has-error' : ''}} value="{{Request::old('title')}}">
            </div>
            <div class="input-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description"
                       {{$errors->has('description') ? 'class=has-error' : ''}} value="{{Request::old('description')}}">
            </div>
            <div class="input-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status"
                       {{$errors->has('status') ? 'class=has-error' : ''}} value="{{Request::old('status')}}">
            </div>
            <div class="input-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone"
                       {{$errors->has('phone') ? 'class=has-error' : ''}} value="{{Request::old('phone')}}">
            </div>
            <div class="input-group">
                <label for="contract_start_date">Contract Start Date</label>
                <input type="date" name="contract_start_date" id="contract_start_date"
                       {{$errors->has('contract_start_date') ? 'class=has-error' : ''}} value="{{Request::old('contract_start_date')}}">
            </div>
            <div class="input-group">
                <label for="contract_end_date">Contract End Date</label>
                <input type="date" name="contract_end_date" id="contract_end_date"
                       {{$errors->has('contract_end_date') ? 'class=has-error' : ''}}value="{{Request::old('contract_end_date')}}">
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label>facebook</label>
                    <input type="checkbox" name="service[]" value="facebook">
                </div>
                <div class="input-group">
                    <label>twitter</label>
                    <input type="checkbox" name="service[]" value="twitter">
                </div>
                <div class="input-group">
                    <label>instagram</label>
                    <input type="checkbox" name="service[]" value="instagram">
                </div>
                <div class="input-group">
                    <label>youtube</label>
                    <input type="checkbox" name="service[]" value="youtube">
                </div>
            </div>


            <button type="submit" class="btn">Add</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('is/post.js')}}"></script>
@endsection