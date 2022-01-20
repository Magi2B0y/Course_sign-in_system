<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials:true');
header("Access-Control-Allow-Method:*");
header("Set-Cookie:HttpOnly;Secure;SameSite=None");
function check($str)
{
    if (!strstr($str,'!')&&!strstr($str,'@')&&!strstr($str,'#')&&!strstr($str,'$')&&!strstr($str,'%')&&!strstr($str,'^')&&!strstr($str,'&')&&!strstr($str,'*')&&!strstr($str,'(')&&!strstr($str,')')&&!strstr($str,'-')&&!strstr($str,'_')&&!strstr($str,'=')&&!strstr($str,'+')&&!strstr($str,'[')&&!strstr($str,']')&&!strstr($str,'"')&&!strstr($str,'\'')&&!strstr($str,';')&&!strstr($str,'<')&&!strstr($str,'>')&&!strstr($str,'?')&&!strstr($str,'`')&&!strstr($str,'~')&&!strstr($str,'\\')&&!strstr($str,'/')&&!strstr($str,'|')) {
        return TRUE;
    }
    else{
        return FALSE;
    }
    return TRUE;
}
// if (isset($_GET["cl"]) && isset($_GET["id"]) && isset($_GET["name"])) { //火星注册界面
    $cl = $_GET["cl"];
    $id = $_GET["id"];
    $name = $_GET["name"];
    // if (check($cl) && check($id) && check($name)) {
        $userid = md5($cl . $id . time());
        $sqlUserName = "root";
        $db = "bupt";
        $table = "ykg2050911";
        $coon = new mysqli("localhost", $sqlUserName,"root");
        mysqli_query($coon, "SET NAMES UTF8");
        if ($coon->connect_error) {
            die("Connection faild." . $coon->connect_error);
        }else{
            echo("ok");
        }
        echo "Connection successed.<br>";
        mysqli_query($coon, "use " . $db);
        $s1 = "select * from " . $table . " where id=" . $id; //学生注册表
        mysqli_query($coon, $s1);
        if (mysqli_affected_rows($coon) == 1) {
            echo "The user has been already existed.";
            $s3 = "update " . $table . " set class=" . $cl . ",name=\"" . $name . "\",userid=\"" . $userid . "\" where id=" . $id . ";";
            mysqli_query($coon, $s3);
            setcookie("userid", $userid);
        } else {
            echo "The new usre would be created.";
            $s2 = "insert into " . $table . " (class,id,userid,name) values (" . $cl . "," . $id . ",\"" . $userid . "\",\"" . $name . "\");";
            mysqli_query($coon, $s2);
            mysqli_query($coon, $s1);
            mysqli_close($coon);
            setcookie("userid", $userid);
            header("Location:index.php?seed=" . time());
        }
    // } else {
    //     exit("ERROR: Invalid input");
    // }
// } 
// else {
//     exit("ERROR: Invalid input");
// }
