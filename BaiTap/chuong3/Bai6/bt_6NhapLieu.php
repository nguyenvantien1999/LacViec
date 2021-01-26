<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TÍNH TIỀN KARAOKE</title>
</head>
<body>
    <form action="?url=c3b6_1" method="post">
        <table border="0" style="margin: 0 auto;">
            <tr bgcolor="#e6ffff">
                <th colspan="2" align="center"><h3><font color="blue">PHÉP TÍNH TRÊN HAI SỐ</font></h3></th>
            </tr>
            <tr>
                <td style="color: red">chọn phép tính:</td>
                <td>
                    <input type="radio" name="pheptinh" checked="ischecked" value="cong"/> <label style="color: red" for="male">Cộng</label>
                    <input type="radio" name="pheptinh" value="tru"/> <label style="color: red" for="male">Trừ</label>
                    <input type="radio" name="pheptinh" value="nhan"/> <label style="color: red" for="male">Nhân</label>
                    <input type="radio" name="pheptinh" value="chia"/> <label style="color: red" for="male">Chia</label>
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td><input type="text" class="form-control"  name="one" /></td>
            </tr>
            <tr>
                <td>Số thứ nhì:</td>
                <td><input type="text" class="form-control"  name="two" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" class="btn btn-success" value="Tính" name="tinh" /></td>
            </tr>
        </table>
    </form>
</body>
</html>