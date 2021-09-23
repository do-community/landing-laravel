<?php

namespace App\Console\Commands;

use App\Models\Link;
use App\Models\LinkList;
use Illuminate\Console\Command;

class LinkUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'link:update {link_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update a link in the database';

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
        $link_id = $this->argument('link_id');
        $link = Link::find($link_id);

        if ($link === null) {
            $this->error("Invalid or non-existent link ID.");
            return 1;
        }

        $link->description = $this->ask('Link Description (ENTER to keep current)') ?? $link->description;
        $list_name = $this->ask('Link List (ENTER to keep current)') ?? $link->link_list->title;

        $this->info("Description: $link->description");
        $this->info("Listed in: " . $list_name);

        if ($this->confirm('Is this information correct?')) {
            $list = LinkList::firstWhere('slug', $list_name);
            if (!$list) {
                $list = new LinkList();
                $list->title = $list_name;
                $list->slug = $list_name;
                $list->save();
            }
            $link->link_list()->associate($list)->save();
            $this->info("Updated.");
        }

        return 0;
    }
}
