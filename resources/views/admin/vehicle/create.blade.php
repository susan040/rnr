@extends('admin.template.create')

@push('styles')
@endpush

@section('form_content')
    <div class="form-group row">
        <div class="col-md-6">
            <label for="inputEmail4">Vehicle Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name" required name="vehicle_name">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Brand Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name" required name="brand">
        </div>

        <div class="col-md-6 my-2">
            <label for="inputState">Category <span class="text-danger">*</span></label>
            <select id="inputState" class="form-control" required name="category_id">
                <option value="">Select Type</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach


            </select>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Color<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name" required name="color">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Mileage<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name" required name="mileage">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Vehicle number<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name" required name="vehicle_number">
        </div>
        <div class="col-md-6 ">
            <label for="inputState">Image<span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="image" id="image" style="width:540px; height:45px;"
                required>
        </div>
        <div class="col-md-6 my-2">
            <label for="inputState">Transmission Type<span class="text-danger">*</span></label>
            <select id="inputState" class="form-control" required name="transmission_type">
                <option value="">Select Type</option>
                <option value="manual">Manual</option>
                <option value="automatic">Automatic</option>
            </select>
        </div>



        <div class="col-md-6 my-2">
            <label for="inputState">Fuel Type <span class="text-danger">*</span></label>
            <select id="inputState" class="form-control" required name="fuel_type">
                <option value="">Select Type</option>
                <option value="diseal">Diseal</option>
                <option value="petrol">Petrol</option>
                <option value="electric">Electric</option>

            </select>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Seat<span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="input1" placeholder="Name" required name="seat">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Cost Per Hour<span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="input1" placeholder="Name" required name="cost">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Description<span class="text-danger">*</span></label>

            <textarea type="text" class="form-control" id="input1" placeholder="Name" required name="decription"></textarea>
        </div>



    </div>
@endsection


@push('scripts')
@endpush
