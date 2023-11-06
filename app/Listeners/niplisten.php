<?php

namespace App\Listeners;

use App\Events\nipEvent;
use App\Models\KonversiNip;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NipListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NipEvent $event)
    {
        // Mendapatkan NIP dari event
        $nip = $event->nip;

        // Lakukan konversi NIP ke tanggal_pengangkatan dan waktu_pensiun sesuai aturan bisnis Anda
        $nipDatePart = substr($nip, 8, 6);
    
        // Konversi tanggal pengangkatan menjadi format tahun-bulan
        $dateOfAppointment = \Carbon\Carbon::createFromFormat('Ymd', $nipDatePart)->format('Y-m');
    
        // Hitung waktu pensiun, misalnya 60 tahun setelah tanggal pengangkatan
        $retirementDate = \Carbon\Carbon::parse($dateOfAppointment)->addYears(60)->format('Y-m');
        
        // Simpan data ke tabel konversi NIP
        $data = new KonversiNip();
        $data->nip = $nip; // Perhatikan bahwa Anda menggunakan '=' bukan '->' untuk mengisi properti nip.
        $data->tanggal_pengangkatan = $dateOfAppointment;
        $data->waktu_pensiun = $retirementDate;
        $data->save();
    }
}

