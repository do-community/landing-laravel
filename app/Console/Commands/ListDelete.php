<?php

namespace App\Console\Commands;

use App\Models\Link;
use App\Models\LinkList;
use Illuminate\Console\Command;

class ListDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:delete {list_slug}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Lists';

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
        $list_slug = $this->argument('list_slug');
        $list = LinkList::firstWhere('slug', $list_slug);

        if ($list === null) {
            $this->error("Invalid or non-existent List.");
            return 1;
        }

        if ($this->confirm("Confirm deleting the list '$list->title'? Links will be reassigned to the default list.")) {
            $default_list = LinkList::firstWhere('slug', 'default');
            if (!$default_list) {
                $default_list = new LinkList();
                $default_list->title = 'default';
                $default_list->slug = 'default';
                $default_list->save();
            }

            $this->info("Reassigning links to default list...");

            Link::where('link_list_id', $list->id)->update(['link_list_id' => $default_list->id]);

            $list->delete();
            $this->info("List Deleted.");
        }

        return 0;
    }
}
