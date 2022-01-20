<?php
//用于存储签到和评论信息
$suggest = isset($_GET["suggestion"]) ? $_GET["suggestion"] : 0;//检测是否输入信息
function check($str)
{
    if (!strstr($str,'!')&&!strstr($str,'@')&&!strstr($str,'#')&&!strstr($str,'$')&&!strstr($str,'%')&&!strstr($str,'^')&&!strstr($str,'&')&&!strstr($str,'*')&&!strstr($str,'(')&&!strstr($str,')')&&!strstr($str,'-')&&!strstr($str,'_')&&!strstr($str,'=')&&!strstr($str,'+')&&!strstr($str,'[')&&!strstr($str,']')&&!strstr($str,'"')&&!strstr($str,'\'')&&!strstr($str,';')&&!strstr($str,'<')&&!strstr($str,'>')&&!strstr($str,'?')&&!strstr($str,'`')&&!strstr($str,'~')&&!strstr($str,'\\')&&!strstr($str,'/')&&!strstr($str,'|')) {
        return TRUE;
    }
    else{
        return FALSE;
    }
}
if (check($suggest)) {
    $con = new mysqli("localhost", "bupt","4a617");//连接数据库
    $db = "bupt";
    $tb = "ykg2050911";
    $signIntb = "ykg2050911_i";
    $stb = "ykg2050911_s";
    $dt = date("Ymd", time());//时间年月日
    $s1 = "select name from " . $tb . " where userid = \"" . $_COOKIE["userid"]."\";";//我的cookie有,查找cookie对应name
    date_default_timezone_set("PRC");
    // echo $dt;
    // echo $s1;
    mysqli_query($con,"SET NAMES UTF8");
    mysqli_query($con, "use ".$db);
    $r1 = mysqli_query($con, $s1);//对数据库进行查询，返回name的result
    // if (!mysqli_affected_rows($con)) {//对数据的影响数
    //     exit("ERROR01");
    // } else {
    $name = mysqli_fetch_array($r1, MYSQLI_NUM)[0];//调出来做参数
    $s2 = "select * from " . $signIntb . " where name = \"" . $name."\"";//在不在 _i 列表
    $r2 = mysqli_query($con, $s2);
    if (mysqli_num_rows($r2) == 0) {//查询姓名有无
        exit("Student does not exist.");
    } else {
        $s3 = "update " . $signIntb . " set `" . $dt . "` = 1 where name=\"" . $name."\"";
        mysqli_query($con, $s3);

            if (!$suggest) {
                //header("Location:feedback.html");
                exit("Sign successfully.");
            } else {
                $s4 = "insert into " . $stb . " (suggestions,date) values (\"" . $suggest."\",\"".$dt."\")";
                mysqli_query($con, $s4);
                if (mysqli_affected_rows($con) != 0) {//插入成功
                    //header("Location:feedback.html");
                    exit("Suggest successfully!");
                } else {
                    
                    exit("Sign in successfully, suggest faild.");
                }
            }
        }
}
else {
    exit("ERROR: Invalid input");
}
    
// }
