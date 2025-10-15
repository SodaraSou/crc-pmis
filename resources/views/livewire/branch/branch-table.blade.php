<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>សាខា​ 25 រាជធានី/ខេត្ត</h4>
        {{-- <a href="{{ route('branch.create') }}" class="btn btn-success float-sm-right"><i class="fa fa-plus mr-1"></i>
            បង្កើតថ្មី</a> --}}
    </div>
    <div class="row">
        @foreach ($branches as $branch)
            <div wire:key="{{ $branch->id }}" class="col-12 col-md-6">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>{{ $branch->kh_name }}</b></h2>
                                {{-- <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic
                                                Artist
                                                / Coffee Lover </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-building"></i></span> Address: Demo
                                                    Street
                                                    123, Demo City 04312, NJ</li>
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12
                                                    12 23
                                                    52</li>
                                            </ul> --}}
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{ asset('default.png') }}" class="img-thumbnail img-fluid"
                                    style="width: 120px; height: 120px;">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>Nicole Pearson</b></h2>
                                            <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic
                                                Artist
                                                / Coffee Lover </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-building"></i></span> Address: Demo
                                                    Street
                                                    123, Demo City 04312, NJ</li>
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12
                                                    12 23
                                                    52</li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar"
                                                class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div> --}}
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="{{ route('branch.show', $branch->id) }}"
                                class="btn btn-sm btn-primary text-white"><i class="fa fa-eye"></i></a>
                            {{-- <a href="{{ route('branch.edit', $branch->id) }}" class="btn btn-sm btn-info text-white"><i
                                    class="fa fa-pen"></i></a>
                            <button class="btn btn-sm btn-danger"
                                wire:click="$dispatch('alert_delete', {branch_id: {{ $branch->id }}})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- @script
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
                        branch_id: event.branch_id
                    });
                }
            });
        });
        $wire.on("delete_success", () => {
            Swal.fire({
                title: "ជោគជ័យ",
                text: "លុបសាខាជោគជ័យ",
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
@endscript --}}
