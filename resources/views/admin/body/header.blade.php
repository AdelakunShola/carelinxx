 <style>
    .dropdown-menu {
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.2s, transform 0.2s;
        }
        .dropdown-menu.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }
        .sidebar.show {
            transform: translateX(0);
        }
        .overlay {
            display: none;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .overlay.show {
            display: block;
            opacity: 1;
        }
    </style>
   
 


<header class="sticky top-0 z-20 flex h-16 items-center justify-between border-b bg-white px-4 md:px-6">
        <div class="flex items-center gap-2">
            <button id="toggleSidebar" class="items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 hover:bg-gray-100 h-10 w-10 flex lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                    <path d="M4 12h16"></path>
                    <path d="M4 18h16"></path>
                    <path d="M4 6h16"></path>
                </svg>
                <span class="sr-only">Toggle sidebar</span>
            </button>
            <div class="hidden sm:block md:w-[350px]">
                <div class="relative w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-2.5 top-2.5 h-4 w-4 text-gray-500">
                        <path d="m21 21-4.34-4.34"></path>
                        <circle cx="11" cy="11" r="8"></circle>
                    </svg>
                    <input class="flex h-10 rounded-md border border-gray-300 px-3 py-2 text-sm w-full bg-white pl-8 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search shipments, clients, orders..." type="search">
                </div>
            </div>
        </div>
        
        <div class="flex items-center gap-2 md:gap-4">
            <!-- Theme Toggle -->
            <button class="inline-flex items-center justify-center text-sm font-medium transition-colors hover:bg-gray-100 h-8 w-8 p-2 bg-blue-50 rounded-full" aria-label="Switch to dark theme">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                    <circle cx="12" cy="12" r="4"></circle>
                    <path d="M12 2v2"></path>
                    <path d="M12 20v2"></path>
                    <path d="m4.93 4.93 1.41 1.41"></path>
                    <path d="m17.66 17.66 1.41 1.41"></path>
                    <path d="M2 12h2"></path>
                    <path d="M20 12h2"></path>
                    <path d="m6.34 17.66-1.41 1.41"></path>
                    <path d="m19.07 4.93-1.41 1.41"></path>
                </svg>
            </button>
            
          
        
                
               <!-- Notifications Dropdown -->
            <div class="relative">
                <button id="notificationButton" class="inline-flex items-center justify-center text-sm font-medium transition-colors hover:bg-gray-100 h-8 w-8 relative p-2 bg-blue-50 rounded-full" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 text-blue-600">
                        <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
                        <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path>
                    </svg>
                    <span class="absolute -right-1 -top-1 h-4 w-4 rounded-full bg-red-500 text-white flex items-center justify-center text-[10px]">3</span>
                </button>
                
                <!-- Notification Dropdown Menu -->
                <div id="notificationDropdown" class="dropdown-menu absolute right-0 mt-2 w-80 sm:w-96 bg-white rounded-md shadow-lg border border-gray-200 max-h-96 overflow-y-auto">
                    <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between">
                        <h3 class="font-semibold text-gray-900">Notifications</h3>
                        <button class="text-xs text-blue-600 hover:text-blue-700">Mark all as read</button>
                    </div>
                    <div class="divide-y divide-gray-100">
                        <!-- Notification 1 -->
                        <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition">
                            <div class="flex gap-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">New shipment arrived</p>
                                    <p class="text-xs text-gray-500 mt-1">Shipment #SH-2024-001 has been delivered to Lagos warehouse</p>
                                    <p class="text-xs text-blue-600 mt-1">2 minutes ago</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="inline-block w-2 h-2 bg-blue-600 rounded-full"></span>
                                </div>
                            </div>
                        </a>
                        
                        <!-- Notification 2 -->
                        <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition">
                            <div class="flex gap-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Payment received</p>
                                    <p class="text-xs text-gray-500 mt-1">Client Abiola Industries paid ₦2,500,000 for Order #ORD-456</p>
                                    <p class="text-xs text-blue-600 mt-1">1 hour ago</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="inline-block w-2 h-2 bg-blue-600 rounded-full"></span>
                                </div>
                            </div>
                        </a>
                        
                        <!-- Notification 3 -->
                        <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition">
                            <div class="flex gap-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-600">
                                        <path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                        <line x1="12" y1="9" x2="12" y2="13"></line>
                                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Delivery delay alert</p>
                                    <p class="text-xs text-gray-500 mt-1">Shipment #SH-2024-003 delayed due to customs clearance</p>
                                    <p class="text-xs text-blue-600 mt-1">3 hours ago</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="inline-block w-2 h-2 bg-blue-600 rounded-full"></span>
                                </div>
                            </div>
                        </a>
                        
                        <!-- Notification 4 (Read) -->
                        <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition bg-gray-50/50">
                            <div class="flex gap-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <line x1="19" y1="8" x2="19" y2="14"></line>
                                        <line x1="22" y1="11" x2="16" y2="11"></line>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-700">New client registered</p>
                                    <p class="text-xs text-gray-500 mt-1">Dangote Group has been added to your client list</p>
                                    <p class="text-xs text-gray-400 mt-1">Yesterday</p>
                                </div>
                            </div>
                        </a>
                        
                        <!-- Notification 5 (Read) -->
                        <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition bg-gray-50/50">
                            <div class="flex gap-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-700">Stock level low</p>
                                    <p class="text-xs text-gray-500 mt-1">Warehouse A has only 15% capacity remaining</p>
                                    <p class="text-xs text-gray-400 mt-1">2 days ago</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="px-4 py-3 border-t border-gray-200 text-center">
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-700 font-medium">View all notifications</a>
                    </div>
                </div>
            </div>
            
  
            
            <!-- User Dropdown -->
            <div class="relative">
                <button id="userMenuButton" class="inline-flex items-center justify-center text-sm font-medium transition-colors hover:bg-gray-100 h-8 w-8 p-2 bg-blue-50 rounded-full" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 text-blue-600">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </button>
                
                <!-- Dropdown Menu -->
                <div id="userDropdown" class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-200">
                    <div class="py-1">
                        <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Profile</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <span>Inbox</span>
                        </a>
                        <div class="border-t border-gray-200 my-1"></div>
                        <a href="{{ route('admin.logout') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <script>
        // Notification Dropdown Toggle
        const notificationButton = document.getElementById('notificationButton');
        const notificationDropdown = document.getElementById('notificationDropdown');

        notificationButton.addEventListener('click', (e) => {
            e.stopPropagation();
            notificationDropdown.classList.toggle('show');
            // Close user dropdown if open
            userDropdown.classList.remove('show');
        });

        // User Dropdown Toggle
        const userMenuButton = document.getElementById('userMenuButton');
        const userDropdown = document.getElementById('userDropdown');

        userMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('show');
            // Close notification dropdown if open
            notificationDropdown.classList.remove('show');
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', (e) => {
            if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.remove('show');
            }
            if (!notificationButton.contains(e.target) && !notificationDropdown.contains(e.target)) {
                notificationDropdown.classList.remove('show');
            }
        });

        // Sidebar Toggle
        const toggleSidebar = document.getElementById('toggleSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.add('show');
            sidebarOverlay.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebarFn() {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('show');
            document.body.style.overflow = '';
        }

        toggleSidebar.addEventListener('click', openSidebar);
        closeSidebar.addEventListener('click', closeSidebarFn);
        sidebarOverlay.addEventListener('click', closeSidebarFn);

        // Close sidebar on ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeSidebarFn();
            }
        });
    </script>
      



 
