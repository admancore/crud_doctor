<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        @include('livewire.uporcr')

        <div class="card">
            <div class="card-header">Doctor List</div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Specialist</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($doctors as $doctor)
                            <tr wire:key="{{ $doctor->id }}">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->nip }}</td>
                                <td>{{ $doctor->sex }}</td>
                                <td>{{ $doctor->specialist }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->email }}</td>
                                <td>
                                    <button wire:click="edit({{ $doctor->id }})" 
                                        class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>   

                                    <button wire:click="delete({{ $doctor->id }})" 
                                        wire:confirm="Are you sure you want to delete this doctor?"
                                        class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <span class="text-danger">
                                        <strong>No Doctor Found!</strong>
                                    </span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <livewire:bulk-insert-doctors />
    </div>    
</div>

