<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AksesModel;
use App\Models\Admin\BarangModel;
use App\Models\Admin\PeminjamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class PeminjamUserController extends Controller
{
    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = PeminjamModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_peminjam.barang_kode')
                ->where('user_id', '=', Session::get('user')->user_id)
                ->orderBy('peminjam_tglpinjam', 'DESC')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $array = array(
                        "peminjam_id" => $row->peminjam_id,
                        "barang_kode" => $row->barang_kode,
                        "barang_nama" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->barang_nama)),
                        "peminjam_nama" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->peminjam_nama)),
                        "peminjam_ket" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->peminjam_ket)),
                        "peminjam_tglpinjam" => $row->peminjam_tglpinjam,
                        "peminjam_tglkembali" => $row->peminjam_tglkembali,
                    );
                    $button = '';
                    $hakEdit = AksesModel::leftJoin('tbl_menu', 'tbl_menu.menu_id', '=', 'tbl_akses.menu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_menu.menu_judul' => 'Peminjaman', 'tbl_akses.akses_type' => 'update'))->count();
                    $hakDelete = AksesModel::leftJoin('tbl_menu', 'tbl_menu.menu_id', '=', 'tbl_akses.menu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_menu.menu_judul' => 'Peminjaman', 'tbl_akses.akses_type' => 'delete'))->count();
                    if ($hakEdit > 0 && $hakDelete > 0) {
                        if ($row->peminjam_status == 'Pending') {
                            $button .= '
                            <div class="g-2">
                            <a class="btn modal-effect text-primary btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" data-bs-toggle="tooltip" data-bs-original-title="Edit" onclick=update(' . json_encode($array) . ')><span class="fe fe-edit text-success fs-14"></span></a>
                            <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(`' . $row->peminjam_id . '`,`harddelete`)><span class="fe fe-trash-2 fs-14"></span></a>
                            </div>
                            ';
                        } else if ($row->peminjam_status == 'Dikembalikan') {
                            $button .= '
                            <div class="g-2">
                            <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(`' . $row->peminjam_id . '`,`softdelete`)><span class="fe fe-trash-2 fs-14"></span></a>
                            </div>
                            ';
                        } else if ($row->peminjam_status == 'Ditolak') {
                            $button .= '
                            <div class="g-2">
                            <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(`' . $row->peminjam_id . '`,`softdelete`)><span class="fe fe-trash-2 fs-14"></span></a>
                            </div>
                            ';
                        } else {
                            $button .= '-';
                        }
                    } else if ($hakEdit > 0 && $hakDelete == 0) {
                        if ($row->peminjam_status == 'Pending') {
                            $button .= '
                            <div class="g-2">
                            <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(`' . $row->peminjam_id . '`,`harddelete`)><span class="fe fe-trash-2 fs-14"></span></a>
                            </div>
                            ';
                        } else {
                            $button .= '-';
                        }
                    } else if ($hakEdit == 0 && $hakDelete > 0) {
                        if ($row->peminjam_status == 'Pending') {
                            $button .= '
                            <div class="g-2">
                                <a class="btn modal-effect text-primary btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" data-bs-toggle="tooltip" data-bs-original-title="Edit" onclick=update(' . json_encode($array) . ')><span class="fe fe-edit text-success fs-14"></span></a>
                            </div>
                            ';
                        } else if ($row->peminjam_status == 'Dikembalikan') {
                            $button .= '
                            <div class="g-2">
                            <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus2(`' . $row->peminjam_id . '`,`softdelete`)><span class="fe fe-trash-2 fs-14"></span></a>
                            </div>
                            ';
                        } else if ($row->peminjam_status == 'Ditolak') {
                            $button .= '
                            <div class="g-2">
                            <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus2(`' . $row->peminjam_id . '`,`softdelete`)><span class="fe fe-trash-2 fs-14"></span></a>
                            </div>
                            ';
                        } else {
                            $button .= '-';
                        }
                    } else {
                        $button .= '-';
                    }
                    return $button;
                })
                ->rawColumns(['action'])->make(true);
        }
    }

    public function proses_tambah(Request $request)
    {

        //insert data
        PeminjamModel::create([
            'user_id' => Session::get('user')->user_id,
            'barang_kode' => $request->barang,
            'peminjam_tglpinjam' => $request->tglpinjam,
            'peminjam_tglkembali' => $request->tglkembali,
            'peminjam_nama'  => $request->peminjam,
            'peminjam_ket' => $request->ket,
        ]);

        BarangModel::where('barang_kode', '=', $request->barang)->update([
            'barang_status' => 'Dipinjam'
        ]);

        return response()->json(['success' => 'Berhasil']);
    }

    public function proses_ubah(Request $request, PeminjamModel $peminjaman)
    {
        $kode = $peminjaman->barang_kode;

        //update data
        $peminjaman->update([
            'barang_kode' => $request->barang,
            'peminjam_tglpinjam' => $request->tglpinjam,
            'peminjam_tglkembali' => $request->tglkembali,
            'peminjam_nama'  => $request->peminjam,
            'peminjam_ket' => $request->ket,
        ]);

        BarangModel::where('barang_kode', '=', $kode)->update([
            'barang_status' => 'Tersedia'
        ]);

        BarangModel::where('barang_kode', '=', $request->barang)->update([
            'barang_status' => 'Dipinjam'
        ]);

        return response()->json(['success' => 'Berhasil']);
    }

    public function proses_hapus(Request $request, PeminjamModel $peminjaman)
    {
        $kodebarang = $peminjaman->barang_kode;

        //delete
        $peminjaman->delete();

        if ($request->type == 'harddelete') {
            BarangModel::where('barang_kode', '=',  $kodebarang)->update([
                'barang_status' => 'Tersedia'
            ]);
        }

        return response()->json(['success' => 'Berhasil']);
    }
}
