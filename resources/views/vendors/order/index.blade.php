@extends('admin.template.index')

@push('styles')
@endpush

@section('index_content')
    <div class="table">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"> ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Order status</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>

                    <th scope="col">Vehicle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $item)
                    <tr>

                        <td> {{ $item->id }}</td>
                        <td>
                            @if ($item->user)
                                <a>{{ $item->user->name }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            {{ $item->status }}
                        </td>
                        <td> {{ $item->start_date }}</td>
                        <td> {{ $item->end_date }}</td>

                        {{-- <td>
                            @if ($item->vehicle)
                                <a>{{ $item->vehicle->vehicle_name }}</a>
                            @else
                                N/A
                            @endif
                        </td> --}}
                        @include('vendors.template.index_action')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@push('scripts')
@endpush
