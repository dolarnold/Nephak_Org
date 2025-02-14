<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'admin_dashboard');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch impact stories
$impact_stories = [];
$result = $conn->query("SELECT * FROM impact_stories ORDER BY publication_date DESC LIMIT 5");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $impact_stories[] = $row;
    }
}

// Fetch news items
$news_items = [];
$result = $conn->query("SELECT * FROM news_items ORDER BY publication_date DESC LIMIT 5");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $news_items[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEPHAK - Empowering People</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body>

    <!-- Navigation Bar -->
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="NEPHAK Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Who We Are</a></li>
                <li><a href="#">Our Work</a></li>
                <li><a href="#">Resources</a></li>
                <li><a href="#">Work With Us</a></li>
                <li><a href="#">Membership</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
        <a href="#" class="donate-btn">Donate</a>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>NEPHAK</h1>
            <h2>Empowering People: Leveraging the Lived Experience</h2>
            <p>Join NEPHAK in the fight against HIV/AIDS in Kenya</p>
            <a href="#" class="btn">About Us</a>
        </div>
    </section>

    <!-- Our Strategy Section -->
    <section class="strategy-section">
        <div class="strategy-container">
            <h2 class="strategy-title">Our Strategy</h2>
            
            <div class="strategy-content">
                <p class="strategy-description">
                    Leveraging the ‘Lived Experience’ to deliver on the sustained improvement of the health and well-being of communities and contribute to the 2030 Sustainable Development Agenda in Kenya.
                </p>
                <button id="toggle-strategy-btn" class="strategy-button">
                    Learn More
                </button>
            </div>
            
            <!-- Dropdown Content -->
            <div id="strategy-details" class="strategy-details hidden">
                <h3 class="strategy-subtitle">Strategic Goal</h3>
                <p class="strategy-text">
                    Sustained Improvement of Health and Wellbeing of people living with, affected by and, at risk of HIV/TR and other conditions of community health concern.
                </p>
                
                <h3 class="strategy-subtitle">Strategic Directions</h3>
                <ol class="strategy-list">
                    <li>Undertake Advocacy and Communication for Improved Health Policy and Programming</li>
                    <li>Undertake Institutional Strengthening for Improved Health & Wellbeing of Communities</li>
                    <li>Undertake evidence-based community health interventions for improved health outcomes</li>
                    <li>Strengthen Knowledge Management for Evidence-Based Interventions</li>
                    <li>Expand & Diversity Partnership & Resources for NEPHAK Operations and Programming at national, county and community</li>
                </ol>
                
                <h3 class="strategy-subtitle">Result Areas</h3>
                <ul class="strategy-list">
                    <li>Consolave Environment for Improved Health Policy and Programming</li>
                    <li>Strengthened institutions for Improved Health & Wellbeing of Communities</li>
                    <li>Implemented evidence-based community health interventions for improved health outcomes</li>
                    <li>Strengthened Knowledge Management for Evidence-Based Interventions</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Impact Stories Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Impact Stories</h2>
            <?php if (!empty($impact_stories)): ?>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ($impact_stories as $story): ?>
                        <div class="card bg-base-100 shadow-xl">
                            <?php if ($story['image']): ?>
                                <figure><img src="<?= $story['image'] ?>" alt="<?= $story['title'] ?>" class="w-full h-48 object-cover" /></figure>
                            <?php else: ?>
                                <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                                    <span class="text-gray-500">No image available</span>
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <h3 class="card-title"><?= $story['title'] ?></h3>
                                <p class="text-gray-600 mb-4"><?= date("F d, Y", strtotime($story['publication_date'])) ?></p>
                                <div class="mt-4 text-gray-700">
                                    <p><?= substr($story['content'], 0, 100) ?>....</p>
                                </div>
                                <a href="impact_story_detail.php?slug=<?= $story['slug'] ?>" class="text-blue-600 hover:text-blue-800 transition duration-300 focus:outline-none ml-4 mt-3 mr-4">
                                    Read Full Story
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="flex justify-center mt-3 mb-3">
                    <a href="all_stories.php" class="text-white bg-[#00A8E1] focus:ring-4 rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                        <svg class="w-5 h-5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                        All Stories
                    </a>
                </div>
            <?php else: ?>
                <div class="text-center text-gray-600">
                    <p>No impact stories available at the moment. Check back soon for inspiring stories!</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Latest News</h2>
            <?php if (!empty($news_items)): ?>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ($news_items as $news): ?>
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <?php if ($news['image']): ?>
                                <img src="<?= $news['image'] ?>" alt="<?= $news['title'] ?>" class="w-full h-48 object-cover">
                            <?php else: ?>
                                <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                                    <span class="text-gray-500">No image available</span>
                                </div>
                            <?php endif; ?>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2"><?= $news['title'] ?></h3>
                                <p class="text-gray-600 mb-4"><?= date("F d, Y", strtotime($news['publication_date'])) ?></p>
                                <div class="mt-4 text-gray-700">
                                    <p><?= substr($news['content'], 0, 100) ?>....</p>
                                </div>
                                <a href="news_detail.php?slug=<?= $news['slug'] ?>" class="text-blue-600 hover:text-blue-800 transition duration-300 focus:outline-none ml-4">
                                    Read Full Article
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="flex justify-center mt-3 mb-3">
                    <a href="all_news.php" class="text-white bg-[#00A8E1] focus:ring-4 rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                        <svg class="w-5 h-5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                        All News
                    </a>
                </div>
            <?php else: ?>
                <div class="text-center text-gray-600">
                    <p>No news items available at the moment. Check back soon for updates!</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Partners Section -->
<!-- Partners Section -->
<section class="py-16 bg-blue-100" x-data="carousel()"> <!-- Light blue background -->
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Our Partners</h2>
        <div class="relative overflow-hidden">
            <div class="flex transition-transform duration-500 ease-in-out" :style="{ transform: `translateX(-${currentIndex * 100}%)` }">
                <template x-for="(image, index) in images" :key="index">
                    <div class="w-full flex-shrink-0 flex justify-center items-center">
                        <img :src="image.src" :alt="image.alt" class="h-16">
                    </div>
                </template>
            </div>
            <button @click="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full">
                &lt;
            </button>
            <button @click="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full">
                &gt;
            </button>
        </div>
    </div>
</section>

    <!-- Newsletter Section -->
    <section id="newsletter" class="py-16 bg-accent bg-opacity-10">
        <div class="container mx-auto px-4" id="message">
            <h2 class="text-3xl font-bold text-center mb-8">Stay Informed</h2>
            <p class="text-center mb-8 max-w-2xl mx-auto">Join our newsletter to receive updates on our work, upcoming events, and ways you can get involved in the fight against HIV/AIDS.</p>
            <form id="subscribe-form" class="max-w-md mx-auto" hx-post="{% url 'home:subscribe' %}" hx-target="#message" hx-swap="outerHTML">
                <div class="flex items-center border-b border-primary py-2">
                    <input id="name-input" name="name" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Enter your name" aria-label="name" required>
                    <input id="email-input" name="email" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="email" placeholder="Enter your email" aria-label="Email" required>
                    <button id="subscribe-btn" class="flex-shrink-0 bg-primary hover:bg-primary-dark border-primary hover:border-primary-dark text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                        Subscribe
                    </button>
                </div>
            </form>
            <div id="subscribe-message" class="mt-4 text-green-600 text-center hidden">Thank you for subscribing!</div>
        </div>
    </section>

    <script>
        // Toggle Dropdown Functionality
        const toggleButton = document.getElementById('toggle-strategy-btn');
        const strategyDetails = document.getElementById('strategy-details');

        toggleButton.addEventListener('click', () => {
            if (strategyDetails.style.display === 'none' || strategyDetails.style.display === '') {
                strategyDetails.style.display = 'block';
                toggleButton.textContent = 'Hide Details';
            } else {
                strategyDetails.style.display = 'none';
                toggleButton.textContent = 'Learn More';
            }
        });

        // Carousel Functionality
        function carousel() {
            return {
                currentIndex: 0,
                images: [
                    { src: "images/PartnerLogos/Amref.jpeg", alt: "Amref" },
                    { src: "images/PartnerLogos/unaids-logo.png", alt: "UNAIDS" },
                    { src: "images/PartnerLogos/KU.jpeg", alt: "KU" },
                    { src: "images/PartnerLogos/nasop.png", alt: "NASOP" },
                    { src: "images/PartnerLogos/nsdcc.jpeg", alt: "NSDCC" },
                    { src: "images/PartnerLogos/ntlp.png", alt: "NTLP" },
                    { src: "images/PartnerLogos/US-PEPFAR-Logo.png", alt: "US PEPFAR" },
                    { src: "images/PartnerLogos/viiv-logo.svg", alt: "ViiV" },
                    { src: "images/PartnerLogos/usaid.svg", alt: "USAID" },
                    { src: "images/PartnerLogos/ITPC.svg", alt: "ITPC" },
                    { src: "images/PartnerLogos/gnp+.svg", alt: "GNP+" },
                    { src: "images/PartnerLogos/HIVtribunal.jpg", alt: "HIV Tribunal" },
                    { src: "images/PartnerLogos/Global Fund.jpeg", alt: "Global Fund" },
                    { src: "images/PartnerLogos/ciheb-KENYA-logo.jpg", alt: "CIHEB Kenya" },
                    { src: "images/PartnerLogos/cdc-logo.svg", alt: "CDC" },
                    { src: "images/PartnerLogos/kelin.png", alt: "KELIN" },
                    { src: "images/PartnerLogos/kenya moh.png", alt: "Kenya MOH" },
                    { src: "images/PartnerLogos/undp logo.jpeg", alt: "UNDP" }
                ],
                next() {
                    this.currentIndex = (this.currentIndex + 1) % this.images.length;
                },
                prev() {
                    this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
                },
                init() {
                    setInterval(() => {
                        this.next();
                    }, 3000); // Change image every 3 seconds
                }
            }
        }
    </script>
</body>
</html>