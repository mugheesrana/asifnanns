<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

Route::prefix('admin')->group(function () {

    // App Info Page
    Route::get('/app-info', function () {
        return view('admin.app-info');
    })->name('admin.app-info');

    // Database Backup
    Route::get('/backup-database', function () {
        $fileName = 'db_backup_' . date('Y_m_d_H_i_s') . '.sql';
        $filePath = storage_path('app/backups/' . $fileName);

        // make sure backups dir exists
        if (!file_exists(storage_path('app/backups'))) {
            mkdir(storage_path('app/backups'), 0777, true);
        }

        // run mysqldump command
        $command = sprintf(
            'mysqldump -u%s -p%s %s > %s',
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_DATABASE'),
            $filePath
        );
        exec($command);

        // return file as download
        return response()->download($filePath)->deleteFileAfterSend(true);
    })->name('admin.backup.db');

    // Clear Logs
    Route::get('/clear-logs', function () {
        $logFile = storage_path('logs/laravel.log');
        if (file_exists($logFile)) {
            file_put_contents($logFile, ''); // empty log file
        }
        return redirect()->back()->with('success', 'Logs cleared!');
    })->name('admin.logs.clear');

    Route::get('/cache-clear', function () {
        Artisan::call('cache:clear');
        return redirect()->back()->with('success', 'Application cache cleared!');
    })->name('admin.cache');

    Route::get('/config-clear', function () {
        Artisan::call('config:clear');
        return redirect()->back()->with('success', 'Configuration cache cleared!');
    })->name('admin.config');

    Route::get('/route-clear', function () {
        Artisan::call('route:clear');
        return redirect()->back()->with('success', 'Route cache cleared!');
    })->name('admin.route');

    Route::get('/view-clear', function () {
        Artisan::call('view:clear');
        return redirect()->back()->with('success', 'View cache cleared!');
    })->name('admin.view');

    Route::get('/optimize-clear', function () {
        Artisan::call('optimize:clear');
        return redirect()->back()->with('success', 'Optimized files cleared!');
    })->name('admin.optimize');
    Route::get('/clear-all', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');

        // Also clear logs if needed
        $logFile = storage_path('logs/laravel.log');
        if (file_exists($logFile)) {
            file_put_contents($logFile, '');
        }

        return redirect()->back()->with('success', 'All caches, logs, and optimizations cleared successfully!');
    })->name('admin.clear.all');
});
