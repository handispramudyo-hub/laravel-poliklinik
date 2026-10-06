<x-layouts.guest title="Login">

    <div class="w-full max-w-md">

        {{-- Card --}}
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            {{-- Brand header --}}
            <div class="px-8 pt-9 pb-7 text-center"
                style="background:linear-gradient(135deg,#1e2d6b 0%,#2d4499 100%);">
                <div class="mx-auto mb-4 w-16 h-16 rounded-2xl bg-white/15 border border-white/25 flex items-center justify-center">
                    <i class="fas fa-house-medical text-white text-2xl"></i>
                </div>
                <h1 class="brand-serif text-white text-4xl leading-none">Poliklinik</h1>
                <p class="text-white/70 text-sm mt-2">Sistem Informasi Poliklinik Terpadu</p>
            </div>

            <div class="px-8 py-8">

                @if (session('success'))
                    <div class="alert alert-success mb-4 rounded-xl text-sm">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <h2 class="text-xl font-bold text-slate-800">Selamat Datang</h2>
                <p class="text-sm text-slate-500 mt-1 mb-6">Silakan masuk menggunakan akun Anda</p>

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-slate-700" for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            placeholder="nama@poliklinik.test" autocomplete="username"
                            class="input input-bordered w-full rounded-xl"
                            style="background:#f8fafc;">
                        @error('email')
                            <p class="text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-slate-700" for="password">Password</label>
                        <input id="password" type="password" name="password"
                            placeholder="••••••••" autocomplete="current-password"
                            class="input input-bordered w-full rounded-xl"
                            style="background:#f8fafc;">
                        @error('password')
                            <p class="text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn-primary-gradient">
                        <i class="fas fa-right-to-bracket"></i>
                        Masuk
                    </button>
                </form>

                <div class="divider text-xs text-slate-400">ATAU</div>

                <p class="text-center text-sm text-slate-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-bold text-indigo-700 hover:underline">
                        Daftar sebagai Pasien
                    </a>
                </p>

            </div>
        </div>

        {{-- Akun demo --}}
        <div class="mt-5 rounded-xl bg-black/25 backdrop-blur px-5 py-4 text-white text-xs">
            <p class="font-bold uppercase tracking-widest text-white/60 mb-2">Akun Demo</p>
            <div class="space-y-1">
                <p><span class="inline-block w-16 text-white/70">Admin</span> admin@gmail.com / admin</p>
                <p><span class="inline-block w-16 text-white/70">Dokter</span> dokter@gmail.com / dokter</p>
                <p><span class="inline-block w-16 text-white/70">Pasien</span> pasien@gmail.com / pasien</p>
            </div>
        </div>

    </div>

</x-layouts.guest>
