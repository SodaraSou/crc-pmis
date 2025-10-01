<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>មន្ត្រីប្រតិបត្តិសាខា</h4>
        {{-- <a href="{{ route('term.create', ['branch_id' => $branch->id]) }}" class="btn btn-success">
            <i class="fa fa-plus mr-1"></i>
            បង្កើតថ្មី
        </a> --}}
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-4 form-group">
                    <label>ស្វែងរក</label>
                    <input wire:model.live.debounce.500ms="search" type="text" class="form-control"
                        placeholder="ស្វែងរក" />
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>នាយកដ្ឋាន</label>
                    <select wire:model.live="department_id" class="form-control">
                        <option value="">ជ្រើសរើសនាយកដ្ឋាន</option>
                        @foreach ($departments as $branch)
                            <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                                {{ $branch->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>ចំនួនមួយទំព័រ</label>
                    <select wire:model.live='per_page' class="form-control">
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ល.រ</th>
                        <th>ឈ្មោះខ្មែរ</th>
                        <th>តួនាទី​</th>
                        <th class="text-center">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr wire:key='{{ $employee->id }}'>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->kh_name }}</td>
                            <td></td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('employee.show', Crypt::encrypt($employee->id)) }}"
                                        class="btn btn-sm btn-primary mr-2">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('employee.edit', Crypt::encrypt($employee->id)) }}"
                                        class="btn btn-sm btn-info mr-2">
                                        <i class="fa fa-pen" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">{{ $employees->links() }}</div>
    </div>
</div>
