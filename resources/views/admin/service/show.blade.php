@extends('admin.main')

@section('title', $service->name)

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1 class="page-header">
                {{ $service->name }}
            </h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Image:</h2>
                    <p><img src="/upload_images/services/{{ $service->image }}" style="width:100%;"></p>
                    <h2>Price:</h2>
                    <p>{{ $service->price }}</p>
                    <h2>Old price:</h2>
                    <p>{{ $service->old_price }}</p>
                    <h2>Short description:</h2>
                    <p>{{ $service->short_description }}</p>
                    <h2>Description:</h2>
                    <p>{!! $service->description !!}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-th-large"> </span> Service Info
                </div>
                <div class="panel-body">
                    <h5><span class="glyphicon glyphicon-pencil"> </span> <strong>Created at:</strong></h5>
                    <div>{!! $service->created_at !!}</div>
                    <hr>
                    <h5><span class="glyphicon glyphicon-edit"> </span> <strong>Updated at:</strong></h5>
                    <div>{!! $service->updated_at !!}</div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('service.edit', $service->id) }}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        </div>
                        <div class="col-md-6">
                            {{ Form::open(['route' => ['service.destroy', $service->id], 'method' =>'DELETE']) }}

                            <button type="submit" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-trash"> </span> Delete</button>

                            {{ Form::close() }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-md-offset">
                            <a href="{{ route('service.index') }}" class="btn btn-default btn-block"><span class="glyphicon glyphicon-arrow-left"></span> Back to all services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection