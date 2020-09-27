<?php
session_start();

if(isset($_COOKIE["user"])) {
    echo "<script type='text/javascript'>location.href = '../';</script>";
}

$state = "Login";

$servername = "localhost";
$username = "db_admin";
$password = "qwertorros7089";

$conn = new mysqli($servername, $username, $password);

$conn->query("USE elemental5");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$conn->query("SELECT TABLE users");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

ob_start();

if(isset($_POST['sub'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $sql = "SELECT name FROM users WHERE pass = $pass";
    if ($conn->query($sql) === FALSE) {
        echo "<script>document.getElementById('action').innerHTML = 'Wrong!'</script>";
        die();
    }
    $result = $conn->query($sql);
    $check = $result->fetch_assoc();
    print_r($check);
    if($check['name'] == $name) {
        echo "<script>document.getElementById('action').innerHTML = 'Success!'</script>";

        $sql = "SELECT id FROM users WHERE pass = $pass";
        $result = $conn->query($sql);
        $id = $result->fetch_assoc();

        setcookie("user", $id['id'], time() + (86400 * 30), "/");
    }
}
echo "
<!DOCTYPE html>
<html>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'>
    <style>
        body {
            background-image: url('background.png');
            font-family: 'Open Sans', sans-serif;
        }

        #login-wrap {
            margin:0 auto;
            background-color: white;
            border: 1px solid white;
            border-radius: 25px;
            width: 30%;
            margin-top: 10%;
            text-align: center;
        }

        #header {
            font-size: 2em;
            margin: 1em;
        }
        .desc {
            font-size: 1em;
            color: #969696;
        }

        input {
            border: 1px solid black;
            border-radius: 10px;
            background-color: white;
            transition: .2s;
        }

        input:hover {
            background-color: #4287f5;
            color: white;
            transition: .2s;
        }
        
        a {
            text-decoration: none;
            color: #4287f5;
        }
    </style>
    <body>
        <div id='login-wrap'>
            <img src='e5.png' style='width: 30%; height: 30%;'/> <br/>
            <span id='header'>
                Enter the Elemental 5
            </span> <br/>
            <span class='desc'>
                <i>Elemental 5 is an online browser game where you create elements. No pre-written limitations. The only limitation is your imagination.</i>
            </span> <br/> <br/>
            <span id='action' style='color: green;'></span>
            <form action='index.php' method='post'>
                <span class='small'> Name </span> <br/>
                <input type='text' id='name' name='name'/> <br/> <br/> 
                <span class='small'> Password </span> <br/>
                <input type='text' id='pass' name='pass'/> <br/> <br/> 
                <input style='width: 20%;' type='submit' value='Go!' name='sub' id='sub'> <br/> <br/> 
            </form>
            <span class='desc'> here to <a href='../register/'>register</a>?
        </div>
    </body>
</html>
";


/*if(isset($_POST['sub'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO users (name, pass, exp)
    VALUES ('$name', $pass, 0)";

    if ($conn->query($sql) === TRUE) {
        echo "<script>document.getElementById('action').innerHTML = 'Success!'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}*/



?>
