@extends('admin.template.index')

@push('styles')
@endpush

@section('index_content')
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"> ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Added by</th>

                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $item)
                    <tr>
                        <td> {{ $item->id }}</td>
                        <td> {{ $item->vehicle_name ?: 'N/A' }}</td>
                        <td>
                            <a target="_blank" href="{{ asset($item->image) }}"><img style="width: 50px; height:10%"
                                    src="{{ asset($item->image) }}"></a>
                        </td>
                        <td>
                            @if ($item->user)
                                <a target="_blank"
                                    href="{{ route('admin.users.show', $item->user->id) }}">{{ $item->user->name }}</a>
                            @else
                                N/A
                            @endif
                        </td>

                        @include('admin.template.index_action')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
@endpush
