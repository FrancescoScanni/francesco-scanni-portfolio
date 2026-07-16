<?php

    $infoArt='<section class="max-w-6xl mx-auto px-6 pt-12 pb-2 md:pt-28 md:pb-28">
                <div class="max-w-3xl">
                    <span class="text-orange-600 bg-orange-100 font-bold text-xs px-4 py-1.5 rounded-full uppercase tracking-widest mb-6 inline-block">
                        Articoli
                    </span>
                    <h1 class="text-5xl md:text-7xl font-extrabold mb-8 leading-tight tracking-tight text-[#1B1B1B]">
                        I miei articoli
                    </h1>
                    <p class="font-mono text-gray-600 text-lg md:text-xl leading-relaxed border-l-4 border-gray-300 pl-6">
                        Una raccolta degli articoli che ho scritto, i quali trattano argomenti di tecnologia, programmazione e sviluppo web. Condivido le mie conoscenze e le mie esperienze per aiutare gli altri a crescere nel mondo digitale.
                    </p>
                </div>
            </section>';

    $prefooterArt='<section class="flex justify-end max-w-6xl mx-auto px-6 pt-18 pb-20 md:pb-32">
                <div class="max-w-3xl">
                    <span class="text-blue-600 bg-blue-100 font-bold text-xs px-4 py-1.5 rounded-full uppercase tracking-widest mb-6 inline-block">
                        Futuro
                    </span>
                    <h1 class="text-4xl md:text-7xl font-extrabold mb-8 leading-tight tracking-tight text-[#1B1B1B]">
                        Prossimamente
                    </h1>
                    <p class="font-mono text-gray-600 text-lg md:text-xl leading-relaxed border-l-4 border-gray-300 pl-6">
                        Scrivere articoli e riflessioni personali richiede una piccola fetta del mio tempo libero. Farlo mi permette di far conoscere la mia persona, sfruttando anche lo strumento del portfolio. Prossimamente pubblicherò articoli e riflessioni personali, quindi non dimenticare di tornare a visitare questa sezione per leggere i miei contenuti.
                    </p>
                </div>
            </section>';

    $articles='

        <article class="min-h-screen bg-[#F8F9FA] py-12 px-4 sm:px-6 lg:px-8 font-sans text-gray-900">
    <div class="max-w-3xl mx-auto">
        
        <div class="mb-8">
            <a href="blog.php" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Torna agli articoli
            </a>
        </div>

        <header class="mb-8">
            <div class="flex items-center space-x-4 mb-4 text-xs font-mono text-slate-500">
                <span class="bg-blue-100 text-blue-800 px-2.5 py-1 rounded-full font-semibold uppercase tracking-wider">
                    Tecnologia
                </span>
                <time datetime="<?php echo date("Y-m-d", strtotime($article["published_at"])); ?>">
                    <?php echo date("d M Y", strtotime($article["published_at"])); ?>
                </time>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <?php echo number_format($article["views_count"]); ?> letture
                </span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight mb-4 leading-tight">
                <?php echo htmlspecialchars($article["title"]); ?>
            </h1>

            <p class="text-lg sm:text-xl text-slate-600 font-light leading-relaxed mb-6">
                <?php echo htmlspecialchars($article["excerpt"]); ?>
            </p>
        </header>

        <?php if (!empty($article["featured_image"])): ?>
            <div class="mb-10 rounded-2xl overflow-hidden shadow-lg aspect-video max-h-[450px]">
                <img 
                    src="<?php echo htmlspecialchars($article["featured_image"]); ?>" 
                    alt="<?php echo htmlspecialchars($article["title"]); ?>" 
                    class="w-full h-full object-cover"
                />
            </div>
        <?php endif; ?>

        <section class="prose prose-slate lg:prose-lg max-w-none 
                        [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-slate-800 [&_h2]:mt-8 [&_h2]:mb-4 
                        [&_h3]:text-xl [&_h3]:font-bold [&_h3]:text-slate-800 [&_h3]:mt-6 [&_h3]:mb-3 
                        [&_p]:text-slate-600 [&_p]:leading-relaxed [&_p]:mb-6
                        [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-6 [&_ul]:text-slate-600
                        [&_li]:mb-2
                        [&_blockquote]:border-l-4 [&_blockquote]:border-blue-500 [&_blockquote]:pl-4 [&_blockquote]:italic [&_blockquote]:my-6 [&_blockquote]:text-slate-700
                        [&_hr]:my-8 [&_hr]:border-slate-200">
            
            <?php 
                // Se il testo nel database è salvato direttamente in HTML, stampalo così:
                echo $article["content"]; 
                
                // Se invece è salvato in formato Markdown puro, assicurati di passarlo 
                // attraverso un parser Markdown prima di stamparlo.
            ?>
        </section>

        <footer class="mt-12 pt-8 border-t border-slate-200">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-blue-600 text-white font-bold rounded-full flex items-center justify-center text-lg shadow-md">
                    A
                </div>
                <div>
                    <h4 class="text-sm font-bold text-slate-800">Scritto da Me</h4>
                    <p class="text-xs text-slate-500">Studente di Ingegneria & Sviluppatore Web</p>
                </div>
            </div>
        </footer>

    </div>
</article>';
    
?>