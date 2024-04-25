<div class="row justify-content-center mt-3 mb-3">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    {{ $title }}
                </div>
            </div>
            <div class="card-body">
                <form wire:submit="save">

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Doctor Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nip" class="col-md-4 col-form-label text-md-end text-start">Doctor NIP</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" wire:model="nip">
                            @if ($errors->has('nip'))
                                <span class="text-danger">{{ $errors->first('nip') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="sex" class="col-md-4 col-form-label text-md-end text-start">Sex</label>
                        <div class="col-md-6">
                          <select class="form-control" name="sex" @error('sex') is-invalid @enderror"  id="sex" wire:model="sex">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                          </select>
                            @if ($errors->has('sex'))
                                <span class="text-danger">{{ $errors->first('sex') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="specialist" class="col-md-4 col-form-label text-md-end text-start">Specialist</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('specialist') is-invalid @enderror" id="specialist" wire:model="specialist">
                            @if ($errors->has('specialist'))
                                <span class="text-danger">{{ $errors->first('specialist') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="phone" class="col-md-4 col-form-label text-md-end text-start">Phone</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" wire:model="phone">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" wire:model="email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <button type="submit" class="col-md-3 offset-md-5 btn btn-success">
                             Save
                        </button>
                    </div>

                    @if($isEdit)
                        <div class="mb-3 row">
                            <button wire:click="cancel" 
                                class="col-md-3 offset-md-5 btn btn-danger">
                                Cancel
                            </button>
                        </div>
                    @endif

                    <div class="mb-3 row"> 
                        <span wire:loading class="col-md-3 offset-md-5 text-primary">Processing...</span>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>