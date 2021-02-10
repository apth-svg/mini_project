<div>
     <div class="card">
        <div class="card-header">
            <h5>Detail Message</h5>
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
                            <th>Letter</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Detail</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                </table>
            </div>
        </div>
    </div>

     {{-- create Modal --}}
    <div  class="modal fade" id="create_modalBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <form >
                <div class="modal-body">
                    <div class="form-group">
                      <label for="">Letter No</label>
                      <input type="number" name="letter_no" class="form-control" placeholder="Enter Letter No" >
                    </div>
                     <div class="form-group">
                      <label for="">Date</label>
                      <input type="date" name="date" class="form-control">
                    </div>
                     <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" name="title" class="form-control">
                    </div>
                     <div class="form-group">
                      <label for="">Detail</label>
                      <textarea name="detail" class="form-control"></textarea>
                    </div>
                     <div class="form-group">
                      <label for="">User</label>
                        <select name="" class="form-control">
                            <option value="">Select</option>
                            <option value="">User</option>
                            <option value="">Admin</option>
                        </select>
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
            Livewire.on('done', (type,msg) => {
            $('#create_modalBox').modal('hide');
        })
    </script>
</div>
