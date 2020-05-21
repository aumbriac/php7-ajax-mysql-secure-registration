<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper black shadow-aqua">
            <a href="#" class="left" style="margin-left: 1rem;"></a>

            <ul id="nav-mobile" class="left">
                <li style="margin-left: 2rem; font-size: 1.5rem"><span class="hide-on-small-only">Secure Login</span> <i class="material-icons">lock</i></li>
            </ul>

            <?php
            if (isset($_SESSION['token'])) {
                echo  '
                <ul id="nav-mobile" class="right">
                    <li style="margin-right: .5rem;">
                        <a style="font-size: 1.5rem" onclick="logout()">
                            Logout
                        </a>
                    </li>
                </ul>';
            }
            ?>
        </div>
    </nav>
</div>