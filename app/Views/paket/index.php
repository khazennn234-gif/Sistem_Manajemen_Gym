<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<!-- Header Actions -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
  <div>
    <h2 class="text-xl font-bold text-slate-800 tracking-tight">Daftar Paket Langganan Gym</h2>
    <p class="text-xs text-slate-500 mt-0.5">Kelola jenis paket membership, tarif harga, dan durasi aktif anggota.</p>
  </div>
  
  <div>
    <a href="<?= base_url('paket/tambah'); ?>" 
       class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white font-bold text-xs rounded-xl shadow-md shadow-orange-500/20 transition-all hover:scale-[1.02] active:scale-95">
      <i class="fas fa-plus text-xs"></i>
      <span>Tambah Paket Baru</span>
    </a>
  </div>
</div>

<!-- Table Card -->
<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
  
  <div class="p-5 px-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
    <div class="flex items-center gap-2">
      <i class="fas fa-tags text-orange-500 text-sm"></i>
      <h3 class="font-bold text-slate-800 text-sm">Tabel Paket Membership</h3>
    </div>
    <span class="px-3 py-1 rounded-full bg-orange-50 text-orange-700 border border-orange-200 text-xs font-bold">
      Total: <?= count($paket); ?> Paket
    </span>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full text-left text-xs">
      <thead class="bg-slate-50 text-slate-400 font-bold uppercase text-[10px] tracking-wider border-b border-slate-100">
        <tr>
          <th class="py-3 px-6 text-center w-12">No</th>
          <th class="py-3 px-6">Nama Paket Langganan</th>
          <th class="py-3 px-6">Biaya / Harga</th>
          <th class="py-3 px-6 text-center">Durasi Aktif</th>
          <th class="py-3 px-6 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-100 text-slate-600">
        <?php if (!empty($paket)) : ?>
          <?php $no = 1; foreach ($paket as $p) : ?>
            <tr class="hover:bg-slate-50/80 transition-colors">
              <td class="py-4 px-6 text-center font-bold text-slate-400"><?= $no++; ?></td>
              <td class="py-4 px-6">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center font-bold text-sm shadow-sm flex-shrink-0 border border-orange-100">
                    <i class="fas fa-dumbbell"></i>
                  </div>
                  <div>
                    <h5 class="font-bold text-slate-800 text-sm leading-tight"><?= esc($p['nama_paket']); ?></h5>
                    <span class="text-[10px] text-slate-400 font-mono">Kode: #PKT-<?= str_pad($p['id_paket'], 3, '0', STR_PAD_LEFT); ?></span>
                  </div>
                </div>
              </td>
              <td class="py-4 px-6">
                <span class="text-sm font-extrabold text-emerald-600">
                  Rp <?= number_format($p['harga'], 0, ',', '.'); ?>
                </span>
              </td>
              <td class="py-4 px-6 text-center">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-xs font-bold">
                  <i class="far fa-clock text-[10px]"></i>
                  <span><?= $p['durasi_hari']; ?> Hari</span>
                </span>
              </td>
              <td class="py-4 px-6 text-center whitespace-nowrap">
                <div class="inline-flex items-center gap-1.5">
                  <a href="<?= base_url('paket/edit/' . $p['id_paket']); ?>" 
                     class="px-2.5 py-1.5 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white font-bold text-xs transition-colors flex items-center gap-1 shadow-sm"
                     title="Edit Paket">
                    <i class="fas fa-pencil-alt text-[11px]"></i>
                    <span>Edit</span>
                  </a>
                  <a href="<?= base_url('paket/hapus/' . $p['id_paket']); ?>" 
                     class="px-2.5 py-1.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white font-bold text-xs transition-colors flex items-center gap-1 shadow-sm"
                     onclick="return confirm('Apakah Anda yakin ingin menghapus paket <?= esc($p['nama_paket']); ?>?')"
                     title="Hapus Paket">
                    <i class="fas fa-trash-alt text-[11px]"></i>
                    <span>Hapus</span>
                  </a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="5" class="py-12 text-center text-slate-400">
              <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 text-2xl mx-auto mb-3">
                <i class="fas fa-tag"></i>
              </div>
              <p class="font-bold text-slate-600 text-sm">Belum Ada Paket Langganan</p>
              <p class="text-xs text-slate-400 mt-1">Silakan klik tombol <strong>Tambah Paket Baru</strong>.</p>
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>
<?= $this->endSection(); ?>