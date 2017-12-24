@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Enter your verification code</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('verification.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-3 control-label">Mobile No.</label>

                            <div class="col-md-7">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required autofocus placeholder="Enter your mobile no.">

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-3 control-label">Enter Code</label>

                            <div class="col-md-7">
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus placeholder="Enter your verification Code">

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Verify Code
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop