<?php

namespace Database\Seeders;

use App\Models\MediaType;
use Illuminate\Database\Seeder;

class MediaTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [
                'name'        => 'Texte',
                'slug'        => 'texte',
                'icon'        => 'document-text',
                'description' => 'Livre au format texte standard.',
            ],
            [
                'name'        => 'Audio',
                'slug'        => 'audio',
                'icon'        => 'speaker-wave',
                'description' => 'Livre audio (audiobook) à écouter.',
            ],
            [
                'name'        => 'PDF',
                'slug'        => 'pdf',
                'icon'        => 'document',
                'description' => 'Document au format PDF.',
            ],
            [
                'name'        => 'EPUB',
                'slug'        => 'epub',
                'icon'        => 'book-open',
                'description' => 'Livre numérique au format EPUB.',
            ],
            [
                'name'        => 'Vidéo',
                'slug'        => 'video',
                'icon'        => 'video-camera',
                'description' => 'Contenu en format vidéo.',
            ],
            [
                'name'        => 'Interactif',
                'slug'        => 'interactif',
                'icon'        => 'cursor-arrow-rays',
                'description' => 'Contenu interactif ou e-learning.',
            ],
            [
                'name'        => 'Magazine',
                'slug'        => 'magazine',
                'icon'        => 'newspaper',
                'description' => 'Revue ou magazine numérique.',
            ],
        ];

        foreach ($types as $type) {
            MediaType::firstOrCreate(['slug' => $type['slug']], $type);
        }
    }
}
