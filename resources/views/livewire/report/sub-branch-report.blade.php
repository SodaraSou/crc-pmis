<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-3 form-group">
                    <label>សាខា</label>
                    <select wire:model.live="branch_id" class="form-control">
                        <option value="">ជ្រើសរើសសាខា</option>
                        @foreach ($branches as $branch)
                            @if ($branch->id == 0)
                                @continue
                            @endif
                            <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                                {{ $branch->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3 form-group"></div>
                <div class="col-12 col-md-3 form-group"></div>
                <div class="col-12 col-md-3 d-flex justify-content-end align-items-center">
                    <button id="btn-print" class="btn btn-primary float-right"><i class="fa fa-print"></i>
                        បោះពុម្ភ</button>
                </div>
            </div>
            <div class="d-flex align-items-center">
                @if ($branch_id)
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
                    <a href="#" wire:click.prevent="resetFilter">Clear</a>
                @endif
            </div>
        </div>
    </div>
    <div class="card" id="printable-area">
        <div class="card-body">
            <div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4 text-center">
                        <img src="{{ asset('Cambodian_Red_Cross_Logo.png') }}" alt="crc-logo"
                            style="width: 120px; height: 120px;" class="mb-3">
                        <div class="khm">កាកបាទក្រហមកម្ពុជា</div>
                    </div>
                    <div class="col-4"></div>
                </div>
                <div class="row my-4">
                    <div class="col-12 text-center">
                        <div class="khm">របាយការណ៌សមាជិកគណ:កិត្តិយសសមាជិកគណ:កម្មាធិការមន្រ្តីប្រតិបត្តិ ២៥
                            សាខារាជធានី/ខេត្ត</div>
                    </div>
                </div>
            </div>
            <table class="table table-sm table-bordered cell-center">
                <thead>
                    <tr>
                        <th class="khm text-center font-weight-normal">ល.រ</th>
                        <th class="khm text-center font-weight-normal" colspan="4">អង្គភាព</th>
                        <th class="khm text-center font-weight-normal" colspan="2">សមាជិកគណ:កិត្តិយស</th>
                        <th class="khm text-center font-weight-normal" colspan="2">សមាជិកគណ:កម្មាធិការ</th>
                        <th class="khm text-center font-weight-normal" colspan="2">មន្រ្តីប្រតិបត្តិ</th>
                        <th class="khm text-center font-weight-normal" colspan="2">អាណត្តិបច្ចុប្បន្ន</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($branches as $branch)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="khs text-center" colspan="4">{{ $branch['branch_name'] }}</td>
                            <td class="text-center" colspan="2">{{ $branch['total_honorary_member'] }}</td>
                            <td class="text-center" colspan="2">{{ $branch['total_member'] }}</td>
                            <td class="text-center" colspan="2">{{ $branch['total_employee'] }}</td>
                            <td class="khs text-center" colspan="2">
                                {{ $branch['current_term']->kh_name ?? 'N/A' }}
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
