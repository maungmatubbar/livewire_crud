<div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Edit Student</h5>
                            <a href="{{ route('students') }}" class="btn btn-primary">Student List</a>
                        </div>
                        @if (Session::has('message'))
                            <div class="alert alert-success alert-dismissible">{{ Session::get('message') }}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent='updateStudent'>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" wire:model="name" class="form-control" placeholder="Enter Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" wire:model="email" class="form-control" placeholder="Enter Email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" wire:model="phone" class="form-control" placeholder="Enter Phone">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" class="btn btn-primary rounded-0" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
