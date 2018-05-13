@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/modal.css')}}" type="text/css">
@endsection
@include('includes.admin-header')
@section('content')
    <div class="container">
        @include('includes.info-box')
        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href="{{route('addService',['client' => $client])}}" class="btn">New Service</a></li>

                    </ul>
                </nav>
            </header>
            <section class="list">
                @if(count($services)==0)
                    No Services
                @else
                    @foreach($services as $service)
                        <article>
                            <div class="post-info">
                                <h3>{{$service->title}}</h3>
                                <span class="info"> {{$service->type}} | {{$service->link}}</span>
                            </div>
                            <div class="edit">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="{{route('viewService',['client' => $client,'service_id'=>$service->id])}}">View</a>
                                        </li>
                                        <li>
                                            <a href="{{route('EditService',['client' => $client,'service_id'=>$service->id])}}">Edit</a>
                                        </li>
                                        <li>
                                            <a href="{{route('doDeleteService',['client' => $client,'service_id'=>$service->id])}}"
                                               class="danger">Delete</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </article>
                    @endforeach
                @endif
            </section>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var token = "{{Session::token()}}";
    </script>
    <script type="text/javascript" src="{{asset('js/modal.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/contact_massages.js')}}"></script>
@endsection