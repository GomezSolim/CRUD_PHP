<?php


$name = $_POST["name"];
$message = $_POST["message"];
$priority = filter_input(INPUT_POST, "priority", FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT);
$terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL);

if(! $termes){
    die("les Terms doivent être acceptées ");
}

$host = "localhost";
$dbname = "form_db";
$username = "root";
$password = "";


$conn = mysqli_connect(hostname:  $host,
                username: $username,
                password: $password,
                database: $dbname);


if(mysqli_connect_errno()){
    die("erreur de connexion:" .mysqli_connect_error());
}

//echo "Connexion réussi.";



$sql = "INSERT INTO messages(name, body, priority, type)
        VALUES (?, ?, ?, ?)";

       $stmt = mysqli_stmt_init($conn);

        if(! mysqli_stmt_prepare($stmt, $sql)){
            die(mysqli_error($con));
        }

    mysqli_stmt_param_count($stmt,"ssii",
                            $name,
                            $message,
                            $priority,
                            $type);

        mysqli_stmt_execute($stmt);
        echo "enregistrer, sauvegarder";
//print_r($_POST);

//var_dump($name, $message, $priority, $type, $terms);

//echo 'name:' . $name. 'message' . $message . 'priority' . $priority . 'type' . $type. 'terms' .$terms;
?>