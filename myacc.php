<?php
session_start();
if (isset($_POST["create"])) {
    $con  = mysqli_connect("localhost", "root", "", "createacc");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to Database: " . mysqli_connect_error();
    }
    $num = '0';
    $arr = array();
    $test = '1';

    if ($_POST['fname'] == NULL || $_POST['lname'] == NULL) {
        if ($num == '0') {
            $arr[0] = "Sorry";
        }
        $arr[$test++] = "Name ";
        $num = '1';
    }
    if ($_POST['email'] == NULL) {
        if ($num == '0') {
            $arr[0] = "Sorry";
        }
        $arr[$test++] = "Email";
        $num = '1';
    }
    if ($_POST['phone'] == NULL) {
        if ($num == '0') {
            $arr[0] = "Sorry";
        }
        $arr[$test++] = "Phone";
        $num = '1';
    }
    if ($_POST['password'] == NULL) {
        if ($num == '0') {
            $arr[0] = "Sorry";
        }
        $arr[$test++] = "Password";;
        $num = '1';
    }
    if ($num == '1') {
        $arr[$test++] = "cannot be Empty";
        $arr = implode(" ", $arr);
        echo '<script type="text/javascript"> alert("' . $arr . '")</script>;';
    } else {
        $check = "SELECT email,phone FROM createcont WHERE email = '$_POST[email]' OR phone = $_POST[phone]";
        $now23 = mysqli_query($con, $check) or die("error111");

        if (mysqli_num_rows($now23) > 0) {
            echo '<script type="text/javascript"> document.getelementbyid("clicked").click()"</script>';
            echo "Username or email already taken";
        } else {
            $sql = "INSERT into createcont(fname,lname,email,phone,password) VALUES('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[phone]','$_POST[password]')";
            $now = mysqli_query($con, $sql) or die("error");
            if ($now) {
                $user1 = $_POST['fname'];
                $user2 = $_POST['lname'];
                $email1 = $_POST['email'];
                $phone1 = $_POST['phone'];
                $_SESSION['user11'] = $user1;
                $_SESSION['user22'] = $user2;
                $_SESSION['email12'] = $email1;
                $_SESSION['phone12'] = $phone1;
                echo '<script>alert("ACCOUNT CREATED SUCCESFULLY")</script>';
                $insert = "true";
            } else {
                echo "SORRY AN ERROR OCCURED PLEASE TRY AGAIN";
            }
        }
    }
} else if (isset($_POST["datahold"])) {
    $user1 = $_SESSION['user11'];
    $user2 = $_SESSION['user22'];
    $email1 = $_SESSION['email12'];
    $phone1 = $_SESSION['phone12'];
} else if (isset($_POST["acc"])) {
    $user1 = $_SESSION['user11'];
    $user2 = $_SESSION['user22'];
    $email1 = $_SESSION['email12'];
    $phone1 = $_SESSION['phone12'];
    if ($user1 == NULL) {
        header("location:logincreate.php");
    }
} else if (isset($_POST["submit"])) {

    $email12 = $_SESSION['c3'];

    $user1 = $_POST["fname"];
    $user2 = $_POST["lname"];
    $email1 = $_POST["email"];
    $phone1 = $_POST["phone"];
    $password = $_POST["password"];

    $con  = mysqli_connect("localhost", "root", "", "createacc");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to Database: " . mysqli_connect_error();
    }

    $sql = " UPDATE createcont SET fname = '$user1'
    , lname= '$user2' , email = '$email1' , phone = '$phone1' , password = '$password'
    WHERE email = '$email12' ";

    $now22 = mysqli_query($con, $sql) or die("error12");

    if ($now22) {
        echo "DATA UPDATED SUCCESSFULLY";
    } else {
        echo "SORRY AN ERROR OCCURED PLS TRY AGAIN";
    }
} elseif (isset($_POST["deleteacc"])) {
    $email12 = $_SESSION["c3"];
    $con  = mysqli_connect("localhost", "root", "", "createacc");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to Database: " . mysqli_connect_error();
    }
    $sql = "DELETE FROM createcont WHERE email='$email12' ";
    $now22 = mysqli_query($con, $sql) or die("error12");
    if ($now22) {
        echo "Account Deleted Successfully";
        session_destroy();
        header("location:logincreate.php");
    } else {
        echo "Sorry an error occured pls try again later";
    }
} elseif (isset($_POST["dontdelete"])) {

    $user1 =  $_SESSION['c1'];
    $user2 = $_SESSION['c2'];
    $email1 = $_SESSION['c3'];
    $phone1 = $_SESSION['c4'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html {
            /* height: 100%; */
            background-color: lightgray;
        }

        nav {
            width: 100vw;
            height: 10vh;
            background-color: blue;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .box {
            display: flex;
            margin: 3vh auto;
            width: 75vw;
            /* background-color: orange; */
        }


        .box2 {
            margin: 0px 0px 0px 10px;
            background-color: white;
            height: 88vh;
            width: 55vw;
        }

        .box1 {
            height: 93vh;
            /* background-color: red; */
            width: 24vw;
            margin: 0px 0x 10px 0px;
            /* display: flex; */
        }

        .name1 {
            background-color: white;
            display: flex;
            align-items: center;
            padding: 3vh 0vw;
        }

        .name {
            margin: 0px 0px 0px 2px;
            font-size: 1.7vw;
            height: 4vh;
            width: 6vw;
            font-weight: bold;
            /* background-color: yellow; */
        }

        .box1 img {
            margin: 0px 16px;
            height: 30px;
            width: 30px;
        }

        .orders {
            background-color: white;
            display: flex;
            align-items: center;
            padding: 2vh 0vw;
            /* margin: 2vh 0vw 0vh 0vw; */
            /* justify-content: center; */

        }

        table {
            padding: 10px 40px 60px 10px;
        }

        td {
            padding: 24px 84px;
        }

        th {
            font-size: 20px;
            padding: 34px;
            font-weight: bolder;
        }

        .delete {
            background-color: white;
            display: flex;
            align-items: center;
            padding: 2vh 0vw;
            /* margin: 2vh 0vw 0vh 0vw; */
            /* justify-content: center; */

        }

        header {
            position: sticky;
            top: 0px;
        }

        #deletecontm {
            background-color: white;
            display: flex;
            align-items: center;
            padding: 2vh 0vw;
            /* margin: 2vh 0vw 0vh 0vw; */
            /* justify-content: center; */

        }

        .info {
            background-color: white;
            display: flex;
            align-items: center;
            padding: 2vh 0vw;
            margin: 2vh 0vw 0vh 0vw;
            /* justify-content: center; */

        }

        .logout {
            background-color: white;
            display: flex;
            /* justify-content: center; */
            align-items: center;
            padding: 2vh 0vw;
            margin: 1vh 0vw 0vh 0vw;
        }

        .box2 h1 {
            /* background-color: grey; */
            padding: 4vh 0vw 2vh 0vw;
            margin: 0vh 0vw 0vh 2vw;
        }

        .table td {
            /* background-color: white; */
            /* width:40px; */
            /* border: 2px solid black; */
            padding: 15px 0.8px;
            font-size: 20px;
        }

        .table {
            /* margin: 5vh 0vw 2vh 1.8vw; */
            /* border-spacing: 40px; */
            margin: 3vh 0vw 0vh 2vw;
            border: 2px solid black;
            padding: 0vh 2vw 0vh 2vw;
            width: 34vw;
        }

        .box2 h3 {
            margin: 3vh 0vw 0vh 1.8vw;
        }

        #lname12 {
            width: 25vw;
        }

        a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            color: blue
        }

        button {
            background-color: white;
            border: 0px;
            font-size: 14.8px;
        }

        #box21 button {
            background-color: white;
            border: 2px solid black;
            font-size: 14.8px;
            border-radius: 4px;
            margin: 18px 0px 0px 0px;
            padding: 12px 24px;
            /* background-color: blue; */
        }

        button:hover {
            cursor: pointer;
            color: blue;
        }

        #box21 {
            display: none;
            height: 95.9vh;
        }

        #box22 {
            display: none;
            height: 27vh;
        }

        .box2 input {
            margin: 23px 10px 13px 24px;
            padding: 5px 13px;
            width: 34vw;
        }

        #box2name {
            margin: 5vh 0vw 0vh 1.8vw;
        }

        .box21p {
            display: flex;
        }

        #button button {
            border: 2px solid black;
            border-radius: 4px;
            margin: 29px 0px 0px 39px;
            padding: 10px 40px;
        }

        .box21p p {
            padding: 3.7vh 0vw 0vh 2vw;
        }

        #box22fname {
            width: 15.8vw;
        }

        #box22lname {

            width: 15.8vw;
        }

        #lnam {
            margin: 0vh 0vw 0vh 11.7vw;
        }

        #box28 {
            display: none;
            overflow: scroll;
            overflow-x: hidden;
        }

        .myacc {
            background-color: yellow;
            font-size: 25px;
            color: red;
            font-weight: bolder;
            padding: 10px 40px 10px 54px;
            letter-spacing: 8px;
        }
    </style>
    <script>
        function clickedupdate() {
            document.getElementById("box21").style.display = 'block';
            document.getElementById("box20").style.display = 'none';
            document.getElementById("box22").style.display = 'none';
            document.getElementById("box28").style.display = 'none';

        }


        function clickedinfo() {
            document.getElementById("box20").style.display = 'block';
            document.getElementById("box21").style.display = 'none';
            document.getElementById("box22").style.display = 'none';
            document.getElementById("box28").style.display = 'none';

        }

        function clickeddelete() {
            document.getElementById("box20").style.display = 'none';
            document.getElementById("box21").style.display = 'none';
            document.getElementById("box22").style.display = 'block';
            document.getElementById("box28").style.display = 'none';

        }

        function orderss() {
            document.getElementById("box20").style.display = 'none';
            document.getElementById("box21").style.display = 'none';
            document.getElementById("box22").style.display = 'none';
            document.getElementById("box28").style.display = 'block';
        }
    </script>
</head>

<body>
    <header>
        <nav>
            <div class="myacc">
                MY ACCOUNT
            </div>
        </nav>
    </header>
    <main>
        <div class="box">
            <div class="box1">
                <div class="name1">

                    <img src="https://static-assets-web.flixcart.com/www/linchpin/fk-cp-zion/img/profile-pic-male_4811a1.svg" alt="">
                    <div class="name">
                        <?php
                        echo $user1; ?>
                    </div>
                </div>
                <div class="info">
                    <div class="img">
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIxOCIgdmlld0JveD0iMCAwIDI0IDE4Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC04LjY5NCAtMTEpIj48ZWxsaXBzZSBjeD0iMjAuNTU3IiBjeT0iMjAiIHJ4PSIyMC41NTciIHJ5PSIyMCIvPjxwYXRoIGZpbGw9IiMyODc0RjEiIGQ9Ik05IDExdjE3LjEwOGMwIC40OTMuNDEuODkyLjkxOC44OTJoNC45M3YtNS4yNTdoLTMuMDMzbDQuOTEyLTQuNzcgNC45NzIgNC44M2gtMy4wMzVWMjloMTIuNDE3Yy41MDcgMCAuOTE4LS40LjkxOC0uODkyVjExSDl6Ii8+PC9nPjwvc3ZnPg==" alt="">
                    </div>
                    <div class="perosnalinfo">
                        <button onclick="clickedinfo()">
                            PERSONAL INFO.
                        </button>
                    </div>
                </div>
                <div class="orders">
                    <div class="img">
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIxOCIgdmlld0JveD0iMCAwIDI0IDE4Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC04LjY5NCAtMTEpIj48ZWxsaXBzZSBjeD0iMjAuNTU3IiBjeT0iMjAiIHJ4PSIyMC41NTciIHJ5PSIyMCIvPjxwYXRoIGZpbGw9IiMyODc0RjEiIGQ9Ik05IDExdjE3LjEwOGMwIC40OTMuNDEuODkyLjkxOC44OTJoNC45M3YtNS4yNTdoLTMuMDMzbDQuOTEyLTQuNzcgNC45NzIgNC44M2gtMy4wMzVWMjloMTIuNDE3Yy41MDcgMCAuOTE4LS40LjkxOC0uODkyVjExSDl6Ii8+PC9nPjwvc3ZnPg==" alt="">
                    </div>
                    <div class="myorders" onclick="orderss()">
                        <button>
                            MY ORDERS
                        </button>
                    </div>
                </div>
                <div class="delete">
                    <div class="img">
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIxOCIgdmlld0JveD0iMCAwIDI0IDE4Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC04LjY5NCAtMTEpIj48ZWxsaXBzZSBjeD0iMjAuNTU3IiBjeT0iMjAiIHJ4PSIyMC41NTciIHJ5PSIyMCIvPjxwYXRoIGZpbGw9IiMyODc0RjEiIGQ9Ik05IDExdjE3LjEwOGMwIC40OTMuNDEuODkyLjkxOC44OTJoNC45M3YtNS4yNTdoLTMuMDMzbDQuOTEyLTQuNzcgNC45NzIgNC44M2gtMy4wMzVWMjloMTIuNDE3Yy41MDcgMCAuOTE4LS40LjkxOC0uODkyVjExSDl6Ii8+PC9nPjwvc3ZnPg==" alt="">
                    </div>
                    <div class="deletecont">
                        <button onclick="clickeddelete()">
                            DELETE ACC.
                        </button>
                    </div>
                </div>
                <div class="delete">
                    <div class="img">
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIxOCIgdmlld0JveD0iMCAwIDI0IDE4Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC04LjY5NCAtMTEpIj48ZWxsaXBzZSBjeD0iMjAuNTU3IiBjeT0iMjAiIHJ4PSIyMC41NTciIHJ5PSIyMCIvPjxwYXRoIGZpbGw9IiMyODc0RjEiIGQ9Ik05IDExdjE3LjEwOGMwIC40OTMuNDEuODkyLjkxOC44OTJoNC45M3YtNS4yNTdoLTMuMDMzbDQuOTEyLTQuNzcgNC45NzIgNC44M2gtMy4wMzVWMjloMTIuNDE3Yy41MDcgMCAuOTE4LS40LjkxOC0uODkyVjExSDl6Ii8+PC9nPjwvc3ZnPg==" alt="">
                    </div>
                    <div class="deletecont">
                        <button onclick="clickedupdate()">
                            UPDATE INFO.
                        </button>
                    </div>
                </div>
                <div class="delete">
                    <div class="img">
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIxOCIgdmlld0JveD0iMCAwIDI0IDE4Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC04LjY5NCAtMTEpIj48ZWxsaXBzZSBjeD0iMjAuNTU3IiBjeT0iMjAiIHJ4PSIyMC41NTciIHJ5PSIyMCIvPjxwYXRoIGZpbGw9IiMyODc0RjEiIGQ9Ik05IDExdjE3LjEwOGMwIC40OTMuNDEuODkyLjkxOC44OTJoNC45M3YtNS4yNTdoLTMuMDMzbDQuOTEyLTQuNzcgNC45NzIgNC44M2gtMy4wMzVWMjloMTIuNDE3Yy41MDcgMCAuOTE4LS40LjkxOC0uODkyVjExSDl6Ii8+PC9nPjwvc3ZnPg==" alt="">
                    </div>
                    <div class="deletecont">
                        <form action="logincreate.php">
                            <button id="clicked">
                                SWITCH ACC.
                            </button>
                        </form>
                    </div>
                </div>
                <form method="POST" action="flipkartprac.php">
                    <div class="delete">
                        <div class="img">
                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIxOCIgdmlld0JveD0iMCAwIDI0IDE4Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC04LjY5NCAtMTEpIj48ZWxsaXBzZSBjeD0iMjAuNTU3IiBjeT0iMjAiIHJ4PSIyMC41NTciIHJ5PSIyMCIvPjxwYXRoIGZpbGw9IiMyODc0RjEiIGQ9Ik05IDExdjE3LjEwOGMwIC40OTMuNDEuODkyLjkxOC44OTJoNC45M3YtNS4yNTdoLTMuMDMzbDQuOTEyLTQuNzcgNC45NzIgNC44M2gtMy4wMzVWMjloMTIuNDE3Yy41MDcgMCAuOTE4LS40LjkxOC0uODkyVjExSDl6Ii8+PC9nPjwvc3ZnPg==" alt="">
                        </div>
                        <div class="deletecont">
                            <button name="main">
                                MAIN PAGE
                            </button>
                            <?php $_SESSION['user123'] = $user1 ?>
                        </div>
                    </div>
                    <div class="logout">
                        <div class="img">
                            <img src="data:image/png;base64,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" alt="">
                        </div>
                        <div class="logoutacc">
                            <button name="outlog">
                                Logout
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <form method="POST" action="myacc.php">
                <div class="box2" id="box20">
                    <h1> Personal Information</h1>
                    <!-- <div class="table"> -->
                    <h3>
                        Name
                    </h3>
                    <table class="table">
                        <tr>
                            <td id="fname11">
                                <?php echo $user1;
                                $_SESSION['c1'] = $user1;
                                ?>
                            </td>
                            <td id="lname12">
                                <?php echo $user2;
                                $_SESSION['c2'] = $user2;
                                ?>
                            </td>
                        </tr>
                    </table>
                    <!-- </div> -->
                    <h3>Email adress</h3>
                    <table class="table">
                        <tr>
                            <td id="prevemail">
                                <?php echo $email1;
                                $_SESSION['c3'] =  $email1;
                                ?>
                            </td>
                        </tr>
                    </table>
                    <h3>Mobile Number</h3>
                    <table class="table">
                        <tr>
                            <td id="prevphone">
                                <?php echo $phone1;
                                $_SESSION['c4'] =  $phone1;
                                ?>
                            </td>
                        </tr>
                    </table>
                    <h3>Credit Score</h3>
                    <table class="table">
                        <tr>
                            <td>24</td>
                        </tr>
                    </table>
                </div>
                <div class="box2" id="box21">
                    <h1>Update Information - </h1>
                    <!-- <h3 id="box2name">Enter Previous Data </h3>
                    <div class="box21p">
                        <p>Email</p>
                    </div> -->
                    <!-- <input type="text" name="box21email"> -->
                    <h3 id="box2name">Enter New name </h3>
                    <div class="box21p">
                        <p>First Name</p>
                        <p id="lnam">Last Name</p>
                    </div>
                    <input type="text" name="fname" id="box22fname">
                    <input type="text" name="lname" id="box22lname">
                    <h3>Enter New email </h3>
                    <input type="text" name="email" id="">
                    <h3>Enter New Mobile No. </h3>
                    <input type="number" name="phone" id="" max="9999999999">
                    <h3>Enter New Password </h3>
                    <input type="password" name="password" id="">
                    <h3>
                        <button name="submit">SUBMIT</button>
                    </h3>
                </div>
                <div class="box2 " id="box22">
                    <h1>Delete this Account Permanently ?</h1>
                    <div id="button">
                        <button name="deleteacc">
                            Yes
                        </button>
                        <button name="dontdelete">
                            No
                        </button>
                    </div>
                </div>
                <div class="box2" id="box28">
                    <h1>PURCHASED ITEMS</h1>
                    <table>
                        <?php
                        $con1 = mysqli_connect("localhost", "root", "", "login");
                        if (mysqli_connect_errno()) {
                            echo "Failed to connect to Database: " . mysqli_connect_error();
                        }
                        $sql = "SELECT itemname,price,quantity FROM cart WHERE name='$user1' AND status='Purchased'";
                        $now = mysqli_query($con1, $sql) or die("error in printing purchased and pending items");
                        if ($now->num_rows > 0) {
                            echo "<tr>";
                            echo "<th>Item Name</th>";
                            echo "<th>Price(1 UNIT)</th>";
                            echo "<th>Quantity</th>";
                            echo "</tr>";
                            while ($row = $now->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>$row[itemname]</td>";
                                echo "<td>$row[price]</td>";
                                echo "<td>$row[quantity]</td>";
                                echo "</tr>";
                                // mysqli_close($con1);
                            }
                        } else {
                            echo "<h3>NO PURCHASES TILL NOW</h3>";
                        }
                        ?>
                    </table>
                    <h1>ITEMS IN CART</h1>
                    <table>
                        <?php
                        $con1 = mysqli_connect("localhost", "root", "", "login");
                        if (mysqli_connect_errno()) {
                            echo "Failed to connect to Database: " . mysqli_connect_error();
                        }
                        $sql = "SELECT itemname,price,quantity FROM cart WHERE name='$user1' AND status='pending'";
                        $now = mysqli_query($con1, $sql) or die("error in printing purchased and pending items");
                        if ($now->num_rows > 0) {
                            echo "<tr>";
                            echo "<th>Item Name</th>";
                            echo "<th>Price(1 UNIT)</th>";
                            echo "<th>Quantity</th>";
                            echo "</tr>";
                            while ($row = $now->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>$row[itemname]</td>";
                                echo "<td>$row[price]</td>";
                                echo "<td>$row[quantity]</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<h3>NO ITEMS IN CART</h3>";
                        }
                        mysqli_close($con1);
                        ?>
                    </table>
                </div>
            </form>
    </main>
</body>

</html>