<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm</title>
    <style>
        table {
            width: 100%;
            background-color: lightyellow;
        }
    </style>
</head>

<body>
    <h2>Thêm Sản Phẩm</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <table style="text-align:left;">
            <tr>
                <td>Tên truyện</td>
                <td><input type="text" name="txtName" required></td>
            </tr>
            <tr>
                <td>Giá </td>
                <td><input type="number" name="txtGia" required></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="myfile" accept="image/*" required></td>
            </tr>
            <tr>
                <td>Mô Tả</td>
                <td><textarea name="txtMota" cols="22" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>Danh mục</td>
                <td>
                    <select name="truyen">
                        <?php
                        include("Controller/cCom.php");
                        $p = new cCom();
                        $tbl = $p->getCom();
                        if (mysql_num_rows($tbl)) {
                            while ($row = mysql_fetch_assoc($tbl)) {
                                echo "<option value='" . $row["ComID"] . "'>" . $row["ComName"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnsub" value="Thêm">
                    <input type="reset" value="cancel">
                </td>
            </tr>
        </table>
    </form>

    <?php
    include("Controller/cChap.php");
    if (isset($_REQUEST["btnsub"])) {
        $ten = $_REQUEST["txtName"];
        $gia = $_REQUEST["txtGia"];
        $mota = $_REQUEST["txtMota"];
        $truyen = $_REQUEST["truyen"];
        $file = $_FILES["myfile"]["tmp_name"];
        $type = $_FILES["myfile"]["type"];
        $name = $_FILES["myfile"]["name"];
        $sizeanh = $_FILES["myfile"]["size"];

        $p = new cChap();
        $tbl = $p->addChap($ten, $gia, $mota, $truyen, $file, $name, $type, $sizeanh);
        if ($tbl == 1) {
            echo "<script>alert('Thêm thành công')</script>";
            header("refresh:0; url='index.php?Prod'");
        } elseif ($tbl == 0) {
            echo "<script>alert('Không thể insert')</script>";
        } elseif ($tbl == -1) {
            echo "<script>alert('Không thể upload')</script>";
        } elseif ($tbl == -2) {
            echo "<script>alert('Size quá lớn')</script>";
        } elseif ($tbl == -3) {
            echo "<script>alert('Không đúng định dạng')</script>";
        } else {
            echo "<script>alert('Lỗi')</script>";
        }
    }
    ?>
</body>

</html>