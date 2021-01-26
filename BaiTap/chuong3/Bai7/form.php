<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="?url=c3b7_1" method="POST" accept-charset="utf-8">
		<fieldset>
			<legend><b>Enter your information</b></legend>
			<table>
					<tr>
						<td>Họ và tên: </td>
						<td colspan="" rowspan="" headers="">
							<input class="form-control" type="text" name="hoten">
						</td>
					</tr>
					<tr>
						<td>Địa chỉ: </td>
						<td>
							<input class="form-control" type="text" name="diachi">
						</td>
					</tr>
					<tr>
						<td>Số điện thoại: </td>
						<td>
							<input class="form-control" type="text" name="sdt">
						</td>
					</tr>
					<tr>
						<td>Giới tính: </td>
						<td>
							<input type="radio" name="gioiTinh" value="nam"> Nam
							<input type="radio" name="gioiTinh" value="nu"> Nữ
						</td>
					</tr>
					<tr>
						<td>Quốc tịch: </td>
						<td>
							<select  name="quocTich" >
								<option value="Việt Nam">Việt Nam</option>
								<option value="Lào">Lào</option>}
								<option value="Thái Lan">Thái Lan</option>}
								<option value="Trung Cộng">Trung Cộng</option>}
								option
							</select>
						</td>
					</tr>
					<tr>
						<td>Các môn đã học: </td>
						<td>
							<input type="checkbox" name="php&mysql"> PHP & MySQL 
							<input type="checkbox" name="c#"> C# 
							<input type="checkbox" name="xml"> XML
							<input type="checkbox" name="Python"> Python
						</td>
					</tr>
					<tr>
						<td>Ghi chú: </td>
						<td>
							<textarea class="form-control" name="ghiChu" rows="5" cols="50"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2" rowspan="" align="center">
							<input class="btn btn-success" type="submit" name="" value="Gửi">
							<input class="btn btn-danger" type="reset" name="" value="Hủy">
						</td>
					</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>