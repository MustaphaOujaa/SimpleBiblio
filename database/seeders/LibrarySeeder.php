<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrarySeeder extends Seeder
{
    public function run(): void
    {
        // Delete instead of truncate to avoid foreign key issues
        DB::table('books')->delete();

        $books = [
            [
                'designation' => 'The Alchemist',
                'designation_ar' => 'الخيميائي',
                'designation_fr' => 'L\'Alchimiste',
                'auteur' => 'Paulo Coelho',
                'description' => 'A magical story of Santiago, an Andalusian shepherd boy who yearns to travel in search of a worldly treasure.',
                'description_ar' => 'رواية فلسفية تحكي قصة الراعي الشاب سانتياغو ورحلته للبحث عن كنز مدفون بجانب الأهرامات، تكتشف خلالها قوة الأحلام والإرادة.',
                'description_fr' => 'Le récit d\'un voyage initiatique d\'un jeune berger andalou à la recherche d\'un trésor caché au pied des Pyramides.',
                'prix' => 120.00,
                'cover' => 'https://m.media-amazon.com/images/I/51Z9nQ4mYNL.jpg',
                'categorie' => 'Fiction',
                'editeur' => 'HarperOne',
                'annee' => 1988,
                'type' => 'Texte',
                'langue' => 'Multi'
            ],
            [
                'designation' => 'Atomic Habits',
                'designation_ar' => 'عادات ذرية',
                'designation_fr' => 'Des Habitudes Atomiques',
                'auteur' => 'James Clear',
                'description' => 'A proven framework for improving every day. James Clear reveals practical strategies to form good habits and break bad ones.',
                'description_ar' => 'يقدم جيمس كلير دليلاً عملياً لبناء عادات جيدة والتخلص من السيئة، معتمداً على العلم والمنطق لتغيير حياتك تدريجياً.',
                'description_fr' => 'Un guide pratique pour transformer votre vie grâce à de petits changements quotidiens.',
                'prix' => 150.00,
                'cover' => 'https://m.media-amazon.com/images/I/91bYsX41hOL.jpg',
                'categorie' => 'Self-Help',
                'editeur' => 'Penguin',
                'annee' => 2018,
                'type' => 'Texte',
                'langue' => 'Multi'
            ],
            [
                'designation' => '1984',
                'designation_ar' => '١٩٨٤',
                'designation_fr' => '1984',
                'auteur' => 'George Orwell',
                'description' => 'A dystopian social science fiction novel and cautionary tale about ubiquitous government surveillance and propaganda.',
                'description_ar' => 'تحفة أدبية تحذر من طغيان الأنظمة الاستبدادية، حيث يراقب "الأخ الأكبر" كل شيء حتى أفكار البشر ومشاعرهم.',
                'description_fr' => 'Un classique de la littérature dystopique dépeignant un monde sous surveillance totale.',
                'prix' => 95.00,
                'cover' => 'https://m.media-amazon.com/images/I/71kxa1-qhcL.jpg',
                'categorie' => 'Classic',
                'editeur' => 'Secker',
                'annee' => 1949,
                'type' => 'Texte',
                'langue' => 'Multi'
            ],
            [
                'designation' => 'Sapiens',
                'designation_ar' => 'العاقل',
                'designation_fr' => 'Sapiens',
                'auteur' => 'Yuval Noah Harari',
                'description' => 'A brief history of humankind, exploring how biology and history have defined us since the Stone Age.',
                'description_ar' => 'كتاب يحلل تاريخ البشرية من زاوية علمية وفلسفية، وكيف تطور الإنسان ليسود الكوكب بفضل قدرته على التعاون.',
                'description_fr' => 'Une exploration passionnante de l\'histoire de l\'humanité, des grottes à la conquête de l\'espace.',
                'prix' => 165.00,
                'cover' => 'https://m.media-amazon.com/images/I/713jIoMO3UL.jpg',
                'categorie' => 'History',
                'editeur' => 'Harvill',
                'annee' => 2011,
                'type' => 'Texte',
                'langue' => 'Multi'
            ],
            [
                'designation' => 'Le Petit Prince',
                'designation_ar' => 'الأمير الصغير',
                'designation_fr' => 'Le Petit Prince',
                'auteur' => 'Antoine de Saint-Exupéry',
                'description' => 'The story of a young prince who visits various planets in space, including Earth, and addresses themes of loneliness and friendship.',
                'description_ar' => 'رواية خيالية فلسفية تذكرنا بأن "الأشياء الجوهرية لا تُرى إلا بالقلب"، وهي من أكثر الكتب ترجمة في العالم.',
                'description_fr' => 'Le conte le plus célèbre de la littérature française, une réflexion poétique sur la vie et l\'amour.',
                'prix' => 70.00,
                'cover' => 'https://m.media-amazon.com/images/I/71O979Zf-pL.jpg',
                'categorie' => 'Classic',
                'editeur' => 'Gallimard',
                'annee' => 1943,
                'type' => 'Texte',
                'langue' => 'Multi'
            ],
            [
                'designation' => 'Deep Work',
                'designation_ar' => 'العمل العميق',
                'designation_fr' => 'Deep Work',
                'auteur' => 'Cal Newport',
                'description' => 'Rules for focused success in a distracted world, teaching how to master complicated information.',
                'description_ar' => 'دليل عملي للوصول إلى أقصى درجات التركيز في عالم مليء بالمشتتات الرقمية، مما يسمح بإنتاج أعمال عالية الجودة.',
                'description_fr' => 'Retrouver la concentration dans un monde de distractions numériques pour exceller dans son travail.',
                'prix' => 110.00,
                'cover' => 'https://m.media-amazon.com/images/I/417Pwa87N9L.jpg',
                'categorie' => 'Self-Help',
                'editeur' => 'Grand Central',
                'annee' => 2016,
                'type' => 'Texte',
                'langue' => 'Multi'
            ],
            [
                'designation' => 'The Power of Habit',
                'designation_ar' => 'قوة العادة',
                'designation_fr' => 'Le Pouvoir des Habitudes',
                'auteur' => 'Charles Duhigg',
                'description' => 'A scientific look at why habits exist and how they can be changed to improve our lives and businesses.',
                'description_ar' => 'يستكشف الكتاب الطبيعة العلمية لكيفية عمل العادات وكيف يمكن تغييرها لتحسين الإنتاجية والحياة الشخصية.',
                'description_fr' => 'Une plongée dans la science des habitudes et comment les transformer pour réussir.',
                'prix' => 135.00,
                'cover' => 'https://m.media-amazon.com/images/I/81vS1D4n-0L.jpg',
                'categorie' => 'Psychology',
                'editeur' => 'Random House',
                'annee' => 2012,
                'type' => 'Texte',
                'langue' => 'Multi'
            ],
            [
                'designation' => 'Thinking, Fast and Slow',
                'designation_ar' => 'التفكير بسرعة وببطء',
                'designation_fr' => 'Système 1 / Système 2',
                'auteur' => 'Daniel Kahneman',
                'description' => 'A renowned psychologist explains the two systems that drive the way we think—System 1 is fast; System 2 is slow.',
                'description_ar' => 'يشرح عالم النفس الحائز على نوبل النظامين اللذين يقودان تفكيرنا، وكيف يؤثر كل منهما على قراراتنا اليومية.',
                'description_fr' => 'Les deux systèmes qui dirigent notre pensée : l\'intuition et la réflexion.',
                'prix' => 170.00,
                'cover' => 'https://m.media-amazon.com/images/I/61fRBy7S-RL.jpg',
                'categorie' => 'Psychology',
                'editeur' => 'Farrar',
                'annee' => 2011,
                'type' => 'Texte',
                'langue' => 'Multi'
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
