<header>
    <div class="container">
        <a href="index.php">
            <img src="public/logo/looking4_logo.png" />
        </a>
        <nav>
            <ul>
                
                <?php
                if(!isset($_SESSION['email'])){
                ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Signup</a></li>
                <?php
                }
                else{ ?>
                <li>
                    <form action="backend/logout.inc.php" method="POST">
                        <button>LOGOUT</button>
                    </form>
                </li>
                
                <?php
                }
                ?>
            </ul>
        </nav>
    </div>
</header>