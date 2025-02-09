<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Analysis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;


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
        Schema::defaultStringLength(191);

        // **Prevent execution during migrations**
        if (App::runningInConsole() && $this->app->runningUnitTests() === false) {
            return;
        }
        
        DB::listen(function ($query) {
            $sql = strtolower($query->sql);

            // Avoid processing queries related to the `analysis` table to prevent recursion
            if (strpos($sql, 'analysis') !== false || strpos($sql, 'telescope') !== false) {
                return;
            }
        
            // Extract table names (FROM, JOIN, UPDATE, INSERT, DELETE)
            preg_match_all('/\bfrom\s+`?(\w+)`?\b|\bjoin\s+`?(\w+)`?\b|\bupdate\s+`?(\w+)`?\b|\binto\s+`?(\w+)`?\b|\bdelete\s+from\s+`?(\w+)`?\b/i', $sql, $matches);
            
            $fromTables = array_filter($matches[1]); // FROM clause tables
            $joinTables = array_filter($matches[2]); // JOIN clause tables
            $updateTables = array_filter($matches[3]); // UPDATE clause tables
            $insertTables = array_filter($matches[4]); // INSERT INTO tables
            $deleteTables = array_filter($matches[5]); // DELETE FROM tables
            $allTables = array_merge($fromTables, $joinTables, $updateTables, $insertTables, $deleteTables);
        
            foreach ($allTables as $table) {
                // Find existing record or create a new one
                $analysis = Analysis::firstOrNew(['table_name' => $table], [
                    'count' => 0,
                    'read' => 0,
                    'write' => 0,
                    'join' => 0,
                    'sql' => '',
                ]);
                // Increment counters
                $analysis->count = ($analysis->count ?? 0) + 1;
                if (in_array($table, $fromTables) && strpos($sql, 'select') !== false) {
                    $analysis->read = ($analysis->read ?? 0) + 1;
                } elseif (in_array($table, array_merge($updateTables, $insertTables, $deleteTables))) {
                    $analysis->write = ($analysis->write ?? 0) + 1; 
                }
                if (in_array($table, $joinTables)) { $analysis->join = ($analysis->join ?? 0) + 1; }
                // Save updated stats
                $analysis->sql = $sql;
                $analysis->save();
                Log::info($sql);
            }
        });

    }
}
