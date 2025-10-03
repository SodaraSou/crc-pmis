<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>តារាងមន្រ្តីប្រតិបត្តិ</h4>
        {{-- <a href="{{ route('term.create', ['branch_id' => $branch->id]) }}" class="btn btn-success">
            <i class="fa fa-plus mr-1"></i>
            បង្កើតថ្មី
        </a> --}}
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-3 form-group">
                    <label>ស្វែងរក</label>
                    <input wire:model.live.debounce.500ms="search" type="text" class="form-control"
                        placeholder="ស្វែងរក" />
                </div>
                {{-- <div class="col-12 col-md-3 form-group">
                    <label>ថ្នាក់មន្រ្តីប្រតិបត្តិ</label>
                    <select wire:model.live="employee_level_id" class="form-control">
                        <option value="">ជ្រើសរើសថ្នាក់មន្រ្តីប្រតិបត្តិ</option>
                        @foreach ($employee_levels as $employee_level)
                            <option wire:key="{{ $employee_level->id }}" value="{{ $employee_level->id }}">
                                {{ $employee_level->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="col-12 col-md-3 form-group">
                    <label>សាខា</label>
                    <select wire:model.live="branch_id" class="form-control">
                        <option value="">ជ្រើសរើសសាខា</option>
                        @foreach ($branches as $branch)
                            <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                                {{ $branch->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3 form-group">
                    <label>អនុសាខា</label>
                    <select wire:model.live="sub_branch_id" class="form-control">
                        <option value="">ជ្រើសរើស​អនុសាខា</option>
                        @foreach ($sub_branches as $sub_branch)
                            <option wire:key="{{ $sub_branch->id }}" value="{{ $sub_branch->id }}">
                                {{ $sub_branch->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3 form-group">
                    <label>ក្រុម</label>
                    <select wire:model="group_id" class="form-control">
                        <option value="">ជ្រើសរើសក្រុម</option>
                        @foreach ($groups as $group)
                            <option wire:key="{{ $group->id }}" value="{{ $group->id }}">
                                {{ $group->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex align-items-center">
                @if ($branch_id || $sub_branch_id || $group_id)
                    <span class="mr-1">Applied Filters:</span>
                    @if ($branch_id)
                        <span wire:key="filter-pill-gender"
                            class="badge badge-pill badge-info d-inline-flex align-items-center mr-2">
                            សាខា: {{ $filter_branch->kh_name }}
                            <a href="#" wire:click.prevent="removeFilter('branch')" class="text-white ml-2">
                                <span class="sr-only">Remove filter option</span>
                                <svg style="width:.5em;height:.5em" stroke="currentColor" fill="none"
                                    viewBox="0 0 8 8">
                                    <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"></path>
                                </svg>
                            </a>
                        </span>
                    @endif
                    @if ($sub_branch_id)
                        <span wire:key="filter-pill-gender"
                            class="badge badge-pill badge-info d-inline-flex align-items-center mr-2">
                            អនុសាខា: {{ $filter_sub_branch->kh_name }}
                            <a href="#" wire:click.prevent="removeFilter('sub_branch')" class="text-white ml-2">
                                <span class="sr-only">Remove filter option</span>
                                <svg style="width:.5em;height:.5em" stroke="currentColor" fill="none"
                                    viewBox="0 0 8 8">
                                    <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"></path>
                                </svg>
                            </a>
                        </span>
                    @endif
                    @if ($group_id)
                        <span wire:key="filter-pill-gender"
                            class="badge badge-pill badge-info d-inline-flex align-items-center mr-2">
                            ក្រុម: {{ $filter_group->kh_name }}
                            <a href="#" wire:click.prevent="removeFilter('group')" class="text-white ml-2">
                                <span class="sr-only">Remove filter option</span>
                                <svg style="width:.5em;height:.5em" stroke="currentColor" fill="none"
                                    viewBox="0 0 8 8">
                                    <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"></path>
                                </svg>
                            </a>
                        </span>
                    @endif
                    <a href="#" wire:click.prevent="resetFilter">Clear</a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ល.រ</th>
                        <th>
                            ឈ្មោះ
                        </th>
                        <th>នាយកដ្ឋាន</th>
                        <th>តួនាទី​</th>
                        <th class="text-center">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr wire:key='{{ $employee->id }}'>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->kh_name }}</td>
                            <td>{{ $employee->current_position->department->kh_name }}</td>
                            <td>{{ $employee->current_position->position->kh_name }}</td>
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
        <div class="card-footer clearfix">
            {{ $employees->links() }}
        </div>
    </div>
</div>
