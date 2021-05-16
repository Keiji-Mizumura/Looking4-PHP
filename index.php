<?php include('layout/head.php') ?>
<body>
    <?php
        include('layout/header.php');
        include_once 'backend/dbh.inc.php';
    ?>
    <?php
        if(isset($_SESSION['email'])){

        $firstname = "";
        $lastname = "";
        $completeData = true;
        $freelancer = false;
        

        $email = $_SESSION['email'];
        $sql = "SELECT * FROM users WHERE email='$email';";
        if($result = mysqli_query($conn, $sql)){
            while($row = mysqli_fetch_array($result)) {
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $freelancer = $row['freelancer'];
            } 
        }

        if(empty($firstname) || empty($lastname)){
            $completeData = false;
        }

    ?>
        <!-- Logged in -->
        <div class="container">
            <h1>Email: <?php echo $_SESSION['email'] ?></h1>
            <?php
                if($completeData){ ?>
                <?php    
                    if($freelancer){ ?>
                        <div class="freelancer">
                            <h1>Freelancer</h1>
                            <h2><?php echo "$firstname $lastname"; ?></h2>
                            <img src="public/logo/looking4_favicon.png" alt="profile">
                            <h2>My Gigs</h2>
                            <?php
                                $sql = "SELECT * FROM gigs WHERE email='$email'";
                                if($result = mysqli_query($conn, $sql)){
                                    while($row = mysqli_fetch_array($result)){
                                        ?>

                                        <div class="gig">
                                            <h3><?php echo $row['title']; ?></h3>
                                            <p>
                                                <?php echo $row['description']; ?>
                                            </p>
                                            <p class="date">
                                                <?php echo $row['date']; ?>
                                            </p>
                                            <form method="POST">
                                                <input type="submit" name="submit" value="DELETE GIG">
                                            </form>
                                        </div>

                                        <?php
                                    }
                                }
                            ?>
                            <br>
                            <form action="backend/gig.inc.php" method="POST">
                                <h3>POST A JOB NOW</h3>
                                <input type="text" name="title" placeholder="title"><br>
                                <textarea name="description" id="description" cols="30" rows="10"></textarea><br>
                                <input type="submit" name="submit" value="POST GIG">
                            </form>
                            
                            
                        </div>
                    <?php }
                    else{ ?>
                        <div class="freelancer">
                            <h2>Client</h2>
                            <h3>Available gigs right now!</h3>
                            <?php
                                $sql = "SELECT * FROM gigs";
                                if($result = mysqli_query($conn, $sql)){
                                    while($row = mysqli_fetch_array($result)){
                                        ?>

                                        <div class="gig">
                                            <h3><?php echo $row['title']; ?> by <?php echo $row['email'] ?></h3>
                                            <p>
                                                <?php echo $row['description']; ?>
                                            </p>
                                            <p class="date">
                                                <?php echo $row['date']; ?>
                                            </p>
                                            <form>
                                                <button>
                                                    BOOK
                                                </button>
                                            </form>
                                        </div>

                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    <?php }
                }
                else{ ?>
                
                    <form method="POST" action="backend/account_complete.inc.php" class="reg-form">
                        <h2>Please Finish Registration</h2>
                        <table>
                            <tr>
                                <td>
                                    <label for="firstname">First Name:</label>
                                </td>
                                <td>
                                    <input type="text" name="firstname" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="lastname">Last Name:</label>
                                </td>
                                <td>
                                    <input type="text" name="lastname" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="gender">Gender:</label>
                                </td>
                                <td>
                                    <select name="gender" id="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="unknown">Unspecified</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="picture">Profile Picture:</label>
                                    <img src="public/logo/looking4_favicon.png" style="height: 50px;"/>
                                </td>
                                <td>
                                    <input type="file" name="image">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="type">Account Type:</label>
                                </td>
                                <td>
                                    <select name="account_type" id="account_type" onchange="showoptions()">
                                        <option value="freelancer">Freelancer</option>
                                        <option value="client">Client</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="category_toggle" style="display: none">
                                <td>
                                    <label for="category">Category:</label>
                                </td>
                                <td>
                                    <select name="category" id="category">
                                        <option value="art">Art</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" value="Save Changes">
                                </td>
                            </tr>
                        </table>
                    </form>

                <?php
                }
            ?>
        </div>

    <?php
        }
        else{
    ?>

        <!-- Not Logged in -->
        <div class="container">
            <h1>Welcome to Looking4</h1>
        </div>

    <?php
        }
    ?>

    <script>
        function showoptions(){
            const option = document.getElementById("account_type").value;
            const category_toggle = document.getElementById("category_toggle");
            if(option == "freelancer"){
                category_toggle.style.display = "block";
            }
            else{
                category_toggle.style.display = "none";
            }
        }
    </script>

</body>
</html>