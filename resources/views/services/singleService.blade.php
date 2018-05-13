@extends('layouts.admin-master')

@section('content')
    <div class="container">
        <section>
            <a href="{{route('EditService',['client' => $client,'service_id'=>$service->id])}}">Edit </a>
            <a href="{{route('doDeleteService',['client' => $client,'service_id'=>$service->id])}}">Delete </a>
        </section>
        <section class="post">
            <h1> Title :{{$service->title}}</h1>
            <span> Type : {{$service->type}}</span><br/>
            <span> User Id : {{$service->user_id}}</span> <br/>
            <span> Link: {{$service->link}}</span> <br/>
            <span> Description: {{$service->description}}</span>
        </section>
    </div>
@endsection