@extends('master.index')
<style type="text/css">
</style>
@section('content')
<div class="container">
    <div class="row">
        <br>
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="background-color: #17A827; color: #ffffff;"><h3>Login</h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-6 col-md-offset-3">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-6 col-md-offset-3">
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn" style="background-color: #17A827; color: #ffffff;">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('register') }}" style="color: #17A827;">
                                    or Register
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer" style="background-color:  #17A827;"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('pageScript')
<script type="text/javascript">
    $(document).ready(function() {
        $('.mpsi-loading-page').css('display', 'none');
        $('.mpsi-page').css('display', 'block');
        $('.mpsi-page').addClass('mpsi-page-animation');
    });
</script>
@endpush
