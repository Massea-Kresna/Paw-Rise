<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Shelter;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ===== Demo adopter =====
        User::firstOrCreate(
            ['email' => 'adopter@pawrise.id'],
            [
                'name'     => 'Sarah Wijaya',
                'phone'    => '081234567890',
                'password' => 'password',
                'role'     => 'adopter',
                'address'  => 'Jl. Sudirman No. 1, Jakarta',
                'bio'      => 'Pencinta hewan, sudah memelihara kucing selama 5 tahun.',
            ]
        );

        // ===== Shelters (sesuai Figma) =====
        $sh1User = User::firstOrCreate(
            ['email' => 'shelter@pawrise.id'],
            ['name' => 'Admin Shelter Harapan', 'phone' => '081234500000', 'password' => 'password', 'role' => 'shelter']
        );
        $shHarapan = Shelter::updateOrCreate(
            ['user_id' => $sh1User->id],
            [
                'shelter_name' => 'Shelter Harapan',
                'city'         => 'Jakarta',
                'description'  => 'Shelter independen yang merawat anjing dan kucing terlantar di Jakarta.',
                'phone'        => '081234500000',
            ]
        );

        $sh2User = User::firstOrCreate(
            ['email' => 'klinik-sehat@pawrise.id'],
            ['name' => 'Admin Klinik Hewan Sehat', 'phone' => '082234500000', 'password' => 'password', 'role' => 'shelter']
        );
        $shKlinik = Shelter::updateOrCreate(
            ['user_id' => $sh2User->id],
            [
                'shelter_name' => 'Klinik Hewan Sehat',
                'city'         => 'Bandung',
                'description'  => 'Klinik dan rumah perawatan hewan terlantar di Bandung.',
                'phone'        => '082234500000',
            ]
        );

        $sh3User = User::firstOrCreate(
            ['email' => 'paws-rescue@pawrise.id'],
            ['name' => 'Admin Paws Rescue', 'phone' => '083334500000', 'password' => 'password', 'role' => 'shelter']
        );
        $shPaws = Shelter::updateOrCreate(
            ['user_id' => $sh3User->id],
            [
                'shelter_name' => 'Paws Rescue',
                'city'         => 'Bali',
                'description'  => 'Komunitas penyelamat hewan jalanan di Bali.',
                'phone'        => '083334500000',
            ]
        );

        // ===== Animal photo helper (Unsplash) =====
        $img = fn(string $id) => "https://images.unsplash.com/{$id}?w=600&h=450&fit=crop";

        // ===== Filler animals (20) — diinsert lebih dulu agar yg "starring" muncul paling atas =====
        $fillers = [
            ['Bruno','anjing','Golden Retriever',24,22,'jantan','besar', 'photo-1552053831-71594a27632d', $shHarapan],
            ['Mochi','kucing','Persia',8,3,'betina','kecil', 'photo-1514888286974-6c03e2ca1dba', $shHarapan],
            ['Rocky','anjing','Labrador Mix',36,20,'jantan','sedang','photo-1587300003388-59208cc962cb', $shKlinik],
            ['Bella','kucing','Maine Coon',30,5,'betina','sedang','photo-1526336024174-e58f5cdd8e13', $shHarapan],
            ['Max','anjing','Beagle',18,10,'jantan','sedang','photo-1561037404-61cd46aa615b', $shKlinik],
            ['Coco','kucing','Domestic Shorthair',12,3,'betina','kecil','photo-1574158622682-e40e69881006', $shPaws],
            ['Rex','anjing','German Shepherd',48,28,'jantan','besar', 'photo-1568572933382-74d440642117', $shKlinik],
            ['Snowy','kucing','Anggora',6,2,'betina','kecil','photo-1495360010541-f48722b34f7d', $shHarapan],
            ['Buddy','anjing','Pomeranian',14,4,'jantan','kecil','photo-1583512603805-3cc6b41f3edb', $shHarapan],
            ['Chika','kucing','Calico',20,4,'betina','kecil','photo-1592194996308-7b43878e84a6', $shKlinik],
            ['Oreo','kucing','Tuxedo',16,4,'jantan','sedang','photo-1573865526739-10659fec78a5', $shPaws],
            ['Daisy','anjing','Shih Tzu',26,5,'betina','kecil','photo-1601758228041-f3b2795255f1', $shHarapan],
            ['Toby','anjing','Husky',40,24,'jantan','besar','photo-1605568427561-40dd23c2acea', $shPaws],
            ['Nala','kucing','British Shorthair',22,4,'betina','sedang','photo-1561948955-570b270e7c36', $shKlinik],
            ['Simba','kucing','Tabby',9,3,'jantan','kecil','photo-1543852786-1cf6624b9987', $shHarapan],
            ['Charlie','anjing','Corgi',32,12,'jantan','sedang','photo-1612536057832-2ff7ead58194', $shKlinik],
            ['Lulu','kucing','Ragdoll',28,5,'betina','sedang','photo-1518791841217-8f162f1e1131', $shPaws],
            ['Kiko','anjing','Mini Poodle',14,5,'betina','kecil','photo-1517423440428-a5a00ad493e8', $shHarapan],
            ['Pluto','anjing','Dalmatian',30,22,'jantan','besar','photo-1583337130417-3346a1be7dee', $shKlinik],
            ['Mila','kucing','Siamese',18,4,'betina','kecil','photo-1596854407944-bf87f6fdd49e', $shPaws],
        ];

        foreach ($fillers as $i => $f) {
            [$name,$species,$breed,$age,$weight,$gender,$size,$photoId,$shelter] = $f;
            Animal::updateOrCreate(
                ['code' => 'PAW-' . str_pad($i + 1, 3, '0', STR_PAD_LEFT)],
                [
                    'shelter_id'      => $shelter->id,
                    'name'            => $name,
                    'species'         => $species,
                    'breed'           => $breed,
                    'age_months'      => $age,
                    'weight_kg'       => $weight,
                    'gender'          => $gender,
                    'size'            => $size,
                    'vaccinated'      => true,
                    'sterilized'      => $i % 2 === 0,
                    'description'     => "{$name} adalah {$species} ramah yang sedang menunggu keluarga baru.",
                    'characteristics' => 'Ramah, sehat, sudah divaksin',
                    'main_photo'      => $img($photoId),
                    'status'          => 'tersedia',
                ]
            );
        }

        // ===== Starring 4 (sesuai Figma) — diinsert TERAKHIR (Milo last) agar Milo dapat ID tertinggi
        // sehingga sort 'Terbaru' (id DESC) menampilkan: Milo → Luna → Ambatubus → Ireng =====
        $starring = [
            [
                'code'=>'PAW-021','name'=>'Ireng','species'=>'kucing','breed'=>'Bombay Mix',
                'age_months'=>12,'weight_kg'=>3,'gender'=>'jantan','size'=>'kecil',
                'shelter_id'=>$shHarapan->id,
                'description'=>'Ireng kucing remaja dengan mata indah, pemalu tapi sangat manja saat dekat.',
                'characteristics'=>'Pemalu, manja, lembut',
                'main_photo'=> 'attached_assets/Ireng.png',
            ],
            [
                'code'=>'PAW-022','name'=>'Ambatubus','species'=>'anjing','breed'=>'Golden Retriever Mix',
                'age_months'=>36,'weight_kg'=>20,'gender'=>'jantan','size'=>'besar',
                'shelter_id'=>$shPaws->id,
                'description'=>'Ambatubus anjing dewasa yang penyayang dan setia. Sudah terlatih dasar.',
                'characteristics'=>'Setia, tenang, mudah dilatih',
                'main_photo'=> 'attached_assets/Ambatubus.png',
            ],
            [
                'code'=>'PAW-023','name'=>'Luna','species'=>'kucing','breed'=>'Domestik Shorthair',
                'age_months'=>4,'weight_kg'=>2,'gender'=>'betina','size'=>'kecil',
                'shelter_id'=>$shKlinik->id,
                'description'=>'Luna kitten manja yang baru saja diselamatkan. Lincah dan suka bermain.',
                'characteristics'=>'Lincah, manja, ceria',
                'main_photo'=> 'attached_assets/Luna.png',
            ],
            [
                'code'=>'PAW-024','name'=>'Milo','species'=>'anjing','breed'=>'Beagle Mix',
                'age_months'=>24,'weight_kg'=>9,'gender'=>'jantan','size'=>'sedang',
                'shelter_id'=>$shHarapan->id,
                'description'=>'Milo adalah Beagle Mix yang ceria dan suka berlari. Cocok untuk keluarga aktif.',
                'characteristics'=>'Energik, ramah, suka anak-anak',
                'main_photo' => 'attached_assets/Milo.png',
            ],
        ];

        foreach ($starring as $a) {
            Animal::updateOrCreate(
                ['code' => $a['code']],
                array_merge($a, ['vaccinated' => true, 'sterilized' => false, 'status' => 'tersedia'])
            );
        }
    }
}
