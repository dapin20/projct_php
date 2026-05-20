<?php
$hobbyList  = ["Membaca", "Olahraga", "Menyanyi", "Menari", "Traveling"];
$ekskulList = ["Pramuka", "Basket", "Volly", "Band", "Seni Tari", "Robotic", "Bulu Tangkis", "Renang"];

$selectedHobi  = isset($data["hobi"])  ? array_map("trim", explode(",", $data["hobi"]))  : [];
$selectedEkskul= isset($data["ekskul"])? array_map("trim", explode(",", $data["ekskul"])): [];

$ttlParts = ["", "", ""];
if (!empty($data["ttl"])) {
    $ttlParts = explode("-", $data["ttl"]);
}
?>

<div class="card" style="border: 1px solid #c3e6cb;">
  <div class="card-header text-bg-success text-center font-weight-bold">
    <i class="fas fa-clipboard-list"></i> Formulir Data Siswa
  </div>
  <div class="card-body" style="background-color: #fdfdfd;">
    <table class="table table-sm table-borderless">
      <tr>
        <td width="25%">NIS</td>
        <td width="5%">:</td>
        <td>
          <input type="text" name="nis" class="form-control border-success" 
            value="<?= htmlspecialchars($data["nis"] ?? "") ?>" 
            <?= $readonly ?? "" ?> required>
        </td>
      </tr>
      <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td><input type="text" name="nama" class="form-control border-success" value="<?= htmlspecialchars($data["nama"] ?? "") ?>"></td>
      </tr>
      <tr>
        <td>Kelas</td>
        <td>:</td>
        <td>
          <select name="kelas" class="form-control border-success">
            <?php foreach (["X","XI","XII"] as $k): ?>
              <option value="<?= $k ?>" <?= ($data["kelas"] ?? "") === $k ? "selected" : "" ?>><?= $k ?></option>
            <?php endforeach; ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Tanggal Lahir</td>
        <td>:</td>
        <td>
            <div class="row g-2">
                <div class="col-3"><input type="text" name="tgl" class="form-control text-center border-success" placeholder="DD" value="<?= htmlspecialchars($ttlParts[2] ?? "") ?>"></div>
                <div class="col-4"><input type="text" name="bln" class="form-control text-center border-success" placeholder="MM" value="<?= htmlspecialchars($ttlParts[1] ?? "") ?>"></div>
                <div class="col-5"><input type="text" name="thn" class="form-control text-center border-success" placeholder="YYYY" value="<?= htmlspecialchars($ttlParts[0] ?? "") ?>"></div>
            </div>
        </td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><textarea name="alamat" class="form-control border-success"><?= htmlspecialchars($data["alamat"] ?? "") ?></textarea></td>
      </tr>
      <tr>
        <td>Kota</td>
        <td>:</td>
        <td><input type="text" name="kota" class="form-control border-success" value="<?= htmlspecialchars($data["kota"] ?? "") ?>"></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>
          <input type="radio" name="jk" value="L" <?= ($data["jk"] ?? "") === "L" ? "checked" : "" ?>> Laki-laki &nbsp;
          <input type="radio" name="jk" value="P" <?= ($data["jk"] ?? "") === "P" ? "checked" : "" ?>> Perempuan
        </td>
      </tr>
      <tr>
        <td>Hobi</td>
        <td>:</td>
        <td>
          <?php foreach ($hobbyList as $h): ?>
            <label class="d-block">
              <input type="checkbox" name="hobi[]" value="<?= $h ?>" <?= in_array($h, $selectedHobi) ? "checked" : "" ?>> <?= $h ?>
            </label>
          <?php endforeach; ?>
        </td>
      </tr>
      <tr>
        <td>Ekstrakurikuler</td>
        <td>:</td>
        <td>
          <select name="ekskul[]" multiple class="form-control border-success" style="height: 140px;">
            <?php foreach ($ekskulList as $e): ?>
              <option value="<?= $e ?>" <?= in_array($e, $selectedEkskul) ? "selected" : "" ?>><?= $e ?></option>
            <?php endforeach; ?>
          </select>
          <small class="text-muted">*Tahan tombol CTRL (Windows) untuk pilih lebih dari satu</small>
        </td>
      </tr>
    </table>

    <div class="text-center mt-3">
        <button type="submit" class="btn btn-success px-4"><i class="fas fa-save"></i> Simpan Data</button>
        <a href="index.php" class="btn btn-outline-secondary px-4"><i class="fas fa-times"></i> Batal</a>
    </div>
  </div>
</div>