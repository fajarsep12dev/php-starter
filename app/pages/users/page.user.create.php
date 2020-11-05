<div id="modal-add" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah User </h4>
            </div>
            <div class="modal-body">
                <div id="addvalidator">

          <form method="post" id="user-input">
                <div class="hidden form-group">
                    <label>id</label>
                    <input type="text" id="user_id" name="user_id" class="form-control" value="0" required/>
                </div>
                <div class="form-group"> 
                    <label>Nama Lengkap</label>
                    <input type="text" id="user_fullname" name="user_fullname" class="form-control" required/>
                </div>
                <div class="form-group"> 
                    <label>Username</label>
                    <input type="text" id="user_username" name="user_username" class="form-control" required/>
                </div>
                <div class="form-group"> 
                    <label>Email User</label>
                    <input type="email" id="user_email" name="user_email" class="form-control" required/>
                </div>
                <div class="form-group"> 
                    <label>Password</label>
                    <input type="password" id="user_password" name="user_password" class="form-control" required/>
                </div>
          </form>
          </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btn-post" class="k-button btn-primary pull-left margin-r-5">Save</button>
                <button type="button" class="k-button btn-warning" data-dismiss="modal">Close</button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
