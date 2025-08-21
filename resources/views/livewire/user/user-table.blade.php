<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-3 form-group">
                    <label>ស្វែងរក</label>
                    <input wire:model.live.debounce.500ms="search" type="text" class="form-control"
                        placeholder="ស្វែងរកអ្នកប្រើប្រាស់" />
                </div>
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
                    <label>នាយកដ្ឋាន</label>
                    <select wire:model.live="department_id" class="form-control">
                        <option value="">ជ្រើសរើសនាយកដ្ឋាន</option>
                        @foreach ($departments as $department)
                            <option wire:key="{{ $department->id }}" value="{{ $department->id }}">
                                {{ $department->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3 form-group">
                    <label>ចំនួនមួយទំព័រ</label>
                    <select wire:model.live='per_page' class="form-control">
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <div class="d-flex align-items-center">
                @if ($department_id || $branch_id)
                    <span class="mr-1">Applied Filters:</span>
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
                    <a href="#" wire:click.prevent="resetFilter">Clear</a>
                @endif
            </div>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">អ្នកប្រើប្រាស់</h3>
                <a href="{{ route('user.create') }}" class="btn btn-success"><i class="fa fa-plus mr-1"></i>
                    បង្កើត</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>
                            ឈ្មោះខ្មែរ
                        </th>
                        <th>
                            ឈ្មោះឡាតាំង
                        </th>
                        <th>
                            ថ្នាក់
                        </th>
                        <th>
                            សាខា
                        </th>
                        <th>
                            នាយកដ្ឋាន
                        </th>
                        <th>
                            តួនាទី
                        </th>
                        <th class="text-center">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr wire:key='{{ $user->id }}'>
                            <td>{{ $user->kh_name }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->userLevel->kh_name }}</td>
                            <td>{{ $user->branch->kh_name }}</td>
                            <td>{{ $user->department->kh_name }}</td>
                            <td>{{ $user->position }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-primary mr-2">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-info mr-2">
                                        <i class="fa fa-pen" aria-hidden="true"></i>
                                    </a>
                                    {{-- <button class="btn btn-sm btn-danger"
                                    wire:click="$dispatch('alert-delete', {id: {{ $user->id }}})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $users->links() }}
        </div>
    </div>
</div>
