@extends('main')

@section('title', 'Cart')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1 class="page-header">
                <span class="glyphicon glyphicon-shopping-cart"></span> Cart
            </h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Image</td>
                    <td>Service</td>
                    <td>Price</td>
                    <td> </td>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $cart_item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="/upload_images/services/{{ $cart_item->service->image }}" style="width:250px;"></td>
                        <td><h3>{{$cart_item->service->name}}</h3></td>
                        <td><strong>{{$cart_item->service->price}}</strong> <span class="glyphicon glyphicon-usd"></td>
                        <td>
                        {{ Form::open(['route' => ['cart.destroy', $cart_item->id], 'method' =>'DELETE']) }}
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

@section('javascript')
    <script>

    </script>
@endsection