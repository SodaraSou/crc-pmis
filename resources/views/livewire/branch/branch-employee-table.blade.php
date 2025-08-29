<div class="card card-solid">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h4>បញ្ជីមន្រ្តី</h4>
            <a href="{{ route('employee.create') }}" class="btn btn-success float-sm-right"><i class="fa fa-plus mr-1"></i>
                បង្កើតបុគ្គលិកថ្មី</a>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <input wire:model.live.debounce.500ms="search" type="text" class="form-control"
                    placeholder="ស្វែងរកបុគ្គលិក" />
            </div>
            <div>
                <select wire:model.live='per_page' class="form-control mr-2">
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="75">75</option>
                </select>
            </div>
        </div>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>
                        ឈ្មោះខ្មែរ
                    </th>
                    <th>
                        ឈ្មោះឡាតាំង
                    </th>
                    <th class="text-center">សកម្មភាព</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr wire:key='{{ $employee->id }}'>
                        <td>{{ $employee->kh_name }}</td>
                        <td>{{ $employee->en_name }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('employee.show', Crypt::encrypt($employee->id)) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $employees->links() }}
    </div>
</div>
