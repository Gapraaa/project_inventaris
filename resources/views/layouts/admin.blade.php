<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Admin Dashboard</title>
    <script>
        // Fungsi untuk toggle dropdown
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="flex min-h-screen bg-gray-100">

    <aside class="w-64 bg-blue-700 text-white">
        <div class="flex flex-col h-full">
            <div class="p-4 text-lg font-bold text-center border-b border-blue-500">Admin Dashboard</div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="/admin/dashboard" class="flex items-center px-4 py-2 rounded hover:bg-blue-600">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Home
                </a>
                <a href="/admin/inventaris" class="flex items-center px-4 py-2 rounded hover:bg-blue-600">
                    <i class="fas fa-cogs mr-3"></i>
                    Manage Inventaris
                </a>

                <!-- Dropdown Menu for Manage Peminjaman -->
                <div class="relative">
                    <button onclick="toggleDropdown()"
                        class="flex items-center px-4 py-2 rounded hover:bg-blue-600 w-full text-left">
                        <i class="fas fa-box-open mr-3"></i>
                        Manage Peminjaman
                    </button>
                    <!-- Dropdown content -->
                    <div id="dropdownMenu"
                    class="absolute left-0 hidden mt-2 space-y-2 bg-blue-700 text-white shadow-md rounded transition-all duration-200 ease-in-out">
                    <a href="/admin/peminjaman"
                        class="flex items-center px-4 py-2 rounded hover:bg-blue-600">
                        <i class="fas fa-history mr-3"></i>
                        History Peminjaman
                    </a>
                        <a href="/admin/peminjaman/proses"
                            class="flex items-center px-4 py-2 rounded hover:bg-blue-600">
                            <i class="fas fa-clock mr-3"></i>
                            Pending Peminjaman
                        </a>
                    </div>
                </div>

                <a href="/admin/reports" class="flex items-center px-4 py-2 rounded hover:bg-blue-600">
                    <i class="fas fa-chart-line mr-3"></i>
                    Reports
                </a>
            </nav>
            <div class="p-4 border-t border-blue-500">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full px-4 py-2 font-semibold text-center bg-red-500 rounded hover:bg-red-600">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1">
        <!-- Header -->
        <header class="flex items-center justify-between px-6 py-4 bg-white shadow">
            <h1 class="text-xl font-semibold text-gray-700">@yield('header-title', 'Dashboard')</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Welcome, {{ Auth::user()->name }}</span>
                <img src="https://via.placeholder.com/40" alt="Admin Avatar" class="w-10 h-10 rounded-full">
            </div>
        </header>

        <!-- Content -->
        <section class="p-6">
            @yield('content')
        </section>
    </main>
</body>

</html>
