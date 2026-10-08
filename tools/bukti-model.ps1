# Bukti S1 - Hasil eksekusi pembuatan model di terminal.
# Menjalankan `php artisan make:model <Nama> --force` untuk 6 model,
# lalu mengembalikan isi asli tiap file dari git agar tidak ada kode yang hilang.
#
# Pakai:  powershell -NoExit -ExecutionPolicy Bypass -File tools\bukti-model.ps1

$ErrorActionPreference = 'Stop'
Push-Location (Split-Path $PSScriptRoot -Parent)

Write-Host "Working directory: $PWD" -ForegroundColor DarkGray
Write-Host ""

$models = 'Poli', 'JadwalPeriksa', 'DaftarPoli', 'Periksa', 'Obat', 'DetailPeriksa'

try {
    foreach ($m in $models) {
        php artisan make:model $m --force
        if ($LASTEXITCODE -ne 0) { throw "make:model $m gagal (exit code $LASTEXITCODE)" }
    }
}
finally {
    Write-Host ""
    Write-Host "--- restorasi isi asli dari git ---" -ForegroundColor Yellow
    git checkout -- app/Models

    Write-Host "--- git status ---" -ForegroundColor Yellow
    $st = git status --short
    if ($st) { $st } else { Write-Host "(tidak ada perubahan - model kembali utuh)" -ForegroundColor Green }
}

Write-Host ""
Write-Host "Selesai. Tekan Enter untuk menutup." -ForegroundColor Cyan
Read-Host | Out-Null
Pop-Location
