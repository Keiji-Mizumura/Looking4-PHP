<?php include('layout/head.php') ?>
<body>
    <?php
        include('layout/header.php');
    ?>
    <div class="container">
        <h1>Login</h1>
        <div class="box">
            <form method="POST" action="backend/login.inc.php">
                <h2>Welcome Back</h2>
                <table>
                    <tr>
                        <td>
                            <label>Email: </label>
                        </td>
                        <td>
                            <input type="email" name="email" placeholder="Type email"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password: </label>
                        </td>
                        <td>
                            <input type="password" name="password" placeholder="Type password"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Login" />
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td>
                            <p>New to Looking4? <a href="signup.php">Register</a> now!
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>