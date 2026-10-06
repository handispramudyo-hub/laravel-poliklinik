<x-layouts.app title="Admin Dashboard">

    <div class="space-y-6">

        <div class="rounded-2xl bg-base-100 shadow-sm border border-base-300 p-6">
            <h1 class="text-2xl font-bold">Halo Selamat Datang Admin</h1>
            <p class="text-base-content/60 text-sm mt-1">
                Anda masuk sebagai <span class="font-semibold">{{ auth()->user()->nama }}</span>
                dengan role <span class="badge badge-primary badge-sm uppercase">admin</span>
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="rounded-2xl bg-base-100 border border-base-300 p-5">
                <p class="text-xs uppercase tracking-widest text-base-content/50">User Terdaftar</p>
                <p class="text-3xl font-bold mt-1">{{ \App\Models\User::count() }}</p>
            </div>
            <div class="rounded-2xl bg-base-100 border border-base-300 p-5">
                <p class="text-xs uppercase tracking-widest text-base-content/50">Jumlah Poli</p>
                <p class="text-3xl font-bold mt-1">{{ \App\Models\Poli::count() }}</p>
            </div>
            <div class="rounded-2xl bg-base-100 border border-base-300 p-5">
                <p class="text-xs uppercase tracking-widest text-base-content/50">Data Obat</p>
                <p class="text-3xl font-bold mt-1">{{ \App\Models\Obat::count() }}</p>
            </div>
        </div>

    </div>

</x-layouts.app>
