

namespace App\Services;

use App\Models\BukBes;

class BukuBesarService
{
    /**
     * Ambil saldo akhir 1 hari sebelum tanggal.
     */
    public function getSaldoAwal($tanggal, $id_coa)
    {
        return BukBes::where('id_coa', $id_coa)
            ->where('tanggal', '<', $tanggal)
            ->orderBy('tanggal', 'desc')
            ->value('saldo_akhir') ?? 0;
    }

    /**
     * Hitung saldo akhir hari ini.
     */
    public function hitungSaldoAkhir($saldo_awal, $debit = 0, $kredit = 0)
    {
        return $saldo_awal + $debit - $kredit;
    }

    /**
     * Simpan transaksi buku besar.
     */
    public function simpanTransaksi($tanggal, $id_coa, $debit = 0, $kredit = 0)
    {
        // Ambil saldo awal (saldo akhir hari sebelumnya)
        $saldo_awal = $this->getSaldoAwal($tanggal, $id_coa);

        // Hitung saldo akhir
        $saldo_akhir = $this->hitungSaldoAkhir($saldo_awal, $debit, $kredit);

        // Simpan ke DB
        return BukBes::create([
            'tanggal'      => $tanggal,
            'id_coa'       => $id_coa,
            'saldo_awal'   => $saldo_awal,
            'debit'        => $debit,
            'kredit'       => $kredit,
            'saldo_akhir'  => $saldo_akhir,
            'deleted'      => 0,
        ]);
    }
}
