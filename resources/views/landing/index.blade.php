@include('landing.header')    
    <section class="home" id="home">
      <div class="content">
        <h3>fresh coffee in the morning</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat labore, sint cupiditate distinctio tempora reiciendis.</p>
        <a href="#" class="btn">get yours now</a>
      </div>
    </section>
    
    <section class="about" id="about">
      <h1 class="heading"> <span>about</span> us </h1>
      <div class="row">
        <div class="image">
          <img src="{{ asset('land/images/about-img.jpeg') }}" alt="">
        </div>

        <div class="content">
          <h3>what makes our coffee special?</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus qui ea ullam, enim tempora ipsum fuga alias quae ratione a officiis id temporibus autem? Quod nemo facilis cupiditate. Ex, vel?</p>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit amet enim quod veritatis, nihil voluptas culpa! Neque consectetur obcaecati sapiente?</p>
          <a href="#" class="btn">learn more</a>
        </div>
      </div>
    </section>
    
    <section class="menu" id="makanan">
      <h1 class="heading"> our <span>menu</span></h1>
      <div class="box-container">
        <div class="box">
          <img src="{{ asset('land/images/menu-1.png') }}" alt="">
          <h3>tasty and healty</h3>
          <div class="price">$15.99 <span>20.99</span></div>
          <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
          <img src="{{ asset('land/images/menu-2.png') }}" alt="">
          <h3>tasty and healty</h3>
          <div class="price">$15.99 <span>20.99</span></div>
          <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
          <img src="{{ asset('land/images/menu-3.png') }}" alt="">
          <h3>tasty and healty</h3>
          <div class="price">$15.99 <span>20.99</span></div>
          <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
          <img src="{{ asset('land/images/menu-4.png') }}" alt="">
          <h3>tasty and healty</h3>
          <div class="price">$15.99 <span>20.99</span></div>
          <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
          <img src="{{ asset('land/images/menu-5.png') }}" alt="">
          <h3>tasty and healty</h3>
          <div class="price">$15.99 <span>20.99</span></div>
          <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
          <img src="{{ asset('land/images/menu-6.png') }}" alt="">
          <h3>tasty and healty</h3>
          <div class="price">$15.99 <span>20.99</span></div>
          <a href="#" class="btn">add to cart</a>
        </div>
      </div>
    </section>

    <section class="products" id="minuman">
      <h1 class="heading"> our <span>products</span></h1>
      <div class="box-container">
        <div class="box">
          <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
          <div class="image">
            <img src="{{ asset('land/images/product-1.png') }}" alt="">
          </div>
          <div class="content">
            <h3>fresh coffee</h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price">$15.99 <span>$20.99</span></div>
          </div>
        </div>

        <div class="box">
          <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
          <div class="image">
            <img src="{{ asset('land/images/product-2.png') }}" alt="">
          </div>
          <div class="content">
            <h3>fresh coffee</h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price">$15.99 <span>$20.99</span></div>
          </div>
        </div>
        <div class="box">
          <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
          </div>
          <div class="image">
            <img src="{{ asset('land/images/product-3.png') }}" alt="">
          </div>
          <div class="content">
            <h3>fresh coffee</h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price">$15.99 <span>$20.99</span></div>
          </div>
        </div>
      </div>
    </section>
@include('landing.footer')