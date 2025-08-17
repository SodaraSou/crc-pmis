<div class="card card-primary">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">គណៈកម្មាធិការ</h3>
            <a href="{{ route('committee.create') }}" class="btn btn-success">
                <i class="fa fa-plus mr-1"></i>
                បង្កើតថ្មី</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>
                        លេខកូដ
                    </th>
                    <th>
                        ឈ្មោះខ្មែរ
                    </th>
                    <th>
                        ឈ្មោះឡាតាំង
                    </th>
                    <th class="text-center">
                        សកម្មភាព
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($committees as $committee)
                <tr wire:key='{{ $committee->id }}'>
                    <td>{{ $committee->id }}</td>
                    <td>{{ $committee->kh_name }}</td>
                    <td>{{ $committee->en_name }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('committee.create', $committee->id) }}" class="btn btn-sm btn-primary text-white mr-2">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('committee.create', $committee->id) }}" class="btn btn-sm btn-info text-white mr-2">
                                <i class="fa fa-pen"></i>
                            </a>
                            <button class="btn btn-sm btn-danger"
                                wire:click="$dispatch('alert_delete', {committee_id: {{ $committee->id }}})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
{{--                <tr>--}}
{{--                    <td>1</td>--}}
{{--                    <td>Test</td>--}}
{{--                    <td>Test</td>--}}
{{--                    <td>--}}
{{--                        <div class="d-flex justify-content-center align-items-center">--}}
{{--                            <a href="{{ route('committee.create', 1) }}" class="btn btn-sm btn-primary text-white mr-2">--}}
{{--                                <i class="fa fa-eye"></i>--}}
{{--                            </a>--}}
{{--                            <a href="{{ route('committee.create', 1) }}" class="btn btn-sm btn-info text-white mr-2">--}}
{{--                                <i class="fa fa-pen"></i>--}}
{{--                            </a>--}}
{{--                            <button class="btn btn-sm btn-danger"--}}
{{--                                wire:click="$dispatch('alert_delete', {committee_id: 1})">--}}
{{--                                <i class="fa fa-trash" aria-hidden="true"></i>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                </tr>--}}
            </tbody>
        </table>
    </div>
</div>
