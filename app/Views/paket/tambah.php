<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="max-w-xl mx-auto">
  
  <!-- Form Card -->
  <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
    
    <!-- Card Header -->
    <div class="p-6 sm:p-8 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
      <div>
        <h3 class="font-extrabold text-slate-800 text-lg">Tambah Paket Gym Baru</h3>
        <p class="text-xs text-slate-500 mt-1">Tentukan nama paket, biaya, dan masa aktif langganan.</p>
      </div>
      <a href="<?= base_url('paket'); ?>" 
         class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-bold transition-colors shadow-sm">
        <i class="fas fa-arrow-left text-[11px]"></i>
        <span>Kembali</span>
      </a>
    </div>

    <!-- Form Body -->
    <form action="<?= base_url('paket/simpan'); ?>" method="post" class="p-6 sm:p-8 space-y-5">
      <?= csrf_field(); ?>

      <!-- Nama Paket -->
      <div>
        <label for="nama_paket" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Paket Langganan <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 text-sm"><i class="fas fa-tag"></i></span>
          <input type="text" name="nama_paket" id="nama_paket" 
                 class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" 
                 placeholder="Contoh: Membership 6 Bulan" required autofocus />
        </div>
      </div>

      <!-- Harga -->
      <div>
        <label for="harga" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Biaya / Harga Paket (Rp) <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 font-bold text-xs">Rp</span>
          <input type="number" name="harga" id="harga" min="0" step="1000" 
                 class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm font-bold text-emerald-600 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" 
                 placeholder="Contoh: 1500000" required />
        </div>
      </div>

      <!-- Durasi Hari -->
      <div>
        <label for="durasi_hari" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Durasi Masa Aktif (Hari) <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 text-sm"><i class="far fa-clock"></i></span>
          <input type="number" name="durasi_hari" id="durasi_hari" min="1" 
                 class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" 
                 placeholder="Contoh: 180" required />
        </div>
        <p class="text-[11px] text-slate-400 mt-1">Panduan: 1 hari (Harian/Daily), 30 hari (1 Bulan), 90 hari (3 Bulan), 365 hari (1 Tahun).</p>
      </div>

      <!-- Form Actions -->
      <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
        <a href="<?= base_url('paket'); ?>" 
           class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-bold transition-colors">
          Batal
        </a>
        <button type="submit" 
                class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white font-bold text-xs uppercase tracking-wider shadow-md shadow-orange-500/20 transition-all hover:scale-[1.02] active:scale-95 flex items-center gap-2">
          <i class="fas fa-save text-xs"></i>
          <span>Simpan Paket</span>
        </button>
      </div>

    </form>

  </div>

</div>
<?= $this->endSection(); ?>
