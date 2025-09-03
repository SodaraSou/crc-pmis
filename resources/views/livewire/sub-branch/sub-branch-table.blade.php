<div class="card card-solid">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h4>បញ្ជីអនុសាខា</h4>
            <a href="{{ route('sub-branch.create', $branch->id) }}" class="btn btn-success float-sm-right"><i
                    class="fa fa-plus mr-1"></i>
                បង្កើតអនុសាខាថ្មី</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($sub_branches as $sub_branch)
                <div wire:key="{{ $sub_branch->id }}"
                    class="col-12 col-md-6 col-xl-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>{{ $sub_branch->kh_name }}</b></h2>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{ asset('Cambodian_Red_Cross_Logo.png') }}" class="img-circle img-fluid"
                                        style="width: 120px; height: 120px;">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="{{ route('sub-branch.show', $sub_branch->id) }}"
                                    class="btn btn-sm btn-primary text-white"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('sub-branch.edit', $sub_branch->id) }}"
                                    class="btn btn-sm btn-info text-white"><i class="fa fa-pen"></i></a>
                                <button class="btn btn-sm btn-danger"
                                    wire:click="$dispatch('alert_delete', {sub_branch_id: {{ $sub_branch->id }}})">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- <div class="card card-primary">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">អនុសាខា</h3>
            <a href="{{ route('sub-branch.create', $branch) }}" class="btn btn-success"><i class="fa fa-plus mr-1"></i>
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
                @foreach ($sub_branches as $sub_branch)
                    <tr wire:key='{{ $sub_branch->id }}'>
                        <td>{{ $sub_branch->id }}</td>
                        <td>{{ $sub_branch->kh_name }}</td>
                        <td>{{ $sub_branch->en_name }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('sub-branch.show', $sub_branch->id) }}"
                                    class="btn btn-sm btn-primary text-white mr-2"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('sub-branch.edit', $sub_branch->id) }}"
                                    class="btn btn-sm btn-info text-white mr-2"><i class="fa fa-pen"></i></a>
                                <button class="btn btn-sm btn-danger"
                                    wire:click="$dispatch('alert_delete', {sub_branch_id: {{ $sub_branch->id }}})">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}

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
                        sub_branch_id: event.sub_branch_id
                    });
                }
            });
        });
        $wire.on("delete_success", () => {
            Swal.fire({
                title: "ជោគជ័យ",
                text: "លុបអនុសាខាជោគជ័យ",
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
