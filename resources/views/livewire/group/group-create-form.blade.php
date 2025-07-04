<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">បង្កើតក្រុមអនុសាខា</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="form-group">
                <label>អនុសាខា</label>
                <select wire:model="sub_branch_id" class="form-control" disabled>
                    <option value="">សូមជ្រើសរើសសាខា</option>
                    @foreach ($sub_branches as $sub_branch)
                        <option wire:key="{{ $sub_branch->id }}" value="{{ $sub_branch->id }}">
                            {{ $sub_branch->kh_name }}
                        </option>
                    @endforeach
                </select>
                @error('sub_branch_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>ឃុំ/សង្កាត់</label>
                <select wire:model="commune_id" class="form-control">
                    <option value="">សូមជ្រើសរើសឃុំ/សង្កាត់</option>
                    @foreach ($communes as $commune)
                        <option wire:key="{{ $commune->id }}" value="{{ $commune->id }}">
                            {{ $commune->kh_name }}
                        </option>
                    @endforeach
                </select>
                @error('commune_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer text-right">
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

