<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>តារាងគណ:កិត្តិយសសាខា</h4>
        {{-- <a href="{{ route('term.create', ['branch_id' => $branch->id]) }}" class="btn btn-success">
            <i class="fa fa-plus mr-1"></i>
            បង្កើតថ្មី
        </a> --}}
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ល.រ</th>
                        <th>ឈ្មោះខ្មែរ</th>
                        <th>ប្រភេទគណៈកម្មការ</th>
                        <th>សាខា</th>
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
                            <td>{{ $committee_membership->committee_type->kh_name }}</td>
                            <td>{{ $committee_membership->branch->kh_name }}</td>
                            <td>{{ $committee_membership->pivot->committee_position->kh_name }}</td>
                            <td>{{ $committee_membership->pivot->gov_position }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('employee.show', Crypt::encrypt($member->id)) }}"
                                        class="btn btn-sm btn-primary mr-2">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('employee.edit', Crypt::encrypt($member->id)) }}"
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
    </div>
</div>
