// LOGIN CHECK

setInterval(() => {
 $.ajax({
  url: './auth/auth.php',
  method: 'POST',
  data: {
   login_check: true,
  },
  success: function (res) {
   if (res === 'invalid') {
    logout();
   } else if (res === 'valid') {
    console.log('Authorization verified');
   }
  },
  error: function (res) {
   alert(res);
  },
 });
}, 10000);

// AUTHENTICATION

$(document).ready(function () {
 $.ajax({
  url: './auth/auth.php',
  method: 'POST',
  data: {
   authenticate: true,
  },
  success: function (res) {
   if (res === 'valid') {
    $.get('./auth/get_token_timestamp.php', function (data) {
     $('#token-expiration').html(data);
     $('.toast').hide();
     M.toast({ html: 'Token expiration: ' + data });
    });
   } else {
    console.log(res);
   }
  },
 });
});

// REAUTHENTICATION

$(document).on('click focus', function () {
 $.ajax({
  url: './auth/auth.php',
  method: 'POST',
  data: {
   authenticate: true,
  },
  success: function (res) {
   if (res === 'valid') {
    $.get('./auth/get_token_timestamp.php', function (data) {
     $('#token-expiration').html(data);
     $('.toast').hide();
     M.toast({ html: 'Token expiration: ' + data });
    });
   } else {
    console.log(res);
   }
  },
 });
});
