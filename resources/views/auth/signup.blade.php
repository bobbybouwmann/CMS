@extends('defaults.layout')

@section('title')
    Sign up
@stop

@section('content')
    <h2 class="text-center">Sign up</h2>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
            <form action="{{ route('auth.signup') }}" method="post" role="form">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <input type="text" class="form-control" id="student_id" name="student_id">
                    @if ($errors->has('student_id'))
                        <span class="help-block">{{ $errors->first('student_id') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password2">Password Confirm</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                    @if ($errors->has('password2'))
                        <span class="help-block">{{ $errors->first('password2') }}</span>
                    @endif
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up</button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@stop
