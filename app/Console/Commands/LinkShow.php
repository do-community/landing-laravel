<?php

namespace App\Console\Commands;

use App\Models\Link;
use Illuminate\Console\Command;

class LinkShow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'link:show';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List links saved in the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $headers = [ 'id', 'url', 'description' ];
        $links = Link::all(['id', 'url', 'description'])->toArray();
        $this->table($headers, $links);

        return 0;
    }
}
