<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Sistem Manajemen Gym'); ?> - Gym Master</title>
  
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.ico'); ?>">

  <!-- Google Fonts: Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Font Awesome 6 Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
          },
          colors: {
            gym: {
              50: '#f0f7ff',
              100: '#e0effe',
              500: '#2563eb',
              600: '#1d4ed8',
              700: '#1e40af',
              dark: '#0f172a',
            }
          }
        }
      }
    }
  </script>

  <!-- Custom Theme CSS -->
  <link href="<?= base_url('assets/css/gym-theme.css'); ?>" rel="stylesheet" />

  <style>
    /* Custom Scrollbar for Sidenav */
    #sidebar-nav::-webkit-scrollbar {
      width: 4px;
    }
    #sidebar-nav::-webkit-scrollbar-thumb {
      background: rgba(148, 163, 184, 0.4);
      border-radius: 9999px;
    }
  </style>
</head>

<body class="bg-slate-50 text-slate-700 min-h-screen flex flex-col antialiased font-sans selection:bg-blue-600 selection:text-white">

  <!-- Sidebar Overlay for Mobile -->
  <div id="sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-40 hidden xl:hidden transition-opacity"></div>

  <!-- Sidebar Navigation -->
  <aside id="sidebar-main" class="fixed top-0 bottom-0 left-0 w-72 bg-slate-900 text-white z-50 transform -translate-x-full xl:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col border-r border-slate-800 shadow-2xl">
    
    <!-- Sidebar Brand -->
    <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800/80 bg-slate-950/40">
      <a href="<?= base_url('dashboard'); ?>" class="flex items-center gap-3 group">
        <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-blue-600 via-indigo-600 to-cyan-400 flex items-center justify-center shadow-lg shadow-blue-500/20 group-hover:scale-105 transition-transform">
          <i class="fas fa-dumbbell text-white text-lg"></i>
        </div>
        <div>
          <span class="font-extrabold text-base tracking-wider text-white block leading-none">GYM MASTER</span>
          <span class="text-[10px] tracking-widest uppercase text-cyan-400 font-bold">Pro Edition</span>
        </div>
      </a>
      <button onclick="toggleSidebar()" class="xl:hidden text-slate-400 hover:text-white p-2 rounded-lg">
        <i class="fas fa-times text-lg"></i>
      </button>
    </div>

    <!-- Navigation Links -->
    <div id="sidebar-nav" class="flex-1 overflow-y-auto px-4 py-6 space-y-6">
      
      <!-- Main Menu Section -->
      <div>
        <p class="px-3 text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-3">Menu Operasional</p>
        <ul class="space-y-1.5">
          <!-- Dashboard -->
          <li>
            <a href="<?= base_url('dashboard'); ?>" 
               class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-xs font-bold transition-all duration-200 <?= (isset($active) && $active == 'dashboard') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' ?>">
              <div class="w-8 h-8 rounded-lg flex items-center justify-center <?= (isset($active) && $active == 'dashboard') ? 'bg-white/20' : 'bg-slate-800 text-blue-400' ?>">
                <i class="fas fa-chart-pie text-sm"></i>
              </div>
              <span>Dashboard Utama</span>
            </a>
          </li>

          <!-- Data Member -->
          <li>
            <a href="<?= base_url('member'); ?>" 
               class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-xs font-bold transition-all duration-200 <?= (isset($active) && $active == 'member') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' ?>">
              <div class="w-8 h-8 rounded-lg flex items-center justify-center <?= (isset($active) && $active == 'member') ? 'bg-white/20' : 'bg-slate-800 text-emerald-400' ?>">
                <i class="fas fa-users text-sm"></i>
              </div>
              <span>Data Member Gym</span>
            </a>
          </li>

          <!-- Paket Gym -->
          <li>
            <a href="<?= base_url('paket'); ?>" 
               class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-xs font-bold transition-all duration-200 <?= (isset($active) && $active == 'paket') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' ?>">
              <div class="w-8 h-8 rounded-lg flex items-center justify-center <?= (isset($active) && $active == 'paket') ? 'bg-white/20' : 'bg-slate-800 text-orange-400' ?>">
                <i class="fas fa-tags text-sm"></i>
              </div>
              <span>Paket Langganan</span>
            </a>
          </li>

          <!-- Instruktur Gym -->
          <li>
            <a href="<?= base_url('instruktur'); ?>" 
               class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-xs font-bold transition-all duration-200 <?= (isset($active) && $active == 'instruktur') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' ?>">
              <div class="w-8 h-8 rounded-lg flex items-center justify-center <?= (isset($active) && $active == 'instruktur') ? 'bg-white/20' : 'bg-slate-800 text-purple-400' ?>">
                <i class="fas fa-user-ninja text-sm"></i>
              </div>
              <span>Instruktur / Trainer</span>
            </a>
          </li>

          <!-- Transaksi -->
          <li>
            <a href="<?= base_url('transaksi'); ?>" 
               class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-xs font-bold transition-all duration-200 <?= (isset($active) && $active == 'transaksi') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' ?>">
              <div class="w-8 h-8 rounded-lg flex items-center justify-center <?= (isset($active) && $active == 'transaksi') ? 'bg-white/20' : 'bg-slate-800 text-cyan-400' ?>">
                <i class="fas fa-receipt text-sm"></i>
              </div>
              <span>Transaksi Membership</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- Quick Action Short links -->
      <div>
        <p class="px-3 text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-3">Pintasan Cepat</p>
        <div class="space-y-1">
          <a href="<?= base_url('member/tambah'); ?>" class="flex items-center gap-2.5 px-3.5 py-2 text-xs font-medium text-slate-400 hover:text-emerald-400 hover:bg-slate-800/50 rounded-lg transition-colors">
            <i class="fas fa-plus-circle text-emerald-500 text-xs"></i>
            <span>Tambah Member Baru</span>
          </a>
          <a href="<?= base_url('transaksi/tambah'); ?>" class="flex items-center gap-2.5 px-3.5 py-2 text-xs font-medium text-slate-400 hover:text-cyan-400 hover:bg-slate-800/50 rounded-lg transition-colors">
            <i class="fas fa-cart-plus text-cyan-500 text-xs"></i>
            <span>Catat Transaksi Baru</span>
          </a>
        </div>
      </div>

    </div>

    <!-- User Profile & Logout Bottom Card -->
    <div class="p-4 border-t border-slate-800 bg-slate-950/60">
      <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900/90 border border-slate-800">
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-full bg-blue-600/20 border border-blue-500/40 text-blue-400 flex items-center justify-center font-bold text-sm">
            <?= strtoupper(substr(session()->get('username') ?? 'A', 0, 1)); ?>
          </div>
          <div class="overflow-hidden">
            <h6 class="text-xs font-bold text-white truncate"><?= esc(session()->get('username') ?? 'Admin'); ?></h6>
            <span class="text-[10px] text-emerald-400 font-semibold block leading-tight">● Online (<?= esc(session()->get('role') ?? 'Admin'); ?>)</span>
          </div>
        </div>
        <a href="<?= base_url('auth/logout'); ?>" 
           onclick="return confirm('Apakah Anda yakin ingin logout?')" 
           class="w-8 h-8 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white flex items-center justify-center transition-all" 
           title="Keluar / Logout">
          <i class="fas fa-sign-out-alt text-xs"></i>
        </a>
      </div>
    </div>

  </aside>

  <!-- Main Content Wrapper -->
  <div class="xl:ml-72 flex-1 flex flex-col min-h-screen">
    
    <!-- Top Navbar Header -->
    <header class="h-20 bg-white/90 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-30 px-6 sm:px-8 flex items-center justify-between">
      
      <!-- Left: Mobile Toggle & Breadcrumb -->
      <div class="flex items-center gap-4">
        <button onclick="toggleSidebar()" class="xl:hidden p-2 rounded-xl text-slate-600 hover:bg-slate-100 transition-colors">
          <i class="fas fa-bars text-lg"></i>
        </button>
        <div>
          <nav class="flex items-center gap-2 text-xs text-slate-400">
            <a href="<?= base_url('dashboard'); ?>" class="hover:text-blue-600 transition-colors">Gym Master</a>
            <span>/</span>
            <span class="text-slate-600 font-semibold capitalize"><?= esc($title ?? 'Dashboard'); ?></span>
          </nav>
          <h1 class="text-base sm:text-lg font-bold text-slate-800 leading-tight"><?= esc($title ?? 'Sistem Manajemen Gym'); ?></h1>
        </div>
      </div>

      <!-- Right: Real-time Date & System Badge -->
      <div class="flex items-center gap-3">
        <div class="hidden md:flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-100 border border-slate-200 text-xs text-slate-600 font-medium">
          <i class="far fa-calendar-alt text-blue-600"></i>
          <span><?= date('l, d F Y'); ?></span>
        </div>
        <div class="flex items-center gap-2">
          <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-bold">
            <span class="pulsing-dot pulsing-dot-success"></span>
            <span>MySQL Terhubung</span>
          </span>
        </div>
      </div>

    </header>

    <!-- Main Dynamic Content Area -->
    <main class="flex-1 p-6 sm:p-8 max-w-7xl w-full mx-auto">
      
      <!-- Global Flash Alerts -->
      <?php if (session()->getFlashdata('success')) : ?>
        <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center justify-between shadow-sm animate-fade-in">
          <div class="flex items-center gap-3">
            <div class="w-7 h-7 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs flex-shrink-0">
              <i class="fas fa-check"></i>
            </div>
            <span><?= session()->getFlashdata('success'); ?></span>
          </div>
          <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 p-1">
            <i class="fas fa-times"></i>
          </button>
        </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('error')) : ?>
        <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 text-xs font-semibold flex items-center justify-between shadow-sm animate-fade-in">
          <div class="flex items-center gap-3">
            <div class="w-7 h-7 rounded-full bg-red-500 text-white flex items-center justify-center text-xs flex-shrink-0">
              <i class="fas fa-exclamation"></i>
            </div>
            <span><?= session()->getFlashdata('error'); ?></span>
          </div>
          <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700 p-1">
            <i class="fas fa-times"></i>
          </button>
        </div>
      <?php endif; ?>

      <!-- Dynamic Section -->
      <?= $this->renderSection('content'); ?>

    </main>

    <!-- Clean Footer -->
    <footer class="bg-white border-t border-slate-200/80 py-5 px-6 sm:px-8 mt-auto text-xs text-slate-400 flex flex-col sm:flex-row items-center justify-between gap-3">
      <div class="flex items-center gap-2">
        <i class="fas fa-dumbbell text-blue-600"></i>
        <span>© <?= date('Y'); ?> <strong>Gym Master</strong> | Proyek Rekayasa Perangkat Lunak (RPL) - CodeIgniter 4 MVC</span>
      </div>
      <div>
        <span>Status Database: <strong class="text-slate-600">db_manajemen_gym</strong></span>
      </div>
    </footer>

  </div>

  <!-- Mobile Drawer Toggle Script -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar-main');
      const overlay = document.getElementById('sidebar-overlay');
      
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    }
  </script>

</body>
</html>
