<div class="card card-primary">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">អ្នកប្រើប្រាស់</h3>
            <a href="{{ route('user.create') }}" class="btn btn-success"><i class="fa fa-plus mr-1"></i>
                បង្កើត</a>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <input wire:model.live.debounce.500ms="search" type="text" class="form-control"
                    placeholder="ស្វែងរកអ្នកប្រើប្រាស់" />
            </div>
            <div>
                <select wire:model.live='per_page' class="form-control mr-2">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        ឈ្មោះ
                    </th>
                    <th class="text-center">សកម្មភាព</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr wire:key='{{ $user->id }}'>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-primary mr-2">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
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
