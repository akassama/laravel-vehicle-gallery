<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        @yield('title','Car Management System')
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="<?php echo url("/"); ?>/css/cards-gallery.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <link rel="icon" href="<?php echo url("/images/favicon.ico"); ?>" type="image/icon" sizes="16x16">

</head>

<style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: center;
        margin-top: 3em;
    }

    .global-container{
        height:100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f5f5f5;
    }

    form.sign-in{
        padding-top: 10px;
        font-size: 14px;
        margin-top: 30px;
    }

    .sign-in-title{ font-weight:300; }

    .sign-in-btn{
        font-size: 14px;
        margin-top:20px;
    }


    .sign-in-form{
        width:330px;
        margin:20px;
    }

    .sign-up{
        text-align:center;
        padding:20px 0 0;
    }

    .sign-in-alert{
        margin-bottom:-30px;
        font-size: 13px;
        margin-top:20px;
    }

    /*
Spacer classer
*/
    .top-space-small { margin-top:5px; }
    .top-space { margin-top:15px; }
    .top-space-large { margin-top:30px; }
    .top-space-x-large { margin-top:50px; }

    .spacer-small { margin-top:5px; margin-bottom:5px;}
    .spacer { margin-top:15px; margin-bottom:15px;}
    .spacer-large { margin-top:30px; margin-bottom:30px;}
    .spacer-x-large { margin-top:60px; margin-bottom:60px;}
    .spacer-xl-large { margin-top:100px; margin-bottom:100px;}

    .bottom-space-small { margin-bottom:5px; }
    .bottom-space { margin-bottom:15px; }
    .bottom-space-large { margin-bottom:30px; }
    .bottom-space-x-large { margin-bottom:50px; }
</style>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary static-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo url("/"); ?>">
            <img src="<?php echo url("/images/car-logo.png"); ?>" class="img-fluid text-white" width="50" height="35"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo url("/"); ?>">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url("cars/"); ?>">List Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url("cars/create"); ?>">New Car</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url("/contact"); ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url("/login"); ?>">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mb-4">
    @yield('mainContent')
</div>

<footer class="footer">
    <div class="container-fluid bg-dark" style="min-height: 3em;">
        <p class="text-white">
            © <?php echo now()->year ;?> - All Rights Reserved.
            Developed by <a href="https://stackoverflow.com/users/5612132/laiman?tab=profile" target="_blank">Abdoulie Kassama</a>
        </p>
    </div>
</footer>

</body>
</html>
