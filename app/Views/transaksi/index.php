<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<!-- Header Actions -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
  <div>
    <h2 class="text-xl font-bold text-slate-800 tracking-tight">Riwayat Transaksi Membership Gym</h2>
    <p class="text-xs text-slate-500 mt-0.5">Pantau transaksi pendaftaran dan pembayaran langganan gym.</p>
  </div>
  
  <div>
    <a href="<?= base_url('transaksi/tambah'); ?>" 
       class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-bold text-xs rounded-xl shadow-md shadow-cyan-500/20 transition-all hover:scale-[1.02] active:scale-95">
      <i class="fas fa-cart-plus text-xs"></i>
      <span>Catat Transaksi Baru</span>
    </a>
  </div>
</div>

<!-- Table Card -->
<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
  
  <div class="p-5 px-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
    <div class="flex items-center gap-2">
      <i class="fas fa-receipt text-cyan-600 text-sm"></i>
      <h3 class="font-bold text-slate-800 text-sm">Tabel Log Transaksi Masuk</h3>
    </div>
    <span class="px-3 py-1 rounded-full bg-cyan-50 text-cyan-700 border border-cyan-200 text-xs font-bold">
      Total: <?= count($transaksi); ?> Transaksi
    </span>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full text-left text-xs">
      <thead class="bg-slate-50 text-slate-400 font-bold uppercase text-[10px] tracking-wider border-b border-slate-100">
        <tr>
          <th class="py-3 px-6 text-center w-12">No</th>
          <th class="py-3 px-6">ID Transaksi</th>
          <th class="py-3 px-6">Nama Member</th>
          <th class="py-3 px-6">Paket Langganan</th>
          <th class="py-3 px-6 text-center">Tanggal Transaksi</th>
          <th class="py-3 px-6 text-right">Total Bayar</th>
          <th class="py-3 px-6 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-100 text-slate-600">
        <?php if (!empty($transaksi)) : ?>
          <?php $no = 1; foreach ($transaksi as $t) : ?>
            <tr class="hover:bg-slate-50/80 transition-colors">
              <td class="py-4 px-6 text-center font-bold text-slate-400"><?= $no++; ?></td>
              <td class="py-4 px-6">
                <span class="font-mono text-xs font-bold text-blue-600 bg-blue-50 border border-blue-100 px-2.5 py-1 rounded-md">
                  #TRX-<?= str_pad($t['id_transaksi'], 4, '0', STR_PAD_LEFT); ?>
                </span>
              </td>
              <td class="py-4 px-6">
                <div class="flex items-center gap-3">
                  <div class="w-9 h-9 rounded-full bg-cyan-50 text-cyan-700 flex items-center justify-center font-bold text-xs flex-shrink-0 border border-cyan-100">
                    <i class="fas fa-user"></i>
                  </div>
                  <div>
                    <h5 class="font-bold text-slate-800 text-sm leading-tight"><?= esc($t['nama_member'] ?? 'Member Tidak Ditemukan'); ?></h5>
                    <span class="text-[10px] text-slate-400"><?= esc($t['no_hp_member'] ?? '-'); ?></span>
                  </div>
                </div>
              </td>
              <td class="py-4 px-6">
                <span class="inline-block px-2.5 py-1 rounded-md bg-blue-50 text-blue-700 font-bold text-xs border border-blue-100">
                  <?= esc($t['nama_paket'] ?? 'Paket'); ?> (<?= $t['durasi_hari'] ?? 0; ?> Hari)
                </span>
              </td>
              <td class="py-4 px-6 text-center font-medium text-slate-500">
                <i class="far fa-calendar-check text-cyan-600 mr-1"></i>
                <?= date('d M Y', strtotime($t['tanggal_transaksi'])); ?>
              </td>
              <td class="py-4 px-6 text-right">
                <span class="text-sm font-extrabold text-emerald-600">
                  Rp <?= number_format($t['total_bayar'], 0, ',', '.'); ?>
                </span>
              </td>
              <td class="py-4 px-6 text-center whitespace-nowrap">
                <a href="<?= base_url('transaksi/hapus/' . $t['id_transaksi']); ?>" 
                   class="px-2.5 py-1.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white font-bold text-xs transition-colors inline-flex items-center gap-1 shadow-sm"
                   onclick="return confirm('Apakah Anda yakin ingin menghapus catatan transaksi #TRX-<?= $t['id_transaksi']; ?>?')"
                   title="Hapus Transaksi">
                  <i class="fas fa-trash-alt text-[11px]"></i>
                  <span>Hapus</span>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="7" class="py-12 text-center text-slate-400">
              <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 text-2xl mx-auto mb-3">
                <i class="fas fa-receipt"></i>
              </div>
              <p class="font-bold text-slate-600 text-sm">Belum Ada Transaksi</p>
              <p class="text-xs text-slate-400 mt-1">Silakan klik tombol <strong>Catat Transaksi Baru</strong> di atas.</p>
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>
<?= $this->endSection(); ?>
