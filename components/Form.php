<div class="row" style="margin-top: 3rem">
    <div class="col s12">
        <div class="card hoverable">
            <h1 class="card-title center aqua-text">LOGIN</h1>
            <div class="container-fluid" style="margin: auto 1.75rem;">
                <div class="row">
                    <form id="login_form" method="POST" action="login.php">
                        <div class="input-field col s12">
                            <input id="login_email" type="email" class="validate" required>
                            <label for="login_email">Email</label>
                            <span class="helper-text" data-error="Please enter a valid email" data-success=""></span>
                        </div>
                        <div class="input-field col s12">
                            <input id="login_password" type="password" class="validate" required>
                            <label for="login_password">Password</label>
                            <span class="helper-text" data-error="This field is required" data-success=""></span>
                            <br />
                            <button type="submit" id="submit" class="btn btn-aqua waves-effect waves-light">Login</button>&ensp;<a id="activator" class="activator btn btn-slick waves-effect waves-light">Register</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-reveal" style="padding-top: 2rem !important;">
            <div class="container-fluid">
                <span class="card-title" style="position: absolute; right: 1rem; top: 1rem;"><i id="deactivator" class="material-icons">close</i></span>
                <h5 class="center slick-text">REGISTER</h5>
                <div class="row">
                    <form id="register_form" method="POST" action="register.php">
                        <div class="input-field col s12">
                            <input id="name" type="text" class="validate" required>
                            <label for="name">Name</label>
                            <span class="helper-text" data-error="This field is required" data-success=""></span>
                        </div>
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" required>
                            <label for="email">Email</label>
                            <span id="email-validation" class="helper-text" data-error="Please enter a valid email" data-success=""></span>
                        </div>
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" required>
                            <label for="password">Password</label>
                            <span class="helper-text" data-error="This field is required" data-success=""></span>
                            <br />
                            <button type="submit" class="btn btn-slick waves-effect waves-light">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="snackbar"></div>