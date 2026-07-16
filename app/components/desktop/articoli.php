<?php
    include_once("elements/project.php");
    include_once("elements/article.php");
    $json = file_get_contents("elements/projJSON.json");
    $projects = json_decode($json, true);

    include_once("db/confDB.php");

    $sql = "SELECT * FROM articles";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $articles = [];
        while($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
    } else {
        $articles = [];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Francesco | Portfolio Projects</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F8F9FA] antialiased font-sans text-gray-900">

    <?php echo $header; ?>
    <?php echo $infoArt; ?>

    <div class="articleGrid grid grid-cols-1 md:grid-cols-2 gap-8 px-[10vw] mb-[80px]">
    <?php
    foreach ($articles as $article) {
        $title = $article['title'];
        $excerpt = $article['excerpt'];
        $content = $article['content'];
        $featured_image = $article['featured_image'];
        $status = $article['status'];
        $views_count = $article['views_count'];
        $is_featured = $article['is_featured'];
        $published_at = $article['published_at'];
        $created_at = $article['created_at'];
        $updated_at = $article['updated_at'];

        echo '<a href="elements/singleArticle.php?id='.$article['id'].'">
                <article class="group relative bg-white border-2 border-slate-200 hover:border-orange-400 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-2xl transition-all duration-300 ease-out hover:-translate-y-1.5 flex flex-col justify-between">
                    <div class="space-y-5">
                        <span class="inline-flex items-center rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-700 ring-1 ring-inset ring-orange-600/10 uppercase tracking-widest transition-colors duration-300 group-hover:bg-orange-100">
                            Article
                        </span>
                        
                        <h2 class="text-xl md:text-2xl font-bold text-slate-900 tracking-tight leading-snug transition-colors duration-300 group-hover:text-orange-600">
                            '.$title.'
                        </h2>
                        
                        <p class="font-mono text-slate-600 text-sm md:text-base leading-relaxed border-l-2 border-orange-200 pl-4">
                            '.$excerpt.'
                        </p>
                    </div>
                </article>
            </a>';
    }
    ?>
    </div>

    <?php
        echo $prefooterArt;
        echo $footer;
    ?>
    <script src="../../component_loader.js"></script>
</body>
</html>