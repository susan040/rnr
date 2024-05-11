@extends('admin.template.edit')

@push('styles')
@endpush

@section('form_content')
    <div class="form-group row">
        <div class="col-md-6">
            <label for="inputEmail4">Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name" value="{{ auth()->user()->name }}"
                required name="name">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Email<span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="input1" placeholder="Name" required name="email"
                value="{{ auth()->user()->email }}">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Phone Number<span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="input1" placeholder="Phone Number" required
                name="phone_number" value="{{ auth()->user()->phone_number }}">
        </div>
        <div class="col-md-6 ">
            <label for="inputState">Image<span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="profile_image" id="image" style="height:45px;">
            <div>
                <img style="width: 50px; height:40px"
                    src="{{ $item->profile_image ? asset($item->profile_image) : asset('profile_placeholder.png') }}">
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Shop Address<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Shop Address" required
                name="shop_address" value="{{ auth()->user()->shop_address }}">
        </div>
    </div>
@endsection


@push('scripts')
@endpush
