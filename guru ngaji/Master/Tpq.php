<?php 

namespace Master;

use Config\Query_builder;

class Tpq
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('tpq ')->get()->resultArray();
        $res = '<a href="?target=tpq&act=tambah_tpq" class="btn btn-info btn-sm">TAMBAH TPQ</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>NO</th>
                    <th>ID TPQ</th>
                    <th>NAMA TPQ</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                <td width="10">'.$no.'</td>
                <td width="150">'.$r['id_tpq'].'</td>
                <td width="150">'.$r['nama_tpq'].'</td>
                <td width="100">
                    <a href="?target=tpq&act=edit_tpq&id='.$r['id_tpq'].'" class="btn btn-success btn-sm">Edit</a>
                    <a href="?target=tpq&act=delete_tpq&id='.$r['id_tpq'].'" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
                $no++;
            }
            $res .='</tbody></table></div>';
            return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=tpq" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=tpq&act=simpan_tpq">
            <div class="mb-3">
                <label for="id_tpq" class="form-label">ID TPQ</label>
                <input type="text" class="form-control" id="id_tpq" name="id_tpq">
            </div>
            <div class="mb-3">
                <label for="nama_tpq" class="form-label">Nama TPQ</label>
                <input type="text" class="form-control" id="nama_tpq" name="nama_tpq">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>';

        return $res;
    }

    public function simpan(){
        $id_tpq = $_POST['id_tpq'];
        $nama_tpq = $_POST['nama_tpq'];

        $data = array(
            'id_tpq' => $id_tpq,
            'nama_tpq' => $nama_tpq
        );
        return $this->db->table('tpq')->insert($data);
    }
    public function edit($id)
    {
        // get data tpq
        $r = $this->db->table('tpq')->where("id_tpq='$id'")->get()->rowArray();
        // cek radio

        $res = '<a href="?target=tpq" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=tpq&act=update_tpq">
            <input type="hidden" class="form-control" id="param" name="param" value="'.$r['id_tpq'].'">
            
            <div class="mb-3">
                <label for="id_tpq" class="form-label">ID TPQ</label>
                <input type="text" class="form-control" id="id_tpq" name="id_tpq" value="'.$r['id_tpq'].'">
            </div>
            <div class="mb-3">
                <label for="nama_tpq" class="form-label">Nama TPQ</label>
                <input type="text" class="form-control" id="nama_tpq" name="nama_tpq" value="'.$r['nama_tpq'].'">
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
        $id_tpq = $_POST['id_tpq'];
        $nama_tpq = $_POST['nama_tpq'];

        $data = array(
            'id_tpq' => $id_tpq,
            'nama_tpq' => $nama_tpq
        );
        return $this->db->table('tpq')->where(" id_tpq='$param'")->update($data);
    }

    public function delete($id) {
        return $this->db->table(' tpq ')->where(" id_tpq='$id' ")->delete();
    }
}