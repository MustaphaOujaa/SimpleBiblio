<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Littérature',       'slug' => 'litterature',       'description' => 'Romans, nouvelles, poésie et théâtre.',           'color' => '#8B5CF6'],
            ['name' => 'Sciences',           'slug' => 'sciences',           'description' => 'Physique, chimie, biologie et mathématiques.',      'color' => '#3B82F6'],
            ['name' => 'Histoire',           'slug' => 'histoire',           'description' => 'Histoire mondiale, régionale et biographies.',      'color' => '#F59E0B'],
            ['name' => 'Informatique',       'slug' => 'informatique',       'description' => 'Programmation, réseau et intelligence artificielle.','color' => '#10B981'],
            ['name' => 'Philosophie',        'slug' => 'philosophie',        'description' => 'Pensée critique, éthique et épistémologie.',        'color' => '#6366F1'],
            ['name' => 'Art & Design',       'slug' => 'art-design',         'description' => 'Beaux-arts, architecture et design graphique.',     'color' => '#EC4899'],
            ['name' => 'Économie',           'slug' => 'economie',           'description' => 'Microéconomie, finance et commerce.',               'color' => '#14B8A6'],
            ['name' => 'Développement Personnel','slug' => 'dev-personnel',  'description' => 'Motivation, productivité et bien-être.',           'color' => '#F97316'],
            ['name' => 'Langues',            'slug' => 'langues',            'description' => 'Apprentissage des langues étrangères.',             'color' => '#0EA5E9'],
            ['name' => 'Enfants & Jeunesse', 'slug' => 'enfants-jeunesse',   'description' => 'Livres pour enfants et adolescents.',              'color' => '#84CC16'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
