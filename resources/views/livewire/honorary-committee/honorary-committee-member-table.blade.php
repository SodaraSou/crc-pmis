<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>តារាងសមាជិកគណៈកិត្តិយស</h4>
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
                <div class="col-12 col-md-3 form-group">
                    <label></label>
                    <select wire:model.live="committee_level_id" class="form-control">
                        <option value="">ជ្រើសរើសថ្នាក់គណ:កិត្តិយស</option>
                        @foreach ($committee_levels as $committee_level)
                            <option wire:key="{{ $committee_level->id }}" value="{{ $committee_level->id }}">
                                {{ $committee_level->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="col-12 col-md-3 form-group">
                    <label>ចំនួនមួយទំព័រ</label>
                    <select wire:model.live='per_page' class="form-control">
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                    </select>
                </div> --}}
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ល.រ</th>
                        <th>ឈ្មោះខ្មែរ</th>
                        <th>សាខា/អនុសាខា</th>
                        <th>ឋាន:តួនាទី</th>
                        <th>តួនាទី​ កក្រក</th>
                        <th class="text-center">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr wire:key='{{ $member->id }}'>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->kh_name }}</td>
                            @php
                                $committee_membership = $member->committees->first();
                            @endphp
                            <td>{{ $committee_membership->branch->kh_name }}</td>
                            <td>{{ $committee_membership->pivot->committee_position->kh_name }}</td>
                            <td>{{ $committee_membership->pivot->gov_position }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('honorary-committee-member.show', $member->id) }}"
                                        class="btn btn-sm btn-primary mr-2">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('honorary-committee-member.edit', $member->id) }}"
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
        <div class="card-footer">{{ $members->links() }}</div>
    </div>
</div>
