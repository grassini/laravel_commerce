<h1>Products</h1>

<ul>
    @foreach($products as $product)
        <li>{{ $product->name }}</li>
        <p>{{ $product->description }} - R$ {{ $product->price }},00</p>
        <br/>
    @endforeach
</ul>