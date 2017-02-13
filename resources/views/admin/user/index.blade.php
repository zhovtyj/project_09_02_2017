@extends('admin.main')

@section('title', 'Clients')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1 class="page-header">
                <span class="glyphicon glyphicon-user"></span> All Clients
            </h1>
        </div>
        <div class="col-md-3">
            <a href="{{ route('client.create')}}" class="btn btn-lg btn-block btn-primary" style="margin-top:20px;"><span class="glyphicon glyphicon-pencil"> </span> Add new client</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Company</td>
                    <td>Phone</td>
                    <td>Country</td>
                    <td>Address</td>
                    <td>City</td>
                    <td>State</td>
                    <td>Postcode</td>
                    <td>Registered</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->company}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->country}}</td>
                        <td>{{$user->address1}} {{$user->address2}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->state}}</td>
                        <td>{{$user->postcode}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <a class="btn btn-block btn-primary" href="{{route('client.edit', $user->id)}}">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            {{ Form::open(['route' => ['client.destroy', $user->id], 'method' =>'DELETE']) }}
                                <button class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> </button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection