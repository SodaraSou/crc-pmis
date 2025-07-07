<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">បង្កើតបុគ្គលិក</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ឈ្មោះ<span class="text-danger">*</span></label>
                    <input wire:model="form.kh_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះ">
                    @error('form.kh_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>ឈ្មោះឡាតាំង<span class="text-danger">*</span></label>
                    <input wire:model="form.en_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះឡាតាំង">
                    @error('form.en_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
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
                <div class="col-12 col-md-6 form-group">
                    <label>ថ្ងៃ/ខែ/ឆ្នាំកំណើត<span class="text-danger">*</span></label>
                    <div>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input id="dob" wire:model="form.dob" type="text"
                                   class="form-control datetimepicker-input" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    @error('form.dob')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ស្ថានភាពគ្រួសារ<span class="text-danger">*</span></label>
                    <select wire:model="form.family_situation_id" class="form-control">
                        <option value="">សូមជ្រើសរើសស្ថានភាពគ្រួសារ</option>
                        @foreach ($family_situations as $family_situation)
                            <option wire:key="{{ $family_situation->id }}" value="{{ $family_situation->id }}">
                                {{ $family_situation->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('form.family_situation_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>លេខអត្តសញ្ញាណប័ណ្ខ<span class="text-danger">*</span></label>
                    <input wire:model="form.national_id" class="form-control" placeholder="សូមបញ្ចូលលេខអត្តសញ្ញាណប័ណ្ខ">
                    @error('form.national_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ស្ថានភាពបុគ្គលិក<span class="text-danger">*</span></label>
                    <select wire:model="form.employee_status_id" class="form-control">
                        <option value="">សូមជ្រើសរើសស្ថានភាពបុគ្គលិក</option>
                        @foreach ($employee_statuses as $employee_status)
                            <option wire:key="{{ $employee_status->id }}" value="{{ $employee_status->id }}">
                                {{ $employee_status->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('form.employee_status_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>លេខទូរស័ព្ទ<span class="text-danger">*</span></label>
                    <input wire:model="form.phone_number" class="form-control" placeholder="សូមបញ្ចូលលេខទូរស័ព្ទ">
                    @error('form.phone_number')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>អុីម៉ែល<span class="text-danger">*</span></label>
                    <input wire:model="form.email" class="form-control" placeholder="សូមបញ្ចូលអុីម៉ែល">
                    @error('form.email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>រូបភាព<span class="text-danger">*</span></label>
                    <input wire:model="form.profile_img" type="file" class="form-control"
                           placeholder="សូមបញ្ចូលរូបភាព">
                    @error('form.profile_img')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label>ទីកន្លែងកំណើត</label>
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ខេត្ត/រាជធានី<span class="text-danger">*</span></label>
                        <select wire:model.live="form.bp_province_id" class="form-control">
                            <option value="">សូមជ្រើសរើសខេត្ត/រាជធានី</option>
                            @foreach ($bp_provinces as $bp_province)
                                <option wire:key="{{ $bp_province->id }}" value="{{ $bp_province->id }}">
                                    {{ $bp_province->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('form.bp_province_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ស្រុក/ខណ្ឌ<span class="text-danger">*</span></label>
                        <select wire:model.live="form.bp_district_id" class="form-control">
                            <option value="">សូមជ្រើសរើសស្រុក/ខណ្ឌ</option>
                            @foreach ($bp_districts as $bp_district)
                                <option wire:key="{{ $bp_district->id }}" value="{{ $bp_district->id }}">
                                    {{ $bp_district->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('form.bp_district_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ឃុំ/សង្កាត់<span class="text-danger">*</span></label>
                        <select wire:model.live="form.bp_commune_id" class="form-control">
                            <option value="">សូមជ្រើសរើសឃុំ/សង្កាត់</option>
                            @foreach ($bp_communes as $bp_commune)
                                <option wire:key="{{ $bp_commune->id }}" value="{{ $bp_commune->id }}">
                                    {{ $bp_commune->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('form.bp_commune_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ភូមិ<span class="text-danger">*</span></label>
                        <select wire:model="form.bp_village_id" class="form-control">
                            <option value="">សូមជ្រើសរើសភូមិ</option>
                            @foreach ($bp_villages as $bp_village)
                                <option wire:key="{{ $bp_village->id }}" value="{{ $bp_village->id }}">
                                    {{ $bp_village->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('form.bp_village_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <label>លំនៅដ្ឋានបច្ចុប្បន្ន</label>
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ខេត្ត/រាជធានី<span class="text-danger">*</span></label>
                        <select wire:model.live="form.ad_province_id" class="form-control">
                            <option value="">សូមជ្រើសរើសខេត្ត/រាជធានី</option>
                            @foreach ($ad_provinces as $ad_province)
                                <option wire:key="{{ $ad_province->id }}" value="{{ $ad_province->id }}">
                                    {{ $ad_province->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('form.ad_province_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ស្រុក/ខណ្ឌ<span class="text-danger">*</span></label>
                        <select wire:model.live="form.ad_district_id" class="form-control">
                            <option value="">សូមជ្រើសរើសស្រុក/ខណ្ឌ</option>
                            @foreach ($ad_districts as $ad_district)
                                <option wire:key="{{ $ad_district->id }}" value="{{ $ad_district->id }}">
                                    {{ $ad_district->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('form.ad_district_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ឃុំ/សង្កាត់<span class="text-danger">*</span></label>
                        <select wire:model.live="form.ad_commune_id" class="form-control">
                            <option value="">សូមជ្រើសរើសឃុំ/សង្កាត់</option>
                            @foreach ($ad_communes as $ad_commune)
                                <option wire:key="{{ $ad_commune->id }}" value="{{ $ad_commune->id }}">
                                    {{ $ad_commune->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('form.ad_commune_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label>ភូមិ<span class="text-danger">*</span></label>
                        <select wire:model="form.ad_village_id" class="form-control">
                            <option value="">សូមជ្រើសរើសភូមិ</option>
                            @foreach ($ad_villages as $ad_village)
                                <option wire:key="{{ $ad_village->id }}" value="{{ $ad_village->id }}">
                                    {{ $ad_village->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('form.ad_village_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-4 form-group">
                    <label>លេខផ្លូវ</label>
                    <input wire:model="form.ad_street_number" class="form-control" placeholder="សូមបញ្ចូលលេខផ្លូវ">
                    @error('form.ad_street_number')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>ឈ្មោះផ្លូវ</label>
                    <input wire:model="form.ad_street_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះផ្លូវ">
                    @error('form.ad_street_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>ផ្ទះលេខ</label>
                    <input wire:model="form.ad_house_number" class="form-control" placeholder="សូមបញ្ចូលផ្ទះលេខ">
                    @error('form.ad_house_number')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ថ្នាក់បុគ្គលិក<span class="text-danger">*</span></label>
                    <select wire:model.live="form.employee_level_id" class="form-control">
                        <option value="">សូមជ្រើសរើសថ្នាក់បុគ្គលិក</option>
                        @foreach ($user_levels as $user_level)
                            @if($user_level->id == 1 && Auth::user()->user_level_id > 1 || $user_level->id < 3 && Auth::user()->user_level_id == 3)
                                @continue
                            @endif
                            <option wire:key="{{ $user_level->id }}" value="{{ $user_level->id }}">
                                {{ $user_level->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('form.employee_level_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>សាខា<span class="text-danger">*</span></label>
                    @if(Auth::user()->user_level_id == 2 || Auth::user()->user_level_id == 3)
                        <select wire:model.live="form.branch_id" class="form-control" disabled>
                            <option value="">សូមជ្រើសរើសសាខា</option>
                            @foreach ($branches as $branch)
                                <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                                    {{ $branch->kh_name }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <select wire:model.live="form.branch_id" class="form-control">
                            <option value="">សូមជ្រើសរើសសាខា</option>
                            @foreach ($branches as $branch)
                                <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                                    {{ $branch->kh_name }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                    @error('form.branch_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    @if ($form->employee_level_id == 3 || $form->employee_level_id == 4)
                        <label>អនុសាសា<span class="text-danger">*</span></label>
                    @else
                        <label>អនុសាសា</label>
                    @endif
                    @if(Auth::user()->user_level_id == 3)
                        <select wire:model="form.sub_branch_id" class="form-control" disabled>
                            <option value="">សូមជ្រើសរើសអនុសាខា</option>
                            @foreach ($sub_branches as $sub_branch)
                                <option wire:key="{{ $sub_branch->id }}" value="{{ $sub_branch->id }}">
                                    {{ $sub_branch->kh_name }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <select wire:model.live="form.sub_branch_id" class="form-control">
                            <option value="">សូមជ្រើសរើសអនុសាខា</option>
                            @foreach ($sub_branches as $sub_branch)
                                <option wire:key="{{ $sub_branch->id }}" value="{{ $sub_branch->id }}">
                                    {{ $sub_branch->kh_name }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                    @error('form.sub_branch_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    @if ($form->employee_level_id == 4)
                        <label>ក្រុមអនុសាខា<span class="text-danger">*</span></label>
                    @else
                        <label>ក្រុមអនុសាខា</label>
                    @endif
                    <select wire:model="form.group_id" class="form-control">
                        <option value="">សូមជ្រើសរើសក្រុមអនុសាខា</option>
                        @foreach ($groups as $sub_branch)
                            <option wire:key="{{ $sub_branch->id }}" value="{{ $sub_branch->id }}">
                                {{ $sub_branch->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('form.group_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>នាយកដ្ឋាន<span class="text-danger">*</span></label>
                    <select wire:model.live="form.department_id" class="form-control">
                        <option value="">សូមជ្រើសរើសនាយកដ្ឋាន</option>
                        @foreach ($departments as $department)
                            <option wire:key="{{ $department->id }}" value="{{ $department->id }}">
                                {{ $department->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('form.department_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>ការិយាល័យ</label>
                    <select wire:model="form.office_id" class="form-control">
                        <option value="">សូមជ្រើសរើសការិយាល័យ</option>
                        @foreach ($offices as $office)
                            <option wire:key="{{ $office->id }}" value="{{ $office->id }}">
                                {{ $office->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('form.office_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save mr-1"></i> រក្សាទុក</button>
        </div>
    </form>
</div>
@script
<script>
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#reservationdate').on('change.datetimepicker', function () {
        $wire.set('form.dob', $('#dob').val());
    });
    // window.addEventListener("create_fail", event => {
    //     Swal.fire({
    //         title: "មានបញ្ហា!",
    //         text: event.detail.message,
    //         icon: "error",
    //         confirmButtonText: "អូខេ",
    //         confirmButtonColor: "#dc3545"
    //     });
    // });
    $wire.on('create_fail', (event) => {
        Swal.fire({
            title: "មានបញ្ហា!",
            text: event.detail.message,
            icon: "error",
            confirmButtonText: "អូខេ",
            confirmButtonColor: "#dc3545"
        });
    })
</script>
@endscript
