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
            'type' => 'Từ vựng',
            'description' => 'Câu hỏi từ vựng',
        ]);
        DB::table('question_types')->insert([
            'type' => 'Ngữ pháp',
            'description' => 'Câu hỏi ngữ pháp',
        ]);
        DB::table('admins')->insert([
            'full_name' => 'Admin',
            'email' => 'adminabcdef@gmail.com',
            'password' => bcrypt('12345678'),
            'active' => true,
            'avatar' => 'default.jpg',
        ]);
        DB::table('users')->insert([
            'name' => 'Test',
            'email' => 'testabc123@gmail.com',
            'password' => bcrypt('12345678'),
            'point' => 0,
            'active' => true,
            'avatar' => 'default.jpg',
            'is_admin' => false,
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
            'name' => 'Tiếng Anh',
            'hidden' => false,
            'description' => 'Tiếng Anh hiện tại đang là một ngôn ngữ phổ biến nhất. Vì thế việc học tiếng Anh là rất cần thiết',
        ]);
        DB::table('courses')->insert([
            'name' => 'Tiếng Anh sơ cấp',
            'hidden' => false,
            'total_question' => 5,
            'subject_id' => 1,
            'admin_id' => 1,
            'desc' => 'Khóa học sẽ giúp bạn nắm được những kiến thức cơ bản nhất trong tiếng Anh bao gồm các từ vựng đơn giản, các câu giao tiếp cơ bản bằng tiếng anh',
        ]);
        DB::table('questions')->insert([
            'question_content' => 'Quả Táo',
            'total_answer' => 4,
            'point' => 1,
            'description' => 'default',
            'course_id' => 1,
            'question_type_id' => 1,
        ]);
        DB::table('questions')->insert([
            'question_content' => 'Cậu bé',
            'total_answer' => 4,
            'point' => 1,
            'description' => 'default',
            'course_id' => 1,
            'question_type_id' => 1,
        ]);
        DB::table('questions')->insert([
            'question_content' => 'Tai nghe',
            'total_answer' => 4,
            'point' => 1,
            'description' => 'default',
            'course_id' => 1,
            'question_type_id' => 1,
        ]);
        DB::table('questions')->insert([
            'question_content' => 'Ô tô',
            'total_answer' => 4,
            'point' => 1,
            'description' => 'default',
            'course_id' => 1,
            'question_type_id' => 1,
        ]);
        DB::table('questions')->insert([
            'question_content' => 'Bầu trời',
            'total_answer' => 4,
            'point' => 1,
            'description' => 'default',
            'course_id' => 1,
            'question_type_id' => 1,
        ]);
        DB::table('answers')->insert([
            'tag' => 'A',
            'answer_content' => 'Apple',
            'correct' => 1,
            'question_id' => 1,
            'desc' => 'answer1.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'B',
            'answer_content' => 'Orange',
            'correct' => 0,
            'question_id' => 1,
            'desc' => 'answer2.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'C',
            'answer_content' => 'Mango',
            'correct' => 0,
            'question_id' => 1,
            'desc' => 'answer3.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'D',
            'answer_content' => 'Grape',
            'correct' => 0,
            'question_id' => 1,
            'desc' => 'answer4.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'A',
            'answer_content' => 'Girl',
            'correct' => 0,
            'question_id' => 2,
            'desc' => 'answer5.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'B',
            'answer_content' => 'Man',
            'correct' => 0,
            'question_id' => 2,
            'desc' => 'answer6.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'C',
            'answer_content' => 'Boy',
            'correct' => 1,
            'question_id' => 2,
            'desc' => 'answer7.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'D',
            'answer_content' => 'Woman',
            'correct' => 0,
            'question_id' => 2,
            'desc' => 'answer8.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'A',
            'answer_content' => 'Sky',
            'correct' => 0,
            'question_id' => 3,
            'desc' => 'answer9.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'B',
            'answer_content' => 'Headphone',
            'correct' => 1,
            'question_id' => 3,
            'desc' => 'answer10.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'C',
            'answer_content' => 'Sky',
            'correct' => 0,
            'question_id' => 3,
            'desc' => 'answer11.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'D',
            'answer_content' => 'Apple',
            'correct' => 0,
            'question_id' => 3,
            'desc' => 'answer12.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'A',
            'answer_content' => 'Headphone',
            'correct' => 0,
            'question_id' => 4,
            'desc' => 'answer13.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'B',
            'answer_content' => 'Computer',
            'correct' => 0,
            'question_id' => 4,
            'desc' => 'answer14.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'C',
            'answer_content' => 'Baby',
            'correct' => 0,
            'question_id' => 4,
            'desc' => 'answer15.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'D',
            'answer_content' => 'Car',
            'correct' => 1,
            'question_id' => 4,
            'desc' => 'answer16.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'A',
            'answer_content' => 'Sky',
            'correct' => 1,
            'question_id' => 5,
            'desc' => 'answer17.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'B',
            'answer_content' => 'Computer',
            'correct' => 0,
            'question_id' => 5,
            'desc' => 'answer18.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'C',
            'answer_content' => 'Boy',
            'correct' => 0,
            'question_id' => 5,
            'desc' => 'answer19.jpg'
        ]);
        DB::table('answers')->insert([
            'tag' => 'D',
            'answer_content' => 'Headphone',
            'correct' => 0,
            'question_id' => 5,
            'desc' => 'answer20.jpg',
        ]);
        DB::table('posts')->insert([
            'title' => 'title1',
            'content' => 'content1',
            'course_id' => '1',
            'image' => 'book.jpg'
        ]);
        DB::table('posts')->insert([
            'title' => 'title2',
            'content' => 'content2',
            'course_id' => '1',
            'image' => 'post2.png'
        ]);
    }
}
