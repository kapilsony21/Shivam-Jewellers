<!-- Primary Navigation Menu -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-6">
        <div class="flex">
            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('product.create')" :active="request()->routeIs('product.create')">
                    {{ __('Add New') }}
                </x-nav-link>
                <x-nav-link :href="route('product.all')" :active="request()->routeIs('product.all')">
                    {{ __('Products') }}
                </x-nav-link>
            </div>
        </div>