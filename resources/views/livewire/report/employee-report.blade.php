<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
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
                <div class="col-12 col-md-3">
                    <label>នាយកដ្ឋាន</label>
                    <select wire:model.live='department_id' class="form-control">
                        <option value="">សូមជ្រើសរើសនាយកដ្ឋាន</option>
                        @foreach ($departments as $department)
                            <option wire:key='{{ $department->id }}' value="{{ $department->id }}">
                                {{ $department->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3 d-flex justify-content-end align-items-center">
                    <button id="btn-print" type="button" class="btn btn-primary float-right"><i
                            class="fa fa-print"></i> បោះពុម្ភ</button>
                </div>
            </div>
            <div class="d-flex align-items-center">
                @if ($branch_id || $sub_branch_id || $department_id)
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
                    @if ($department_id)
                        <span wire:key="filter-pill-gender"
                            class="badge badge-pill badge-info d-inline-flex align-items-center mr-2">
                            នាយកដ្ឋាន: {{ $filter_department->kh_name }}
                            <a href="#" wire:click.prevent="removeFilter('department')" class="text-white ml-2">
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
    </div>
    <div class="card" id="printable-area">
        <div class="card-body">
            <div>
                <div class="row" style="margin-bottom: 32px;">
                    <div class="col-4"></div>
                    <div class="col-4 text-center">
                        <img src="{{ asset('Cambodian_Red_Cross_Logo.png') }}" alt="crc-logo"
                            style="width: 120px; height: 120px;" class="mb-3">
                        <div class="khm">
                            <h5 style="margin-bottom: 0px;">កាកបាទក្រហមកម្ពុជា</h5>
                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
                <div class="row" style="margin-bottom: 32px;">
                    <div class="col-12 text-center">
                        <div class="khm">
                            <h5 style="margin-bottom: 16px;">បញ្ជីររាយនាម</h5>
                            <h5 style="margin-bottom: 16px;">ថ្នាក់ដឹកនាំ មន្ត្រី​​ បុគ្គលិក
                                @if ($department_id)
                                    {{ $filter_department->kh_name }}
                                @endif
                                @if ($branch_id == 0)
                                    ទីស្នាក់ការកណ្តាល កាកបាទក្រហមកម្ពុជា
                                @elseif ($branch_id > 0 && !$sub_branch_id)
                                    {{ $filter_branch->kh_name }}
                                @elseif ($sub_branch_id)
                                    {{ $filter_sub_branch->kh_name }}
                                @endif
                            </h5>
                            <h5 style="margin-bottom: 0px;">សម្រាប់ឆ្នាំ</h5>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-sm table-bordered cell-center">
                <thead>
                    <tr>
                        <th class="khm text-center font-weight-normal" colspan="1">ល.រ</th>
                        <th class="khm text-center font-weight-normal">គោត្តនាម-នាម</th>
                        <th class="khm text-center font-weight-normal" colspan="1">ភេទ</th>
                        <th class="khm text-center font-weight-normal">តួនាទី ក្នុងកក្រក</th>
                        <th class="khm text-center font-weight-normal">លេខទូរស័ព្ទ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees_grouped_by_department as $department_name => $employees)
                        @if (!$department_id)
                            <tr>
                                <td class="khm" colspan="6">{{ $department_name }}</td>
                            </tr>
                        @endif
                        @foreach ($employees as $employee)
                            <tr>
                                <td class="khs text-center" colspan="1">{{ $loop->iteration }}</td>
                                <td class="khs text-center">
                                    @if ($employee->title)
                                        {{ $employee->title }}
                                    @endif {{ $employee->name }}
                                </td>
                                <td class="khs text-center" colspan="1">{{ $employee->gender }}</td>
                                <td class="khs text-center">
                                    @if ($employee->opt_position_name)
                                        {{ $employee->opt_position_name }}
                                    @elseif ($employee->office_name)
                                        @if ($employee->gender_id == 1)
                                            {{ $employee->position_female }}{{ $employee->office_name }}
                                        @else
                                            {{ $employee->position_male }}{{ $employee->office_name }}
                                        @endif
                                    @else
                                        @if ($employee->gender_id == 1)
                                            {{ $employee->position_female }}
                                        @else
                                            {{ $employee->position_male }}
                                        @endif
                                    @endif
                                </td>
                                <td class="khs text-center">{{ $employee->phone_number }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>
