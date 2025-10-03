<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>អ្នកប្រើប្រាស់</h4>
        <a href="{{ route('user.create') }}" class="btn btn-success"><i class="fa fa-plus mr-1"></i>
            បង្កើត</a>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-3 form-group">
                    <label>ស្វែងរក</label>
                    <input wire:model.live.debounce.500ms="search" type="text" class="form-control"
                        placeholder="ស្វែងរក" />
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>
                            ល.រ
                        </th>
                        <th>
                            ឈ្មោះខ្មែរ
                        </th>
                        <th>
                            ឈ្មោះឡាតាំង
                        </th>
                        <th class="text-center">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr wire:key='{{ $user->id }}'>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->kh_name }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-primary mr-2">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-info mr-2">
                                        <i class="fa fa-pen" aria-hidden="true"></i>
                                    </a>
                                    {{-- <button class="btn btn-sm btn-danger"
                                    wire:click="$dispatch('alert-delete', {id: {{ $user->id }}})">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $users->links() }}
        </div>
    </div>
</div>
