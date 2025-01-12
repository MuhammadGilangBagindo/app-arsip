<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\ArsipDokumen; // Import model ArsipDokumen

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Ambil data untuk $labels dan $data
        $dokumenPerJenis = ArsipDokumen::select('jenis_dokumen', DB::raw('count(*) as total'))
            ->groupBy('jenis_dokumen')
            ->get();

        $labels = $dokumenPerJenis->pluck('jenis_dokumen');
        $data = $dokumenPerJenis->pluck('total');

        // Share data $labels dan $data ke semua view
        view()->share('labels', $labels);
        view()->share('data', $data);
    }
}
