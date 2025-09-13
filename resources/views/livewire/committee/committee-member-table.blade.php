<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>តារាងគណ:កម្មាធិការ</h4>
        {{-- <a href="{{ route('term.create', ['branch_id' => $branch->id]) }}" class="btn btn-success">
            <i class="fa fa-plus mr-1"></i>
            បង្កើតថ្មី
        </a> --}}
    </div>
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>ល.រ</th>
                <th>ឈ្មោះខ្មែរ</th>
                <th>ឋាន:តួនាទី</th>
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
                    <td>{{ $committee_membership->kh_name }}</td>
                    <td>{{ $committee_membership->pivot->committee_position->kh_name }}</td>
                    <td>{{ $committee_membership->pivot->gov_position }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
