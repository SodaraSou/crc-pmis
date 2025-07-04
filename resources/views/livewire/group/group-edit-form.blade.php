<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">កែប្រែក្រុមអនុសាខា</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="form-group">
                <label>អនុសាខា</label>
                <select wire:model="sub_branch_id" class="form-control" disabled>
                    <option value="">សូមជ្រើសរើសអនុសាខា</option>
                    @foreach ($sub_branches as $branch)
                        <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                            {{ $branch->kh_name }}
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
                    @foreach ($communes as $district)
                        <option wire:key="{{ $district->id }}" value="{{ $district->id }}">
                            {{ $district->kh_name }}
                        </option>
                    @endforeach
                </select>
                @error('commune_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer text-right">
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
