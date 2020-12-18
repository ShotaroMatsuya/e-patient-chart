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
        factory(App\User::class, 10)->create();
        $user = User::where('email', 'test@test.com')->first();
        if (!$user) {
            $user1 = User::create([
                'name' => '松谷 章太郎',
                'email' => 'test@test.com',
                'username' => 'ShotaroMatsuya',
                'password' => 'password'
            ]);
        }
        $user2 = User::create([
            'username' => '山田 太郎',
            'name' => 'Taro Yamada',
            'email' => 'yamada@taro.com',
            'major' => '消化器外科',
            'password' => 'password'
        ]);
        $user3 = User::create([
            'username' => '田中 次郎',
            'name' => 'Jiro Tanaka',
            'major' => '整形外科',

            'email' => 'jiro@tanaka.com',
            'password' => 'password'
        ]);
        $user4 = User::create([
            'username' => '佐藤 花子',
            'name' => 'hanako satoh',
            'email' => 'hanako@sato.com',
            'password' => 'password'
        ]);

        $user5 = User::create([
            'username' => '斎藤 剛',
            'name' => 'takesi saito',
            'major' => '精神科',

            'email' => 'takesi@saito.com',
            'password' => 'password'
        ]);
        $user6 = User::create([
            'username' => '鈴木 海子',
            'name' => 'umiko suzuki',
            'email' => 'umiko@suzuki.com',
            'password' => 'password'
        ]);
        $user7 = User::create([
            'username' => '山崎 大樹',
            'name' => 'daiki yamazaki',
            'major' => '腎臓内科',

            'email' => 'daiki@yamasaki.com',
            'password' => 'password'
        ]);
        $user8 = User::create([
            'username' => '村田 まさこ',
            'name' => 'masako murata',
            'email' => 'masako@murata.com',
            'password' => 'password'
        ]);
        $user9 = User::create([
            'username' => '木村 正男',
            'name' => 'masao kimura',
            'email' => 'masao@kimura.com',
            'password' => 'password'
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

        $user1->roles()->attach($role1);
        $user2->roles()->attach($role2);
        $user3->roles()->attach($role2);
        $user4->roles()->attach($role3);
        $user5->roles()->attach($role2);
        $user6->roles()->attach($role4);
        $user7->roles()->attach($role2);
        $user8->roles()->attach($role5);
        $user9->roles()->attach($role6);
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
        $role1->permissions()->sync([1, 2, 3, 4]);
        $role2->permissions()->sync([1, 2, 3]);
        $role3->permissions()->sync([2, 3]);
        $role4->permissions()->sync([2, 4]);
        $role5->permissions()->sync([2]);
        $role6->permissions()->sync([2]);
    }
}
