<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" style="width:50%s">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ubah Password</h4>
                </div>
                <div class="modal-body">
                    <form action="updatePassword.php" method="POST" id="ubahPassword">
                        Password Lama :<input type="password" class="form-control" name="password_lama" placeholder="Password Lama">
                        Password Baru :<input type="password" class="form-control" name="password_baru" placeholder="Password Baru">
                        <input type="submit" value="Simpan" name="simpan" style="width:100%;margin-top:24px">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>