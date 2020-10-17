var showPass = 0;
$('.btn-show-pass').on('click', function () {

  if (showPass == 0) {
    $(this).next('input').attr('type', 'text');
    $(this).find('i').addClass('fas fa-eye-slash');
    $('.btn-show-pass').addClass('active');
    showPass = 1;
  }
  else {
    $(this).next('input').attr('type', 'password');
    $(this).find('i').removeClass('fas fa-eye-slash');
    $('.btn-show-pass').removeClass('active');
    showPass = 0;
  }

});