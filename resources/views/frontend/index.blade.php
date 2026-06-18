<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Sarab">
      <meta name="description" content="Sarab - Fast Food & Restaurant HTML Template">
      <title>Sarab - Fast Food & Restaurant HTML Template</title>
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet"/>
      <!-- Bootstrap 5.3 -->
      <link href="{{ asset('UI/css/bootstrap.min.css') }}" rel="stylesheet"/>
      <!-- AOS Animate on Scroll -->
      <link href="{{ asset('UI/css/aos.css') }}" rel="stylesheet"/>
      <!-- Swiper -->
      <link href="{{ asset('UI/css/swiper-bundle.min.css') }}" rel="stylesheet"/>
      <!-- all min css -->
      <link rel="stylesheet" href="{{ asset('UI/css/all.min.css') }}"/>
      <!-- magnific CSS -->
      <link rel="stylesheet" href="{{ asset('UI/css/magnific-popup.css') }}"/>
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('UI/css/style.css') }}" />
   </head>
   <body>
      <!-- ============================================================
         TOP BAR
         ============================================================ -->
      @if(
    !empty($contacts?->phone) ||
    !empty($contacts?->email) ||
    !empty($contacts?->address)
)

<div id="topbar">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

            <div class="top-contact d-flex flex-wrap">

                @if($contacts?->phone)
                    <span>
                        <i class="fas fa-phone-alt"></i>
                        {{ $contacts->phone }}
                    </span>
                @endif

                @if($contacts?->email)
                    <span>
                        <i class="fas fa-envelope"></i>
                        {{ $contacts->email }}
                    </span>
                @endif

                @if($contacts?->address)
                    <span>
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $contacts->address }}
                    </span>
                @endif

            </div>

            <div class="d-flex align-items-center gap-3">

                <span class="ttag">
                    <i class="fas fa-fire me-1"></i>
                    Free Delivery Today!
                </span>

                <div class="tsoc">

                    @if(!empty($contacts?->facebook))
                        <a href="{{ $contacts->facebook }}">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @endif

                    @if(!empty($contacts?->instagram))
                        <a href="{{ $contacts->instagram }}">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif

                    @if(!empty($contacts?->twitter))
                        <a href="{{ $contacts->twitter }}">
                            <i class="fab fa-twitter"></i>
                        </a>
                    @endif

                    @if(!empty($contacts?->youtube))
                        <a href="{{ $contacts->youtube }}">
                            <i class="fab fa-youtube"></i>
                        </a>
                    @endif

                </div>

            </div>

        </div>
    </div>
</div>

@endif
      <!-- ============================================================
         NAVBAR
         ============================================================ -->
      <nav class="navbar navbar-expand-lg" id="nav">
         <div class="container">
            <a class="navbar-brand" href="#">
               <div class="blogo">
                  <div class="bico"><i class="fas fa-utensils"></i></div>
                  <div>
                     <div class="bname">Sar<span>ab</span></div>
                     <div class="bsub">Fast Food & Restaurant</div>
                  </div>
               </div>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <i class="fas fa-bars" style="color:var(--primary);font-size:1.35rem;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                  <ul class="navbar-nav mx-auto">

    <ul class="navbar-nav mx-auto">

    @foreach($menus as $key => $menu)

        <li class="nav-item">

            <a class="nav-link"
               href="{{ $menu->url }}"
               target="{{ $menu->target }}">

                {{ $menu->title }}

            </a>

        </li>

    @endforeach

</ul>

</ul>
               <div class="d-flex align-items-center gap-1">
                  <!-- FIX 1: Search button -->
                  <button id="navSearchBtn" title="Search"><i class="fas fa-search"></i></button>
                  <a href="#menu" class="nav-link nav-cta"><i class="fas fa-shopping-bag me-1"></i>Order Now {{ $user->name ?? 'Guest' }}</a>
               </div>
            </div>
         </div>
      </nav>
      <!-- ============================================================
         FIX 1 � SEARCH OVERLAY POPUP
         ============================================================ -->
      <div id="searchOv">
         <button class="sovclose" id="searchClose"><i class="fas fa-times"></i></button>
         <div class="sovbox">
            <h4>What are you craving today?</h4>
            <div class="sovinput">
               <input type="text" id="searchInput" placeholder="Search burgers, pizza, chicken..." autocomplete="off"/>
               <button><i class="fas fa-search"></i></button>
            </div>
            <!-- Categories inside search box -->
            <div class="sovcats">
               <div class="sovcat active" data-cat="all">
                  <img src="{{ asset('UI/img/menu/1.jpg') }}" alt=""/>All Items
               </div>
               <div class="sovcat" data-cat="burgers">
                  <img src="{{ asset('UI/img/menu/1.jpg') }}" alt=""/>Burgers
               </div>
               <div class="sovcat" data-cat="pizza">
                  <img src="{{ asset('UI/img/menu/2.jpg') }}" alt=""/>Pizza
               </div>
               <div class="sovcat" data-cat="chicken">
                  <img src="{{ asset('UI/img/menu/3.jpg') }}" alt=""/>Chicken
               </div>
               <div class="sovcat" data-cat="wraps">
                  <img src="{{ asset('UI/img/menu/4.jpg') }}" alt=""/>Wraps
               </div>
               <div class="sovcat" data-cat="pasta">
                  <img src="{{ asset('UI/img/menu/5.jpg') }}" alt=""/>Pasta
               </div>
               <div class="sovcat" data-cat="desserts">
                  <img src="{{ asset('UI/img/menu/6.jpg') }}" alt=""/>Desserts
               </div>
            </div>
            <div class="sovtrend">
               <p><i class="fas fa-fire me-1" style="color:var(--secondary);"></i>Trending Searches</p>
               <span class="ttag">Smash Burger</span>
               <span class="ttag">Nashville Chicken</span>
               <span class="ttag">Truffle Pizza</span>
               <span class="ttag">Lava Cake</span>
               <span class="ttag">Loaded Fries</span>
               <span class="ttag">Mango Shake</span>
            </div>
         </div>
      </div>
      <!-- ============================================================
         HERO
         ============================================================ -->
      <section id="hero">
         <div class="hs hs1"></div>
         <div class="hs hs2"></div>
         <div class="hbgtxt">FOOD</div>
         <div class="container">
            <div class="row align-items-center g-5" style="min-height:88vh;">
               <div class="col-lg-6">
                  <div class="hbadge">
                     <div class="hbi"><i class="fas fa-star"></i></div>
                     @if($banner)
                        <span>{{ $banner->title }}</span>
                     @endif
                  </div>
                  <h1 class="htitle">
                     {{ $hero->title_line_1 ?? '' }}

                     <span class="hl">
                        {{ $hero->title_highlight ?? '' }}
                     </span>

                     <br>

                     {{ $hero->title_line_2 ?? '' }}
                  </h1>
                  <p class="hdesc">
                     {{ $hero->description ?? '' }}
                  </p>
                  <div class="d-flex flex-wrap gap-3 mb-2">
                     <a href="{{ $hero->button_link ?? '' }}" class="btn-red">
                        {{ $hero->button_text ?? '' }}
                     </a>
                     <!-- FIX 2: Magnific popup video trigger -->
					 <a href="https://www.youtube.com/watch?v=RXv_uIN6e-Y" class="magnific_popup btn-play popup-youtube">
						<div class="pico"><i class="fas fa-play"></i></div>
						<span>Watch Our Story</span>
					 </a>
                  </div>
                  <div class="hstats d-flex gap-3 flex-wrap mt-4">
                     <div class="hstat"><span class="snum">{{ $hero->stat1_number ?? '' }}</span>
                        <small>{{ $hero->stat1_text ?? '' }}</small></div>
                     <div class="sdiv"></div>
                     <div class="hstat"><span class="snum">{{ $hero->stat2_number ?? '' }}</span>
                        <small>{{ $hero->stat2_text ?? '' }}</small></div>
                     <div class="sdiv"></div>
                     <div class="hstat"><span class="snum">{{ $hero->stat3_number ?? '' }}</span>
                        <small>{{ $hero->stat3_text ?? '' }}</small></div>
                     <div class="sdiv"></div>
                     <div class="hstat"><span class="snum">{{ $hero->stat4_number ?? '' }}</span>
                     <small>{{ $hero->stat4_text ?? '' }}</small></div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div style="position:relative;text-align:center;">
                     <div class="hcircle">
                        <img src="{{ asset('uploads/banners/'.$banner->image) }}" alt="Burger"/>
                     </div>
                     @if(!empty($hero?->card1_title))
                  <div class="fcard fc1">
                     <div class="fcoi r">
                        <i class="fas fa-fire"></i>
                     </div>
                     <div>
                        <span class="fcnum">{{ $hero->card1_title }}</span>
                        <span class="fcsm">{{ $hero->card1_subtitle }}</span>
                     </div>
                  </div>
                  @endif

                  @if(!empty($hero?->card2_title))
                  <div class="fcard fc2">
                     <div class="fcoi y">
                        <i class="fas fa-star"></i>
                     </div>
                     <div>
                        <span class="fcnum">{{ $hero->card2_title }}</span>
                        <span class="fcsm">{{ $hero->card2_subtitle }}</span>
                     </div>
                  </div>
                  @endif

                  @if(!empty($hero?->card3_title))
                  <div class="fcard fc3">
                     <div class="fcoi g">
                        <i class="fas fa-clock"></i>
                     </div>
                     <div>
                        <span class="fcnum">{{ $hero->card3_title }}</span>
                        <span class="fcsm">{{ $hero->card3_subtitle }}</span>
                     </div>
                  </div>
                  @endif
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- MARQUEE -->
     @if(isset($marquees) && $marquees->count())

<div class="mqsec">
    <div class="mqtrack">

        @foreach($marquees as $marquee)
            <div class="mqitem">
                <i class="fas fa-circle"></i>
                {{ $marquee->title }}
            </div>
        @endforeach

        {{-- Duplicate for infinite scrolling --}}
        @foreach($marquees as $marquee)
            <div class="mqitem">
                <i class="fas fa-circle"></i>
                {{ $marquee->title }}
            </div>
        @endforeach

    </div>
</div>

@endif
      <!-- CATEGORY -->
      <section id="category">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
               <span class="slbl">What We Offer</span>
               <h2 class="stitle">Browse by <span>Category</span></h2>
               <div class="sline"></div>
               <p class="sdesc mx-auto" style="max-width:480px;">From sizzling burgers to exotic world cuisines - find your favourite in our menu</p>
            </div>
            <div class="row g-3 justify-content-center">

    

    {{-- Dynamic Categories --}}
    @if(isset($categories) && $categories->count())
    @foreach($categories as $category)

        <div class="col-6 col-sm-4 col-md-3 col-lg-2"
             data-aos="zoom-in">

            <div class="catcard"
                 data-filter="{{ Str::slug($category->name) }}">

                <img class="catimg"
                     src="{{ asset('uploads/categories/'.$category->image) }}"
                     alt="{{ $category->name }}">

                <div class="catnm">
                    {{ $category->name }}
                </div>

                <div class="catct">
                    {{ $category->products_count }} Items
                </div>

            </div>

        </div>

    @endforeach
    @endif

</div>
         </div>
      </section>
      <!-- ABOUT -->
      @if($about)

<section id="about">
    <div class="container">

        <div class="row align-items-center g-5">

            <!-- Images -->
            <div class="col-lg-5" data-aos="fade-right">

                <div class="astack">

                    <div class="aexp">

                        <span class="anum">
                            {{ $about->experience_years }}
                        </span>

                        <small>
                            {{ $about->experience_text }}
                        </small>

                    </div>

                    @if($about->main_image)

                    <div class="amain">

                        <img src="{{ asset('uploads/about/'.$about->main_image) }}"
                             alt="About Image">

                    </div>

                    @endif

                    @if($about->small_image)

                    <div class="asm">

                        <img src="{{ asset('uploads/about/'.$about->small_image) }}"
                             alt="About Small Image">

                    </div>

                    @endif

                </div>

            </div>

            <!-- Content -->
            <div class="col-lg-7" data-aos="fade-left">

                <span class="slbl">
                    {{ $about->small_title }}
                </span>

                <h2 class="stitle text-start">

                    {{ $about->title_line_1 }}

                    <span>
                        {{ $about->title_highlight }}
                    </span>

                </h2>

                <div class="sline lft"></div>

                <p class="sdesc mb-4">

                    {{ $about->description }}

                </p>

                <div class="mb-4">

                    @if($about->feature1_title)

                    <div class="fti">

                        <div class="ftico r">
                            <i class="fas fa-leaf"></i>
                        </div>

                        <div>

                            <h6>
                                {{ $about->feature1_title }}
                            </h6>

                            <p>
                                {{ $about->feature1_description }}
                            </p>

                        </div>

                    </div>

                    @endif

                    @if($about->feature2_title)

                    <div class="fti">

                        <div class="ftico y">
                            <i class="fas fa-award"></i>
                        </div>

                        <div>

                            <h6>
                                {{ $about->feature2_title }}
                            </h6>

                            <p>
                                {{ $about->feature2_description }}
                            </p>

                        </div>

                    </div>

                    @endif

                    @if($about->feature3_title)

                    <div class="fti">

                        <div class="ftico g">
                            <i class="fas fa-shipping-fast"></i>
                        </div>

                        <div>

                            <h6>
                                {{ $about->feature3_title }}
                            </h6>

                            <p>
                                {{ $about->feature3_description }}
                            </p>

                        </div>

                    </div>

                    @endif

                </div>

                @if($about->button_text)

                <a href="{{ $about->button_link }}"
                   class="btn-red">

                    <i class="fas fa-book-open"></i>

                    {{ $about->button_text }}

                </a>

                @endif

            </div>

        </div>

    </div>
</section>

@endif
      <!-- ============================================================
         MENU � FIX 3 (filter works) + FIX 4 (plus opens popup)
         ============================================================ -->
      <section id="menu">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
               <span class="slbl">What's Cooking</span>
               <h2 class="stitle">Our Delicious <span>Menu</span></h2>
               <div class="sline"></div>
            </div>
            <!-- FIX 3 � filter buttons -->
            <div class="text-center mb-4" data-aos="fade-up">
               <button class="filtbtn active" data-f="all">All</button>
               <button class="filtbtn" data-f="burgers">Burgers</button>
               <button class="filtbtn" data-f="pizza">Pizza</button>
               <button class="filtbtn" data-f="chicken">Chicken</button>
               <button class="filtbtn" data-f="wraps">Wraps</button>
               <button class="filtbtn" data-f="desserts">Desserts</button>
               <button class="filtbtn" data-f="pasta">Pasta</button>
            </div>
            <div class="row g-4" id="mgrid">
               <!-- CARD 1: Burgers -->
              @foreach($products as $key=>$product)
              
               <div class="col-sm-6 col-lg-4 mwrap" data-c="burgers" data-aos="fade-up">
                  <div class="mcard"
                     data-img="{{ asset('UI/img/products/'.$product->image) }}"
                     data-title="Classic Smash Burger"
                     data-cat="Burgers"
                     data-price="{{$product->price}}" data-old="$18.99"
                     data-rating="4.9" data-reviews="128"
                     data-cal="620" data-time="12"
                     data-desc="Double smashed patty, cheddar cheese, caramelized onions, house pickles and our legendary special sauce. Made fresh to order on a toasted brioche bun."
                     data-tags="Spicy,Bestseller,Beef">
                     <div class="mimg">
                        <img src="{{ asset('UI/img/products/'.$product->image) }}" alt="Smash Burger"/>
                        <div class="mbdg hot"><i class="fas fa-star"></i> Hot</div>
                        <div class="mhrt"><i class="far fa-heart"></i></div>
                     </div>
                     <div class="mbody">
                        <div class="mcat">Burgers</div>
                        <div class="mtit">{{$product->name}}</div>
                        <div class="mdesc">Double smashed patty, cheddar, caramelized onions, pickles &amp; special sauce</div>
                        <div class="mfoot">
                           <div>
                              <div class="mprice">{{$product->price}} <small>$18.99</small></div>
                              <div class="mstars"><i class="fas fa-star"></i> <span style="color:#bbb;font-size:.7rem;">(128)</span></div>
                           </div>
                           <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
               <!-- CARD 2: Pizza -->
               <!-- <div class="col-sm-6 col-lg-4 mwrap" data-c="pizza" data-aos="fade-up" data-aos-delay="80">
                  <div class="mcard"
                     data-img="{{ asset('UI/img/menu/2.jpg') }}"
                     data-title="Margherita Royale"
                     data-cat="Pizza"
                     data-price="$19.99" data-old="$24.99"
                     data-rating="4.8" data-reviews="95"
                     data-cal="480" data-time="18"
                     data-desc="San Marzano tomatoes, fresh buffalo mozzarella, fragrant basil leaves, drizzled with Italian truffle oil on a hand-stretched sourdough base."
                     data-tags="Vegetarian,New,Italian">
                     <div class="mimg">
                        <img src="{{ asset('UI/img/menu/2.jpg') }}" alt="Pizza"/>
                        <div class="mbdg new"><i class="fas fa-star"></i> New</div>
                        <div class="mhrt"><i class="far fa-heart"></i></div>
                     </div>
                     <div class="mbody">
                        <div class="mcat">Pizza</div>
                        <div class="mtit">Margherita Royale</div>
                        <div class="mdesc">San Marzano tomatoes, buffalo mozzarella, basil &amp; truffle oil on sourdough</div>
                        <div class="mfoot">
                           <div>
                              <div class="mprice">$19.99 <small>$24.99</small></div>
                              <div class="mstars"><i class="fas fa-star"></i> <span style="color:#bbb;font-size:.7rem;">(95)</span></div>
                           </div>
                           <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                        </div>
                     </div>
                  </div>
               </div> -->
               <!-- CARD 3: Chicken -->
               <!-- <div class="col-sm-6 col-lg-4 mwrap" data-c="chicken" data-aos="fade-up" data-aos-delay="160">
                  <div class="mcard"
                     data-img="{{ asset('UI/img/menu/3.jpg') }}"
                     data-title="Nashville Hot Chicken"
                     data-cat="Chicken"
                     data-price="$12.99" data-old="$16.99"
                     data-rating="5.0" data-reviews="210"
                     data-cal="710" data-time="15"
                     data-desc="Extra-crispy fried chicken tossed in our signature fiery Nashville spice blend, served with honey drizzle and house pickles on a toasted brioche bun."
                     data-tags="Spicy,Bestseller,Crispy">
                     <div class="mimg">
                        <img src="{{ asset('UI/img/menu/3.jpg') }}" alt="Chicken"/>
                        <div class="mbdg"><i class="fas fa-star"></i> Best Seller</div>
                        <div class="mhrt"><i class="far fa-heart"></i></div>
                     </div>
                     <div class="mbody">
                        <div class="mcat">Chicken</div>
                        <div class="mtit">Nashville Hot Chicken</div>
                        <div class="mdesc">Crispy fried chicken in fiery Nashville spice blend with honey drizzle</div>
                        <div class="mfoot">
                           <div>
                              <div class="mprice">$12.99 <small>$16.99</small></div>
                              <div class="mstars"><i class="fas fa-star"></i> <span style="color:#bbb;font-size:.7rem;">(210)</span></div>
                           </div>
                           <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                        </div>
                     </div>
                  </div>
               </div> -->
               <!-- CARD 4: Wraps -->
               <!-- <div class="col-sm-6 col-lg-4 mwrap" data-c="wraps" data-aos="fade-up">
                  <div class="mcard"
                     data-img="{{ asset('UI/img/menu/4.jpg') }}"
                     data-title="Loaded Fajita Wrap"
                     data-cat="Wraps"
                     data-price="$10.99" data-old=""
                     data-rating="4.5" data-reviews="74"
                     data-cal="520" data-time="10"
                     data-desc="Grilled chicken strips, saut�ed bell peppers and onions, sour cream, fresh guacamole and salsa wrapped in a warm flour tortilla with melted cheddar."
                     data-tags="Grilled,Fresh,Mexican">
                     <div class="mimg">
                        <img src="{{ asset('UI/img/menu/4.jpg') }}" alt="Wrap"/>
                        <div class="mhrt"><i class="far fa-heart"></i></div>
                     </div>
                     <div class="mbody">
                        <div class="mcat">Wraps</div>
                        <div class="mtit">Loaded Fajita Wrap</div>
                        <div class="mdesc">Grilled chicken, peppers, sour cream &amp; guacamole in a warm tortilla</div>
                        <div class="mfoot">
                           <div>
                              <div class="mprice">$10.99</div>
                              <div class="mstars"><i class="fas fa-star"></i> <span style="color:#bbb;font-size:.7rem;">(74)</span></div>
                           </div>
                           <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                        </div>
                     </div>
                  </div>
               </div> -->
               <!-- CARD 5: Desserts -->
               <!-- <div class="col-sm-6 col-lg-4 mwrap" data-c="desserts" data-aos="fade-up" data-aos-delay="80">
                  <div class="mcard"
                     data-img="{{ asset('UI/img/menu/5.jpg') }}"
                     data-title="Nutella Lava Cake"
                     data-cat="Desserts"
                     data-price="$8.99" data-old="$11.99"
                     data-rating="4.9" data-reviews="56"
                     data-cal="390" data-time="8"
                     data-desc="Warm molten chocolate cake with a gooey Nutella center, served alongside Madagascar vanilla bean ice cream with salted caramel drizzle and fresh berries."
                     data-tags="Sweet,New,Chocolate">
                     <div class="mimg">
                        <img src="{{ asset('UI/img/menu/5.jpg') }}" alt="Lava Cake"/>
                        <div class="mbdg new"><i class="fas fa-star"></i> New</div>
                        <div class="mhrt"><i class="far fa-heart"></i></div>
                     </div>
                     <div class="mbody">
                        <div class="mcat">Desserts</div>
                        <div class="mtit">Nutella Lava Cake</div>
                        <div class="mdesc">Molten chocolate cake with Nutella center, vanilla ice cream &amp; caramel</div>
                        <div class="mfoot">
                           <div>
                              <div class="mprice">$8.99 <small>$11.99</small></div>
                              <div class="mstars"><i class="fas fa-star"></i> <span style="color:#bbb;font-size:.7rem;">(56)</span></div>
                           </div>
                           <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                        </div>
                     </div>
                  </div>
               </div> -->
               <!-- CARD 6: Pasta -->
               <!-- <div class="col-sm-6 col-lg-4 mwrap" data-c="pasta" data-aos="fade-up" data-aos-delay="160">
                  <div class="mcard"
                     data-img="{{ asset('UI/img/menu/6.jpg') }}"
                     data-title="Truffle Mushroom Pasta"
                     data-cat="Pasta"
                     data-price="$16.99" data-old=""
                     data-rating="4.9" data-reviews="88"
                     data-cal="560" data-time="20"
                     data-desc="Al dente tagliatelle tossed with mixed wild mushrooms, freshly shaved black truffle, aged parmesan, fresh thyme and a touch of cream in garlic butter."
                     data-tags="Vegetarian,Chef's Pick,Italian">
                     <div class="mimg">
                        <img src="{{ asset('UI/img/menu/6.jpg') }}" alt="Pasta"/>
                        <div class="mbdg hot">Chef's Pick</div>
                        <div class="mhrt"><i class="far fa-heart"></i></div>
                     </div>
                     <div class="mbody">
                        <div class="mcat">Pasta</div>
                        <div class="mtit">Truffle Mushroom Pasta</div>
                        <div class="mdesc">Al dente tagliatelle, wild mushrooms, black truffle, parmesan &amp; thyme</div>
                        <div class="mfoot">
                           <div>
                              <div class="mprice">$16.99</div>
                              <div class="mstars"><i class="fas fa-star"></i> <span style="color:#bbb;font-size:.7rem;">(88)</span></div>
                           </div>
                           <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                        </div>
                     </div>
                  </div>
               </div> -->
            </div>
            <!-- end #mgrid -->
            <div class="text-center mt-5"><a href="#" class="btn-red"><i class="fas fa-th-large"></i>View Full Menu</a></div>
         </div>
      </section>
	  
	  
      <!-- ============================================================
         FIX 4 � MENU DETAIL POPUP MODAL
         ============================================================ -->
      <div id="menuPop">
         <div class="mpbox">
            <button class="mpclose" id="mpClose"><i class="fas fa-times"></i></button>
            <div class="mpimg"><img id="mpImg" src="" alt=""/></div>
            <div class="mpbody">
               <div id="mpCat"></div>
               <div id="mpTitle"></div>
               <div id="mpStars"></div>
               <div id="mpDesc"></div>
               <div id="mpPrice"></div>
               <div class="mpmeta" id="mpMeta"></div>
               <div class="mpqty">
                  <button class="mpqbtn" id="mpMinus">-</button>
                  <span class="mpqnum" id="mpQnum">1</span>
                  <button class="mpqbtn" id="mpPlus">+</button>
                  <span style="font-size:.82rem;color:#aaa;margin-left:9px;">portion</span>
               </div>
               <div class="mptags" id="mpTags"></div>
               <button class="mpaddcart" id="mpAddCart"><i class="fas fa-shopping-cart"></i>Add to Cart</button>
            </div>
         </div>
      </div>
      <!-- SPECIAL OFFER -->
      @if($offer)

<section id="special">

    <div class="spbg"></div>

    <div class="container" style="position:relative;z-index:2;">

        <div class="row align-items-center g-5">

            <div class="col-lg-6" data-aos="fade-right">

                <div class="sptag">
                    <i class="fas fa-bolt me-1"></i>
                    {{ $offer->badge }}
                </div>

                <h2 class="sptitle">

                    {{ $offer->title }}

                    <br>

                    <span>
                        {{ $offer->highlight_text }}
                    </span>

                </h2>

                <p class="spdesc">
                    {{ $offer->description }}
                </p>

                <div class="cdwrap">

                    <div class="cditem">
                        <span class="cdnum">
                            {{ str_pad($offer->hours,2,'0',STR_PAD_LEFT) }}
                        </span>
                        <span class="cdlbl">Hours</span>
                    </div>

                    <div class="cditem">
                        <span class="cdnum">
                            {{ str_pad($offer->minutes,2,'0',STR_PAD_LEFT) }}
                        </span>
                        <span class="cdlbl">Minutes</span>
                    </div>

                    <div class="cditem">
                        <span class="cdnum">
                            {{ str_pad($offer->seconds,2,'0',STR_PAD_LEFT) }}
                        </span>
                        <span class="cdlbl">Seconds</span>
                    </div>

                </div>

                <a href="{{ $offer->button_link }}"
                   class="btn-red">

                    <i class="fas fa-shopping-cart"></i>

                    {{ $offer->button_text }}

                </a>

            </div>

            <div class="col-lg-6" data-aos="fade-left">

                <div class="spimgw">

                    <div class="spglow"></div>

                    <div class="sppbdg">

                        <span class="old">
                            ${{ $offer->old_price }}
                        </span>

                        <span class="np">
                            ${{ $offer->new_price }}
                        </span>

                    </div>

                    <img src="{{ asset('uploads/offers/'.$offer->image) }}"
                         alt="{{ $offer->title }}">

                </div>

            </div>

        </div>

    </div>

</section>

@endif
	  
	  
      <!-- ============================================================
         GALLERY � FIX 7 (click opens detail popup)
         ============================================================ -->
      @if($foodShowcase)

<section id="gallery">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">

            <span class="slbl">
                {{ $foodShowcase->subtitle }}
            </span>

            <h2 class="stitle">
                {{ $foodShowcase->title }}
                <span>{{ $foodShowcase->highlight_text }}</span>
            </h2>

            <div class="sline"></div>

        </div>

        <div class="ggrid" data-aos="fade-up">

            @if($foodShowcase->image1)
            <div class="gitem">
                <img src="{{ asset('uploads/foodshowcase/'.$foodShowcase->image1) }}" alt="">
            </div>
            @endif

            @if($foodShowcase->image2)
            <div class="gitem">
                <img src="{{ asset('uploads/foodshowcase/'.$foodShowcase->image2) }}" alt="">
            </div>
            @endif

            @if($foodShowcase->image3)
            <div class="gitem">
                <img src="{{ asset('uploads/foodshowcase/'.$foodShowcase->image3) }}" alt="">
            </div>
            @endif

            @if($foodShowcase->image4)
            <div class="gitem">
                <img src="{{ asset('uploads/foodshowcase/'.$foodShowcase->image4) }}" alt="">
            </div>
            @endif

            @if($foodShowcase->image5)
            <div class="gitem">
                <img src="{{ asset('uploads/foodshowcase/'.$foodShowcase->image5) }}" alt="">
            </div>
            @endif

        </div>

    </div>
</section>

@endif
      <!-- FIX 7 � GALLERY POPUP -->
      <div id="galPop">
         <div class="gpbox">
            <button class="gpclose" id="gpClose"><i class="fas fa-times"></i></button>
            <img id="gpImg" src="" alt=""/>
            <div class="gpcap">
               <h5 id="gpTitle"></h5>
               <p id="gpDesc"></p>
            </div>
            <div class="gpnav">
               <button id="gpPrev"><i class="fas fa-chevron-left me-1"></i>Prev</button>
               <button id="gpNext">Next <i class="fas fa-chevron-right ms-1"></i></button>
            </div>
         </div>
      </div>
	  
	  
      <!-- ============================================================
         HISTORY � FIX 8 (alternating left/right text)
         ============================================================ -->
      <section id="history">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
               <span class="slbl">Our Journey</span>
               <h2 class="stitle">A History of <span>Restaurant</span></h2>
               <div class="sline"></div>
               <p class="sdesc mx-auto" style="max-width:480px;">From humble beginnings to the city's most beloved restaurant - every chapter written with passion.</p>
            </div>
            <section id="history">
    <div class="container">

        <div class="timeline" data-aos="fade-up">

            @foreach($journeys as $index => $journey)

                <div class="tli">

                    {{-- LEFT SIDE --}}
                    <div class="tl-left">

                        @if($index % 2 == 0)

                            <div class="tlyear">
                                {{ $journey->year }}
                            </div>

                            <h5>
                                {{ $journey->title }}
                            </h5>

                            <p>
                                {{ $journey->description }}
                            </p>

                        @endif

                    </div>

                    {{-- CENTER DOT --}}
                    <div class="tl-center">
                        <div class="tldot"></div>
                    </div>

                    {{-- RIGHT SIDE --}}
                    <div class="tl-right">

                        @if($index % 2 != 0)

                            <div class="tlyear">
                                {{ $journey->year }}
                            </div>

                            <h5>
                                {{ $journey->title }}
                            </h5>

                            <p>
                                {{ $journey->description }}
                            </p>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    </div>
</section>
         </div>
      </section>
	  
	  
      <!-- CHEFS -->
      <!-- CHEFS -->
<section id="chefs">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">
            <span class="slbl">The Culinary Team</span>
            <h2 class="stitle">
                Meet Our Expert
                <span>Chefs</span>
            </h2>
            <div class="sline"></div>
        </div>

        <div class="row g-4">

            @foreach($chefs as $chef)

            <div class="col-sm-6 col-lg-3"
                 data-aos="fade-up">

                <div class="chcard">

                    <div class="chimg">

                        <img src="{{ asset('uploads/chefs/'.$chef->image) }}"
                             alt="{{ $chef->name }}">

                        <div class="chsoc">

                            @if($chef->instagram)
                            <a href="{{ $chef->instagram }}">
                                <i class="fab fa-instagram"></i>
                            </a>
                            @endif

                            @if($chef->facebook)
                            <a href="{{ $chef->facebook }}">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            @endif

                            @if($chef->twitter)
                            <a href="{{ $chef->twitter }}">
                                <i class="fab fa-twitter"></i>
                            </a>
                            @endif

                        </div>

                    </div>

                    <div class="chbody">

                        <div class="chnm">
                            {{ $chef->name }}
                        </div>

                        <div class="chrole">
                            {{ $chef->designation }}
                        </div>

                        <div class="chexp">
                            {{ $chef->experience }}
                            Years Experience
                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>
</section>
	  
	  
      <!-- HOURS -->
      <section id="hours">
         <div class="hrsbg"></div>
         <div class="container" style="position:relative;z-index:2;">
            <div class="text-center mb-5" data-aos="fade-up">
               <span class="slbl" style="color:#a5d6bc;">Opening Hours</span>
               <h2 class="stitle" style="color:#fff;">We're Open <span style="color:var(--secondary);">For You</span></h2>
               <div class="sline"></div>
            </div>
            <div class="row g-4 align-items-start">
               <div class="col-lg-5" data-aos="fade-right">

    <div class="hrscard">

        @foreach($openingHours as $hour)

        <div class="hrsrow">

            <span class="hrsday">
                <i class="fas fa-calendar-day me-2"
                   style="color:var(--secondary);"></i>

                {{ $hour->day_name }}
            </span>

            <div class="d-flex align-items-center gap-2">

                @if($hour->is_closed)

                    <div class="hdot off"></div>

                    <span class="hrstime text-danger">
                        Closed
                    </span>

                @else

                    <div class="hdot on"></div>

                    <span class="hrstime">

                        {{ date('h:i A', strtotime($hour->opening_time)) }}

                        -

                        {{ date('h:i A', strtotime($hour->closing_time)) }}

                    </span>

                @endif

            </div>

        </div>

        @endforeach

    </div>

</div>
               <div class="col-lg-3" data-aos="zoom-in">
                  <div class="hrscta">
                     <i class="fas fa-truck-fast fa-2x mb-3" style="color:rgba(255,255,255,.8);"></i>
                     <h4>Order Online</h4>
                     <p>Get hot food delivered in 25 minutes</p>
                     <a href="#menu" class="btnw">Order Now ?</a>
                  </div>
               </div>
               <div class="col-lg-4" data-aos="fade-left">
                  <div class="hrscard">
                     <h5 style="color:#fff;margin-bottom:18px;font-family:'Poppins',sans-serif;font-size:.95rem;font-weight:700;"><i class="fas fa-map-marker-alt me-2" style="color:var(--secondary);"></i>Find Us</h5>
                     <div class="hrsrow"><span class="hrsday"><i class="fas fa-location-dot me-2" style="color:var(--secondary);"></i>Address</span><span class="hrstime" style="font-size:.8rem;">
                        {{ $contacts->address ?? '' }}
                     </span></div>
                     <div class="hrsrow"><span class="hrsday"><i class="fas fa-phone me-2" style="color:var(--secondary);"></i>Phone</span><span class="hrstime" style="font-size:.8rem;">
                        {{ $contacts->phone ?? '' }}
                     </span></div>
                     <div class="hrsrow"><span class="hrsday"><i class="fas fa-envelope me-2" style="color:var(--secondary);"></i>Email</span><span class="hrstime" style="font-size:.8rem;">
                        {{ $contacts->email ?? '' }}
                     </span></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
	  
	  
      <!-- TESTIMONIALS -->
      <section id="testimonials">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
               <span class="slbl">What People Say</span>
               <h2 class="stitle">Our Customers <span>Feedback</span></h2>
               <div class="sline"></div>
            </div>
            <div class="swiper tesSwiper" data-aos="fade-up">
               <div class="swiper-wrapper">

@foreach($feedbacks as $feedback)

<div class="swiper-slide">

    <div class="tescard">

        <div class="tesq">"</div>

        <div class="tess">

            @for($i=1; $i<=5; $i++)

                @if($i <= $feedback->rating)
                    &#9733;
                @else
                    &#9734;
                @endif

            @endfor

        </div>

        <p class="testxt">
            {{ $feedback->message }}
        </p>

        <div class="tesauth">

            @if($feedback->image)

                <img src="{{ asset($feedback->image) }}"
                     alt="{{ $feedback->name }}">

            @else

                <img src="{{ asset('UI/img/testimonial/1.jpg') }}"
                     alt="User">

            @endif

            <div>

                <div class="tesnm">
                    {{ $feedback->name }}
                </div>

                <div class="tesrl">
                    {{ $feedback->designation }}
                </div>

            </div>

        </div>

    </div>

</div>

@endforeach

</div>
               <div class="swiper-pagination mt-4" style="position:static;"></div>
            </div>
         </div>
      </section>
	  
       @include('frontend.feedback-form')
      <!-- RESERVATION FORM -->
      <section id="reservation">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
               <span class="slbl">Book a Table</span>
               <h2 class="stitle">Make a <span>Reservation</span></h2>
               <div class="sline"></div>
               <p class="sdesc mx-auto" style="max-width:480px;">Reserve your table for a memorable dining experience. We recommend booking 24 hours in advance for weekend evenings.</p>
            </div>
            <div class="row g-4 align-items-start">
               @php
               $showReservationCard = isset($contact) && (
                  !empty($contact->opening_hours) ||
                  !empty($contact->phone) ||
                  !empty($contact->group_dining) ||
                  !empty($contact->address)
               );
               @endphp

               @if($showReservationCard)
               <div class="col-lg-4" data-aos="fade-right">
                  <div style="background:var(--dark);border-radius:18px;padding:36px;">
                     <h4 style="color:#fff;font-size:1.3rem;margin-bottom:8px;">Contact Info</h4>
                     <p style="color:rgba(255,255,255,.55);font-size:.85rem;margin-bottom:26px;">We're happy to help you plan the perfect dining experience.</p>
                     <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-center gap-3">
                           <div style="width:46px;height:46px;border-radius:11px;background:rgba(232,40,26,.2);display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:1.1rem;flex-shrink:0;"><i class="fas fa-clock"></i></div>
                           <div><strong style="display:block;color:#ccc;font-size:.78rem;text-transform:uppercase;letter-spacing:.8px;">Opening Hours</strong><span style="color:#fff;font-size:.87rem;">
                              {{ $contacts->opening_hours ?? '' }}
                           </span></div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                           <div style="width:46px;height:46px;border-radius:11px;background:rgba(232,40,26,.2);display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:1.1rem;flex-shrink:0;"><i class="fas fa-phone-alt"></i></div>
                           <div><strong style="display:block;color:#ccc;font-size:.78rem;text-transform:uppercase;letter-spacing:.8px;">Call for Booking</strong><span style="color:#fff;font-size:.87rem;">
                              {{ $contacts->phone ?? '' }}
                           </span></div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                           <div style="width:46px;height:46px;border-radius:11px;background:rgba(232,40,26,.2);display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:1.1rem;flex-shrink:0;"><i class="fas fa-users"></i></div>
                           <div><strong style="display:block;color:#ccc;font-size:.78rem;text-transform:uppercase;letter-spacing:.8px;">Group Dining</strong><span style="color:#fff;font-size:.87rem;">
                              {{ $contacts->group_dining ?? '' }}
                           </span></div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                           <div style="width:46px;height:46px;border-radius:11px;background:rgba(232,40,26,.2);display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:1.1rem;flex-shrink:0;"><i class="fas fa-map-marker-alt"></i></div>
                           <div><strong style="display:block;color:#ccc;font-size:.78rem;text-transform:uppercase;letter-spacing:.8px;">Location</strong><span style="color:#fff;font-size:.87rem;">
                              {{ $contacts->address ?? '' }}
                           </span></div>
                        </div>
                     </div>
                  </div>
               </div>
               @endif
               <div class="{{ $showReservationCard ? 'col-lg-8' : 'col-lg-12' }}" data-aos="fade-left">
                  <div class="form-card">
                     <form action="{{ route('reservation.store') }}" method="POST">
    @csrf

    <div class="row g-3">

        <div class="col-sm-6">
            <label class="flbl">Full Name *</label>
            <input type="text"
                   name="full_name"
                   class="fctrl"
                   required>
        </div>

        <div class="col-sm-6">
            <label class="flbl">Phone Number *</label>
            <input type="text"
                   name="phone"
                   class="fctrl"
                   required>
        </div>

        <div class="col-sm-6">
            <label class="flbl">Email Address *</label>
            <input type="email"
                   name="email"
                   class="fctrl"
                   required>
        </div>

        <div class="col-sm-6">
            <label class="flbl">Number of Guests *</label>

            <select name="guests" class="fctrl">
                <option value="1 Person">1 Person</option>
                <option value="2 People">2 People</option>
                <option value="3-4 People">3 - 4 People</option>
                <option value="5-6 People">5 - 6 People</option>
            </select>
        </div>

        <div class="col-sm-6">
            <label class="flbl">Date *</label>

            <input type="date"
                   name="date"
                   class="fctrl"
                   required>
        </div>

        <div class="col-sm-6">
            <label class="flbl">Time *</label>

            <select name="time" class="fctrl">
                <option>09:00 AM</option>
                <option>10:00 AM</option>
                <option>11:00 AM</option>
                <option>12:00 PM</option>
            </select>
        </div>

        <div class="col-12">
            <label class="flbl">Special Requests</label>

            <textarea name="special_request"
                      class="fctrl"
                      rows="3"></textarea>
        </div>

        <div class="col-12">
            <button type="submit"
                    class="btn-red w-100 justify-content-center">
                <i class="fas fa-calendar-check"></i>
                Confirm Reservation
            </button>
        </div>

    </div>

</form>
                     <div class="sucmsg" id="resOk">
                        <i class="fas fa-check-circle"></i>
                        <p>Table reserved! We'll confirm via email shortly.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
	  
      <!-- BLOG -->
      <section id="blog">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
               <span class="slbl">News &amp; Updates</span>
               <h2 class="stitle">Our Latest <span>Blog</span> Posts</h2>
               <div class="sline"></div>
            </div>
            <div class="row g-4">
               <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                  <div class="blcard">
                     <div class="blimg">
                        <img src="{{ asset('UI/img/blog/1.jpg') }}" alt=""/>
                        <div class="bldatebdg"><span class="bd">14</span><span class="bm">Mar</span></div>
                     </div>
                     <div class="blbody">
                        <div class="bltag">Food &amp; Health</div>
                        <div class="bltit"><a href="#">Healthy Fast Food: A Myth or Beautiful Reality</a></div>
                        <div class="blmeta"><span><i class="fas fa-user"></i>James Writer</span><span><i class="fas fa-comment"></i>24 Comments</span></div>
                        <a href="#" class="blmore">Read More <i class="fas fa-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="80">
                  <div class="blcard">
                     <div class="blimg">
                        <img src="{{ asset('UI/img/blog/2.jpg') }}" alt=""/>
                        <div class="bldatebdg"><span class="bd">28</span><span class="bm">Feb</span></div>
                     </div>
                     <div class="blbody">
                        <div class="bltag">Food Science</div>
                        <div class="bltit"><a href="#">Is Fast Food Getting Healthier? Here's What We Found</a></div>
                        <div class="blmeta"><span><i class="fas fa-user"></i>Sarah Grain</span><span><i class="fas fa-comment"></i>18 Comments</span></div>
                        <a href="#" class="blmore">Read More <i class="fas fa-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="160">
                  <div class="blcard">
                     <div class="blimg">
                        <img src="{{ asset('UI/img/blog/3.jpg') }}" alt=""/>
                        <div class="bldatebdg"><span class="bd">05</span><span class="bm">Jan</span></div>
                     </div>
                     <div class="blbody">
                        <div class="bltag">Recipes</div>
                        <div class="bltit"><a href="#">Innovative Hot Chickpeas Flake Crackin' Recipe at Home</a></div>
                        <div class="blmeta"><span><i class="fas fa-user"></i>Chef Marcus</span><span><i class="fas fa-comment"></i>32 Comments</span></div>
                        <a href="#" class="blmore">Read More <i class="fas fa-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
	  
      <!-- NEWSLETTER -->
      <section id="newsletter">
         <div class="nlbg"></div>
         <div class="container">
            <div class="nlw text-center" data-aos="zoom-in">
               <span class="slbl" style="color:rgba(255,255,255,.7);">Stay Connected</span>
               <h2 class="mb-3" style="color:#fff;">Subscribe &amp; Get Exclusive <span style="color:var(--secondary);">Deals</span></h2>
               <p class="mb-4" style="color:rgba(255,255,255,.78);">Get 15% off your first order plus early access to new menu items</p>
               <div class="nl-form-wrap">
                  <input class="nlinput" type="email" id="nlEmail" placeholder="Enter your email address..."/>
                  <button class="nlbtn" id="nlBtn"><i class="fas fa-paper-plane me-1"></i>Subscribe</button>
               </div>
               <p style="color:rgba(255,255,255,.45);font-size:.76rem;margin-top:11px;"><i class="fas fa-lock me-1"></i>No spam, unsubscribe anytime.</p>
            </div>
         </div>
      </section>
	  
      <!-- ============================================================
         FIX 6 � CONTACT FORM
         ============================================================ -->

         @php
$showContactCard = $contacts && (
    !empty($contacts->address) ||
    !empty($contacts->phone) ||
    !empty($contacts->email) ||
    !empty($contacts->opening_hours) ||
    !empty($contacts->facebook) ||
    !empty($contacts->instagram) ||
    !empty($contacts->twitter) ||
    !empty($contacts->linkedin) ||
    !empty($contacts->youtube)
);
@endphp

      <section id="contact-section" class="py-5">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
               <span class="slbl">Get In Touch</span>
               <h2 class="stitle">Contact <span>Us</span></h2>
               <div class="sline"></div>
               <p class="sdesc mx-auto" style="max-width:480px;">Have a question, feedback, or want to plan a special event? We'd love to hear from you.</p>
            </div>
            <div class="row g-4">

@if($showContactCard)

<div class="col-lg-4" data-aos="fade-right">
    <div class="ctdark">
        <h4>Let's Talk</h4>

        @if($contacts->address)
        <div class="ctitem">
            <div class="cticon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="ctinfo">
                <strong>Address</strong>
                <span>{{ $contacts->address }}</span>
            </div>
        </div>
        @endif

        @if($contacts->phone)
        <div class="ctitem">
            <div class="cticon">
                <i class="fas fa-phone-alt"></i>
            </div>
            <div class="ctinfo">
                <strong>Phone</strong>
                <span>{{ $contacts->phone }}</span>
            </div>
        </div>
        @endif

        @if($contacts->email)
        <div class="ctitem">
            <div class="cticon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="ctinfo">
                <strong>Email</strong>
                <span>{{ $contacts->email }}</span>
            </div>
        </div>
        @endif

        @if($contacts->opening_hours)
        <div class="ctitem">
            <div class="cticon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="ctinfo">
                <strong>Working Hours</strong>
                <span>{{ $contacts->opening_hours }}</span>
            </div>
        </div>
        @endif

        <div class="ctsocrow">
            @if($contacts->facebook)
                <a href="{{ $contacts->facebook }}">
                    <i class="fab fa-facebook-f"></i>
                </a>
            @endif

            @if($contacts->instagram)
                <a href="{{ $contacts->instagram }}">
                    <i class="fab fa-instagram"></i>
                </a>
            @endif

            @if($contacts->twitter)
                <a href="{{ $contacts->twitter }}">
                    <i class="fab fa-twitter"></i>
                </a>
            @endif

            @if($contacts->youtube)
                <a href="{{ $contacts->youtube }}">
                    <i class="fab fa-youtube"></i>
                </a>
            @endif
        </div>

    </div>
</div>

<div class="col-lg-8" data-aos="fade-left">

@else

<div class="col-lg-12" data-aos="fade-left">

@endif
               
               <div class="{{ $showContactCard ? 'col-lg-8' : 'col-lg-12' }}" data-aos="fade-left">
                  <div class="fcard">
                     <form action="{{ route('contact.store') }}" method="POST">
    @csrf

    <div class="row g-3">

        <div class="col-sm-6">
            <label class="flbl">Your Name *</label>
            <input type="text"
                   name="name"
                   class="fctrl"
                   required>
        </div>

        <div class="col-sm-6">
            <label class="flbl">Email Address *</label>
            <input type="email"
                   name="email"
                   class="fctrl"
                   required>
        </div>

        <div class="col-sm-6">
            <label class="flbl">Phone Number</label>
            <input type="text"
                   name="phone"
                   class="fctrl">
        </div>

        <div class="col-sm-6">
            <label class="flbl">Subject *</label>

            <select name="subject"
                    class="fctrl">

                <option value="General Inquiry">
                    General Inquiry
                </option>

                <option value="Catering & Events">
                    Catering & Events
                </option>

                <option value="Feedback">
                    Feedback
                </option>

                <option value="Partnership">
                    Partnership
                </option>

                <option value="Media & Press">
                    Media & Press
                </option>

            </select>
        </div>

        <div class="col-12">
            <label class="flbl">Message *</label>

            <textarea name="message"
                      class="fctrl"
                      rows="5"
                      required></textarea>
        </div>

        <div class="col-12">
            <button type="submit"
                    class="btn-red">
                <i class="fas fa-paper-plane"></i>
                Send Message
            </button>
        </div>

    </div>

</form>
                     <div class="sucmsg" id="ctcOk">
                        <i class="fas fa-check-circle"></i>
                        <p>Message sent! We'll reply within 2 hours.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
	  
      <!-- FOOTER -->
      <footer>
         <div class="container">
            <div class="row g-5">
               <div class="col-lg-4">
                  <div class="fnm">Sar<span>ab</span></div>
                  <p class="fdesc">We bring the world's finest flavors together in a fast, friendly, and affordable experience. Every meal crafted with love.</p>
                  <div class="fsoc">
                     <a href="{{ $contacts->facebook ?? '#' }}"><i class="fab fa-facebook-f"></i></a>
                     <a href="{{ $contacts->instagram ?? '#' }}"><i class="fab fa-instagram"></i></a>
                     <a href="{{ $contacts->twitter ?? '#' }}"><i class="fab fa-twitter"></i></a>
                     <a href="{{ $contacts->youtube ?? '#' }}"><i class="fab fa-youtube"></i></a>
                     <a href="{{ $contacts->tiktok ?? '#' }}"><i class="fab fa-tiktok"></i></a>
                  </div>
               </div>
               <div class="col-sm-6 col-lg-2">
                  <div class="ftit">Quick Links</div>
                  <ul class="flinks ps-0">
                     <li><a href="#hero"><i class="fas fa-chevron-right"></i>Home</a></li>
                     <li><a href="#about"><i class="fas fa-chevron-right"></i>About Us</a></li>
                     <li><a href="#menu"><i class="fas fa-chevron-right"></i>Our Menu</a></li>
                     <li><a href="#reservation"><i class="fas fa-chevron-right"></i>Reservation</a></li>
                     <li><a href="#blog"><i class="fas fa-chevron-right"></i>Blog</a></li>
                     <li><a href="#contact-section"><i class="fas fa-chevron-right"></i>Contact</a></li>
                  </ul>
               </div>
               <div class="col-sm-6 col-lg-2">
                  <div class="ftit">Our Menu</div>
                  <ul class="flinks ps-0">
                     <li><a href="#menu"><i class="fas fa-chevron-right"></i>Burgers</a></li>
                     <li><a href="#menu"><i class="fas fa-chevron-right"></i>Pizza</a></li>
                     <li><a href="#menu"><i class="fas fa-chevron-right"></i>Fried Chicken</a></li>
                     <li><a href="#menu"><i class="fas fa-chevron-right"></i>Wraps &amp; Rolls</a></li>
                     <li><a href="#menu"><i class="fas fa-chevron-right"></i>Pasta</a></li>
                     <li><a href="#menu"><i class="fas fa-chevron-right"></i>Desserts</a></li>
                  </ul>
               </div>
               <div class="col-lg-4">
                  <div class="ftit">Get In Touch</div>
                  <div class="fci">
                     <div class="fciico"><i class="fas fa-map-marker-alt"></i></div>
                     <div class="fciinfo"><strong>Address</strong>{{ $contacts->address ?? '42 Flavor Street, Manhattan, NY 10001' }}</div>
                  </div>
                  <div class="fci">
                     <div class="fciico"><i class="fas fa-phone-alt"></i></div>
                     <div class="fciinfo"><strong>Phone</strong>{{ $contacts->phone ?? '+1 (800) 123-4567' }}</div>
                  </div>
                  <div class="fci">
                     <div class="fciico"><i class="fas fa-envelope"></i></div>
                     <div class="fciinfo"><strong>Email</strong>{{ $contacts->email ?? 'hello@sarabfood.com' }}</div>
                  </div>
                  <div class="fci">
                     <div class="fciico"><i class="fas fa-clock"></i></div>
                     <div class="fciinfo"><strong>Hours</strong>{{ $contacts->opening_hours ?? 'Wed - Sun: 09 AM - 11 PM' }}</div>
                  </div>
               </div>
            </div>
         </div>
         <div class="fbot">
            <div class="container">
               <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                  <p>&copy 2026 <span>Sarab Restaurant</span>. All Rights Reserved by <a target="_blank" class="mx-0 fw-bold text-success" href="https://bestwpware.com/">Bestwpware</a>. Made with <span><i class="fas fa-heart"></i></span>  <br>Distributed by <a target="_blank" class="mx-0 fw-bold text-success" href="https://themewagon.com">ThemeWagon</a></p>
                  <div><a href="#">Privacy Policy</a><a href="#">Terms</a><a href="#">Cookies</a></div>
               </div>
            </div>
         </div>
      </footer>
      <!-- Floating cart -->
      <!-- <div class="cartfl"><i class="fas fa-shopping-cart"></i><span>My Cart</span><div class="ccount" id="cartCount">0</div></div> -->
      <!-- Back to top -->
      <button id="btt" onclick="window.scrollTo({top:0,behavior:'smooth'})"><i class="fas fa-chevron-up"></i></button>
    
	<!-- jQuery -->
      <script src="{{ asset('UI/js/jquery-3.7.1.min.js') }}"></script>
      <!-- Bootstrap 5 -->
      <script src="{{ asset('UI/js/bootstrap.bundle.min.js') }}"></script>
      <!-- AOS -->
      <script src="{{ asset('UI/js/aos.js') }}"></script>
      <!-- Swiper -->
      <script src="{{ asset('UI/js/swiper-bundle.min.js') }}"></script>
      <!-- CounterUp -->
      <script src="{{ asset('UI/js/jquery.magnific-popup.min.js') }}"></script>
      <!-- Main js -->
      <script src="{{ asset('UI/js/main.js') }}"></script>
   </body>
</html>
