<?php
include_once("mConnect.php");
class mChap
{
    function selectChap()
    {
        $p = new Connect();
        $con;
        if ($p->connectdb($con)) {
            $query = "select * from comdetail";
            $tbl = mysql_query($query);
            $p->close($con);
            return $tbl;
        } else {
            return false;
        }
    }
    function selectByCom($Com)
    {
        $p = new Connect();;
        $con;
        if ($p->connectdb($con)) {
            $query = "select * from comdetail where ComID=" . $Com;
            $tbl = mysql_query($query);
            $p->close($con);
            return $tbl;
        } else {
            return false;
        }
    }
    function selectBySearch($search)
    {
        $p = new Connect();
        $con;
        if ($p->connectdb($con)) {
            $query = "select * from comdetail where ChapName like '%$search%'";
            $tbl = mysql_query($query);
            $p->close($con);
            return $tbl;
        } else {
            return false;
        }
    }
    function insertChap($ten, $gia, $mota, $hinh, $cty)
    {
        $p = new Connect();
        $con;
        if ($p->connectdb($con)) {
            $query = "insert into comdetail(ChapName, ChapPrice, ChapDescription, ChapImage, ComID) values";
            $query .= "(N'" . $ten . "', " . $gia . ", N'" . $mota . "', N'" . $hinh . "', " . $cty . ")";
            $tbl = mysql_query($query);
            $p->close($con);
            return $tbl;
        } else {
            return false;
        }
    }
    function deleteChap($id)
    {
        $p = new Connect();
        $con;
        if ($p->connectdb($con)) {
            $query = "delete from comdetail where ChapID=" . $id . "";
            $tbl = mysql_query($query);
            $p->close($con);
            return $tbl;
        } else {
            return false;
        }
    }
    function updateChap($ten, $gia, $mota, $hinh, $truyen, $id)
    {
        $con;
        $p = new Connect();
        if ($p->connectdb($con)) {
            $query = "update comdetail SET ChapName = N'$ten',
            ChapPrice = $gia,
            ChapImage = N'$hinh',
            ChapDescription = N'$mota',
            ComID = $truyen WHERE ChapID =$id";
            $kq = mysql_query($query);
            $p->close($con);
            return $kq;
        } else {
            return false;
        }
    }
    function selectPrice($max)
    {
        $p = new Connect();
        $con;
        if ($p->connectdb($con)) {
            $query = "select*from comdetail where ChapPrice<=" . $max . "";
            $tbl = mysql_query($query);
            $p->close($con);
            return $tbl;
        } else {
            return false;
        }
    }
}
