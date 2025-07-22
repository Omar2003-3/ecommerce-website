<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="" class="option1">
                            {{$product->name}}
                            </a>
                            <a href="" class="option2">
                            Buy Now
                            </a>
                            @auth
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-success btn-sm mt-2">Add to Cart</button>
                            </form>
                            @endauth
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="{{asset('storage/'.$product->image)}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$product->name}}
                        </h5>
                        <h6>
                            {{$product->price}} <span>
                                USD
                            </span>
                        </h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="btn-box">
            <a href="">
            View All products
            </a>
        </div>
    </div>
</section> 