<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project CELSO - Cyber Enhanced Learning and Schools Operation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans">

    <!-- Header Navigation -->
    <header class="bg-indigo-900 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-6 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold tracking-wide">Project CELSO</h1>
                <p class="text-sm text-indigo-200">Cyber Enhanced Learning and Schools Operation</p>
            </div>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="max-w-7xl mx-auto px-4 py-8 space-y-12">

        <!-- SECTION 1: APPLICATIONS -->
        <section>
            <div class="border-b border-slate-200 pb-4 mb-6">
                <h2 class="text-xl font-bold text-slate-900">Applications</h2>
                <p class="text-sm text-slate-500">Core operational software and institutional tools</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($applications as $app)
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 hover:shadow-md transition flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center font-bold mb-4">
                                {{ strtoupper(substr($app->name, 0, 2)) }}
                            </div>
                            <h3 class="font-semibold text-slate-900 text-lg">{{ $app->name }}</h3>
                            <p class="text-xs text-slate-500 mt-1">{{ $app->description }}</p>
                        </div>
                        <a href="{{ $app->url }}" class="mt-6 inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800">
                            Launch App &rarr;
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- SECTION 2: ONLINE SERVICES -->
        <section>
            <div class="border-b border-slate-200 pb-4 mb-6">
                <h2 class="text-xl font-bold text-slate-900">Online Services</h2>
                <p class="text-sm text-slate-500">Fast requests, feedback channels, and enrollment gateways</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($services as $service)
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 hover:shadow-md transition flex flex-col justify-between">
                        <div>
                            <h3 class="font-semibold text-slate-900 text-lg mb-2">{{ $service->title }}</h3>
                            <p class="text-sm text-slate-600 mb-6">{{ $service->description }}</p>
                        </div>
                        <a href="{{ $service->endpoint_url }}" class="bg-slate-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-slate-800 transition text-center">Access Service</a>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- SECTION 3: DIGITAL COPIES & REPOSITORY -->
        <section>
            <div class="border-b border-slate-200 pb-4 mb-6">
                <h2 class="text-xl font-bold text-slate-900">Digital Copies & Transparency</h2>
                <p class="text-sm text-slate-500">Institutional policies, guidelines, and reference reports</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($documents as $doc)
                    <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 flex items-center justify-between">
                        <span class="font-medium text-slate-800 text-sm">{{ $doc->title }}</span>
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold">View PDF</a>
                    </div>
                @endforeach
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 mt-20 py-6 text-center text-sm text-slate-500">
        <p>&copy; 2026 Project CELSO. All Rights Reserved.</p>
    </footer>

</body>
</html>