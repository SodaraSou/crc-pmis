<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>តារាងសមាជិកគណ:កម្មាធិការ</h4>
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
                <div class="col-12 col-md-3 form-group">
                    <label>ថ្នាក់គណ:កម្មាធិការ</label>
                    <select wire:model.live="committee_level_id" class="form-control">
                        <option value="">ជ្រើសរើសថ្នាក់គណ:កម្មាធិការ</option>
                        @foreach ($committee_levels as $committee_level)
                            <option wire:key="{{ $committee_level->id }}" value="{{ $committee_level->id }}">
                                {{ $committee_level->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3 form-group">
                    <label>គណ:កម្មាធិការ</label>
                    <select wire:model.live="committee_id" class="form-control">
                        <option value="">ជ្រើសរើសគណ:កម្មាធិការ</option>
                        @foreach ($committees as $committee)
                            <option wire:key="{{ $committee->id }}" value="{{ $committee->id }}">
                                {{ $committee->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3 form-group">
                    <label>អាណត្តិ</label>
                    <select wire:model.live="term_id" class="form-control">
                        <option value="">ជ្រើសរើសអាណត្តិ</option>
                        @foreach ($terms as $term)
                            <option wire:key="{{ $term->id }}" value="{{ $term->id }}">
                                {{ $term->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex align-items-center">
                @if ($committee_level_id || $committee_id || $term_id)
                    <span class="mr-1">Applied Filters:</span>
                    @if ($committee_level_id)
                        <span wire:key="filter-pill-gender"
                            class="badge badge-pill badge-info d-inline-flex align-items-center mr-2">
                            នាយកដ្ឋាន: {{ $filter_committee_level->kh_name }}
                            <a href="#" wire:click.prevent="removeFilter('committee_level')"
                                class="text-white ml-2">
                                <span class="sr-only">Remove filter option</span>
                                <svg style="width:.5em;height:.5em" stroke="currentColor" fill="none"
                                    viewBox="0 0 8 8">
                                    <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"></path>
                                </svg>
                            </a>
                        </span>
                    @endif
                    @if ($committee_id)
                        <span wire:key="filter-pill-gender"
                            class="badge badge-pill badge-info d-inline-flex align-items-center mr-2">
                            សាខា: {{ $filter_committee->kh_name }}
                            <a href="#" wire:click.prevent="removeFilter('committee')" class="text-white ml-2">
                                <span class="sr-only">Remove filter option</span>
                                <svg style="width:.5em;height:.5em" stroke="currentColor" fill="none"
                                    viewBox="0 0 8 8">
                                    <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"></path>
                                </svg>
                            </a>
                        </span>
                    @endif
                    @if ($term_id)
                        <span wire:key="filter-pill-gender"
                            class="badge badge-pill badge-info d-inline-flex align-items-center mr-2">
                            សាខា: {{ $filter_term->kh_name }}
                            <a href="#" wire:click.prevent="removeFilter('committee')" class="text-white ml-2">
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
                        <th>ឈ្មោះខ្មែរ</th>
                        <th class="text-center">អាណត្តិ</th>
                        <th class="text-center">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr wire:key='{{ $member->id }}' aria-expanded="false">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->kh_name }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-success" data-widget="expandable-table"><i
                                        class="fa fa-eye" aria-hidden="true"></i></button>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('committee-member.show', $member->id) }}"
                                        class="btn btn-sm btn-primary mr-2">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('committee-member.edit', $member->id) }}"
                                        class="btn btn-sm btn-info mr-2">
                                        <i class="fa fa-pen" aria-hidden="true"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="$dispatch('alert_delete', {member_id: {{ $member->id }}})">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="expandable-body d-none">
                            <td colspan="4">
                                <div style="display: none;">
                                    <div class="timeline timeline-inverse">
                                        @php
                                            $terms = $member->committee_members()->where('active', true)->get();
                                        @endphp
                                        @foreach ($terms as $term)
                                            <div class="time-label">
                                                @if ($term->committee->committee_level_id == 1)
                                                    <span class="bg-success">
                                                        @if ($term->committee->committee_level_id == 1)
                                                            {{ $term->branch_term->kh_name }}
                                                        @elseif ($term->committee->committee_level_id == 2)
                                                            {{ $term->sub_branch_term->kh_name }}
                                                        @endif
                                                    </span>
                                                @endif
                                            </div>
                                            <div>
                                                <i class="fas fa-suitcase bg-success"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header">{{ $term->committee->kh_name }}</h3>
                                                    <div class="timeline-body">
                                                        @if ($term->committee->committee_level_id == 1)
                                                            <div>
                                                                រយ:ពេល: {{ $term->branch_term->start_date }} ដល់
                                                                {{ $term->branch_term->end_date }}
                                                            </div>
                                                        @elseif ($term->committee->committee_level_id == 2)
                                                            <div>
                                                                រយ:ពេល: {{ $term->sub_branch_term->start_date }} ដល់
                                                                {{ $term->sub_branch_term->end_date }}
                                                            </div>
                                                        @endif
                                                        <div>
                                                            តួនាទី: {{ $term->committee_position->kh_name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if ($terms->count() > 0)
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">{{ $members->links() }}</div>
    </div>
</div>

@script
    <script>
        $wire.on("alert_delete", (event) => {
            Swal.fire({
                title: "តើអ្នកប្រាកដមែនទេ?",
                text: "សកម្មភាពនេះមិនអាចត្រឡប់ក្រោយបានទេ!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#007bff",
                cancelButtonColor: "#dc3545",
                confirmButtonText: "យល់ព្រម",
                cancelButtonText: "បញ្ឈប់"
            }).then((result) => {
                if (result.isConfirmed) {
                    $wire.dispatch('confirmed_delete', {
                        member_id: event.member_id
                    });
                }
            });
        });
        $wire.on("delete_success", () => {
            Swal.fire({
                title: "ជោគជ័យ",
                text: "លុបសមាជិកជោគជ័យ",
                icon: "success",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#28a745"
            });
        });
        $wire.on("delete_fail", (event) => {
            Swal.fire({
                title: "មានបញ្ហា!",
                text: event.message,
                icon: "error",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#dc3545"
            });
        });
    </script>
@endscript
