<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Book;
use Illuminate\Support\Facades\DB;

try {
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
            'cover' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=600&h=800&fit=crop',
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
            'cover' => 'https://images.unsplash.com/photo-1589998059171-988d887df646?w=600&h=800&fit=crop',
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
            'cover' => 'https://images.unsplash.com/photo-1541963463532-d68292c34b19?w=600&h=800&fit=crop',
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
            'cover' => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?w=600&h=800&fit=crop',
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
            'cover' => 'https://images.unsplash.com/photo-1506466010722-395aa2bef877?w=600&h=800&fit=crop',
            'categorie' => 'Classic',
            'editeur' => 'Gallimard',
            'annee' => 1943,
            'type' => 'Texte',
            'langue' => 'Multi'
        ],
        [
            'designation' => 'The Power of Habit',
            'designation_ar' => 'قوة العادات',
            'designation_fr' => 'Le Pouvoir des Habitudes',
            'auteur' => 'Charles Duhigg',
            'description' => 'A scientific look at why habits exist and how they can be changed to improve our lives and businesses.',
            'description_ar' => 'يستعرض الكتاب الأسس العلمية لكيفية عمل العادات فالدماغ البشري، وكيف يمكننا استغلال هذه المعرفة لتغيير حياتنا.',
            'description_fr' => 'Comment la science explique nos habitudes et comment nous pouvons les transformer.',
            'prix' => 135.00,
            'cover' => 'https://images.unsplash.com/photo-1531346878377-a5be20888e57?w=600&h=800&fit=crop',
            'categorie' => 'Psychology',
            'editeur' => 'Random House',
            'annee' => 2012,
            'type' => 'Texte',
            'langue' => 'Multi'
        ],
        [
            'designation' => 'Deep Work',
            'designation_ar' => 'العمل العميق',
            'designation_fr' => 'Deep Work',
            'auteur' => 'Cal Newport',
            'description' => 'Rules for focused success in a distracted world, teaching how to master complicated information and produce better results.',
            'description_ar' => 'دليل عملي للوصول إلى أقصى درجات التركيز في عالم مليء بالمشتتات الرقمية، مما يسمح بإنتاج أعمال عالية الجودة في وقت أقل.',
            'description_fr' => 'Retrouver la concentration dans un monde de distractions numériques pour exceller dans son travail.',
            'prix' => 110.00,
            'cover' => 'https://images.unsplash.com/photo-1516979187457-637abb4f9353?w=600&h=800&fit=crop',
            'categorie' => 'Self-Help',
            'editeur' => 'Grand Central',
            'annee' => 2016,
            'type' => 'Texte',
            'langue' => 'Multi'
        ],
        [
            'designation' => 'Middle East Kitchen',
            'designation_ar' => 'مطبخ الشرق الأوسط',
            'designation_fr' => 'Cuisine du Moyen-Orient',
            'auteur' => 'Anonymous',
            'description' => 'A vibrant collection of traditional recipes and modern twists from Lebanese to Moroccan cuisine.',
            'description_ar' => 'مجموعة غنية من الوصفات التقليدية والحديثة من المطبخ اللبناني إلى المغربي، مع صور توضيحية تجعلك خبيراً في الطبخ.',
            'description_fr' => 'Un recueil de recettes traditionnelles et modernes allant du Liban au Maroc.',
            'prix' => 140.00,
            'cover' => 'https://images.unsplash.com/photo-1505935428862-770b6f24f629?w=600&h=800&fit=crop',
            'categorie' => 'Cooking',
            'editeur' => 'Gourmet',
            'annee' => 2020,
            'type' => 'Texte',
            'langue' => 'Multi'
        ]
    ];

    foreach ($books as $data) {
        Book::create($data);
    }
    
    echo "Seed completed successfully. Added " . count($books) . " multilingual books.\n";

} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
