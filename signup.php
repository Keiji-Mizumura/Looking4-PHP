<?php include('layout/head.php') ?>
<body>
    <?php
        include('layout/header.php');
    ?>
    <div class="container">
        <h1>Signup</h1>
        <div class="box">
            <form method="POST" action="backend/signup.inc.php">
                <h2>Create an account</h2>
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
                            <label>Confirm Password: </label>
                        </td>
                        <td>
                            <input type="password" name="confirm_password" placeholder="Retype password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Signup" />
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td>
                            <p>Already have an account? <a href="login.php">Login</a> now!
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>