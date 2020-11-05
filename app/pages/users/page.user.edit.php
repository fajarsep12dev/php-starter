
<?php
    $getUser = $user->getUsers();
    foreach ($getUser as $data) {
?>
<form method="post">
<div class="modal fade" id="modal-edit<?php echo $data["user_id"]; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus Data User</h4>
            </div>
            <div class="modal-body">
            
            <input type="hidden" name="edit_user_id" value="<?php echo $data["user_id"] ?>">
                <div class="form-group"> 
                    <label>Nama Lengkap</label>
                    <input type="text" name="user_fullname" class="form-control" value="<?php echo $data["user_fullname"] ?>"/>
                </div>
                <div class="form-group"> 
                    <label>Username</label>
                    <input type="text" id="user_username" name="user_username" class="form-control" value="<?php echo $data["user_username"] ?>"/>
                </div>
                <div class="form-group"> 
                    <label>Email User</label>
                    <input type="email" id="user_email" name="user_email" class="form-control" value="<?php echo $data["user_email"] ?>"/>
                </div>
                <div class="form-group"> 
                    <label>Password</label>
                    <input type="password" id="user_password" name="user_password" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" name="ubah" class="btn btn-primary btn-sm">Update</button>
            </div>
        </div>
    </div>
</div>
</form>
<?php
    if(isset($_POST['ubah'])){
        @$user_id       = $_POST['edit_user_id'];
        @$user_fullname = $_POST['user_fullname'];
        @$user_username = $_POST['user_username'];
        @$user_password = $_POST['user_password'];
        @$user_email    = $_POST['user_email'];  

      $validasi = $user->checkUsername($user_username, $user_email);
      if($validasi == false){
        echo"<script>alert('Username atau Email sudah dipakai');</script>";
      }else{
        $user->updateUser($user_id, $user_fullname,$user_username,$user_password,$user_email);
      }
    }

?>
<?php } ?>
