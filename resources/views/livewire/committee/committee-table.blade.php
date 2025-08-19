<div class="card card-primary">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">គណៈកម្មាធិការ</h3>
            <a href="{{ route('committee.create') }}" class="btn btn-success">
                <i class="fa fa-plus mr-1"></i>
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
                    <th class="text-center">
                        សកម្មភាព
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($committees as $committee)
                <tr wire:key='{{ $committee->id }}'>
                    <td>{{ $committee->id }}</td>
                    <td>{{ $committee->kh_name }}</td>
                    <td>{{ $committee->en_name }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
{{--                            <a href="{{ route('committee.create', $committee->id) }}" class="btn btn-sm btn-primary text-white mr-2">--}}
{{--                                <i class="fa fa-eye"></i>--}}
{{--                            </a>--}}
                            <a href="{{ route('committee.edit', $committee->id) }}" class="btn btn-sm btn-info text-white mr-2">
                                <i class="fa fa-pen"></i>
                            </a>
                            <button class="btn btn-sm btn-danger"
                                wire:click="$dispatch('alert_delete', {committee_id: {{ $committee->id }}})">
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
                        committee_id: event.detail.committee_id
                    });
                }
            })
        });
        window.addEventListener("delete_success", () => {
            Swal.fire({
                title: "ជោគជ័យ",
                text: "លុបគណៈកម្មាធិការជោគជ័យ",
                icon: "success",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#28a745"
            });
        });
        window.addEventListener("delete_fail", () => {
            Swal.fire({
                title: "មានបញ្ហា!",
                text: "លុបគណៈកម្មាធិការមិនជោគជ័យ",
                icon: "error",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#dc3545"
            });
        });
    </script>
@endscript

