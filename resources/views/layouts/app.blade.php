<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fakebook</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body class="bg-gray-100 font-sans">
    <nav class="bg-white shadow-sm border-b sticky top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-14 flex items-center justify-between">
            <!-- Left -->
            <div class="flex items-center space-x-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"
                    class="h-8 w-8" alt="FB Logo">
                <div class="relative">
                    <input type="text" placeholder="Search Fakebook"
                        class="bg-gray-100 pl-8 pr-4 py-1.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="absolute left-2 top-2.5 h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1111 3a7.5 7.5 0 015.65 13.65z" />
                    </svg>
                </div>
            </div>

            <!-- Middle -->
            <div class="flex space-x-10">
                <button class="relative text-blue-600 border-b-2 border-blue-600 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-house-icon lucide-house">
                        <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                        <path
                            d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    </svg>
                </button>
                <button class="text-gray-500 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-monitor-play-icon lucide-monitor-play">
                        <path
                            d="M10 7.75a.75.75 0 0 1 1.142-.638l3.664 2.249a.75.75 0 0 1 0 1.278l-3.664 2.25a.75.75 0 0 1-1.142-.64z" />
                        <path d="M12 17v4" />
                        <path d="M8 21h8" />
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                    </svg>
                </button>
                <button class="text-gray-500 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-store-icon lucide-store">
                        <path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7" />
                        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8" />
                        <path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4" />
                        <path d="M2 7h20" />
                        <path
                            d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7" />
                    </svg>
                </button>
                <button class="text-gray-500 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-users-round-icon lucide-users-round">
                        <path d="M18 21a8 8 0 0 0-16 0" />
                        <circle cx="10" cy="8" r="5" />
                        <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                    </svg>
                </button>
                <button class="text-gray-500 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-gamepad2-icon lucide-gamepad-2">
                        <line x1="6" x2="10" y1="11" y2="11" />
                        <line x1="8" x2="8" y1="9" y2="13" />
                        <line x1="15" x2="15.01" y1="12" y2="12" />
                        <line x1="18" x2="18.01" y1="10" y2="10" />
                        <path
                            d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z" />
                    </svg>
                </button>
            </div>

            <!-- Right-->
            <div class="flex items-center space-x-3">
                <button class="rounded-full p-2 bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-menu-icon lucide-menu">
                        <path d="M4 12h16" />
                        <path d="M4 18h16" />
                        <path d="M4 6h16" />
                    </svg>
                </button>
                <button class="rounded-full p-2 bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-message-circle-more-icon lucide-message-circle-more">
                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                        <path d="M8 12h.01" />
                        <path d="M12 12h.01" />
                        <path d="M16 12h.01" />
                    </svg>
                </button>
                <button class="relative rounded-full p-2 bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-bell-icon lucide-bell">
                        <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                        <path
                            d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326" />
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full px-1">1</span>
                </button>
                <div x-data="{ open: false }" class="relative">
                    <!-- profile button -->
                    <button @click="open = !open"
                        class="w-8 h-8 rounded-full bg-gray-600 text-white flex items-center justify-center text-sm font-semibold uppercase focus:outline-none">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </button>

                    <!--Log out dropdown -->
                    <div x-show="open" @click.outside="open = false"
                        class="absolute right-0 top-12 w-40 bg-white border rounded shadow-md z-50">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-md text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- Main Page Layout -->
    <div class="max-w-7xl mx-auto flex mt-6 px-4">
        <!-- Left Sidebar -->
        <aside class="w-1/4 hidden md:block pr-4  top-0 h-screen">
            <div class=" rounded  p-4 space-y-2">
                <a href="#" class=" flex gap-4 items-center font-semibold text-lg hover:bg-gray-100 p-2 rounded  "><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#3cadf7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-bot-message-square-icon lucide-bot-message-square">
                        <path d="M12 6V2H8" />
                        <path d="m8 18-4 4V8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2Z" />
                        <path d="M2 12h2" />
                        <path d="M9 11v2" />
                        <path d="M15 11v2" />
                        <path d="M20 12h2" />
                    </svg>Meta Ai</a>
                <a href="#" class="flex gap-4 items-center font-semibold text-lg hover:bg-gray-100 p-2 rounded"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#4fd4c2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-handshake-icon lucide-handshake">
                        <path d="m11 17 2 2a1 1 0 1 0 3-3" />
                        <path
                            d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4" />
                        <path d="m21 3 1 11h-2" />
                        <path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3" />
                        <path d="M3 4h8" />
                    </svg> Friends</a>
                <a href="#" class="flex gap-4 items-center font-semibold text-lg hover:bg-gray-100 p-2 rounded"> <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#43b2f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-history-icon lucide-history">
                        <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                        <path d="M3 3v5h5" />
                        <path d="M12 7v5l4 2" />
                    </svg>Memories</a>
                <a href="#" class="flex gap-4 items-center font-semibold text-lg hover:bg-gray-100 p-2 rounded"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#be45c5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-bookmark-icon lucide-bookmark">
                        <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" />
                    </svg> Saved</a>
                <a href="#" class="flex gap-4 items-center font-semibold text-lg hover:bg-gray-100 p-2 rounded"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#2397f8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-users-icon lucide-users">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <path d="M16 3.128a4 4 0 0 1 0 7.744" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <circle cx="9" cy="7" r="4" />
                    </svg> Groups</a>
                <a href="#" class="flex gap-4 items-center font-semibold text-lg hover:bg-gray-100 p-2 rounded"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#33afd0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-monitor-play-icon lucide-monitor-play">
                        <path
                            d="M10 7.75a.75.75 0 0 1 1.142-.638l3.664 2.249a.75.75 0 0 1 0 1.278l-3.664 2.25a.75.75 0 0 1-1.142-.64z" />
                        <path d="M12 17v4" />
                        <path d="M8 21h8" />
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                    </svg> Reels</a>
                <a href="#" class="flex gap-4 items-center font-semibold text-lg hover:bg-gray-100 p-2 rounded"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#20abdf" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-store-icon lucide-store">
                        <path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7" />
                        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8" />
                        <path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4" />
                        <path d="M2 7h20" />
                        <path
                            d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7" />
                    </svg> Marketplace</a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            @yield('content')
        </main>
        <aside class="w-1/4 hidden md:block pl-4">
            <div class=" p-4 space-y-2">
                <h1 class="text-lg font-semibold mb-2">Contacts</h1>

                <div id="contacts-list"></div>
            </div>
        </aside>
    </div>
    <script>
        const contacts = [
            { name: "John Doe" },
            { name: "Maria Cruz" },
            { name: "Alex Tan" },
            { name: "Ella Santos" },
        ];

        const container = document.getElementById("contacts-list");

        contacts.forEach(contact => {
            const firstLetter = contact.name.charAt(0).toUpperCase();

            const item = document.createElement("div");
            item.className = "flex items-center space-x-2 p-2 hover:bg-gray-100 rounded cursor-pointer";

            item.innerHTML = `
            <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center text-sm font-semibold uppercase">
                ${firstLetter}
            </div>
            <span class="text-sm font-medium">${contact.name}</span>
        `;

            container.appendChild(item);
        });
    </script>
</body>

</html>