<main class="container">
    <div class="row" style="margin-top: 2rem">
        <div class="col s10 offset-s3 mobile-col">
            <div class="card hoverable">
                <h1 class="card-title center teal-text">LOGIN</h1>
                <div class="container-fluid" style="margin: auto 1.75rem;">
                    <h6 class="activator center" style="margin-bottom: 2rem"><i class="material-icons">how_to_reg</i> Click Here To Register</h6>
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
                                <button type="submit" id="submit" class="btn teal">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-reveal" style="padding-top: 2rem !important;">
                <div class="container-fluid">
                    <span class="card-title" style="position: absolute"><i class="material-icons silver-hover">arrow_drop_down</i></span>
                    <h5 class="center teal-text">REGISTER</h5>
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
                                <span class="helper-text" data-error="Please enter a valid email" data-success=""></span>
                            </div>
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" required>
                                <label for="password">Password</label>
                                <span class="helper-text" data-error="This field is required" data-success=""></span>
                                <br />
                                <button type="submit" class="btn teal">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="snackbar"></div>

</main>