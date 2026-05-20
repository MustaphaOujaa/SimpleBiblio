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
    // Array of varied book cover keywords to get more relevant images
    $keywords = ['book', 'library', 'novel', 'study', 'history', 'science', 'art'];
    $keyword = $this->faker->randomElement($keywords);
    $id = $this->faker->unique()->numberBetween(1, 1000);

    return [
        'designation' => $this->faker->unique()->sentence(3),
        'description' => $this->faker->paragraph(5),
        'type' => $this->faker->randomElement(['Texte', 'Image', 'Audio', 'Video']),
        'langue' => $this->faker->randomElement(['Arabe', 'Francais', 'Anglais', 'Espagnol', 'Allemand']),
        'editeur' => $this->faker->company(),
        'categorie' => $this->faker->randomElement(['Classique', 'Science Fiction', 'Fantastique', 'Horreur', 'Romance', 'Mystere']),
        'prix' => $this->faker->randomFloat(2, 50, 900),
        'auteur' => $this->faker->name(),
        'annee' => $this->faker->year(),
        // Store a unique unsplash ID to simulate different covers
        'cover' => 'https://picsum.photos/seed/' . $id . '/400/600',
    ];
}

}
