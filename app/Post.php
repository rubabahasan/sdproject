<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Post extends Model
{
    //
    protected $fillable = array('url', 'title', 'description', 'content', 'image', 'blog', 'category_id');

    public static function prevBlogPostUrl($id) {
        $blog = static::where('id', '<', $id)->orderBy('id', 'desc')->first();

        return $blog ? $blog->url : '#';
    }

    public static function nextBlogPostUrl($id) {
        $blog = static::where('id', '>', $id)->orderBy('id', 'asc')->first();

        return $blog ? $blog->url : '#';
    }

    public function tags() {
        return $this->belongsToMany('App\BlogTag','blog_post_tags','post_id','tag_id');
    }
    public static function saveInput($title, $content) {
        $date = date('m/d/Y h:i:s a', time());
        $char = '';
        $strlen = strlen($content);
        if($strlen<100)
        {
            $j = $strlen;
        }
        else
        {
            $j = 100;
        }
        for( $i = 0; $i <= $j; $i++ ) {
            $char .= substr( $content, $i, 1 );
            
        }
        DB::table('Posts')->insert(['title' => $title, 'content' => $content, 'created_at' => $date, 'created_at_ip' => $date, 'url' => $date,  'description' => $char]);
    }
}
