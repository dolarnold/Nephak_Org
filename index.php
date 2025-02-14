<?php
// Assuming you are using a templating engine or PHP to handle dynamic content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEPHAK</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add your stylesheet here -->
</head>
<body>

<section class="relative h-screen">
    <img src="images/redribbon.png" alt="NEPHAK Hero Image" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl text-white font-bold mb-4">NEPHAK <br> Empowering People: Leveraging the Lived Experience</h1>
            <p class="text-xl md:text-2xl text-white mb-8">Join NEPHAK in the fight against HIV/AIDS in Kenya</p>
            <a href="about_us.php" class="btn bg-[#00A8E1] btn-lg">About Us</a>
        </div>
    </div>
</section>

<!-- Our Strategy Section -->
<section class="container mx-auto px-4 py-12">
    <h2 class="text-4xl font-bold text-primary mb-8 text-center">Our Strategy</h2>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-12">
        <div class="p-8">
            <p class="text-xl text-gray-700 leading-relaxed mb-6">
                Leveraging the 'Lived Experience' to deliver on the sustained improvement of the health and well-being of communities and contribute to the 2030 Sustainable Development Agenda in Kenya.
            </p>
        </div>
    </div>
</section>

<!-- Impact Stories -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Impact Stories</h2>
        <?php if (!empty($impact_stories)) : ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach (array_slice($impact_stories, 0, 5) as $story) : ?>
                    <div class="card bg-base-100 shadow-xl">
                        <?php if (!empty($story['image'])) : ?>
                            <figure><img src="<?= $story['image']; ?>" alt="<?= $story['title']; ?>" class="w-full h-48 object-cover"></figure>
                        <?php else : ?>
                            <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                                <span class="text-gray-500">No image available</span>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h3 class="card-title"><?= $story['title']; ?></h3>
                            <p class="text-gray-600 mb-4"><?= date("F d, Y", strtotime($story['publication_date'])); ?></p>
                            <p><?= substr(strip_tags($story['content']), 0, 100); ?>...</p>
                            <a href="impact_story_detail.php?slug=<?= $story['slug']; ?>" class="text-blue-600 hover:text-blue-800 transition duration-300">Read Full Story</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="text-center text-gray-600">
                <p>No impact stories available at the moment.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- News Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Latest News</h2>
        <?php if (!empty($news_items)) : ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach (array_slice($news_items, 0, 5) as $news) : ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <?php if (!empty($news['image'])) : ?>
                            <img src="<?= $news['image']; ?>" alt="<?= $news['title']; ?>" class="w-full h-48 object-cover">
                        <?php else : ?>
                            <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                                <span class="text-gray-500">No image available</span>
                            </div>
                        <?php endif; ?>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2"><?= $news['title']; ?></h3>
                            <p class="text-gray-600 mb-4"><?= date("F d, Y", strtotime($news['publication_date'])); ?></p>
                            <p><?= substr(strip_tags($news['content']), 0, 100); ?>...</p>
                            <a href="news_detail.php?slug=<?= $news['slug']; ?>" class="text-blue-600 hover:text-blue-800 transition duration-300">Read Full Article</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="text-center text-gray-600">
                <p>No news items available at the moment.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Partners -->
<section class="py-16 bg-accent">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Our Partners</h2>
        <div class="flex justify-center">
            <img src="partners/logo1.png" alt="Partner 1" class="h-16 mx-2">
            <img src="partners/logo2.png" alt="Partner 2" class="h-16 mx-2">
            <img src="partners/logo3.png" alt="Partner 3" class="h-16 mx-2">
        </div>
    </div>
</section>

</body>
</html>
