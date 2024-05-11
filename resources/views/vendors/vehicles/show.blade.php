@extends('admin.template.show')

@push('styles')
@endpush

@section('form_content')
    <div class="form-group row">
        <div class="col-md-6">
            <label for="inputEmail4">Vehicle Name<span class="text-danger">*</span></label>
            <input class="form-control" type='text' value={{ $item->vehicle_name }} readonly>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Brand Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name" name="brand"
                   value={{ $item->brand_name }} readonly>
        </div>

        <div class="col-md-6">
            <label for="inputEmail4">Color<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name"
                   name="color " value={{ $item->color }} readonly>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Mileage<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name"
                   name="mileage" value={{ $item->mileage }} readonly>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Status<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name"
                   name="vehicle_number" value={{ $item->status }} readonly>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4">Vehicle number<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name"
                   name="vehicle_number" value={{ $item->vehicle_number }} readonly>
        </div>

        <div class="col-md-6">
            <div class="input-group input-group-alternative mb-3">
                <label for="inputEmail4">Image <span class="text-danger">*</span></label>
            </div>
            <a target="_blank" href="{{ asset($item->image) }}"><img
                    style="width:50px; height:45px;" src="{{ asset($item->image) }}"></a>
        </div>


        <div class="col-md-6">
            <label for="inputEmail4">Seat<span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="input1" placeholder="Name"
                   name="seat" value={{ $item->seat }} readonly>
        </div>

        <div class="col-md-6 my-2">
            <label for="inputState">Status<span class="text-danger">*</span></label>
            <select id="inputState" class="form-control" name="status">

                <option value="unavailable"
                        {{ old('status', $item->status) == 'unavailable' ? 'selected' : '' }} readonly>
                    Unavailable
                </option>
                <option value="available" {{ old('status', $item->status) == 'available' ? 'selected' : '' }} readonly>
                    Available
                </option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="inputEmail4">Cost Per Hour<span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="input1" placeholder="Name"
                   name="cost" value={{ $item->cost_per_hour }} readonly>
        </div>

        {{-- <div class="col-md-6">
            <label for="inputEmail4">Fuel Type<span class="text-danger">*</span></label>
            <input type="number" class="form-control" value={{ $item->fuel_type }} readonly>
        </div> --}}
        <div class="col-md-6">
            <label for="inputEmail4">Document <span class="text-danger">*</span></label>

            <textarea type="text" class="form-control" id="input1" placeholder="Name" name="decription"
                      readonly>{{ $item->document_required }} </textarea>

        </div>

        <div class="col-md-6">
            <label for="inputEmail4">Description<span class="text-danger">*</span></label>

            <textarea type="text" class="form-control" id="input1" placeholder="Name" name="decription"
                      readonly>{{ $item->vehicle_description }} </textarea>

        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function () {
            let vehiclId = "{{ $item->vehicle_name }}";
            $('#vehicleId').val(vehiclId);
        });
    </script>
@endpush
