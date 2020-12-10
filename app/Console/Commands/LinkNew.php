<?php

namespace App\Console\Commands;

use App\Models\Link;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class LinkNew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'link:new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a New Link';

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
        $url = $this->ask('Link URL:');

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $this->error("Invalid URL. Exiting...");
            return 1;
        }

        $description = $this->ask('Link Description:');

        $this->info("New Link:");
        $this->info($url . ' - ' . $description);

        if ($this->confirm('Is this information correct?')) {
            $link = new Link();
            $link->url = $url;
            $link->description = $description;
            $link->save();

            $this->info("Saved.");
        }

        return 0;
    }
}
