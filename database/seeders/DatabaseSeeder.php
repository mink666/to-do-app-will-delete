<?php
// filepath: c:\Users\DELL\example-app\database\seeders\DatabaseSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Ensure you are not passing an integer where an array is expected
        Task::factory()->count(10)->create();
    }
}
