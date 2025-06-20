<div class="card card-primary">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">មុខងារប្រព័ន្ធ</h3>
            <a href="{{ route('permission.create') }}" class="btn btn-success"><i class="fa fa-plus mr-1"></i>
                បង្កើតថ្មី</a>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <input wire:model.live.debounce.500ms="search" type="text" class="form-control"
                    placeholder="ស្វែងរកមុខងារ" />
            </div>
            <div>
                <select wire:model.live='per_page' class="form-control mr-2">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        ឈ្មោះ
                    </th>
                    <th class="text-center">សកម្មភាព</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr wire:key='{{ $permission->id }}'>
                        <td>{{ $permission->id }}</td>
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
@script
    <script>
        window.addEventListener("alert_delete", (event) => {
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
                        permission_id: event.detail.permission_id
                    });
                }
            });
        });
        window.addEventListener("delete_success", () => {
            Swal.fire({
                title: "ជោគជ័យ",
                text: "លុបមុខងារប្រព័ន្ធជោគជ័យ",
                icon: "success",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#28a745"
            });
        });
        window.addEventListener("delete_fail", () => {
            Swal.fire({
                title: "មានបញ្ហា!",
                text: "លុបមុខងារប្រព័ន្ធមិនជោគជ័យ",
                icon: "error",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#dc3545"
            });
        });
    </script>
@endscript
