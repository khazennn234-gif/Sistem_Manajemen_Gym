<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="max-w-xl mx-auto">
  
  <!-- Form Card -->
  <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
    
    <!-- Card Header -->
    <div class="p-6 sm:p-8 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
      <div>
        <h3 class="font-extrabold text-slate-800 text-lg">Edit Data Instruktur</h3>
        <p class="text-xs text-slate-500 mt-1">Perbarui keahlian instruktur dan kontak pelatih.</p>
      </div>
      <a href="<?= base_url('instruktur'); ?>" 
         class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-bold transition-colors shadow-sm">
        <i class="fas fa-arrow-left text-[11px]"></i>
        <span>Kembali</span>
      </a>
    </div>

    <!-- Form Body -->
    <form action="<?= base_url('instruktur/update/' . $instruktur['id_instruktur']); ?>" method="post" class="p-6 sm:p-8 space-y-5">
      <?= csrf_field(); ?>

      <!-- Nama Instruktur -->
      <div>
        <label for="nama_instruktur" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Instruktur / Trainer <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 text-sm"><i class="fas fa-user-ninja"></i></span>
          <input type="text" name="nama_instruktur" id="nama_instruktur" value="<?= esc($instruktur['nama_instruktur']); ?>" 
                 class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" required />
        </div>
      </div>

      <!-- Spesialisasi -->
      <div>
        <label for="spesialisasi" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Spesialisasi / Keahlian <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 text-sm"><i class="fas fa-award"></i></span>
          <input type="text" name="spesialisasi" id="spesialisasi" value="<?= esc($instruktur['spesialisasi']); ?>" 
                 class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" required />
        </div>
      </div>

      <!-- Kontak WA -->
      <div>
        <label for="no_hp" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nomor Telepon / WhatsApp <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 text-sm"><i class="fab fa-whatsapp"></i></span>
          <input type="text" name="no_hp" id="no_hp" value="<?= esc($instruktur['no_hp']); ?>" 
                 class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" required />
        </div>
      </div>

      <!-- Form Actions -->
      <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
        <a href="<?= base_url('instruktur'); ?>" 
           class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-bold transition-colors">
          Batal
        </a>
        <button type="submit" 
                class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-xs uppercase tracking-wider shadow-md shadow-blue-500/20 transition-all hover:scale-[1.02] active:scale-95 flex items-center gap-2">
          <i class="fas fa-sync-alt text-xs"></i>
          <span>Perbarui Instruktur</span>
        </button>
      </div>

    </form>

  </div>

</div>
<?= $this->endSection(); ?>
