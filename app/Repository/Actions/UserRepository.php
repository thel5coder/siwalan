<?php
namespace App\Repository\Actions;

use App\Models\User;
use App\Repository\Contract\IUserRepository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Repository\Contract\Pagination\PaginationResult;

class UserRepository implements IUserRepository
{

    public function create($input)
    {
        $user = new User();
        $user->nama = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->user_level = $input['userLevel'];
        if (isset($input['token']) || $input['token'] != '') {
            $user->activation_token = $input['token'];
        }

        return $user->save();
    }

    public function update($input)
    {
        $user = User::find($input['id']);
        $user->nama = $input['namPerusahaan'];
        $user->alamat_perusahaan = $input['alamatPerusahaan'];
        $user->no_telepon = $input['noTelepon'];
        $user->kelurahan = $input['kelurahan'];
        $user->kabupaten = $input['kabupaten'];
        $user->kode_pos = $input['kodePos'];
        $user->jenis_usaha = $input['jenisUsaha'];
        $user->produk_akhir = $input['produkAkhir'];
        $user->nama_pemilik = $input['namaPemilik'];
        $user->alamat_pemilik = $input['alamatPemilik'];
        $user->nama_pengelolah = $input['namaPengelolah'];
        $user->alamat_pengelolah = $input['alamatPengelolah'];
        $user->tanggal_pendirian = $input['tglPendirian'];
        $user->nomor_akta_pendirian = $input['nomorAktaPendirian'];
        if (isset($input['tglPerpindahanPerusahaan'])) {
            $user->tgl_perpindahan_perusahaan = $input['tglPerpindahanPerusahaan'];
        }
        if(isset($input['alamatLama'])){
            $user->alamat_lama = $input['alamatLama'];
        }
        $user->status_perusahaan = $input['statusPerusahaan'];
        $user->jumlah_cabang_di_indonesia = $input['jumlahCabangIndonesia'];
        $user->jumlah_cabang_luar_indonesia = $input['jumlahCabangLuarIndonesia'];
        $user->status_pemilikan = $input['statusPemilikan'];
        $user->status_permodalan = $input['statusPermodalan'];

        return $user->save();
    }

    public function delete($id)
    {
        return User::find($id)->delete();
    }

    public function read($id)
    {
        return User::find($id);
    }

    public function showAll()
    {
        return User::all();
    }

    public function paginationData(PaginationParam $param)
    {

    }

    public function checkEmail($email, $id)
    {
        if ($id == '') {
            $result = User::where('email', '=', $email)->count();
        } else {
            $result = User::where('email', '=', $email)->where('id', '<>', $id)->count();
        }

        return ($result > 0);
    }

    public function checkUserIsActive($email)
    {
        $result = User::where('email', '=', $email)->value('is_active');

        return ($result == 1);
    }

    public function changeActiveStatus($id, $status)
    {
        $user = User::find($id);
        $user->is_active = $status;

        return $user->save();
    }

    public function userConfirmation($email, $token)
    {
        return User::where('email', '=', $email)
            ->where('activation_token', '=', $token)
            ->update(['is_active' => '1']);
    }

    public function updateDataUmumPerusahaan($perusahaanId, $param)
    {
        $perusahaan = User::find($perusahaanId);
        $perusahaan->nama = $param['namPerusahaan'];
        $perusahaan->alamat_perusahaan = $param['alamatPerusahaan'];
        $perusahaan->no_telepon = $param['noTelepon'];
        $perusahaan->kelurahan = $param['kelurahan'];
        $perusahaan->kabupaten = $param['kabupaten'];
        $perusahaan->kode_pos = $param['kodePos'];
        $perusahaan->jenis_usaha_id = $param['jenisUsaha'];
        $perusahaan->produk_akhir = $param['produkAkhir'];
        $perusahaan->korwil = $param['korwilId'];

        return $perusahaan->save();
    }

    public function updateDataLegalitasPerusahaan($perusahaanId, $param)
    {
        $perusahaan = User::find($perusahaanId);
        $perusahaan->tanggal_pendirian = $param['tglPendirian'];
        $perusahaan->nomor_akta_pendirian = $param['nomorAktaPendirian'];
        if (isset($param['tglPerpindahanPerusahaan'])) {
            $perusahaan->tgl_perpindahan_perusahaan = $param['tglPerpindahanPerusahaan'];
        }
        if(isset($input['alamatLama'])){
            $perusahaan->alamat_lama = $param['alamatLama'];
        }
        $perusahaan->status_perusahaan = $param['statusPerusahaan'];
        $perusahaan->jumlah_cabang_di_indonesia = $param['jumlahCabangIndonesia'];
        $perusahaan->jumlah_cabang_luar_indonesia = $param['jumlahCabangLuarIndonesia'];
        $perusahaan->status_pemilikan = $param['statusPemilikan'];
        $perusahaan->status_permodalan = $param['statusPermodalan'];

        return $perusahaan->save();
    }

    public function updateDataPengelolah($perusahaanId, $param)
    {
        $perusahaan = User::find($perusahaanId);
        $perusahaan->nama_pengelolah = $param['namaPengelolah'];
        $perusahaan->alamat_pengelolah = $param['alamatPengelolah'];

        return $perusahaan->save();
    }


}