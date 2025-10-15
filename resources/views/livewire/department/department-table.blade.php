<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">នាយកដ្ឋាន</h3>
            <a href="{{ route('department.create') }}" class="btn btn-success"><i class="fa fa-plus mr-1"></i>
                បង្កើត</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered text-nowrap">
            <thead>
                <tr>
                    <th>
                        លេខកូដ
                    </th>
                    <th>
                        ឈ្មោះខ្មែរ
                    </th>
                    <th>
                        ឈ្មោះឡាតាំង
                    </th>
                    <th class="text-center">សកម្មភាព</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr wire:key='{{ $department->id }}'>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->kh_name }}</td>
                        <td>{{ $department->en_name }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('department.show', $department->id) }}"
                                    class="btn btn-sm btn-primary text-white mr-2"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('department.edit', $department->id) }}"
                                    class="btn btn-sm btn-info mr-2"><i class="fa fa-pen"></i></a>
                                <button class="btn btn-sm btn-danger"
                                    wire:click="$dispatch('alert_delete', {department_id: {{ $department->id }}})">
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
                        department_id: event.department_id
                    });
                }
            });
        });
        $wire.on("delete_success", () => {
            Swal.fire({
                title: "ជោគជ័យ",
                text: "លុបនាយកដ្ឋានជោគជ័យ",
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
