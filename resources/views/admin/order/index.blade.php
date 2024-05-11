@extends('admin.template.index')

@push('styles')
@endpush

@section('index_content')
    <!-- <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"> ID</th>
                    <th scope="col">Status</th>
                    <th scope="col">Order By</th>
                    <th scope="col">Vehicle </th>

                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <td> {{ $item->id }}</td>
                        <td> {{ $item->status ?: 'N/A' }}</td>
                        <td>
                            @if ($item->user)
                                <a target="_blank"
                                    href="{{ route('admin.users.show', $item->user->id) }}">{{ $item->user->name }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if ($item->vehicle)
                                <a target="_blank"
                                    href="{{ route('admin.vehicles.show', $item->vehicle->id) }}">{{ $item->vehicle->vehicle_name }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                        @include('admin.template.index_action')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> -->
@endsection

@push('scripts')
@endpush
