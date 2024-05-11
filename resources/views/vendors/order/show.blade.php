{{-- @extends('vendors.template.show') --}}


@extends('admin.template.show')
{{--@section('content')--}}
{{--@section('css')--}}
{{--    @stack('styles')--}}
{{--@stop--}}
{{--@section('title', 'Show ' . $title)--}}
{{--@section('content_header')--}}
{{--    <h1>View {{ $title }}</h1>--}}
{{--@stop--}}

{{--@section('content')--}}
@section('form_content')
    {{--    <section class="content">--}}
    {{--        <div class="container-fluid">--}}
    {{--            <div class="row">--}}
    {{--                <!-- left column -->--}}
    {{--                <div class="col">--}}
    {{--                    <!-- general form elements -->--}}
    {{--                    <div class="card">--}}
    {{--                        <div class="card-header">--}}
    {{--                            <h3 class="card-title">{{ $title }}</h3>--}}

    {{--                        </div>--}}

    {{--                        <div class="card-body">--}}
    <div class="form-group row">
        <div class="col-md-6 mb-3">
            <label>Order Id </label>
            <input type="text" class="form-control" id="input1" value="{{ $item->id }}"
                   placeholder="Name" required name="name" disabled readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label>Order Status </label>
            <input type="text" class="form-control" id="input1" value="{{ $item->status }}"
                   placeholder="Name" required name="name" disabled readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label>Order By </label>
            <input type="text" class="form-control" id="input1"
                   value="{{ $item->user ? $item->user->name : 'N/A' }}" placeholder="Name"
                   required
                   name="name" disabled readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label>Order Vehicle </label>
            <input type="text" class="form-control" id="input1"
                   value="{{ $item->vehicle ? $item->vehicle->vehicle_name : 'N/A' }}"
                   placeholder="Name" required name="name" disabled readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label>Order Time </label>
            <input type="text" class="form-control" id="input1"
                   value="{{ $item->order_time }}" placeholder="Name" required name="name"
                   disabled
                   readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label>Payment Type </label>
            <input type="text" class="form-control" id="input1"
                   value="{{ $item->payment_method }}" placeholder="Name" required name="name"
                   disabled readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label>Total Amount</label>
            <input type="text" class="form-control" id="input1"
                   value="{{ $item->total_price }}" placeholder="Name" required name="name"
                   disabled
                   readonly>
        </div>


    </div>

    {{--                        </div>--}}
    {{--                        <div class="card-footer">--}}
    {{--                            <a href="javascript:history.back();" class="btn btn-default float-right">Cancel</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <!-- /.card -->--}}
    {{--                </div>--}}
    {{--                <!--/.col (left) -->--}}
    {{--            </div>--}}
    {{--            <!-- /.row -->--}}
    {{--        </div><!-- /.container-fluid -->--}}
    {{--    </section>--}}
@endsection
{{--@endsection--}}

{{--@section('js')--}}
{{--@stack('scripts')--}}
{{--@stop--}}
@push('scripts')
@endpush
