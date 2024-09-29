
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Beautiful Event - Wedding Planning</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-white">
    <header class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="/api/placeholder/40/40" alt="Logo" class="h-10 w-10 mr-2">
            <span class="text-xl font-semibold text-red-500">A Beautiful Event</span>
        </div>
        <nav class="hidden md:flex space-x-6">
            <a href="#" class="text-gray-600 hover:text-gray-800">Home</a>
            <a href="#" class="text-gray-600 hover:text-gray-800">Venue</a>
            <a href="#" class="text-gray-600 hover:text-gray-800">Events</a>
            <a href="#" class="text-gray-600 hover:text-gray-800">About</a>
            <a href="#" class="text-gray-600 hover:text-gray-800">Gallery</a>
            <a href="#" class="text-gray-600 hover:text-gray-800 underline">Contact Us</a>
        </nav>
        <div class="flex items-center space-x-2">
            <button class="text-gray-700 px-4 py-2 text-sm">LOGIN</button>
            <button class="bg-gray-200 text-gray-700 px-4 py-2 text-sm">SIGNUP</button>
            <button class="text-gray-700"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg></button>
        </div>
    </header>

    <main>
        <section class="bg-gray-100 py-20 text-center">
            <h1 class="text-4xl font-bold mb-4">We are "A Beautiful Event"</h1>
            <p class="text-xl">
                We bring
                <br>
                <span class="font-bold text-3xl">dream Events</span>
                <br>
                to life!
            </p>
        </section>

        <section class="container mx-auto px-4 py-16 flex flex-wrap">
            <div class="w-full md:w-1/2 pr-0 md:pr-8">
                <h2 class="text-2xl font-semibold mb-6">Say Hello!</h2>
                <form>
                    <div class="mb-4">
                        <label for="fullName" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="fullName" name="fullName" placeholder="Enter Name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="contactNumber" class="block text-sm font-medium text-gray-700">Contact Number</label>
                        <input type="tel" id="contactNumber" name="contactNumber" placeholder="Contact Number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Email Address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Enter Your Message" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-gray-300 text-gray-700 py-2 px-4 rounded-md">Submit</button>
                </form>
            </div>
            <div class="w-full md:w-1/2 mt-8 md:mt-0">
                <h3 class="text-xl font-semibold mb-4">Vendors</h3>
                <p class="mb-6">If you are a registered vendor or a business looking to promote your brand on our portal, please send in your queries at vendors@comany.com</p>
                
                <h3 class="text-xl font-semibold mb-4">Marketing Collaborations</h3>
                <p class="mb-6">For brand collaborations - sponsored content, social media activations etc., please write into partnerships@comany.com</p>
                
                <h3 class="text-xl font-semibold mb-4">Wedding Submissions</h3>
                <p class="mb-6">&lt;Company Name&gt; features wedding across cultures, styles and budgets. To submit your wedding, kindly email us 15-20 photos at submissions@comany.com</p>
                
                <h3 class="text-xl font-semibold mb-4">Careers</h3>
                <p class="mb-6">We are a team of passionate young minds looking to reinvent the wedding space. Please check our careers page for current openings and email us at hr@comany.com</p>
                
                <h3 class="text-xl font-semibold mb-4">Customers</h3>
                <p>We love to hear from our precious users. For any feedback or queries simply write in to info@comany.com</p>
            </div>
        </section>

        <section class="bg-gray-100 py-16">
            <div class="container mx-auto px-4 flex items-center">
                <div class="w-1/3">
                    <img src="/api/placeholder/300/300" alt="Placeholder" class="w-full h-auto">
                </div>
                <div class="w-2/3 pl-8">
                    <h2 class="text-3xl font-bold mb-4">Lorem ipsum dolor sit amet</h2>
                    <p class="mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                    <button class="bg-gray-300 text-gray-700 py-2 px-6 rounded-md">CTA</button>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap -mx-4 mb-8">
                <div class="w-full md:w-1/4 px-4 mb-8 md:mb-0">
                    <img src="/api/placeholder/40/40" alt="Logo" class="h-10 w-10 mb-3">
                    <h3 class="text-xl font-semibold mb-2 text-red-500">A Beautiful Event</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-gray-600">FB</a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">TW</a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">IG</a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">IN</a>
                    </div>
                </div>
                <div class="w-full md:w-1/4 px-4 mb-8 md:mb-0">
                    <h4 class="text-lg font-semibold mb-4">Venues</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Abu Dhabi</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Al Ain</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Ajman</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Dubai</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Fujairah</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Ras Al Khaimah</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 px-4 mb-8 md:mb-0">
                    <h4 class="text-lg font-semibold mb-4">Events</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Photographs</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Video Graphs</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Flowers</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Lighting</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Designs</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 px-4">
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">About Us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Join Us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Contact Us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-800">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-200 pt-8">
                <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                <p class="mb-4">Subscribe To Get Latest Media Updates</p>
                <form class="flex">
                    <input type="email" placeholder="Enter your email" class="flex-grow px-4 py-2 rounded-l-md focus:outline-none focus:ring-2 focus:ring-red-500 border border-gray-300">
                    <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-r-md">Connect With Us</button>
                </form>
            </div>
        </div>
    </footer>
</body>
</html>