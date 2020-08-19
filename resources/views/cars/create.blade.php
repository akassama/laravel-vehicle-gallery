@extends('layout.site_layout')

<script type="text/javascript" language="javascript">
    //Allow only numbers for the inputs fields
    $(function () {
        $('#NewCarForm').on('keydown', '#Price', function (e) { -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/.test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault() });
    })


    //character counter
    function countCharFieldName(val) {
        var max = 250;
        var len = $("#Description").val().length;
        if (len >= max) {
            val.value = val.value.substring(0, max);
        } else {
            $('#charNumFieldName').text((max - len) + " Remaining");
        }
    };
</script>
@section('title')
    Create New Car
@endsection

@section('mainContent')
    <h2 class="text-center text-info m-4">Add New Car </h2>

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

    <form class="form-inline" id="NewCarForm"  method="post" action="<?php echo url("/cars"); ?>" enctype="multipart/form-data">
        @include('layout.messages')

        @csrf
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <label for="Name" class="mb-2 mr-sm-2 col-2">Name:</label>
                    <input type="text" class="form-control mb-2 mr-sm-2 col-7" placeholder="Enter Name" name="Name" id="Name" required>
                </div>
            </div>

            <div class="col-12 mb-2">
                <div class="row">
                    <label for="Name" class="mb-2 mr-sm-2 col-2">Description:</label>
                    <textarea class="form-control mb-2 mr-sm-2 col-7" placeholder="Enter Description" maxlength="250" onkeyup = "countCharFieldName(this)" name="Description" id="Description" required></textarea>
                </div>
                <div class="row">
                    <span class="text-danger col-7 offset-2">Max length 250 characters</span>
                </div>
                <div class="row">
                    <div id="charNumFieldName" class="text-warning col-7 offset-2" style="font-weight:bold"></div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <label for="Name" class="mb-2 mr-sm-2 col-2">Price:</label>
                    <input type="text" class="form-control mb-2 mr-sm-2 col-7" placeholder="Enter Price" name="Price" id="Price" required>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <label for="Color" class="mb-2 mr-sm-2 col-2">Colors:</label>
                    <input type="text" class="form-control mb-2 mr-sm-2 col-7" placeholder="Enter Color" name="Color" id="Color" required>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <label for="Company" class="mb-2 mr-sm-2 col-2">Company:</label>
                    <input type="text" class="form-control mb-2 mr-sm-2 col-7" placeholder="Enter Company" name="Company" id="Company" required>
                </div>
            </div>

            <div class="col-12 mb-1">
                <div class="row">
                    <div class="col-2 col-2">
                        <label for="Company" class="mb-2 mr-sm-2">Images:</label>
                    </div>
                    <div class="col-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="Image" id="Image" required>
                            <label class="form-control mb-2 mr-sm-2 custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-1">
                <div class="row">
                    <div class="col-7 offset-2">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="Image2" id="Image2" required>
                            <label class="form-control mb-2 mr-sm-2 custom-file-label" for="customFile">Choose second file</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-1">
                <div class="row">
                    <div class="col-7 offset-2">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="Image3" id="Image3" required>
                            <label class="form-control mb-2 mr-sm-2 custom-file-label" for="customFile">Choose third file</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-7 offset-2">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="Image4" id="Image4" required>
                            <label class="form-control mb-2 mr-sm-2 custom-file-label" for="customFile">Choose fourth file</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4">
                <div class="row">
                    <div class="col-2 offset-2">
                        <a href="<?php echo url("/cars"); ?>" class="btn btn-danger" role="button"><i class="fa fa-times"></i> Cancel</a>
                    </div>
                    <div class="col-2 offset-3">
                        <button type="submit" class="btn btn-primary mb-2 offset-2"><i class="fa fa-paper-plane"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        $("#NewCarForm").validate({
            errorClass: 'is-invalid text-danger',
            successClass: 'is-valid',
            errorsWrapper: '<span class="form-text text-danger"></span>',
            errorTemplate: '<span></span>',
            trigger: 'change'
        });

        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection()



