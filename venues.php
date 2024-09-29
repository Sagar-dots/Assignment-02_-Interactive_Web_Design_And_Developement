<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Venues</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Header Section -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-red-600 font-bold text-2xl">A Beautiful Event</div>
            <nav class="space-x-6">
                <a href="index.php" class="text-gray-800 hover:text-red-600">Home</a>
                <a href="venues.php" class="text-gray-800 hover:text-red-600">Venue</a>
                <a href="events.php" class="text-gray-800 hover:text-red-600">Events</a>
                <a href="about.php" class="text-gray-800 hover:text-red-600">About</a>
                <a href="gallery.php" class="text-gray-800 hover:text-red-600">Gallery</a>
                <a href="contact.php" class="text-gray-800 hover:text-red-600">Contact Us</a>
            </nav>
            <div class="space-x-4">
                <a href="login.php" class="text-gray-800 hover:text-red-600">Login</a>
                <a href="signup.php" class="px-4 py-2 bg-gray-200 text-gray-800 hover:bg-red-600 hover:text-white">Signup</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="container mx-auto py-16 text-center">
        <h1 class="text-4xl font-bold mb-6">Our Wedding Venues</h1>
        <div class="flex justify-center space-x-4">
            <form method="GET" action="search.php" class="flex space-x-4">
                <select name="category" class="px-4 py-2 border border-gray-300 rounded">
                    <option value="">Select Category</option>
                    <!-- Dynamic Categories from PHP -->
                    <?php
                        // Assuming $categories is an array from the database
                        foreach ($categories as $category) {
                            echo "<option value='{$category['id']}'>{$category['name']}</option>";
                        }
                    ?>
                </select>
                <select name="location" class="px-4 py-2 border border-gray-300 rounded">
                    <option value="">Select Location</option>
                    <!-- Dynamic Locations from PHP -->
                    <?php
                        foreach ($locations as $location) {
                            echo "<option value='{$location['id']}'>{$location['name']}</option>";
                        }
                    ?>
                </select>
                <button type="submit" class="px-6 py-2 bg-gray-300 text-gray-800 rounded">Search</button>
            </form>
        </div>
    </section>

    <!-- Wedding Venues Section -->
    <section class="container mx-auto py-16">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Wedding Venues</h2>
            <a href="venues.php" class="text-gray-600">View All (22)</a>
        </div>
        <div class="grid grid-cols-3 gap-6">
            <!-- Dynamic Venues List -->
            <?php
                // Assuming $venues is an array from the database
                foreach ($venues as $venue) {
                    echo "
                    <div class='bg-white border border-gray-300 p-6 text-center'>
                        <img src='uploads/{$venue['image']}' alt='' class='mx-auto mb-4'>
                        <h3 class='text-lg font-semibold'>{$venue['name']}, <span class='font-bold text-black'>{$venue['location']}</span></h3>
                        <div class='flex justify-center items-center mt-2'>
                            <span class='text-yellow-500'>★★★★★</span>
                            <span class='ml-2'>({$venue['reviews']})</span>
                        </div>
                        <p class='text-gray-600'>Upto {$venue['guest_capacity']} Guests</p>
                        <a href='venue.php?id={$venue['id']}' class='text-blue-600 mt-4 block'>Explore</a>
                    </div>";
                }
            ?>
        </div>
        <div class="flex justify-center mt-6">
            <!-- Pagination Links -->
            <?php
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<a href='venues.php?page=$i' class='px-3 py-1 bg-gray-300'>$i</a>";
                }
            ?>
        </div>
    </section>

    <!-- Popular Venues Section -->
    <section class="container mx-auto py-16">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Popular Venue</h2>
            <a href="venues.php" class="text-gray-600">View All (22)</a>
        </div>
        <div class="grid grid-cols-4 gap-6">
            <!-- Dynamic Popular Venues -->
            <?php
                foreach ($popular_venues as $venue) {
                    echo "
                    <div class='bg-white border border-gray-300 p-6 text-center'>
                        <img src='uploads/{$venue['image']}' alt='' class='mx-auto mb-4'>
                        <h3 class='text-lg font-semibold'>{$venue['name']}</h3>
                        <a href='venue.php?id={$venue['id']}' class='text-blue-600 mt-4 block'>Explore</a>
                    </div>";
                }
            ?>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gray-200 py-16">
        <div class="container mx-auto flex justify-between items-center">
            <div class="w-1/2">
                <h2 class="text-3xl font-bold mb-4">Lorem ipsum dolor sit amet</h2>
                <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                <button class="px-6 py-2 bg-black text-white rounded">CTA</button>
            </div>
            <img src="cta-image.png" alt="" class="w-1/3">
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-gray-900 text-gray-400 py-16">
        <div class="container mx-auto grid grid-cols-4 gap-6">
            <div>
                <h4 class="text-white mb-4">Venues</h4>
                <ul>
                    <li><a href="venues.php?location=abu_dhabi" class="hover:text-white">Abu Dhabi</a></li>
                    <li><a href="venues.php?location=al_ain" class="hover:text-white">Al Ain</a></li>
                    <li><a href="venues.php?location=ajman" class="hover:text-white">Ajman</a></li>
                    <li><a href="venues.php?location=dubai" class="hover:text-white">Dubai</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white mb-4">Events</h4>
                <ul>
                    <li><a href="events.php?type=photographs" class="hover:text-white">Photographs</a></li>
                    <li><a href="events.php?type=flowers" class="hover:text-white">Flowers</a></li>
                    <li><a href="events.php?type=lighting" class="hover:text-white">Lighting</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white mb-4">Quick Links</h4>
                <ul>
                    <li><a href="about.php" class="hover:text-white">About Us</a></li>
                    <li><a href="join.php" class="hover:text-white">Join Us</a></li>
                    <li><a href="contact.php" class="hover:text-white">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white mb-4">Newsletter</h4>
                <p>Subscribe to Get Latest Media Updates</p>
                <form method="POST" action="newsletter.php" class="mt-4">
                    <input type="email" name="email" placeholder="Your email" class="w-full px-4 py-2 bg-gray-800 text-gray-400">
                    <button type="submit" class="px-6 py-2 bg-red-600 text-white mt-4">Connect With Us</button>
                </form>
            </div>
        </div>
    </footer>

</body>
</html>

