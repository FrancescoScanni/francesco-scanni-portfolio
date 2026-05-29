// static/js/articleOverlayer.js

/**
 * Carica dinamicamente un file HTML e lo mostra all'interno di una modale/overlay a schermo intero.
 * @param {string} url - Il percorso del file HTML da caricare (es. "components/overlay-fls.html")
 */
function openOverlay(url) {
    // Evita di aprire duplicati se un overlay è già presente a schermo
    if (document.getElementById("dynamic-portfolio-overlay")) return;

    // 1. Crea lo sfondo oscurato e sfocato (Overlay Background)
    const overlayBg = document.createElement("div");
    overlayBg.id = "dynamic-portfolio-overlay";
    // Classi Tailwind per sfondo scuro, sfocatura, centratura e transizione fluida
    overlayBg.className = "fixed inset-0 bg-black/80 backdrop-blur-md z-50 flex justify-center items-center opacity-0 transition-opacity duration-300 px-4 sm:px-6";

    // 2. Crea il box della finestra modale (Modal Container)
    const modalBox = document.createElement("div");
    // Stile scuro coerente con il tuo #1B1B1B, bordi arrotondati, scrollbar interna se il testo è lungo
    modalBox.className = "bg-[#1B1B1B] text-white rounded-lg max-w-3xl w-full max-h-[85vh] overflow-y-auto relative p-6 sm:p-8 shadow-2xl border border-neutral-800 scale-95 transition-transform duration-300";

    // 3. Crea il pulsante di chiusura (la 'X' in alto a destra)
    const closeBtn = document.createElement("button");
    closeBtn.innerHTML = "&times;"; // Simbolo matematico della moltiplicazione (X)
    closeBtn.className = "absolute top-4 right-4 text-neutral-400 hover:text-white text-3xl font-bold leading-none focus:outline-none transition-colors cursor-pointer z-10";
    
    // Funzione interna per chiudere l'overlay con animazione di dissolvenza
    const closeOverlay = () => {
        overlayBg.classList.remove("opacity-100");
        modalBox.classList.remove("scale-100");
        // Rimuove l'elemento dal DOM solo al termine dell'animazione CSS (300ms)
        setTimeout(() => overlayBg.remove(), 300);
    };

    // Chiude se si clicca sulla X o fuori dal box modale
    closeBtn.addEventListener("click", closeOverlay);
    overlayBg.addEventListener("click", (e) => {
        if (e.target === overlayBg) closeOverlay();
    });

    // Contenitore interno dove verrà iniettato l'HTML del componente
    const contentContainer = document.createElement("div");
    contentContainer.className = "prose prose-invert max-w-none font-sans";
    contentContainer.innerHTML = `
        <div class="flex flex-col items-center justify-center py-12">
            <div class="w-10 h-10 border-4 border-[#3F8E00] border-t-transparent rounded-full animate-spin"></div>
            <p class="text-neutral-400 mt-4 text-sm font-mono tracking-wider">Caricamento scheda...</p>
        </div>
    `;

    // Assembla la struttura della modale
    modalBox.appendChild(closeBtn);
    modalBox.appendChild(contentContainer);
    overlayBg.appendChild(modalBox);
    document.body.appendChild(overlayBg);

    // 4. Attiva le animazioni CSS di ingresso all'istante successivo
    requestAnimationFrame(() => {
        overlayBg.classList.add("opacity-100");
        modalBox.classList.add("scale-100");
    });

    // 5. Esegue la chiamata AJAX (Fetch) per recuperare il file HTML del PCTO
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Impossibile recuperare il file (Stato: ${response.status})`);
            }
            return response.text();
        })
        .then(html => {
            // Inietta l'HTML dentro la modale
            contentContainer.innerHTML = html;
        })
        .catch(err => {
            // Gestione dell'errore grafica se il file non viene trovato
            contentContainer.innerHTML = `
                <div class="text-center py-6">
                    <p class="text-red-500 font-bold text-lg">❌ Errore di caricamento</p>
                    <p class="text-neutral-400 text-sm mt-2 font-mono">${err.message}</p>
                    <p class="text-neutral-500 text-xs mt-1">Controlla che il percorso "${url}" sia corretto.</p>
                </div>
            `;
        });
}

window.openOverlay = openOverlay;