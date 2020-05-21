<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['token'])) {
    http_response_code(401);
}
?>
<div class="row" style="margin-top: 2rem">
    <div class="col s12">
        <div class="card hoverable" style="padding-bottom: 1rem !important">
            <div class="card-image">
                <img src="./css/secure.jpg">
                <span class="card-title text-shadow">Welcome, <?php echo $_SESSION['name']; ?></span>
            </div>
            <div class="card-content">
                <p>
                    <b>Email</b>: <?php echo $_SESSION['email']; ?><br />
                    <b>Account created</b>: <?php echo date("m/d/Y", strtotime($_SESSION['created_on'])) ?>
                    <?php
                    echo "<br><b>Token expiration</b>: <span id='token-expiration'>" . date("h:i:sa", $_SESSION['token_timestamp'] + 900) . "</span>";
                    ?><br />
                    <span class="truncate"><b>Token</b>: <?php echo $_SESSION['token']; ?></span>
                    <b>Last login: </b> <?php echo date("m/d/Y h:i:sa", strtotime($_SESSION['last_login'])); ?>
                </p><br />
                <button class="btn btn-slick center waves-effect waves-light" onclick="logout()">Logout</button>
            </div>
        </div>
    </div>
</div>