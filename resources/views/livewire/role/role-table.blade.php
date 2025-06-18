<div class="card card-primary">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">តួនាទី</h3>
            <a href="{{ route('role.create') }}" class="btn btn-success"><i class="fa fa-plus mr-1"></i>
                បង្កើតថ្មី</a>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <input wire:model.live.debounce.500ms="search" type="text" class="form-control"
                    placeholder="ស្វែងរកតួនាទី" />
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
                @foreach ($roles as $role)
                    <tr wire:key='{{ $role->id }}'>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('role.edit', $role->id) }}"
                                    class="btn btn-sm btn-warning text-white mr-2"><i class="fa fa-pen"></i></a>
                                <button class="btn btn-sm btn-danger"
                                    wire:click="$dispatch('alert_delete', {role_id: {{ $role->id }}})">
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
        {{ $roles->links() }}
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
                        role_id: event.detail.role_id
                    });
                }
            });
        });
        window.addEventListener("delete_success", () => {
            Swal.fire({
                title: "ជោគជ័យ",
                text: "លុបតួនាទីជោគជ័យ",
                icon: "success",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#28a745"
            });
        });
        window.addEventListener("delete_fail", () => {
            Swal.fire({
                title: "មានបញ្ហា!",
                text: "លុបតួនាទីមិនជោគជ័យ",
                icon: "error",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#dc3545"
            });
        });
    </script>
@endscript
