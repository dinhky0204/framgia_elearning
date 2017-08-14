<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_types')->insert([
            'id' => 1,
            'type' => 'Từ vựng',
            'description' => 'Câu hỏi từ vựng',
        ]);
        DB::table('question_types')->insert([
            'id' => 2,
            'type' => 'Ngữ pháp',
            'description' => 'Câu hỏi ngữ pháp',
        ]);
        DB::table('admins')->insert([
            'id' => 1,
            'full_name' => 'Admin',
            'email' => 'adminabc@gmail.com',
            'password' => bcrypt('12345678'),
            'active' => true,
            'avatar' => 'default.jpg',
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'adminabc',
            'password' => bcrypt('12345678'),
            'point' => 0,
            'active' => true,
            'avatar' => 'admin.jpg',
            'is_admin' => true,
        ]);
        DB::table('subjects')->insert([
            'id' => 1,
            'name' => 'Tiếng Anh',
            'hidden' => false,
            'description' => 'Tiếng Anh hiện tại đang là một ngôn ngữ phổ biến nhất. Vì thế việc học tiếng Anh là rất cần thiết',
        ]);
        DB::table('courses')->insert([
            'id' => 1,
            'name' => 'Tiếng Anh sơ cấp',
            'hidden' => false,
            'total_question' => 0,
            'subject_id' => 1,
            'admin_id' => 1,
            'desc' => 'Khóa học sẽ giúp bạn nắm được những kiến thức cơ bản nhất trong tiếng Anh bao gồm các từ vựng đơn giản, các câu giao tiếp cơ bản bằng tiếng anh',
        ]);
    }
}
