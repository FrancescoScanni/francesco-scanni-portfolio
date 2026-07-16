<?php
    include_once("project.php");
    include_once("article.php");
    include_once("../db/confDB.php");

    // Fetch the article based on ID
    $sql = "SELECT * FROM articles WHERE id = " . intval($_GET['id']);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $articles = [];
        while($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
    } else {
        $articles = [];
    }

    // Single article variables
    $article = $articles[0];
    $title = $article['title'];
    $excerpt = $article['excerpt'];
    $content = $article['content'];
    $featured_image = $article['featured_image'];
    $status = $article['status'];
    $is_featured = $article['is_featured'];
    $published_at = $article['published_at'];
    $created_at = $article['created_at'];
    $updated_at = $article['updated_at'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?> - Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
</head>
<body class="bg-slate-50/50 text-slate-800 font-sans antialiased min-h-screen">

    <?php echo $header; ?>

    <main class="max-w-4xl mx-auto px-6 md:px-8 mt-16 md:mt-16">
        
        <div class="mb-8">
            <a href="../articoli.php" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-orange-600 transition-colors group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 transition-transform group-hover:-translate-x-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Back to articles
            </a>
        </div>

        <header class="space-y-6 mb-10">
            <span class="inline-flex items-center rounded-full bg-orange-50 px-4 py-1.5 text-xs font-semibold text-orange-700 ring-1 ring-inset ring-orange-600/10 uppercase tracking-widest">
                Article
            </span>

            <h1 class="text-3xl md:text-5xl font-extrabold text-[#1B1B1B] tracking-tight leading-tight">
                <?php echo htmlspecialchars($title); ?>
            </h1>

            <div class="flex flex-wrap items-center gap-4 text-xs md:text-sm font-mono text-slate-400 border-b border-slate-100 pb-6">
                <div class="flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>
                    <span>Published on: <?php echo date("d/m/Y", strtotime($published_at)); ?></span>
                </div>
            </div>

            <div class="border-l-4 border-orange-400 pl-6 py-2 bg-white/50 rounded-r-2xl pr-4">
                <p class="font-mono text-slate-600 text-base md:text-lg leading-relaxed">
                    <?php echo htmlspecialchars($excerpt); ?>
                </p>
            </div>
        </header>

        <?php if (!empty($featured_image)): ?>
            <div id="post-content2" class="mb-12 overflow-hidden rounded-3xl border-2 border-slate-200 shadow-md">
                <img 
                    src="<?php echo htmlspecialchars($featured_image); ?>" 
                    alt="<?php echo htmlspecialchars($title); ?>"
                    class="w-full h-auto object-cover max-h-[480px]"
                />
            </div>
        <?php endif; ?>

        <article id="post-content" class="text-base md:text-lg leading-relaxed text-slate-700 pb-[80px]
            [&_h2]:text-2xl [&_h2]:md:text-3xl [&_h2]:font-extrabold [&_h2]:text-[#1B1B1B] [&_h2]:mt-10 [&_h2]:mb-5 [&_h2]:tracking-tight [&_h2]:leading-tight
            [&_h3]:text-xl [&_h3]:font-bold [&_h3]:text-slate-800 [&_h3]:mt-8 [&_h3]:mb-3
            [&_p]:mb-6 [&_p]:leading-relaxed [&_p]:text-slate-700
            [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-6
            [&_li]:mb-2 [&_li]:text-slate-700
            [&_blockquote]:border-l-4 [&_blockquote]:border-orange-200 [&_blockquote]:pl-6 [&_blockquote]:font-mono [&_blockquote]:text-slate-600 [&_blockquote]:my-8 [&_blockquote]:italic
            [&_hr]:border-0 [&_hr]:border-t-2 [&_hr]:border-slate-200 [&_hr]:my-12">
            <?php echo $content; ?>
        </article>

    </main>

    <?php echo $footer; ?>

    <script>
        const box = document.getElementById('post-content');
        // Parse the markdown content
        box.innerHTML = marked.parse(box.textContent);
    </script>
</body>
</html>