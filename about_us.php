<?php
$coreValues = [
    ['icon' => 'fa-balance-scale', 'title' => 'Integrity', 'description' => 'We value truthfulness, fairness, honesty and transparency in our internal and external relationships, communication and transactions.'],
    ['icon' => 'fa-award', 'title' => 'Excellence', 'description' => 'We value professionalism and timeliness, and seek credibility in all that we do. We are committed to the highest professional standards.'],
    ['icon' => 'fa-hands-helping', 'title' => 'Collaboration', 'description' => 'We value the collective wisdom that emerges when individuals work together as a team.'],
    ['icon' => 'fa-lightbulb', 'title' => 'Innovation', 'description' => 'We value and support innovation. We encourage informed risk-taking that holds the promise of enhancing organizational learning.']
];

$visionMission = [
    ['icon' => 'fa-eye', 'title' => 'Vision', 'description' => 'Healthy Communities'],
    ['icon' => 'fa-bullseye', 'title' => 'Mission', 'description' => 'To contribute to the sustained improvement of health and well-being of Communities'],
    ['icon' => 'fa-flag', 'title' => 'Goal', 'description' => 'Sustained improvement of health and well-being of communities']
];

$guidingPrinciples = [
    ['icon' => 'fa-users', 'title' => 'Community Participation', 'description' => 'Promoting community participation and ownership: Community initiatives and programmes are more successful when the community members are involved in their planning and implementation. Increased participation also promotes sustainability through commitment and ownership by the community.'],
    ['icon' => 'fa-handshake', 'title' => 'Strategic Partnerships', 'description' => 'Enhancing strategic partnerships: The formation of networks is at the core of NEPHAK’s partnership building. Strategic partnerships support communities to achieve much more than they would on their own.'],
    ['icon' => 'fa-universal-access', 'title' => 'Human Rights', 'description' => 'Promoting human rights and diversity: NEPHAK believes that health is a basic human right and adheres to rights-based approaches (RBAs) in its work and operations. Respect for human rights and non-discrimination based on status, gender, tribe, or any other basis are crucial for healthy and positive living.'],
    ['icon' => 'fa-balance-scale-right', 'title' => 'Accountability', 'description' => 'Accountability and transparency: NEPHAK believes in honest communication, openness, and transparent use of resources. Programmes and costs are planned and reviewed carefully to ensure efficient and effective use of resources and the highest return to those served.']
];

$activeTab = 'about';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About NEPHAK</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Tab Styles */
        .flex {
            display: flex;
        }

        .flex-1 {
            flex: 1;
        }

        .border-b {
            border-bottom: 2px solid #e2e8f0;
        }

        .bg-primary {
            background-color: #4a90e2;
        }

        .text-white {
            color: #fff;
        }

        .bg-gray-100 {
            background-color: #f7fafc;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .font-semibold {
            font-weight: 600;
        }

        .transition {
            transition: all 0.3s ease;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .shadow-lg {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .mb-12 {
            margin-bottom: 3rem;
        }

        .p-8 {
            padding: 2rem;
        }

        .text-3xl {
            font-size: 1.875rem;
        }

        .font-black {
            font-weight: 900;
        }

        .text-gray-700 {
            color: #4a5568;
        }

        .leading-relaxed {
            line-height: 1.625;
        }

        .space-y-6 > * + * {
            margin-top: 1.5rem;
        }

        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .md\:grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .md\:grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .gap-6 {
            gap: 1.5rem;
        }

        .bg-gray-100 {
            background-color: #f7fafc;
        }

        .p-6 {
            padding: 1.5rem;
        }

        .text-4xl {
            font-size: 2.25rem;
        }

        .text-primary {
            color: #4a90e2;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .text-xl {
            font-size: 1.25rem;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        /* NEPHAK Specific Styles */
        .nephak {
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px;
            color: #4a90e2;
        }
    </style>
</head>
<body>
<div x-data="{
    coreValues: <?php echo json_encode($coreValues); ?>,
    visionMission: <?php echo json_encode($visionMission); ?>,
    guidingPrinciples: <?php echo json_encode($guidingPrinciples); ?>,
    activeTab: '<?php echo $activeTab; ?>'
}">
    <section class="container mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-12">
            <div class="flex border-b">
                <button @click="activeTab = 'about'" :class="{'bg-primary text-white': activeTab === 'about', 'bg-gray-100': activeTab !== 'about'}" class="flex-1 py-4 px-6 font-semibold transition duration-300">About Us</button>
                <button @click="activeTab = 'visionMission'" :class="{'bg-primary text-white': activeTab === 'visionMission', 'bg-gray-100': activeTab !== 'visionMission'}" class="flex-1 py-4 px-6 font-semibold transition duration-300">Vision & Mission</button>
                <button @click="activeTab = 'values'" :class="{'bg-primary text-white': activeTab === 'values', 'bg-gray-100': activeTab !== 'values'}" class="flex-1 py-4 px-6 font-semibold transition duration-300">Core Values</button>
                <button @click="activeTab = 'principles'" :class="{'bg-primary text-white': activeTab === 'principles', 'bg-gray-100': activeTab !== 'principles'}" class="flex-1 py-4 px-6 font-semibold transition duration-300">Guiding Principles</button>
            </div>
            
            <div class="p-8">
                <div x-show="activeTab === 'about'">
                    <h2 class="text-3xl font-semibold mb-4 font-black">About NEPHAK</h2>
                    <p class="text-gray-700 leading-relaxed">
                        NEPHAK is a national network that writes people living with, at risk of and affected by HIV through community-based organizations (CBDs). Registered in 2003 as an NGO under the NGO's Coordination Act of 1990. NEPHAK aspires for a nation where people living with, at risk of and affected by HIV are at the forefront and meaningfully involved in the interventions geared towards an improved health and well-being of communities' and where their rights are recognized and respected. The network's overarching goal is to achieve sustained improvement in the health and well-being of communities.
                    </p>
                    <div class="nephak">NEPHAK</div>
                    <div class="nephak">Empowering People Leveraging the Lives</div>
                </div>
                
                <div x-show="activeTab === 'visionMission'" class="space-y-6">
                    <h2 class="text-3xl font-semibold mb-6 font-black">Vision & Mission</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <?php foreach ($visionMission as $item): ?>
                            <div class="bg-gray-100 p-6 rounded-lg">
                                <i class="fas <?php echo $item['icon']; ?> text-4xl text-primary mb-4"></i>
                                <h3 class="text-xl font-semibold mb-2"><?php echo $item['title']; ?></h3>
                                <p class="text-gray-700"><?php echo $item['description']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div x-show="activeTab === 'values'">
                    <h2 class="text-3xl font-semibold mb-6 font-black">Core Values</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach ($coreValues as $value): ?>
                            <div class="bg-gray-100 p-6 rounded-lg">
                                <i class="fas <?php echo $value['icon']; ?> text-4xl text-primary mb-4"></i>
                                <h3 class="text-xl font-semibold mb-2"><?php echo $value['title']; ?></h3>
                                <p class="text-gray-700"><?php echo $value['description']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div x-show="activeTab === 'principles'">
                    <h2 class="text-3xl font-semibold mb-6 font-black">Guiding Principles</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach ($guidingPrinciples as $principle): ?>
                            <div class="bg-gray-100 p-6 rounded-lg">
                                <i class="fas <?php echo $principle['icon']; ?> text-4xl text-primary mb-4"></i>
                                <h3 class="text-xl font-semibold mb-2"><?php echo $principle['title']; ?></h3>
                                <p class="text-gray-700"><?php echo $principle['description']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>