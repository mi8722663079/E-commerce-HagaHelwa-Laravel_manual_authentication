@extends("layouts.user.main")

@section("content")
        <section id="page-header">
        <h2>Super value deals</h2>
        <p>Save more woth coupons & up to 70% off!</p>
    </section>
    <!-- End Hero -->
    <!-- Start New Arrival or productCard Features -->
    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modren Desgin</p>
        <div class="pro-container">
        @foreach ( $prods as $product)
            <div class="pro">
                <img src="{{ asset("storage/$product->img") }}" alt="p1">
                <div class="des">
                    <span>{{ $product->category->name }}</span>
                    <h5>{{ $product->name }}</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>${{ $product->price }}</h4>
                    <a href="#" class="cart"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>        
        @endforeach

        </div>
    </section>

    <section style="margin-left:45vw;">
        {{ $prods->links() }}
    </section>
    
    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext ">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
        </div>
        <div class="form ">
            <input type="text " placeholder="Enter Your E-mail... ">
            <button class="normal ">Sign Up</button>
        </div>
    </section>
    @endsection
