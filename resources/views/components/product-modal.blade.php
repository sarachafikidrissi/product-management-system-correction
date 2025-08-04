<!-- Button to Open Modal -->
<button onclick="product_modal.showModal()"
    class="px-6 py-3 text-white bg-blue-600 rounded-lg shadow-lg hover:bg-blue-700 transition">
    Create Product
</button>

<!-- Modal -->
<dialog id="product_modal" class="p-6 bg-white rounded-lg shadow-lg w-[400px] ">
    <div class="flex flex-col justify-between mb-4 gap-y-2">
        <div class="flex justify-between items-center ">

            <h2 class="text-xl font-bold">Add product</h2>
            <button onclick="product_modal.close()" class="text-gray-600 hover:text-gray-900 text-2xl">&times;</button>
        </div>

        <form enctype="multipart/form-data" action="/product/store" method="post" class="flex flex-col gap-y-2">
            @csrf
            <div class="flex flex-col gap-y-2">
                <label for="" class="font-bold">Product Name</label>
                <input class="border" type="text" name="name" placeholder="eneter product name">
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="" class="font-bold">Price</label>
                <input class="border" type="number" name="price"  placeholder="eneter product price">
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="" class="font-bold">Description</label>
                <input class="border" type="text" name="description" placeholder="eneter product description">
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="" class="font-bold">Product Image</label>
                <input class="border" type="file" name="image"  accept='image/*' placeholder="eneter product name">
            </div>
            <button class="mt-4 bg-green-300 px-4 py-2 rounded-md">Submit</button>
        </form>
    </div>
</dialog>
