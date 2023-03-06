<?php

namespace App\Console\Commands;

use App\Actions\ImportBlogAction;
use Illuminate\Console\Command;

class AutoFetchPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fetch-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'I am here to fetch post from the third party site';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return (new ImportBlogAction())->execute();
    }
}
