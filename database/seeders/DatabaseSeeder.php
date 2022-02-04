<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Member;
use App\Models\Category;
use App\Models\Official;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(1)->create();

        // Department::create([
        //     'department' => 'Hubungan Masyarakat',
        // ]);
        
        // Department::create([
        //     'department' => 'Pengembangan Keahlian',
        // ]);
        
        // Department::create([
        //     'department' => 'Kerohanian',
        // ]);
        
        // Department::create([
        //     'department' => 'Bakat dan Olahraga',
        // ]);
        
        // Department::create([
        //     'department' => 'Komunikasi dan Informasi',
        // ]);
        
        // Department::create([
        //     'department' => 'Dana dan Usaha',
        // ]);
        
        // Department::create([
        //     'department' => 'Kesejahteraan Mahasiswa',
        // ]);

        Member::factory(20)->create();

        // Official::create([
        //     'jabatan' => 'Ketua Himpunan',
        // ]);
        
        // Official::create([
        //     'jabatan' => 'Wakil Ketua Himpunan',
        // ]);
        
        // Official::create([
        //     'jabatan' => 'Sekretaris',
        // ]);
        
        // Official::create([
        //     'jabatan' => 'Bendahara',
        // ]);
        
        // Official::create([
        //     'jabatan' => 'Hubungan Masyarakat',
        // ]);
        
        // Official::create([
        //     'jabatan' => 'Pengembangan Keahlian',
        // ]);
        
        // Official::create([
        //     'jabatan' => 'Kerohanian',
        // ]);
        
        // Official::create([
        //     'jabatan' => 'Bakat dan Olahraga',
        // ]);
        
        // Official::create([
        //     'jabatan' => 'Komunikasi dan Informasi',
        // ]);
        
        // Official::create([
        //     'jabatan' => 'Dana dan Usaha',
        // ]);
        
        // Official::create([
        //     'jabatan' => 'Kesejahteraan Mahasiswa',
        // ]);


        // Category::create([
        //     'name' => 'Technology',
        //     'slug' => 'technology',
        // ]);
        
        // Category::create([
        //     'name' => 'Campus Events',
        //     'slug' => 'campus-events',
        // ]);

        // Category::create([
        //     'name' => 'Programming',
        //     'slug' => 'programming',
        // ]);

        // Post::factory(20)->create();
    }
}
