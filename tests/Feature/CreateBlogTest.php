<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateBlogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_createBlog()
    {

        $data = [
            'title' => 'lorem ipsum',
            'description' => 'lorem ipsum is a dummy data'
        ];

        $user = User::factory()->create();


        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])->post('/create-blog', $data);

        $blog = BlogPost::find(1);
        // dd($blog);

        $this->assertEquals($data['title'], $blog->title);
        $this->assertEquals("user", $blog->user->user_type);
    }
}
