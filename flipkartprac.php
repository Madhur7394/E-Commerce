<?php

session_start();
if (isset($_SESSION['user11'])) {
    $a =  $_SESSION['user11'];
} else {
    $a = 'Log In';
}
if (isset($_POST["login"])) {

    if ($_POST['username'] == NULL || $_POST['password'] == NULL) {
        echo '<script>alert("All field are MANDATORY")</script>';
    } else {

        $con  = mysqli_connect("localhost", "root", "", "createacc");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to Database: " . mysqli_connect_error();
        }
        $hi = '0';
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $a = "select fname,lname,email,phone,password from createcont";
        // echo " ".$a;
        // echo " ".$b;
        $now = mysqli_query($con, $a) or die("error1");
        if ($now->num_rows > 0) {
            while ($row = $now->fetch_assoc()) {
                if (($row['fname'] == $user || $row['email'] == $user || $row['phone'] == $user) && $row['password'] == $pass) {
                    $a = $row["fname"];
                    $a1 = $row["lname"];
                    $a2 = $row["email"];
                    $a3 = $row["phone"];
                    $_SESSION['user11'] = $a;
                    $_SESSION['user22'] = $a1;
                    $_SESSION['email12'] = $a2;
                    $_SESSION['phone12'] = $a3;
                    $hi = '1';
                }
            }
        }

        if ($hi == '1') {
            echo '<script>alert("Login Successfull")</script>';
        } else {
            // echo "no data found";
            echo '<script>alert("Invalid Username OR Password")</script>';
        }
        if ($hi != 1) {
            header("location:logincreate.php");
        }
    }
} else if (isset($_POST["main"])) {
    $a = $_SESSION['user123'];
} else if (isset($_POST["outlog"])) {
    session_destroy();
    $a = "Log In";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Welcome To cartSHOP
    </title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        header {
            position: sticky;
            top: 0px;
        }

        .log a {
            text-decoration: none;
        }

        nav {
            /* transform: translate(20px); */
            padding: 0px 0px 0px 30px;
            color: black;
            /* width: 100vw; */
            border: grey 2px sol id;
            height: 54px;
            display: flex;
            /* align-items: center; */
            background-color: blue;
        }

        .logo {
            display: flex;
            /* background-color: red; */
            /* height: 300px; */
            align-items: center;
        }

        nav .logo img {
            height: 80px;

        }

        nav ul {
            display: flex;
            align-items: center;
            /* height: 54px; */
            padding: 0px 0px 0px 25px;
            /* background-color: yellow; */
            /* transform: translate(19px); */
        }

        nav ul li {
            /* background-color: red; */
            list-style: none;
            padding: 0px 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        .search {
            /* position: relative;
            left: 780px; */
            /* background-color: yellow; */
            /* margin: 0px 993px; */
            display: flex;
            align-items: center;
            transform: translatex(38px);
        }

        .search input {

            padding: 0px 36px 0px 16px;
            border: grey 1px solid;
            border-radius: 3px;
            width: 300px;
            height: 32px;
        }

        .logo2 {
            display: flex;
            position: relative;
            /* background-color: yellow; */
            align-items: center;
            left: 11px;
            top: 1px;
        }

        .logo2 button img {
            height: 13px;
            width: 13px;
            /* border: 1px solid black;
            border-radius: 60px; */
        }

        nav ul li a:hover {
            color: yellow;
            font-weight: 520;
        }

        .log {
            /* background-color: red; */
            transform: translatex(94px);
            display: flex;
            align-items: center;
        }

        .log button {
            height: 30px;
            width: 118px;
            font-weight: bold;
            color: blue;
            font-size: 17px;
            background-color: white;
        }


        footer {
            display: flex;
            background-color: rgb(132, 132, 243);
            height: 50px;
            justify-content: center;
            position: sticky;
            bottom: 0px;
        }

        .seller {
            /* background-color: red; */
            transform: translatex(150px);
            display: flex;
            align-items: center;
        }

        .seller a {
            text-decoration: none;
            color: white;
            font-size: 17px;
            font-weight: bolder;

        }

        .cop {
            display: flex;
            align-items: center;
        }

        .content {
            min-height: calc(100vh - 58px - 50px);
            /* display: flex; */
            /* background-color: yellow; */
            justify-content: center;
            background-color: lightgrey;
            height: 155vh;
        }

        .content img {
            height: 300px;
            width: 700px;
            ;
        }

        .box1 {
            height: 145px;
            background-color: white;
            /* width: 99vw; */
            display: flex;
            justify-content: center;
            padding: 8px 0px 0px 0px;
            overflow: hidden;

        }

        .ima {
            /* background-color:red; */
            /* display: flex; */
            /* align-items: center;  */
            /* padding: 8px 0px 0px 0px; */
        }

        .ima p {
            position: relative;
            bottom: 20px;
            padding: 0px 10px 0px 0px;
            text-align: center;
        }

        .box1 img {
            /* background-color: yellow; */
            height: 90px;
            width: 90px;
            align-items: center;
            padding: 8px 36px 25px 25px;
        }

        .mainimg {
            display: flex;
            justify-content: center;
            /* border: 2px solid black; */
            /* padding: 20px 0px 0px 0px; */


        }

        .mainimg img {
            /* background-color: red; */
            height: 240px;
            width: 98vw;
            margin: 17px 0px 10px 0px;
        }

        .sec {
            display: flex;
            flex-direction: column;
            width: 82vw;
            /* background-color: red; */

        }

        .secondcontent {
            height: 6.5vh;
            width: 81vw;
            background-color: white;
            display: flex;
            margin: 0px 7px 0px 8px;
            align-items: center;

        }

        .secondcontent p {
            transform: translatex(18px);
            font-size: 28px;
            font-weight: bold;
            color: black;
        }

        .thirdcontent {
            /* flex-direction: column; */
            margin: 1px 0px 0px 8px;
            height: 290px;
            background-color: white;
            width: 81vw;
            display: flex;
            justify-content: left;
            overflow-x: scroll;
        }

        .thirdimagediv {}

        .thirdimagediv img {
            margin: 30px 5px 8px 0px;
            height: 130px;
            width: 130px;
            padding: 0px 34px;
            animation-name: hovanimate;
            animation-duration: 2s;
            /* animation-timing-function: ease-in; */
        }

        .thirdimagediv p {
            /* background-color: yellow; */
            text-align: center;
        }

        .thirdimagediv ul {
            /* background-color: yellow; */
        }

        .thirdimagediv ul li {
            /* background-color: red; */
            text-align: center;
            list-style: none;
            line-height: 28px;
            /* color: grey; */
        }

        #main {
            color: black;
        }

        #main2 {
            color: lightgreen;
        }

        #main3 {
            color: grey;
        }

        .phonead {
            float: right;
            margin: 0px 6px 0px 0px;
            /* background-color: red; */
        }

        .phonead img {
            height: 341px;
            width: 16.3vw;
        }

        /* .thirdmain {
    background-color: red;
    width: 98vw;
    display: flex;
    height: 41vh;
} */

        .trend {
            height: 6.5vh;
            width: 98vw;
            background-color: white;
            display: flex;
            align-items: center;
            margin: 8px 0px 1px 8px;
        }

        .trend p {
            /* background-color: red; */
            transform: translatex(18px);
            font-size: 28px;
            font-weight: bold;
            color: black;
        }

        .trenddata {
            margin: 0px 0px 0px 8px;
            height: 290px;
            background-color: white;
            width: 98vw;
            display: flex;
            justify-content: left;
            overflow: scroll;
        }

        .ima p:hover {
            color: grey;
            cursor: pointer;
        }

        .thirdimagediv img:hover {
            transform: scale(1.1, 1.1);
            cursor: pointer;
        }

        .ima img:hover {
            transform: scale(1.1, 1.1);
            cursor: pointer;
        }

        .phonead img:hover {
            /* transform: scale(1.1, 1.1); */
            cursor: pointer;
        }

        .thirdimagediv li:hover {
            cursor: pointer;
        }

        button:hover {
            cursor: pointer;
        }

        @media screen and (max-width:1142px) {
            nav {
                height: 43vh;
                display: flex;
                flex-direction: column;
                padding: 0px 0px;
            }

            .logo {
                display: flex;
                /* background-color: red; */
                /* height: 300px; */
                justify-content: center;
                align-items: center;
                padding: 2vh 0vh;
            }

            .seller {
                transform: translatex(0px);
                position: absolute;
                visibility: hidden;
            }

            .log {
                transform: translatex(0px);
                justify-content: center;
            }

            .logo2 {
                display: flex;
                /* position: relative; */
                /* background-color: yellow; */
                align-items: center;
                justify-content: center;
                /* transform: translateX(278px); */
                /* left: 11px; */
                /* top: 1px; */
                padding: 0vh 0vh 2vh 0vh;
            }

            nav ul {
                justify-content: center;
                transform: translatex(0px);
                padding: 0vh 0vh 2vh 0vh;
            }

            .search input {
                width: 37vw;
            }

            .phonead {
                position: absolute;
                visibility: hidden;
            }

            .search {
                justify-content: center;
                padding: 0vh 0vh 2vh 0vh;
                transform: translatex(0px);
            }

            .secondcontent {
                height: 6.5vh;
                width: 98vw;
                background-color: white;
                display: flex;
                margin: 0px 270px 0px 8px;
                align-items: center;
                /* margin: 0px 100px 0px 10px; */
            }

            .thirdcontent {
                margin: 1px 0px 0px 8px;
                height: 290px;
                width: 97.9vw;
                background-color: white;
                display: flex;
                justify-content: left;
                overflow: scroll;
            }

            .box1 {
                overflow-x: scroll;
                justify-content: left;
            }
        }

        @media screen and (min-height:559px) {
            .nav {
                height: 243px;
            }
        }

        .seller button {
            padding: 5px 29px;
            border: 2px solid black;
            border-radius: 4px;
            background-color: white;
            color: darkblue;
            font-weight: bold;
            font-size: 16px;
            /* width: 7.7vw; */
            margin: 0vh 0vw 0vh 32.9vw;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="https://st4.depositphotos.com/20435048/23412/v/1600/depositphotos_234121178-stock-illustration-shopping-cart-logo-design-cart.jpg" alt="error reload pls">
            </div>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
            </ul>
            <div class="search">
                <input type="text" name="search" id="search" placeholder="Search for products,brands and more">
            </div>
            <div class="logo2">
                <button><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Search_Icon.svg/1024px-Search_Icon.svg.png" alt=""></button>
            </div>
            <div class="seller">
                <form action="myacc.php" method="POST">
                    <button name="acc"><?php echo $a ?></button>
                </form>
            </div>
        </nav>
    </header>
    <main class="content">
            <form action="data.php" method="POST">
            <div class="box1">
                <div class="ima">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/flap/128/128/image/f15c02bfeb02d15d.png?q=100" alt="error">
                        <p>Top Offers</p>
                    </a>
                </div>
                <div class="ima">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/flap/128/128/image/29327f40e9c4d26b.png?q=100" alt="error">
                        <p>Grocery</p>
                    </a>
                </div>
                <div class="ima">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/flap/128/128/image/22fddf3c7da4c4f4.png?q=100" alt="error">
                        <p>Mobiles</p>
                    </a>
                </div>
                <div class="ima">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/flap/128/128/image/c12afc017e6f24cb.png?q=100" alt="error">
                        <p>Fashion</p>
                    </a>
                </div>
                <div class="ima">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/flap/128/128/image/69c6589653afdb9a.png?q=100" alt="error">
                        <p>Electronics</p>
                    </a>
                </div>
                <div class="ima">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/flap/128/128/image/69c6589653afdb9a.png?q=100" alt="error">
                        <p>Home</p>
                    </a>
                </div>
                <div class="ima">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/flap/128/128/image/0ff199d1bd27eb98.png?q=100" alt="error">
                        <p>Appliances</p>
                    </a>
                </div>
                <div class="ima">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/flap/128/128/image/71050627a56b4693.png?q=100" alt="error">
                        <p>Travel</p>
                    </a>
                </div>
                <div class="ima">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/flap/128/128/image/dff3f7adcf3a90c6.png?q=100" alt="error">
                        <p>Beauty,Toys & More</p>
                    </a>
                </div>
            </div>
            <div class="mainimg">
                <a href="https://picsum.photos/2000/400">
                    <a href="data.php">
                        <img src="https://picsum.photos/2000/400" alt="error">
                    </a>
                </a>
            </div>
            <div class="phonead">
                <a href="data.php">
                    <img src="https://rukminim1.flixcart.com/flap/464/708/image/a60eb148185597ad.jpg?q=70" alt="">
            </div>
            </a>
            <div class="sec">
                <div class="secondcontent">
                    <p>Deals of the Day </p>
                </div>
                <div class="thirdcontent">
                    <div class="thirdimagediv">
                        <a href="data.php">
                            <img src="https://rukminim1.flixcart.com/image/150/150/ktop5e80/watch/f/q/e/1-lcs-4230-lois-caron-men-original-imag6zfy4nqjnxaf.jpeg?q=70" alt="error">
                            <ul>
                        </a>
                        <li id="main"><b>Best of Styling </b></li>
                        <li id="main2">From Rs699</li>
                        <li id="main3">By VGR & HairKraft</li>
                        </ul>
                    </div>
                    <div class="thirdimagediv">
                        <a href="data.php">
                            <img src="https://rukminim1.flixcart.com/image/150/150/k0tw13k0/cookware-set/g/f/r/8091365308416-30841-prestige-original-imafkgyt8rnbjjet.jpeg?q=70" alt="error">
                            <ul>
                        </a>
                        <li id="main"><b>Kitchen and Dining Ess..</b></li>
                        <li id="main2">Min. 40% off</li>
                        <li id="main3">Best Disscounts!</li>
                        </ul>
                    </div>
                    <div class="thirdimagediv">
                        <a href="data.php">
                            <img src="https://rukminim1.flixcart.com/image/150/150/kqqykcw0/inflatable-product/a/r/4/10-ft-inflatable-family-swimming-pool-full-sized-pool-for-kids-original-imag4zpkh6fg9ksd.jpeg?q=70" alt="error">
                            <ul>
                        </a>
                        <li id="main"><b>Remote Control,Indoor G..</b></li>
                        <li id="main2">upto 80%+Extra10% off</li>
                        <li id="main3">Toys R Us,Hot Wheels & ..</li>
                        </ul>
                    </div>
                    <div class="thirdimagediv">
                        <a href="data.php">
                            <img src="https://rukminim1.flixcart.com/image/150/150/kwpam4w0/shoe/w/k/o/7-la8700-7-layasa-white-original-imag9bnseeavgwaa.jpeg?q=70" alt="error">
                            <ul>
                        </a>
                        <li id="main"><b>Best of Styling </b></li>
                        <li id="main2">From Rs699</li>
                        <li id="main3">By VGR & HairKraft</li>
                        </ul>
                    </div>
                    <div class="thirdimagediv">
                        <a href="data.php">
                            <img src="https://rukminim1.flixcart.com/image/150/150/krdtlzk0/top/l/m/o/l-m0w18646-black-madame-original-imag56gktvyh8f5c.jpeg?q=70" alt="error">
                            <ul>
                        </a>
                        <li id="main"><b>Floral Tops, Bra ,Nightwe..</b></li>
                        <li id="main2">50 - 80 %+Extra10% Off</li>
                        <li id="main3">Harpa,Amante,Chemi...</li>
                        </ul>
                    </div>
                    <div class="thirdimagediv">
                        <a href="data.php">
                            <img src="https://rukminim1.flixcart.com/image/150/150/kffq2kw0-0/sunglass/y/q/k/th-2553-c2-62-62-tommy-hilfiger-original-imafvwe3kfuqt4ge.jpeg?q=70" alt="error">
                            <ul>
                        </a>
                        <li id="main"><b>Fittings And Fixtures</b></li>
                        <li id="main2">Upto 70% Off</li>
                        <li id="main3">Popular Brand</li>
                        </ul>
                    </div>
                    <div class="thirdimagediv">
                        <a href="data.php">
                            <img src="https://rukminim1.flixcart.com/image/150/150/kffq2kw0-0/sunglass/y/q/k/th-2553-c2-62-62-tommy-hilfiger-original-imafvwe3kfuqt4ge.jpeg?q=70" alt="error">
                            <ul>
                        </a>
                        <li id="main"><b>Fittings And Fixtures</b></li>
                        <li id="main2">Upto 70% Off</li>
                        <li id="main3">Popular Brand</li>
                        </ul>
                    </div>
                    <div class="thirdimagediv">
                        <a href="data.php">
                            <img src="https://rukminim1.flixcart.com/image/150/150/kffq2kw0-0/sunglass/y/q/k/th-2553-c2-62-62-tommy-hilfiger-original-imafvwe3kfuqt4ge.jpeg?q=70" alt="error">
                            <ul>
                        </a>
                        <li id="main"><b>Fittings And Fixtures</b></li>
                        <li id="main2">Upto 70% Off</li>
                        <li id="main3">Popular Brand</li>
                        </ul>
                    </div>
                    <div class="thirdimagediv">
                        <a href="data.php">
                            <img src="https://rukminim1.flixcart.com/image/150/150/kffq2kw0-0/sunglass/y/q/k/th-2553-c2-62-62-tommy-hilfiger-original-imafvwe3kfuqt4ge.jpeg?q=70" alt="error">
                            <ul>
                        </a>
                        <li id="main"><b>Fittings And Fixtures</b></li>
                        <li id="main2">Upto 70% Off</li>
                        <li id="main3">Popular Brand</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="trend">
                <p>
                    Trending Offers
                </p>
            </div>
            <div class="trenddata">
                <div class="thirdimagediv">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/image/150/150/ktop5e80/watch/f/q/e/1-lcs-4230-lois-caron-men-original-imag6zfy4nqjnxaf.jpeg?q=70" alt="error">
                        <ul>
                    </a>
                    <li id="main"><b>Best of Styling </b></li>
                    <li id="main2">From Rs699</li>
                    <li id="main3">By VGR & HairKraft</li>
                    </ul>
                </div>
                <div class="thirdimagediv">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/image/150/150/k0tw13k0/cookware-set/g/f/r/8091365308416-30841-prestige-original-imafkgyt8rnbjjet.jpeg?q=70" alt="error">
                        <ul>
                    </a>
                    <li id="main"><b>Kitchen and Dining Ess..</b></li>
                    <li id="main2">Min. 40% off</li>
                    <li id="main3">Best Disscounts!</li>
                    </ul>
                </div>
                <div class="thirdimagediv">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/image/150/150/kqqykcw0/inflatable-product/a/r/4/10-ft-inflatable-family-swimming-pool-full-sized-pool-for-kids-original-imag4zpkh6fg9ksd.jpeg?q=70" alt="error">
                        <ul>
                    </a>
                    <li id="main"><b>Remote Control,Indoor G..</b></li>
                    <li id="main2">upto 80%+Extra10% off</li>
                    <li id="main3">Toys R Us,Hot Wheels & ..</li>
                    </ul>
                </div>
                <div class="thirdimagediv">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/image/150/150/kwpam4w0/shoe/w/k/o/7-la8700-7-layasa-white-original-imag9bnseeavgwaa.jpeg?q=70" alt="error">
                        <ul>
                    </a>
                    <li id="main"><b>Best of Styling </b></li>
                    <li id="main2">From Rs699</li>
                    <li id="main3">By VGR & HairKraft</li>
                    </ul>
                </div>
                <div class="thirdimagediv">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/image/150/150/krdtlzk0/top/l/m/o/l-m0w18646-black-madame-original-imag56gktvyh8f5c.jpeg?q=70" alt="error">
                        <ul>
                    </a>
                    <li id="main"><b>Floral Tops, Bra ,Nightwe..</b></li>
                    <li id="main2">50 - 80 %+Extra10% Off</li>
                    <li id="main3">Harpa,Amante,Chemi...</li>
                    </ul>
                </div>
                <div class="thirdimagediv">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/image/150/150/kffq2kw0-0/sunglass/y/q/k/th-2553-c2-62-62-tommy-hilfiger-original-imafvwe3kfuqt4ge.jpeg?q=70" alt="error">
                        <ul>
                    </a>
                    <li id="main"><b>Fittings And Fixtures</b></li>
                    <li id="main2">Upto 70% Off</li>
                    <li id="main3">Popular Brand</li>
                    </ul>
                </div>
                <div class="thirdimagediv">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/image/150/150/kffq2kw0-0/sunglass/y/q/k/th-2553-c2-62-62-tommy-hilfiger-original-imafvwe3kfuqt4ge.jpeg?q=70" alt="error">
                        <ul>
                    </a>
                    <li id="main"><b>Fittings And Fixtures</b></li>
                    <li id="main2">Upto 70% Off</li>
                    <li id="main3">Popular Brand</li>
                    </ul>
                </div>
                <div class="thirdimagediv">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/image/150/150/kffq2kw0-0/sunglass/y/q/k/th-2553-c2-62-62-tommy-hilfiger-original-imafvwe3kfuqt4ge.jpeg?q=70" alt="error">
                        <ul>
                    </a>
                    <li id="main"><b>Fittings And Fixtures</b></li>
                    <li id="main2">Upto 70% Off</li>
                    <li id="main3">Popular Brand</li>
                    </ul>
                </div>
                <div class="thirdimagediv">
                    <a href="data.php">
                        <img src="https://rukminim1.flixcart.com/image/150/150/kffq2kw0-0/sunglass/y/q/k/th-2553-c2-62-62-tommy-hilfiger-original-imafvwe3kfuqt4ge.jpeg?q=70" alt="error">
                        <ul>
                    </a>
                    <li id="main"><b>Fittings And Fixtures</b></li>
                    <li id="main2">Upto 70% Off</li>
                    <li id="main3">Popular Brand</li>
                    </ul>
                </div>

        </main>
    </form>
    <footer>
        <div class="cop">
            <p>Copyright &copy; cartSHOP.com </p>
        </div>
    </footer>
</body>

</html>