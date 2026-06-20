<?php
// TODO 1: Define a multi-dimensional associative array for 3-4 people
$people = [
    [
        "name" => "Shahd",
        "role" => "Intelligent Systems Engineer",
        "skills" => ["Python", "Machine Learning", "JavaScript", "Data Science"],
        "is_active" => true,
        "avatar" => "https://api.dicebear.com/7.x/bottts/svg?seed=Shahd"
    ],
    [
        "name" => "Ahmed",
        "role" => "Web Developer",
        "skills" => ["PHP", "HTML5", "CSS3", "Bootstrap 5"],
        "is_active" => true,
        "avatar" => "https://api.dicebear.com/7.x/bottts/svg?seed=Ahmed"
    ],
    [
        "name" => "Ali",
        "role" => "Network Engineer",
        "skills" => ["Cisco Packet Tracer", "Static Routing", "Security"],
        "is_active" => false,
        "avatar" => "https://api.dicebear.com/7.x/bottts/svg?seed=Ali"
    ]
];

// TODO 2: Create a function to get the total number of people in the array
function getTotalPeopleCount($peopleArray) {
    return count($peopleArray);
}

// TODO 3: Create a function to get the current date format
function getCurrentFormattedDate() {
    return date("F j, Y"); 
}

// TODO 4: Create a helper function to render skill badges
function renderSkills($skills) {
    $output = '';
    foreach ($skills as $skill) {
        $output .= '<span class="badge skill-badge me-1 mb-1">' . htmlspecialchars($skill) . '</span>';
    }
    return $output;
}

$totalPeople = getTotalPeopleCount($people);
$currentDate = getCurrentFormattedDate();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card Generator </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #060109;
            color: #6f1de2;
            font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
            overflow-x: hidden;
        }
        .header-section {
            background: linear-gradient(135deg, #1f1135 0%, #0b0c10 100%);
            border-bottom: 2px solid #a855f7;
            padding: 40px 0;
        }
        .text-purple-glow {
            color: #f3e8ff;
            text-shadow: 0 0 15px rgba(168, 85, 247, 0.6);
        }
        .stat-card {
            background-color: #12141c;
            border: 1px solid #2d194d;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }
        
        /* تصميم الكروت الأساسي قبل تفعيل الـ JS */
        .profile-card {
            background-color: #12141c;
            border: 1px solid #1f2937;
            border-top: 4px solid #a855f7;
            border-radius: 12px;
            cursor: pointer;
            perspective: 1000px; /* لتهيئة بيئة ثلاثية الأبعاد للحركة */
            transform-style: preserve-3d;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        
        /* تأثير سحب الإضاءة عند تفعيل الكارت بالـ JS */
        .profile-card.active-hover {
            border-top-color: #00f2fe;
            box-shadow: 0 15px 30px rgba(168, 85, 247, 0.25);
        }

        .profile-card img {
            transition: transform 0.3s ease;
        }

        .skill-badge {
            background-color: #2e1654;
            color: #e9d5ff;
            border: 1px solid #6b21a8;
            transition: all 0.2s ease;
        }
        .skill-badge:hover {
            background-color: #a855f7;
            color: #fff;
            transform: scale(1.1);
        }

        /* أنيميشن النبض للخلفية المستمرة */
        .status-dot {
            width: 10px;
            height: 10px;
            display: inline-block;
            border-radius: 50%;
        }
        .status-active {
            background-color: #22c55e;
            animation: pulse-green 2s infinite;
        }
        .status-offline {
            background-color: #ef4444;
            animation: pulse-red 2s infinite;
        }

        @keyframes pulse-green {
            0% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(34, 197, 94, 0); }
            100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
        }
        @keyframes pulse-red {
            0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(239, 68, 68, 0); }
            100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }

        .university-logo {
            background-color: white;
            padding: 5px;
            border-radius: 8px;
            width: 60px;
            height: 60px;
            object-fit: contain;
        }
    </style>
</head>
<body>

<div class="header-section text-center mb-5">
    <div class="container">
        <img src="https://alaqsa.edu.ps/site_media/img/logo.png" alt="Al-Aqsa University" class="university-logo mb-3">
        <h6 class="text-uppercase text-muted m-0">Al-Aqsa University</h6>
        <h1 class="display-5 fw-bold text-purple-glow my-2">Profile <span style="color: #c084fc;">Card Generator</span></h1>
        <br>
        <br>
       <hr>
</div>

<div class="container">
    <div class="row g-4 mb-5 justify-content-center">
        <div class="col-md-8">
            <div class="stat-card text-center h-100 d-flex flex-column justify-content-center">
                <h4 style="color: #e9d5ff;" class="mb-2">Complete the TODOs!</h4>
                <p class="text-muted m-0">Open this file in your code editor and complete all 6 TODOs in the PHP section at the top of the file.</p>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="stat-card text-center">
                <h3 style="color: #d8b4fe; font-weight: bold;"><?php echo $totalPeople; ?></h3>
                <p class="text-muted small m-0">Total People</p>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="stat-card text-center">
                <p class="m-0 fw-semibold" style="font-size: 0.9rem; padding: 6px 0; color: #e9d5ff;"><?php echo $currentDate; ?></p>
                <p class="text-muted small m-0">Current Date</p>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        
        <?php if (empty($people)): ?>
            <div class="col-12 text-center my-5">
                <p class="text-warning fs-5">No people found. Complete TODO 1 to add data!</p>
            </div>
        <?php else: ?>
            
            <?php foreach ($people as $person): ?>
                <div class="col">
                    <div class="card profile-card js-profile-card h-100 p-3">
                        <div class="card-body text-center d-flex flex-column justify-content-between">
                            <div>
                                <img src="<?php echo $person['avatar']; ?>" alt="Avatar" class="rounded-circle mx-auto mb-3 bg-dark border border-secondary p-1" style="width: 80px; height: 80px;">
                                
                                <h5 class="card-title fw-bold text-white mb-1"><?php echo htmlspecialchars($person['name']); ?></h5>
                                <p class="text-muted small mb-3"><?php echo htmlspecialchars($person['role']); ?></p>
                                
                                <div class="mb-4">
                                    <?php echo renderSkills($person['skills']); ?>
                                </div>
                            </div>
                            
                            <div class="border-top border-secondary pt-3 mt-auto d-flex align-items-center justify-content-center">
                                <span class="status-dot <?php echo $person['is_active'] ? 'status-active' : 'status-offline'; ?> me-2"></span>
                                <span class="small text-muted">
                                    <?php echo $person['is_active'] ? 'Active System' : 'Offline'; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            
        <?php endif; ?>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll('.js-profile-card');

    cards.forEach(card => {
        const avatar = card.querySelector('img');

        card.addEventListener('mousemove', (e) => {
            // حساب أبعاد وموقع الكارت بالنسبة للشاشة
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left; // موقع مؤشر الماوس الأفقي داخل الكارت
            const y = e.clientY - rect.top;  // موقع مؤشر الماوس العمودي داخل الكارت
            
            // حساب زوايا الميلان البرمجية بناءً على حركة الماوس
            const midX = rect.width / 2;
            const midY = rect.height / 2;
            
            const rotateX = ((midY - y) / midY) * 12; // درجة الميل الرأسي Max 12deg
            const rotateY = ((x - midX) / midX) * 12; // درجة الميل الأفقي Max 12deg

            // تطبيق تأثير الـ 3D العباري بسلاسة
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-5px)`;
            card.classList.add('active-hover');
            
            // تحريك خفيف إضافي للأفاتار الداخلي لعزل العمق (Parallax effect)
            if(avatar) {
                avatar.style.transform = `translateZ(20px) rotate(${rotateY * 0.5}deg)`;
            }
        });

        // إعادة الكارت إلى وضعه الأصلي المستقر فور خروج الماوس
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0px)';
            card.classList.remove('active-hover');
            if(avatar) {
                avatar.style.transform = 'translateZ(0px) rotate(0deg)';
            }
        });
    });
});
</script>
</body>
</html>