<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">កែប្រែសមាជិកគណៈកិត្តិយស</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12 col-md-4 form-group">
                    <label>គោរមងារ
                        {{-- <span class="text-danger">*</span> --}}
                    </label>
                    <input wire:model="form.title" class="form-control" placeholder="សូមបញ្ចូលគោរមងារ">
                    {{-- @error('form.title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror --}}
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>ឈ្មោះ<span class="text-danger">*</span></label>
                    <input wire:model="form.kh_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះ">
                    @error('form.kh_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>ឈ្មោះឡាតាំង<span class="text-danger">*</span></label>
                    <input wire:model="form.en_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះឡាតាំង">
                    @error('form.en_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-4 form-group">
                    <label>ភេទ<span class="text-danger">*</span></label>
                    <select wire:model="form.gender_id" class="form-control">
                        <option value="">សូមជ្រើសរើសភេទ</option>
                        @foreach ($genders as $gender)
                            <option wire:key="{{ $gender->id }}" value="{{ $gender->id }}">
                                {{ $gender->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('form.gender_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>លេខទូរស័ព្ទ
                        {{-- <span class="text-danger">*</span> --}}
                    </label>
                    <input wire:model="form.phone_number" class="form-control" placeholder="សូមបញ្ចូលលេខទូរស័ព្ទ">
                    {{-- @error('form.phone_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror --}}
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>លំដាប់សមាជិក</label>
                    <input wire:model="form.member_position_order" class="form-control"
                        placeholder="សូមបញ្ចូលលំដាប់់តួនាទី">
                </div>
            </div>
            <div>
                <label>ទីកន្លែងកំណើត</label>
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ខេត្ត/រាជធានី
                            {{-- <span class="text-danger">*</span> --}}
                        </label>
                        <select wire:model.live="form.bp_province_id" class="form-control">
                            <option value="">សូមជ្រើសរើសខេត្ត/រាជធានី</option>
                            @foreach ($bp_provinces as $bp_province)
                                <option wire:key="{{ $bp_province->id }}" value="{{ $bp_province->id }}">
                                    {{ $bp_province->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        {{-- @error('form.bp_province_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ស្រុក/ខណ្ឌ
                            {{-- <span class="text-danger">*</span> --}}
                        </label>
                        <select wire:model.live="form.bp_district_id" class="form-control">
                            <option value="">សូមជ្រើសរើសស្រុក/ខណ្ឌ</option>
                            @foreach ($bp_districts as $bp_district)
                                <option wire:key="{{ $bp_district->id }}" value="{{ $bp_district->id }}">
                                    {{ $bp_district->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        {{-- @error('form.bp_district_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ឃុំ/សង្កាត់
                            {{-- <span class="text-danger">*</span> --}}
                        </label>
                        <select wire:model.live="form.bp_commune_id" class="form-control">
                            <option value="">សូមជ្រើសរើសឃុំ/សង្កាត់</option>
                            @foreach ($bp_communes as $bp_commune)
                                <option wire:key="{{ $bp_commune->id }}" value="{{ $bp_commune->id }}">
                                    {{ $bp_commune->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        {{-- @error('form.bp_commune_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ភូមិ
                            {{-- <span class="text-danger">*</span> --}}
                        </label>
                        <select wire:model="form.bp_village_id" class="form-control">
                            <option value="">សូមជ្រើសរើសភូមិ</option>
                            @foreach ($bp_villages as $bp_village)
                                <option wire:key="{{ $bp_village->id }}" value="{{ $bp_village->id }}">
                                    {{ $bp_village->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        {{-- @error('form.bp_village_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                    </div>
                </div>
            </div>
            <div>
                <label>លំនៅដ្ឋានបច្ចុប្បន្ន</label>
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ខេត្ត/រាជធានី
                            {{-- <span class="text-danger">*</span> --}}
                        </label>
                        <select wire:model.live="form.ad_province_id" class="form-control">
                            <option value="">សូមជ្រើសរើសខេត្ត/រាជធានី</option>
                            @foreach ($ad_provinces as $ad_province)
                                <option wire:key="{{ $ad_province->id }}" value="{{ $ad_province->id }}">
                                    {{ $ad_province->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        {{-- @error('form.ad_province_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ស្រុក/ខណ្ឌ
                            {{-- <span class="text-danger">*</span> --}}
                        </label>
                        <select wire:model.live="form.ad_district_id" class="form-control">
                            <option value="">សូមជ្រើសរើសស្រុក/ខណ្ឌ</option>
                            @foreach ($ad_districts as $ad_district)
                                <option wire:key="{{ $ad_district->id }}" value="{{ $ad_district->id }}">
                                    {{ $ad_district->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        {{-- @error('form.ad_district_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ឃុំ/សង្កាត់
                            {{-- <span class="text-danger">*</span> --}}
                        </label>
                        <select wire:model.live="form.ad_commune_id" class="form-control">
                            <option value="">សូមជ្រើសរើសឃុំ/សង្កាត់</option>
                            @foreach ($ad_communes as $ad_commune)
                                <option wire:key="{{ $ad_commune->id }}" value="{{ $ad_commune->id }}">
                                    {{ $ad_commune->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        {{-- @error('form.ad_commune_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ភូមិ
                            {{-- <span class="text-danger">*</span> --}}
                        </label>
                        <select wire:model="form.ad_village_id" class="form-control">
                            <option value="">សូមជ្រើសរើសភូមិ</option>
                            @foreach ($ad_villages as $ad_village)
                                <option wire:key="{{ $ad_village->id }}" value="{{ $ad_village->id }}">
                                    {{ $ad_village->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        {{-- @error('form.ad_village_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save mr-1"></i>
                កែប្រែ</button>
        </div>
    </form>
</div>

@script
    <script>
        $(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            });
        });
        $wire.on("update_fail", (event) => {
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
