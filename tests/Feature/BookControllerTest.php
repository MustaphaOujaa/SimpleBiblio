<?php

use App\Mail\BookDetailsMail;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

beforeEach(function () {
    $this->user = User::factory()->create();
});

function validBookPayload(array $overrides = []): array
{
    return array_merge([
        'designation' => 'Test Book Pest',
        'auteur' => 'Auteur Test',
        'editeur' => 'Editeur Test',
        'prix' => 25.50,
        'type' => 'Texte',
        'description' => 'Description de test avec Pest',
        'cover' => fakeJpegUpload(),
    ], $overrides);
}

function fakeJpegUpload(): UploadedFile
{
    $path = tempnam(sys_get_temp_dir(), 'cover_');
    file_put_contents($path, base64_decode('/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAP//////////////////////////////////////////////////////////////////////////////////////2wBDAf//////////////////////////////////////////////////////////////////////////////////////wAARCAABAAEDASIAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAX/xAAUEAEAAAAAAAAAAAAAAAAAAAAA/9oADAMBAAIQAxAAAAH/xAAUEAEAAAAAAAAAAAAAAAAAAAAA/9oACAEBAAEFAqf/xAAUEQEAAAAAAAAAAAAAAAAAAAAA/9oACAEDAQE/ASP/xAAUEQEAAAAAAAAAAAAAAAAAAAAA/9oACAECAQE/ASP/xAAUEAEAAAAAAAAAAAAAAAAAAAAA/9oACAEBAAY/Ap//xAAUEAEAAAAAAAAAAAAAAAAAAAAA/9oACAEBAAE/IV//2gAMAwEAAgADAAAAEP/EABQRAQAAAAAAAAAAAAAAAAAAABD/2gAIAQMBAT8QH//EABQRAQAAAAAAAAAAAAAAAAAAABD/2gAIAQIBAT8QH//EABQQAQAAAAAAAAAAAAAAAAAAABD/2gAIAQEAAT8QH//Z'));

    return new UploadedFile($path, 'couverture.jpg', 'image/jpeg', null, true);
}

it('un utilisateur authentifié peut voir la liste des livres', function () {
    actingAs($this->user);
    Book::factory()
        ->count(5)
        ->sequence(fn ($sequence) => ['designation' => 'Livre '.$sequence->index])
        ->create();

    get(route('bookIndex'))
        ->assertStatus(200)
        ->assertViewIs('book.index');
});

it('peut créer un nouveau livre', function () {
    actingAs($this->user);

    post(route('book.store'), validBookPayload())
        ->assertRedirect(route('bookIndex'));

    assertDatabaseHas('books', ['designation' => 'Test Book Pest']);

    $book = Book::where('designation', 'Test Book Pest')->first();
    @unlink(public_path('covers/'.$book->cover));
});

it('valide les champs obligatoires lors de la création', function () {
    actingAs($this->user);

    post(route('book.store'), [])
        ->assertSessionHasErrors(['designation', 'auteur', 'prix', 'type', 'cover']);
});

it('peut uploader une image de couverture', function () {
    actingAs($this->user);

    post(route('book.store'), validBookPayload([
        'designation' => 'Livre avec image',
    ]));

    $book = Book::latest()->first();

    expect($book->cover)->not->toBeNull();
    $this->assertFileExists(public_path('covers/'.$book->cover));

    @unlink(public_path('covers/'.$book->cover));
});

it('peut modifier un livre', function () {
    actingAs($this->user);
    $book = Book::factory()->create(['designation' => 'Ancien titre']);

    put(route('book.update', $book), validBookPayload([
        'designation' => 'Titre modifié',
        'cover' => null,
    ]))->assertRedirect(route('bookIndex'));

    assertDatabaseHas('books', ['id' => $book->id, 'designation' => 'Titre modifié']);
});

it('peut supprimer un livre', function () {
    actingAs($this->user);
    $book = Book::factory()->create(['cover' => 'no_cover.jpg']);

    delete(route('destroyBook', $book))
        ->assertRedirect(route('bookIndex'));

    assertDatabaseMissing('books', ['id' => $book->id]);
});

it('protège l’envoi email pour les invités', function () {
    $book = Book::factory()->create();

    post(route('book.send_email', $book))
        ->assertRedirect(route('login'));
});

it('envoie un email avec les détails du livre', function () {
    actingAs($this->user);
    Mail::fake();
    $book = Book::factory()->create();

    post(route('book.send_email', $book))
        ->assertRedirect()
        ->assertSessionHas('success');

    Mail::assertSent(BookDetailsMail::class, function (BookDetailsMail $mail) use ($book) {
        return $mail->hasTo($this->user->email)
            && $mail->book->id === $book->id;
    });
});
