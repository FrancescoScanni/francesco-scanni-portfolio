// static/js/articleOverlayer.js

function openOverlay(url) {
    if (document.getElementById("dynamic-portfolio-overlay")) return;

    // 1. Inject the entire HTML structure into the DOM in a single step
    document.body.insertAdjacentHTML('beforeend', `
        <div id="dynamic-portfolio-overlay" class="fixed inset-0 bg-black/80 backdrop-blur-md z-50 flex justify-center items-center opacity-0 transition-opacity duration-300 px-4 sm:px-6">
            <div id="modal-box" class="bg-[#1B1B1B] text-white rounded-lg max-w-3xl w-full max-h-[85vh] overflow-y-auto relative p-6 sm:p-8 shadow-2xl border border-neutral-800 scale-95 transition-transform duration-300">
                <button id="close-modal-btn" class="absolute top-4 right-4 text-neutral-400 hover:text-white text-3xl font-bold leading-none z-10 cursor-pointer">&times;</button>
                <div id="modal-content" class="prose prose-invert max-w-none font-sans">
                    <div class="flex flex-col items-center justify-center py-12">
                        <div class="w-10 h-10 border-4 border-[#3F8E00] border-t-transparent rounded-full animate-spin"></div>
                        <p class="text-neutral-400 mt-4 text-sm font-mono tracking-wider">Loading content...</p>
                    </div>
                </div>
            </div>
        </div>
    `);

    const overlay = document.getElementById("dynamic-portfolio-overlay");
    const modalBox = document.getElementById("modal-box");
    const content = document.getElementById("modal-content");

    // 2. Entrance animation
    requestAnimationFrame(() => {
        overlay.classList.add("opacity-100");
        modalBox.classList.remove("scale-95");
        modalBox.classList.add("scale-100");
    });

    // 3. Close function
    const closeOverlay = () => {
        overlay.classList.remove("opacity-100");
        modalBox.classList.add("scale-95");
        modalBox.classList.remove("scale-100");
        setTimeout(() => overlay.remove(), 300);
    };

    // Close by clicking outside or on the "X" (Event Delegation)
    overlay.addEventListener("click", (e) => {
        if (e.target === overlay || e.target.id === "close-modal-btn") closeOverlay();
    });

    // 4. Data fetch
    fetch(url)
        .then(res => {
            if (!res.ok) throw new Error(res.status);
            return res.text();
        })
        .then(html => content.innerHTML = html)
        .catch(() => {
            content.innerHTML = `
                <div class="text-center py-6">
                    <p class="text-red-500 font-bold text-lg">❌ Loading error</p>
                    <p class="text-neutral-500 text-xs mt-1">Unable to load the requested path: ${url}</p>
                </div>`;
        });
}

window.openOverlay = openOverlay;