<?php
include_once("mConnect.php");
class mCom
{
    function selectCom()
    {
        $p = new Connect();
        $con;
        if ($p->connectdb($con)) {
            $query = "select * from comic";
            $tbl = mysql_query($query);
            $p->close($con);
            return $tbl;
        } else {
            return false;
        }
    }
}
