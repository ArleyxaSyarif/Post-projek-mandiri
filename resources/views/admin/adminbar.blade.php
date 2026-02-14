<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Tailwind Dark Mode</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Konfigurasi Tailwind agar menggunakan strategi 'class' untuk dark mode
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 transition-colors duration-300">

    <div class="flex">
        <aside class="w-64 h-screen bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 p-6 flex flex-col fixed transition-colors duration-300">
            <div class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-10">
                BrandLogo
            </div>

            <nav class="space-y-2 flex-1">
                <a href="#" class="block px-4 py-2.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">Home</a>
                <a href="#" class="block px-4 py-2.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">Content Control</a>
                <a href="#" class="block px-4 py-2.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">Statistik</a>
                <a href="#" class="block px-4 py-2.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">Pengumuman</a>
            </nav>

            <button id="theme-toggle" class="mt-auto flex items-center justify-center p-3 rounded-xl bg-slate-100 dark:bg-slate-800 hover:ring-2 ring-blue-500 transition-all duration-300">
                <span id="theme-toggle-light-icon" class="hidden dark:block text-yellow-400">☀️ Light Mode</span>
                <span id="theme-toggle-dark-icon" class="block dark:hidden text-slate-700">🌙 Dark Mode</span>
            </button>
        </aside>

        <main class="ml-64 p-10 w-full">
          @yield('content')
        </main>
    </div>

    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');

        // Cek preferensi user sebelumnya
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        themeToggleBtn.addEventListener('click', function() {
            // Toggle class dark di elemen <html>
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        });
    </script>
</body>
</html>