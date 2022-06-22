<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    // use HasFactory;

    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            'slug' => 'judul-post-pertama',
            "author" => "Rafi",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum eligendi culpa iste cum recusandae ipsa nesciunt laboriosam placeat. Veniam laboriosam reprehenderit autem inventore quidem natus aperiam quia voluptatem ducimus eligendi."
        ],
        [
            "title" => "Judul Post Kedua",
            'slug' => 'judul-post-kedua',
            "author" => "Ridwan",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, quisquam at. Reiciendis nobis consectetur, omnis neque laborum commodi cumque voluptate, quos rerum voluptatem ducimus nihil, reprehenderit totam. Reiciendis repellendus corrupti id temporibus inventore recusandae obcaecati doloremque vitae eveniet qui veritatis, unde odio laborum? In maiores facilis, esse beatae dolorem magnam officia eligendi nisi atque rerum ut excepturi similique amet voluptatum voluptatem ab, repudiandae delectus harum corrupti? Esse repellat dolore, alias illum illo magnam consectetur eligendi, cum neque ratione possimus reprehenderit, quia error. Totam ex doloribus magnam atque, quod consectetur laudantium. Ab, culpa velit. Vero aliquam incidunt odit iure totam vitae?"
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);

        // $new_post = [];

        // foreach ($blog_posts as $post) {
        //   if ($post['slug'] === $slug) {
        //     $new_post = $post;
        //   }
        // }

        // $index = array_search($slug, array_column($posts, 'slug'));
        // $new_post = $posts[$index];

    }
}
