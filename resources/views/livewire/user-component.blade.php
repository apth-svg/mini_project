<div>
    <div class="card">

        <div class="card-header">
            <h5>City Manage</h5>
            <div style="float: right">
                <button class="btn btn-info btn-round" data-toggle="modal" data-target="#create_modalBox">Create</button>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no=0)
                      @foreach ($users as $user)
                           <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->role}}</td>
                            {{-- <td>
                                <button class="btn btn-success btn-round" data-toggle="modal" data-target="#edit_modalBox" wire:click="setData({{$item->id}})">Edit</button>
                                <button class="btn btn-danger btn-round" wire:click="deleteData({{$item->id}})">Delete</button>
                            </td> --}}
                        </tr>
                      @endforeach

                    </tbody>

                </table>
               
            </div>
        </div>
    </div>



      {{-- edit Modal --}}
      <div wire:ignore.self class="modal fade" id="edit_modalBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form  >
              <div class="modal-body">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" wire:model.lazy="email" class="form-control" id="email">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                  </div>
                    <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" wire:model.lazy="password" class="form-control" id="password">
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                  </div>
                   <div class="form-group">
                    <label for="role">Role</label>
                    <input type="role" wire:model.lazy="role" class="form-control" id="role">
                    @error('role') <span class="error">{{ $message }}</span> @enderror
                  </div>
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>


      {{-- create Modal --}}
      <div wire:ignore.self class="modal fade" id="create_modalBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form wire:submit.prevent='insertData()'>
              <div class="modal-body">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" wire:model.lazy="email" class="form-control" id="email">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                  </div>
                    <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" wire:model.lazy="password" class="form-control" id="password">
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                  </div>
                   <div class="form-group">
                    <label for="role">Role</label>
                    <input type="role" wire:model.lazy="role" class="form-control" id="role">
                    @error('role') <span class="error">{{ $message }}</span> @enderror
                  </div>
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <script>
         Livewire.on('done',  (type,msg) =>{
               $('#edit_modalBox').modal('hide');
               $('#create_modalBox').modal('hide');
              type=="success"?toastr.success(msg, 'Success!'):toastr.error(msg, 'Fail!')

          });
        </script>
</div>
