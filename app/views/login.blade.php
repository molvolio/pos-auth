@extends('app')

@section('content')
    @if(!Auth::Check())
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Bejelentkezés</div>
                    <div class="panel-body">
                        <div class="form-horizontal" style="line-height: 1.6;">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">email-cím</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">jelszó</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div> -->
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button id="login" type="submit" class="btn btn-primary">
                                        bejelentkezés
                                    </button>

                                    <!-- <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@stop

@section("script")

$(function() {

    $("#login").click(function () {

        if(!validateEmail($("#email").val())) {
            alert("érvénytelen-email-cím");
            $("#email").focus();
        }

        else if ($("#password").val().length < 6) {
            alert("túl rövid jelszó");
            $("#password").focus();
        }

        else {
            $(".dt-spinner").css("display", "block");
            $("#maincontent").addClass("dim");
            $.ajax({
                url: "{{ URL::to('login'); }}",
                type: "post",
                data: {"email": $("#email").val(), "pw": $("#password").val()},
                success: function (data) {
                    $(".dt-spinner").css("display", "none");
                    $("#maincontent").removeClass("dim");
                    if (data) {
                        $("#maincontent").html(data[0]);
                        $("ul#loggedin").html(data[1]);
                    } else alert ("Sikertelen bejelentkezés");
                }
            });
        }
    });
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

@stop