@extends('layouts.admin-master')

@section('content')
    <div class="container">
        <section>
            <a href="{{route('EditClient',['client_id'=>$client->id])}}">Edit </a>
            <a href="{{route('DeleteClient',['client_id'=>$client->id])}}">Delete </a>
        </section>
        <section class="post">
            <h1> Title :{{$client->title}}</h1>
            <span> Description : {{$client->description}}</span><br/>
            <span> Phone : {{$client->phone}}</span> <br/>
            <span> Status: {{$client->status}}</span> <br/>
            <span>Contract start date : {{$client->contract_start_date}}</span> <br/>
             <span>Contract end date :   {{$client->contract_end_date}}</span>

        </section>
    </div>
@endsection