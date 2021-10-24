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
        // create roles & permissions in advance
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

        $role7 = Role::create([
            'name' => 'Guest',
            'slug' => 'guest'
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
        $role7->permissions()->sync([1, 2]);

        //20 clinical doctors create
        factory('App\User', 20)->create()->each(function ($user) {
            $user->roles()->attach(2);
        });

        $user = User::where('email', 'test@test.com')->first();
        if (!$user) {
            $guest = User::create([
                'name' => 'ゲストユーザー',
                'email' => 'guest@test.com',
                'password' => 'password',
                'username' => 'GUEST'
            ]);
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
            'password' => 'password'
        ]);
        $user3 = User::create([
            'name' => '田中 次郎',
            'username' => 'Jiro Tanaka',
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
        $doctor1 = User::create([
            'name' => '吉村拓郎',
            'username' => 'yoshimura takuro',
            'email' => 'taku@yoshi.com',
            'password' => 'password',
            'major' => '放射線科'
        ]);
        $doctor2 = User::create([
            'name' => '本田雅子',
            'username' => 'masako honda',
            'email' => 'asa@honda.com',
            'password' => 'password',
            'major' => '内視鏡科'
        ]);
        $doctor3 = User::create([
            'name' => '田澤佳子',
            'username' => 'yoshiko tazawa',
            'email' => 'yoshi@taz.com',
            'password' => 'password',
            'major' => '病理部'
        ]);


        $guest->roles()->attach($role7);
        $user1->roles()->attach($role1);
        $user2->roles()->attach($role3);
        $user3->roles()->attach($role4);
        $user4->roles()->attach($role5);
        $user5->roles()->attach($role6);
        $user6->roles()->attach($role3);
        $user7->roles()->attach($role4);
        $user8->roles()->attach($role5);
        $user9->roles()->attach($role6);
        $doctor1->roles()->attach($role2);
        $doctor2->roles()->attach($role2);
        $doctor3->roles()->attach($role2);

        $guest->permissions()->sync($role7->permissions->pluck('id')->all());
        $user1->permissions()->sync($role1->permissions->pluck('id')->all());
        $user2->permissions()->sync($role3->permissions->pluck('id')->all());
        $user3->permissions()->sync($role4->permissions->pluck('id')->all());
        $user4->permissions()->sync($role5->permissions->pluck('id')->all());
        $user5->permissions()->sync($role6->permissions->pluck('id')->all());
        $user6->permissions()->sync($role3->permissions->pluck('id')->all());
        $user7->permissions()->sync($role4->permissions->pluck('id')->all());
        $user8->permissions()->sync($role5->permissions->pluck('id')->all());
        $user9->permissions()->sync($role6->permissions->pluck('id')->all());
        $doctor1->permissions()->sync($role2->permissions->pluck('id')->all());
        $doctor2->permissions()->sync($role2->permissions->pluck('id')->all());
        $doctor3->permissions()->sync($role2->permissions->pluck('id')->all());
    }
}
