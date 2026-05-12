<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'Bestseller',    'slug' => 'bestseller',    'color' => '#EF4444'],
            ['name' => 'Nouveau',       'slug' => 'nouveau',       'color' => '#10B981'],
            ['name' => 'Classique',     'slug' => 'classique',     'color' => '#8B5CF6'],
            ['name' => 'Recommandé',    'slug' => 'recommande',    'color' => '#F59E0B'],
            ['name' => 'Gratuit',       'slug' => 'gratuit',       'color' => '#3B82F6'],
            ['name' => 'Exclusif',      'slug' => 'exclusif',      'color' => '#EC4899'],
            ['name' => 'En vedette',    'slug' => 'en-vedette',    'color' => '#F97316'],
            ['name' => 'Prix réduit',   'slug' => 'prix-reduit',   'color' => '#14B8A6'],
            ['name' => 'Pour enfants',  'slug' => 'pour-enfants',  'color' => '#84CC16'],
            ['name' => 'Académique',    'slug' => 'academique',    'color' => '#6366F1'],
            ['name' => 'Biographie',    'slug' => 'biographie',    'color' => '#0EA5E9'],
            ['name' => 'Fiction',       'slug' => 'fiction',       'color' => '#A78BFA'],
            ['name' => 'Non-fiction',   'slug' => 'non-fiction',   'color' => '#64748B'],
        ];

        foreach ($tags as $tag) {
            Tag::firstOrCreate(['slug' => $tag['slug']], $tag);
        }
    }
}
