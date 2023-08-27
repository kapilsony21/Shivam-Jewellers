<x-app-layout>
    <x-slot name="header">
        @include('stock.navigation')
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="py-6 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Product: ') . $product->name }}
            </h2>   
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Product Information') }}
                            </h2>
                    
                        </header>

                        <form method="post" action="{{ route('product.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('post')
                            <x-text-input name="id" type="hidden" :value="$product->id" />
                            <div class="mt-6">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input 
                                id="name" 
                                name="name" 
                                type="text" 
                                class="mt-1 block w-full" 
                                autofocus
                                :value="$product->name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div class="mt-6">
                                <x-input-label for="type" :value="__('Product Type')" />
                                <select name="type" id="type" class="border-gray-300 p-2 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option>Select Type</option>
                                    <option value="0" @if ($product->type == 0)
                                        {{__('selected')}}
                                    @endif>Gold</option>
                                    <option value="1" @if ($product->type == 1)
                                        {{__('selected')}}
                                    @endif>Silver</option>
                                </select>
                            <div class="mt-6">
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-input id="description" name="description" type="text" :value="$product->description" class="mt-1 block w-full" autofocus autocomplete="description" />
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                            <div class="mt-6">
                                <x-input-label for="image" :value="__('Image')" />
                                @if ($product->image !== null)
                                    <img src={{$product->image}} class="w-48" />
                                @endif
                                <x-text-input id="image" name="image" type="file" class="mt-1 block w-full"  autofocus autocomplete="image" />
                                <x-input-error class="mt-2" :messages="$errors->get('image')" />
                            </div>
                            <div class="mt-6">
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" :value="$product->price" name="price" type="number" step="any" class="mt-1 block w-full" autofocus autocomplete="price" />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>
                            <div class="mt-6">
                                <x-input-label for="weight" :value="__('Weight in grams')" />
                                <x-text-input id="weight" :value="$product->weight" name="weight" type="number" step="any" class="mt-1 block w-full"  autofocus autocomplete="weight" />
                                <x-input-error class="mt-2" :messages="$errors->get('weight')" />
                            </div>
                            <div class="mt-6">
                                <x-input-label for="quantity" :value="__('Quantity In Stock')" />
                                <x-text-input id="quantity" :value="$product->stock()->whereIn('type',[1,2])->sum('quantity')" name="quantity" type="number" class="mt-1 block w-full"  autofocus autocomplete="weight" />
                                <x-input-error class="mt-2" :messages="$errors->get('weight')" />
                            </div>
                            
                            <div class="flex items-center gap-4 mt-6" >
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                    
                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
