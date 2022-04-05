<?php
    session_start();
    //aqui validamos para cerrar sesion
    if(isset($_GET['cerrar_sesion'])){
        session_unset();
        session_destroy();
    }
    if(isset($_SESSION['rol'])){
        switch ($_SESSION['rol']) {
           //el caso 1 si el usuario es un admin lo lleve a location:admin.php
            case 1:
                header('location:admin.php');
            break;
            //el caso 2 si el usuario es un colaborador
            case 2:
                header('location:colab.php');
                break;
        //si tuvieramos mas roles colocamos mas casos

        //si no hay ningun rol yel usuario quiere ingresar vamos a decirle que tiene que iniciar sesion
            default:
                echo"perro hpt ingrese primero";
        }
    }
    //autenticar a un usuario, que existan tanto un nombre de usuaurio como una contraseña
    if(isset($_POST['username']) && isset($_POST['password'])){
        //si exiten los dos que lo dejen entrar
        $username=$_POST["username"];
        $password=$_POST["password"];

        //traer los datos de la base de datos :)
        $db=new database();
        $query=$db->connect()->prepare('SELECT*FROM usuarios WHERE username=:username AND password=:password');
        $query->execute(['username'=>$username,'password'=>$password]);

        $row=$query->fetch(PDO::FETCH_NUM);
        if($row==true){
            //valida el rol el rol
        }else{
            //no exite el usuario
            echo"el usuario o contraseña son incorrectos o usted no sabe escribir ";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">
        <label for="">usuario</label>    
        <input type="text" name="username">
        <label for="">password</label>
        <input type="text" name="password">
        <input type="submit" value="iniciar sesion">
    </form>
</body>
</html>