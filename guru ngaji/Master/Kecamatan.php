<?php 

namespace Master;

use Config\Query_builder;

class Kecamatan
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('kecamatan ')->get()->resultArray();
        $res = '<a href="?target=kecamatan&act=tambah_kecamatan" class="btn btn-info btn-sm">TAMBAH KECAMATAN</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>NO</th>
                    <th>ID KECAMATAN</th>
                    <th>NAMA KECAMATAN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                <td width="10">'.$no.'</td>
                <td width="150">'.$r['id_kecamatan'].'</td>
                <td width="150">'.$r['nama_kecamatan'].'</td>
                <td width="100">
                    <a href="?target=kecamatan&act=edit_kecamatan&id='.$r['id_kecamatan'].'" class="btn btn-success btn-sm">Edit</a>
                    <a href="?target=kecamatan&act=delete_kecamatan&id='.$r['id_kecamatan'].'" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
                $no++;
            }
            $res .='</tbody></table></div>';
            return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=kecamatan" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=kecamatan&act=simpan_kecamatan">
            <div class="mb-3">
                <label for="id_kecamatan" class="form-label">ID Kecamatan</label>
                <input type="text" class="form-control" id="id_kecamatan" name="id_kecamatan">
            </div>
            <div class="mb-3">
                <label for="nama_Kecamatan" class="form-label">Nama Kecamatan</label>
                <input type="text" class="form-control" id="nama_Kecamatan" name="nama_Kecamatan">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>';

        return $res;
    }

    public function simpan(){
        $id_kecamatan = $_POST['id_kecamatan'];
        $nama_kecamatan = $_POST['nama_kecamatan'];

        $data = array(
            'id_kecamatan' => $id_kecamatan,
            'nama_kecamatan' => $nama_kecamatan
        );
        return $this->db->table('kecamatan')->insert($data);
    }
    public function edit($id)
    {
        // get data kecamatan
        $r = $this->db->table('kecamatan')->where("id_kecamatan='$id'")->get()->rowArray();
        // cek radio

        $res = '<a href="?target=kecamatan" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=kecamatan&act=update_kecamatan">
            <input type="hidden" class="form-control" id="param" name="param" value="'.$r['id_kecamatan'].'">
            
            <div class="mb-3">
                <label for="id_kecamatan" class="form-label">ID KECAMATAN</label>
                <input type="text" class="form-control" id="id_kecamatan" name="id_kecamatan" value="'.$r['id_kecamatan'].'">
            </div>
            <div class="mb-3">
                <label for="nama_kecamatan" class="form-label">NAMA KECAMATAN</label>
                <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" value="'.$r['nama_kecamatan'].'">
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
        $id_kecamatan = $_POST['id_kecamatan'];
        $nama_kecamatan = $_POST['nama_kecamatan'];

        $data = array(
            'id_kecamatan' => $id_kecamatan,
            'nama_kecamatan' => $nama_kecamatan
        );
        return $this->db->table('kecamatan')->where(" id_kecamatan='$param'")->update($data);
    }

    public function delete($id) {
        return $this->db->table(' kecamatan ')->where(" id_kecamatan='$id' ")->delete();
    }
}