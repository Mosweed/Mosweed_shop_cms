<div class="font-[sans-serif] bg-white  dark:bg-gray-900">
    <div class="p-4 mx-auto lg:max-w-7xl sm:max-w-full">


        <h2 class="mb-12 text-4xl font-extrabold text-gray-800 dark:text-white">Producten</h2>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

            @foreach ($products as $product)

                <div wire:key='{{ $product->id }}'
                    class="relative p-6 transition-all bg-gray-400 cursor-pointer rounded-2xl hover:-translate-y-2 dark:bg-gray-700">
                    <a href="{{ route('product.show', $product->id) }}">

                        <div class="w-11/12 h-[220px] overflow-hidden mx-auto aspect-w-16 aspect-h-8 md:mb-2 mb-4">
                            <img src="{{ $product->image }}" alt="{{ $product->product_name }}"
                                class="object-contain w-full h-full" />
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white">{{ $product->product_name }}
                            </h3>
                            <p class="mt-2 text-sm text-gray-500 dark:text-white">{{ $product->description }}</p>
                            <h4 class="mt-4 text-lg font-bold text-gray-700 dark:text-white">&euro;
                                {{ $product->price }}
                            </h4>
                        </div>

                    </a>
                </div>
            @endforeach




        </div>

    </div>
    <div class="justify-center w-auto px-5 pb-8 mt-4  dark:bg-gray-900 dark:text-white">
        {{ $products->links('pagination::tailwind') }}
    </div>
</div>
