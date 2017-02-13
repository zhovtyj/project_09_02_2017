@extends('admin.main')

@section('title', 'Create new Client')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1 class="page-header">
                <span class="glyphicon glyphicon-user"></span> Create new Client
            </h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('client.store') }}">
                    {{ csrf_field() }}


                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="first_name" class="col-md-4 control-label">First Name *</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label for="last_name" class="col-md-4 control-label">Last Name *</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                        <label for="company" class="col-md-4 control-label">Company Name</label>

                        <div class="col-md-6">
                            <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}" autofocus >

                            @if ($errors->has('company'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">Phone</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" autofocus>

                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                        <label for="country" class="col-md-4 control-label">Country *</label>

                        <div class="col-md-6">
                            <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" autofocus required>

                            @if ($errors->has('country'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                        <label for="address1" class="col-md-4 control-label">Address *</label>

                        <div class="col-md-6">
                            <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1') }}" autofocus required>
                            <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') }}" autofocus>

                            @if ($errors->has('address1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <label for="city" class="col-md-4 control-label">Town / City *</label>

                        <div class="col-md-6">
                            <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" autofocus required>

                            @if ($errors->has('city'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label for="state" class="col-md-4 control-label">State / County </label>

                        <div class="col-md-6">
                            <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}" autofocus>

                            @if ($errors->has('state'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                        <label for="postcode" class="col-md-4 control-label">Postcode / ZIP *</label>

                        <div class="col-md-6">
                            <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old('postcode') }}" autofocus required>

                            @if ($errors->has('postcode'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection