@extends('admin.template.show')

@push('styles')
@endpush

@section('form_content')
    <div class="form-group column">
        <div class="col-md-6">
            <label for="inputEmail4">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" value="{{ $item->name }}" placeholder="Name" disabled
                readonly name="name">
        </div>

        <div class="col-md-6">
            <div class="input-group input-group-alternative mb-3">
                <label for="inputEmail4">Image <span class="text-danger">*</span></label>
            </div>
            <div>
                <img style="width: 50px; height:40px" src="{{ asset($item->image) }}">
            </div>


        </div>
    @endsection


    @push('scripts')
    @endpush
