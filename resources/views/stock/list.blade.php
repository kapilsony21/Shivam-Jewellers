<x-app-layout>
    <x-slot name="header">
        @include('stock.navigation')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="py-6 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('All Product/Stock') }}
            </h2>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <div class="grid grid-flow-col grid-cols-1 sm:overflow-x-scroll">
                            <div>
                                <table class="table table-fixed min-w-full">
                                    <thead>
                                        <tr>
                                            <th class="text-base p-4 text-start bg-slate-200 border-b-2">ID</th>
                                            <th class="text-base p-4 text-start bg-slate-200 border-b-2">Name</th>
                                            <th class="text-base p-4 text-start bg-slate-200 border-b-2">Description</th>
                                            <th class="text-base p-4 text-start bg-slate-200 border-b-2">Image</th>
                                            <th class="text-base p-4 text-end bg-slate-200 border-b-2">Price</th>
                                            <th class="text-base p-4 text-end bg-slate-200 border-b-2">Weight</th>
                                            <th class="text-base p-4 text-end bg-slate-200 border-b-2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td class="text-base p-4 text-start border-b-2 bg-slate-50">{{$product->id}}</td>
                                            <td class="text-base p-4 text-start border-b-2 bg-slate-50">{{$product->name}}</td>
                                            <td class="text-base p-4 text-start border-b-2 bg-slate-50">{{$product->description}}</td>
                                            <td class="text-base p-4 text-start border-b-2 bg-slate-50">
                                                @if ($product->image !== null)
                                                <img src={{$product->image}} class="w-48" />
                                                @endif
                                                <p>Not Uploaded</p>
                                            </td>
                                            <td class="p-4 text-end border-b-2 bg-slate-50">
                                            Rs. {{$product->price}}
                                            </td>
                                            <td class="text-base p-4 text-end border-b-2 bg-slate-50">
                                               gms. {{$product->weight}}
                                            </td>
                                            <td class="text-base p-4 text-end border-b-2 bg-slate-50">
                                                <a href="{{route('product.show',['id'=>$product->id])}}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Edit Product</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                    <tfoot>
            
                                    </tfoot>
                                </table>
                            </div>  
                   </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
