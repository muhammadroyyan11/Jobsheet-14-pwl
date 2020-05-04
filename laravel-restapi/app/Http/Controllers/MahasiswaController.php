<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();

        if(count($data) > 0){
            $res['massage'] = "Success!";
            $res['values'] = $data;
            return response($res);
        } else {
            $res['massage'] = "Kosong!";
            return response($res);
        }
    }

    public function getId($id)
    {
        $data = Mahasiswa::where('id',$id)->get();

        if(count($data) > 0){
            $res['massage'] = "Success!";
            $res['values'] = $data;
            return response($res);
        } else {
            $res['massage'] = "gagal!";
            return response($res);
        }
    }

    public function create(Request $request)
    {
        $mhs = new Mahasiswa();
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->email = $request->email;
        $mhs->jurusan = $request->jurusan;

        if($mhs->save()){
            $res['message'] = "Data Berhasil Di Tambah!";
            $res['values'] = $mhs;
            return response($res);
        }
    }

    public function update(Request $request, $id)
    {
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;

        $mhs = Mahasiswa::find($id);
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->email = $request->email;
        $mhs->jurusan = $request->jurusan;

        if($mhs->save()){
            $res['message'] = "Data berhasil di ubah";
            $res['values'] = "$mhs";
            return response($res);
        } else {
            $res['massage'] = "gagal!";
            return response($res);
        }
    }

    public function delete($id)
    {
        $mhs = Mahasiswa::where('id',$id);

        if($mhs->delete()){
            $res['massage'] = "Data Berhasil Di Hapus!";
            return response($res);
        } else {
            $res['massage'] = "gagal!";
            return response($res);
        }
    }
}
