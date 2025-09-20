<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>តារាងអាណត្តិសាខា</h4>
        {{-- <a href="{{ route('term.create', ['branch_id' => $branch->id]) }}" class="btn btn-success">
            <i class="fa fa-plus mr-1"></i>
            បង្កើតថ្មី
        </a> --}}
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-6 form-group">
                    <label>ស្វែងរក</label>
                    <input wire:model.live.debounce.500ms="search" type="text" class="form-control"
                        placeholder="ស្វែងរក" />
                </div>
                <div class="col-12 col-md-6 form-group">
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
            </div>
            <div class="d-flex align-items-center">
                @if ($branch_id)
                    <span class="mr-1">Applied Filters:</span>
                    <span wire:key="filter-pill-gender"
                        class="badge badge-pill badge-info d-inline-flex align-items-center mr-2">
                        សាខា: {{ $filter_branch->kh_name }}
                        <a href="#" wire:click.prevent="removeFilter('branch')" class="text-white ml-2">
                            <span class="sr-only">Remove filter option</span>
                            <svg style="width:.5em;height:.5em" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"></path>
                            </svg>
                        </a>
                    </span>
                    <a href="#" wire:click.prevent="resetFilter">Clear</a>
                @endif
            </div>
        </div>
        <div class="card-body">
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
    </div>
</div>
