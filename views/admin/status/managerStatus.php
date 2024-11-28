<div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div>
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>Quản lí trạng thái</th>
                </tr>
            </thead>
        </table>
        <form action="" method="post">
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <!-- <th>Chọn</th> -->
                        <th>Mã trạng thái</th>
                        <th>Tên trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody> 
                    <?php foreach($listStatus as $Status => $status) : ?>
                        <tr>
                            <td><?php echo $status -> StatusID ?></td>
                            <td><?php echo $status -> NameStatus ?></td>
                            <td>
                              <a href="?action=updateStatus&&UpdateStatusID=<?php echo $status -> StatusID ?>" class="btn btn-primary my-1"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ; ?>
                </tbody>
                
            </table>
            <!-- <tr>
                <a class="btn open_checked button-admin">Chọn tất cả</a>
                <a class="btn close_checked mx-2 button-admin">Bỏ chọn tất cả</a>
                <button type="submit" class="btn delete_checked button-admin" onclick="return confirm('Bạn chắc chắn xóa chứ ?');" name="delete_checked_status">Xóa mục đã chọn</button>
                <a class="btn mx-2 button-admin" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm mới</a>
            </tr> -->
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm trạng thái</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateAddStatus();">
        <div class="modal-body">
          <div class="form-group">
            <label for="" style="font-weight:500;">Tên trạng thái</label> <span id="status_name_err" style="color:red;font-size:14px;"></span>
            <input type="text" class="form-control my-2" id="status_name" name="name-status">
          </div>
        </div>
          
        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" value="Nhập lại">
          <button type="submit" class="btn" name="btn-add-status" style="background-color:#86B817;color:white;">Thêm mới</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  const status_name_err = document.getElementById('status_name_err') ;
  const status_name = document.getElementById('status_name') ;
  function validateAddStatus() {
    let checkStatus = true ;
    if(status_name.value.trim() == "") {
      status_name_err.innerText = "Hãy nhập trạng thái" ;
      checkStatus = false ;
    }else {
      status_name_err.innerText = "" ;
    }
    return checkStatus ;
  }
</script>