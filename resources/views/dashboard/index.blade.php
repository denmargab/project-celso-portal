<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project CELSO - Cyber Enhanced Learning and Schools Operation</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes pulse-glow {
            0%, 100% { transform: scale(1); filter: drop-shadow(0 0 20px rgba(99, 102, 241, 0.6)); }
            50% { transform: scale(1.04); filter: drop-shadow(0 0 40px rgba(129, 140, 248, 0.9)); }
        }
        .futuristic-logo {
            animation: pulse-glow 3s infinite ease-in-out;
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 font-sans min-h-screen flex flex-col justify-between selection:bg-indigo-500 selection:text-white overflow-x-hidden">

    <!-- PHASE 1: INTRO VIDEO SPLASH (Unmuted) -->
    <div id="video-splash" class="fixed inset-0 bg-slate-950 z-50 flex items-center justify-center transition-opacity duration-700">
        <video id="intro-video" playsinline class="w-full h-full object-cover">
            <source src="{{ asset('intro.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <button onclick="transitionToPortal()" class="absolute bottom-6 right-6 bg-slate-900/60 backdrop-blur border border-slate-700 text-slate-300 text-xs font-mono px-4 py-2 rounded-xl hover:bg-slate-800 transition z-50">
            Skip Intro &rarr;
        </button>
    </div>

    <!-- PHASE 2: IMMERSIVE DARK-MODE PORTAL (Logo View) -->
    <div id="portal-splash" class="fixed inset-0 bg-slate-950 z-40 flex flex-col items-center justify-center cursor-pointer opacity-0 pointer-events-none transition-all duration-1000" onclick="enterDashboard()">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(79,70,229,0.15)_0,transparent_70%)] pointer-events-none"></div>
        <div class="relative z-10 text-center space-y-6 px-4">
            <div class="relative inline-block">
                <div class="absolute inset-0 bg-indigo-500 rounded-full blur-3xl opacity-40 animate-pulse"></div>
                <img src="{{ asset('logo.png') }}" alt="Project CELSO Logo" class="relative w-36 h-36 object-contain mx-auto futuristic-logo rounded-3xl border border-indigo-500/40 p-3 bg-slate-900/90 shadow-2xl">
            </div>
            <div class="space-y-2">
                <h1 class="text-3xl md:text-4xl font-extrabold tracking-widest bg-gradient-to-r from-indigo-400 via-sky-300 to-cyan-400 bg-clip-text text-transparent uppercase">Project CELSO</h1>
                <p class="text-xs md:text-sm text-indigo-300/80 tracking-wider font-mono">[ Click the glowing logo to initialize command hub ]</p>
            </div>
        </div>
    </div>

    <!-- PHASE 3: MAIN DASHBOARD HUB -->
    <div id="main-dashboard" class="opacity-0 transition-opacity duration-700 flex-1 flex flex-col hidden relative z-10">
        
        <!-- Header Navigation -->
        <header class="bg-slate-900/80 backdrop-blur-md border-b border-slate-800 sticky top-0 z-30 shadow-lg">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
                <div class="flex items-center space-x-3 cursor-pointer" onclick="resetToPortal()">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="w-10 h-10 object-contain rounded-lg bg-slate-800 p-1 border border-slate-700">
                    <div>
                        <h1 class="text-lg font-bold tracking-wide text-white">Project CELSO</h1>
                        <p class="text-xs text-indigo-400 font-mono">Cyber Enhanced Learning & Schools Operation</p>
                    </div>
                </div>
                <button onclick="resetToPortal()" class="text-xs font-mono text-slate-400 hover:text-white border border-slate-700 px-3 py-1.5 rounded-lg bg-slate-800/50 transition">
                    Lock Terminal
                </button>
            </div>
        </header>

        <!-- Command Center Content -->
        <main class="max-w-7xl mx-auto px-4 py-10 flex-1 w-full space-y-10">
            
            <div class="text-center space-y-2">
                <h2 class="text-3xl font-extrabold tracking-tight text-white">Operational Command Center</h2>
                <p class="text-sm text-slate-400">Select a functional sector below to access sub-systems and assets.</p>
            </div>

            <!-- Category Switcher Buttons -->
            <div class="flex flex-wrap justify-center gap-4">
                <button onclick="switchTab('applications')" id="btn-applications" class="tab-btn px-6 py-3 rounded-xl font-semibold text-sm transition bg-indigo-600 text-white shadow-lg shadow-indigo-600/30 border border-indigo-500">
                    Applications ({{ count($applications) + 2 }})
                </button>
                <button onclick="switchTab('services')" id="btn-services" class="tab-btn px-6 py-3 rounded-xl font-semibold text-sm transition bg-slate-900 text-slate-400 hover:text-white hover:bg-slate-800 border border-slate-800">
                    Services ({{ count($services) }})
                </button>
                <button onclick="switchTab('resources')" id="btn-resources" class="tab-btn px-6 py-3 rounded-xl font-semibold text-sm transition bg-slate-900 text-slate-400 hover:text-white hover:bg-slate-800 border border-slate-800">
                    Resources ({{ count($documents) }})
                </button>
            </div>

            <!-- TAB CONTENT GRIDS -->

            <!-- 1. APPLICATIONS -->
            <div id="content-applications" class="tab-content space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    
                    <!-- e-SF9 Generator Custom Card -->
                    <div class="bg-slate-900/70 backdrop-blur border border-slate-800 p-6 rounded-2xl hover:border-indigo-500/50 transition flex flex-col justify-between group shadow-xl">
                        <div>
                            <div class="w-12 h-12 bg-slate-800/80 border border-indigo-500/30 rounded-full flex items-center justify-center mb-4 overflow-hidden p-1 group-hover:scale-110 transition shadow-md">
                                <span class="text-indigo-400 font-bold font-mono text-xs">SF9</span>
                            </div>
                            <h3 class="font-semibold text-white text-base">e-SF9 Generator</h3>
                            <p class="text-xs text-slate-400 mt-1">Generate and manage student progress report cards securely.</p>
                        </div>
                        <a href="https://cffnhs-sf9.test/" target="_blank" rel="noopener noreferrer" class="mt-6 inline-flex items-center text-xs font-mono font-medium text-indigo-400 hover:text-indigo-300">
                            Launch Module &rarr;
                        </a>
                    </div>

                    <!-- Assessment Performance Tracker Custom Card -->
                    <div class="bg-slate-900/70 backdrop-blur border border-slate-800 p-6 rounded-2xl hover:border-indigo-500/50 transition flex flex-col justify-between group shadow-xl">
                        <div>
                            <div class="w-12 h-12 bg-slate-800/80 border border-indigo-500/30 rounded-full flex items-center justify-center mb-4 overflow-hidden p-1 group-hover:scale-110 transition shadow-md">
                                <span class="text-indigo-400 font-bold font-mono text-xs">APT</span>
                            </div>
                            <h3 class="font-semibold text-white text-base">Assessment Performance Tracker</h3>
                            <p class="text-xs text-slate-400 mt-1">Track and analyze learner test scores and performance assessments.</p>
                        </div>
                        <a href="https://cffnhs_exam_tracker.test/public" target="_blank" rel="noopener noreferrer" class="mt-6 inline-flex items-center text-xs font-mono font-medium text-indigo-400 hover:text-indigo-300">
                            Launch Module &rarr;
                        </a>
                    </div>

                    <!-- Database Applications -->
                    @foreach($applications as $app)
                        <div class="bg-slate-900/70 backdrop-blur border border-slate-800 p-6 rounded-2xl hover:border-indigo-500/50 transition flex flex-col justify-between group shadow-xl">
                            <div>
                                <div class="w-12 h-12 bg-slate-800/80 border border-indigo-500/30 rounded-full flex items-center justify-center mb-4 overflow-hidden p-1 group-hover:scale-110 transition shadow-md">
                                    @if(!empty($app->icon) && file_exists(public_path('logos/' . $app->icon)))
                                        <img src="{{ asset('logos/' . $app->icon) }}" alt="{{ $app->name }}" class="w-full h-full object-cover rounded-full">
                                    @else
                                        <span class="text-indigo-400 font-bold font-mono text-xs">{{ strtoupper(substr($app->name, 0, 2)) }}</span>
                                    @endif
                                </div>
                                <h3 class="font-semibold text-white text-base">{{ $app->name }}</h3>
                                <p class="text-xs text-slate-400 mt-1">{{ $app->description }}</p>
                            </div>
                            <a href="{{ $app->url }}" target="_blank" rel="noopener noreferrer" class="mt-6 inline-flex items-center text-xs font-mono font-medium text-indigo-400 hover:text-indigo-300">
                                Launch Module &rarr;
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- 2. SERVICES -->
            <div id="content-services" class="tab-content space-y-4 hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($services as $service)
                        <div class="bg-slate-900/70 backdrop-blur border border-slate-800 p-6 rounded-2xl hover:border-indigo-500/50 transition flex flex-col justify-between shadow-xl">
                            <div>
                                <h3 class="font-semibold text-white text-lg mb-2">{{ $service->title }}</h3>
                                <p class="text-sm text-slate-400 mb-6">{{ $service->description }}</p>
                            </div>
                            <a href="{{ $service->endpoint_url }}" target="_blank" rel="noopener noreferrer" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider transition text-center shadow-lg">
                                Open Gateway
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- 3. RESOURCES -->
            <div id="content-resources" class="tab-content space-y-4 hidden">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach($documents as $doc)
                        <div class="bg-slate-900/70 backdrop-blur border border-slate-800 p-5 rounded-2xl flex items-center justify-between hover:border-indigo-500/50 transition shadow-xl">
                            <span class="font-medium text-slate-200 text-sm">{{ $doc->title }}</span>
                            <a href="{{ $doc->file_path }}" target="_blank" rel="noopener noreferrer" class="text-indigo-400 hover:text-indigo-300 text-xs font-mono bg-indigo-500/10 border border-indigo-500/20 px-3 py-1.5 rounded-lg transition">
                                View PDF
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </main>

        <!-- Footer -->
        <footer class="bg-slate-900/40 border-t border-slate-800 mt-20 py-6 text-center text-xs text-slate-500 font-mono">
            <p>&copy; 2026 Project CELSO. Secure Terminal Online.</p>
        </footer>

    </div>

    <!-- Script Flow Controller with Unmuted Autoplay Handlers -->
    <script>
        const video = document.getElementById('intro-video');
        const videoSplash = document.getElementById('video-splash');
        const portalSplash = document.getElementById('portal-splash');
        const dashboard = document.getElementById('main-dashboard');

        video.muted = false;
        video.play().catch(() => {
            video.muted = true;
            video.play();
            
            const unlockAudio = () => {
                video.muted = false;
                window.removeEventListener('click', unlockAudio);
                window.removeEventListener('keydown', unlockAudio);
            };
            window.addEventListener('click', unlockAudio);
            window.addEventListener('keydown', unlockAudio);
        });

        video.onended = function() {
            transitionToPortal();
        };

        function transitionToPortal() {
            video.pause();
            videoSplash.style.opacity = '0';
            setTimeout(() => {
                videoSplash.style.display = 'none';
                portalSplash.classList.remove('pointer-events-none');
                portalSplash.style.opacity = '1';
            }, 700);
        }

        function enterDashboard() {
            portalSplash.style.opacity = '0';
            portalSplash.classList.add('pointer-events-none');
            setTimeout(() => {
                portalSplash.style.display = 'none';
                dashboard.classList.remove('hidden');
                setTimeout(() => {
                    dashboard.classList.remove('opacity-0');
                }, 50);
            }, 700);
        }

        function resetToPortal() {
            dashboard.classList.add('opacity-0');
            setTimeout(() => {
                dashboard.classList.add('hidden');
                portalSplash.style.display = 'flex';
                portalSplash.classList.remove('pointer-events-none');
                setTimeout(() => {
                    portalSplash.style.opacity = '1';
                }, 50);
            }, 700);
        }

        function switchTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.className = "tab-btn px-6 py-3 rounded-xl font-semibold text-sm transition bg-slate-900 text-slate-400 hover:text-white hover:bg-slate-800 border border-slate-800";
            });

            document.getElementById('content-' + tabName).classList.remove('hidden');

            const activeBtn = document.getElementById('btn-' + tabName);
            activeBtn.className = "tab-btn px-6 py-3 rounded-xl font-semibold text-sm transition bg-indigo-600 text-white shadow-lg shadow-indigo-600/30 border border-indigo-500";
        }
    </script>
</body>
</html>