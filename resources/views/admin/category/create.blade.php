@extends('admin.template.create')

@push('styles')
@endpush

@section('form_content')
    <div class="form-group column">
        <div class="col-md-6">
            <label for="inputEmail4">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" placeholder="Name" required name="name">
        </div>

        <div class="col-md-6 my-2">
            <label for="inputState"> Image<span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="image" id="image" style="width:540px; height:45px;"
                required>

        </div>
    </div @endsection @push('scripts') @endpush
