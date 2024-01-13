<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamModel extends Model
{
    use HasFactory;
    protected $table = "tbl_peminjam";
    protected $primaryKey = 'peminjam_id';
    protected $fillable = [
        'user_id',
        'barang_kode',
        'peminjam_tglpinjam',
        'peminjam_tglkembali',
        'peminjam_nama',
        'peminjam_ket',
        'peminjam_status',
        'peminjam_kondisi'
    ]; 
}
