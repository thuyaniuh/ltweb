<?php
class Connect
{
    function connectdb(&$conn)
    {
        $conn =  mysql_connect("localhost", "thuyan", "an1234");
        mysql_set_charset("utf8");
        if ($conn) {
            return mysql_select_db("qltt");
        } else {
            return false;
        }
    }
    function close($conn)
    {
        mysql_close($conn);
    }
}
