<?php

use App\Models\Book;
use App\Models\Category;
use App\Models\MediaType;
use App\Models\Tag;
use function Pest\Laravel\assertDatabaseHas;

it('peut créer un livre', function () {
    Book::factory()->create([
        'designation' => 'Laravel pour tous',
        'prix' => 29.99,
    ]);

    assertDatabaseHas('books', [
        'designation' => 'Laravel pour tous',
        'prix' => 29.99,
    ]);
});

it('appartient à plusieurs catégories et à un type media', function () {
    $category = Category::factory()->create();
    $mediaType = MediaType::factory()->create();
    $book = Book::factory()->create([
        'media_type_id' => $mediaType->id,
    ]);

    $book->categories()->attach($category);

    expect($book->fresh()->categories->first())->toBeInstanceOf(Category::class)
        ->and($book->fresh()->mediaType)->toBeInstanceOf(MediaType::class);
});

it('peut avoir plusieurs tags', function () {
    $book = Book::factory()->create();
    $tags = Tag::factory(3)->create();

    $book->tags()->attach($tags->pluck('id'));

    expect($book->fresh()->tags)->toHaveCount(3);
});
