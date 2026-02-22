<nav x-data="{ open: false }" class="bg-black border-b border-info shadow">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">

                <div class="shrink-0 flex items-center">

                   <a href="{{ route('chat.index') }}">
    InfiCode AI
</a>

                </div>

            </div>


            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button class="inline-flex items-center px-3 py-2 border border-info text-sm leading-4 font-medium rounded-md text-info bg-black hover:bg-info hover:text-black transition">

                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                ▼
                            </div>

                        </button>

                    </x-slot>


                    <x-slot name="content">

                    

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link :href="route('logout')"

                                onclick="event.preventDefault();
                                this.closest('form').submit();">

                                Log Out

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>


            <!-- Mobile button -->
            <div class="-me-2 flex items-center sm:hidden">

                <button @click="open = ! open"

                    class="inline-flex items-center justify-center p-2 rounded-md text-info">

                    ☰

                </button>

            </div>

        </div>

    </div>


    <!-- Mobile menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link :href="route('chat.index')">
                Chat
            </x-responsive-nav-link>

        </div>


        <div class="pt-4 pb-1 border-t border-info">

            <div class="px-4">

                <div class="font-medium text-base text-white">
                    {{ Auth::user()->name }}
                </div>

                <div class="font-medium text-sm text-info">
                    {{ Auth::user()->email }}
                </div>

            </div>


            <div class="mt-3 space-y-1">

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <x-responsive-nav-link :href="route('logout')"

                        onclick="event.preventDefault();
                        this.closest('form').submit();">

                        Log Out

                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>
