
    let globalExperiences = []; // Variabile per salvare i dati e usarli nel popup

    fetch('../../data/pcto.json')
    .then(res => res.json())
    .then(experiences => {
        globalExperiences = experiences; // Salviamo i dati
        const grid = document.getElementById("pcto-grid");

        experiences.forEach((exp, index) => {
            const card = document.createElement("div");
            card.className = `${exp.block} bg-card border border-border rounded-2xl overflow-hidden flex flex-col`;

            let html = "";

            if (exp.img) {
                html += `<img src="${exp.img}" alt="${exp.title ?? ""}" class="w-full ${exp.imgHeight} object-cover">`;
            }

            html += `<div class="flex flex-col gap-3 p-6 flex-1">`;
            html += `<span class="font-ibm text-[11px] font-bold uppercase tracking-widest px-3 py-1 rounded-full w-fit ${exp.tagClass}">${exp.tag}</span>`;

            if (exp.type === "stat") {
                html += `<div class="font-raleway text-white text-[52px] font-black leading-none">${exp.stat}</div>`;
                html += `<div class="font-ibm text-muted text-[13px]">${exp.statLabel}</div>`;
                html += `<p class="font-ibm text-faint text-[13px] leading-relaxed mt-auto">${exp.text}</p>`;

            } else if (exp.type === "tools") {
                html += `<div class="flex flex-col gap-2 mt-1">`;
                exp.tools.forEach(t => {
                    html += `<div class="font-ibm text-[13px] text-muted border-b border-border pb-2">→ ${t}</div>`;
                });
                html += `</div>`;

            } else {
                html += `<p class="font-raleway text-white text-[18px] font-black leading-snug">${exp.title}</p>`;
                html += `<p class="font-ibm text-muted text-[13px] leading-relaxed">${exp.text}</p>`;
                
                // Generazione Keywords
                if (exp.keywords && exp.keywords.length > 0) {
                    html += `<div class="flex flex-wrap gap-2 mt-auto pt-2">`;
                    exp.keywords.forEach(kw => {
                        html += `<span class="px-2 py-1 text-[11px] font-ibm border rounded-md ${exp.keywordsColor}">#${kw}</span>`;
                    });
                    html += `</div>`;
                }

                // Generazione Bottone Popup (se c'è il campo link)
                if (exp.link) {
                    html += `<button onclick="openModal(${index})" class="font-ibm text-[13px] font-bold mt-auto pt-2 text-left w-fit hover:opacity-70 transition-opacity ${exp.linkClass}">${exp.link} →</button>`;
                }
            }

            html += `</div>`;
            card.innerHTML = html;
            grid.appendChild(card);
        });

    })
    .catch(err => console.error("Errore caricamento pcto.json:", err));

    /* =========================================
       FUNZIONI PER LA GESTIONE DEL POPUP 
       ========================================= */

    function openModal(index) {
        const exp = globalExperiences[index];
        const modal = document.getElementById('modal-backdrop');
        const modalBody = document.getElementById('modal-body');
        
        let popupHtml = `<div class="w-full flex flex-col overflow-y-auto">`;

        // Se l'esperienza ha PIU' BLOCCHI (popupSections)
        if (exp.popupSections && exp.popupSections.length > 0) {
            
            exp.popupSections.forEach((section, i) => {
                // Alterna l'immagine a sinistra e a destra (Layout Zig-Zag)
                const isEven = (i % 2 === 0); 
                const flexDir = isEven ? 'md:flex-row' : 'md:flex-row-reverse';
                
                popupHtml += `
                    <div class="flex flex-col ${flexDir} w-full border-b border-border/50 last:border-0">
                        <div class="md:w-5/12 w-full h-64 md:h-auto relative bg-[#0a0a0a]">
                            <img src="${section.img}" class="absolute inset-0 w-full h-full object-cover" />
                        </div>
                        <div class="md:w-7/12 w-full p-8 md:p-12 flex flex-col justify-center gap-6">
                            ${i === 0 ? `<span class="font-ibm text-[11px] font-bold uppercase tracking-widest px-3 py-1 rounded-full w-fit ${exp.tagClass}">${exp.tag}</span>` : ''}
                            
                            <h2 class="font-raleway text-white text-[28px] md:text-[36px] font-black leading-tight">${section.title}</h2>
                            <p class="font-ibm text-muted text-[15px] leading-relaxed">${section.text}</p>
                            
                            ${i === exp.popupSections.length - 1 && exp.keywords && exp.keywords.length > 0 ? `
                                <div class="mt-4 border-t border-border pt-6">
                                    <p class="font-ibm text-faint text-[12px] uppercase tracking-widest mb-4">Competenze chiave</p>
                                    <div class="flex flex-wrap gap-2">
                                        ${exp.keywords.map(kw => `<span class="px-3 py-1.5 text-[12px] font-ibm border rounded-md ${exp.keywordsColor}">#${kw}</span>`).join('')}
                                    </div>
                                </div>
                            ` : ''}
                        </div>
                    </div>
                `;
            });

        // Se l'esperienza ha un SOLO BLOCCO (standard)
        } else {
            popupHtml += `
                <div class="flex flex-col md:flex-row w-full">
                    <div class="md:w-5/12 w-full h-64 md:h-[60vh] relative bg-[#0a0a0a]">
                        <img src="${exp.img}" class="absolute inset-0 w-full h-full object-cover" />
                    </div>
                    <div class="md:w-7/12 w-full p-8 md:p-12 flex flex-col justify-center gap-6">
                        <span class="font-ibm text-[11px] font-bold uppercase tracking-widest px-3 py-1 rounded-full w-fit ${exp.tagClass}">${exp.tag}</span>
                        
                        <h2 class="font-raleway text-white text-[32px] md:text-[40px] font-black leading-tight">${exp.title}</h2>
                        <p class="font-ibm text-muted text-[15px] leading-relaxed">${exp.popupText ? exp.popupText : exp.text}</p>
                        
                        ${exp.keywords && exp.keywords.length > 0 ? `
                            <div class="mt-4 border-t border-border pt-6">
                                <p class="font-ibm text-faint text-[12px] uppercase tracking-widest mb-4">Competenze chiave</p>
                                <div class="flex flex-wrap gap-2">
                                    ${exp.keywords.map(kw => `<span class="px-3 py-1.5 text-[12px] font-ibm border rounded-md ${exp.keywordsColor}">#${kw}</span>`).join('')}
                                </div>
                            </div>
                        ` : ''}
                    </div>
                </div>
            `;
        }

        popupHtml += `</div>`;
        modalBody.innerHTML = popupHtml;
        
        // Animazione di apertura
        modal.classList.remove('hidden');
        void modal.offsetWidth;
        modal.classList.remove('opacity-0');
        document.getElementById('modal-content').classList.remove('scale-95');
        document.body.style.overflow = 'hidden';
    }

    // Chiusura al click fuori dal popup
    function closeModal(event) {
        if (event.target.id === 'modal-backdrop') {
            forceCloseModal();
        }
    }

    // Chiusura al click della X
    function forceCloseModal() {
        const modal = document.getElementById('modal-backdrop');
        modal.classList.add('opacity-0');
        document.getElementById('modal-content').classList.add('scale-95');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Riabilita lo scroll della pagina
        }, 300); // Attende la fine dell'animazione CSS
    }
