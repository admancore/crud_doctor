<div>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Bulk Insert
            </div>
        </div>
        <div class="card-body">
            <input class="form-control" type="file" wire:model="file">
            <button class="btn btn-success" wire:click="import">Import</button>
        </div>
    </div>
    
</div>
