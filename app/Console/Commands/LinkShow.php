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
        $headers = [ 'id', 'url', 'list', 'description' ];
        $links = Link::all();

        $table_rows = [];
        foreach ($links as $link) {
            $table_rows[] = [ $link->id, $link->url, $link->link_list->slug, $link->description ];
        }

        $this->table($headers, $table_rows);

        return 0;
    }
}
