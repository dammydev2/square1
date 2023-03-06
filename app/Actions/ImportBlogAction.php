<?php

namespace App\Actions;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Http;

class ImportBlogAction
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('third_party.blog.root_url');
    }

    public function execute()
    {
        try {

            $blogs = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post($this->baseUrl)->json();
            // dd($blogs['articles']);

            if ($blogs['status'] == "ok") {

                $num = count($blogs['articles']);
                for ($i = 0; $i < $num; $i++) {
                    // dump(User::admin());
                    BlogPost::create([
                        "title" => $blogs['articles'][$i]['title'],
                        "description" => $blogs['articles'][$i]['description'],
                        "user_id" => User::admin()->id
                    ]);
                }
            }
        } catch (\Exception $e) {

            \Log::info(array($e));
        }
    }
}
