<?php

namespace App\Http\Controllers;

use App\Models\DetailServis;
use App\Models\NotaPembayaran;
use App\Models\Spareparts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laba_rugi(Request $request)
    {
        $bulan = $request->get('bulan', date('m'));
        $tahun = $request->get('tahun', date('Y'));

        $total_penjualan_sparepart = NotaPembayaran::whereYear('tanggal_bayar', $tahun)
            ->whereMonth('tanggal_bayar', $bulan)
            ->sum('total_sparepart');

        $total_biaya_jasa = NotaPembayaran::whereYear('tanggal_bayar', $tahun)
            ->whereMonth('tanggal_bayar', $bulan)
            ->sum('total_jasa');

        $harga_modal = DB::table('detail_servis')
            ->join('spareparts', 'detail_servis.sparepart_id', '=', 'spareparts.id')
            ->join('servis', 'detail_servis.servis_id', '=', 'servis.id')
            ->join('nota_pembayarans', 'nota_pembayarans.servis_id', '=', 'servis.id')
            ->whereYear('nota_pembayarans.tanggal_bayar', $tahun)
            ->whereMonth('nota_pembayarans.tanggal_bayar', $bulan)
            ->selectRaw('SUM(detail_servis.qty * spareparts.harga_beli) as modal')
            ->first()->modal ?? 0;

        $laba = ($total_penjualan_sparepart + $total_biaya_jasa) - $harga_modal;

        return view('laporan.laba_rugi', compact('bulan', 'tahun', 'total_penjualan_sparepart', 'total_biaya_jasa', 'harga_modal', 'laba'));
    }
}
