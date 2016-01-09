@extends('defaults.layout')

@section('title')
    Sign up
@stop

@section('content')
    <h2 class="text-center">Sign in</h2>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
            <form action="{{ route('auth.signin') }}" method="post" role="form">
                <div class="form-group">
                    <label for="login">Student ID or Email</label>
                    <input type="text" class="form-control" id="login" name="login">
                    @if ($errors->has('login'))
                        <span class="help-block">{{ $errors->first('login') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-block btn-lg btn-primary">Sign in</button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@stop
