

const commands = {
    help: () => `
        <p class="text-[#62BA1B] font-bold mt-1">Comandi disponibili:</p>
        <p><span class="text-[#FFA217]">help</span>        — mostra questo menu</p>
        <p><span class="text-[#FFA217]">about</span>       — chi sono</p>
        <p><span class="text-[#FFA217]">github</span>      — le mie competenze</p>
        <p><span class="text-[#FFA217]">pcto</span>        — visualizza ille mie esperienze PCTO</p>
        <p><span class="text-[#FFA217]">clear</span>       — pulisce il terminale</p>
    `,
    about: () => `
        <p class="text-[#9C9C9C] mt-1">👤 <span class="text-white font-bold">Francesco Scanni</span></p>
        <p class="text-[#9C9C9C]">Studente appassionato di tecnologia, AI e sviluppo web.</p>
        <p class="text-[#9C9C9C]">Amo trasformare idee in codice e imparare ogni giorno qualcosa di nuovo.</p>
    `,
    // REDIRECT PCTO
    pcto: () => {
        window.location.href = "components/pcto/pcto.html";
        return `<p class="text-[#62BA1B] mt-1">⟶ Reindirizzamento alla pagina del PCTO...</p>`;
    },

    // REDIRECT PROGETTI
    github: () => {
        // Inserisci qui l'URL dei tuoi progetti (es. GitHub o una pagina dedicata)
        window.open("https://github.com/francescoscanni", "_blank");
        return `<p class="text-[#62BA1B] mt-1">↓ Apertura della sezione progetti...</p>`;
    },

    // REDIRECT ARTICOLI
    articles: () => {
        // Inserisci qui l'URL del tuo blog o della sezione articoli (es. Medium, Dev.to o pagina interna)
        window.open("https://wikipedia.org", "_blank");
        return `<p class="text-[#62BA1B] mt-1">📰 Apertura degli articoli in corso...</p>`;
    },

    clear: () => {
        const history = document.getElementById("term-history");
        if (history) history.innerHTML = "";
        return null;
    },
};

// 1. GESTIONE INVIO COMANDI (Delegazione globale del Keydown)
document.addEventListener("keydown", (e) => {
    if (e.target && e.target.id === "term-input") {
        if (e.key !== "Enter") return;

        const input = e.target;
        const history = document.getElementById("term-history");
        const body = document.getElementById("term-body");

        if (!history || !body) return;

        const cmd = input.value.trim().toLowerCase();
        input.value = "";

        if (!cmd) return;

        // Renderizza la riga di comando digitata dall'utente
        const cmdLine = document.createElement("div");
        cmdLine.className = "flex items-start gap-2";
        cmdLine.innerHTML = `
            <span class="text-[#62BA1B] font-bold select-none whitespace-nowrap">guest@portfolio:~$</span>
            <span class="text-white">${cmd}</span>
        `;
        history.appendChild(cmdLine);

        // Elabora l'output del comando
        const outputHTML = commands[cmd] 
            ? commands[cmd]() 
            : `<p class="text-red-400">Comando non riconosciuto: <span class="text-white">${cmd}</span>. Digita <span class="text-[#FFA217]">help</span> per i comandi disponibili.</p>`;

        if (outputHTML) {
            const out = document.createElement("div");
            out.className = "flex flex-col gap-0.5 ml-1 mb-1";
            out.innerHTML = outputHTML;
            history.appendChild(out);
        }

        // Forza lo scroll verso il basso
        body.scrollTop = body.scrollHeight;
    }
});

// 2. GESTIONE FOCUS AL CLICK (Delegazione globale del Click)
document.addEventListener("click", (e) => {
    if (e.target.closest("#term-body")) {
        const input = document.getElementById("term-input");
        if (input) input.focus();
    }
});

// 3. AUTO-FOCUS ALL'APERTURA (Osservatore dei mutamenti del DOM)
const terminalObserver = new MutationObserver(() => {
    const input = document.getElementById("term-input");
    if (input && document.activeElement !== input) {
        input.focus();
    }
});
terminalObserver.observe(document.body, { childList: true, subtree: true });