<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AksesModel;
use App\Models\Admin\BarangModel;
use App\Models\Admin\PeminjamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class PeminjamAdminController extends Controller
{
    public function index()
    {
        $data["title"] = 'Peminjaman';
        $data['barang'] = BarangModel::where('barang_status', '=', 'Tersedia')->get();
        $data["hakTambah"] = AksesModel::leftJoin('tbl_menu', 'tbl_menu.menu_id', '=', 'tbl_akses.menu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_menu.menu_judul' => 'Peminjaman', 'tbl_akses.akses_type' => 'create'))->count();
        if (Session::get('user')->role_title == 'Super Admin' || Session::get('user')->role_title == 'Admin' || Session::get('user')->role_title == 'Manajer') {
            return view('Admin.Peminjaman.Admin.index', $data);
        } else {
            return view('Admin.Peminjaman.Operator.index', $data);
        }
    }

    public function show(Request $request)
    {

        if ($request->ajax()) {
            $data = PeminjamModel::leftJoin('tbl_barang', 'tbl_barang.barang_kode', '=', 'tbl_peminjam.barang_kode')
                ->orderBy('peminjam_tglpinjam', 'DESC')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $button = '';
                    $hakEdit = AksesModel::leftJoin('tbl_menu', 'tbl_menu.menu_id', '=', 'tbl_akses.menu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_menu.menu_judul' => 'Peminjaman', 'tbl_akses.akses_type' => 'update'))->count();
                    $hakDelete = AksesModel::leftJoin('tbl_menu', 'tbl_menu.menu_id', '=', 'tbl_akses.menu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_menu.menu_judul' => 'Peminjaman', 'tbl_akses.akses_type' => 'delete'))->count();
                    if(Session::get('user')->role_title == 'Super Admin'){
                        if ($hakEdit > 0) {
                            if ($row->peminjam_status == 'Pending') {
                                $button .= '
                                <div class="g-2">
                                <a class="btn btn-success modal-effect btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=konfirmasi(`' . $row->peminjam_id . '`,`terima`)>Terima</span></a>
                                <a class="btn btn-danger modal-effect btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=konfirmasi(`' . $row->peminjam_id . '`,`tolak`)>Tolak</span></a>
                                </div>
                                ';
                            } else if ($row->peminjam_status == 'Diterima') {
                                $button .= '
                                <div class="g-2">
                                <a class="btn btn-primary modal-effect btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" onclick=pengembalian(`' . $row->peminjam_id . '`)>Pengembalian</span></a>
                                </div>
                                ';
                            } else if ($row->peminjam_status == 'Dikembalikan') {
                                $button .= '
                                <div class="g-2">
                                <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#H2modaldemo8" onclick=hapus(`' . $row->peminjam_id . '`,`softdelete`)><span class="fe fe-trash-2 fs-14"></span></a>
                                </div>
                                ';
                            } else if ($row->peminjam_status == 'Ditolak') {
                                $button .= '
                                <div class="g-2">
                                <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#H2modaldemo8" onclick=hapus(`' . $row->peminjam_id . '`,`softdelete`)><span class="fe fe-trash-2 fs-14"></span></a>
                                </div>
                                ';
                            } else {
                                $button .= '-';
                            }
                        } else if ($hakEdit == 0 && $hakDelete > 0) {
                            if ($row->peminjam_status == 'Pending') {
                                $button .= '
                                <div class="g-2">
                                <a class="btn btn-success modal-effect btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=konfirmasi(`' . $row->peminjam_id . '`,`terima`)>Terima</span></a>
                                <a class="btn btn-danger modal-effect btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=konfirmasi(`' . $row->peminjam_id . '`,`tolak`)>Tolak</span></a>
                                </div>
                                ';
                            } else if ($row->peminjam_status == 'Dikembalikan') {
                                $button .= '
                                <div class="g-2">
                                <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#H2modaldemo8" onclick=hapus(`' . $row->peminjam_id . '`,`softdelete`)><span class="fe fe-trash-2 fs-14"></span></a>
                                </div>
                                ';
                            } else if ($row->peminjam_status == 'Ditolak') {
                                $button .= '
                                <div class="g-2">
                                <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#H2modaldemo8" onclick=hapus(`' . $row->peminjam_id . '`,`softdelete`)><span class="fe fe-trash-2 fs-14"></span></a>
                                </div>
                                ';
                            } else {
                                $button .= '-';
                            }
                        } else {
                            $button .= '-';
                        }

                        return $button;
                    }
                    else {
                        $button .= '-';
                    }

                })
                ->rawColumns(['action'])->make(true);
        }
    }

    public function proses_konfirmasi(Request $request, PeminjamModel $peminjaman)
    {
        $kode = $peminjaman->barang_kode;

        if ($request->status == 'terima') {
            //update data
            $peminjaman->update([
                'peminjam_status' => 'Diterima',
            ]);
        } else if ($request->status == 'tolak') {
            //update data
            $peminjaman->update([
                'peminjam_status' => 'Ditolak',
            ]);

            BarangModel::where('barang_kode', '=', $kode)->update([
                'barang_status' => 'Tersedia'
            ]);
        }

        return response()->json(['success' => 'Berhasil']);
    }

    public function proses_pengembalian(Request $request, PeminjamModel $peminjaman)
    {
        $kode = $peminjaman->barang_kode;
        $kondisi = '';

        if ($request->kondisi == 'Baik') {
            $kondisi = 'Baik';
        } else if ($request->kondisi == 'Rusak') {
            $kondisi = 'Rusak';
        }

        //update data
        $peminjaman->update([
            'peminjam_status' => 'Dikembalikan',
            'peminjam_kondisi' => $kondisi
        ]);

        BarangModel::where('barang_kode', '=', $kode)->update([
            'barang_status' => 'Tersedia',
            'barang_kondisi' => $kondisi,
        ]);

        return response()->json(['success' => 'Berhasil']);
    }
}
