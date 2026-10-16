<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Lomba</title>
    <!-- Memanggil Tailwind CSS lewat CDN agar tampilan rapi -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Form Pendaftaran Lomba</h2>
        
        <form action="#" method="POST">
            <!-- @csrf sangat penting di Laravel untuk keamanan form -->
            @csrf
            
            <!-- Input Nama -->
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Input Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" placeholder="contoh@email.com" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Asal Instansi -->
            <div class="mb-4">
                <label for="instansi" class="block text-sm font-medium text-gray-700">Asal Sekolah / Kampus</label>
                <input type="text" id="instansi" name="instansi" placeholder="Asal sekolah atau kampus" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Pilihan Kategori Lomba -->
            <div class="mb-6">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori Lomba</label>
                <select id="kategori" name="kategori" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="" disabled selected>Pilih kategori lomba</option>
                    <option value="web_design">Web Design</option>
                    <option value="ui_ux">UI/UX Design</option>
                    <option value="programming">Competitive Programming</option>
                </select>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                Daftar Sekarang
            </button>
        </form>
    </div>

</body>
</html>