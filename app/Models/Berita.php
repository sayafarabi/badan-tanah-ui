<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'ringkasan',
        'konten',
        'kategori',
        'penulis',
        'views',
        'status',
        'status_approval',
        'approval_history',
        'gambar',
        'tanggal_publikasi',
    ];

    protected $casts = [
        'approval_history' => 'array',
        'tanggal_publikasi' => 'datetime',
    ];

    /**
     * Tambah riwayat approval
     */
    public function addApprovalHistory($action, $note = null)
    {
        $history = $this->approval_history ?? [];
        
        $history[] = [
            'action' => $action,
            'user' => auth()->user()->name,
            'role' => auth()->user()->role,
            'note' => $note,
            'timestamp' => now()->toDateTimeString(),
        ];
        
        $this->approval_history = $history;
        $this->save();
    }

    /**
     * Ambil riwayat approval
     */
    public function getApprovalHistory()
    {
        return $this->approval_history ?? [];
    }
}