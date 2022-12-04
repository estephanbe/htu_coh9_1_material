<?php

namespace Core\Helpers;

use Core\Model\Post;
use Core\Model\User;

class Fake
{
    protected static $faker;

    public static function provide_fake_data()
    {
        self::$faker = \Faker\Factory::create();
        var_dump(self::$faker->name());
        var_dump(self::$faker->realText(200));
        die;
    }

    public static function fake_posts(int $posts_num): array
    {
        self::$faker = \Faker\Factory::create();
        $posts = array();
        for ($i = 0; $i < $posts_num; $i++) {
            $posts[] = array(
                "title" => self::$faker->text(20, 50),
                "content" => self::$faker->realText(500)
            );
        }
        return $posts;
    }

    public static function create_posts(int $posts_num)
    {
        foreach (self::fake_posts($posts_num) as $fake_post) {
            $post = new Post();
            $fake_post['content'] = \str_replace("'", "", $fake_post['content']);
            $post->create($fake_post);
        }
    }

    public static function fake_users(int $users_num)
    {
        self::$faker = \Faker\Factory::create();
        $users = array();
        for ($i = 0; $i < $users_num; $i++) {
            $users[] = array(
                "username" => self::$faker->userName(),
                "email" => self::$faker->email(),
                "password" => "1234567",
                "display_name" => self::$faker->name(),
            );
        }
        return $users;
    }

    public static function create_users(int $users_num)
    {
        foreach (self::fake_users($users_num) as $fake_user) {
            $post = new User();
            $post->create($fake_user);
        }
    }

    public static function is_first_time()
    {
        $post = new Post();
        if (empty($post->get_all())) {
            self::create_posts(20);
        }
    }
}
