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

    public function createUserDinas($input)
    {
        $user = new User();
        $user->nama = $input['name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->user_level = $input['userLevel'];
        $user->is_active = 1;
        $user->kabupaten = $input['kabupaten'];
        $user->kelurahan = $input['kelurahan'];
        $user->korwil = $input['korwilId'];

        return $user->save();
    }

    public function changePassword($id, $password)
    {
       return User::where('id','=',$id)->orWhere('email','=',$id)
           ->update(['password'=>bcrypt($password)]);
    }

    public function changeEmail($id, $email)
    {
        $user = User::find($id);
        $user->email = $email;

        return $user->save();
    }


    public function updateUserDinas($input)
    {
        $user = User::find($input['id']);
        $user->nama = $input['name'];
        $user->kabupaten = $input['kabupaten'];
        $user->kelurahan = $input['kelurahan'];
        $user->korwil = $input['korwilId'];

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
        if (isset($input['alamatLama'])) {
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
        return User::join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
            ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
            ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
            ->join('master_jenis_usaha', 'master_jenis_usaha.id', '=', 'users.jenis_usaha_id')
            ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten',
                'master_jenis_usaha.nama_jenis_usaha')
            ->where('users.id', '=', $id)
            ->first();
    }

    public function showAll()
    {
        return User::all();
    }

    public function paginationData(PaginationParam $param)
    {
        $result = new PaginationResult();

        $sortBy = ($param->getSortBy() == '' ? 'id' : $param->getSortBy());
        $sortOrder = ($param->getSortOrder() == '' ? 'asc' : $param->getSortOrder());

        //setup skip data for paging
        if ($param->getPageSize() == -1) {
            $skipCount = 0;
        } else {
            $skipCount = ($param->getPageIndex() * $param->getPageSize());
        }
        //get total count data
        $result->setTotalCount(User::join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
            ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
            ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
            ->join('master_jenis_usaha', 'master_jenis_usaha.id', '=', 'users.jenis_usaha_id')
            ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten',
                'master_jenis_usaha.nama_jenis_usaha')->where('users.user_level','=','perusahaan')->where('')->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('users.user_level','=','perusahaan')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('users.user_level','=','perusahaan')
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('users.user_level','=','perusahaan')
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.email', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.alamat_perusahaan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.no_teleepon', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('master_korwil.nama_korwil', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kabupaten.nama_kabupaten', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kecamatan.nama_kecamatan', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('users.user_level','=','perusahaan')
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.email', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.alamat_perusahaan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.no_teleepon', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('master_korwil.nama_korwil', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kabupaten.nama_kabupaten', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kecamatan.nama_kecamatan', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->orderBy($sortBy, $sortOrder)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->get();
            }
        }

        $result->setCurrentPageIndex($param->getPageIndex());
        $result->setCurrentPageSize($param->getPageSize());
        $result->setResult($data);

        return $result;
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
        $perusahaan = User::find(auth()->user()->id);
        $perusahaan->tanggal_pendirian = date('Y-m-d', strtotime($param['tglPendirian']));
        $perusahaan->nomor_akta_pendirian = $param['nomorAktaPendirian'];
        if (isset($param['tglPerpindahanPerusahaan'])) {
            $perusahaan->tgl_perpindahan_perusahaan = date('Y-m-d', strtotime($param['tglPerpindahanPerusahaan']));
        }
        if (isset($param['alamatLama'])) {
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

    public function getCountRegisterUserPerDay()
    {
        return User::where('register_date', '=', date('Y-m-d'))->count();
    }

    public function getCountRegisterUserPerMont()
    {
        return User::where('register_date', 'like', date('Y-m') . '%')->count();
    }

    public function paginationUserByUserLevel(PaginationParam $param, $userLevel)
    {
        $result = new PaginationResult();

        $sortBy = ($param->getSortBy() == '' ? 'id' : $param->getSortBy());
        $sortOrder = ($param->getSortOrder() == '' ? 'asc' : $param->getSortOrder());

        //setup skip data for paging
        if ($param->getPageSize() == -1) {
            $skipCount = 0;
        } else {
            $skipCount = ($param->getPageIndex() * $param->getPageSize());
        }
        //get total count data
        $result->setTotalCount(User::join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
            ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
            ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
            ->join('master_jenis_usaha', 'master_jenis_usaha.id', '=', 'users.jenis_usaha_id')
            ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten',
                'master_jenis_usaha.nama_jenis_usaha')
            ->where('users.user_level', '=', $userLevel)->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('users.user_level', '=', $userLevel)
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('users.user_level', '=', $userLevel)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('users.user_level', '=', $userLevel)
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('email', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('users.user_level', '=', $userLevel)
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('email', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->orderBy($sortBy, $sortOrder)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->get();
            }
        }

        $result->setCurrentPageIndex($param->getPageIndex());
        $result->setCurrentPageSize($param->getPageSize());
        $result->setResult($data);

        return $result;
    }

    public function paginationPerusahaanByKorwil(PaginationParam $param, $korwil)
    {
        $result = new PaginationResult();

        $sortBy = ($param->getSortBy() == '' ? 'id' : $param->getSortBy());
        $sortOrder = ($param->getSortOrder() == '' ? 'asc' : $param->getSortOrder());

        //setup skip data for paging
        if ($param->getPageSize() == -1) {
            $skipCount = 0;
        } else {
            $skipCount = ($param->getPageIndex() * $param->getPageSize());
        }
        //get total count data
        $result->setTotalCount(User::join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
            ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
            ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
            ->join('master_jenis_usaha', 'master_jenis_usaha.id', '=', 'users.jenis_usaha_id')
            ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten',
                'master_jenis_usaha.nama_jenis_usaha')->where('users.user_level', '=', 'perusahaan')->where('users.korwil', '=', $korwil)->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = User::join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_jenis_usaha', 'master_jenis_usaha.id', '=', 'users.jenis_usaha_id')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten',
                        'master_jenis_usaha.nama_jenis_usaha')
                    ->where('users.user_level', '=', 'perusahaan')
                    ->where('users.korwil', '=', $korwil)
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = User::join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_jenis_usaha', 'master_jenis_usaha.id', '=', 'users.jenis_usaha_id')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten',
                        'master_jenis_usaha.nama_jenis_usaha')
                    ->where('users.user_level', '=', 'perusahaan')
                    ->where('users.korwil', '=', $korwil)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = User::join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_jenis_usaha', 'master_jenis_usaha.id', '=', 'users.jenis_usaha_id')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten',
                        'master_jenis_usaha.nama_jenis_usaha')
                    ->where(function ($q) use ($korwil) {
                        $q->where('users.user_level', '=', 'perusahaan')
                            ->where('users.korwil', '=', $korwil);
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.email', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = User::join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_jenis_usaha', 'master_jenis_usaha.id', '=', 'users.jenis_usaha_id')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten',
                        'master_jenis_usaha.nama_jenis_usaha')
                    ->where(function ($q) use ($korwil) {
                        $q->where('users.user_level', '=', 'perusahaan')
                            ->where('users.korwil', '=', $korwil);
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.email', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->orderBy($sortBy, $sortOrder)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->get();
            }
        }

        $result->setCurrentPageIndex($param->getPageIndex());
        $result->setCurrentPageSize($param->getPageSize());
        $result->setResult($data);

        return $result;
    }

    public function paginationByKabupaten(PaginationParam $param, $kabupaten)
    {
        $result = new PaginationResult();

        $sortBy = ($param->getSortBy() == '' ? 'id' : $param->getSortBy());
        $sortOrder = ($param->getSortOrder() == '' ? 'asc' : $param->getSortOrder());

        //setup skip data for paging
        if ($param->getPageSize() == -1) {
            $skipCount = 0;
        } else {
            $skipCount = ($param->getPageIndex() * $param->getPageSize());
        }
        //get total count data
        $result->setTotalCount(User::join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
            ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
            ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
            ->join('master_jenis_usaha', 'master_jenis_usaha.id', '=', 'users.jenis_usaha_id')
            ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten',
                'master_jenis_usaha.nama_jenis_usaha')
            ->where('users.user_level','=','perusahaan')
            ->where('users.kabupaten','=',$kabupaten)
            ->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('users.user_level','=','perusahaan')
                    ->where('users.kabupaten','=',$kabupaten)
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('users.user_level','=','perusahaan')
                    ->where('users.kabupaten','=',$kabupaten)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where(function ($q)use($kabupaten){
                        $q->where('users.user_level','=','perusahaan')
                            ->where('users.kabupaten','=',$kabupaten);
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.email', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.alamat_perusahaan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.no_teleepon', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('master_korwil.nama_korwil', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kabupaten.nama_kabupaten', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kecamatan.nama_kecamatan', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where(function ($q)use($kabupaten){
                        $q->where('users.user_level','=','perusahaan')
                            ->where('users.kabupaten','=',$kabupaten);
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.email', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.alamat_perusahaan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.no_teleepon', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('master_korwil.nama_korwil', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kabupaten.nama_kabupaten', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kecamatan.nama_kecamatan', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->orderBy($sortBy, $sortOrder)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->get();
            }
        }

        $result->setCurrentPageIndex($param->getPageIndex());
        $result->setCurrentPageSize($param->getPageSize());
        $result->setResult($data);

        return $result;
    }

    public function paginationByKecamatan(PaginationParam $param, $kecamatan)
    {
        $result = new PaginationResult();

        $sortBy = ($param->getSortBy() == '' ? 'id' : $param->getSortBy());
        $sortOrder = ($param->getSortOrder() == '' ? 'asc' : $param->getSortOrder());

        //setup skip data for paging
        if ($param->getPageSize() == -1) {
            $skipCount = 0;
        } else {
            $skipCount = ($param->getPageIndex() * $param->getPageSize());
        }
        //get total count data
        $result->setTotalCount(User::join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
            ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
            ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
            ->join('master_jenis_usaha', 'master_jenis_usaha.id', '=', 'users.jenis_usaha_id')
            ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten',
                'master_jenis_usaha.nama_jenis_usaha')
            ->where('users.user_level','=','perusahaan')
            ->where('users.kelurahan','=',$kecamatan)
            ->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('users.user_level','=','perusahaan')
                    ->where('users.kelurahan','=',$kecamatan)
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where('users.user_level','=','perusahaan')
                    ->where('users.kelurahan','=',$kecamatan)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where(function ($q)use($kecamatan){
                        $q->where('users.user_level','=','perusahaan')
                            ->where('users.kelurahan','=',$kecamatan);
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.email', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.alamat_perusahaan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.no_teleepon', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('master_korwil.nama_korwil', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kabupaten.nama_kabupaten', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kecamatan.nama_kecamatan', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = User::leftJoin('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->leftJoin('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->leftJoin('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->select('users.*', 'master_korwil.kode_korwil', 'master_korwil.nama_korwil', 'kecamatan.nama_kecamatan', 'kabupaten.nama_kabupaten')
                    ->where(function ($q)use($kecamatan){
                        $q->where('users.user_level','=','perusahaan')
                            ->where('users.kelurahan','=',$kecamatan);
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.email', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.alamat_perusahaan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.no_teleepon', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('master_korwil.nama_korwil', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kabupaten.nama_kabupaten', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('kecamatan.nama_kecamatan', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->orderBy($sortBy, $sortOrder)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->get();
            }
        }

        $result->setCurrentPageIndex($param->getPageIndex());
        $result->setCurrentPageSize($param->getPageSize());
        $result->setResult($data);

        return $result;
    }


}