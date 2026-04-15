<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ImportSiswaCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:import-siswa {file=C:\\Gawe\\akunsiswa.csv}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all siswa records and import new ones from CSV';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = $this->argument('file');

        if (!file_exists($filePath)) {
            $this->error("File not found: {$filePath}");
            return 1;
        }

        // Delete existing siswa and their related data
        $this->info("Deleting all existing 'siswa' accounts...");
        DB::beginTransaction();
        try {
            // Because reading_history and favorites have foreign key 'user_id', cascading should handle it or we use delete
            $deleted = User::where('role', 'siswa')->delete();
            DB::commit();
            $this->info("Deleted {$deleted} 'siswa' accounts.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Failed to delete accounts: " . $e->getMessage());
            return 1;
        }

        // Read CSV
        $this->info("Importing from {$filePath}...");
        $file = fopen($filePath, 'r');
        
        // Skip header
        // Header looks like: username,password,nama,nis,email,role
        $header = fgetcsv($file);

        $count = 0;
        
        while (($row = fgetcsv($file)) !== false) {
            if (count($row) < 6) continue;

            $nama     = trim($row[2]);
            $email    = trim($row[4]);
            $password = trim($row[1]);
            $nis      = trim($row[3]);
            $role     = strtolower(trim($row[5]));

            if (empty($email) || empty($password) || empty($nama)) {
                $this->warn("Skipping row due to missing essential info: " . implode(',', $row));
                continue;
            }

            User::create([
                'name'     => $nama,
                'email'    => $email,
                'password' => Hash::make($password),
                'nis'      => $nis,
                'role'     => $role,
            ]);
            $count++;
        }
        
        fclose($file);

        $this->info("Successfully imported {$count} new 'siswa' accounts.");
        return 0;
    }
}
