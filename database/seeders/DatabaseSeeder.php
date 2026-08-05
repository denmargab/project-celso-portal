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
            ["name" => "SBM Portal", "url" => "#sbm-portal"],
            ["name" => "SGC Portal", "url" => "#sgc-portal"],
            ["name" => "Clean Track", "url" => "#clean-track"],
            ["name" => "Basura Meter", "url" => "#basura-meter"],
            ["name" => "Hinguha App", "url" => "#hinguha-app"],
            ["name" => "InvenTrack", "url" => "#inventrack"],
            ["name" => "Smart Guard", "url" => "#smart-guard"],
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
            ["title" => "Client Feedback Form", "desc" => "Submit your feedback or suggestions."],
            ["title" => "Online Document Request Form", "desc" => "Request school credentials and forms."],
            ["title" => "Online Enrollment Form", "desc" => "Register for the upcoming academic term."]
        ];

        foreach ($services as $service) {
            Service::create([
                'title' => $service['title'],
                'slug' => Str::slug($service['title']),
                'description' => $service['desc'],
                'endpoint_url' => '#',
            ]);
        }

        // 3. Digital Copies
        $docs = [
            "School Improvement Plan", "Localized Child Protection Policy", "Citizen's Charter", 
            "School Report Card", "Contingency Plan", "Mayor Celso's Biography"
        ];

        foreach ($docs as $doc) {
            Document::create([
                'title' => $doc,
                'file_path' => 'documents/sample.pdf',
                'category' => 'Institutional Policy',
            ]);
        }
    }
}