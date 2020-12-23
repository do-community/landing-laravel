<?php

namespace Database\Seeders;

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
        $this->importLinks();
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

            foreach ($links as $link) {
                DB::table('links')->insert([
                    'url' => $link['url'],
                    'description' => $link['description']
                ]);
            }
        }
    }
}
