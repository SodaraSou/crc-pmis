<div class="card card-primary">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">អាណត្តិ</h3>
            <a href="{{ route('term.create', $committee) }}" class="btn btn-success">
                <i class="fa fa-plus mr-1"></i>
                បង្កើតថ្មី
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>លេខកូដ</th>
                    <th>ឈ្មោះខ្មែរ</th>
                    <th>ឈ្មោះឡាតាំង</th>
                    <th class="text-center">សកម្មភាព</th>
                </tr>
            </thead>
            <tbody>
            @foreach($terms as $term)
                <tr wire:key='{{ $term->id }}'>
                    <td>{{ $term->id }}</td>
                    <td>{{ $term->kh_name }}</td>
                    <td>{{ $term->en_name }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href=""
                            class="btn btn-sm btn-primary text-white mr-2">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href=""
                            class="btn btn-sm btn-info text-white mr-2">
                                <i class="fa fa-pen"></i>
                            </a>
                            <buttton class="btn btn-sm btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </buttton>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
