<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\LinkList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //only import seeds if DB is empty.
        if (!Link::count()) {
            $this->importLinks();
        }
    }

    /**
     * Imports Links from the default links.yml file at the root of the app.
     * Change that file to import a set of personal basic links you want to show
     * as soon as the application is deployed.
     */
    public function importLinks()
    {
        $links_import_path = __DIR__ . '/../../links.yml';

        $yaml = new Yaml();
        if (is_file($links_import_path)) {
            $links = $yaml->parsefile($links_import_path);

            $default_list = new LinkList();
            $default_list->title = "Default";
            $default_list->description = "Default List";
            $default_list->slug = "default";
            $default_list->save();

            foreach ($links as $link) {
                $seed_link = new Link();
                $seed_link->url = $link['url'];
                $seed_link->description = $link['description'];

                $default_list->links()->save($seed_link);
            }
        }
    }
}
