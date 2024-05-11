@extends('admin.template.show')

@push('styles')
@endpush


@section('form_content')
    {{-- {{ dd($item->vehicle_name) }} --}}
    <div class="form-group row">
        <div class="col-md-6 mb-3">
            <label for="inputEmail4">Vehicle Name</label>
            <input class="form-control" type='text' id="vehicleId" readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label for="inputEmail4">Added By</label>
            <input class="form-control" name="mileage" value="{{ $item->user ? $item->user->name : 'N/A' }}" readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label for="inputEmail4">Brand Name</label>
            <input type="text" class="form-control" value={{ $item->brand_name }} readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label for="inputEmail4">Color</label>
            <input type="text" class="form-control" name="color "value={{ $item->color }} readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label for="inputEmail4">Mileage</label>
            <input type="text" class="form-control" name="mileage"value={{ $item->mileage }} readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label for="inputEmail4">Status</label>
            <input type="text" class="form-control" name="mileage"value={{ $item->status }} readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label for="inputEmail4">Fuel Type</label>
            <input type="text" class="form-control" name="mileage"value={{ $item->fuel_type }} readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label for="inputEmail4">Transmission Type</label>
            <input type="text" class="form-control" name="mileage" value={{ $item->transmission_type }} readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label for="inputEmail4">Vehicle number</label>
            <input type="text" class="form-control" name="vehicle_number"value={{ $item->vehicle_number }} readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label for="inputEmail4">Seat</label>
            <input type="number" class="form-control" name="seat"value={{ $item->seat }} readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label for="inputEmail4">Cost Per Hour</label>
            <input type="number" class="form-control" name="cost"value={{ $item->cost_per_hour }} readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label for="inputEmail4">Description</label>

            <textarea type="text" class="form-control" name="decription" readonly>{{ $item->vehicle_description }}</textarea>
        </div>
        <div class="col-md-6 mb-3">
            <div class="input-group input-group-alternative mb-3">
                <label for="inputEmail4">Image </label>
            </div>
            <a target="_blank" href="{{ asset($item->image) }}"><img style="width: 120px; height:100px"
                    src="{{ asset($item->image) }}"></a>
        </div>

    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            let vehiclId = "{{ $item->vehicle_name }}";
            $('#vehicleId').val(vehiclId);
        });
    </script>
@endpush
