@extends('admin.template.index')

@push('styles')
@endpush


@section('index_content')
    <section>
        <div class=" container py-5">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://img.freepik.com/premium-vector/beautiful-girl-hand-drawn-illustration-vector-with-brown-fashion-flower_562551-58.jpg"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ auth()->user()->name }}</h5>
                            <p class="text-muted mb-1">Admin of RNR</p>
                            {{-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> --}}
                            {{-- <div class="d-flex justify-content-center mb-2">
                                <a href="{{ route('admin.profile.edit', auth()->user()->id) }}" type="button"
                                    class="btn btn-outline-primary ms-1">Edit</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ auth()->user()->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ auth()->user()->phone_number }}</p>
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
