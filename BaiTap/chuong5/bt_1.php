<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>
    <title>Quản lý nhân viên</title>
    <style>
        fieldset {
          background-color: #eeeeee;
        }
        legend {
          background-color: gray;
          color: white;
          padding: 5px 10px;
        }
        input {
          margin: 5px;
        }
        tr{
            background-color: #ffffb3;
        }
        #sub{
            background-color: white;
        }
    </style>
</head>

<body>

     <div class="main">
    <?php  
      abstract class NhanVien {
        const luongCanBan = 5000000;

        public $hoTen;
        public $gioiTinh;
        public $ngaySinh;
        public $ngayVaoLam;
        public $heSoLuong;
        public $soCon;
        
        function __construct($hoTen, $gioiTinh, $ngaySinh, $ngayVaoLam, $heSoLuong, $soCon) {
          $this->hoTen = $hoTen;
          $this->gioiTinh = $gioiTinh;
          $this->ngaySinh = $ngaySinh;
          $this->ngayVaoLam = $ngayVaoLam;
          $this->heSoLuong = $heSoLuong;
          $this->soCon = $soCon;
        }

        function tinhTienThuong () {
          return (date('Y') - date('Y', strtotime($this->ngayVaoLam))) * 1000000;
        }

        abstract function tinhLuong();
        abstract function tinhTroCap();
      }

      class NhanVienVanPhong extends NhanVien {
        const dinhMucVang = 3;
        const donGiaPhat = 200000;
        
        public $soNgayVang;

        function __construct($hoTen, $gioiTinh, $ngaySinh, $ngayVaoLam, $heSoLuong, $soCon, $soNgayVang) {
          parent::__construct($hoTen, $gioiTinh, $ngaySinh, $ngayVaoLam, $heSoLuong, $soCon);
          $this->soNgayVang = $soNgayVang;
        }

        function tinhLuong() {
          return NhanVien::luongCanBan * $this->heSoLuong;
        }

        function tinhTroCap() {
          if ($this->gioiTinh === 'Nữ') {
            return 200000 * $this->soCon * 1.5;
          }
          return 200000 * $this->soCon;
        }

        function tinhTienPhat() {
          if ($this->soNgayVang > NhanVienVanPhong::dinhMucVang) {
            return $this->soNgayVang * NhanVienVanPhong::donGiaPhat;
          }
          return 0;
        }
      }

      class NhanVienSanXuat extends NhanVien {
        const dinhMucSanPham = 3;
        const donGiaSanPham = 200000;
        
        public $soSanPham;

        function __construct($hoTen, $gioiTinh, $ngaySinh, $ngayVaoLam, $heSoLuong, $soCon, $soSanPham) {
          parent::__construct($hoTen, $gioiTinh, $ngaySinh, $ngayVaoLam, $heSoLuong, $soCon);
          $this->soSanPham = $soSanPham;
        }

        function tinhLuong() {
          return NhanVienSanXuat::donGiaSanPham * $this->soSanPham;
        }

        function tinhTroCap() {
          return 120000 * $this->soCon;
        }

        function tinhTienThuong() {
          if ($this->soSanPham > NhanVienSanXuat::dinhMucSanPham) {
            return ($this->soSanPham - NhanVienSanXuat::dinhMucSanPham) * NhanVienSanXuat::donGiaSanPham * 0.03;
          }
          return 0;
        }
      }

      
      $ten = $_POST['ten'] ?? null;
      $soCon = $_POST['socon'] ?? 0;
      $soCon = $soCon === '' ? 0 : $soCon;
      $ngaySinh = $_POST['ngaysinh'] ?? null;
      $ngayVaoLam = $_POST['ngayvaolam'] ?? null;
      $gioiTinh = $_POST['gioitinh'] ?? null;
      $heSoLuong = $_POST['hesoluong'] ?? 0;
      $heSoLuong = $heSoLuong === '' ? 0 : $heSoLuong;
      $loaiNhanVien = $_POST['loainv'] ?? null;
      $soNgayVang = $_POST['songayvang'] ?? 0;
      $soNgayVang = $soNgayVang === '' ? 0 : $soNgayVang;
      $soSanPham = $_POST['sosanpham'] ?? 0;
      $soSanPham = $soSanPham === '' ? 0 : $soSanPham;

      $luong = 0;
      $thuong = 0;
      $phat = 0;
      $troCap = 0;
      $thucLinh = 0;

      if (
        $ten && $ten !== '' &&
        is_numeric($soCon) &&
        $ngaySinh && $ngaySinh !== '' &&
        $ngayVaoLam && $ngayVaoLam !== '' &&
        $gioiTinh && $gioiTinh !== '' &&
        is_numeric($heSoLuong) &&
        $loaiNhanVien && $loaiNhanVien !== '' &&
        is_numeric($soNgayVang) &&
        is_numeric($soSanPham)
      ) {
        if ($loaiNhanVien === 'vp') {
          $nv = new NhanVienVanPhong($ten, $gioiTinh, $ngaySinh, $ngayVaoLam, (float)$heSoLuong, (int)$soCon, (int)$soNgayVang);
          $phat = $nv->tinhTienPhat();
        } else if ($loaiNhanVien === 'sx') {
          $nv = new NhanVienSanXuat($ten, $gioiTinh, $ngaySinh, $ngayVaoLam, (float)$heSoLuong, (int)$soCon, (int)$soSanPham);
        }
        $luong = $nv->tinhLuong();
        $thuong = $nv->tinhTienThuong();
        $troCap = $nv->tinhTroCap();
        $thucLinh = $luong + $thuong + $troCap - $phat;
      }


    ?>

    <form action="" method="post">
      <table class="mx-auto">
        <tr>
          <th colspan="4"><h3 class="text-primary text-center">QUẢN LÝ NHÂN VIÊN</h3></th>
        </tr>
        <tr>
          <td class="px-2">Họ và tên</td>
          <td class="px-2">
            <input type="text" name="ten" class="form-control form-control-sm" value="<?php echo $ten ?>"/>
          </td>
          <td class="px-2">Số con</td>
          <td class="px-2">
            <input type="number" name="socon" class="form-control form-control-sm" value="<?php echo $soCon ?>"/>
          </td>
        </tr>
        <tr>
          <td class="px-2">Ngày sinh</td>
          <td class="px-2">
            <input type="date" name="ngaysinh" class="form-control form-control-sm" value="<?php echo $ngaySinh ?>"/>
          </td>
          <td class="px-2">Ngày vào làm</td>
          <td class="px-2">
            <input type="date" name="ngayvaolam" class="form-control form-control-sm" value="<?php echo $ngayVaoLam ?>"/>
          </td>
        </tr>
        <tr>
          <td class="px-2">Giới tính</td>
          <td class="px-2">
            <input type="radio" name="gioitinh" value="Nam" id="nam" <?php echo $gioiTinh === 'Nam' ? 'checked' : '' ?> >
            <label for="nam">Nam</label>
            <input type="radio" name="gioitinh" value="Nữ" id="nu" <?php  echo $gioiTinh === 'Nữ' ? 'checked' : '' ?> >
            <label for="nu">Nữ</label>
          </td>
          <td class="px-2">Hệ số lương</td>
          <td class="px-2">
            <input type="number" name="hesoluong" step="0.0001" class="form-control form-control-sm" value="<?php echo $heSoLuong ?>"/>
          </td>
        </tr>
        <tr>
          <td class="px-2">Loại nhân viên</td>
          <td class="px-2">
            <input type="radio" name="loainv" value="vp" id="vp" <?php echo $loaiNhanVien === 'vp' ? 'checked' : '' ?> >
            <label for="vp">Văn phòng</label>
          </td>
          <td class="px-2">
            <input type="radio" name="loainv" value="sx" id="sx" <?php  echo $loaiNhanVien === 'sx' ? 'checked' : '' ?> >
            <label for="sx">Sản xuất</label>
          </td>
          <td></td>
        </tr>
        <tr>
          <td class="px-2">Số ngày vắng</td>
          <td class="px-2">
            <input type="number" name="songayvang" class="form-control form-control-sm" value="<?php echo $soNgayVang ?>"/>
          </td>
          <td class="px-2">Số sản phẩm</td>
          <td class="px-2">
            <input type="number" name="sosanpham" class="form-control form-control-sm" value="<?php echo $soSanPham ?>"/>
          </td>
        </tr>
        <tr id="sub">
          <td style="text-align: center;" colspan="4" class="text-center pt-2">
            <input  type="submit" value="Tính lương" class="btn btn-success btn-sm"/>
          </td>
        </tr>
        <tr>
          <td colspan="4"><hr></td>
        </tr>
        <tr>
          <td class="px-2">Tiền lương</td>
          <td class="px-2">
            <input type="text" disabled value="<?php echo number_format($luong, 0, ',', '.') ?> VNĐ" class="form-control form-control-sm"/>
          </td>
          <td class="px-2">Trợ cấp</td>
          <td class="px-2">
            <input type="text" disabled value="<?php echo number_format($troCap, 0, ',', '.') ?> VNĐ" class="form-control form-control-sm"/>
          </td>
        </tr>
        <tr>
          <td class="px-2">Tiền thưởng</td>
          <td class="px-2">
            <input type="text" disabled value="<?php echo number_format($thuong, 0, ',', '.') ?> VNĐ" class="form-control form-control-sm"/>
          </td>
          <td class="px-2">Tiền phạt</td>
          <td class="px-2">
            <input type="text" disabled value="<?php echo number_format($phat, 0, ',', '.') ?> VNĐ" class="form-control form-control-sm"/>
          </td>
        </tr>
        <tr>
          <td></td>
          <td class="text-right px-2">Thực lĩnh</td>
          <td>
            <input type="text" disabled value="<?php echo number_format($thucLinh, 0, ',', '.') ?> VNĐ" class="form-control form-control-sm"/>
          </td>
          <td></td>
        </tr>
      </table>
    </form>

</body>

</html>