<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Region;
use App\Models\City;

class ImportRegions extends Command
{
    protected $signature = 'import:regions {path=public/json/cities.json}';
    protected $description = 'Import regions and cities from JSON file';

    public function handle()
    {
        $path = base_path($this->argument('path'));
        if (!file_exists($path)) {
            $this->error("File not found: $path");
            return;
        }

        $data = json_decode(file_get_contents($path), true);

        foreach ($data as $region) {
            $reg = Region::create([
                'name' => $region['region'],
                'lat' => $region['lat'],
                'long' => $region['long'],
            ]);

            foreach ($region['cities'] as $city) {
                City::create([
                    'region_id' => $reg->id,
                    'name' => $city['name'],
                    'lat' => $city['lat'],
                    'long' => $city['long'],
                ]);
            }
        }
        $this->info("Regions and cities imported successfully!");
    }
}
