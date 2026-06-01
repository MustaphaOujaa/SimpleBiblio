<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Book;
use Illuminate\Support\Facades\DB;

try {
    DB::table('books')->delete();
    
    $books = \Database\Seeders\LibrarySeeder::$books;
 
    foreach ($books as $data) {
        Book::create($data);
    }
    
    echo "Seed completed successfully. Added " . count($books) . " multilingual books.\n";

} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
