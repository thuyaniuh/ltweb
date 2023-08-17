<?php
include_once("Model/mCom.php");
class cCom
{
    function getCom()
    {
        $p = new mCom();
        $tbl = $p->selectCom();
        return $tbl;
    }
}
