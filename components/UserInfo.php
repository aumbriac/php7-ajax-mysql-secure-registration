<main class="container">
    <div class="row" style="margin-top: 2rem">
        <div class="col s10 offset-s3 mobile-col">
            <div class="card">
                <div class="card-image">
                    <img src="https://media.defense.gov/2018/Sep/10/2001963531/-1/-1/0/180907-N-BK152-003.JPG">

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
                    <button class="btn red center" id="logout">Logout</button>
                    <!-- <button class="btn grey lighten-1 center">Settings</button> -->

                </div>
            </div>
        </div>
    </div>
</main>