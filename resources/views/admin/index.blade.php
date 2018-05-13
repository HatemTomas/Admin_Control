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
                        <li><a href="{{route('addClientPage')}}" class="btn">New Client</a></li>

                    </ul>
                </nav>
            </header>
            <section class="list">
                @if(count($clients)==0)
                    No Clients
                @else
                    @foreach($clients as $client)
                        <article>
                            <div class="post-info">
                                <h3>{{$client->title}}</h3>
                                <span class="info"> {{$client->description}} | {{$client->phone}}</span>
                            </div>
                            <div class="edit">
                                <nav>
                                    <ul>
                                        <li><a href="{{route('viewClient',['client_id'=>$client->id])}}">View Client</a></li>
                                        <li><a href="{{route('EditClient',['client_id'=>$client->id])}}">Edit</a></li>
                                        <li><a href="{{route('DeleteClient',['client_id'=>$client->id])}}" class="danger">Delete</a></li>
                                        <li><a href="{{route('ServicesPage',['client'=>$client->id])}}">Manage Services</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </article>
                    @endforeach
                @endif
            </section>
        </div>

    </div>

    <div class="modal" id="contact-massage-info">
        <button class="btn" id="modal-close">Close</button>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var token ="{{Session::token()}}";
    </script>
    <script type="text/javascript" src="{{asset('js/modal.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/contact_massages.js')}}"></script>
@endsection