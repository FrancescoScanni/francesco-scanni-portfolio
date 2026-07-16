<?php
    include_once("elements/project.php");
    $json = file_get_contents("elements/projJSON.json");
    $projects = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Francesco | Projects Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F8F9FA] antialiased font-sans text-gray-900">

    <?php echo $header; ?>
    
    <?php echo $info; ?>

    <main class="max-w-6xl mx-auto px-6 pb-32 space-y-32">

        <?php
            $layout_inv = false;
            foreach($projects['progetti'] as $proj){
                $layout_inv = $proj["layout_invertito"];
                $titolo = $proj["titolo"];
                $categoria = $proj["categoria"];
                $descrizione = $proj["descrizione"];
                $img = $proj["immagine_url"];
                $url = $proj["progetto_url"];
                $repo_url = $proj["repo_url"];
                
                echo '<div class="flex flex-col '. ($layout_inv ? 'md:flex-row-reverse' : 'md:flex-row') .' items-center gap-12 group">
                        <div class="w-full md:w-1/2 relative overflow-hidden rounded-3xl shadow-xl">
                            <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 pointer-events-none"></div>
                            <img src="'. $img .'" alt="'. $titolo .'" class="w-full h-[400px] object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>

                        <div class="w-full md:w-1/2 flex flex-col items-start md:pl-8">
                            <span class="text-blue-600 bg-blue-100 font-bold text-xs px-4 py-1.5 rounded-full uppercase tracking-widest mb-6">
                                '. $categoria .'
                            </span>
                            <h2 class="text-4xl font-bold mb-6 leading-tight">'. $titolo .'</h2>
                            <p class="font-mono text-gray-600 text-[15px] leading-relaxed mb-8 border-l-4 border-blue-200 pl-4">
                                '. $descrizione .'
                            </p>

                            <div class="flex flex-col gap-3 items-start">
                                <a href="'. $url .'" class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-700 hover:gap-3 transition-all duration-300" target="_blank">
                                    Discover the project
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>

                                <a href="'. $repo_url .'" class="inline-flex items-center gap-2 text-gray-600 font-medium hover:text-gray-900 transition-colors duration-300 text-sm" target="_blank">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.0.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482C19.138 20.193 22 16.44 22 12.017 22 6.484 17.522 2 12 2z" />
                                    </svg>
                                    View Repository
                                </a>
                            </div>
                        </div>
                    </div>';
            }
        ?>
    </main>

    <?php
        echo $prefooter;
        echo $footer;
    ?>
    <script src="../../component_loader.js"></script>
</body>
</html>