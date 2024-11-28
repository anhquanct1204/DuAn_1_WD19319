<style>
    table {
        width : 100% ;
        margin-top : 15px ;
        border-collapse:collapse ;
        border : 1px dotted gray ;
    }
    table thead {
        height : 45px ;
        background-color : #e4e4e4;
    }
    table thead tr th{
        padding-left : 10px ;
    }
    table tbody tr {
        height : 100px ;
        border : 1px dotted gray ;
    }
    table tbody tr td{
        border : 1px dotted gray ;
        text-align: center ;
    }
    .star {
        font-size: 24px;
        cursor: pointer;
    }

    .star:hover,
    .star.active {
        color: gold;
    }

    .stars {
        font-size: 24px;
        cursor: pointer;
      }

      .stars.actives {
        color: gold;
      }

    .btn-rating {
        background-color : #86B817 ;
        color : white ;
    }
    .modal-body div{
        margin-top : -20px ;
    }
   
    .text-center span {
        font-size : 35px ;
    }
    
    .title-h6 {
        margin-top : 0 ;    
    }
    .top-views {
        padding : 0 ;
    }
    .top-views li {
        border-bottom : 1px dotted gray ;
        padding: 5px 0 ;
    }
    .top-views li a {
        text-decoration : none ;
        color : black ;
    }
    .top-views li h6 {
        font-size : 13px ;
        margin-left : 5px ;
    }
    .content {
        display: grid;
        grid-template-columns: 2.5fr 1fr;
        justify-content: space-between;
    }
    .content-item {
        display: flex;
    }
</style>
<div class="box-details">
    <?php
        require './views/aside.php' ;
    ?>
    <div style="margin-left:10px;">
        <h5><?php echo $Hotel -> NameHotel ?></h5>
        <p style="font-size:12px;"><i style="margin-right:6px;color:#128ce3;" class="fa-solid fa-location-dot"></i><?php echo $Hotel -> Address ?></p>
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <?php $listImages = explode(',' , $Hotel -> Image) ; ?>
                <?php foreach($listImages as $images => $image) : ?>
                    <div class="carousel-item active">
                        <img src="<?php echo $image ?>" class="d-block w-100" alt="...">
                    </div>
                <?php endforeach ; ?>
                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <table class="table-responsive">
            <thead>
                <tr>
                    <th>Tên phòng</th>
                    <th>Ảnh phòng</th>
                    <th>Loại phòng</th>
                    <th>Số người</th>
                    <th>Giá</th>
                    <th>Đặt phòng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listRoomHotelID as $listRoom => $Room) : ?>
                    <tr>
                        <td>
                            <?php echo $Room -> RoomName ?> 
                        </td>
                        <td>
                            <img src="<?php echo explode(',' , $Room -> Image)[0] ?>" width="100px" height="auto" alt="">
                        </td>
                        <td><?php echo $Room -> RoomTypeName ?></td>
                        <td><?php echo $Room -> MaximumNumber ?></td>
                        <td><?php echo number_format($Room -> Price) ."đ" ?></td>
                        <td>
                            <a href="?action=roomDetails&&RoomID=<?php echo $Room -> RoomID ?>"  style="background-color:#5fcb6e;padding:3px 5px;border-radius:3px;color:white;text-decoration:none;">Xem phòng</a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
        <div class="rating my-4">
            <h5>ĐÁNH GIÁ CỦA KHÁCH HÀNG</h5>
            <hr>
           
        </div>
        <?php
            if(!empty($checkBooking) && $checkBooking -> StatusID == 4 && empty($checkReview)) {
        ?>
            <a class="btn btn-rating" data-bs-toggle="modal" data-bs-target="#exampleModal">Viết đánh giá</a>
        <?php
            }
        ?>
        <!-- Modal đánh giá ; -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post" onsubmit="return validateRating();">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Đánh giá khách sạn</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">
                                <span class="star" data-rating="1">&#9734;</span>
                                <span class="star" data-rating="2">&#9734;</span>
                                <span class="star" data-rating="3">&#9734;</span>
                                <span class="star" data-rating="4">&#9734;</span>
                                <span class="star" data-rating="5">&#9734;</span>
                            </p>
                                <input type="hidden" name="rating" id="input">
                                <input type="hidden" name="ReservationID" value="<?php echo $checkBooking ->ReservationID ?>">
                            <div>
                                <label for=""></label> <label for="" style="display: flex;justify-content: space-between;"><span id="content-err" style="color : red ;"></span><span id="rating-form-err" style="color:red;"></span></label>
                                <textarea name="content" id="content" placeholder="Viết đánh giá..." class="form-control"></textarea> 
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" name="new-rating" class="btn btn-success">Gửi đánh giá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
      const stars = document.querySelectorAll(".star");
      const input = document.querySelector('#input') ;

      stars.forEach((star) => {
        star.addEventListener("click", (e) => {
          const clickedStar = e.target;
          const rating = clickedStar.getAttribute("data-rating");
          input.value = rating ;

          stars.forEach((s) => {
            s.classList.remove("active");
          });

          for (let i = 0; i < rating; i++) {
            stars[i].classList.add("active");
          }
        });
      });

      // Validate form đánh giá ;
      const rating_form_err = document.getElementById('rating-form-err') ;
      const content = document.getElementById('content') ;
      const content_err = document.getElementById('content-err') ;
      function validateRating() {
        let checkRating = true ;
        if(input.value.trim() == "") {
            rating_form_err.innerText = " Vui lòng chọn số sao" ;
            checkRating = false ;
        }else {
            rating_form_err.innerText = "" ;
        }

        if(content.value.trim() == "") {
            content_err.innerText = "Vui lòng nhập đánh giá" ;
            checkRating = false ;
        }else {
            content_err.innerText = "" ;
        }
        return checkRating ;
      }

      

      function setRating(rating) {
        const stars = document.querySelectorAll(".stars");
        stars.forEach((s, index) => {
          if (index < rating) {
            s.classList.add("actives");
          } else {
            s.classList.remove("actives");
          }
        });
      }
</script>