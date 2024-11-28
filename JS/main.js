const row = document.querySelector('.row-responsive') ;
const search_room = document.querySelector('.search-room') ;
window.addEventListener('resize' , () => {
    if(window.innerWidth < 1200) {
        row.style.display = "none" ;
        search_room.style.display = "block" ;
    }else {
        row.style.display = "flex" ;
        search_room.style.display = "none" ;
    }
}) ;

// Validate form đăng nhập ;

const email_login = document.getElementById('email_login') ;
const email_login_err = document.getElementById('email_login_err') ;
const password_login = document.getElementById('password_login') ;
const password_login_err = document.getElementById('password_login_err') ;
function validateLogin() {
    let check = true ;
    let regexEmail = /^\w([_\.]?\w+)*@\w{2,}(\.\w{2,30})+$/;
    if(email_login.value.trim() == "") {
        email_login_err.innerText = "Vui lòng nhập email" ;
        check = false ;
    }
    else if(regexEmail.test(email_login.value) == false) {
        email_login_err.innerText = "Email không đúng định dạng" ;
        check = false ;
    }
    else {
        email_login_err.innerText = "" ;
    }

    let regaxPass = /^\w{6,}$/ ;
    if(password_login.value.trim() == "") {
        password_login_err.innerText = "Vui lòng nhập mật khẩu" ;
        check = false ;
    }
    else if(regaxPass.test(password_login.value) == false) {
        password_login_err.innerText = "Mật khẩu phải trên 6 kí tự" ;
        check = false ;
    }
    else {
        password_login_err.innerText = "" ;
    }
    return check ;
}


// Checklist trang admin ;

const open_check = document.querySelector('.open_checked') ,
close_check = document.querySelector('.close_checked') ,
checkList = document.querySelectorAll('#checkList') ;
    
open_check.addEventListener('click' , () => {
    checkList.forEach(check => {
        check.checked = true ;
    })
}) ;
close_check.addEventListener('click' , () => {
    checkList.forEach(check => {
        check.checked = false ;
    })
}) ;


