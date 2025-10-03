<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>មុខងារប្រព័ន្ធ</h4>
        <a href="{{ route('permission.create') }}" class="btn btn-success"><i class="fa fa-plus mr-1"></i>
            បង្កើត</a>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-3 form-group">
                    <label>ស្វែងរក</label>
                    <input wire:model.live.debounce.500ms="search" type="text" class="form-control"
                        placeholder="ស្វែងរក" />
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>
                            ល.រ
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
                    @foreach ($permissions as $permission)
                        <tr wire:key='{{ $permission->id }}'>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->kh_name }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('permission.edit', $permission->id) }}"
                                        class="btn btn-sm btn-info mr-2"><i class="fa fa-pen"></i></a>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="$dispatch('alert_delete', {permission_id: {{ $permission->id }}})">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $permissions->links() }}
        </div>
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
                        permission_id: event.permission_id
                    });
                }
            });
        });
        $wire.on("delete_success", () => {
            Swal.fire({
                title: "ជោគជ័យ",
                text: "លុបមុខងារប្រព័ន្ធជោគជ័យ",
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
