@extends('admin.dashboard.layouts.login_master')
@section('content')
       <style>
            .error {
            color: red;
        }

    </style>
    <div class="login-box">
        <div class="login-logo">
            <a href="index2.html"><b>Admin</b>Login</a>
        </div>

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                {{ Form::open(['route' => 'admin.login', 'method' => 'post', 'id' => 'login_form', 'files' => true]) }}
                <div class="col-md">
                    {{ Form::label('Username') }}
                    {{ Form::text('email', null, ['placeholder' => 'Enter Username', 'class' => 'form-control', 'id' => 'email']) }}
                    @error('email')
                        <span class="text-danger" id="emailError">{{ $message }}</span>
                    @enderror
                    </br>
                </div>
                <div class="col-md">
                    {{ Form::label('Password') }}
                    {{ Form::password('password', ['placeholder' => 'Enter Password','class' => 'form-control','id' => 'password']) }}
                    @error('password')
                        <span class="text-danger" id="passwordError">{{ $message }}</span>
                    @enderror
                    </br>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div>
                            {{ Form::submit('Sign In', ['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary btn-block']) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    @endsection
    @push('scripts')
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#login_form").validate({
                    ignore: [],
                    rules: {
                        email: {
                            required: true,
                        },
                        password: {
                            required: true,
                        },
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass("is-invalid").removeClass("is-valid");
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).addClass("is-valid").removeClass("is-invalid");
                    },
                    submitHandler: function(form, event) {
                        event.preventDefault();
                        $(document).find('.text-danger').remove();
                        var formdata = new FormData(form);
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "post",
                            url: "{{ route('admin.login') }}",
                            data: formdata,
                            dataType: 'JSON',
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                window.location = "/admin/dashboard";
                            },
                            error: function(error) {
                                $.each(error.responseJSON.errors, function(key, value) {
                                    $('#' + key).after(
                                        '<span class="invalid-feedback">' +
                                        value +
                                        '</span>')
                                });
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
