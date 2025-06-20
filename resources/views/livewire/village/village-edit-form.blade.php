<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">កែប្រែឃុំ/សង្កាត់</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="form-group">
                <label>លេខកូដ</label>
                <input wire:model="code" class="form-control" placeholder="សូមបញ្ចូលលេខកូដ">
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>រាជធានី/ខេត្ត</label>
                <select wire:model="province_id" class="form-control" disabled>
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
            <div class="form-group">
                <label>ស្រុក/ខណ្ឌ</label>
                <select wire:model="district_id" class="form-control" disabled>
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
            <div class="form-group">
                <label>ឃុំ/សង្កាត់</label>
                <select wire:model="commune_id" class="form-control" disabled>
                    <option value="">សូមជ្រើសរើសស្រុក/ខណ្ឌ</option>
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
            <button type="submit" class="btn btn-info"><i class="fa fa-save mr-1"></i> កែប្រែ</button>
        </div>
    </form>
</div>

@script
    <script>
        window.addEventListener("create_fail", () => {
            Swal.fire({
                title: "មានបញ្ហា!",
                text: "កែប្រែភូមិមិនជោគជ័យ",
                icon: "error",
                confirmButtonText: "អូខេ",
                confirmButtonColor: "#dc3545"
            });
        });
    </script>
@endscript
