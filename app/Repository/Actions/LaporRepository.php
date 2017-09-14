<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 06.02
 */

namespace App\Repository\Actions;


use App\Models\WajibLaporModel;
use App\Repository\Contract\ILaporRepository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Repository\Contract\Pagination\PaginationResult;

class LaporRepository implements ILaporRepository
{

    public function create($input)
    {
        $lapor = new WajibLaporModel();
        $lapor->perusahaan_id = $input['perusahaanId'];
        $lapor->tgl_lapor = $input['tglLapor'];
        $lapor->kode_wilayah = $input['kodeWilayah'];
        $lapor->tahun = $input['tahun'];
        $lapor->kode_kblui = $input['kodeKblui'];
        $lapor->laporan_ke = $input['laporanKe'];
        $lapor->tgl_lapor_selanjutnya = $input['laporanSelanjutnya'];

        return $lapor->save();
    }

    public function update($input)
    {
        $lapor = WajibLaporModel::find($input['id']);
        $lapor->tgl_lapor = $input['tglLapor'];
        $lapor->nomor_registrasi = $input['nomorRegistrasi'];
        $lapor->tgl_lapor_selanjutnya = $input['tglLaporSelanjutnya'];

        return $lapor->save();
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function read($id)
    {
        return WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
            ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
            ->select('wajib_lapor.*', 'users.jenis_usaha_id', 'users.kode_pos', 'master_korwil.nama_korwil', 'master_korwil.kode_korwil')
            ->where('wajib_lapor.id', '=', $id)
            ->first();
    }

    public function showAll()
    {
        // TODO: Implement showAll() method.
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
        $result->setTotalCount(WajibLaporModel::count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = WajibLaporModel::take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = WajibLaporModel::where('nomor_registrasi', 'like', '%' . $param->getKeyword() . '%')
                    ->orWhere('tgl_lapor', 'like', '%' . $param->getKeyword() . '%')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::where('nomor_registrasi', 'like', '%' . $param->getKeyword() . '%')
                    ->orWhere('tgl_lapor', 'like', '%' . $param->getKeyword() . '%')
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

    public function checkExistingLapor($tahun)
    {
        $result = WajibLaporModel::where('perusahaan_id', '=', auth()->user()->id)->where('tahun', '=', $tahun)->count();

        return ($result > 0);
    }

    public function getPaginationByPerusahaan(PaginationParam $param)
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
        $result->setTotalCount(WajibLaporModel::where('perusahaan_id', '=', auth()->user()->id)->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = WajibLaporModel::where('perusahaan_id', '=', auth()->user()->id)
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::where('perusahaan_id', '=', auth()->user()->id)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = WajibLaporModel::where('perusahaan_id', '=', auth()->user()->id)
                    ->where(function ($q) use ($param) {
                        $q->where('nomor_registrasi', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('tgl_lapor', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::where('perusahaan_id', '=', auth()->user()->id)
                    ->where(function ($q) use ($param) {
                        $q->where('nomor_registrasi', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('tgl_lapor', 'like', '%' . $param->getKeyword() . '%');
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

    public function getCountWajibLapor()
    {
        $result = WajibLaporModel::where('perusahaan_id', '=', auth()->user()->id)->count();

        return ($result > 0);
    }

    public function getLastWajibLapor()
    {
        return WajibLaporModel::where('perusahaan_id', '=', auth()->user()->id)->value('laporan_ke');
    }

    public function getCountWajibLaporModerasiPerPerusahaan()
    {
        return WajibLaporModel::where('perusahaan_id', '=', auth()->user()->id)->where('status', '=', 'Moderasi')->count();
    }

    public function getCountWajibLaporRevisiPerPerusahaan()
    {
        return WajibLaporModel::where('perusahaan_id', '=', auth()->user()->id)->where('status', '=', 'Revisi')->count();
    }

    public function getCountWajibLaporValidPerPerusahaan()
    {
        return WajibLaporModel::where('perusahaan_id', '=', auth()->user()->id)->where('status', '=', 'Valid')->count();
    }

    public function getCountWajibLaporModerasi()
    {
        return WajibLaporModel::where('status', '=', 'Moderasi')->count();
    }

    public function getCountWajibLaporRevisi()
    {
        return WajibLaporModel::where('status', '=', 'Revisi')->count();
    }

    public function getCountWajibLaporValid()
    {
        return WajibLaporModel::where('status', '=', 'Valid')->count();
    }

    public function getCountAllWajibLapor()
    {
        return WajibLaporModel::count();
    }

    public function paginationByStatusLapor(PaginationParam $param, $korwil, $status)
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
        $result->setTotalCount(WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
            ->where('users.korwil', '=', $korwil)
            ->where('users.user_level', '=', 'perusahaan')
            ->where('wajib_lapor.status', '=', $status)
        );

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.korwil', 'users.nama', 'master_korwil.nama_korwil')
                    ->where('users.user_level', '=', 'perusahaan')
                    ->where('users.korwil', '=', $korwil)
                    ->where('wajib_lapor.status', '=', $status)
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.korwil', 'users.nama', 'master_korwil.nama_korwil')
                    ->where('users.user_level', '=', 'perusahaan')
                    ->where('users.korwil', '=', $korwil)
                    ->where('wajib_lapor.status', '=', $status)
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.korwil', 'users.nama', 'master_korwil.nama_korwil')
                    ->where(function ($q) use ($korwil, $status) {
                        $q->where('users.korwil', '=', $korwil)
                            ->where('users.user_level', '=', 'perusahaan')
                            ->where('wajib_lapor.status', '=', $status);
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('wajib_lapor.nomor_registrasi', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('wajib_lapor.tgl_lapor', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('wajib_lapor.status', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.korwil', 'users.nama', 'master_korwil.nama_korwil')
                    ->where(function ($q) use ($korwil, $status) {
                        $q->where('users.korwil', '=', $korwil)
                            ->where('users.user_level', '=', 'perusahaan')
                            ->where('wajib_lapor.status', '=', $status);
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('wajib_lapor.nomor_registrasi', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('wajib_lapor.tgl_lapor', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('users.nama', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('wajib_lapor.status', 'like', '%' . $param->getKeyword() . '%');
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

    public function changeStatusLapor($id, $status)
    {
        $lapor = WajibLaporModel::find($id);
        $lapor->status = $status;

        return $lapor->save();
    }

    public function paginationByTahun(PaginationParam $param, $tahun)
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
        $result->setTotalCount(WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
            ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
            ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
            ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
            ->where('wajib_lapor.tahun', '=', $tahun)
            ->where('users.user_level', '=', 'perusahaan')
            ->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.nama', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'master_korwil.nama_korwil')
                    ->where('wajib_lapor.tahun', '=', $tahun)
                    ->where('users.user_level', '=', 'perusahaan')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.nama', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'master_korwil.nama_korwil')
                    ->where('wajib_lapor.tahun', '=', $tahun)
                    ->where('users.user_level', '=', 'perusahaan')
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.nama', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'master_korwil.nama_korwil')
                    ->where(function ($q) use ($tahun) {
                        $q->where('wajib_lapor.tahun', '=', $tahun)
                            ->where('users.user_level', '=', 'perusahaan');
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama_perusahaan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('wajib_lapor.tgl_lapor', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.nama', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'master_korwil.nama_korwil')
                    ->where(function ($q) use ($tahun) {
                        $q->where('wajib_lapor.tahun', '=', $tahun)
                            ->where('users.user_level', '=', 'perusahaan');
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama_perusahaan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('wajib_lapor.tgl_lapor', 'like', '%' . $param->getKeyword() . '%');
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

    public function paginationByKabupaten(PaginationParam $param, $kabupaten, $tahun)
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
        //get total count datauser
        $result->setTotalCount(WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
            ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
            ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
            ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
            ->where('wajib_lapor.tahun', '=', $tahun)
            ->where('users.kabupaten', '=', $kabupaten)
            ->where('users.user_level','=','perusahaan')
            ->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.nama', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'master_korwil.nama_korwil')
                    ->where('wajib_lapor.tahun', '=', $tahun)
                    ->where('users.kabupaten', '=', $kabupaten)
                    ->where('users.user_level','=','perusahaan')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.nama', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'master_korwil.nama_korwil')
                    ->where('wajib_lapor.tahun', '=', $tahun)
                    ->where('users.kabupaten', '=', $kabupaten)
                    ->where('users.user_level','=','perusahaan')
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.nama', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'master_korwil.nama_korwil')
                    ->where(function ($q) use ($tahun, $kabupaten) {
                        $q->where('wajib_lapor.tahun', '=', $tahun)
                            ->where('users.kabupaten', '=', $kabupaten)
                            ->where('users.user_level','=','perusahaan');
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama_perusahaan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('wajib_lapor.tgl_lapor', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.nama', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'master_korwil.nama_korwil')
                    ->where(function ($q) use ($tahun, $kabupaten) {
                        $q->where('wajib_lapor.tahun', '=', $tahun)
                            ->where('users.kabupaten', '=', $kabupaten)
                            ->where('users.user_level','=','perusahaan');
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama_perusahaan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('wajib_lapor.tgl_lapor', 'like', '%' . $param->getKeyword() . '%');
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

    public function paginationByKecamatan(PaginationParam $param, $kecamatan, $tahun)
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
        //get total count datauser
        $result->setTotalCount(WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
            ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
            ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
            ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
            ->where('wajib_lapor.tahun', '=', $tahun)
            ->where('users.kelurahan', '=', $kecamatan)
            ->where('users.user_level','=','perusahaan')
            ->count());

        //get data
        if ($param->getKeyword() == '') {

            if ($skipCount == 0) {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.nama', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'master_korwil.nama_korwil')
                    ->where('wajib_lapor.tahun', '=', $tahun)
                    ->where('users.kelurahan', '=', $kecamatan)
                    ->where('users.user_level','=','perusahaan')
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.nama', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'master_korwil.nama_korwil')
                    ->where('wajib_lapor.tahun', '=', $tahun)
                    ->where('users.kelurahan', '=', $kecamatan)
                    ->where('users.user_level','=','perusahaan')
                    ->skip($skipCount)->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            }
        } else {
            if ($skipCount == 0) {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.nama', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'master_korwil.nama_korwil')
                    ->where(function ($q) use ($tahun, $kecamatan) {
                        $q->where('wajib_lapor.tahun', '=', $tahun)
                            ->where('users.user_level','=','perusahaan')
                            ->where('users.kelurahan', '=', $kecamatan);
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama_perusahaan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('wajib_lapor.tgl_lapor', 'like', '%' . $param->getKeyword() . '%');
                    })
                    ->take($param->getPageSize())
                    ->orderBy($sortBy, $sortOrder)
                    ->get();
            } else {
                $data = WajibLaporModel::join('users', 'users.id', '=', 'wajib_lapor.perusahaan_id')
                    ->join('kecamatan', 'kecamatan.id', '=', 'users.kelurahan')
                    ->join('kabupaten', 'kabupaten.id', '=', 'users.kabupaten')
                    ->join('master_korwil', 'master_korwil.id', '=', 'users.korwil')
                    ->select('wajib_lapor.*', 'users.nama', 'kabupaten.nama_kabupaten', 'kecamatan.nama_kecamatan', 'master_korwil.nama_korwil')
                    ->where(function ($q) use ($tahun, $kecamatan) {
                        $q->where('wajib_lapor.tahun', '=', $tahun)
                            ->where('users.user_level','=','perusahaan')
                            ->where('users.kelurahan', '=', $kecamatan);
                    })
                    ->where(function ($q) use ($param) {
                        $q->where('users.nama_perusahaan', 'like', '%' . $param->getKeyword() . '%')
                            ->orWhere('wajib_lapor.tgl_lapor', 'like', '%' . $param->getKeyword() . '%');
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