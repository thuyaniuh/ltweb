<?php
include_once("Model/mChap.php");
class cChap
{
    function getAllChap()
    {
        $p = new mChap();
        $tbl = $p->selectChap();
        return $tbl;
    }
    function getByCom($com)
    {
        $p = new mChap();
        $tbl = $p->selectByCom($com);
        return $tbl;
    }
    function getSearch($search)
    {
        $p = new mChap();
        $tbl = $p->selectBysearch($search);
        return $tbl;
    }
    function addChap($ten, $gia, $mota, $truyen, $file, $tenanh, $loaianh, $sizeanh)
    {
        if ($loaianh == "image/jpeg" || $loaianh == 'image/png') {
            if ($sizeanh <= 2 * 1024 * 1024) {
                if (move_uploaded_file($file, "image/" . $tenanh)) {
                    $p = new mChap();
                    $tbl = $p->insertChap($ten, $gia, $mota, $tenanh, $truyen);
                    if ($tbl) {
                        return 1;
                    } else {
                        return 0;
                    }
                } else {
                    return -1;
                }
            } else {
                return -2;
            }
        } else {
            return -3;
        }
    }
    function getXoa($id)
    {
        $p = new mChap();
        $tbl = $p->deleteChap($id);
        return $tbl;
    }
    function suaChap($ten, $gia, $mota, $truyen, $file, $tenanh, $loaianh, $sizeanh, $id)
    {
        if ($loaianh == "image/jpeg" || $loaianh == "image/png") {
            if ($sizeanh <= 2 * 1024 * 1024) {
                if (move_uploaded_file($file, "image/" . $tenanh)) {
                    $p = new mChap();
                    $update = $p->updateChap($ten, $gia, $mota, $tenanh, $truyen, $id);
                    if ($update) {
                        return 1;
                    } else {
                        return 0;
                    }
                } else { 
                    return -1;
                }
            } else {
                return -2;
            }
        } else {
            return -3;
        }
        //test edit github
    }
    function getPrice($max)
    {
        $p = new mChap();
        $tbl = $p->selectPrice($max);
        return $tbl;
    }
}
