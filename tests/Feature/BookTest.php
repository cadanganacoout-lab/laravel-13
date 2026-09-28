<?php

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

$dataValid = [
    'title' => 'Laravel untuk Pemula',
    'writer' => 'Budi Santoso',
    'publication_year' => 2024,
    'description' => 'Belajar Laravel dari nol.',
];

it('menampilkan daftar buku', function () {
    Book::factory()->count(3)->create();

    $this->get(route('book.index'))
        ->assertOk()
        ->assertViewHas('book');
});

it('dapat menambah buku', function () use ($dataValid) {
    $this->post(route('book.store'), $dataValid)
        ->assertRedirect(route('book.index'));

    $this->assertDatabaseHas('books', ['title' => 'Laravel untuk Pemula']);
});

it('menolak data tidak valid saat menambah', function () {
    $this->post(route('book.store'), [])
        ->assertSessionHasErrors(['title', 'writer', 'publication_year']);
});

it('menampilkan detail buku', function () {
    $book = Book::factory()->create();

    $this->get(route('book.show', $book))
        ->assertOk()
        ->assertSee($book->title);
});

it('dapat memperbarui buku', function () use ($dataValid) {
    $book = Book::factory()->create();

    $this->put(route('book.update', $book), $dataValid)
        ->assertRedirect(route('book.index'));

    $this->assertDatabaseHas('books', [
        'id' => $book->id,
        'title' => 'Laravel untuk Pemula',
    ]);
});

it('dapat menghapus buku', function () {
    $book = Book::factory()->create();

    $this->delete(route('book.destroy', $book))
        ->assertRedirect(route('book.index'));

    $this->assertDatabaseMissing('books', ['id' => $book->id]);
});
