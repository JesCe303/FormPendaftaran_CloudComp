<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Form pendaftaran kegiatan yang cepat, aman, dan mudah.">
    <title>Daftar Sekarang | {{ config('app.name', 'Open Call') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="page-shell">
        <section class="intro-panel">
            <div class="brand"><span class="brand-mark">✦</span> OPEN CALL</div>
            <div class="intro-content">
                <p class="eyebrow">Pendaftaran dibuka</p>
                <h1>Wujudkan ide<br><span>terbaikmu.</span></h1>
                <p class="intro-copy">Satu langkah kecil untuk kesempatan yang lebih besar. Isi data diri kamu dan bersiap untuk pengalaman yang seru.</p>
                <div class="perks">
                    <div><span class="perk-icon">✓</span><p><strong>Proses mudah</strong><br><small>Daftar dalam waktu singkat</small></p></div>
                    <div><span class="perk-icon">✉</span><p><strong>Konfirmasi email</strong><br><small>Detail pendaftaran langsung terkirim</small></p></div>
                </div>
            </div>
            <p class="copyright">© {{ date('Y') }} Open Call. Semua hak dilindungi.</p>
        </section>

        <section class="form-panel">
            <div class="form-card">
                <div class="form-heading">
                    <p class="eyebrow">Formulir peserta</p>
                    <h2>Yuk, mulai daftar!</h2>
                    <p>Lengkapi data di bawah ini dengan benar.</p>
                </div>

                @if (session('success'))
                    <div class="alert success" role="status"><span>✓</span>{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert error" role="alert">Periksa kembali data yang kamu masukkan.</div>
                @endif

                <form action="{{ route('registration.store') }}" method="POST" id="registration-form">
                    @csrf
                    <div class="field-grid">
                        <div class="field">
                            <label for="name">Nama lengkap <span>*</span></label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Contoh: Jessica Citra" autocomplete="name" required>
                            @error('name')<small class="field-error">{{ $message }}</small>@enderror
                        </div>
                        <div class="field">
                            <label for="email">Alamat email <span>*</span></label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required>
                            @error('email')<small class="field-error">{{ $message }}</small>@enderror
                        </div>
                        <div class="field">
                            <label for="phone">Nomor WhatsApp <span>*</span></label>
                            <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" placeholder="08xx-xxxx-xxxx" autocomplete="tel" required>
                            @error('phone')<small class="field-error">{{ $message }}</small>@enderror
                        </div>
                        <div class="field">
                            <label for="institution">Asal sekolah / kampus <span>*</span></label>
                            <input id="institution" name="institution" type="text" value="{{ old('institution') }}" placeholder="Nama institusi" required>
                            @error('institution')<small class="field-error">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="field">
                        <label for="category">Pilih kategori <span>*</span></label>
                        <select id="category" name="category" required>
                            <option value="" disabled {{ old('category') ? '' : 'selected' }}>Pilih kategori yang sesuai</option>
                            <option value="web_design" @selected(old('category') === 'web_design')>Web Design</option>
                            <option value="ui_ux" @selected(old('category') === 'ui_ux')>UI/UX Design</option>
                            <option value="programming" @selected(old('category') === 'programming')>Competitive Programming</option>
                        </select>
                        @error('category')<small class="field-error">{{ $message }}</small>@enderror
                    </div>
                    <div class="field">
                        <label for="motivation">Ceritakan motivasimu <span>*</span></label>
                        <textarea id="motivation" name="motivation" rows="4" placeholder="Apa yang ingin kamu capai lewat kegiatan ini?" required>{{ old('motivation') }}</textarea>
                        @error('motivation')<small class="field-error">{{ $message }}</small>@enderror
                    </div>
                    <button class="submit-button" type="submit"><span>Daftar sekarang</span><b>→</b></button>
                    <p class="privacy-note">Dengan mendaftar, kamu menyetujui data digunakan untuk keperluan kegiatan.</p>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
