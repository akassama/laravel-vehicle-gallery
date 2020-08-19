<script>
    function showModal(car_id, car_name) {
        $('#CarToDeleteId').val(car_id);
        $('#CarToDelete').text(car_name);
        $('#DeleteForm').attr('action', '<?php echo url("/cars"); ?>/'+car_id);
        $('#deleteModal').modal('show');
    }
</script>

@extends('layout.site_layout')

@section('title')
    Cars list
@endsection


@section('mainContent')
    <h2 class="text-center text-info m-4">List Cars </h2>

    @include('layout.messages')

    <?php
        if(count($cars) > 0){
            ?>
                <table class="table table-bordered table-hover mb-4">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Company</th>
                        <th class="text-center" colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cars as $car)
                        <tr>
                            <td>{{$car->name}}</td>
                            <td>{{$car->color}}</td>
                            <td>{{$car->company}}</td>
                            <td>
                                <a href="cars/{{$car->id}}" class="btn btn-info" role="button"><i class="fa fa-info-circle"></i> Details</a>
                            </td>
                            <td>
                                <a href="cars/{{$car->id}}/edit" class="btn btn-success" role="button"><i class="fa fa-pencil"></i> Edit</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger" onclick="showModal('{{$car->id}}', '{{$car->name}}')" role="button"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <?php
        }
        else{
            ?>
                <div class="alert alert-danger">
                    <strong>No record in database.</strong> Create  <a href="<?php echo url("cars/create"); ?>" class="alert-link">here</a>.
                </div>
            <?php
        }
    ?>

@endsection()


<!-- The Modal -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Delete Car</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form class="form-inline"  id="DeleteForm" method="post" action="">
                    @csrf
                    @method('delete')

                    <!-- Modal body -->
                    <div class="modal-body">

                        <p> Are you sure you want to delete <span id="CarToDelete"></span></p>
                            <div class="row">
                                <div class="col-2 offset-8">
                                    <a href="#" type="button" data-dismiss="modal" class="btn btn-info"> <i class="fa fa-times"></i> Cancel</a>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="CarToDeleteId" id="CarToDeleteId" value="" >

                    </div>

                </form>

                <!-- Modal footer -->
                <div class="modal-footer">

                </div>
        </div>
    </div>
</div>
