<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AksesModel;
use App\Models\Admin\BarangModel;
use App\Models\Admin\LokasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BarangController extends Controller
{
    public function index()
    {
        $data["title"] = "Barang";
        $data['lokasi'] = LokasiModel::orderBy('lokasi_nama')->get();
        $data["hakTambah"] = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_submenu.submenu_judul' => 'Barang', 'tbl_akses.akses_type' => 'create'))->count();
        return view('Admin.Barang.index', $data);
    }

    public function printqrcode()
    {
        $data['barang'] = BarangModel::orderBy('barang_nama', 'ASC')->get();
        return view('Admin.Barang.printqr', $data);
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {

            $data = BarangModel::leftJoin('tbl_lokasi', 'tbl_lokasi.lokasi_id', '=', 'tbl_barang.lokasi_id')->orderBy('barang_id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('qr', function ($row) {
                    $array = array(
                        "barang_qr" => $row->barang_qr,
                    );
                    $img = '<a data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Gmodaldemo8" onclick=gambar(' . json_encode($array) . ')><span class="avatar avatar-lg cover-image" style="background: url(&quot;' . asset('storage/barang/' . $row->barang_qr) . '&quot;) center center;"></span></a>';

                    return $img;
                })
                ->addColumn('action', function ($row) {
                    $array = array(
                        "barang_id" => $row->barang_id,
                        "barang_kode" => $row->barang_kode,
                        "barang_nama" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->barang_nama)),
                        "lokasi_id" => $row->lokasi_id,
                        "barang_kondisi" => $row->barang_kondisi,
                        "barang_status" => $row->barang_status,
                        "barang_jenis" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->barang_jenis)),
                        "barang_ket" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->barang_ket)),
                        "barang_qr" => $row->barang_qr,
                    );
                    $button = '';
                    $hakEdit = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_submenu.submenu_judul' => 'Barang', 'tbl_akses.akses_type' => 'update'))->count();
                    $hakDelete = AksesModel::leftJoin('tbl_submenu', 'tbl_submenu.submenu_id', '=', 'tbl_akses.submenu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_submenu.submenu_judul' => 'Barang', 'tbl_akses.akses_type' => 'delete'))->count();
                    if ($hakEdit > 0 && $hakDelete > 0) {
                        $button .= '
                        <div class="g-2">
                        <a class="btn modal-effect text-primary btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" data-bs-toggle="tooltip" data-bs-original-title="Edit" onclick=update(' . json_encode($array) . ')><span class="fe fe-edit text-success fs-14"></span></a>
                        <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(' . json_encode($array) . ')><span class="fe fe-trash-2 fs-14"></span></a>
                        </div>
                        ';
                    } else if ($hakEdit > 0 && $hakDelete == 0) {
                        $button .= '
                        <div class="g-2">
                            <a class="btn modal-effect text-primary btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" data-bs-toggle="tooltip" data-bs-original-title="Edit" onclick=update(' . json_encode($array) . ')><span class="fe fe-edit text-success fs-14"></span></a>
                        </div>
                        ';
                    } else if ($hakEdit == 0 && $hakDelete > 0) {
                        $button .= '
                        <div class="g-2">
                        <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(' . json_encode($array) . ')><span class="fe fe-trash-2 fs-14"></span></a>
                        </div>
                        ';
                    } else {
                        $button .= '-';
                    }

                    return $button;
                })
                ->rawColumns(['action', 'qr'])->make(true);
        }
    }

    public function listbarang(Request $request)
    {
        if ($request->ajax()) {
            $data = BarangModel::leftJoin('tbl_lokasi', 'tbl_lokasi.lokasi_id', '=', 'tbl_barang.lokasi_id')->orderBy('barang_id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('qr', function ($row) {
                    $img = '';

                    return $img;
                })
                ->addColumn('action', function ($row) use ($request) {
                    $array = array(
                        "barang_kode" => $row->barang_kode,
                        "barang_nama" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->barang_nama)),
                    );
                    $button = '';
                    if ($request->get('param') == 'tambah') {
                        $button .= '
                        <div class="g-2">
                            <a class="btn btn-primary btn-sm" href="javascript:void(0)" onclick=pilihBarang(' . json_encode($array) . ')>Pilih</a>
                        </div>
                        ';
                    } else {
                        $button .= '
                    <div class="g-2">
                        <a class="btn btn-success btn-sm" href="javascript:void(0)" onclick=pilihBarangU(' . json_encode($array) . ')>Pilih</a>
                    </div>
                    ';
                    }

                    return $button;
                })
                ->rawColumns(['action', 'qr'])->make(true);
        }
    }

    public function proses_tambah(Request $request)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->nama)));

        $nmqr = 'qr-' . time() . '.png';
        $image = QrCode::format('png')
            ->size(300)
            ->errorCorrection('H')
            ->generate($request->kode);

        $output_file = '/barang/'.$nmqr;
        Storage::disk('public')->put($output_file, $image);

        //create
        BarangModel::create([
            'barang_qr' => $nmqr,
            'lokasi_id' => $request->lokasi,
            'barang_kode' => $request->kode,
            'barang_nama' => $request->nama,
            'barang_slug' => $slug,
            'barang_jenis' => $request->jenis,
            'barang_kondisi' => $request->kondisi,
            'barang_status' => $request->status,
            'barang_ket' => $request->keterangan,

        ]);

        return response()->json(['success' => 'Berhasil']);
    }

    public function proses_ubah(Request $request, BarangModel $barang)
    {

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->nama)));

        //update data with new image
        $barang->update([
            'lokasi_id' => $request->lokasi,
            'barang_nama' => $request->nama,
            'barang_slug' => $slug,
            'barang_jenis' => $request->jenis,
            'barang_kondisi' => $request->kondisi,
            'barang_status' => $request->status,
            'barang_ket' => $request->keterangan,
        ]);

        return response()->json(['success' => 'Berhasil']);
    }


    public function proses_hapus(Request $request, BarangModel $barang)
    {

        //delete image
        Storage::delete('public/barang/' . $barang->barang_qr);

        //delete
        $barang->delete();

        return response()->json(['success' => 'Berhasil']);
    }
}
