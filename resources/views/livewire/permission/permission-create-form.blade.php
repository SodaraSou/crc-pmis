<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">បង្កើតមុខងារប្រព័ន្ធ</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ឈ្មោះឡាតាំង</label>
                    <input wire:model="name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះឡាតាំង">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>ឈ្មោះខ្មែរ</label>
                    <input wire:model="kh_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះខ្មែរ">
                    @error('kh_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success"><i class="fa fa-save mr-1"></i> រក្សាទុក</button>
        </div>
    </form>
</div>
@script
    <script>
        window.addEventListener("create_fail", event => {
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
