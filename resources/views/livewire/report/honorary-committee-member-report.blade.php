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
                    <label>គណ:កិត្តិយស</label>
                    <select wire:model.live="committee_id" class="form-control">
                        <option value="">ជ្រើសរើសគណ:កិត្តិយស</option>
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
                @if ($branch_id || $committee_id || $term_id)
                    <span class="mr-1">Applied Filters:</span>
                    @if ($branch_id)
                        <span wire:key="filter-pill-gender"
                            class="badge badge-pill badge-info d-inline-flex align-items-center mr-2">
                            {{ $filter_branch->kh_name }}
                            <a href="#" wire:click.prevent="removeFilter('branch')" class="text-white ml-2">
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
                            {{ $filter_committee->kh_name }}
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
                            {{ $filter_term->kh_name }}
                            <a href="#" wire:click.prevent="removeFilter('term')" class="text-white ml-2">
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
            <div class="row">
                <div class="col-12 col-md-3"></div>
                <div class="col-12 col-md-3"></div>
                <div class="col-12 col-md-3"></div>
                <div class="col-12 col-md-3 d-flex justify-content-end align-items-center">
                    <button id="btn-print" type="button" class="btn btn-primary float-right"><i
                            class="fa fa-print"></i> បោះពុម្ភ</button>
                </div>
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
                            <h5 style="margin-bottom: 0px;">សមាជិក
                                @if ($filter_committee)
                                    {{ $filter_committee->kh_name }}
                                @endif
                                @if ($filter_term)
                                    {{ $filter_term->kh_name }}
                                @endif
                            </h5>
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
                        <th class="khm text-center font-weight-normal">ឋាន:តួនាទី</th>
                        <th class="khm text-center font-weight-normal">តួនាទី ក្នុងកក្រក</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td class="khs text-center">{{ $loop->iteration }}</td>
                            <td class="khs text-center">{{ $member->member_name }}</td>
                            <td class="khs text-center">{{ $member->gender }}</td>
                            <td class="khs text-center">{{ $member->gov_position }}</td>
                            <td class="khs text-center">{{ $member->committee_position }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
