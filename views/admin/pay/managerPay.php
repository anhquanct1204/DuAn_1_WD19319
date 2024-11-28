<div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div>
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>Quản lí đánh giá</th>
                </tr>
            </thead>
        </table>
        <form action="" method="post">
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th>Mã thanh toán</th>
                        <th>Mã đặt phòng</th>
                        <th>Tài khoản đặt</th>
                        <th>Tổng tiền</th>
                        <th>Phương thức thanh toán</th>
                    </tr>
                </thead>

                <tbody> 
                    <?php foreach($listPays as $Pays => $Pay) : ?>
                        <tr>
                            <td><?php echo $Pay -> PayID ?></td>
                            <td><?php echo $Pay -> ReservationID ?></td>
                            <td><?php echo $Pay -> Email ?></td>
                            <td><?php echo number_format($Pay -> TotalAmount) .' đ' ?></td>
                            <td><?php echo $Pay -> PayInfo ?></td>
                        </tr>
                    <?php endforeach ; ?>
                </tbody>
                
            </table>
        </form>
        <nav aria-label="..." class="mt-4">
            <ul class="pagination">
                <?php for($i = 1 ; $i <= ceil($count/10) ; $i ++) {
                ?>
                <li class="page-item"><a class="page-link" href="?action=managerPay&&pages=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php
                } ?>
            </ul>
        </nav>
    </div>
</div>

