<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Administrator - Gym Master</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.ico'); ?>">

  <!-- Google Fonts: Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Font Awesome Icons -->
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
            dark: {
              900: '#070A12',
              850: '#0B0F19',
              800: '#111827',
              700: '#1F2937',
            }
          }
        }
      }
    }
  </script>

  <!-- Custom Theme CSS -->
  <link href="<?= base_url('assets/css/gym-theme.css'); ?>" rel="stylesheet" />
</head>

<body class="bg-dark-900 text-slate-100 min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8 relative overflow-x-hidden font-sans selection:bg-blue-500 selection:text-white">

  <!-- Ambient Glow Orbs -->
  <div class="fixed top-[-15%] left-[-10%] w-[500px] h-[500px] rounded-full bg-gradient-to-tr from-blue-600/25 to-cyan-400/20 blur-[130px] pointer-events-none animate-float"></div>
  <div class="fixed bottom-[-15%] right-[-10%] w-[550px] h-[550px] rounded-full bg-gradient-to-br from-purple-600/20 to-indigo-500/25 blur-[140px] pointer-events-none animate-float" style="animation-delay: -3s;"></div>

  <!-- Main Container Card -->
  <div class="relative w-full max-w-5xl bg-dark-850/80 backdrop-blur-2xl rounded-3xl border border-white/10 shadow-[0_25px_70px_rgba(0,0,0,0.55)] overflow-hidden z-10 grid grid-cols-1 lg:grid-cols-12">
    
    <!-- Left Column: Branding & Feature Highlights -->
    <div class="lg:col-span-5 bg-gradient-to-br from-blue-900/60 via-indigo-950/80 to-dark-900/90 p-8 sm:p-10 flex flex-col justify-between border-b lg:border-b-0 lg:border-r border-white/10 relative overflow-hidden">
      <!-- Subtle Decorative Grid Background -->
      <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(59,130,246,0.15),transparent_70%)] pointer-events-none"></div>

      <!-- Brand Header -->
      <div class="relative z-10">
        <div class="inline-flex items-center gap-3 bg-white/10 backdrop-blur-md border border-white/15 px-4 py-2 rounded-2xl mb-8 shadow-inner">
          <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-500 to-cyan-400 flex items-center justify-center shadow-lg shadow-blue-500/30">
            <i class="fas fa-dumbbell text-white text-lg"></i>
          </div>
          <div>
            <span class="font-extrabold text-base tracking-wider text-white block leading-none">GYM MASTER</span>
            <span class="text-[10px] tracking-widest uppercase text-cyan-300 font-semibold">Management System</span>
          </div>
        </div>

        <h1 class="text-2xl sm:text-3xl font-extrabold text-white leading-tight mb-3">
          Kelola Gym Lebih <span class="bg-gradient-to-r from-cyan-400 via-blue-400 to-indigo-300 bg-clip-text text-transparent">Cerdas & Efisien</span>
        </h1>
        <p class="text-sm text-slate-300/80 leading-relaxed">
          Platform manajemen fitness modern berbasis CodeIgniter 4 MVC terintegrasi database MySQL untuk mengoptimalkan operasional harian gym Anda.
        </p>
      </div>

      <!-- Feature Points -->
      <div class="space-y-4 my-8 relative z-10">
        <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-white/[0.04] border border-white/[0.08] hover:bg-white/[0.07] transition-all duration-300">
          <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0 mt-0.5">
            <i class="fas fa-users text-sm"></i>
          </div>
          <div>
            <h4 class="text-xs font-bold text-white uppercase tracking-wider">Manajemen Member</h4>
            <p class="text-xs text-slate-400">Monitoring status aktif, paket langganan, dan data kontak.</p>
          </div>
        </div>

        <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-white/[0.04] border border-white/[0.08] hover:bg-white/[0.07] transition-all duration-300">
          <div class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center flex-shrink-0 mt-0.5">
            <i class="fas fa-tags text-sm"></i>
          </div>
          <div>
            <h4 class="text-xs font-bold text-white uppercase tracking-wider">Paket Fleksibel</h4>
            <p class="text-xs text-slate-400">Pengaturan tarif, durasi harian hingga tahunan secara dinamis.</p>
          </div>
        </div>

        <div class="flex items-start gap-3.5 p-3.5 rounded-2xl bg-white/[0.04] border border-white/[0.08] hover:bg-white/[0.07] transition-all duration-300">
          <div class="w-8 h-8 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center flex-shrink-0 mt-0.5">
            <i class="fas fa-wallet text-sm"></i>
          </div>
          <div>
            <h4 class="text-xs font-bold text-white uppercase tracking-wider">Transaksi & Pendapatan</h4>
            <p class="text-xs text-slate-400">Catatan pembayaran membership dan rekap omzet otomatis.</p>
          </div>
        </div>
      </div>

      <!-- Bottom Badges -->
      <div class="pt-4 border-t border-white/10 flex items-center justify-between text-xs text-slate-400 relative z-10">
        <span class="inline-flex items-center gap-2">
          <span class="pulsing-dot pulsing-dot-success"></span>
          <span>Database Aktif: <strong class="text-slate-200">MySQL</strong></span>
        </span>
        <span class="bg-blue-500/20 text-blue-300 border border-blue-500/30 px-2.5 py-0.5 rounded-full text-[11px] font-semibold">
          v4.7 MVC
        </span>
      </div>
    </div>

    <!-- Right Column: Login Form -->
    <div class="lg:col-span-7 p-8 sm:p-12 flex flex-col justify-center bg-dark-800/60 backdrop-blur-md relative">
      
      <div class="max-w-md w-full mx-auto">
        <!-- Title -->
        <div class="mb-8">
          <h2 class="text-2xl font-bold text-white tracking-tight">Selamat Datang Kembali</h2>
          <p class="text-sm text-slate-400 mt-1">Silakan masukkan username dan kata sandi untuk masuk.</p>
        </div>

        <!-- Flash Alert Messages -->
        <?php if (session()->getFlashdata('error')) : ?>
          <div class="mb-5 p-4 rounded-2xl bg-red-500/15 border border-red-500/30 text-red-200 text-xs flex items-center justify-between shadow-lg">
            <div class="flex items-center gap-2.5">
              <i class="fas fa-circle-exclamation text-red-400 text-base"></i>
              <span><?= session()->getFlashdata('error'); ?></span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-red-300 hover:text-white">
              <i class="fas fa-times"></i>
            </button>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')) : ?>
          <div class="mb-5 p-4 rounded-2xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-200 text-xs flex items-center justify-between shadow-lg">
            <div class="flex items-center gap-2.5">
              <i class="fas fa-circle-check text-emerald-400 text-base"></i>
              <span><?= session()->getFlashdata('success'); ?></span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-emerald-300 hover:text-white">
              <i class="fas fa-times"></i>
            </button>
          </div>
        <?php endif; ?>

        <!-- Quick 1-Click Demo Login Helper -->
        <div class="mb-6 p-3.5 rounded-2xl bg-blue-500/10 border border-blue-500/25 flex items-center justify-between gap-3">
          <div class="flex items-center gap-2.5">
            <div class="w-7 h-7 rounded-lg bg-blue-500/20 text-blue-400 flex items-center justify-center text-xs">
              <i class="fas fa-key"></i>
            </div>
            <div class="text-xs">
              <span class="text-slate-300 font-medium block">Akun Demo Penguji:</span>
              <span class="text-blue-300 font-mono text-[11px]">admin / admin123</span>
            </div>
          </div>
          <button type="button" onclick="isiAkunDemo()" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-500 text-white rounded-xl text-xs font-bold transition-all shadow-md hover:shadow-blue-500/30 active:scale-95 flex items-center gap-1.5 cursor-pointer">
            <i class="fas fa-bolt text-yellow-300 text-[11px]"></i>
            <span>Isi Otomatis</span>
          </button>
        </div>

        <!-- Login Form -->
        <form action="<?= base_url('auth/proses_login'); ?>" method="POST" class="space-y-5">
          <?= csrf_field(); ?>

          <!-- Username Input -->
          <div>
            <label for="username" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Username</label>
            <div class="relative flex items-center">
              <span class="absolute left-4 text-slate-400 text-sm pointer-events-none">
                <i class="fas fa-user"></i>
              </span>
              <input type="text" name="username" id="username" 
                     class="w-full bg-dark-900/80 border border-white/10 rounded-xl pl-11 pr-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" 
                     placeholder="Masukkan username" required autofocus />
            </div>
          </div>

          <!-- Password Input with Eye Toggle -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <label for="password" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Kata Sandi</label>
            </div>
            <div class="relative flex items-center">
              <span class="absolute left-4 text-slate-400 text-sm pointer-events-none">
                <i class="fas fa-lock"></i>
              </span>
              <input type="password" name="password" id="password" 
                     class="w-full bg-dark-900/80 border border-white/10 rounded-xl pl-11 pr-12 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" 
                     placeholder="Masukkan kata sandi" required />
              <button type="button" onclick="togglePasswordVisibility()" class="absolute right-3.5 text-slate-400 hover:text-white p-1 transition-colors" title="Lihat password">
                <i class="fas fa-eye text-sm" id="toggleIcon"></i>
              </button>
            </div>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="w-full py-3.5 px-4 mt-2 bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-700 hover:from-blue-500 hover:via-indigo-500 hover:to-blue-600 text-white font-bold text-sm rounded-xl shadow-lg shadow-blue-600/30 transition-all duration-300 hover:shadow-blue-500/40 active:scale-[0.99] flex items-center justify-center gap-2 cursor-pointer">
            <span>Masuk ke Dashboard</span>
            <i class="fas fa-arrow-right text-xs"></i>
          </button>
        </form>

        <!-- Footer Links -->
        <div class="mt-8 pt-6 border-t border-white/10 text-center space-y-3">
          <p class="text-xs text-slate-400">
            Belum punya akun? 
            <a href="<?= base_url('auth/register'); ?>" class="text-cyan-400 hover:text-cyan-300 font-bold transition-colors ml-1">
              Daftar Akun Baru
            </a>
          </p>
          <div class="inline-block">
            <a href="<?= base_url('dashboard'); ?>" class="inline-flex items-center gap-1.5 text-xs text-slate-400 hover:text-slate-200 transition-colors bg-white/5 hover:bg-white/10 px-3.5 py-1.5 rounded-full border border-white/10">
              <i class="fas fa-arrow-left text-[10px]"></i>
              <span>Lewati Login & Buka Dashboard</span>
            </a>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- JavaScript for 1-Click Demo & Password Toggle -->
  <script>
    function isiAkunDemo() {
      const usernameInput = document.getElementById('username');
      const passwordInput = document.getElementById('password');
      
      usernameInput.value = 'admin';
      passwordInput.value = 'admin123';
      
      // Micro-animation highlight
      [usernameInput, passwordInput].forEach(el => {
        el.classList.add('ring-2', 'ring-cyan-400', 'border-cyan-400');
        setTimeout(() => {
          el.classList.remove('ring-2', 'ring-cyan-400', 'border-cyan-400');
        }, 800);
      });
    }

    function togglePasswordVisibility() {
      const passwordInput = document.getElementById('password');
      const toggleIcon = document.getElementById('toggleIcon');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
      }
    }
  </script>

</body>
</html>