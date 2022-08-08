
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        html {
            background-image: url(https://wallpapercave.com/wp/wp6981568.jpg);
            background-repeat: no repeat;
            background-size:cover;
            height: 100vh;
        }

        .box {
            margin: 24px auto;
            width: 33vw;
            height: 56vh;
            background-color: whitesmoke;
            padding: 24px;
            border: 2px grey solid;
            border-radius: 5px;
        }

        .log {
            display: flex;
            /* background-color: yellow; */
            justify-content: center;
            padding: 14px;
            margin: 18px 0px 0px 0px;
            word-spacing: 6px;
        }

        .input {
            display: flex;
            flex-direction: column;
            /* background-color: grey; */
            padding: 14px;
            margin: 16px 0px 0px 0px;
        }

        input {
            transform: translatex(40px);
            margin: 0px 0px 20px 0px;
            width: 25vw;
            height: 1vh;
            padding: 13px;
            border: grey 2px solid;
            border-radius: 5px;
        }

        .log p {
            /* background-color: green; */
            font-size: 24px;
        }

        input::placeholder {
            font-style: italic;
        }

        .input a {
            text-decoration: none;
            /* background-color: blue; */
            display: flex;
            justify-content: right;
            margin: 0px 25px;
            /* width: 29vw; */
            color: darkblue;
            font-size: 15px;
        }

        #mainpass {
            margin: 0px 0px 17px 0px;
        }

        .login {
            /* background-color: orange; */
            padding: 29px;
            display: flex;
            justify-content: center;
        }

        .login button {
            margin: 0px 0px 0px 20px;
            height: 5.2vh;
            width: 27vw;
            background-color: blue;
            color: white;
            border: darkgrey 2px solid;
            border-radius: 5px;

        }

        span {
            margin: 22px 0px 0px 0px;
        }

        .last {
            display: flex;
            /* padding: 29px; */
            /* background-color: blue; */
            height: 7vh;
            justify-content: center;
            align-items: flex-end;
        }

        .last p {
            color: grey;
        }

        .last a {
            margin: 0px 0px 0px 8px;
            text-decoration: none;
        }

        .login button:hover {
            cursor: pointer;
        }

        .start {
            display: flex;
            flex-direction: column;
            justify-content: end;
            align-items: center;
            /* background-color: red; */
            height: 200px;
        }

        .start img {
            margin: 100px 0px 0px 0px;
            height: 16vh;
            width: 6.8vw;
        }

        .start h1 {
            letter-spacing: 5px;
            font-weight: bolder;
            margin: 16px 0px 0px 0px;
            color: blue;
        }

        .start img:hover {
            transform: scale(1.1, 1.1);
        }

        .start h1:hover {
            font-weight: bolder;
            color: white;
        }

        .start a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <main class="content">
        <form method="POST" action="flipkartprac.php">
            <div class="start">
                <a href="flipkartprac.php">
                    <img src="https://st4.depositphotos.com/20435048/23412/v/1600/depositphotos_234121178-stock-illustration-shopping-cart-logo-design-cart.jpg" alt="error">
                </a>
                <a href="flipkartprac.php">
                    <h1>CARTSHOP</h1>
                </a>
            </div>
            <div class="box">
                <div class="log">
                    <p>Login In to Your Account </p>
                </div>
                <div class="input">
                    <input type="text" name="username" id="main" placeholder="Email or Phone or Username">
                    <input type="password" name="password" id="mainpass" placeholder="Password">
                    <a href="">Forgot Password?</a>
                </div>
                <div class="login">
                    <button name="login">Log In</button>
                </div>
                <div class="last">
                    <p>Need an account?</p>
                    <a href="createacc.php">Sign up</a>
                </div>
            </div>
        </form>
    </main>
</body>

</html>