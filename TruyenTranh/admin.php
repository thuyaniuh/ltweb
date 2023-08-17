<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        td {
            text-align: left;
        }

        table {
            width: 100%;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <table border="1px solid" style="margin:0 10%; text-align:center;width:80%; height:960px;">
        <tr style="height:300px;">
            <td colspan="2">
                <img src="./image/banner.png" style="width:100%; height:300px">
            </td>
        </tr>
        <tr style="height:50px;">
            <td style="background-color:lawngreen;">
                <a href="index.php"><b>Trang Chủ</b></a>
                <a href="admin.php"><b>Quản Lý</b></a>
            </td>
            <td style="background-color:lawngreen; text-align:right;">
                <form action="#" method="get">
                    <input type="text" name="search" placeholder="Tìm kiếm sản phẩm" style="height:30px; border-radius:20px;">
                    <input type="submit" value="Tìm" style="height: 30px; background-color:orange;border-radius:10px;">
                </form>
            </td>
        </tr>
        <tr>
            <td class="left" style="width: 20%">

                <a href="admin.php?qldm">Quản lý Danh Mục</a><br>
                <a href="admin.php?qlsp">Quản lý sản phẩm</a><br>
            </td>
            <td class="main">
                <a href="admin.php?addProd">Thêm sản phẩm</a><br>
                <?php
                if (isset($_REQUEST["addProd"])) {
                    include("View/vadd.php");
                } elseif (isset($_REQUEST["qldm"])) {
                    include("Controller/cCom.php");
                    $p = new cCom();
                    $tbl = $p->getCom();
                    if ($tbl) {
                        if (mysql_num_rows($tbl) > 0) {
                            echo "<table style='background-color:lightyellow;height:400px;'>";
                            echo "<tr>";
                            echo "<td>STT</td>" . "<td>Tên truyện</td>" . "<td>Tác Giả</td>" . "<td>Nhà Xuất  Bản</td>";
                            echo "</tr>";
                            while ($row = mysql_fetch_assoc($tbl)) {
                                echo "<tr>";
                                echo "<td>" . $row["ComID"] . "</td><td>" . $row["ComName"] . "</td><td>" . $row["TacGia"] . "</td><td>" . $row["NXB"] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "0 result";
                        }
                    } else {
                        echo "Error";
                    }
                } elseif (isset($_REQUEST["qlsp"])) {
                    include("View/vquanlisanpham.php");
                } elseif (isset($_REQUEST["xoa"])) {
                    $id = $_REQUEST["id"];
                    include_once("Controller/cChap.php");
                    $p = new cChap();
                    $kq = $p->getXoa($id);
                    if ($kq) {
                        echo "<script>alert('Xóa Thành Công!')</script>";
                        header("refresh:0;url='admin.php?qlsp'");
                    }
                } elseif (isset($_REQUEST["sua"])) {
                    include_once("View/vUpdate.php");
                } else {
                    echo "<center>Trang Admin</center>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="background-color:pink; text-align:center;height:200px;">
                <p>Nguyễn Thị Thúy An</p>
                <p>20018201</p>
            </td>
        </tr>
    </table>
</body>

</html>