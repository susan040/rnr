@extends('admin.template.edit')

@push('styles')
@endpush

@section('form_content')
    <div class="form-group row">
        <div class="col-md-6">
            <label for="inputEmail4">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="input1" value="{{ $item->name }}" placeholder="Name" required
                name="name">
        </div>

        <div class="col-md-6">
            <label>Image</label>
            <input type="file" class="form-control" name="image" id="image">
            <div>
                <img style="width: 50px; height:40px" src="{{ asset($item->image) }}">
            </div>

        </div>
    </div>
@endsection


@push('scripts')
@endpush
