<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-3 form-group">
                    <label>ថ្នាក់គណ:កិត្តិយស</label>
                    <select wire:model.live="committee_level_id" class="form-control">
                        <option value="">ជ្រើសរើសថ្នាក់គណ:កិត្តិយស</option>
                        @foreach ($committee_levels as $committee_level)
                            <option wire:key="{{ $committee_level->id }}" value="{{ $committee_level->id }}">
                                {{ $committee_level->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if ($committee_level_id == 3)
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
                @endif
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
                            <h5 style="margin-bottom: 16px;">សមាជិក
                                @if ($filter_committee)
                                    {{ $filter_committee->kh_name }}
                                @endif
                            </h5>
                            <h5 style="margin-bottom: 0px;">
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
