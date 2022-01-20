<?
$sqlUserName = "bupt";
$db = "bupt";
$table = "teachers";
function check($str)
{
    if (!strstr($str,'!')&&!strstr($str,'@')&&!strstr($str,'#')&&!strstr($str,'$')&&!strstr($str,'%')&&!strstr($str,'^')&&!strstr($str,'&')&&!strstr($str,'*')&&!strstr($str,'(')&&!strstr($str,')')&&!strstr($str,'-')&&!strstr($str,'_')&&!strstr($str,'=')&&!strstr($str,'+')&&!strstr($str,'[')&&!strstr($str,']')&&!strstr($str,'"')&&!strstr($str,'\'')&&!strstr($str,';')&&!strstr($str,'<')&&!strstr($str,'>')&&!strstr($str,'?')&&!strstr($str,'`')&&!strstr($str,'~')&&!strstr($str,'\\')&&!strstr($str,'/')&&!strstr($str,'|')) {
        return TRUE;
    }
    else{
        return FALSE;
    }
}
$id = $_GET["username"];
$passwd = $_GET["password"];
if (check($id)&&check($passwd)) {
    date_default_timezone_set("PRC");
    $con = new mysqli("localhost", "bupt","4a617");
    mysqli_query($con,"SET NAMES UTF8");
    mysqli_query($con, "use ".$db);
    $s1 = "select name from ".$table." where id=".$id." and passwd = ".$passwd;
    $r1 = mysqli_query($con,$s1);
    if(mysqli_fetch_row($r1)){
        header("Location:show.html");
    }
    else{
        echo "ERROR your id or passwd is wrong.";
    }
}
else{
    exit("ERROR: Invalid input");
}

?>