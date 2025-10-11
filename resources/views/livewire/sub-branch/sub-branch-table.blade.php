<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>តារាងអនុសាខា</h4>
        {{-- @if ($user->hasRole('System Manager'))
            <a href="{{ route('sub-branch.create', $branch->id) }}" class="btn btn-success"><i class="fa fa-plus mr-1"></i>
                បង្កើតអនុសាខាថ្មី</a>
        @endif --}}
    </div>
    <div class="row">
        @foreach ($sub_branches as $sub_branch)
            <div wire:key="{{ $sub_branch->id }}" class="col-12 col-md-6">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>{{ $sub_branch->kh_name }}</b></h2>
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{ asset('default.png') }}" class="img-thumbnail img-fluid"
                                    style="width: 120px; height: 120px;">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="{{ route('sub-branch.show', $sub_branch->id) }}"
                                class="btn btn-sm btn-primary text-white"><i class="fa fa-eye"></i></a>
                            {{-- <a href="{{ route('sub-branch.edit', $sub_branch->id) }}"
                                class="btn btn-sm btn-info text-white"><i class="fa fa-pen"></i></a>
                            <button class="btn btn-sm btn-danger"
                                wire:click="$dispatch('alert_delete', {sub_branch_id: {{ $sub_branch->id }}})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
