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
                    <table class="table-fixed min-w-full">
                        <thead>
                            <tr>
                                <th class="text-base p-2 text-start bg-slate-200 border-b-2">ID</th>
                                <th class="text-base p-2 text-start bg-slate-200 border-b-2">Name</th>
                                <th class="text-base p-2 text-start bg-slate-200 border-b-2">Description</th>
                                <th class="text-base p-2 text-start bg-slate-200 border-b-2">Image</th>
                                <th class="text-base p-2 text-end bg-slate-200 border-b-2">Price</th>
                                <th class="text-base p-2 text-end bg-slate-200 border-b-2">Weight</th>
                                <th class="text-base p-2 text-end bg-slate-200 border-b-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td class="text-base p-2 text-start bg-slate-500">{{$product->id}}</td>
                                <td class="text-base p-2 text-start bg-slate-500">{{$product->name}}</td>
                                <td class="text-base p-2 text-start bg-slate-500">{{$product->description}}</td>
                                <td class="text-base p-2 text-start bg-slate-500">
                                    <img src={{asset('storage/'.$product->image)}} class="w-48" />
                                </td>
                                <td class="text-base p-2 text-end bg-slate-500">
                                Rs. {{$product->price}}
                                </td>
                                <td class="text-base p-2 text-end bg-slate-500">
                                    {{$product->weight}}
                                </td>
                                <td class="text-base p-2 text-end bg-slate-500">
                                    Edit
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
</x-app-layout>
