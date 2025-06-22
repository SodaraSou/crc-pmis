<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">បង្កើតសាខា</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="form-group">
                <label>រាជធានី/ខេត្ត</label>
                <select wire:model="province_id" class="form-control">
                    <option value="">សូមជ្រើសរើសខេត្ត</option>
                    @foreach ($provinces as $province)
                        <option wire:key="{{ $province->id }}" value="{{ $province->id }}">
                            {{ $province->kh_name }}
                        </option>
                    @endforeach
                </select>
                @error('province_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success"><i class="fa fa-save mr-1"></i> រក្សាទុក</button>
        </div>
    </form>
</div>

@script
    <script>
        window.addEventListener("create_fail", (event) => {
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
