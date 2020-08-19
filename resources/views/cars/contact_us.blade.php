@extends('layout.site_layout')

@section('title')
    Contact Us Page
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

        <div class="container-fluid mx-4">
            <form method="post" id="ContactForm">
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 col-form-label">Full name:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" name="fname"
                               placeholder="Full name..." required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">E-mail:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="E-mail address..." required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label">Phone:</label>
                    <div class="col-sm-9">
                        <input type="tel" class="form-control" id="phone" name="phone"
                               placeholder="Phone number..." required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="message" class="col-sm-3 col-form-label">Message:</label>
                    <div class="col-sm-9">
						<textarea class="form-control" id="message" name="message"
                                  rows="6" placeholder="Your message..." required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary disabled">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $("#ContactForm").validate({
            errorClass: 'is-invalid text-danger',
            successClass: 'is-valid',
            errorsWrapper: '<span class="form-text text-danger"></span>',
            errorTemplate: '<span></span>',
            trigger: 'change'
        });
    </script>
@endsection()



