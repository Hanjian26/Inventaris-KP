<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangModel;
use Illuminate\Http\Request;

class ScanQRController extends Controller
{
   public function index()
   {
      $data["title"] = "Scan QR";
      return view('Admin.SqanQR.index', $data);
   }

   public function getbarang($kode)
   {
      $data = BarangModel::leftJoin('tbl_lokasi', 'tbl_lokasi.lokasi_id', '=', 'tbl_barang.lokasi_id')
         ->where('barang_kode', '=', $kode)
         ->orderBy('barang_id', 'DESC')
         ->first();
      return json_encode($data);
   }
}
