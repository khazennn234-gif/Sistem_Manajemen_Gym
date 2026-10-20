<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<!-- Header Actions & Search -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
  <div>
    <h2 class="text-xl font-bold text-slate-800 tracking-tight">Data Keanggotaan Member Gym</h2>
    <p class="text-xs text-slate-500 mt-0.5">Kelola seluruh data member aktif dan status langganan fitness.</p>
  </div>
  
  <div class="flex flex-wrap items-center gap-3">
    <!-- Form Pencarian -->
    <form action="<?= base_url('member'); ?>" method="get" class="flex items-center gap-2">
      <div class="relative">
        <span class="absolute left-3 top-2.5 text-slate-400 text-xs"><i class="fas fa-search"></i></span>
        <input type="text" name="cari" value="<?= esc($cari ?? ''); ?>" placeholder="Cari nama / paket..." 
               class="bg-white border border-slate-200 rounded-xl pl-9 pr-3 py-2 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 w-48 sm:w-64 shadow-sm" />
      </div>
      <?php if (!empty($cari)) : ?>
        <a href="<?= base_url('member'); ?>" class="px-3 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl text-xs font-semibold transition-colors">Reset</a>
      <?php endif; ?>
    </form>

    <a href="<?= base_url('member/tambah'); ?>" 
       class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-bold text-xs rounded-xl shadow-md shadow-emerald-500/20 transition-all hover:scale-[1.02] active:scale-95">
      <i class="fas fa-user-plus text-xs"></i>
      <span>Tambah Member</span>
    </a>
  </div>
</div>

<!-- Table Card -->
<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
  
  <div class="p-5 px-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
    <div class="flex items-center gap-2">
      <i class="fas fa-address-book text-blue-600 text-sm"></i>
      <h3 class="font-bold text-slate-800 text-sm">Daftar Anggota Gym</h3>
    </div>
    <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-xs font-bold">
      Total: <?= count($member); ?> Member
    </span>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full text-left text-xs">
      <thead class="bg-slate-50 text-slate-400 font-bold uppercase text-[10px] tracking-wider border-b border-slate-100">
        <tr>
          <th class="py-3 px-6 text-center w-12">No</th>
          <th class="py-3 px-6">Nama Member</th>
          <th class="py-3 px-6">Kontak WhatsApp</th>
          <th class="py-3 px-6">Paket Langganan</th>
          <th class="py-3 px-6 text-center">Tanggal Daftar</th>
          <th class="py-3 px-6 text-center">Status</th>
          <th class="py-3 px-6 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-100 text-slate-600">
        <?php if (!empty($member)) : ?>
          <?php $no = 1; foreach ($member as $m) : ?>
            <tr class="hover:bg-slate-50/80 transition-colors">
              <td class="py-4 px-6 text-center font-bold text-slate-400"><?= $no++; ?></td>
              <td class="py-4 px-6">
                <div class="flex items-center gap-3">
                  <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-blue-500 to-indigo-600 text-white flex items-center justify-center font-bold text-xs shadow-sm flex-shrink-0">
                    <?= strtoupper(substr($m['nama'], 0, 1)); ?>
                  </div>
                  <div>
                    <h5 class="font-bold text-slate-800 text-sm leading-tight"><?= esc($m['nama']); ?></h5>
                    <span class="text-[10px] text-slate-400 font-mono">ID: #MBR-<?= str_pad($m['id_member'], 3, '0', STR_PAD_LEFT); ?></span>
                  </div>
                </div>
              </td>
              <td class="py-4 px-6">
                <a href="https://wa.me/<?= preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $m['no_hp'])); ?>" 
                   target="_blank" 
                   class="inline-flex items-center gap-1.5 text-xs text-emerald-600 font-semibold hover:underline">
                  <i class="fab fa-whatsapp text-sm"></i>
                  <span><?= esc($m['no_hp']); ?></span>
                </a>
              </td>
              <td class="py-4 px-6">
                <span class="inline-block px-3 py-1 rounded-lg bg-blue-50 text-blue-700 font-bold text-xs border border-blue-100 shadow-sm">
                  <?= esc($m['paket']); ?>
                </span>
              </td>
              <td class="py-4 px-6 text-center font-medium text-slate-500">
                <i class="far fa-calendar-alt text-slate-400 mr-1"></i>
                <?= date('d M Y', strtotime($m['tanggal_daftar'])); ?>
              </td>
              <td class="py-4 px-6 text-center">
                <?php if ($m['status'] == 'Aktif') : ?>
                  <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-bold">
                    <span class="pulsing-dot pulsing-dot-success"></span>
                    <span>Aktif</span>
                  </span>
                <?php else : ?>
                  <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-50 text-red-700 border border-red-200 text-xs font-bold">
                    <span class="pulsing-dot pulsing-dot-danger"></span>
                    <span>Nonaktif</span>
                  </span>
                <?php endif; ?>
              </td>
              <td class="py-4 px-6 text-center whitespace-nowrap">
                <div class="inline-flex items-center gap-1.5">
                  <a href="<?= base_url('member/edit/' . $m['id_member']); ?>" 
                     class="px-2.5 py-1.5 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white font-bold text-xs transition-colors flex items-center gap-1 shadow-sm"
                     title="Edit Member">
                    <i class="fas fa-pencil-alt text-[11px]"></i>
                    <span>Edit</span>
                  </a>
                  <a href="<?= base_url('member/hapus/' . $m['id_member']); ?>" 
                     class="px-2.5 py-1.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white font-bold text-xs transition-colors flex items-center gap-1 shadow-sm"
                     onclick="return confirm('Apakah Anda yakin ingin menghapus member <?= esc($m['nama']); ?>?')"
                     title="Hapus Member">
                    <i class="fas fa-trash-alt text-[11px]"></i>
                    <span>Hapus</span>
                  </a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="7" class="py-12 text-center text-slate-400">
              <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 text-2xl mx-auto mb-3">
                <i class="fas fa-users-slash"></i>
              </div>
              <p class="font-bold text-slate-600 text-sm">Tidak Ada Data Member</p>
              <p class="text-xs text-slate-400 mt-1">
                <?= !empty($cari) ? 'Tidak ditemukan member dengan kata kunci "<strong>' . esc($cari) . '</strong>".' : 'Silakan klik tombol <strong>Tambah Member</strong> di atas.'; ?>
              </p>
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>
<?= $this->endSection(); ?>