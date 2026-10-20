<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun Baru - Gym Master</title>

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
  <div class="fixed top-[-15%] right-[-10%] w-[500px] h-[500px] rounded-full bg-gradient-to-tr from-cyan-600/25 to-blue-500/20 blur-[130px] pointer-events-none animate-float"></div>
  <div class="fixed bottom-[-15%] left-[-10%] w-[550px] h-[550px] rounded-full bg-gradient-to-br from-indigo-600/20 to-purple-600/25 blur-[140px] pointer-events-none animate-float" style="animation-delay: -3s;"></div>

  <!-- Main Card -->
  <div class="relative w-full max-w-lg bg-dark-850/85 backdrop-blur-2xl rounded-3xl border border-white/10 shadow-[0_25px_70px_rgba(0,0,0,0.55)] overflow-hidden z-10 p-8 sm:p-10">
    
    <!-- Header Branding -->
    <div class="text-center mb-8">
      <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-tr from-blue-500 to-cyan-400 mb-4 shadow-lg shadow-blue-500/30">
        <i class="fas fa-user-plus text-white text-xl"></i>
      </div>
      <h2 class="text-2xl font-bold text-white tracking-tight">Daftar Akun Baru</h2>
      <p class="text-sm text-slate-400 mt-1">Buat akun staf pengelola atau member gym.</p>
    </div>

    <!-- Alert Flash Error -->
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

    <!-- Register Form -->
    <form action="<?= base_url('auth/proses_register'); ?>" method="POST" class="space-y-4">
      <?= csrf_field(); ?>

      <!-- Username -->
      <div>
        <label for="username" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Username Baru</label>
        <div class="relative flex items-center">
          <span class="absolute left-4 text-slate-400 text-sm pointer-events-none">
            <i class="fas fa-user"></i>
          </span>
          <input type="text" name="username" id="username" 
                 class="w-full bg-dark-900/80 border border-white/10 rounded-xl pl-11 pr-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" 
                 placeholder="Pilih nama pengguna unik" required autofocus />
        </div>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Kata Sandi</label>
        <div class="relative flex items-center">
          <span class="absolute left-4 text-slate-400 text-sm pointer-events-none">
            <i class="fas fa-lock"></i>
          </span>
          <input type="password" name="password" id="password" 
                 class="w-full bg-dark-900/80 border border-white/10 rounded-xl pl-11 pr-12 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all" 
                 placeholder="Buat kata sandi minimal 6 karakter" required />
          <button type="button" onclick="togglePasswordVisibility()" class="absolute right-3.5 text-slate-400 hover:text-white p-1 transition-colors" title="Lihat password">
            <i class="fas fa-eye text-sm" id="toggleIcon"></i>
          </button>
        </div>
      </div>

      <!-- Role Selection -->
      <div>
        <label for="role" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Role / Hak Akses</label>
        <div class="relative flex items-center">
          <span class="absolute left-4 text-slate-400 text-sm pointer-events-none">
            <i class="fas fa-shield-alt"></i>
          </span>
          <select name="role" id="role" 
                  class="w-full bg-dark-900/80 border border-white/10 rounded-xl pl-11 pr-4 py-3 text-sm text-white focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all appearance-none cursor-pointer" required>
            <option value="Admin" class="bg-dark-900 text-white">Administrator (Pengelola Sistem)</option>
            <option value="Member" class="bg-dark-900 text-white">Member Gym (Anggota)</option>
          </select>
          <span class="absolute right-4 text-slate-400 text-xs pointer-events-none">
            <i class="fas fa-chevron-down"></i>
          </span>
        </div>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="w-full py-3.5 px-4 mt-2 bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600 hover:from-blue-500 hover:via-indigo-500 hover:to-cyan-500 text-white font-bold text-sm rounded-xl shadow-lg shadow-blue-600/30 transition-all duration-300 hover:shadow-blue-500/40 active:scale-[0.99] flex items-center justify-center gap-2 cursor-pointer">
        <i class="fas fa-check-circle text-sm"></i>
        <span>Daftarkan Akun</span>
      </button>
    </form>

    <!-- Footer Links -->
    <div class="mt-8 pt-6 border-t border-white/10 text-center">
      <p class="text-xs text-slate-400">
        Sudah memiliki akun? 
        <a href="<?= base_url('auth/login'); ?>" class="text-cyan-400 hover:text-cyan-300 font-bold transition-colors ml-1">
          Masuk / Login di sini
        </a>
      </p>
    </div>

  </div>

  <script>
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