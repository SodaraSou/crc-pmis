<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">អាណត្តិសមាជិក</h3>
            <a href="{{ route('committee-member.term-add', $member->id) }}" class="btn btn-success">
                <i class="fa fa-plus mr-1"></i>
                បង្កើត
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered text-nowrap">
            <thead>
                <tr>
                    <th>ល.រ</th>
                    <th>ឈ្មោះខ្មែរ</th>
                    <th>សាខា/អនុសាខា</th>
                    <th>តួនាទី​ កក្រក</th>
                    <th class="text-center">សកម្មភាព</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($terms as $term)
                    <tr wire:key='{{ $term->id }}'>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($term->branch_term_id)
                                {{ $term->branch_term->kh_name }}
                            @elseif ($term->sub_branch_term_id)
                                {{ $term->sub_branch_term->kh_name }}
                            @endif
                        </td>
                        <td>
                            {{ $term->committee->kh_name }}
                        </td>
                        <td>
                            {{ $term->committee_position->kh_name }}
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-sm btn-danger"
                                    wire:click="$dispatch('alert_delete', {committee_member_id: {{ $term->id }}})">
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
                        committee_member_id: event.committee_member_id
                    });
                }
            });
        });
        $wire.on("delete_success", () => {
            Swal.fire({
                title: "ជោគជ័យ",
                text: "លុបអាណត្តិសមាជិកជោគជ័យ",
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
