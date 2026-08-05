<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Application;
use App\Models\Service;
use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class ProjectCelsoSeeder extends Seeder
{
    public function run(): void
    {
        // Temporarily disable foreign key constraints to allow truncating tables cleanly
        Schema::disableForeignKeyConstraints();

        Application::truncate();
        Service::truncate();
        Document::truncate();

        Schema::enableForeignKeyConstraints();

        // 1. Applications
        $apps = [
            ["name" => "Digital Library", "url" => "#digital-library"],
            ["name" => "MAPA System", "url" => "#mapa-system"],
            ["name" => "Discipline Portal", "url" => "https://disciplineportal-cffnhs.netlify.app/"],
            ["name" => "SBM Portal", "url" => "https://cffnhs-sbmportal.web.app/"],
            ["name" => "SGC Portal", "url" => "https://cffnhs-sgcportal.web.app/"],
            ["name" => "Clean Track", "url" => "https://jcrapsing.my.canva.site/cleantrack"],
            ["name" => "Basura Meter", "url" => "https://jcrapsing.my.canva.site/basurameter"],
            ["name" => "Hinguha App", "url" => "https://jcrapsing.my.canva.site/hinguha"],
            ["name" => "InvenTrack", "url" => "https://jcrapsing.my.canva.site/inventrack"],
            ["name" => "Smart Guard", "url" => "https://cffnhs.my.canva.site/ai-checker"],
            ["name" => "SPDS", "url" => "#spds"],
            ["name" => "eBalota", "url" => "#ebalota"]
        ];

        foreach ($apps as $app) {
            Application::create([
                'name' => $app['name'],
                'slug' => Str::slug($app['name']),
                'url' => $app['url'],
                'description' => 'Official operational module for ' . $app['name'],
            ]);
        }

        // 2. Online Services
        $services = [
            [
                "title" => "Client Feedback Form", 
                "desc" => "Submit your feedback or suggestions.", 
                "url" => "https://docs.google.com/forms/d/e/1FAIpQLSdzKrA4C5H5oIqYA2e7BUKHK0RWlL3iaMK3DdY1t9hCWLxrDw/viewform"
            ],
            [
                "title" => "Online Document Request Form", 
                "desc" => "Request school credentials and forms.", 
                "url" => "https://docs.google.com/forms/d/e/1FAIpQLSfyowinn8Yfv0kY0BrvnNQN6Dacfo8hpwa-tpWOghcPa6vgqA/viewform"
            ],
            [
                "title" => "Online Enrollment Form", 
                "desc" => "Register for the upcoming academic term.", 
                "url" => "https://docs.google.com/forms/d/e/1FAIpQLSee91cjQus2DDZRMi90-nGh8p8DYRqRFWRLTljcolS1ucH4vA/viewform"
            ]
        ];

        foreach ($services as $service) {
            Service::create([
                'title' => $service['title'],
                'slug' => Str::slug($service['title']),
                'description' => $service['desc'],
                'endpoint_url' => $service['url'],
            ]);
        }

        // 3. Digital Copies
        $docs = [
            ["title" => "School Improvement Plan", "path" => "https://drive.google.com/file/d/1zu-0RbzoATH4hcop_eDZzaI0YoXpXQM_/view"],
            ["title" => "Localized Child Protection Policy", "path" => "https://drive.google.com/file/d/1WUFxE4bhm8d8Q0nvc00xrKTGpyrZ1uTj/view"],
            ["title" => "Citizen's Charter", "path" => "https://drive.google.com/file/d/1pn3CB88WzH8TrH-dOGYBysF6naGiQrXG/view"], 
            ["title" => "School Report Card", "path" => "https://drive.google.com/file/d/1QnNStkMkFihoSMAJNXD8FoWg2dLOVsQA/view"],
            ["title" => "Contingency Plan", "path" => "https://drive.google.com/file/d/1vfPFMm2ptwabK3wAhSRIRJLhimTGqz_D/view"],
            ["title" => "Mayor Celso's Biography", "path" => "https://drive.google.com/file/d/1tHxqpISdb-B3rsQ9nIuBcsv2tZNPODq6/view"]
        ];

        foreach ($docs as $doc) {
            Document::create([
                'title' => $doc['title'],
                'file_path' => $doc['path'],
                'category' => 'Institutional Policy',
            ]);
        }
    }
}