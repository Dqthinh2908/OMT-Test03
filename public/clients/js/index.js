// Modal Menu mobile
var menuBtn = document.getElementById('menuMobile-Btn');
var modal = document.querySelector('.nav__overlay');
var modalClose = document.querySelector('.nav__mobile-btn-close');
var modalMobile = document.querySelector('.nav__mobile');

function showModalMenu(){
    modal.classList.add('open');
}
function hideModalMenu(){
    modal.classList.remove('open');
    
}

menuBtn.addEventListener('click',showModalMenu);
modalClose.addEventListener('click',hideModalMenu);
modal.addEventListener('click',hideModalMenu);
modalMobile.addEventListener('click',function(event) {
    event.stopPropagation();
})

// Modal Login
var closeLoginbtn = document.getElementById('btnClose');
var loginModal = document.getElementById('loginModal');
var modal__body_login = document.querySelector('.modal__body');
var modalController = document.querySelector('.modalController');
function hideModalLogin(event)
{
    modalController.classList.remove('open');
    event.preventDefault();
}
loginModal.addEventListener('click',function(event) {
    modalController.classList.add('open');
    event.preventDefault();
})
modal__body_login.addEventListener('click',function(event) {
    event.stopPropagation();
})
closeLoginbtn.addEventListener('click',hideModalLogin);
modalController.addEventListener('click',hideModalLogin);

// Validate login
var btnLogin = document.querySelector('.btn-submit-js');
btnLogin.addEventListener('click',function(event) {
    let username = document.querySelector('.username');
    let password = document.querySelector('.password');
    
    let errUserName = document.getElementById('error_username');
    let errPassWord = document.getElementById('error_password');

    let userVal = username.value.trim();
    let passwordVal = password.value.trim()

    if(userVal === ''){
        errUserName.innerHTML = 'Vui lòng nhập tên tài khoản';
        errUserName.style.color = 'red';
    }else
    {
        errUserName.innerHTML = '';
    }
    if(passwordVal === ''){
        errPassWord.innerHTML = 'Vui lòng nhập mật khẩu';
        errPassWord.style.color = 'red';
    }else
    {
        errPassWord.innerHTML = '';
    }

    if(userVal == 'admin' && passwordVal == '1')
    {
        Swal.fire({
            icon: 'success',
            title: 'Oops...',
            text: 'Đăng nhập thành công',
          })
          modalController.style.display = 'none';
    }
    event.preventDefault();


})



// Modal Login on Mobile
var loginModalOnMobile = document.getElementById('loginModalOnMobile');
loginModalOnMobile.addEventListener('click',function(event) {
    modalController.classList.add('open');
    event.preventDefault();
})
// check length search

var inputSearch = document.querySelector('.tittle__search-input');
inputSearch.addEventListener('keypress',function(){
    var searchVal = inputSearch.value;
    if(searchVal.length > 12)
    {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Không được nhập quá dài, vui lòng nhập lại',
          })
    }

})
// Change Login & Register

$('.auth-form_switch-btn').click(function(event){
    $('form').animate({height:"toggle", opacity:"toggle"},"medium")
    event.preventDefault();
});
// Modal Register
$('#btnClose-Register').click(hideModalLogin)

// change background color
$('#changeBG').change(function(event){
    var self = $(this);
    var valueBG = self.val();
    var app = $('.app');
    // console.log(valueBG);
    if(valueBG == 'white')
    {
        app.css('backgroundColor','white')
    }else if(valueBG == 'black')
    {
        app.css('backgroundColor','black')
    }else if(valueBG == 'grey')  
    {
        app.css('backgroundColor','grey')
    }
});