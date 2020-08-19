@extends('layout.site_layout')

@section('title')
    Login Page
@endsection

@section('mainContent')
    <h2 class="text-center text-info m-4">Contact Us</h2>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-3">
        <div class="col-6 offset-3 p-3">
            <div class="global-container">
                <div class="card sign-in">
                    <div class="card-body">
                        <h3 class="card-title sign-in-title text-center">Login</h3>
                        <div class="card-text">
                            <!--
                            <div class="alert alert-danger sign-in-alert alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                            <form class="sign-in" method="post" action="<?php echo url("/login/authenticate"); ?>" id="LoginForm">
                                <!-- to error: add class "has-danger" -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control form-control-sm" id="Email" name="Email" aria-describedby="emailHelp" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <a href="#" style="float:right;font-size:12px;">Forgot password?</a>
                                    <input type="password" class="form-control form-control-sm" id="Password" name="Password" required>
                                </div>
                                <button type="submit" class="btn btn-primary sign-in-btn btn-block">Sign in</button>

                                <div class="sign-up">
                                    Don't have an account? <a href="#">Create One</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $("#LoginForm").validate({
            errorClass: 'is-invalid text-danger',
            successClass: 'is-valid',
            errorsWrapper: '<span class="form-text text-danger"></span>',
            errorTemplate: '<span></span>',
            trigger: 'change'
        });
    </script>
@endsection()



