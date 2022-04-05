<?php

   class conenxion{
       private $user="root";
       private $pass="";

    function conectar(){

    
      try{
        $pdo=new PDO('mysql:host=localhost;dbname=prueba2',$this->user,$this->pass);
        echo "ya no eres un perro hpt bobo aprendiste a usar PDO basura";
      }catch(PDOException $error){
        echo "no te pudiste conectar perro hpt bobo".$error->getMensage();
      }
   }
}
   $nuevaconexion=new conenxion();
   $nuevaconexion->conectar();
?>