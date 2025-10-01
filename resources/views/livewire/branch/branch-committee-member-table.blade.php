<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>តារាងគណ:កម្មាធិការ</h4>
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
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ល.រ</th>
                        <th>ឈ្មោះខ្មែរ</th>
                        <th>ឋាន:តួនាទី</th>
                        <th>តួនាទី​ កក្រក</th>
                        <th class="text-center">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr wire:key='{{ $member->id }}'>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->kh_name }}</td>
                            @php
                                $committee_membership = $member->committees->first();
                                // $current_membership = $member->committee_members()->where('active', true)->where()
                            @endphp
                            <td>{{ $committee_membership->pivot->gov_position }}</td>
                            <td>{{ $committee_membership->pivot->committee_position->kh_name }}</td>
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
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $members->links() }}
        </div>
    </div>
</div>
