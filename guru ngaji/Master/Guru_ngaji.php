<?php 

namespace Master;

use Config\Query_builder;

class Guru_ngaji
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('guru_ngaji ')->get()->resultArray();
        $res = '<a href="?target=guru_ngaji&act=tambah_guru_ngaji" class="btn btn-info btn-sm">TAMBAH GURU NGAJI </a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>NO</th>
                    <th>NIK</th>
                    <th>NAMA</th>
                    <th>ALAMAT</th>
                    <th>JUMLAH SANTRI</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                <td width="10">'.$no.'</td>
                <td width="100">'.$r['nik'].'</td>
                <td WIDTH="100">'.$r['nama'].'</td>
                <td width="100">'.$r['alamat'].'</td>
                <td width="100">'.$r['santri'].'</td>
                <td width="100">
                    <a href="?target=guru_ngaji&act=edit_guru_ngaji&id='.$r['nik'].'" class="btn btn-success btn-sm">Edit</a>
                    <a href="?target=guru_ngaji&act=delete_guru_ngaji&id='.$r['nik'].'" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
                $no++;
            }
            $res .='</tbody></table></div>';
            return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=guru_ngaji" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=guru_ngaji&act=simpan_guru_ngaji">
            <div class="mb-3">
                <label for="nik" class="form-label">Nik</label>
                <input type="text" class="form-control" id="nik" name="nik">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label for="santri" class="form-label">Jumlah Santri</label>
                <input type="text" class="form-control" id="santri" name="santri">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>';

        return $res;
    }

    public function simpan(){
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $santri = $_POST['santri'];

        $data = array(
            'nik' => $nik,
            'nama' => $nama,
            'alamat' =>$alamat,
            'santri' =>$santri
        );
        return $this->db->table('guru_ngaji')->insert($data);
    }
    public function edit($id)
    {
        // get data guru_ngaji
        $r = $this->db->table('guru_ngaji')->where("nik='$id'")->get()->rowArray();
        // cek radio

        $res = '<a href="?target=guru_ngaji" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=guru_ngaji&act=update_guru_ngaji">
            <input type="hidden" class="form-control" id="param" name="param" value="'.$r['nik'].'">
            
            <div class="mb-3">
                <label for="nik" class="form-label">Nik</label>
                <input type="text" class="form-control" id="nik" name="nik" value="'.$r['nik'].'">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="'.$r['nama'].'">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="'.$r['alamat'].'">
            </div>
            <div class="mb-3">
                <label for="santri" class="form-label">Jumlah Santri</label>
                <input type="text" class="form-control" id="santri" name="santri" value="'.$r['santri'].'">
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>';
        return $res;
    }

    public function cekRadio($val, $val2) {
        if($val==$val2) {
            return "checked";
        }
        return "";
    }

    public function update() {
        $param = $_POST['param'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $santri = $_POST['santri'];

        $data = array(
            'nik' => $nik,
            'nama' => $nama,
            'alamat' =>$alamat,
            'santri' =>$santri
        );
        return $this->db->table('guru_ngaji')->where(" nik='$param'")->update($data);
    }

    public function delete($id) {
        return $this->db->table(' guru_ngaji ')->where(" nik='$id' ")->delete();
    }
}