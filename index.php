<?php
if(isset($_COOKIE["userid"])){
    ///isset($_GET["seed"])&&time()-$_GET["seed"]<=10
    if(1){
        echo "Cookie got!";
        header("Location:result.html");
        exit();
    }
    else{
        echo "Please try again later.";
        exit();
    }
}
else{
    header("Location:signup.html");
    exit();
}
?>