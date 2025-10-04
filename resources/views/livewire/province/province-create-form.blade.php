<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">បង្កើតរាជធានី/ខេត្ត</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-center mb-3">
                <div class="mr-4">
                    @if ($branch_img)
                        <img src="{{ $branch_img->temporaryUrl() }}" class="profile-user-img img-fluid img-circle">
                    @else
                        <img src="{{ asset('default-profile-img.jpg') }}" class="profile-user-img img-fluid img-circle">
                    @endif
                </div>
                <div>
                    <input wire:model="branch_img" type="file" class="form-control" placeholder="សូមបញ្ចូលរូបភាព">
                    @error('branch_img')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>លេខកូដ</label>
                <input wire:model="code" class="form-control" placeholder="សូមបញ្ចូលលេខកូដ">
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
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
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right"><i class="fa fa-save mr-1"></i> រក្សាទុក</button>
        </div>
    </form>
</div>

@script
    <script>
        $wire.on("create_fail", (event) => {
            Swal.fire({
                title: "មានបញ្ហា!",
                text: event.message,
                icon: "error",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#dc3545"
            });
        });
    </script>
@endscript
