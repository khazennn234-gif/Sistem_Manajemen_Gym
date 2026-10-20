<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<!-- Header Actions & Search -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
  <div>
    <h2 class="text-xl font-bold text-slate-800 tracking-tight">Data Instruktur / Personal Trainer</h2>
    <p class="text-xs text-slate-500 mt-0.5">Kelola pelatih gym profesional, spesialisasi cabang olahraga, dan nomor kontak.</p>
  </div>
  
  <div class="flex flex-wrap items-center gap-3">
    <!-- Form Pencarian -->
    <form action="<?= base_url('instruktur'); ?>" method="get" class="flex items-center gap-2">
      <div class="relative">
        <span class="absolute left-3 top-2.5 text-slate-400 text-xs"><i class="fas fa-search"></i></span>
        <input type="text" name="cari" value="<?= esc($cari ?? ''); ?>" placeholder="Cari nama / spesialisasi..." 
               class="bg-white border border-slate-200 rounded-xl pl-9 pr-3 py-2 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 w-48 sm:w-64 shadow-sm" />
      </div>
      <?php if (!empty($cari)) : ?>
        <a href="<?= base_url('instruktur'); ?>" class="px-3 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl text-xs font-semibold transition-colors">Reset</a>
      <?php endif; ?>
    </form>

    <a href="<?= base_url('instruktur/tambah'); ?>" 
       class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold text-xs rounded-xl shadow-md shadow-purple-500/20 transition-all hover:scale-[1.02] active:scale-95">
      <i class="fas fa-user-plus text-xs"></i>
      <span>Tambah Instruktur</span>
    </a>
  </div>
</div>

<!-- Table Card -->
<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
  
  <div class="p-5 px-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
    <div class="flex items-center gap-2">
      <i class="fas fa-user-ninja text-purple-600 text-sm"></i>
      <h3 class="font-bold text-slate-800 text-sm">Daftar Pelatih & Trainer</h3>
    </div>
    <span class="px-3 py-1 rounded-full bg-purple-50 text-purple-700 border border-purple-200 text-xs font-bold">
      Total: <?= count($instruktur); ?> Instruktur
    </span>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full text-left text-xs">
      <thead class="bg-slate-50 text-slate-400 font-bold uppercase text-[10px] tracking-wider border-b border-slate-100">
        <tr>
          <th class="py-3 px-6 text-center w-12">No</th>
          <th class="py-3 px-6">Nama Instruktur</th>
          <th class="py-3 px-6">Spesialisasi / Keahlian</th>
          <th class="py-3 px-6">Kontak WhatsApp</th>
          <th class="py-3 px-6 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-100 text-slate-600">
        <?php if (!empty($instruktur)) : ?>
          <?php $no = 1; foreach ($instruktur as $ins) : ?>
            <tr class="hover:bg-slate-50/80 transition-colors">
              <td class="py-4 px-6 text-center font-bold text-slate-400"><?= $no++; ?></td>
              <td class="py-4 px-6">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center font-bold text-sm shadow-sm flex-shrink-0 border border-purple-100">
                    <i class="fas fa-user-tie"></i>
                  </div>
                  <div>
                    <h5 class="font-bold text-slate-800 text-sm leading-tight"><?= esc($ins['nama_instruktur']); ?></h5>
                    <span class="text-[10px] text-slate-400 font-mono">Kode: #TRN-<?= str_pad($ins['id_instruktur'], 3, '0', STR_PAD_LEFT); ?></span>
                  </div>
                </div>
              </td>
              <td class="py-4 px-6">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-purple-50 text-purple-700 font-bold text-xs border border-purple-100 shadow-sm">
                  <i class="fas fa-award text-purple-500 text-[10px]"></i>
                  <span><?= esc($ins['spesialisasi']); ?></span>
                </span>
              </td>
              <td class="py-4 px-6">
                <a href="https://wa.me/<?= preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $ins['no_hp'])); ?>" 
                   target="_blank" 
                   class="inline-flex items-center gap-1.5 text-xs text-emerald-600 font-semibold hover:underline">
                  <i class="fab fa-whatsapp text-sm"></i>
                  <span><?= esc($ins['no_hp']); ?></span>
                </a>
              </td>
              <td class="py-4 px-6 text-center whitespace-nowrap">
                <div class="inline-flex items-center gap-1.5">
                  <a href="<?= base_url('instruktur/edit/' . $ins['id_instruktur']); ?>" 
                     class="px-2.5 py-1.5 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white font-bold text-xs transition-colors flex items-center gap-1 shadow-sm"
                     title="Edit Instruktur">
                    <i class="fas fa-pencil-alt text-[11px]"></i>
                    <span>Edit</span>
                  </a>
                  <a href="<?= base_url('instruktur/hapus/' . $ins['id_instruktur']); ?>" 
                     class="px-2.5 py-1.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white font-bold text-xs transition-colors flex items-center gap-1 shadow-sm"
                     onclick="return confirm('Apakah Anda yakin ingin menghapus instruktur <?= esc($ins['nama_instruktur']); ?>?')"
                     title="Hapus Instruktur">
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
                <i class="fas fa-user-ninja"></i>
              </div>
              <p class="font-bold text-slate-600 text-sm">Tidak Ada Data Instruktur</p>
              <p class="text-xs text-slate-400 mt-1">
                <?= !empty($cari) ? 'Tidak ditemukan instruktur dengan kata kunci "<strong>' . esc($cari) . '</strong>".' : 'Silakan klik tombol <strong>Tambah Instruktur</strong>.'; ?>
              </p>
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>
<?= $this->endSection(); ?>
