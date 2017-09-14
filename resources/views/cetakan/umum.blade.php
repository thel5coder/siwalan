@if(count($umum)>0)
    <table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000">
        <tbody>
        <tr>
            <td colspan="2" rowspan="3" align="center" valign="middle"><strong>Tenaga Kerja</strong></td>
            <td rowspan="3">&nbsp;</td>
            <td rowspan="3"><strong>Kelompok Umur</strong></td>
            <td colspan="6" align="center"><strong>Hubungan Kerja</strong></td>
            <td rowspan="3"><strong>Jumlah</strong></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><strong>Tetap</strong></td>
            <td colspan="3" align="center"><strong>Tidak Tetap</strong></td>
        </tr>
        <tr>
            <td><strong>CPUH</strong></td>
            <td><strong>CPUBR</strong></td>
            <td><strong>CPUBL</strong></td>
            <td><strong>CPUH</strong></td>
            <td><strong>CPUBR</strong></td>
            <td><strong>CPUBL</strong></td>
        </tr>
        <tr>
            <td rowspan="6">WNI</td>
            <td rowspan="3">Laki - laki</td>
            <td rowspan="6">&nbsp;</td>
            <td><p>&ge;18 Th</p></td>
            <td>{{$umum->jml_cpuh_tetap_wni_laki_lebih_dari_18}}</td>
            <td>{{$umum->jml_cpubr_tetap_wni_laki_lebih_dari_18}}</td>
            <td>{{$umum->jml_cpubl_tetap_wni_laki_lebih_dari_18}}</td>
            <td>{{$umum->jml_cpuh_tidaktetap_wni_laki_lebih_dari_18}}</td>
            <td>{{$umum->jml_cpubr_tidaktetap_wni_laki_lebih_dari_18}}</td>
            <td>{{$umum->jml_cpubl_tidaktetap_wni_laki_lebih_dari_18}}</td>
            <td>{{$umum->jml_wni_laki_lebih_dari_18}}</td>
        </tr>
        <tr>
            <td><p>≥15 Th s/d &lt; 18 th</p></td>
            <td>{{$umum->jml_cpuh_tetap_wni_laki_kurang_dari_18}}</td>
            <td>{{$umum->jml_cpubr_tetap_wni_laki_kurang_dari_18}}</td>
            <td>{{$umum->jml_cpubl_tetap_wni_laki_kurang_dari_18}}</td>
            <td>{{$umum->jml_cpuh_tidaktetap_wni_laki_kurang_dari_18}}</td>
            <td>{{$umum->jml_cpubr_tidaktetap_wni_laki_kurang_dari_18}}</td>
            <td>{{$umum->jml_cpubl_tidaktetap_wni_laki_kurang_dari_18}}</td>
            <td>{{$umum->jml_wni_laki_kurang_dari_18}}</td>
        </tr>
        <tr>
            <td>&lt; 15</td>
            <td>{{$umum->jml_cpuh_tetap_wni_laki_kurang_dari_15}}</td>
            <td>{{$umum->jml_cpubr_tetap_wni_laki_kurang_dari_15}}</td>
            <td>{{$umum->jml_cpubl_tetap_wni_laki_kurang_dari_15}}</td>
            <td>{{$umum->jml_cpuh_tidaktetap_wni_laki_kurang_dari_15}}</td>
            <td>{{$umum->jml_cpubr_tidaktetap_wni_laki_kurang_dari_15}}</td>
            <td>{{$umum->jml_cpubl_tidaktetap_wni_laki_kurang_dari_15}}</td>
            <td>{{$umum->jml_wni_laki_kurang_dari_15}}</td>
        </tr>
        <tr>
            <td rowspan="3">Wanita</td>
            <td><p>&ge;18 Th</p></td>
            <td>{{$umum->jml_cpuh_tetap_wni_wanita_lebih_dari_18}}</td>
            <td>{{$umum->jml_cpubr_tetap_wni_wanita_lebih_dari_18}}</td>
            <td>{{$umum->jml_cpubl_tetap_wni_wanita_lebih_dari_18}}</td>
            <td>{{$umum->jml_cpuh_tidaktetap_wni_wanita_lebih_dari_18}}</td>
            <td>{{$umum->jml_cpubr_tidaktetap_wni_wanita_lebih_dari_18}}</td>
            <td>{{$umum->jml_cpubl_tidaktetap_wni_wanita_lebih_dari_18}}</td>
            <td>{{$umum->jml_wni_wanita_lebih_dari_18}}</td>
        </tr>
        <tr>
            <td><p>≥15 Th s/d &lt; 18 th</p></td>
            <td>{{$umum->jml_cpuh_tetap_wni_wanita_kurang_dari_18}}</td>
            <td>{{$umum->jml_cpubr_tetap_wni_wanita_kurang_dari_18}}</td>
            <td>{{$umum->jml_cpubl_tetap_wni_wanita_kurang_dari_18}}</td>
            <td>{{$umum->jml_cpuh_tidaktetap_wni_wanita_kurang_dari_18}}</td>
            <td>{{$umum->jml_cpubr_tetap_wni_wanita_kurang_dari_18}}</td>
            <td>{{$umum->jml_cpubl_tetap_wni_wanita_kurang_dari_18}}</td>
            <td>{{$umum->jml_wni_wanita_kurang_dari_18}}</td>
        </tr>
        <tr>
            <td>&lt; 15</td>
            <td>{{$umum->jml_cpuh_tetap_wni_wanita_kurang_dari_15}}</td>
            <td>{{$umum->jml_cpubr_tetap_wni_wanita_kurang_dari_15}}</td>
            <td>{{$umum->jml_cpubl_tetap_wni_wanita_kurang_dari_15}}</td>
            <td>{{$umum->jml_cpuh_tidaktetap_wni_wanita_kurang_dari_15}}</td>
            <td>{{$umum->jml_cpubr_tetap_wni_wanita_kurang_dari_15}}</td>
            <td>{{$umum->jml_cpubl_tetap_wni_wanita_kurang_dari_15}}</td>
            <td>{{$umum->jml_wni_wanita_kurang_dari_18}}</td>
        </tr>
        <tr>
            <td rowspan="2">WNA</td>
            <td colspan="3">Laki-laki</td>
            <td>{{$umum->jml_cpuh_tetap_wna_laki}}</td>
            <td>{{$umum->jml_cpubr_tetap_wna_laki}}</td>
            <td>{{$umum->jml_cpubl_tetap_wna_laki}}</td>
            <td>{{$umum->jml_cpuh_tidaktetap_wna_laki}}</td>
            <td>{{$umum->jml_cpubr_tidaktetap_wna_laki}}</td>
            <td>{{$umum->jml_cpubl_tidaktetap_wna_laki}}</td>
            <td>{{$umum->jml_wna_laki}}</td>
        </tr>
        <tr>
            <td colspan="3">Perempuan</td>
            <td>{{$umum->jml_cpuh_tetap_wna_wanita}}</td>
            <td>{{$umum->jml_cpubr_tetap_wna_wanita}}</td>
            <td>{{$umum->jml_cpubl_tetap_wna_wanita}}</td>
            <td>{{$umum->jml_cpuh_tidaktetap_wna_wanita}}</td>
            <td>{{$umum->jml_cpubr_tidaktetap_wna_wanita}}</td>
            <td>{{$umum->jml_cpubl_tidaktetap_wna_wanita}}</td>
            <td>{{$umum->jml_wna_wanita}}</td>
        </tr>
        <tr>
            <td colspan="4" align="center"><strong>Jumlah</strong></td>
            <td>{{$umum->jml_tenaga_kerja_tetap_cpuh}}</td>
            <td>{{$umum->jml_tenaga_kerja_tetap_cpubr}}</td>
            <td>{{$umum->jml_tenaga_kerja_tetap_cpubl}}</td>
            <td>{{$umum->jml_tenaga_kerja_tidak_tetap_cpuh}}</td>
            <td>{{$umum->jml_tenaga_kerja_tidak_tetap_cpubr}}</td>
            <td>{{$umum->jml_tenaga_kerja_tidak_tetap_cpubl}}</td>
            <td>{{$umum->total_pekerja}}</td>
        </tr>
        <tr>
            <td colspan="4">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="18%">CPUH</td>
                        <td width="6%">:</td>
                        <td width="76%">Cara Pembayaran Upah Harian</td>
                    </tr>
                    <tr>
                        <td>CPUBR</td>
                        <td>:</td>
                        <td>Cara Pembayaran Upah Borongan</td>
                    </tr>
                    <tr>
                        <td>CPUBL</td>
                        <td>:</td>
                        <td>Cara Pembayaran Upah Bulanan</td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        </tbody>
    </table>
@else
    <table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000">
        <tbody>
        <tr>
            <td colspan="2" rowspan="3" align="center" valign="middle"><strong>Tenaga Kerja</strong></td>
            <td rowspan="3">&nbsp;</td>
            <td rowspan="3"><strong>Kelompok Umur</strong></td>
            <td colspan="6" align="center"><strong>Hubungan Kerja</strong></td>
            <td rowspan="3"><strong>Jumlah</strong></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><strong>Tetap</strong></td>
            <td colspan="3" align="center"><strong>Tidak Tetap</strong></td>
        </tr>
        <tr>
            <td><strong>CPUH</strong></td>
            <td><strong>CPUBR</strong></td>
            <td><strong>CPUBL</strong></td>
            <td><strong>CPUH</strong></td>
            <td><strong>CPUBR</strong></td>
            <td><strong>CPUBL</strong></td>
        </tr>
        <tr>
            <td rowspan="6">WNI</td>
            <td rowspan="3">Laki - laki</td>
            <td rowspan="6">&nbsp;</td>
            <td><p>&ge;18 Th</p></td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td></td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td><p>≥15 Th s/d &lt; 18 th</p></td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td>&lt; 15</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td rowspan="3">Wanita</td>
            <td><p>&ge;18 Th</p></td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td><p>≥15 Th s/d &lt; 18 th</p></td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td>&lt; 15</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td></td>
            <td>0</td>
        </tr>
        <tr>
            <td rowspan="2">WNA</td>
            <td colspan="3">Laki-laki</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td colspan="3">Perempuan</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td colspan="4" align="center"><strong>Jumlah</strong></td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td colspan="4">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="18%">CPUH</td>
                        <td width="6%">:</td>
                        <td width="76%">Cara Pembayaran Upah Harian</td>
                    </tr>
                    <tr>
                        <td>CPUBR</td>
                        <td>:</td>
                        <td>Cara Pembayaran Upah Borongan</td>
                    </tr>
                    <tr>
                        <td>CPUBL</td>
                        <td>:</td>
                        <td>Cara Pembayaran Upah Bulanan</td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        </tbody>
    </table>
@endif