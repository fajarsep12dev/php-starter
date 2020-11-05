
<?php
    $getUser = $user->getUsers();
    foreach ($getUser as $data) {
?>
<form method="post">
<div class="modal fade" id="modal-delete<?php echo $data["user_id"]; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus Data User</h4>
            </div>
            <div class="modal-body">
            <input type="hidden" name="delete_user_id" value="<?php echo $data["user_id"] ?>">
                <b>Peringatan !</b><span>Apa anda yakin ingin menghapus user <span class="text text-danger"><?php echo $data['user_fullname'] ?></span></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" name="hapus" class="btn btn-primary btn-sm">Delete</button>
            </div>
        </div>
    </div>
</div>
</form>
<?php
    @$userid = $_POST['delete_user_id'];
    if(isset($_POST["hapus"])){
        $user->deleteUser($userid);
    }
?>

<?php } ?>



