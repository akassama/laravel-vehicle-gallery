@extends('layout.site_layout')

@section('title')
    Home- Car Management System
@endsection

@section('mainContent')

    <section class="gallery-block cards-gallery">
        <div class="container">
            <div class="heading">
                <h2>Latest Vehicles</h2>
            </div>
            <?php
            if(count($cars) > 0){
                ?>
                <div class="row">
                    @foreach($cars as $car)
                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 transform-on-hover">
                                <?php
                                if(!is_null($car["image"])){
                                ?>
                                <a class="lightbox" href="<?php echo url("/images/cars/")."/".$car->image; ?>">
                                    <img src="<?php echo url("/images/cars/")."/".$car->image; ?>" alt="Card Image" class="card-img-top" width="320" height="200">
                                </a>
                                <?php
                                }
                                else{
                                ?>
                                <a class="lightbox" href="<?php echo url("/images/cars/vehicle-placeholder.png"); ?>">
                                    <img src="<?php echo url("/images/cars/vehicle-placeholder.png"); ?>" alt="Card Image" class="card-img-top" width="320" height="200">
                                </a>
                                <?php
                                }
                                ?>
                                <div class="card-body">
                                    <h6><a href="#">{{getSummaryText($car->name, 25)}} - {{$car->company}}</a></h6>
                                    <p class="text-muted card-text">{{getSummaryText($car->description, 150)}}.</p>
                                    <br/>
                                    <span class="text-danger float-left">
                                        GMD {{$car->price}}
                                    </span>
                                    <a href="cars/{{$car->id}}" class="btn btn-secondary text-white float-right" role="button">Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            <?php
            }
            else{
                ?>
                    <div class="alert alert-danger">
                        <strong>No record in database.</strong> .
                    </div>
            <?php
            }
            ?>

        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>

    <script>
        baguetteBox.run('.cards-gallery', { animation: 'slideIn'});
    </script>

@endsection()
