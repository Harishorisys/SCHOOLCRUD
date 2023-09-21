<?php require "connection.php";

if(isset($_POST['delete'])){
    $del = $_POST['delete'];
    
    try{
        $sql = "DELETE  from scldata where id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$del]);

    if($del){
        echo "THE ADDED REPORT IS DELETED";
        header("location:view.php");
        exit(0);
    }else{
        echo "THERE IS AN ERROR TO DELETE THIS REPORT";
        header("location:view.php");
        exit(0);
    }
    }
    catch(PDOException $e){
        echo $e->getmessage();
    }

}



?>