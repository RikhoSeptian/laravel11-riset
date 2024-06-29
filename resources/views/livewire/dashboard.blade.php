<div class="row">
    <div class="col-6">
        <div class="card">
            @if (session('massage'))
                <div class="alert alert-success">{{ session('massage') }}</div>
            @endif
            
            <div class="card-header">
                <h3>Users</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>NIM</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }} {{ $user->gelar }}</td>
                                <td>{{ $user->nim }}</td>
                                <td>
                                    <button wire:click.prevent="edit({{ $user->id }})" class="btn btn-primary btn-sm">Edit</button>
                                    <button wire:click.prevent="destroy({{ $user->id }})" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No users Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group mb-3">
                        <label for="name">Nama :</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Enter Name" wire:model="name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="nim">NIM :</label>
                        <input type="nim" class="form-control @error('nim') is-invalid @enderror" id="nim"
                            placeholder="Enter NIM" wire:model="nim">
                        @error('nim')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="gelar">Gelar :</label>
                        <input type="gelar" class="form-control @error('gelar') is-invalid @enderror" id="gelar"
                            placeholder="Enter Gelar" wire:model="gelar">
                        @error('gelar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
                        <button wire:click.prevent="resetFields()" class="btn btn-secondary btn-block">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>