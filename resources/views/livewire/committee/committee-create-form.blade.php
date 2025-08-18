<div class="card card-success">
    {{-- Stop trying to control. --}}
    <div class="card-header">
        <h3 class="card-title">បង្កើតគណៈកម្មាធិការ</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="form-group">
                <label>ឈ្មោះខ្មែរ</label>
                <input wire:model="kh_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះខ្មែរ">
                @error('kh_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>ឈ្មោះឡាតាំង</label>
                <input wire:model="en_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះឡាតាំង">
                @error('en_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label>សាខា</label>
                <select wire:model="branch_id" class="form-control">
                    <option value="">សូមជ្រើសរើសសាខា</option>
                    @foreach($branches as $branch)
                        <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                            {{ $branch->kh_name }}
                        </option>
                    @endforeach
                </select>
                @error('branch_id')
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
        window.addEventListener("create_fail", () => {
            Swal.fire({
                title: "មានបញ្ហា!",
                text: "បង្កើតគណៈកម្មាធិការមិនជោគជ័យ",
                icon: "error",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#dc3545"
            });
        });
    </script>
@endscript
