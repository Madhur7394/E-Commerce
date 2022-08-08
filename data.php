<?php
session_start();
$r = 'pending';
if (isset($_SESSION['user11'])) {
    $name = $_SESSION['user11'];
} else {
}
$con  = mysqli_connect("localhost", "root", "", "login");
if (mysqli_connect_errno()) {
    echo "Failed to connect to Database: " . mysqli_connect_error();
}
$s = 0;
$sql4 = "select name,itemname,status from cart ";
$now = mysqli_query($con, $sql4);
while ($row = $now->fetch_assoc()) {
    if ($row['name'] == $name && $row['status'] == 'pending') {
        $s++;
        // echo"this is s " . $s;
    }
}
$x = 1;
while ($x <= $s) {
    $u = 'del' . $x;
    $u1 = 'del1' . $x++;
    if (isset($_POST[$u])) {
        $k = $_SESSION[$u];
        $k1 = $_SESSION[$u1];
        if ($k1 == 1) {
            $sql = "delete from cart where name='$name' and itemname='$k'";
        } else {
            $k1--;
            $sql = "Update cart set quantity= $k1 where itemname='$k'and name='$name'";
        }
        $now = mysqli_query($con, $sql) or die("error deleting");
        if ($now) {
            echo  '<script> alert("DELETED SUCCESFULLY")</script>';
        }
    }
}
if (isset($_POST["purch"])) {
    $x = 1;
    echo $s;
    while ($x <= $s) {
        $u = 'del' . $x;
        $u1 = 'del1' . $x++;
        // echo $u . "<br>";
        // echo $u1 . "<br>";
        $k = $_SESSION[$u];
        $k1 = $_SESSION[$u1];
        // echo $k . "<br>";
        // echo $k1 . "<br>";
        $sql = "select name,itemname,price,status,quantity from cart where name='$name' and itemname='$k' and status='Purchased' ";
        $now = mysqli_query($con, $sql) or die("error somewhere here");
        if ($now->num_rows > 0) {
            $row = $now->fetch_assoc();
            $v = $row['quantity'];
            $v = $v + $k1;
            $sql1 = "Update cart set quantity= $v where itemname='$k'and name='$name' and status='Purchased'";
            $sql2 = "DELETE FROM cart where itemname='$k'and name='$name' and status='pending'";
            $now2 = mysqli_query($con, $sql2) or die("error in purch");
        } else {
            $sql1 = "Update cart set status='Purchased' where itemname='$k'and name='$name' and status='pending'";
        }
        $now1 = mysqli_query($con, $sql1) or die("error in purch");
    }
    if ($now1) {
        echo '<script> alert("Congrats all items Purchased")</script>';
    }
} else if (isset($_POST["W1"])) {
    $s = 0;
    $w1 = $_SESSION['W1'];
    $w11 = $_SESSION['W11'];
    $r = 'pending';
    $sql1 = "select name,itemname,status,quantity from cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $w1 && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity = $s WHERE itemname= '$w1' and name= '$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$w1','$w11','$r','1')";
    }
    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");


    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["W2"])) {
    $s = 0;
    $w2 = $_SESSION['W2'];
    $w22 = $_SESSION['W22'];
    $sql1 = "select name,itemname,status,quantity from cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $w2 && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity = $s WHERE itemname= '$w2' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$w2','$w22','$r','1')";
    }
    $now = mysqli_query($con, $sql) or die("error in connecting to database 3");
    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["W3"])) {
    $s = 0;
    $w3 = $_SESSION['W3'];
    $w33 = $_SESSION['W33'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $w3  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$w3' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$w3','$w33','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["W4"])) {
    $s = 0;
    $w4 = $_SESSION['W4'];
    $w44 = $_SESSION['W44'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $w4  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity=$s WHERE itemname ='$w4' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$w4','$w44','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["W5"])) {
    $s = 0;
    $w5 = $_SESSION['W5'];
    $w55 = $_SESSION['W55'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $w5  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$w5' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$w5','$w55','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["W6"])) {
    $s = 0;
    $w6 = $_SESSION['W6'];
    $w66 = $_SESSION['W66'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $w6  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$w6' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$w6','$w66','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["M1"])) {
    $s = 0;
    $m1 = $_SESSION['M1'];
    $m11 = $_SESSION['M11'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $m1  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$m1' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$m1','$m11','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["M2"])) {
    $s = 0;
    $m2 = $_SESSION['M2'];
    $m22 = $_SESSION['M22'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $m2  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$m2' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$m2','$m22','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["M3"])) {
    $s = 0;
    $m3 = $_SESSION['M3'];
    $m33 = $_SESSION['M33'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $m3  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$m3' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$m3','$m33','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["M4"])) {
    $s = 0;
    $m4 = $_SESSION['M4'];
    $m44 = $_SESSION['M44'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $m4  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$m4' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$m4','$m44','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["M5"])) {
    $s = 0;
    $m5 = $_SESSION['M5'];
    $m55 = $_SESSION['M55'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $m5  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$m5' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$m5','$m55','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["M6"])) {
    $s = 0;
    $m6 = $_SESSION['M6'];
    $m66 = $_SESSION['M66'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $m6  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$m6' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$m6','$m66','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["T1"])) {
    $s = 0;
    $t1 = $_SESSION['T1'];
    $t11 = $_SESSION['T11'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $t1  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$t1' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$t1','$t11','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["L1"])) {
    $s = 0;
    $l1 = $_SESSION['L1'];
    $l11 = $_SESSION['L11'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $l1  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$l1' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$l1','$l11','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["T2"])) {
    $s = 0;
    $t2 = $_SESSION['T2'];
    $t22 = $_SESSION['T22'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $t2  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$t2' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$t2','$t22','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["L2"])) {
    $s = 0;
    $l2 = $_SESSION['L2'];
    $l22 = $_SESSION['L22'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $l2  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$l2' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$l2','$l22','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["T3"])) {
    $s = 0;
    $t3 = $_SESSION['T3'];
    $t33 = $_SESSION['T33'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $t3  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$t3' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$t3','$t33','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["L3"])) {
    $s = 0;
    $l3 = $_SESSION['L3'];
    $l33 = $_SESSION['L33'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $l3  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$l3' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$l3','$l33','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["T4"])) {
    $s = 0;
    $t4 = $_SESSION['T4'];
    $t44 = $_SESSION['T44'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $t4  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$t4' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$t4','$t44','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["L4"])) {
    $s = 0;
    $l4 = $_SESSION['L4'];
    $l44 = $_SESSION['L44'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $l4  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$l4' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$l4','$l44','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["T5"])) {
    $s = 0;
    $t5 = $_SESSION['T5'];
    $t55 = $_SESSION['T55'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $t5  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$t5' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$t5','$t55','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["L5"])) {
    $s = 0;
    $l5 = $_SESSION['L5'];
    $l55 = $_SESSION['L55'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $l5  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$l5' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$l5','$l55','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["T6"])) {
    $s = 0;
    $t6 = $_SESSION['T6'];
    $t66 = $_SESSION['T66'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $t6  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$t6' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$t6','$t66','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} else if (isset($_POST["L6"])) {
    $s = 0;
    $l6 = $_SESSION['L6'];
    $l66 = $_SESSION['L66'];
    $sql1 = "SELECT name,itemname,status,quantity FROM cart";
    $now2 = mysqli_query($con, $sql1) or die("error in connecting to database");
    while ($row = $now2->fetch_assoc()) {
        if ($row['itemname'] == $l6  && $row['name'] == $name && $row['status'] == 'pending') {
            $s = $row['quantity'];
            $s++;
        }
    }
    if ($s > 0) {
        $sql = "UPDATE cart SET quantity= $s WHERE itemname = '$l6' and name='$name'";
    } else {
        $sql = "INSERT into cart(name,itemname,price,status,quantity) VALUES('$name','$l6','$l66','pending','1')";
    }

    $now = mysqli_query($con, $sql) or die("error in connecting to database 2");

    if ($now) {
        echo '<script>alert("Item added to Cart") </script>';
    }
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta cha&#8377et="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html {
            background-color: lightgrey;
            width: 100%;

        }

        nav {
            background-color: blue;
            /* width: 100vw; */
            height: 10vh;
            display: flex;
            align-items: center;
        }

        .main {
            background-color: white;
            height: 6vh;
            margin: 2vh 0vw 0vh 0vw;
            display: flex;
            padding: 0vh 0vw 0vh 1.4vw;
            align-items: center;
            font-size: 22px;
            margin: 2vh 3vw 0vh 3vw;
            border: 3px solid white;
            border-radius: 8px;
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 0px;
        }

        .maindata {
            border: 3px solid white;
            border-radius: 8px;
            border-top-right-radius: 0px;
            display: flex;
            border-top-left-radius: 0px;
            background-color: white;
            height: 45vh;
            margin: 1vh 3vw 3vh 3vw;
            /* overflow: scroll; */
            /* overflow-y: hidden; */
        }

        .watch {
            /* background-color: red; */
            margin: 3vh 3.6vw 0vh 3.8vw;
            display: flex;
            flex-direction: column;
            display: flex;
            align-items: center;
            /* justify-content: center; */

        }

        .watch img {
            width: 8vw;
            height: 27vh;
            /* margin: 5vh 0px 0px 3vw; */

        }

        .watch ol {
            justify-content: center;
            align-items: center;
            /* background-color: grey; */
            margin: 2.4vh 0px 0px 0vw;
        }

        .watch li {
            list-style: none;
            margin: 1vh 0px 0px 0vw;
        }

        .laptop {
            /* background-color: red; */
            margin: 3vh 3vw 0vh 3vw;
            display: flex;
            flex-direction: column;
            display: flex;
            align-items: center;
            /* justify-content: center; */

        }

        #lapmaindata {
            overflow: scroll;
            overflow-y: hidden;

        }

        .laptop img {
            width: 16vw;
            height: 25vh;
            /* margin: 5vh 0px 0px 3vw; */

        }

        .laptop ol {
            justify-content: center;
            align-items: center;
            /* background-color: grey; */
            margin: 2.4vh 0px 0px 0vw;
        }

        .laptop li {
            list-style: none;
            margin: 1vh 0px 0px 0vw;
        }

        .laptop button {
            background-color: white;
            border: 0px;
        }

        .watch button {
            background-color: white;
            border: 0px;
        }

        button:hover {
            cursor: pointer;
        }

        img:hover {
            transform: scale(1.1, 1.1);
        }

        .mainpage {
            height: 24px;
            margin: 0vh 0vw 0vh 2vw;
            font-size: 23px;
            font-weight: bolder;
        }

        .mainpage button {
            border: 0px;
            color: white;
            background-color: blue;
            font-size: 19px;
            font-weight: bolder;
            color: white;
        }

        .cart {
            /* height: 24px; */
            margin: 0vh 0vw 0vh 3vw;
            font-size: 23px;
            font-weight: bolder;
            /* display: flex; */
            /* background-color: green; */
        }

        .cart button {
            border: 0px;
            color: white;
            display: flex;
            background-color: blue;
            font-size: 19px;
            font-weight: bolder;
            align-items: center;
            justify-content: center;
            margin: 0vh 0vw 0vh 11.4vw;
        }

        .welcome {
            background-color: yellow;
            padding: 12px 70px 12px 70px;
            color: red;
            margin: 0vh 0vw 0vh 19.5vw;
            font-weight: bolder;
            font-size: 23px;
            letter-spacing: 14px;
            width: 37.55vw;
        }

        .cart img {
            height: 5vh;
            width: 3.5vw;
        }

        .cart img:hover {
            transform: scale(1, 1);
        }

        header {
            position: sticky;
            top: 0px;
        }

        #main2 {
            display: none;
        }

        .incartitem {
            margin: 5vh 0vw 3vh 4vw;
            font-size: 30px;
            font-weight: bolder;
            word-spacing: 12px;
            letter-spacing: 6px;
        }

        table {
            padding: 3vh 0vw 8vh 0vw;
            /* border: 2px solid black; */
            margin: auto;
            /* background-color: blue; */
            width: 80vw;
        }

        td {
            width: 34vw;
            /* border: 2px solid black; */
            text-align: center;
            padding: 18px 0px;
        }

        th {
            /* background-color: yellow; */
            font-size: 18px;
            border: 2px solid black;
            padding: 13px 0px;
            border-left-color: lightgrey;
            border-right-color: lightgrey;
            background-color: darkgrey;
        }

        .purchase {
            /* margin: 0px 0px 0px 4vw; */
            /* background-color: red; */
            display: flex;
            justify-content: center;
        }

        .purchase button {
            padding: 12px 24px;
            border: 2px solid black;
            border-radius: 22px;
            width: 48vw;
            background-color: blue;
            color: white;
            font-weight: bolder;
        }

        #but2 {
            display: none;
        }

        table button {
            padding: 7px 12px;
            border: 2px;
            border-radius: 9px;
            background-color: yellow;
            color: black;
            font-weight: bold;
        }
    </style>

    <script>
        function clickedd() {
            document.getElementById("main1").style.display = 'none';
            document.getElementById("main2").style.display = 'block';
            document.getElementById("but1").style.display = 'none';
            document.getElementById("but2").style.display = 'flex';
        }

        function clickedd1() {
            document.getElementById("main1").style.display = 'block';
            document.getElementById("main2").style.display = 'none';
            document.getElementById("but1").style.display = 'flex';
            document.getElementById("but2").style.display = 'none';
        }
    </script>

</head>

<body>
    <header>
        <nav>
            <div class="mainpage">
                <form action="myacc.php" method="POST">
                    <button name="datahold">
                        <?php
                        $ab = $_SESSION['user11'];
                        $abc = $_SESSION['user22'];
                        $abcd = $_SESSION['email12'];
                        $abcde = $_SESSION['phone12'];
                        echo $ab;
                        $_SESSION['user11'] = $ab;
                        $_SESSION['user22'] = $abc;
                        $_SESSION['email12'] = $abcd;
                        $_SESSION['phone12'] = $abcde;
                        ?>
                    </button>
                </form>
            </div>
            <div class="welcome">
                <p>WELCOME TO CARTSHOP</p>
            </div>
            <div class="cart">
                <button onclick="clickedd()" id="but1">
                    <img src="https://cdn.shopify.com/app-store/listing_images/2b9bba2ab61edabc6d836f14f9377671/icon/CL-Lhc30lu8CEAE=.png" alt="">
                    <p>MY CART
                    </p>
                </button>
                <button onclick="clickedd1()" id="but2">
                    <img src="https://cdn.shopify.com/app-store/listing_images/2b9bba2ab61edabc6d836f14f9377671/icon/CL-Lhc30lu8CEAE=.png" alt="">
                    <p>SHOP
                    </p>
                </button>
            </div>
        </nav>
    </header>
    <main id="main1">
        <form action="data.php" method="POST">
            <div class="main">
                Watches
            </div>
            <div class="maindata">
                <div class="watch">
                    <button name="W1">
                        <img src="https://rukminim1.flixcart.com/image/660/792/k02qnww0/watch/4/r/j/ex499-casio-original-imafjxzz25p6trtr.jpeg?q=50" alt="">
                        <ol>
                            <button name="W1">
                                <li>Edifice Black Edition</li>
                                <li>&#8377 8,019</li>
                            </button>
                            <?php $_SESSION['W1'] = 'Edifice Black Edition' ?>
                            <?php $_SESSION['W11'] = 'Rs 8,019' ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="W2">
                        <img src="https://m.media-amazon.com/images/I/81ucvM6RfFL._AC_UL480_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Edifice Golden Edition</li>
                            <?php $_SESSION['W2'] = 'Edifice Golden Edition' ?>
                            <li>&#8377 7,339</li>
                            <?php $_SESSION['W22'] = 'Rs 7,339' ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="W3">
                        <img src="https://m.media-amazon.com/images/I/51nOjfdCuBL._AC_UL480_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Rado Rare Edition</li>
                            <?php $_SESSION['W3'] = 'Rado Rare Edition' ?>
                            <li>&#8377 15,720</li>
                            <?php $_SESSION['W33'] = 'Rs 15,72' ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="W4">
                        <img src="https://rukminim1.flixcart.com/image/660/792/ku2zjww0/watch/m/k/b/g1138-gba-900-7adr-casio-men-original-imag79yf382kqrfr.jpeg?q=50" alt="">
                        <ol>
                            <li>G-SHOCK New Edition</li>
                            <?php
                            $_SESSION['W4'] = 'G-SHOCK NEW Edition' ?>
                            <li>&#8377 9,220</li>
                            <?php
                            $_SESSION['W44'] = 'Rs 9,220'
                            ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="W5">
                        <img src="https://rukminim1.flixcart.com/image/660/792/jur9nrk0/watch/u/c/c/nh1639sm02-titan-original-imaff77gpby5gydp.jpeg?q=50" alt="">
                        <ol>
                            <li>Titan Goldenblack Edition</li>
                            <?php $_SESSION['W5'] = 'Titan Goldenblack Edition' ?>
                            <li>&#8377 4,219</li>
                            <?php $_SESSION['W55'] = 'Rs 4,219' ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="W6">
                        <img src="https://rukminim1.flixcart.com/image/660/792/l3929ow0/watch/s/1/1/1-3287qm02-fastrack-men-original-imageevbgkyre2cv.jpeg?q=50" alt="">
                        <ol>
                            <li>Fasttrack Bluish Edition</li>
                            <li>&#8377 3,209</li>
                            <?php $_SESSION['W6'] = 'Fasttrack Bluish Edition' ?>
                            <?php $_SESSION['W66'] = 'Rs 3,209' ?>
                        </ol>
                    </button>
                </div>
            </div>
            <div class="main">
                mobiles
            </div>
            <div class="maindata">
                <div class="watch">
                    <button name="M1">
                        <img src="https://m.media-amazon.com/images/I/61i8Vjb17SL._AC_UY327_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li> Iphone 13 Pro Max </li>
                            <li>&#8377 1,36,900 </li>
                            <?php $_SESSION['M1'] = ' Iphone 13 Pro Max' ?>
                            <?php $_SESSION['M11'] = 'Rs 1,36,900' ?>
                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="M2">
                        <img src="https://m.media-amazon.com/images/I/61VuVU94RnL._AC_UY327_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Iphone 13 </li>
                            <li>&#8377 72,500 </li>
                            <?php $_SESSION['M2'] = 'Iphone 13                 ' ?>
                            <?php $_SESSION['M22'] = 'Rs 72,500  ' ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="M3">
                        <img src="https://m.media-amazon.com/images/I/71MmJNwZcML._AC_UY327_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Galaxy Fold Z3 </li>
                            <li>&#8377 1,52,019 </li>
                            <?php $_SESSION['M3'] = 'Galaxy Fold Z3                 ' ?>
                            <?php $_SESSION['M33'] = 'Rs 1,52,019' ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="M4">
                        <img src="https://m.media-amazon.com/images/I/71BoiXkrEmL._AC_UY327_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>One Plus 10R </li>
                            <li>&#8377 45,999 </li>
                            <?php $_SESSION['M4'] = 'One Plus 10R                  ' ?>
                            <?php $_SESSION['M44'] = 'Rs 45,999  ' ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="M5">
                        <img src="https://m.media-amazon.com/images/I/71otei-O3-L._AC_UY327_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Oppo Reno 6 Pro </li>
                            <li>&#8377 22,199 </li>
                            <?php $_SESSION['M5'] = 'Oppo Reno 6 Pro                ' ?>
                            <?php $_SESSION['M55'] = 'Rs 22,199  ' ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="M6">
                        <img src="https://m.media-amazon.com/images/I/71Od5yJbohL._AC_UY327_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Xiamoi 11T Pro </li>
                            <li>&#8377 49,990 </li>
                            <?php $_SESSION['M6'] = 'Xiamoi 11T Pro                 ' ?>
                            <?php $_SESSION['M66'] = 'Rs 49,990  ' ?>

                        </ol>
                    </button>
                </div>
            </div>
            <div class="main">
                laptops
            </div>
            <div class="maindata" id="lapmaindata">
                <div class="laptop">
                    <button name="L1">
                        <img src="https://m.media-amazon.com/images/I/61q6x-ll5FL._AC_UY327_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Lenovo Ideapad 330 </li>
                            <li>&#8377 62,019 </li>
                            <?php $_SESSION['L1'] = 'Lenovo Ideapad 330      ' ?>
                            <?php $_SESSION['L11'] = 'Rs 62,019          ' ?>

                        </ol>
                    </button>
                </div>
                <div class="laptop">
                    <button name="L2">
                        <img src="https://m.media-amazon.com/images/I/71S8U9VzLTL._AC_UY327_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Asus Zen 2 </li>
                            <li>&#8377 82,019 </li>
                            <?php $_SESSION['L2'] = 'Asus Zen 2              ' ?>
                            <?php $_SESSION['L22'] = 'Rs 82,019          ' ?>

                        </ol>
                    </button>
                </div>
                <div class="laptop">
                    <button name="L3">
                        <img src="https://m.media-amazon.com/images/I/71Ff0Ap49HS._AC_UY327_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>HP Spector </li>
                            <li>&#8377 1,22,019 </li>
                            <?php $_SESSION['L3'] = 'HP Spector              ' ?>
                            <?php $_SESSION['L33'] = 'Rs 1,22,019        ' ?>

                        </ol>
                    </button>
                </div>
                <div class="laptop">
                    <button name="L4">
                        <img src="https://m.media-amazon.com/images/I/61km1VkaCsL._AC_UY327_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Lenovo Yoga </li>
                            <li>&#8377 62,019 </li>
                            <?php $_SESSION['L4'] = 'Lenovo Yoga             ' ?>
                            <?php $_SESSION['L44'] = 'Rs 62,019          ' ?>

                        </ol>
                    </button>
                </div>
                <div class="laptop">
                    <button name="L5">
                        <img src="https://m.media-amazon.com/images/I/81RHHnGydgL._AC_UY327_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Mi Notebook Ultra </li>
                            <li>&#8377 61,999 </li>
                            <?php $_SESSION['L5'] = 'Mi Notebook Ultra       ' ?>
                            <?php $_SESSION['L55'] = 'Rs 61,999          ' ?>

                        </ol>
                    </button>
                </div>
                <div class="laptop">
                    <button name="L6">
                        <img src="https://m.media-amazon.com/images/I/61TWFbueNiL._AC_UY327_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Acer Aspire 3 </li>
                            <li>&#8377 33,019 </li>
                            <?php $_SESSION['L6'] = 'Acer Aspire 3           ' ?>
                            <?php $_SESSION['L66'] = 'Rs 33,019          ' ?>

                        </ol>
                    </button>
                </div>
            </div>
            <div class="main">
                Toys
            </div>
            <div class="maindata">
                <div class="watch">
                    <button name="T1">
                        <img src="https://m.media-amazon.com/images/I/51bsz1IfBdL._AC_UL480_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Pink Teddy </li>
                            <li>&#8377 660 </li>
                            <?php $_SESSION['T1'] = 'Pink Teddy              ' ?>
                            <?php $_SESSION['T11'] = 'Rs 660             ' ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="T2">
                        <img src="https://m.media-amazon.com/images/I/71vR5x1yMSL._AC_UL480_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Magic Spring rainbow </li>
                            <li>&#8377 99 </li>
                            <?php $_SESSION['T2'] = 'Magic Spring rainbow    ' ?>
                            <?php $_SESSION['T22'] = 'Rs 99              ' ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="T3">
                        <img src="https://m.media-amazon.com/images/I/71WvmM+vlFL._AC_UL480_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Toy Gun </li>
                            <li>&#8377 290 </li>
                            <?php $_SESSION['T3'] = 'Toy Gun                 ' ?>
                            <?php $_SESSION['T33'] = 'Rs 290             ' ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="T4">
                        <img src="https://m.media-amazon.com/images/I/61Pg1H7U15L._AC_UL480_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>LCD Writing Tablet </li>
                            <li>&#8377 237 </li>
                            <?php $_SESSION['T4'] = 'LCD Writing Tablet      ' ?>
                            <?php $_SESSION['T44'] = 'Rs 237             ' ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="T5">
                        <img src="https://m.media-amazon.com/images/I/71bqDQKJwUL._AC_UL480_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Car set </li>
                            <li>&#8377 400 </li>
                            <?php $_SESSION['T5'] = 'Car set                 ' ?>
                            <?php $_SESSION['T55'] = 'Rs 400             ' ?>

                        </ol>
                    </button>
                </div>
                <div class="watch">
                    <button name="T6">
                        <img src="https://m.media-amazon.com/images/I/51pmXKlzCFL._AC_UL480_FMwebp_QL65_.jpg" alt="">
                        <ol>
                            <li>Toy Scooter </li>
                            <li>&#8377 300 </li>
                            <?php $_SESSION['T6'] = 'Toy Scooter             ' ?>
                            <?php $_SESSION['T66'] = 'Rs 300             ' ?>

                        </ol>
                    </button>
                </div>
            </div>

    </main>
    <main id="main2">
        <div class="incartitem">
            ITEMS IN CART
        </div>
        <table>
            <?php
            $x = 1;
            $u = 0;
            $con  = mysqli_connect("localhost", "root", "", "login");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to Database: " . mysqli_connect_error();
            }
            $sql = "SELECT itemname,price,quantity FROM cart WHERE name= '$name' AND status='pending' ";
            $now = mysqli_query($con, $sql);
            if ($now->num_rows > 0) {

                echo '<tr>';
                echo '<th>Item Name</th>';
                echo '<th>Price</th>';
                echo '<th>Quantity</th>';
                echo '<th>Delete</th>';
                echo '</tr>';
                while ($row = $now->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>$row[itemname]</td>";
                    echo "<td>$row[price]</td>";
                    echo "<td>$row[quantity]</td>";
                    $u = 'del' . $x;
                    // echo $u . "      " . "<br>";
                    $u1 = 'del1' . $x++;
                    // echo $u1 . "     " . "<br>";
                    $_SESSION[$u] = $row['itemname'];
                    $_SESSION[$u1] = $row['quantity'];
                    echo "<td>
                    <button name='$u'>Delete</button>
                    </td>";
                    echo "</tr>";
                }
            } else {

                echo '<td>NO ITEMS IN CART TO PURCHASE</td>';
            }
            ?>
        </table>
        <div class="purchase">
            <button name="purch" id="use">
                PURCHASE ALL
            </button>
        </div>

    </main>
    <footer>

    </footer>
    </form>
</body>

</html>