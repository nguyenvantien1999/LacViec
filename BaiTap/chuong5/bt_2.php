<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

  <div class="main">
    <?php
      class PhanSo {
        public $tuSo;
        public $mauSo;

        function __construct($tu, $mau) {
          $this->tuSo = $tu;
          $this->mauSo = $mau;
        }

        function tinh($phanSo, $phepTinh) {
          switch($phepTinh) {
            case '+':
              $newTu = $this->tuSo * $phanSo->mauSo + $phanSo->tuSo * $this->mauSo;
              $newMau = $this->mauSo * $phanSo->mauSo;
              return (new PhanSo($newTu, $newMau))->toiGian();
            case '-':
              $newTu = $this->tuSo * $phanSo->mauSo - $phanSo->tuSo * $this->mauSo;
              $newMau = $this->mauSo * $phanSo->mauSo;
              return (new PhanSo($newTu, $newMau))->toiGian();
            case '*':
              $newTu = $this->tuSo * $phanSo->tuSo;
              $newMau = $this->mauSo * $phanSo->mauSo;
              return (new PhanSo($newTu, $newMau))->toiGian();
            case '/':
              $newTu = $this->tuSo * $phanSo->mauSo;
              $newMau = $this->mauSo * $phanSo->tuSo;
              return (new PhanSo($newTu, $newMau))->toiGian();
            default: return null;
          }
        }

        function toiGian() {
          $t = $this->tuSo / $this->mauSo;
          
          if ($t < 0) {
            $this->tuSo = abs($this->tuSo) * -1;
            $this->mauSo = abs($this->mauSo);
          } else {
            $this->tuSo = abs($this->tuSo);
            $this->mauSo = abs($this->mauSo);
          }

          $tu = abs($this->tuSo);
          $mau = $this->mauSo;

          $ucln = PhanSo::UCLN($tu, $mau);

          $tu /= $ucln;
          $mau /= $ucln;

          $this->tuSo = $tu === 0 ? 0 : $tu * ($this->tuSo / abs($this->tuSo));
          $this->mauSo = $mau * ($this->mauSo / abs($this->mauSo));

          return $this;
        }

        function toString() {
          if ($this->mauSo === 1) {
            return "{$this->tuSo}";
          }
          return "{$this->tuSo}/{$this->mauSo}";
        }

        static function UCLN($a, $b) {
          if ($b === 0) {
            return $a;
          }
          return PhanSo::UCLN($b, $a % $b);
        }
      }
      
      $pts = ["+" => "cộng", "-" => "trừ", "*" => "nhân", "/" => "chia"];

      $tu1 = $_POST['tu1'] ?? null;
      $mau1 = $_POST['mau1'] ?? null;
      $tu2 = $_POST['tu2'] ?? null;
      $mau2 = $_POST['mau2'] ?? null;
      $pheptinh = $_POST['pheptinh'] ?? null;
      $str = null;

      if ($pheptinh && $pheptinh !== '' && is_numeric($tu1) && is_numeric($mau1) && is_numeric($tu2) && is_numeric($mau2) && $mau1 != 0 && $mau2 != 0) {
        $ps1 = new PhanSo($tu1, $mau1);
        $ps2 = new PhanSo($tu2, $mau2);
        $psKQ = $ps1->tinh($ps2, $pheptinh);
        $str = "Phép $pts[$pheptinh] là: {$ps1->toString()} $pheptinh {$ps2->toString()} = {$psKQ->toString()}";
      }
    ?>
    <form action="" method="post">
      <table>
        <tr>
          <th colspan="5"><h3 style="color: #e600e6; text-align: left;">CHỌN CÁC PHÉP TÍNH TRÊN PHÂN SỐ</h3></th>
        </tr>
        <tr>
          <td class="px-2">Nhập phân số thứ 1: </td>
          <td class="px-2"><label for="tu1" class="mb-0">Tử số</label></td>
          <td class="px-2"><input id="tu1" type="number" name="tu1" class="form-control form-control-sm" value="<?php echo $tu1 ?>"/></td>
          <td class="px-2"><label for="mau1" class="mb-0">Mẫu số</label></td>
          <td class="px-2"><input id="mau1" type="number" name="mau1" class="form-control form-control-sm" value="<?php echo $mau1 ?>"/></td>
        </tr>
        <tr>
          <td class="px-2">Nhập phân số thứ 2: </td>
          <td class="px-2"><label for="tu2" class="mb-0">Tử số</label></td>
          <td class="px-2"><input id="tu2" type="number" name="tu2" class="form-control form-control-sm" value="<?php echo $tu2 ?>"/></td>
          <td class="px-2"><label for="mau2" class="mb-0">Mẫu số</label></td>
          <td class="px-2"><input id="mau2" type="number" name="mau2" class="form-control form-control-sm" value="<?php echo $mau2 ?>"/></td>
        </tr>
        <tr>
          <td colspan="5">
            <fieldset class="border p-4">
              <legend class="w-auto">Chọn phép tính</legend>
              <input type="radio" name="pheptinh" id="cong" value="+" <?php echo $pheptinh === '+' ? 'checked' : '' ?> >
              <label for="cong">Cộng</label>
              <input type="radio" name="pheptinh" id="tru" value="-" <?php  echo $pheptinh === '-' ? 'checked' : '' ?> >
              <label for="tru">Trừ</label>
              <input type="radio" name="pheptinh" id="nhan" value="*" <?php  echo $pheptinh === '*' ? 'checked' : '' ?> >
              <label for="nhan">Nhân</label>
              <input type="radio" name="pheptinh" id="chia" value="/" <?php  echo $pheptinh === '/' ? 'checked' : '' ?> >
              <label for="chia">Chia</label>
            </fieldset>
          </td>
        </tr>
        <tr>
          <td colspan="5" class="text-center pt-2">
            <input type="submit" value="Kết quả" class="btn btn-success btn-sm"/>
          </td>
        </tr>
        <tr>
          <td colspan="5" class="text-center pt-2">
            <p class="form-control" disabled><?php echo $str ?></p>
          </td>
        </tr>
      </table>
    </form>
  </div>

</body>
</html>