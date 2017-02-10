@extends('admin.main')

@section('title', 'Services')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1 class="page-header">
                All Services
            </h1>
        </div>
        <div class="col-md-3">
            <a href="{{ route('service.create')}}" class="btn btn-lg btn-block btn-primary" style="margin-top:20px;">Create new</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <?php $i=0?>
            @foreach($services as $service)
                <?php $i++?>
                @if($i==1 || ($i%3)==0)
                <div class="row">
                @endif
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" style="height:450px;overflow:hidden;">
                            <img src="/upload_images/services/{{$service->image}}" >
                            <div class="caption">
                                <h3>{{$service->name}}</h3>
                                <p>{{$service->short_description}}</p>
                                <p>
                                    Old price:{{$service->old_price}}<span class="glyphicon glyphicon-usd"></span>
                                    <br>Price:{{$service->price}}<span class="glyphicon glyphicon-usd"></span>
                                </p>
                                <p><a href="{{ route('service.show', $service->id) }}" class="btn btn-primary" role="button">Show</a> <a href="{{ route('service.edit', $service->id) }}" class="btn btn-success" role="button">Edit</a></p>
                            </div>
                        </div>
                    </div>
                @if(($i%3)==0)
                </div>
                @endif
                @endforeach
        </div>
    </div>

@endsection