<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">កែប្រែអនុសាខា</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="form-group">
                <label>សាខា</label>
                <select wire:model="branch_id" class="form-control" disabled>
                    <option value="">សូមជ្រើសរើសសាខា</option>
                    @foreach ($branches as $branch)
                        <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                            {{ $branch->kh_name }}
                        </option>
                    @endforeach
                </select>
                @error('branch_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>ស្រុក/ខណ្ឌ</label>
                <select wire:model="district_id" class="form-control">
                    <option value="">សូមជ្រើសរើសស្រុក/ខណ្ឌ</option>
                    @foreach ($districts as $district)
                        <option wire:key="{{ $district->id }}" value="{{ $district->id }}">
                            {{ $district->kh_name }}
                        </option>
                    @endforeach
                </select>
                @error('district_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info"><i class="fa fa-save mr-1"></i> កែប្រែ</button>
        </div>
    </form>
</div>

@script
    <script>
        window.addEventListener("update_fail", (event) => {
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
