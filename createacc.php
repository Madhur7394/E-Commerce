<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Acc (cartSHOP)</title>
    <style>
        html {
            /* background-color: white; */
            background-image: url(https://kinneygroup.com/wp-content/uploads/2019/10/fw-bg-gradient.png);
            background-size: cover;
            /* background-repeat:unset; */
            height: 100%;
            background-position: center;
        }

        .box {
            /* display: flex; */
            margin: 20vh auto;
            background-color: #4b414161;
            height: 69vh;
            width: 62vw;
            border: 2px solid grey;
            border-radius: 10px;
padding: 0vh 3vw 0vh 0vw;
        }

        .up {
            /* background-color: yellow; */
            display: flex;
            margin: 17px 10px 0px 10px;
            width: 23vw
        }

        .up1 {
            transform: translatex(3vw);
        }

        .up2 {
            transform: translatex(6vw);
        }

        .up1 p {
            color: lightgrey;

        }

        .up2 p {
            color: lightgrey;

        }

        .up a {
            text-decoration: none;
        }

        .central {
            /* background-color: green; */
            /* display: flex;
            flex-direction: column; */
            width: 39vw;
            height: 21vh;
        }

        .up a:hover {
            font-weight: bolder;
        }

        .start {
            /* background-color: yellow; */
            margin: 3vh 0px 0px 0px;
            /* height: 5vh; */
            padding: 1vh 0px 1vh 3.5vw;
            /* width: 35vw; */
            color: grey;
            /* font-size: 1vw; */
        }

        .create {
            /* background-color: darkblue; */
            padding: 1vh 0px 1vh 3.5vw;
            font-size: 30px;
            color: white;
            font-weight: bolder;
            /* width: 35vw; */
            /* height: 6vh; */

        }

        .mem a:hover {
            font-weight: bold;
        }

        .mem {
            display: flex;
            /* background-color: yellow; */
            padding: 1vh 0px 1vh 3.5vw;
            /* width: 35vw; */
            color: whitesmoke;
            /* font-size: 1vw; */

        }

        .mem a {
            margin: 0px 0px 0px 0.6vw;
            text-decoration: none;
            color: navy;
            /* font-size: 1vw; */

        }

        .centra2 {
            /* background-color: rebeccapurple; */
            width: 38vw;
        }

        .centra2 input {
            margin: 0px 0px 1vh 3vw;
            border: 2px solid grey;
            border-radius: 10px;
            height: 3.5vh;
            width: 9.1vw;
            padding: 0px 1vw 0px 1vw;
        }

        #lname {
            padding: 0px 1vw 0px 1vw;
            margin: 0px 0px 0px 1vw;
        }

        #rest {
            width: 21.8vw;
        }

        .centra2 input:hover {
            border: 2px solid blue;
        }

        .centra2 input:focus {
            /* border: 3px solid blue; */
            border: 2px solid blue;
            outline: 2px solid blue;
            /* color: red; */
        }

        button {
            margin: 2vh 0vw 0px 44px;
            width: 24.12vw;
            background-color: rgb(107, 107, 255);
            border: 2px solid grey;
            border-radius: 26px;
            height: 5.7vh;
        }

        button a {
            text-decoration: none;
            color: white;
            font-weight: bolder;
            font-size: 2vh;
        }

        button:hover {
            cursor: pointer;
            border: 2px solid grey;
        }

        button:focus {
            border: 0px;
            outline: 0px;
        }

        .imgm {
            float: right;
            /* background: red; */
            display: flex;
            height: 69vh;
            align-items: center;
        }

        .box img {
            /* float: right; */
            height: 50.9vh;
            width: 23vw;
            border-radius: 1100px;
            /* transform: translate(-4vw,8vh); */
            /* margin: 3vh 2vw 0px 0px; */
            /* opacity: 0.6; */
            /* background-color: red; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box img:hover {
            /* transform: translate(-4vw,8vh); */
            transform: scale(1.1, 1.1);
        }

        @media screen and (max-width:711px) {
            .start {
                position: absolute;
                visibility: hidden;
            }

            .mem {
                font-size: 17px;
                flex-direction: column;
            }

            .create {
                font-size: 18px;
            }

            .central {
                height: 22vh;
            }

            .centra2 input {
                width: 13.9vw;
            }

            .centra2 {
                width: 61vw;
            }

            #rest {
                width: 52.2vw;
            }

            #lname {
                width: 23.7vw;
            }

            .box img {
                position: absolute;
                visibility: hidden;
            }

            #fname {
                width: 23.7vw;
            }

            .up {
                margin: 1px;
            }

            .box button {
                width: 44vw;
            }
        }

        @media screen and (max-width:229px) {
            .central {
                height: 27vh;
            }
        }
    </style>
</head>

<body>
    <form method="POST" action="myacc.php">
        <main>
            <div class="box">
                <div class="imgm">
                    <a href="flipkartprac.php">
                        <img src="https://st4.depositphotos.com/20435048/23412/v/1600/depositphotos_234121178-stock-illustration-shopping-cart-logo-design-cart.jpg" alt="error">
                    </a>
                </div>
                <div class="up">
                    <div class="up1">
                        <a href="flipkartprac.php">
                            <p>Home</p>
                        </a>
                    </div>
                    <div class="up2">
                        <a href="">
                            <p>Join</p>
                        </a>
                    </div>
                </div>
                <div class="central">
                    <div class="start">
                        START FOR FREE
                    </div>
                    <div class="create">
                        Create new account
                    </div>
                    <div class="mem">
                        Already a Member?
                        <a href="logincreate.php">Log in</a>
                    </div>
                </div>
                <div class="centra2">
                    <div class="input1">
                        <input type="text" name="fname" id="fname" placeholder="First name" value="">
                        <input type="text" name="lname" id="lname" placeholder="Last name" value="">
                    </div>
                    <div class="input2">
                        <input type="text" name="email" id="rest" placeholder="Email" value="">
                    </div>
                    <div class="input3">
                        <input type="number" name="phone" id="rest" placeholder="Phone no" value="">
                    </div>
                    <div class="input3">
                        <input type="password" name="password" id="rest" placeholder="Password" value="">
                    </div>
                    <button value="create" name="create">
                        <a href="">Create account</a>
                    </button>
                </div>
            </div>
        </main>
    </form>
</body>

</html>