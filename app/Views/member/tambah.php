<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="max-w-2xl mx-auto">
  
  <!-- Form Card -->
  <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
    
    <!-- Card Header -->
    <div class="p-6 sm:p-8 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
      <div>
        <h3 class="font-extrabold text-slate-800 text-lg">Pendaftaran Member Baru</h3>
        <p class="text-xs text-slate-500 mt-1">Lengkapi data diri dan pilihan paket fitness anggota.</p>
      </div>
      <a href="<?= base_url('member'); ?>" 
         class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-bold transition-colors shadow-sm">
        <i class="fas fa-arrow-left text-[11px]"></i>
        <span>Kembali</span>
      </a>
    </div>

    <!-- Form Body -->
    <form action="<?= base_url('member/simpan'); ?>" method="post" class="p-6 sm:p-8 space-y-5">
      <?= csrf_field(); ?>

      <!-- Nama Lengkap -->
      <div>
        <label for="nama" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Lengkap Member <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 text-sm"><i class="fas fa-user"></i></span>
          <input type="text" name="nama" id="nama" 
                 class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" 
                 placeholder="Contoh: Budi Santoso" required autofocus />
        </div>
      </div>

      <!-- No Handphone / WA -->
      <div>
        <label for="no_hp" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nomor Telepon / WhatsApp <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 text-sm"><i class="fab fa-whatsapp"></i></span>
          <input type="text" name="no_hp" id="no_hp" 
                 class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" 
                 placeholder="Contoh: 081234567890" required />
        </div>
      </div>

      <!-- Pilihan Paket Gym -->
      <div>
        <label for="paket" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Pilihan Paket Langganan <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 text-sm"><i class="fas fa-tags"></i></span>
          <select name="paket" id="paket" 
                  class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-10 py-2.5 text-sm text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all appearance-none cursor-pointer" required>
            <option value="" disabled selected>-- Pilih Paket Gym --</option>
            <?php if (!empty($paket)) : ?>
              <?php foreach ($paket as $p) : ?>
                <option value="<?= esc($p['nama_paket']); ?>">
                  <?= esc($p['nama_paket']); ?> - Rp <?= number_format($p['harga'], 0, ',', '.'); ?> (<?= $p['durasi_hari']; ?> Hari)
                </option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
          <span class="absolute right-3.5 text-slate-400 text-xs pointer-events-none">
            <i class="fas fa-chevron-down"></i>
          </span>
        </div>
      </div>

      <!-- Tanggal Pendaftaran -->
      <div>
        <label for="tanggal_daftar" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tanggal Pendaftaran <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 text-sm"><i class="far fa-calendar-alt"></i></span>
          <input type="date" name="tanggal_daftar" id="tanggal_daftar" value="<?= date('Y-m-d'); ?>" 
                 class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" required />
        </div>
      </div>

      <!-- Status Keanggotaan -->
      <div>
        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Status Keanggotaan</label>
        <div class="grid grid-cols-2 gap-4">
          <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-slate-50/60 cursor-pointer hover:bg-slate-100 transition-colors">
            <input type="radio" name="status" value="Aktif" checked class="w-4 h-4 text-emerald-600 focus:ring-emerald-500">
            <span class="text-xs font-bold text-emerald-700 flex items-center gap-1.5">
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
              <span>Aktif</span>
            </span>
          </label>
          <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 bg-slate-50/60 cursor-pointer hover:bg-slate-100 transition-colors">
            <input type="radio" name="status" value="Nonaktif" class="w-4 h-4 text-red-600 focus:ring-red-500">
            <span class="text-xs font-bold text-red-700 flex items-center gap-1.5">
              <span class="w-2 h-2 rounded-full bg-red-500"></span>
              <span>Nonaktif</span>
            </span>
          </label>
        </div>
      </div>

      <!-- Form Actions -->
      <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
        <a href="<?= base_url('member'); ?>" 
           class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-bold transition-colors">
          Batal
        </a>
        <button type="submit" 
                class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-bold text-xs uppercase tracking-wider shadow-md shadow-emerald-500/20 transition-all hover:scale-[1.02] active:scale-95 flex items-center gap-2">
          <i class="fas fa-check-circle text-xs"></i>
          <span>Simpan Member</span>
        </button>
      </div>

    </form>

  </div>

</div>
<?= $this->endSection(); ?>