<?php

namespace App\Actions;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;

class CreateBlogAction
{

    public function execute(array $data)
    {
        try {
            BlogPost::create([
                "title" => $data['title'],
                "description" => $data['description'],
                "user_id" => auth()->user()->id
            ]);

            FacadesSession::flash('message', "Blog post added successfully");
            return Redirect::back();
        } catch (\Exception $e) {

            \Log::info(array($e));
            FacadesSession::flash('message', "There was an error adding blog " . $e->getMessage());
            return Redirect::back();
        }
    }
}
