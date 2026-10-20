<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="max-w-xl mx-auto">
  
  <!-- Form Card -->
  <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
    
    <!-- Card Header -->
    <div class="p-6 sm:p-8 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
      <div>
        <h3 class="font-extrabold text-slate-800 text-lg">Catat Transaksi Pembayaran</h3>
        <p class="text-xs text-slate-500 mt-1">Pilih member dan paket gym untuk memproses biaya langganan.</p>
      </div>
      <a href="<?= base_url('transaksi'); ?>" 
         class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-bold transition-colors shadow-sm">
        <i class="fas fa-arrow-left text-[11px]"></i>
        <span>Kembali</span>
      </a>
    </div>

    <!-- Form Body -->
    <form action="<?= base_url('transaksi/simpan'); ?>" method="post" class="p-6 sm:p-8 space-y-5">
      <?= csrf_field(); ?>

      <!-- Pilih Member -->
      <div>
        <label for="id_member" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Pilih Member Gym <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 text-sm"><i class="fas fa-user"></i></span>
          <select name="id_member" id="id_member" 
                  class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-10 py-2.5 text-sm text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all appearance-none cursor-pointer" required>
            <option value="" disabled selected>-- Pilih Member Gym --</option>
            <?php if (!empty($members)) : ?>
              <?php foreach ($members as $m) : ?>
                <option value="<?= $m['id_member']; ?>">
                  <?= esc($m['nama']); ?> (No. HP: <?= esc($m['no_hp']); ?>)
                </option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
          <span class="absolute right-3.5 text-slate-400 text-xs pointer-events-none">
            <i class="fas fa-chevron-down"></i>
          </span>
        </div>
      </div>

      <!-- Pilih Paket -->
      <div>
        <label for="id_paket" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Pilih Paket Langganan <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 text-sm"><i class="fas fa-tags"></i></span>
          <select name="id_paket" id="id_paket" onchange="autoFillHarga(this)"
                  class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-10 py-2.5 text-sm text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all appearance-none cursor-pointer" required>
            <option value="" disabled selected>-- Pilih Paket Gym --</option>
            <?php if (!empty($pakets)) : ?>
              <?php foreach ($pakets as $p) : ?>
                <option value="<?= $p['id_paket']; ?>" data-harga="<?= $p['harga']; ?>">
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

      <!-- Tanggal Transaksi -->
      <div>
        <label for="tanggal_transaksi" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tanggal Transaksi <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 text-sm"><i class="far fa-calendar-alt"></i></span>
          <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" value="<?= date('Y-m-d'); ?>" 
                 class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" required />
        </div>
      </div>

      <!-- Total Bayar -->
      <div>
        <label for="total_bayar" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Total Biaya Pembayaran (Rp) <span class="text-red-500">*</span></label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-slate-400 font-bold text-xs">Rp</span>
          <input type="number" name="total_bayar" id="total_bayar" 
                 class="w-full bg-slate-50/60 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm font-extrabold text-emerald-600 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" 
                 placeholder="0" required />
        </div>
        <p class="text-[11px] text-slate-400 mt-1">Nominal otomatis disesuaikan dari paket yang dipilih.</p>
      </div>

      <!-- Form Actions -->
      <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
        <a href="<?= base_url('transaksi'); ?>" 
           class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-bold transition-colors">
          Batal
        </a>
        <button type="submit" 
                class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-bold text-xs uppercase tracking-wider shadow-md shadow-cyan-500/20 transition-all hover:scale-[1.02] active:scale-95 flex items-center gap-2">
          <i class="fas fa-check-circle text-xs"></i>
          <span>Simpan Transaksi</span>
        </button>
      </div>

    </form>

  </div>

</div>

<script>
  function autoFillHarga(selectElem) {
    const selectedOption = selectElem.options[selectElem.selectedIndex];
    const harga = selectedOption.getAttribute('data-harga');
    if (harga) {
      document.getElementById('total_bayar').value = harga;
    }
  }
</script>
<?= $this->endSection(); ?>
