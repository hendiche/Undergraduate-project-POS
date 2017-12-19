@extends('master.index')
<style type="text/css">
    #login {
        margin: 50px 0;
    }

    #login:after {
        content: ' ';
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        opacity: 0.85;
        background-image: url('{{ asset('images/Login.jpg')  }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
    }

    #login .panel.panel-default {
        border: 0;
    }
</style>
@section('content')
<div id="login">
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

                                <div class="col-md-8 col-md-offset-2">
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="col-md-8 col-md-offset-2">
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
                    <div class="panel-footer" style="background-color:  #17A827;"><br /></div>
                </div>
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
