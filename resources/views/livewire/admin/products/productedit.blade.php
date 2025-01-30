<div
    class="min-h-screen antialiased font-normal fi-body fi-panel-admin bg-gray-50 text-gray-950 dark:bg-gray-950 dark:text-white">
    <div class="p-5">
        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3 class="text-base font-semibold leading-6 fi-section-header-heading dark:text-white">
                        Edit Product
                    </h3>
                </div>
                <a href="{{ route('admin.show.prodcuts') }}"
                    class="fi-btn dark:bg-gray-800 relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
                    <span class="fi-btn-label">
                        Back to List
                    </span>
                </a>
            </div>
        </header>

        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-2 sm:col-span-1">
                <label for="product_name" class="block text-sm font-medium text-gray-700 dark:text-white">Product
                    Name</label>
                <input type="text" name="product_name" id="product_name" wire:model="product_name"
                    class="block dark:text-white  w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700  dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-white">Image</label>
                <input type="file" name="image" id="image" wire:model="image"
                    class="block w-full mt-1 rounded-md shadow-sm fi-input">
                @if ($current_image)
                    <img src="{{ $current_image }}" alt="Current Image" class="w-20 h-20 mt-2">
                @endif
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="description"
                    class="block text-sm font-medium text-gray-700 dark:text-white">Description</label>
                <textarea name="description" id="description" wire:model="description"
                    class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"></textarea>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="price" class="block text-sm font-medium text-gray-700 dark:text-white">Price</label>
                <input type="text" name="price" id="price" wire:model="price"
                    class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
            </div>
            <div class="col-span-2 sm:col-span-1">
                <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-white">Stock</label>
                <input type="text" name="stock" id="stock" wire:model="stock"
                    class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="category_id"
                    class="block text-sm font-medium text-gray-700 dark:text-white">Category</label>
                <select name="category_id" id="category_id" wire:model="category_id"
                    class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button wire:click="updateProduct" class="fi-btn fi-btn-primary">
                Update Product
            </button>
        </div>

        @if (session()->has('message'))
            <div class="mt-4 text-green-500">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
