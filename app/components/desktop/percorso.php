<?php
    include_once("elements/project.php");
    include_once("elements/timeline.php");
    include_once("db/confDB.php");
    $json=file_get_contents("elements/projJSON.json");
    $projects = json_decode($json, true);

    $sql = "SELECT * FROM timeline_events ORDER BY order_date ASC";
    $result = $conn->query($sql);
    $timelineEvents = [];

    // Mappatura delle classi CSS per le forme delle didascalie
    $shape_classes = [
        "fumetto"   => "bg-blue-50 text-blue-800 p-3 text-xs font-mono rounded-2xl rounded-tl-none border border-blue-100 transition-all group-data-[active=true]/item:bg-blue-600 group-data-[active=true]/item:text-white",
        "nastro"    => "bg-amber-50 text-amber-900 p-3 text-xs font-mono border-l-4 border-amber-500 shadow-sm transition-all group-data-[active=true]/item:bg-amber-500 group-data-[active=true]/item:text-white",
        "pillola"   => "bg-emerald-50 text-emerald-800 py-2 px-5 text-xs font-mono rounded-full border border-emerald-200 text-center shadow-sm transition-all group-data-[active=true]/item:bg-emerald-600 group-data-[active=true]/item:text-white group-data-[active=true]/item:border-emerald-600",
        "inclinata" => "bg-purple-50 text-purple-800 p-3 text-xs font-mono rounded-md -skew-x-6 border-r-2 border-purple-400 text-center transition-all group-data-[active=true]/item:bg-purple-600 group-data-[active=true]/item:text-white"
    ];
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Francesco | Portfolio Progetti</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F8F9FA] antialiased font-sans text-gray-900">

    <div class="profile fixed ">

    </div>

    <?php echo $header; ?>
    <?php echo $intro; ?>

    <!--TIMELINE-->
    <div class="relative bg-[#F8F9FA] w-full flex items-center h-[650px] font-sans text-gray-900 overflow-hidden my-12">
    
        <button id="btnPrev" class="absolute left-6 z-20 bg-white/90 backdrop-blur-sm p-3 rounded-full border border-gray-200 text-blue-600 hover:bg-blue-100 transition-all shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <button id="btnNext" class="absolute right-6 z-20 bg-white/90 backdrop-blur-sm p-3 rounded-full border border-gray-200 text-blue-600 hover:bg-blue-100 transition-all shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>

        <div id="timelineContainer" class="flex overflow-x-auto snap-x snap-mandatory [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none] scroll-smooth w-full h-full items-center px-[15vw] md:px-[38vw] relative">
            
            <div class="absolute top-1/2 left-0 w-[500vw] h-[2px] bg-slate-200 -translate-y-1/2 z-0"></div>

            <?php    
                //fetching data from DB
                $sql = "SELECT * FROM timeline_events ORDER BY order_date ASC";
                $result = $conn->query($sql);

                $shape_classes = [
                    "fumetto"   => "bg-blue-50 text-blue-800 p-3 text-xs font-mono rounded-2xl rounded-tl-none border border-blue-100 transition-all group-data-[active=true]/item:bg-blue-600 group-data-[active=true]/item:text-white",
                    "nastro"    => "bg-amber-50 text-amber-900 p-3 text-xs font-mono border-l-4 border-amber-500 shadow-sm transition-all group-data-[active=true]/item:bg-amber-500 group-data-[active=true]/item:text-white",
                    "pillola"   => "bg-emerald-50 text-emerald-800 py-2 px-5 text-xs font-mono rounded-full border border-emerald-200 text-center shadow-sm transition-all group-data-[active=true]/item:bg-emerald-600 group-data-[active=true]/item:text-white group-data-[active=true]/item:border-emerald-600",
                    "inclinata" => "bg-purple-50 text-purple-800 p-3 text-xs font-mono rounded-md -skew-x-6 border-r-2 border-purple-400 text-center transition-all group-data-[active=true]/item:bg-purple-600 group-data-[active=true]/item:text-white"
                ];

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id          = $row['id'] ?? 'N/A';
                        $event_date  = $row['event_date'];
                        $title       = $row['title'];
                        $description = $row['description'];
                        $caption     = $row['caption'];
                        $image_path  = $row['image_path'];
                        $shape_type  = $row['shape_type'];
                        $quadrant    = $row['quadrant'];

                        $current_shape = $shape_classes[$shape_type] ?? $shape_classes['fumetto'];
                        $caption_position_class = ($shape_type === 'pillola') ? 'flex justify-center' : '';
                        echo '<div data-active="false" class="timeline-item group/item shrink-0 w-[300px] md:w-[340px] mx-12 snap-center relative h-full flex flex-col justify-center cursor-pointer transition-all duration-500 ease-in-out data-[active=false]:opacity-25 data-[active=false]:scale-95 data-[active=true]:opacity-100 data-[active=true]:scale-100">';

                        if ($quadrant === 'above') {
                            echo '<div class="absolute bottom-[calc(50%+24px)] left-0 w-full">
                                    <div class="bg-white border border-slate-100 rounded-2xl overflow-hidden transition-all duration-300 group-data-[active=true]/item:border-blue-300 group-data-[active=true]/item:shadow-xl">';
                            if (!empty($image_path)) {
                                echo '  <div class="w-full h-32 bg-slate-100 flex items-center justify-center border-b border-slate-100 overflow-hidden">
                                            <img src="' . htmlspecialchars($image_path) . '" alt="' . htmlspecialchars($title) . '" class="w-full h-full object-cover">
                                        </div>';
                            }
                            echo '      <div class="p-5">
                                            <span class="font-mono text-[11px] font-bold tracking-wider text-blue-600 block mb-1">' . htmlspecialchars($event_date) . '</span>
                                            <h3 class="text-lg font-bold text-slate-800">' . htmlspecialchars($title) . '</h3>
                                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">' . htmlspecialchars($description) . '</p>
                                        </div>
                                    </div>
                                </div>';

                            echo '<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3.5 h-3.5 bg-slate-300 rounded-full border-4 border-white z-10 transition-all duration-300 group-data-[active=true]/item:bg-blue-600 group-data-[active=true]/item:ring-4 group-data-[active=true]/item:ring-blue-100 group-data-[active=true]/item:scale-125"></div>';

                            echo '<div class="absolute top-[calc(50%+24px)] left-0 w-full ' . $caption_position_class . '">
                                    <div class="' . $current_shape . '">' . htmlspecialchars($caption) . '</div>
                                </div>';
                        } else {
                            echo '<div class="absolute bottom-[calc(50%+24px)] left-0 w-full ' . $caption_position_class . '">
                                    <div class="' . $current_shape . '">' . htmlspecialchars($caption) . '</div>
                                </div>';
                            echo '<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3.5 h-3.5 bg-slate-300 rounded-full border-4 border-white z-10 transition-all duration-300 group-data-[active=true]/item:bg-blue-600 group-data-[active=true]/item:ring-4 group-data-[active=true]/item:ring-blue-100 group-data-[active=true]/item:scale-125"></div>';
                            
                            // CARD SOTTO
                            echo '<div class="absolute top-[calc(50%+24px)] left-0 w-full">
                                    <div class="bg-white border border-slate-100 rounded-2xl overflow-hidden transition-all duration-300 group-data-[active=true]/item:border-blue-300 group-data-[active=true]/item:shadow-xl">';
                            if (!empty($image_path)) {
                                echo '  <div class="w-full h-32 bg-slate-100 flex items-center justify-center border-b border-slate-100 overflow-hidden">
                                            <img src="' . htmlspecialchars($image_path) . '" alt="' . htmlspecialchars($title) . '" class="w-full h-full object-cover">
                                        </div>';
                            }
                            echo '      <div class="p-5">
                                            <span class="font-mono text-[11px] font-bold tracking-wider text-blue-600 block mb-1">' . htmlspecialchars($event_date) . '</span>
                                            <h3 class="text-lg font-bold text-slate-800">' . htmlspecialchars($title) . '</h3>
                                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">' . htmlspecialchars($description) . '</p>
                                        </div>
                                    </div>
                                </div>';
                        }
                        echo '</div>';
                    }
                } else {
                    echo "<p class='text-slate-400 font-mono text-xs w-full text-center'>Nessun evento presente nel database.</p>";
                }
            ?>

            <div class="shrink-0 w-[15vw] md:w-[35vw]"></div>
        </div>
    </div>

    <?php echo $prefooter; ?>
    <?php echo $footer;?>
    <script src="../../component_loader.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('timelineContainer');
        const items = document.querySelectorAll('.timeline-item');
        
        // Clicca su un blocco per centrarlo
        items.forEach(item => item.addEventListener('click', () => item.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' })));

        // Gestione stato attivo (true/false) tramite IntersectionObserver
        const observer = new IntersectionObserver(entries => {
            entries.forEach(e => e.target.setAttribute('data-active', e.isIntersecting));
        }, { root: container, rootMargin: '0px -30% 0px -30%', threshold: 0.5 });

        items.forEach(item => observer.observe(item));

        // Scroll manuale con i pulsanti freccia
        document.getElementById('btnNext').addEventListener('click', () => container.scrollBy({ left: 350, behavior: 'smooth' }));
        document.getElementById('btnPrev').addEventListener('click', () => container.scrollBy({ left: -350, behavior: 'smooth' }));
    });
</script>

</body>
</html>