<?php

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::where('email', 'test@test.com')->first();
        // if (!$user) {
        //     $user1 = User::create([
        //         'name' => '松谷 章太郎',
        //         'email' => 'test@test.com',
        //         'username' => 'Shotaro',
        //         'password' => Hash::make('password')
        //     ]);
        //     $user1->roles()->attach('Admin');
        // }
        $user2 = User::create([
            'username' => '山田 太郎',
            'name' => 'Taro Yamada',
            'email' => 'yamada@taro.com',
            'password' => Hash::make('password')
        ]);
        $user3 = User::create([
            'username' => '田中 次郎',
            'name' => 'Jiro Tanaka',
            'email' => 'jiro@tanaka.com',
            'password' => Hash::make('password')
        ]);
        $user4 = User::create([
            'username' => '佐藤 花子',
            'name' => 'hanako satoh',
            'email' => 'hanako@sato.com',
            'password' => Hash::make('password')
        ]);

        $user5 = User::create([
            'username' => '斎藤 剛',
            'name' => 'takesi saito',
            'email' => 'takesi@saito.com',
            'password' => Hash::make('password')
        ]);
        $user6 = User::create([
            'username' => '鈴木 海子',
            'name' => 'umiko suzuki',
            'email' => 'umiko@suzuki.com',
            'password' => Hash::make('password')
        ]);
        $user7 = User::create([
            'username' => '山崎 大樹',
            'name' => 'daiki yamazaki',
            'email' => 'daiki@yamasaki.com',
            'password' => Hash::make('password')
        ]);
        $user8 = User::create([
            'username' => '村田 まさこ',
            'name' => 'masako murata',
            'email' => 'masako@murata.com',
            'password' => Hash::make('password')
        ]);
        $user9 = User::create([
            'username' => '木村 正男',
            'name' => 'masao kimura',
            'email' => 'masao@kimura.com',
            'password' => Hash::make('password')
        ]);

        $role1 = Role::create([
            'name' => 'Admin',
            'slug' => 'admin'
        ]);
        $role2 = Role::create([
            'name' => 'Doctor',
            'slug' => 'doctor'
        ]);
        $role3 = Role::create([
            'name' => 'Nurse',
            'slug' => 'nurse'
        ]);

        $role4 = Role::create([
            'name' => 'Officer',
            'slug' => 'officer'
        ]);

        $role5 = Role::create([
            'name' => 'Student',
            'slug' => 'student'
        ]);

        $role6 = Role::create([
            'name' => 'Technologist',
            'slug' => 'technologist'
        ]);
        $permission1 = Permission::create([
            'name' => 'Create-patient',
            'slug' => 'create-patient'
        ]);
        $permission2 = Permission::create([
            'name' => 'Read-patient',
            'slug' => 'read-patient'
        ]);
        $permission3 = Permission::create([
            'name' => 'Edit-patient',
            'slug' => 'edit-patient'
        ]);
        $permission4 = Permission::create([
            'name' => 'Delete-patient',
            'slug' => 'delete-patient'
        ]);
    }
}
