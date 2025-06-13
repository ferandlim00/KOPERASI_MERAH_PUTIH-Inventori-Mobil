<nav x-data="{ open: false, dropdownOpen: false }" class="bg-red-600 border-b border-red-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 text-white">

            <!-- Navigation Links -->
            <div class="hidden sm:flex sm:space-x-8 items-center">
                <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200 {{ request()->routeIs('dashboard') ?  : '' }}">
                    INVENTORI MOBIL
                </a>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center">
                @guest
                    <a href="{{ route('login') }}" class="text-white hover:text-gray-200">Login</a>
                @else
                    <!-- Dropdown -->
                    <div class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center text-white hover:text-gray-200 focus:outline-none">
                            {{ Auth::user()->name }}
                            <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0L5.25 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute right-0 mt-2 w-40 bg-white text-black rounded shadow-lg z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Log Out</button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

            <!-- Mobile Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-red-600 text-white px-4 pt-2 pb-4">
        <a href="{{ route('dashboard') }}" class="block py-1">Dashboard</a>
        @guest
            <a href="{{ route('login') }}" class="block py-1">Login</a>
        @else
            <a href="{{ route('profile.edit') }}" class="block py-1">Profile</a>
            <form method="POST" action="{{ route('logout') }}" class="block py-1">
                @csrf
                <button type="submit">Log Out</button>
            </form>
        @endguest
    </div>
</nav>
