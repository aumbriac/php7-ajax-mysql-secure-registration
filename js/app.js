// Register

$('#register_form').submit(function (event) {
 event.preventDefault();
 var name = $('#name').val();
 var email = $('#email').val();
 password = $('#password').val();
 $.ajax({
  url: './actions/register.php',
  method: 'POST',
  data: {
   register: true,
   name: name,
   email: email,
   password: password,
  },
  success: function (res) {
   if (res === 'userExists') {
    var snackbar = document.getElementById('snackbar');
    snackbar.className = 'show';
    snackbar.innerHTML = `
    <div style="display:flex"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
       <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
       <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
       <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
     </svg> <span class="message">Email Unavailable</span></div>`;
    $('#email').val('');
    $('#email-validation').attr('data-error', 'Please enter another email');
    $('#email').focus().blur().focus();
    setTimeout(function () {
     snackbar.className = snackbar.className.replace('show', '');
    }, 3000);
   } else {
    // Successful registration
    var snackbar = document.getElementById('snackbar');
    snackbar.className = 'show';
    snackbar.innerHTML = `<div style="display:flex"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
    <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
    <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
  </svg><span class="message">Account Created</span></div>`;
    setTimeout(function () {
     snackbar.className = snackbar.className.replace('show', '');
    }, 1500);
    // Subsequent automatic login
    $.ajax({
     url: './actions/login.php',
     method: 'POST',
     data: {
      login: true,
      email: email,
      password: password,
     },
     success: function (res) {
      if (res === 'success') {
       setTimeout(() => {
        var snackbar = document.getElementById('snackbar');
        snackbar.className = 'show';
        snackbar.innerHTML = `<div style="display:flex;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
        <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
        <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
      </svg><span class="message">Login Successful</span></div>`;
       }, 1500);
       setTimeout(function () {
        snackbar.className = snackbar.className.replace('show', '');
       }, 1500);
       setTimeout(() => {
        location.reload();
       }, 2333);
      } else {
       // Invalid credentials
       var snackbar = document.getElementById('snackbar');
       snackbar.className = 'show';
       snackbar.innerHTML = `
        <div style="display:flex"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
           <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
           <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
           <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
         </svg><span class="message">Invalid Credentials</span></div>`;
       setTimeout(function () {
        snackbar.className = snackbar.className.replace('show', '');
       }, 3000);
      }
     },
     complete: function () {
      setTimeout(() => {
       $('#login_form')[0].reset();
      }, 1500);
     },
    });
   }
  },
  error: function () {
   var snackbar = document.getElementById('snackbar');
   snackbar.className = 'show';
   snackbar.innerHTML = `
    <div style="display:flex"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
       <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
       <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
       <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
     </svg><span class="message">Please Try Again</span></div>`;
  },
 });
});

// Login

$('#login_form').submit(function (event) {
 event.preventDefault();
 var email = $('#login_email').val();
 var password = $('#login_password').val();
 $.ajax({
  url: './actions/login.php',
  method: 'POST',
  data: {
   login: true,
   email: email,
   password: password,
  },
  beforeSend: function () {
   $('.btn').attr('disabled', 'true');
  },
  success: function (res) {
   if (res === 'success') {
    var snackbar = document.getElementById('snackbar');
    snackbar.className = 'show';
    snackbar.innerHTML = `<div style="display:flex;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
    <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
    <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
  </svg><span class="message">Login Successful</span></div>`;
    setTimeout(function () {
     snackbar.className = snackbar.className.replace('show', '');
    }, 3000);
    setTimeout(() => {
     location.reload();
    }, 1500);
   } else {
    var snackbar = document.getElementById('snackbar');
    snackbar.className = 'show';
    snackbar.innerHTML = `
    <div style="display:flex"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
       <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
       <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
       <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
     </svg><span class="message">Invalid Credentials</span></div>`;
    setTimeout(function () {
     snackbar.className = snackbar.className.replace('show', '');
    }, 3000);
   }
  },
  complete: function () {
   setTimeout(() => {
    $('#login_form')[0].reset();
   }, 1500);
  },
 });
});

// Logout

function logout() {
 $.ajax({
  url: './actions/logout.php',
  method: 'POST',
  data: {
   logout: true,
  },
  success: function () {
   location.reload();
  },
 });
}

// Autocomplete background color fix

$("input[type='text']").bind('focus', function () {
 $(this).css('background-color', 'white');
});

$('#activator').on('click', function () {
 $('.card').css('height', '30rem');
});

$('#deactivator').on('click', function () {
 $('.card').css('height', 'max-content');
});
