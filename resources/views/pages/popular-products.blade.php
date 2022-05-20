<div class="widget mercado-widget widget-product">
    <h2 class="widget-title">Popular Products</h2>
    <div class="widget-content">
        <ul class="products">
            @foreach ($products as $product)
                <li class="product-item">
                    <div class="product product-widget-style">
                        <div class="thumbnnail">
                            <a href="{{ route('product.details', ['product' => $product]) }}"
                                title="{{ $product->name }}">
                                <figure><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" alt="{{ $product->name }}"></figure>
                            </a>
                        </div>
                        <div class="product-info">
                            <a href="{{ route('product.details', ['product' => $product]) }}" class="product-name"><span>{{ $product->name }}</span></a>
                            <div class="wrap-price"><span class="product-price">${{ $product->price }}</span></div>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
</div>