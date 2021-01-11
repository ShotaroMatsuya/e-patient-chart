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
        // factory(App\User::class, 10)->create();
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
            'username' => 'Taro Yamada',
            'name' => '山田　太郎',
            'email' => 'yamada@taro.com',
            'major' => '消化器外科',
            'password' => 'password'
        ]);
        $user3 = User::create([
            'name' => '田中 次郎',
            'username' => 'Jiro Tanaka',
            'major' => '整形外科',

            'email' => 'jiro@tanaka.com',
            'password' => 'password'
        ]);
        $user4 = User::create([
            'name' => '佐藤 花子',
            'username' => 'hanako satoh',
            'email' => 'hanako@sato.com',
            'password' => 'password'
        ]);

        $user5 = User::create([
            'name' => '斎藤 剛',
            'username' => 'takesi saito',
            'major' => '精神科',

            'email' => 'takesi@saito.com',
            'password' => 'password'
        ]);
        $user6 = User::create([
            'name' => '鈴木 海子',
            'username' => 'umiko suzuki',
            'email' => 'umiko@suzuki.com',
            'password' => 'password'
        ]);
        $user7 = User::create([
            'name' => '山崎 大樹',
            'username' => 'daiki yamazaki',
            'major' => '腎臓内科',

            'email' => 'daiki@yamasaki.com',
            'password' => 'password'
        ]);
        $user8 = User::create([
            'name' => '村田 まさこ',
            'username' => 'masako murata',
            'email' => 'masako@murata.com',
            'password' => 'password'
        ]);
        $user9 = User::create([
            'name' => '木村 正男',
            'username' => 'masao kimura',
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


        $user1->roles()->attach($role1);
        $user2->roles()->attach($role2);
        $user3->roles()->attach($role2);
        $user4->roles()->attach($role3);
        $user5->roles()->attach($role2);
        $user6->roles()->attach($role4);
        $user7->roles()->attach($role2);
        $user8->roles()->attach($role5);
        $user9->roles()->attach($role6);

        $user1->permissions()->sync($role1->permissions->pluck('id')->all());
        $user2->permissions()->sync($role2->permissions->pluck('id')->all());
        $user3->permissions()->sync($role2->permissions->pluck('id')->all());
        $user4->permissions()->sync($role3->permissions->pluck('id')->all());
        $user5->permissions()->sync($role2->permissions->pluck('id')->all());
        $user6->permissions()->sync($role4->permissions->pluck('id')->all());
        $user7->permissions()->sync($role2->permissions->pluck('id')->all());
        $user8->permissions()->sync($role5->permissions->pluck('id')->all());
        $user9->permissions()->sync($role6->permissions->pluck('id')->all());
    }
}
