
<div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div>
    <table class="table">
      <thead class="table-success">
          <tr>
              <th>Quản lí đặt phòng</th>
          </tr>
      </thead>
  </table>
  <form action="" method="post">
      <table class="table table-hover">
          <thead class="table-success">
              <tr>
                  <th>Mã đặt</th>
                  <th>Tên KS</th>
                  <th>Tên phòng</th>
                  <th>Email</th>
                  <th>Ngày đặt</th>
                  <th>Ngày vào</th>
                  <th>Ngày ra</th>
                  <th>Giá</th>
                  <th>Tổng tiền</th>
                  <th>Trạng thái</th>
                  
              </tr>
          </thead>

          <tbody>
            <?php foreach($listReservation as $Reservations => $Reservation) : ?>
                <tr>
                    <td><?php echo $Reservation -> ReservationID ?></td>
                    <td><?php echo $Reservation -> NameHotel ?></td>
                    <td><?php echo $Reservation -> RoomName ?></td>
                    <td><?php echo $Reservation -> Email ?></td>
                    <td><?php echo $Reservation -> ReservationDate ?></td>
                    <td><?php echo $Reservation -> Check_In_Date ?></td>
                    <td><?php echo $Reservation -> Check_Out_Date ?></td>
                    <td><?php echo number_format($Reservation -> Price) ?></td>
                    <td><?php echo number_format($Reservation -> TotalAmount) ?></td>
                    <td><?php echo $Reservation -> NameStatus ?></td>
            
                </tr>
            <?php endforeach ; ?>
          </tbody>
          
      </table>
    </form>
    <nav aria-label="..." class="mt-4">
        <ul class="pagination">
            <?php for($i = 1 ; $i <= ceil($count/10) ; $i ++) {
            ?>
            <li class="page-item"><a class="page-link" href="?action=listReservation&&pages=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php
            } ?>
        </ul>
    </nav>
    </div>
</div>

