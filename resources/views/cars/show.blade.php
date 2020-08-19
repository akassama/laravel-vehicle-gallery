@extends('layout.site_layout')

@section('title')
    Car Details
@endsection

@section('mainContent')

    <h2 class="text-center text-dark m-4">{{$car->name}} </h2>
    <ul class="list-group">
        <li class="list-group-item">
            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <?php
                        if(!is_null($car["image"])){
                        ?>
                            <img src="<?php echo url("/images/cars/")."/".$car->image; ?>" alt="<?php echo $car->name; ?>" width="1100" height="500">
                        <?php
                        }
                        else{
                        ?>
                        <img src="<?php echo url("/images/cars/vehicle-placeholder.png"); ?>" alt="<?php echo $car->name; ?>" width="1100" height="500">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="carousel-item">
                        <?php
                        if(!is_null($car["image2"])){
                        ?>
                        <img src="<?php echo url("/images/cars/")."/".$car->image2; ?>" alt="<?php echo $car->name; ?>" width="1100" height="500">
                        <?php
                        }
                        else{
                        ?>
                        <img src="<?php echo url("/images/cars/vehicle-placeholder.png"); ?>" alt="<?php echo $car->name; ?>" width="1100" height="500">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="carousel-item">
                        <?php
                        if(!is_null($car["image3"])){
                        ?>
                        <img src="<?php echo url("/images/cars/")."/".$car->image3; ?>" alt="<?php echo $car->name; ?>" width="1100" height="500">
                        <?php
                        }
                        else{
                        ?>
                        <img src="<?php echo url("/images/cars/vehicle-placeholder.png"); ?>" alt="<?php echo $car->name; ?>" width="1100" height="500">
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </li>
        <li class="list-group-item font-weight-bold">{{$car->name}}</li>
        <li class="list-group-item">Description: {{$car->description}}</li>
        <li class="list-group-item">Price: {{$car->price}}</li>
        <li class="list-group-item">Color: {{$car->name}}</li>
        <li class="list-group-item">Company: {{$car->name}}</li>
        <li class="list-group-item">Contact: (220) xx-xx-xxx</li>
    </ul>
    <div class="row m-4">
        <div class="col-2">
            <a href="<?php echo url("/cars"); ?>" class="btn btn-danger" role="button"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="spacer-xl-large"></div>

@endsection()
