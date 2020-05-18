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
    location.reload();
   } else if (res === 'valid') {
    console.log('Authorization verified');
   }
  },
 });
}, 10000);

// REAUTHENTICATION

$(document).on('keypress readystatechange click focus', function () {
 $.ajax({
  url: './auth/auth.php',
  method: 'POST',
  data: {
   reauthenticate: true,
  },
  success: function (res) {
   if (res === 'valid') {
    $.get('./auth/fetch.php', function (data) {
     $('#token-expiration').html(data);
    });
   }
  },
 });
});

// Reauthorization

// $(document).on('keypress scroll click focus', function () {
//     $.ajax({
//      url: '../auth/auth.php',
//      method: 'POST',
//      data: {
//       reauthenticate: true,
//      },
//      success: function (data) {
//       M.toast({ html: 'Token expiration updated' });
//       setTimeout(() => {
//        $('#token-expiration').html(data);
//       }, 100);
//       setTimeout(() => {
//        M.Toast.dismissAll();
//       }, 1000);
//      },
//     });
//    });
