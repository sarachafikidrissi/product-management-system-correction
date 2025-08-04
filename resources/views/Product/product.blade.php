<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('components.product-modal')



                    <div class="overflow-x-auto mt-2">
                        <table class="w-full bg-white shadow-md rounded-lg border border-gray-200">
                            <thead>
                                <tr class="border-b">
                                    <th class="px-6 py-4 text-left text-gray-600 font-medium">Product Name</th>
                                    <th class="px-6 py-4 text-left text-gray-600 font-medium">Unit Price</th>
                                    <th class="px-6 py-4 text-left text-gray-600 font-medium">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 flex items-center gap-4">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product"
                                                class="w-12 h-12 rounded-md">
                                            <div>
                                                <p class="text-gray-800 font-medium">{{ $product->name }}</p>

                                            </div>
                                        </td>
                                        <td class="px-6 py-4">{{ $product->price }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap flex items-center">
                                            <button
                                                class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Edit</button>

                                            @role('admin')
                                                <form action="/product/destroy/{{ $product->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</button>
                                                </form>
                                            @endrole
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
