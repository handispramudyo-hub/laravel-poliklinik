<x-layouts.guest title="Register Pasien">

    <div class="w-full max-w-xl">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            {{-- Brand header --}}
            <div class="px-8 pt-8 pb-6 text-center"
                style="background:linear-gradient(135deg,#1e2d6b 0%,#2d4499 100%);">
                <div class="mx-auto mb-3 w-14 h-14 rounded-2xl bg-white/15 border border-white/25 flex items-center justify-center">
                    <i class="fas fa-user-plus text-white text-xl"></i>
                </div>
                <h1 class="brand-serif text-white text-3xl leading-none">Daftar Pasien</h1>
                <p class="text-white/70 text-sm mt-2">Nomor rekam medis dibuat otomatis</p>
            </div>

            <div class="px-8 py-7">

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-2 sm:col-span-2">
                            <label class="text-sm font-semibold text-slate-700" for="nama">Nama Lengkap</label>
                            <input id="nama" type="text" name="nama" value="{{ old('nama') }}"
                                placeholder="Nama lengkap" autocomplete="name"
                                class="input input-bordered w-full rounded-xl" style="background:#f8fafc;">
                            @error('nama')
                                <p class="text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2 sm:col-span-2">
                            <label class="text-sm font-semibold text-slate-700" for="alamat">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="2" placeholder="Alamat lengkap"
                                class="textarea textarea-bordered w-full rounded-xl" style="background:#f8fafc;">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <p class="text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700" for="no_ktp">No. KTP</label>
                            <input id="no_ktp" type="text" name="no_ktp" value="{{ old('no_ktp') }}"
                                inputmode="numeric" placeholder="16 digit NIK"
                                class="input input-bordered w-full rounded-xl" style="background:#f8fafc;">
                            @error('no_ktp')
                                <p class="text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700" for="no_hp">No. HP</label>
                            <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp') }}"
                                inputmode="numeric" placeholder="08xxxxxxxxxx"
                                class="input input-bordered w-full rounded-xl" style="background:#f8fafc;">
                            @error('no_hp')
                                <p class="text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2 sm:col-span-2">
                            <label class="text-sm font-semibold text-slate-700" for="email">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                placeholder="nama@email.com" autocomplete="email"
                                class="input input-bordered w-full rounded-xl" style="background:#f8fafc;">
                            @error('email')
                                <p class="text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700" for="password">Password</label>
                            <input id="password" type="password" name="password"
                                placeholder="Min. 6 karakter" autocomplete="new-password"
                                class="input input-bordered w-full rounded-xl" style="background:#f8fafc;">
                            @error('password')
                                <p class="text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700" for="password_confirmation">Konfirmasi
                                Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                placeholder="Ulangi password" autocomplete="new-password"
                                class="input input-bordered w-full rounded-xl" style="background:#f8fafc;">
                        </div>
                    </div>

                    <button type="submit" class="btn-primary-gradient" style="margin-top:6px;">
                        <i class="fas fa-user-plus"></i>
                        Daftar Sekarang
                    </button>
                </form>

                <div class="divider text-xs text-slate-400">ATAU</div>

                <p class="text-center text-sm text-slate-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-bold text-indigo-700 hover:underline">
                        Masuk di sini
                    </a>
                </p>

            </div>
        </div>

    </div>

</x-layouts.guest>
