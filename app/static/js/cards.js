// static/js/cards.js

document.addEventListener("HTMLComponentsLoaded", () => {

    const terminalCardId = "card-fls";
    const terminalFile = "components/overlayers/terminal.html";

    // Crea l'overlay container una volta sola nel DOM
    const overlay = document.createElement("div");
    overlay.id = "overlay";
    overlay.className = "fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300";
    overlay.innerHTML = `
    <div id="overlay-box" class="relative bg-transparent rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto mx-6 scale-95 transition-transform duration-300">
        <button id="overlay-close" class="absolute top-3 right-3 z-10 w-9 h-9 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
        <div id="overlay-content"></div>
    </div>
    `;
    document.body.appendChild(overlay);

    const overlayBox = document.getElementById("overlay-box");
    const overlayContent = document.getElementById("overlay-content");
    const overlayClose = document.getElementById("overlay-close");

    // Apri overlay (ora specifico per il terminale)
    function openOverlay() {
        overlayContent.innerHTML = `<p class="text-[#484848] ibm text-[15px]">Caricamento...</p>`;
        
        overlay.classList.remove("opacity-0", "pointer-events-none");
        overlayBox.classList.remove("scale-95");
        document.body.style.overflow = "hidden";

        fetch(terminalFile)
            .then(res => {
                if (!res.ok) throw new Error(terminalFile);
                return res.text();
            })
            .then(html => { overlayContent.innerHTML = html; })
            .catch(() => { overlayContent.innerHTML = `<p class="text-red-500 ibm text-[15px]">Errore nel caricamento del contenuto.</p>`; });
    }

    // Chiudi overlay
    function closeOverlay() {
        overlay.classList.add("opacity-0", "pointer-events-none");
        overlayBox.classList.add("scale-95");
        document.body.style.overflow = "";
    }

    // Click sulla card specifica del terminale
    const terminalCard = document.getElementById(terminalCardId);
    if (terminalCard) {
        terminalCard.addEventListener("click", openOverlay);
    }

    // Chiudi con pulsante X
    overlayClose.addEventListener("click", closeOverlay);

    // Chiudi cliccando fuori dal box
    overlay.addEventListener("click", (e) => {
        if (e.target === overlay) closeOverlay();
    });

    // Chiudi con ESC
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") closeOverlay();
    });
});