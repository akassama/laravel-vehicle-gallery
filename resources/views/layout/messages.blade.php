
<div class="row">
@if ($message = Session::get('success_message'))
    <div class="alert alert-success col-12">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('error_message'))
    <div class="alert alert-danger col-12">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('warning_message'))
    <div class="alert alert-warning col-12">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('info_message'))
    <div class="alert alert-info col-12">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($errors->any())
{{--    <div class="alert alert-danger col-12">--}}
{{--        <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--        Please check the form below for errors--}}
{{--    </div>--}}
@endif
</div>
