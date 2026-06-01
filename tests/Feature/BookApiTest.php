<?php

use App\Models\Book;
use function Pest\Laravel\getJson;

test('retourne la liste des livres via l API', function () {
    Book::factory()
        ->count(3)
        ->sequence(fn ($sequence) => ['designation' => 'API Livre '.$sequence->index])
        ->create();

    getJson('/api/books')
        ->assertOk()
        ->assertJsonCount(3, 'livres');
});
