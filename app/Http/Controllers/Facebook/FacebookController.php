<?php

namespace App\Http\Controllers\Facebook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Facebook\Facebook;
use Facebook\Exceptions\FacebookSDKException;
use File;
use NazmulHasan\LaravelFacebookPost\Facades\FacebookPost;
class FacebookController extends Controller
{
    public function fetchPagePosts()
    {
        $fb = new Facebook([
            'app_id' => '1788343101295502',
            'app_secret' => '222f8d598257ef2656c2f47b1c9c0d49',
            'default_graph_version' => 'v20.0',
        ]);

        $pageId = '102020055418500';
        $accessToken = 'EAAZAafRNKC44BO6TQgrY8nkVZATUSCAD00PnYs9rHzoOIM7Dr6AFqewI2BORMDPCIjL6jmiX4OLAPwF0FvrSmN8xAgfHtXvmiqyXAFxGcnZBufpbUmZC0suzwpp1Yv0QNZCE29pYKZBTXwO3GjKdmXDxsQP7E1V808in6ZCNoE7Dq8usKynDrz9ogeeQeVWEeFBiEw6Js6d9wIkOdSwHZCQlYbWb9HIZD';

        try {
            $response = $fb->get("/$pageId/posts", $accessToken);
            $posts = $response->getGraphEdge();

            // return $response;

            $allPosts = [];
            while ($posts !== null) {
                $allPosts = array_merge($allPosts, $posts->asArray());
                $posts = $fb->next($posts);
            }

            File::append(public_path('/logs/data.txt'), $allPosts);
            // Store the posts in your database or do whatever you need to do with them
            // foreach ($allPosts as $post) {
            //     $data = [
            //         'post_id' => $post['id'],
            //         'message' => $post['message'],
            //         'created_at' => $post['created_time'],
            //         'link' => $post['link'],
            //     ];
                
            //     // Insert the post data into your database
            //     // DB::table('facebook_posts')->insert($data);
            // }

            return response()->json(['message' => 'Posts fetched successfully']);
        } catch (FacebookSDKException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getAllPage(){
        $response = FacebookPost::getPost();
        return $response;
    }
}
