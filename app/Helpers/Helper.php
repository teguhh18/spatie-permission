<?php

namespace App\Helpers;

use App\Models\BerkasPpepp;
use App\Models\Document;
use App\Models\Dokumen;
use App\Models\Laporan;
use App\Models\LaporanAkhir;
use App\Models\Periode;
use App\Models\Sop;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Helper
{
    public function periode_aktif()
    {
        $periode = Periode::where('status', 1)->first();
        return $periode->tahun;
    }

    public function icon($status)
    {
        $icon = '';
        switch ($status) {
            case 'belum_diperiksa':
                $icon = '<i class="fas fa-exclamation-triangle fa-beat"></i> Belum Diperiksa';
                break;
            case 'diterima':
                $icon = '<i class="fas fa-check-circle"></i> Diterima';
                break;
            case 'ditolak':
                $icon = '<i class="fas fa-times-circle"></i> Ditolak';
                break;
            case 'diperiksa':
                $icon = '<i class="fas fa-circle-notch fa-spin"></i> Sedang Diperiksa';
                break;

            default:
                $icon = '<i class="fas fa-exclamation-triangle fa-fade"></i> belum diisi';
                break;
        }

        return $icon;
    }

    public function bg($status)
    {
        $bg = '';
        switch ($status) {
            case 'belum_diperiksa':
                $bg = 'warning';
                break;
            case 'diterima':
                $bg = 'success';
                break;
            case 'ditolak':
                $bg = 'danger';
                break;
            case 'diperiksa':
                $bg = 'info';
                break;

            default:
                $bg = 'danger';
                break;
        }

        return $bg;
    }

    public function menu_dokumen()
    {
        return Document::whereNull('parent_id')->get();
    }

    public function menu_document_front()
    {
        return Document::whereNull('parent_id')->where('access', 'public')->get();
    }

    public function syarat($status, $submission_before)
    {
        if ($status != null) {
            $text = 'Lihat';
        } else {
            $text = 'Isi ' . $submission_before . ' terlebih dahulu';
        }

        return $text;
    }

    public function pimpinan_style($status = false)
    {
        $icon = '';
        $text = '';
        $bg = '';
        switch ($status) {
            case 'belum_diperiksa':
                $icon = '<i class="fas fa-exclamation-triangle fa-beat"></i>';
                $text = 'Belum Diperiksa';
                $bg = 'bg-warning';
                break;
            case 'diterima':
                $icon = '<i class="fas fa-check-circle"></i>';
                $text = 'Diterima';
                $bg = 'bg-success';
                break;
            case 'ditolak':
                $icon = '<i class="fas fa-times-circle"></i>';
                $text = 'Ditolak';
                $bg = 'bg-danger';
                break;
            case 'diperiksa':
                $icon = '<i class="fas fa-circle-notch fa-spin"></i>';
                $text = 'Sedang Diperiksa';
                $bg = 'bg-info';
                break;

            default:
                $icon = '<i class="fas fa-exclamation-triangle fa-fade"></i>';
                $text = 'Belum diisi';
                $bg = 'bg-maroon';
                break;
        }

        return [
            'icon' =>  $icon,
            'text' =>  $text,
            'bg' =>  $bg,
        ];
    }

    function renderStatusCell($submission)
    {
        if ($submission) {
            $isComplete = $submission->status === 'selesai';
            $icon = $isComplete ? 'fa-check-circle text-success' : 'fa-hourglass-half text-warning';
            echo "<td class='text-center'><a href='{$submission->gdrive_link}' target='_blank'><i class='fas {$icon}'></i></a></td>";
        } else {
            echo "<td class='text-center'><i class='fas fa-times-circle text-danger'></i></td>";
        }
    }

    function menu_sop()
    {
        $sop = Sop::with('sub_sop')->get();
        return $sop;
    }
}
