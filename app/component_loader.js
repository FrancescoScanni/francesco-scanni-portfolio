document.addEventListener("DOMContentLoaded", async () => {
    // Trasforma la NodeList in array tramite spread operator [...] ed esegue il map
    const promises = [...document.querySelectorAll("[data-include]")].map(async (el) => {
        const file = el.dataset.include; // Più pulito di getAttribute()
        
        try {
            const res = await fetch(file);
            if (!res.ok) throw new Error();
            el.innerHTML = await res.text();
        } catch {
            // Usa le classi Tailwind che hai nel resto del progetto per coerenza
            el.innerHTML = `<p class="text-red-500 p-2 text-sm">Errore caricamento: ${file}</p>`;
        }
    });

    // Aspetta tutte le promise prima di lanciare l'evento
    await Promise.all(promises);
    
    // Lancia l'evento personalizzato globale
    document.dispatchEvent(new CustomEvent("HTMLComponentsLoaded"));
});