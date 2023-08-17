<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa</title>
</head>

<body>

    <h3>SỬA SẢN PHẨM</h3>
    <form action="#" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" name="ten" placeholder="Nhập tên sản phẩm" required></td>
            </tr>
            <tr>
                <td>Giá</td>
                <td><input type="number" name="gia" required></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><textarea name="mota" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Ảnh</td>
                <td><input type="file" name="fflie" accept="image/*" required></td>
            </tr>
            <tr>
                <td>Danh mục:</td>
                <td><select name="cboCom">
                        <?php
                        include("Controller/cCom.php");
                        $com = new cCom();
                        $table = $com->getCom();
                        if (mysql_num_rows($table)) {
                            while ($row = mysql_fetch_assoc($table)) {
                                echo "<option value='" . $row["ComID"] . "'>" . $row["ComName"] . "</option>";
                            }
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnsua" value="Sửa"></td>
            </tr>
        </table>

    </form>
    <?php
    $id = $_REQUEST["idsp"];
    ?>
    <?php
    include("Controller/cChap.php");
    if (isset($_REQUEST["btnsua"])) {

        $ten = $_REQUEST["ten"];
        $gia = $_REQUEST["gia"];
        $mota = $_REQUEST["mota"];
        $cty = $_REQUEST["truyen"];
        $file = $_FILES["ffile"]["tmp_name"];
        $type = $_FILES["ffile"]["type"];
        $name = $_FILES["ffile"]["name"];
        $size = $_FILES["ffile"]["size"];
        $id = $_REQUEST["idsp"];

        $p = new cChap();

        $kq = $p->suaChap($ten, $gia, $mota, $truyen, $file, $name, $type, $size, $id);

        if ($kq == 1) {
            echo "<script>alert('Sửa thành công!')</script>";
            header("refresh:0;url='admin.php?qlsp'");
        } elseif ($kq == 0) {
            echo "<script>alert('Không thể update!')</script>";
            header("refresh:0;url='admin.php?sua&idsp=26'");
        } elseif ($kq == -1) {
            echo "<script>alert('Không thể upload ảnh!')</script>";
            header("refresh:0;url='admin.php?sua&idsp=26'");
        } elseif ($kq == -2) {
            echo "<script>alert('size quá lớn!')</script>";
            header("refresh:0;url='admin.php?sua&idsp'");
        } elseif ($kq == -3) {
            echo "<script>alert('Không đúng định dạng!')</script>";
            header("refresh:0;url='admin.php?sua&idsp'");
        } else {
            echo "<script>alert('Lỗi gì đó!')</script>";
            header("refresh:0;url='admin.php?sua&idsp'");
        }
    }
    ?>
</body>

</html>