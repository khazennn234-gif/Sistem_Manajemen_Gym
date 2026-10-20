<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<!-- Welcome Banner Hero Card -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-900 via-indigo-900 to-slate-900 p-8 sm:p-10 text-white shadow-xl mb-8 border border-white/10">
  <div class="absolute -right-10 -bottom-10 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute right-20 top-0 w-60 h-60 bg-cyan-400/10 rounded-full blur-2xl pointer-events-none"></div>

  <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
    <div class="max-w-2xl">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 text-xs font-semibold text-cyan-300 mb-3 backdrop-blur-md">
        <i class="fas fa-sparkles text-yellow-300"></i>
        <span>Sistem Informasi Manajemen Gym</span>
      </div>
      <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white mb-2">
        Halo, <span class="bg-gradient-to-r from-cyan-300 to-blue-200 bg-clip-text text-transparent"><?= esc(session()->get('username') ?? 'Administrator'); ?>!</span>
      </h2>
      <p class="text-sm text-slate-300 leading-relaxed">
        Selamat datang di pusat kendali Gym Master. Pantau keanggotaan aktif, transaksi langganan, dan ketersediaan instruktur dengan mudah.
      </p>
    </div>

    <!-- Quick Action Buttons -->
    <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
      <a href="<?= base_url('member/tambah'); ?>" 
         class="flex-1 lg:flex-none inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs uppercase tracking-wider shadow-lg shadow-emerald-500/25 transition-all hover:scale-[1.02] active:scale-95">
        <i class="fas fa-user-plus text-sm"></i>
        <span>Member Baru</span>
      </a>
      <a href="<?= base_url('transaksi/tambah'); ?>" 
         class="flex-1 lg:flex-none inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-cyan-500 hover:bg-cyan-600 text-white font-bold text-xs uppercase tracking-wider shadow-lg shadow-cyan-500/25 transition-all hover:scale-[1.02] active:scale-95">
        <i class="fas fa-cart-plus text-sm"></i>
        <span>Catat Transaksi</span>
      </a>
    </div>
  </div>
</div>

<!-- 4 Key Stat Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
  
  <!-- Card 1: Total Member -->
  <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-between">
    <div>
      <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Total Member</p>
      <h3 class="text-2xl font-extrabold text-slate-800"><?= $totalMember; ?> <span class="text-xs font-semibold text-emerald-600 font-sans ml-1">(<?= $memberAktif; ?> Aktif)</span></h3>
      <span class="inline-flex items-center gap-1.5 text-xs text-slate-500 mt-2 font-medium">
        <span class="pulsing-dot pulsing-dot-success"></span>
        <span>Keanggotaan Terdaftar</span>
      </span>
    </div>
    <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl flex-shrink-0 shadow-inner">
      <i class="fas fa-users"></i>
    </div>
  </div>

  <!-- Card 2: Paket Gym -->
  <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-between">
    <div>
      <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Paket Gym</p>
      <h3 class="text-2xl font-extrabold text-slate-800"><?= $totalPaket; ?> <span class="text-xs font-normal text-slate-500">Pilihan</span></h3>
      <span class="inline-flex items-center gap-1.5 text-xs text-orange-600 font-semibold mt-2">
        <i class="fas fa-tag text-[10px]"></i>
        <span>Durasi 1 - 365 Hari</span>
      </span>
    </div>
    <div class="w-14 h-14 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center text-xl flex-shrink-0 shadow-inner">
      <i class="fas fa-tags"></i>
    </div>
  </div>

  <!-- Card 3: Instruktur -->
  <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-between">
    <div>
      <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Instruktur Gym</p>
      <h3 class="text-2xl font-extrabold text-slate-800"><?= $totalInstruktur; ?> <span class="text-xs font-normal text-slate-500">Trainer</span></h3>
      <span class="inline-flex items-center gap-1.5 text-xs text-purple-600 font-semibold mt-2">
        <i class="fas fa-award text-[10px]"></i>
        <span>Pelatih Bersertifikat</span>
      </span>
    </div>
    <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl flex-shrink-0 shadow-inner">
      <i class="fas fa-user-ninja"></i>
    </div>
  </div>

  <!-- Card 4: Total Omzet / Transaksi -->
  <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-between">
    <div>
      <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Total Omzet</p>
      <h3 class="text-xl font-extrabold text-slate-900 truncate">Rp <?= number_format($totalPendapatan, 0, ',', '.'); ?></h3>
      <span class="inline-flex items-center gap-1.5 text-xs text-cyan-600 font-semibold mt-2">
        <i class="fas fa-receipt text-[10px]"></i>
        <span><?= $totalTransaksi; ?> Transaksi Selesai</span>
      </span>
    </div>
    <div class="w-14 h-14 rounded-2xl bg-cyan-50 text-cyan-600 flex items-center justify-center text-xl flex-shrink-0 shadow-inner">
      <i class="fas fa-wallet"></i>
    </div>
  </div>

</div>

<!-- Recent Tables (2 Columns) -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
  
  <!-- Table: Member Terbaru -->
  <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden flex flex-col">
    <div class="p-5 px-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
      <div class="flex items-center gap-2.5">
        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs">
          <i class="fas fa-users"></i>
        </div>
        <h4 class="font-bold text-slate-800 text-sm">Member Baru Terdaftar</h4>
      </div>
      <a href="<?= base_url('member'); ?>" class="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1">
        <span>Lihat Semua</span>
        <i class="fas fa-arrow-right text-[10px]"></i>
      </a>
    </div>

    <div class="overflow-x-auto flex-1">
      <table class="w-full text-left text-xs">
        <thead class="bg-slate-50 text-slate-400 font-bold uppercase text-[10px] tracking-wider border-b border-slate-100">
          <tr>
            <th class="py-3 px-6">Member</th>
            <th class="py-3 px-6">Paket</th>
            <th class="py-3 px-6 text-center">Status</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-slate-600">
          <?php if (!empty($recentMember)) : ?>
            <?php foreach ($recentMember as $m) : ?>
              <tr class="hover:bg-slate-50/80 transition-colors">
                <td class="py-3.5 px-6">
                  <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-xs flex-shrink-0">
                      <?= strtoupper(substr($m['nama'], 0, 1)); ?>
                    </div>
                    <div>
                      <div class="font-bold text-slate-800 text-xs"><?= esc($m['nama']); ?></div>
                      <div class="text-[11px] text-slate-400"><?= esc($m['no_hp']); ?></div>
                    </div>
                  </div>
                </td>
                <td class="py-3.5 px-6">
                  <span class="inline-block px-2.5 py-1 rounded-md bg-blue-50 text-blue-700 font-semibold text-[11px] border border-blue-100">
                    <?= esc($m['paket']); ?>
                  </span>
                </td>
                <td class="py-3.5 px-6 text-center">
                  <?php if ($m['status'] == 'Aktif') : ?>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700 font-bold text-[10px]">
                      <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                      <span>Aktif</span>
                    </span>
                  <?php else : ?>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-red-100 text-red-700 font-bold text-[10px]">
                      <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                      <span>Nonaktif</span>
                    </span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="3" class="py-8 text-center text-slate-400">Belum ada member terdaftar.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Table: Transaksi Terbaru -->
  <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden flex flex-col">
    <div class="p-5 px-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
      <div class="flex items-center gap-2.5">
        <div class="w-8 h-8 rounded-lg bg-cyan-100 text-cyan-600 flex items-center justify-center text-xs">
          <i class="fas fa-receipt"></i>
        </div>
        <h4 class="font-bold text-slate-800 text-sm">Riwayat Pembayaran Terbaru</h4>
      </div>
      <a href="<?= base_url('transaksi'); ?>" class="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1">
        <span>Lihat Semua</span>
        <i class="fas fa-arrow-right text-[10px]"></i>
      </a>
    </div>

    <div class="overflow-x-auto flex-1">
      <table class="w-full text-left text-xs">
        <thead class="bg-slate-50 text-slate-400 font-bold uppercase text-[10px] tracking-wider border-b border-slate-100">
          <tr>
            <th class="py-3 px-6">Member & Paket</th>
            <th class="py-3 px-6">Tanggal</th>
            <th class="py-3 px-6 text-right">Nominal</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-slate-600">
          <?php if (!empty($recentTransaksi)) : ?>
            <?php foreach ($recentTransaksi as $t) : ?>
              <tr class="hover:bg-slate-50/80 transition-colors">
                <td class="py-3.5 px-6">
                  <div class="font-bold text-slate-800 text-xs"><?= esc($t['nama_member'] ?? 'Member #' . $t['id_member']); ?></div>
                  <div class="text-[11px] text-cyan-600 font-medium"><?= esc($t['nama_paket'] ?? 'Paket Gym'); ?></div>
                </td>
                <td class="py-3.5 px-6 text-slate-500 font-medium">
                  <?= date('d M Y', strtotime($t['tanggal_transaksi'])); ?>
                </td>
                <td class="py-3.5 px-6 text-right font-bold text-emerald-600 text-xs">
                  Rp <?= number_format($t['total_bayar'], 0, ',', '.'); ?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="3" class="py-8 text-center text-slate-400">Belum ada transaksi tercatat.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
<?= $this->endSection(); ?>
