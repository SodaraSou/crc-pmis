<div class="card card-primary">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">ក្រុមអនុសាខា</h3>
            <a href="{{ route('group.create', $sub_branch) }}" class="btn btn-success"><i class="fa fa-plus mr-1"></i>
                បង្កើតថ្មី</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover text-nowrap">
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
            @foreach ($groups as $group)
                <tr wire:key='{{ $group->id }}'>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->kh_name }}</td>
                    <td>{{ $group->en_name }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            {{--                            <a href="{{ route('sub-branch.show', $sub_branch->id) }}"--}}
                            {{--                               class="btn btn-sm btn-primary text-white mr-2"><i class="fa fa-eye"></i></a>--}}
                            <a href="{{ route('group.edit', $group->id) }}"
                               class="btn btn-sm btn-info text-white mr-2"><i class="fa fa-pen"></i></a>
                            <button class="btn btn-sm btn-danger"
                                    wire:click="$dispatch('alert_delete', {group_id: {{ $group->id }}})">
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
                    group_id: event.detail.group_id
                });
            }
        });
    });
    window.addEventListener("delete_success", () => {
        Swal.fire({
            title: "ជោគជ័យ",
            text: "លុបអនុសាខាជោគជ័យ",
            icon: "success",
            confirmButtonText: "អូខេ",
            confirmButtonColor: "#28a745"
        });
    });
    window.addEventListener("delete_fail", (event) => {
        Swal.fire({
            title: "មានបញ្ហា!",
            text: event.detail.message,
            icon: "error",
            confirmButtonText: "អូខេ",
            confirmButtonColor: "#dc3545"
        });
    });
</script>
@endscript
