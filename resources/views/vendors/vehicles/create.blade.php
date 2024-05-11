@extends('admin.template.create')
{{--@extends('vendors.template.create')--}}

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
            <input type="text" class="form-control" id="input1" placeholder="Brand" required name="brand">
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
        <div class="col-md-6 my-2">
            <label for="inputEmail4">Color<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Color" required name="color">
        </div>
        <div class="col-md-6 my-2">
            <label for="inputEmail4">Mileage<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Mileage" required name="mileage">
        </div>
        <div class="col-md-6 my-2">
            <label for="inputEmail4">Vehicle number<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Vehicle Number" required
                name="vehicle_number">
        </div>
        <div class="col-md-6 my-2">
            <label for="inputState">Image<span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="image" id="image" style=" height:45px;" required>
        </div>
        <div class="col-md-6 my-2">
            <label for="inputState">Transmission Type<span class="text-danger">*</span></label>
            <select id="inputState" class="form-control" required name="transmission_type">
                <option value="">Select Type</option>
                <option value="manual">Manual</option>
                <option value="automatic">Automatic</option>
            </select>
        </div>
        {{-- <div class="col-md-6 my-2">
            <label for="inputState">Status<span class="text-danger">*</span></label>
            <select id="inputState" class="form-control" required name="status">
                <option value="">Select Type</option>
                <option value="unavailable">Unavailable</option>
                <option value="available">Available</option>
            </select>
        </div> --}}



        <div class="col-md-6 my-2">
            <label for="inputState">Fuel Type <span class="text-danger">*</span></label>
            <select id="inputState" class="form-control" required name="fuel_type">
                <option value="">Select Type</option>
                <option value="diseal">Diseal</option>
                <option value="petrol">Petrol</option>
                <option value="electric">Electric</option>

            </select>
        </div>
        <div class="col-md-6 my-2">
            <label for="inputEmail4">Seat<span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="input1" placeholder="Seat" required name="seat">
        </div>
        <div class="col-md-6 my-2">
            <label for="inputEmail4">Cost Per Hour<span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="input1" placeholder="Cost per hour" required name="cost">
        </div>
        <div class="col-md-6 my-2">
            <label for="inputEmail4">Document required<span class="text-danger">*</span></label>
            <textarea type="text" class="form-control" id="input1" placeholder="eg: Citizenship, Identiy Card" required
                name="document_required"></textarea>
        </div>

        <div class="col-md-6 my-2">
            <label for="inputEmail4">Description<span class="text-danger">*</span></label>

            <textarea type="text" class="form-control" id="input1" placeholder="Description" required name="description"></textarea>
        </div>

    </div>
@endsection


@push('scripts')
@endpush
