@extends('admin.template.edit')

@push('styles')
@endpush

@section('form_content')
    <div class="form-group row">
        <div class="col-md-6">
            <label for="inputEmail4">Vehicle Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name" value="{{ $item->vehicle_name }}"
                required name="vehicle_name">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Brand Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name" required name="brand"
                value="{{ $item->brand_name }}">
        </div>

        <div class="col-md-6 my-2">
            <label for="inputState">Category <span class="text-danger">*</span></label>
            <select id="inputState" class="form-control" required name="category_id">
                <option value="">Select Type</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach


            </select>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Color<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name" required name="color"
                value="{{ $item->color }}">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Mileage<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name" required name="mileage"
                value="{{ $item->mileage }}">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Vehicle number<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name" required name="vehicle_number"
                value="{{ $item->vehicle_number }}">
        </div>
        <div class="col-md-6 ">
            <label for="inputState">Image<span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="image" id="image" style="height:45px;">
            <div>
                <img style="width: 50px; height:40px" src="{{ asset($item->image) }}">
            </div>
        </div>

        <div class="col-md-6 my-2">
            <label for="inputState">Transmission Type<span class="text-danger">*</span></label>
            <select id="inputState" class="form-control" name="transmission_type">
                <option @if ($item->transmission_type == 'manual') selected @endif>Manual</option>
                <option @if ($item->transmission_type == 'automatic') selected @endif>Automatic</option>
            </select>
        </div>
        <div class="col-md-6 my-2">
            <label for="inputState">Status<span class="text-danger">*</span></label>
            <select id="inputState" class="form-control" name="status">
                <option @if ($item->status == 'unavailable') selected @endif>Unavailable</option>
                <option @if ($item->status == 'available') selected @endif>Available</option>
            </select>
        </div>



        <div class="col-md-6 my-2">
            <label for="inputState">Fuel Type <span class="text-danger">*</span></label>

            <select id="inputState" class="form-control" name="fuel_type">
                <option @if ($item->fuel_type == 'diseal') selected @endif>Diseal</option>
                <option @if ($item->fuel_type == 'petrol') selected @endif>Petrol</option>
                <option @if ($item->fuel_type == 'electric') selected @endif>Electric</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Seat<span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="input1" placeholder="Name" required name="seat"
                value="{{ $item->seat }}">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Cost Per Hour<span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="input1" placeholder="Name" required name="cost"
                value="{{ $item->cost_per_hour }}">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Document Required<span class="text-danger">*</span></label>

            <textarea type="text" class="form-control" id="input1" placeholder="Name" required name="document_required">{{ $item->document_required }}</textarea>
        </div>

        <div class="col-md-6">
            <label for="inputEmail4">Description<span class="text-danger">*</span></label>

            <textarea type="text" class="form-control" id="input1" placeholder="Name" required name="decription">{{ $item->vehicle_description }}</textarea>
        </div>

    </div>
@endsection


@push('scripts')
@endpush
