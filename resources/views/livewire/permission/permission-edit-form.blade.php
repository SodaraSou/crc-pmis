<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">កែប្រែមុខងារប្រព័ន្ធ</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="form-group">
                <label>ឈ្មោះ</label>
                <input wire:model="name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះ">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning"><i class="fa fa-save mr-1"></i> កែប្រែ</button>
        </div>
    </form>
</div>

@script
    <script>
        window.addEventListener("update_fail", () => {
            Swal.fire({
                title: "មានបញ្ហា!",
                text: "កែប្រែមុខងារក្នុងប្រព័ន្ធមិនជោគជ័យ",
                icon: "error",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#dc3545"
            });
        });
    </script>
@endscript
