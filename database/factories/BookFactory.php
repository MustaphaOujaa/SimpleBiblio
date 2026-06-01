<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
{
    $booksList = \Database\Seeders\LibrarySeeder::$books;
    $book = $this->faker->randomElement($booksList);

    $id = $this->faker->unique()->numberBetween(1, 1000);

    $title = $book['designation'];
    $titleAr = $book['designation_ar'] ?? null;
    $titleFr = $book['designation_fr'] ?? null;

    // To prevent unique constraint violation on designation when generating many books
    if ($id > 20) {
        $title .= ' (' . $id . ')';
        if ($titleAr) $titleAr .= ' (' . $id . ')';
        if ($titleFr) $titleFr .= ' (' . $id . ')';
    }

    return [
        'designation' => $title,
        'designation_ar' => $titleAr,
        'designation_fr' => $titleFr,
        'description' => $book['description'],
        'description_ar' => $book['description_ar'] ?? null,
        'description_fr' => $book['description_fr'] ?? null,
        'type' => $book['type'] ?? 'Texte',
        'langue' => $book['langue'] ?? 'Multi',
        'editeur' => $book['editeur'] ?? 'HarperOne',
        'categorie' => $book['categorie'] ?? 'Littérature',
        'prix' => $book['prix'] ?? $this->faker->randomFloat(2, 50, 900),
        'auteur' => $book['auteur'],
        'annee' => $book['annee'] ?? 2020,
        'cover' => $book['cover'],
    ];
}

}
