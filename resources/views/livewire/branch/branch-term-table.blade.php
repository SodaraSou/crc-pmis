<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>អាណត្តិ</h4>
        {{-- <a href="{{ route('term.create', ['branch_id' => $branch->id]) }}" class="btn btn-success">
            <i class="fa fa-plus mr-1"></i>
            បង្កើតថ្មី
        </a> --}}
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ល.រ</th>
                <th>ឈ្មោះខ្មែរ</th>
                <th>ថ្ងៃចាប់ផ្តើមអាណត្តិ</th>
                <th>ថ្ងៃបញ្ចប់អាណត្តិ</th>
                <th class="text-center">សកម្មភាព</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($terms as $term)
                <tr wire:key='{{ $term->id }}'>
                    <td>{{ $term->id }}</td>
                    <td>{{ $term->kh_name }}</td>
                    <td>{{ $term->start_date }}</td>
                    <td>{{ $term->end_date }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="" class="btn btn-sm btn-info text-white mr-2">
                                <i class="fa fa-pen"></i>
                            </a>
                            <button class="btn btn-sm btn-danger"
                                wire:click="$dispatch('alert_delete', {term_id: {{ $term->id }}})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
