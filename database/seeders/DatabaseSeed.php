<?php

namespace Database\Seeders;

use App\Models\Soal;
use App\Models\User;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // کاربر
        $user = new User();
        $user->Firstname = "امیرمهدی";
        $user->Lastname = "اسدی";
        $user->email = "pgamirmahdi@gmail.com";
        $user->password = bcrypt("amirmahdi1881374");
        $user->Role = "طراح و توسعه دهنده اپ";
        $user->save();
        $user->assignRole('Developer');

        $user = new User();
        $user->Firstname = "دکتر امیر";
        $user->Lastname = "مهرآور";
        $user->email = "Dr.MehrAvar@gmail.com";
        $user->password = bcrypt("123456");
        $user->Role = "مدیر کارخانه";
        $user->save();
        $user->assignRole('admin');

        $user = new User();
        $user->Firstname = "واحد";
        $user->Lastname = "کنترل خودرو";
        $user->email = "Herasat@gmail.com";
        $user->password = bcrypt("Behan123Tejarat456");
        $user->Role = "حراست";
        $user->save();
        $user->assignRole('Herasat');

        $user = new User();
        $user->Firstname = "محمود";
        $user->Lastname = "فاضلی";
        $user->email = "mahmoodfazeli026@gmail.com";
        $user->password = bcrypt("12345678");
        $user->Role = "کارشناس انبار تولید";
        $user->save();
        $user->assignRole('admin');

        $user = new User();
        $user->Firstname = "خانم";
        $user->Lastname = "تارا حقگو";
        $user->email = "tarahaghgoo@gmail.com";
        $user->password = bcrypt("123456");
        $user->Role = "کارشناس انبار تولید";
        $user->save();
        $user->assignRole('admin');

        // سوال
        $soal = new Soal();
        $soal->Question = "از کجا میتونم به پنل دسترسی داشته باشم؟";
        $soal->Answer = "با استفاده از منوی وسط صفحه اپ و یا ورود و ثبت نام میتوانید به پنل خود دسترسی پیدا کنید";
        $soal->save();
    }
}
