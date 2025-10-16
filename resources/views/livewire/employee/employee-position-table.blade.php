<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">តួនាទីមន្រ្តីប្រតិបត្តិ</h3>
            <a href="{{ route('employee.position.create', Crypt::encrypt($employee->id)) }}" class="btn btn-success"><i
                    class="fa fa-plus mr-1"></i>
                បង្កើត</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ល.រ</th>
                    <th>
                        តួនាទី
                    </th>
                    <th>
                        កាលបរិចេ្ឆទចាប់ផ្តើម
                    </th>
                    <th>
                        កាលបរិចេ្ឆទបញ្ចប់
                    </th>
                    <th class="text-center">សកម្មភាព</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($positions as $position)
                    <tr wire:key='{{ $position->id }}'>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($position->female_kh_name)
                                {{ $position->position->female_kh_name }}
                            @else
                                {{ $position->position->male_kh_name }}
                            @endif
                        </td>
                        <td>{{ $position->start_date }}</td>
                        <td>{{ $position->end_date }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('employee.position.edit', [Crypt::encrypt($employee->id), Crypt::encrypt($position->id)]) }}"
                                    class="btn btn-sm btn-info mr-2">
                                    <i class="fa fa-pen" aria-hidden="true"></i>
                                </a>
                                <button class="btn btn-sm btn-danger"
                                    wire:click="$dispatch('alert_delete', {employee_position_id: {{ $position->id }}})">
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
                        employee_position_id: event.employee_position_id
                    });
                }
            });
        });
        $wire.on("delete_success", () => {
            Swal.fire({
                title: "ជោគជ័យ",
                text: "លុបតួនាទីមន្រ្តីប្រតិបត្តិជោគជ័យ",
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
