<?php
// Define menu items dynamically
$menuItems = [
    "Home" => "#",
    "Venue" => "#",
    "Events" => "#",
    "About" => "#",
    "Gallery" => "#",
    "Contact Us" => "#"
];

// Dynamic categories (you can fetch these from a database in a real application)
$categories = [
    ["image" => "category1.png", "name" => "DESTINATION WEDDINGS"],
    ["image" => "category2.png", "name" => "HONEYMOON & TRAVEL WEDDING"],
    ["image" => "category3.png", "name" => "VIDEOGRAPHERS WEDDING"],
    ["image" => "category4.png", "name" => "CELEBRANT"]
];

// Dynamic venues (you can fetch these from a database in a real application)
$venues = [
    ["image" => "venue1.png", "name" => "LOREM ISUM RESORT", "location" => "MALDIVES"],
    ["image" => "venue2.png", "name" => "LOREM ISUM RESORT", "location" => "NEPAL"],
    ["image" => "venue3.png", "name" => "LOREM ISUM RESORT", "location" => "ABU DHABI"],
    ["image" => "venue4.png", "name" => "LOREM ISUM RESORT", "location" => "DUBAI"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Event Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>
<body class="font-sans">

    <!-- Header -->
    <header class="bg-white shadow py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div class="flex items-center">
                <img src="Assets/Images/Logo.png" alt="Logo" class="h-10">
                <nav class="ml-10 space-x-8">
                    <?php foreach ($menuItems as $menuItem => $link): ?>
                        <a href="<?php echo $link; ?>" class="text-gray-700 hover:text-black">
                            <?php echo $menuItem; ?>
                        </a>
                    <?php endforeach; ?>
                </nav>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-700">Login</a>
                <a href="#" class="px-4 py-2 bg-gray-300 text-black rounded">Signup</a>
                <a href="#" class="text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.9 10.9a7 7 0 10-1.8 1.8l5 5a1 1 0 001.4-1.4l-5-5zm-2.9 0a5 5 0 110-10 5 5 0 010 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gray-100 py-16">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold">Your Wedding, Your Way</h1>
        </div>
        <div class="container mx-auto px-4 flex justify-center space-x-4">
            <select class="bg-white border border-gray-300 rounded px-4 py-2 w-1/4">
                <option>Select Category</option>
            </select>
            <select class="bg-white border border-gray-300 rounded px-4 py-2 w-1/4">
                <option>Select Location</option>
            </select>
            <button class="bg-gray-400 text-white px-6 py-2 rounded">Search</button>
        </div>
    </section>

    <!-- Browse by Category -->
    <section class="container mx-auto px-4 py-16">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Browse By Category</h2>
            <a href="#" class="text-gray-600">View All (<?php echo count($categories); ?>)</a>
        </div>
        <div class="grid grid-cols-4 gap-6">
            <?php foreach ($categories as $category): ?>
                <div class="bg-white border border-gray-300 p-6 text-center">
                    <img src="<?php echo $category['image']; ?>" alt="<?php echo $category['name']; ?>" class="mx-auto mb-4">
                    <h3 class="text-lg font-semibold"><?php echo $category['name']; ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="flex justify-center mt-6">
            <button class="px-3 py-1 bg-gray-300 rounded-l">&lt;&lt;</button>
            <button class="px-3 py-1 bg-gray-300">1</button>
            <button class="px-3 py-1 bg-gray-300">2</button>
            <button class="px-3 py-1 bg-gray-300">3</button>
            <button class="px-3 py-1 bg-gray-300 rounded-r">&gt;&gt;</button>
        </div>
    </section>

    <!-- Popular Venues -->
    <section class="container mx-auto px-4 py-16">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Popular Venues</h2>
            <a href="#" class="text-gray-600">View All (<?php echo count($venues); ?>)</a>
        </div>
        <div class="grid grid-cols-4 gap-6">
            <?php foreach ($venues as $venue): ?>
                <div class="bg-white border border-gray-300 p-6 text-center">
                    <img src="<?php echo $venue['image']; ?>" alt="<?php echo $venue['name']; ?>" class="mx-auto mb-4">
                    <p class="text-sm font-semibold"><?php echo $venue['name']; ?></p>
                    <p class="text-sm text-gray-600"><?php echo $venue['location']; ?></p>
                    <button class="mt-4 px-3 py-1 bg-gray-200 rounded">Explore</button>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="flex justify-center mt-6">
            <button class="px-3 py-1 bg-gray-300 rounded-l">&lt;&lt;</button>
            <button class="px-3 py-1 bg-gray-300">1</button>
            <button class="px-3 py-1 bg-gray-300">2</button>
            <button class="px-3 py-1 bg-gray-300">3</button>
            <button class="px-3 py-1 bg-gray-300 rounded-r">&gt;&gt;</button>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-bold mb-4">Lorem ipsum dolor sit amet</h2>
                <p class="text-gray-600 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                <button class="px-6 py-2 bg-black text-white rounded">CTA</button>
            </div>
            <img src="cta-image.png" alt="" class="w-1/3">
        </div>
    </section>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
</body>
</html>
