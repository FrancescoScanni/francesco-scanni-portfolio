

document.addEventListener("DOMContentLoaded", () => {
    // 1. Trova tutti gli elementi che hanno l'attributo "data-include"
    const placeholders = document.querySelectorAll("[data-include]");
    
    // 2. Crea un array di "Promesse" (operazioni asincrone in corso)
    const promises = Array.from(placeholders).map(async (element) => {
        const filePath = element.getAttribute("data-include");
        
        try {
            // Effettua la richiesta HTTP interna per scaricare il file .html
            const response = await fetch(filePath);
            
            if (!response.ok) {
                throw new Error(`Impossibile caricare il file: ${filePath}`);
            }
            
            // Estrae il testo HTML dal file scaricato
            const htmlContent = await response.text();
            
            // Inietta l'HTML all'interno del contenitore segnaposto
            element.innerHTML = htmlContent;
            
        } catch (error) {
            console.error(`Errore nel caricamento del componente [${filePath}]:`, error);
            element.innerHTML = `<p style="color: red; padding: 10px;">Errore caricamento component</p>`;
        }
    });

    // 3. Aspetta che TUTTI i file siano stati scaricati e iniettati contemporaneamente
    Promise.all(promises).then(() => {
        console.log("Sito web assemblato: tutti i componenti sono nel DOM!");
        
        // 4. Lancia un evento personalizzato globale per avvisare gli altri script
        const event = new CustomEvent("HTMLComponentsLoaded");
        document.dispatchEvent(event);
    });
});