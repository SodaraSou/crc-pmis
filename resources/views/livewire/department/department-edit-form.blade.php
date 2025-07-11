<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">កែប្រែនាយកដ្ឋាន</h3>
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
            <div class="form-group">
                <label>លំដាប់</label>
                <input wire:model="department_order" class="form-control" placeholder="សូមបញ្ចូលលំដាប់">
                @error('department_order')
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
        window.addEventListener("create_fail", () => {
            Swal.fire({
                title: "មានបញ្ហា!",
                text: "កែប្រែនាយកដ្ឋានមិនជោគជ័យ",
                icon: "error",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#dc3545"
            });
        });
    </script>
@endscript
