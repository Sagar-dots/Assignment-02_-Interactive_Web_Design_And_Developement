<?php

include('login.php');
 // Includes Login Script
include('register.php');
if(isset($_SESSION['login_customer'])){
header("location: profile.php");
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>A beautiful Event</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/styles.css" rel="stylesheet">      
        <script src="https://kit.fontawesome.com/5e4b38806c.js" crossorigin="anonymous"></script>

    </head>
    
    <body id="top">

        <main>
           
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <i class="bi-back"></i>
                        <span>A Beautiful Event</span>
                    </a>
                    <div class="d-lg-none ms-auto me-4">
                        <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-5 me-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2">Venues</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">Events</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4">FAQs</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5">Contact</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="bookings.php">Bookings</a></li>

                                    <li><a class="dropdown-item" href="contact.html">Contact Form</a></li>
                                </ul>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="#top" class="navbar-icon bi-person smoothscroll" onclick="login()"></a>
                            
                        </div>
                    </div>
                </div>
            </nav>
            

            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 mx-auto">
                            <h1 class="text-white text-center">Your Event ,Our Expertise</h1>

                            <h6 class="text-center">Whenever, Whereever
                            </h6>

                            <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bi-search" id="basic-addon1">
                                        
                                    </span>

                                    <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Search Events" aria-label="Search">

                                    <button type="submit" class="form-control">Search</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>


            <section class="featured-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="wrappers">
                            <div class="card">
                                <div class="poster"><img src="images/weddings.jpeg" alt="Location Unknown"></div>
                                <div class="details">
                                    <h1>Weddings</h1>
                                    
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>

                                        <span>4.2/5</span>
                                    </div>
                                    <div class="tags">
                                        <span class="tag">Indian</span>
                                        <span class="tag">Lively</span>
                                        <span class="tag">Cultural</span>
                                    </div>
                                    <p class="desc">
                                         Embarks on a solitary journey in search for meaning.
                                    </p>
                                    <div class="cast">
                                        <h3></h3>

                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="poster"><img src="https://www.dadshop.com.au/blog/wp-content/uploads/2023/03/why-we-celebrate-birthdays.jpg" alt="Location Unknown"></div>
                                <div class="details">
                                    <h1>Air</h1>
                         
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                        <span>4/5</span>
                                    </div>
                                    <div class="tags">
                                        <span class="tag">Birthday</span>
                                        <span class="tag">Cake</span>
                                        <span class="tag">Party</span>
                                    </div>
                                    <p class="desc">
                                    A birthday marks the anniversary of one’s birth, serving as a personal celebration filled with joy and reflection.
                                    </p>
                                    <div class="cast">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="poster"><img src="https://cdn-jehol.nitrocdn.com/XBwbYFbRYVMjkUYSoaVcGgRdcPyjhKvO/assets/images/optimized/rev-2609c0c/www.acstechnologies.com/church-growth/wp-content/uploads/sites/5/2020/06/Graduate_06.20_Blog_Image_Resize.jpg"></div>
                                <div class="details">
                                    <h1>End Credits</h1>
                                    
                                    <div class="rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>4.7/5</span>
                                    </div>
                                    <div class="tags">
                                        <span class="tag yellow">Caps</span>
                                        <span class="tag">Gowns</span>
                                        <span class="tag blue">Degree</span>
                                    </div>
                                    <p class="desc">
                                    Graduation marks the culmination of academic achievement, symbolizing the transition from one seminaral phase to another.
                                    </p>
                                    <div class="cast">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="events.php">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">large_venues</h5>

                                            <p class="mb-0">Lorem ipsum dolor si id dolores cum pariatur architecto eveniet iure vel impedit nesciunt. Eum officiis doloribus, quibusdam culpa sint eligendi.</p>
                                        </div>

                                        <span class="badge bg-large_venues rounded-pill ms-auto">View Events</span>
                                    </div>

                                    <img src="images\large_venues.jpeg" class="custom-block-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="events.php">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">large_venues</h5>

                                            <p class="mb-0">Lorem ipsum dolor si id dolores cum pariatur architecto eveniet iure vel impedit nesciunt. Eum officiis doloribus, quibusdam culpa sint eligendi.</p>
                                        </div>

                                        <span class="badge bg-large_venues rounded-pill ms-auto">View Events</span>
                                    </div>

                                    <img src="images\large_venues.jpeg" class="custom-block-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="events.php">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">large_venues</h5>

                                            <p class="mb-0">Lorem ipsum dolor si id dolores cum pariatur architecto eveniet iure vel impedit nesciunt. Eum officiis doloribus, quibusdam culpa sint eligendi.</p>
                                        </div>

                                        <span class="badge bg-large_venues rounded-pill ms-auto">View Events</span>
                                    </div>

                                    <img src="images\large_venues.jpeg" class="custom-block-image img-fluid" alt="">
                                </a>
                            </div>
                        </div> -->



                    </div>
                </div>
            </section>


            <section class="explore-section section-padding" id="section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="mb-4">Browse Venues</h1>
                        </div>

                    </div> 
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="large_venues-tab" data-bs-toggle="tab" data-bs-target="#large_venues-tab-pane" type="button" role="tab" aria-controls="large_venues-tab-pane" aria-selected="true">Large Venues</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="small_venues-tab" data-bs-toggle="tab" data-bs-target="#small_venues-tab-pane" type="button" role="tab" aria-controls="small_venues-tab-pane" aria-selected="false">Small Venues</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Indoor-tab" data-bs-toggle="tab" data-bs-target="#Indoor-tab-pane" type="button" role="tab" aria-controls="Indoor-tab-pane" aria-selected="false">Indoor Venues</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="outdoor-tab" data-bs-toggle="tab" data-bs-target="#outdoor-tab-pane" type="button" role="tab" aria-controls="outdoor-tab-pane" aria-selected="false">Outdoor Venues</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seminar-tab" data-bs-toggle="tab" data-bs-target="#seminar-tab-pane" type="button" role="tab" aria-controls="seminar-tab-pane" aria-selected="false">Seminar Venues</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="container">    
                    <div class="row">

                        <div class="col-12">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="large_venues-tab-pane" role="tabpanel" aria-labelledby="large_venues-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="events.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Carlton Room</h5>

                                                            <p class="mb-0">Located on the ground floor, the Carlton Room is the perfect venue for your next  wedding reception.The room can be configured to suit your needs, in any layout from theatre, boardroom, banquet or cocktail style.</p>
                                                        </div>

                                                        <span class="badge bg-large_venues rounded-pill ms-auto">160</span>
                                                    </div>

                                                    <img src="images/topics/CarltonRoom.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="events.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Hotel Realm</h5>

                                                            <p class="mb-0">Located next to the Parliamentary Triangle, it is within walking distance to national icons including Parliament House, the National Gallery of Australia, and the National Library of Australia. Indulging our guests with luxurious accommodation.</p>
                                                        </div>

                                                        <span class="badge bg-large_venues rounded-pill ms-auto">140</span>
                                                    </div>

                                                    <img src="https://lh3.googleusercontent.com/p/AF1QipPh7DCWn9taCEaJy3ZTyGB1e9VYDVIRoUIWwnNB=s2626-w2564-h2626-rw" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="events.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2"> The Marion</h5>

                                                                <p class="mb-0">Let our team of experts take care of you and tailor a wedding, corporate function, or private celebration you won’t forget. The Marion is brought to you by one of Australia’s most iconic hospitality leaders, Grand Pacific Group.</p>
                                                        </div>

                                                        <span class="badge bg-large_venues rounded-pill ms-auto">180</span>
                                                    </div>

                                                    <img src="https://themarion.com.au/wp-content/uploads/2022/06/WALTERMARION_pewpewstudio_220527_-33.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="small_venues-tab-pane" role="tabpanel" aria-labelledby="small_venues-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                                <div class="custom-block bg-white shadow-lg">
                                                    <a href="events.php">
                                                        <div class="d-flex">
                                                            <div>
                                                                <h5 class="mb-2">The Social Club</h5>

                                                                <p class="mb-0">The Social Club takes everything that annoys people about event venues and flips it on its head. Hiring a venue is synonymous with compromises like outdated carpet and furniture, hire time and decoration restrictions, catering obligations</p>
                                                            </div>

                                                            <span class="badge bg-small_venues rounded-pill ms-auto">50</span>
                                                        </div>

                                                        <img src="https://images.squarespace-cdn.com/content/v1/64acc26fab7bdd7bd3bdeb86/ba056ab4-a5e6-42fe-991a-2439769cd86b/27581647_166177140682554_6911558971560034304_n.jpg?format=1000w" class="custom-block-image img-fluid" alt="">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                                <div class="custom-block bg-white shadow-lg">
                                                    <a href="events.php">
                                                        <div class="d-flex">
                                                            <div>
                                                                <h5 class="mb-2">HQThirtyFour</h5>

                                                                <p class="mb-0">HQ offers a refined industrial setting for any event in its distinctive and comfortable spaces. It invites you to know its heritage, with a proudly vintage entrance, complete with iconic wooden doors the colour of smooth whiskey.</p>
                                                            </div>

                                                            <span class="badge bg-small_venues rounded-pill ms-auto">65</span>
                                                        </div>

                                                        <img src="https://lh3.googleusercontent.com/p/AF1QipMCEyNyw78vZQvulsoGs8zyAvnd_EB7adjltsbc=s680-w680-h510" class="custom-block-image img-fluid" alt="">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-12">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="events.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2"> The Marion</h5>

                                                                <p class="mb-0">Let our team of experts take care of you and tailor a wedding, corporate function, or private celebration you won’t forget. The Marion is brought to you by one of Australia’s most iconic hospitality leaders, Grand Pacific Group.</p>
                                                        </div>

                                                        <span class="badge bg-small_venues rounded-pill ms-auto">180</span>
                                                    </div>

                                                    <img src="https://themarion.com.au/wp-content/uploads/2022/06/WALTERMARION_pewpewstudio_220527_-33.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="indoor-tab-pane" role="tabpanel" aria-labelledby="indoor-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                                <div class="custom-block bg-white shadow-lg">
                                                    <a href="events.php">
                                                        <div class="d-flex">
                                                            <div>
                                                                <h5 class="mb-2">The Social Club</h5>

                                                                <p class="mb-0">The Social Club takes everything that annoys people about event venues and flips it on its head. Hiring a venue is synonymous with compromises like outdated carpet and furniture, hire time and decoration restrictions, catering obligations</p>
                                                            </div>

                                                            <span class="badge bg-indoor rounded-pill ms-auto">50</span>
                                                        </div>

                                                        <img src="https://images.squarespace-cdn.com/content/v1/64acc26fab7bdd7bd3bdeb86/ba056ab4-a5e6-42fe-991a-2439769cd86b/27581647_166177140682554_6911558971560034304_n.jpg?format=1000w" class="custom-block-image img-fluid" alt="">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                                <div class="custom-block bg-white shadow-lg">
                                                    <a href="events.php">
                                                        <div class="d-flex">
                                                            <div>
                                                                <h5 class="mb-2">HQThirtyFour</h5>

                                                                <p class="mb-0">HQ offers a refined industrial setting for any event in its distinctive and comfortable spaces. It invites you to know its heritage, with a proudly vintage entrance, complete with iconic wooden doors the colour of smooth whiskey.</p>
                                                            </div>

                                                            <span class="badge bg-indoor rounded-pill ms-auto">65</span>
                                                        </div>

                                                        <img src="https://lh3.googleusercontent.com/p/AF1QipMCEyNyw78vZQvulsoGs8zyAvnd_EB7adjltsbc=s680-w680-h510" class="custom-block-image img-fluid" alt="">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-12">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="events.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2"> The Marion</h5>

                                                                <p class="mb-0">Let our team of experts take care of you and tailor a wedding, corporate function, or private celebration you won’t forget. The Marion is brought to you by one of Australia’s most iconic hospitality leaders, Grand Pacific Group.</p>
                                                        </div>

                                                        <span class="badge bg-indoor rounded-pill ms-auto">180</span>
                                                    </div>

                                                    <img src="https://themarion.com.au/wp-content/uploads/2022/06/WALTERMARION_pewpewstudio_220527_-33.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="outdoor-tab-pane" role="tabpanel" aria-labelledby="outdoor-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="events.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Hotel Kurrajong Canberra</h5>

                                                            <p class="mb-0">The 147 room Hotel Kurrajong is an all-in-one outdoor wedding venue that comes fully backed up with indoor, wet weather spaces. The courtyard of the heritage 1920's hotel is a private and intimate space perfect for outdoor wedding receptions and you can either set up a cocktail function on the lawn or long seated dining tables.</p>
                                                        </div>

                                                        <span class="badge bg-outdoor rounded-pill ms-auto">470</span>
                                                    </div>

                                                    <img src="https://www.wedlockers.com.au/assets/Uploads/_resampled/ResizedImage750498-Hotel-Kurrajong-Outdoor-Weddings.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="events.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Glencara Estate</h5>

                                                            <p class="mb-0">Location: 706 Jerrybang Lane, Monteagle, NSW 2594
                                                            </p>
                                                            <p class="mb-0">Accommodation: Sleeps 2 + glamping/camping</p>
                                                            <p class="mb-0">Wedding Packages: DIY/BYO</p>
                                                            <p class="mb-0">Whimsical outdoor weddings are a specialty at Glencara Estate where a series of interactive garden rooms keep guests entertained with riddles, games and a unique rustic maze.</p>
                                                        </div>

                                                        <span class="badge bg-outdoor rounded-pill ms-auto">160</span>
                                                    </div>

                                                    <img src="https://www.wedlockers.com.au/assets/Uploads/Glencara-Garden-Wedding-Estate.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="events.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">National Gallery of Australia</h5>
                                                            <p class="mb-0">Address: Parkes Place East,Parkes, ACT 2600</p>
                                                        </div>

                                                        <span class="badge bg-outdoor rounded-pill ms-auto">350</span>
                                                    </div>

                                                    <img src="https://www.wedlockers.com.au/assets/Uploads/_resampled/ResizedImage750498-National-Gallery-Outdoor-wedding-Venue.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="seminar-tab-pane" role="tabpanel" aria-labelledby="seminar-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-14 mb-4 mb-lg-3">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="events.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">Golden Moment Events Centre</h5>

                                                            <p class="mb-0">Address:63 Wollongong St, Fyshwick ACT 2609</p>
                                                            <p class="mb-0">Welcome to Golden Moment Events Centre, your gateway to extraordinary events and catering services. We specialize in creating unforgettable experiences tailored to your unique vision.</p>
                                                        </div>

                                                        <span class="badge bg-seminar rounded-pill ms-auto">80</span>
                                                    </div>

                                                    <img src="https://goldenmoment.com.au/wp-content/uploads/2023/06/350934897_210960141818929_4856649113120155928_n-1152x1536.jpg" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="events.php">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">National Press Club of Australia</h5>
                                                            <p class="mb-0">  Address: 16 National Circuit, Barton ACT 2600</p>
                                                            <p class="mb-0">An iconic Canberra venue providing a premium social setting for professionals, the National Press Club hosts public debates and private discussions that shape Australia today and into the future.</p>
                                                        </div>

                                                        <span class="badge bg-seminar rounded-pill ms-auto">75</span>
                                                    </div>

                                                    <img src="https://dogcu9j3g6mpl.cloudfront.net/public/2023/10/npc-corinnaanddylan_005%280933%29.jpg?VersionId=na7IHMtPY6fhJMydGbD8EcYDnzjQzQ8S" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </section>


            <section class="timeline-section section-padding" id="section_3">
                <div class="section-overlay"></div>
                <div class="container">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="text-white mb-4">Upcomming Events</h1>
                        </div>

                       

                        <div class="col-12 text-center mt-5">
                            <p class="text-white">
                                Want to learn more?
                                <a href="#" class="btn custom-btn custom-border-btn ms-3">Check on Calender</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>


            <section class="faq-section section-padding" id="section_4">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <h2 class="mb-4">Frequently Asked Questions</h2>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-lg-5 col-12">
                            <img src="images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
                        </div>

                        <div class="col-lg-6 col-12 m-auto">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How do you book an Event?
                                        </button>
                                    </h2>

                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                           To book an event you will have to go to the navigation and click on pages. <strong>There you will see the bookings sub-menu </strong>Click on the bookings tab and it will redirect you to the bookings Page, there you will the add bookings button. Thank you.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Can I delete or confirm a booking?
                                    </button>
                                    </h2>

                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            You can if you are an  <strong>SuperUser or Admin</strong> If you are a customer you can add a booking but it will have to go through the admin  for confirmation.

                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Can I pay online?
                                    </button>
                                    </h2>

                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            You can pay through our payment process.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="contact-section section-padding section-bg" id="section_5">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-5">Get in touch</h2>
                        </div>

                        <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                           
                        <iframe class="google-map" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Barton%20St,%20North%20Parramatta%20NSW%202151,+(A%20beautiful%20Event%20)&amp;t=h&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">gps devices</a></iframe>
                            
                        </div>     
                        <div class="col-lg-3 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
                            <h4 class="mb-3">Head office</h4>

                            <p>Bay St &amp;Barton St, North Parramatta NSW 2151, </p>
                                <span class="me-2">Phone</span>

                                <a href="tel: 045-162-5328" class="site-footer-link">
                                    045-162-5328
                                </a>
                            </p>

                            <p class="d-flex align-items-center">
                                <span class="me-2">Email</span>

                                <a href="mailto:abeautifulevent@company.com" class="site-footer-link">
                                    abeautifulevent@company.com
                                </a>
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mx-auto">
                            <h4 class="mb-3">Australia Canberra</h4>

                            <p>Barton St, North Parramatta NSW 2151</p>

                            <hr>

                            <p class="d-flex align-items-center mb-1">
                                <span class="me-2">Phone</span>

                                <a href="tel: 045-162-5328" class="site-footer-link">
                                    451625328
                                </a>
                            </p>

                            <p class="d-flex align-items-center">
                                <span class="me-2">Email</span>

                                <a href="mailto:abeautifulevent@company.com" class="site-footer-link">
                                    abeautifulevent@company.com
                                </a>
                            </p>
                        </div>

                    </div>
                </div>
            </section>
        </main>

<footer class="site-footer section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-12 mb-4 pb-2">
                        <a class="navbar-brand mb-2" href="index.html">
                            <i class="bi-back"></i>
                            <span><img src="logo.svg" alt=""></span>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6">
                        <h6 class="site-footer-title mb-3">Resources</h6>

                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Home</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Books Events</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">FAQs</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                        <h6 class="site-footer-title mb-3">Information</h6>

                        <p class="text-white d-flex mb-1">
                            <a href="tel: 0451625328" class="site-footer-link">
                                0451625328
                            </a>
                        </p>

                        <p class="text-white d-flex">
                            <a href="mailto:info@company.com" class="site-footer-link">
                                abeautifulevent@company.com
                            </a>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                        <!-- <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            English</button>

                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button">Thai</button></li>

                                <li><button class="dropdown-item" type="button">Myanmar</button></li>

                                <li><button class="dropdown-item" type="button">Arabic</button></li>
                            </ul>
                        </div> -->

                        <p class="copyright-text mt-lg-5 mt-4">Copyright © 2048 A Beautiful Events. All rights reserved.
                        <br><br>Event Management: <a rel="nofollow" href="about.php" target="_blank">Home</a></p>
                        
                    </div>

                </div>
            </div>
        </footer>


        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/script.js"></script>

    </body>
</html>
