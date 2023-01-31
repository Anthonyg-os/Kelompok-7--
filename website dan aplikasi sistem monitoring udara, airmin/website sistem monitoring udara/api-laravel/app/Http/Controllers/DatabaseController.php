<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DatabaseController extends Controller
{
    public function riwayat()
    {
        $riwayat = DB::select("SELECT * FROM tbl_his 
        LEFT JOIN tbl_hum ON tbl_his.id_data = tbl_hum.id_data 
        LEFT JOIN tbl_suhu ON tbl_his.id_data = tbl_suhu.id_data 
        LEFT JOIN tbl_quality ON tbl_his.id_data = tbl_quality.id_data");

        $json = json_encode($riwayat);
        print_r($json);
    }


    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $req = $request;

        $suhu = $req->suhu;
        $air_quality  = $req->air_quality;
        $humidty  = $req->humidty;

        $tanggal = date('d-m-Y');
        $jam = date("H:i:s");

        //tambah data di header
        DB::insert("insert into tbl_his set tanggal='$tanggal',
                                            jam='$jam'", []);
        //ambil id terakhir
        $last_id = DB::select("SELECT MAX(id_data) AS id_data FROM tbl_his");
        $id_data= $last_id[0]->id_data;
        //tambah data di suhu
        DB::insert("insert into tbl_suhu set id_data='$id_data',
                                            temp=?", [$suhu]);
        //tambah data di air_quality
        DB::insert("insert into tbl_quality set id_data='$id_data',
        aqi=?", [$air_quality]);
        //tambah data di humidty
        DB::insert("insert into tbl_hum set id_data='$id_data',
        hum=?", [$humidty]);

        $rows=array();
        $rows['status']=true;
        $json = json_encode($rows);
        print_r($json);

    }

    public function update(Request $request, $cif)
    {

        $messages = [
            'min'    => 'Minimal diisi :min karakter!',
            'required'    => ':attribute wajib diisi!'
        ];

        $rules = [
            'nama' => 'required|min:8',
            'kecamatan' => 'required|min:5'
        ];

        $this->validate($request, $rules, $messages);

        $req = $request;
        $cif = $req->cif;
        $nama = $req->nama;
        $kecamatan  = $req->kecamatan;

        DB::insert("update koperasi set 
                                            nama='$nama',
                                            kecamatan ='$kecamatan' where cif='$cif'", []);

        return redirect('/koperasi')->with('status', 'Berhasil diubah'); //redirect ke halaman selanjutnya dengan diberi session bernama status

    }



    public function destroy($cif)
    {
        DB::delete("delete from koperasi where cif='$cif'");
        return redirect('/koperasi')->with('status', 'Berhasil dihapus'); //redirect ke halaman koperasi lagi dengan diberi session bernama status

    }
}
