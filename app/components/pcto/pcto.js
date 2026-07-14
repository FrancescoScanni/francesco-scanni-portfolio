let exps = [];

const tag = e => `<span class="font-ibm text-[11px] font-bold uppercase tracking-widest px-3 py-1 rounded-full w-fit ${e.tagClass}">${e.tag}</span>`;
const kws = (e, big) => e.keywords?.length ? e.keywords.map(k => `<span class="${big ? 'px-3 py-1.5 text-[12px]' : 'px-2 py-1 text-[11px]'} font-ibm border rounded-md ${e.keywordsColor}">#${k}</span>`).join('') : '';

fetch('../../data/pcto.json').then(r => r.json()).then(data => {
    exps = data;
    document.getElementById('pcto-grid').innerHTML = data.map((e, i) => {
        const img = e.img ? `<img src="${e.img}" alt="${e.title ?? ''}" class="w-full ${e.imgHeight} object-cover">` : '';
        const body = e.type === 'stat'
            ? `${tag(e)}<div class="font-raleway text-white text-[52px] font-black leading-none">${e.stat}</div><div class="font-ibm text-muted text-[13px]">${e.statLabel}</div><p class="font-ibm text-faint text-[13px] leading-relaxed mt-auto">${e.text}</p>`
            : e.type === 'tools'
            ? `${tag(e)}<div class="flex flex-col gap-2 mt-1">${e.tools.map(t => `<div class="font-ibm text-[13px] text-muted border-b border-border pb-2">→ ${t}</div>`).join('')}</div>`
            : `${tag(e)}<p class="font-raleway text-white text-[18px] font-black leading-snug">${e.title}</p><p class="font-ibm text-muted text-[13px] leading-relaxed">${e.text}</p>${e.keywords?.length ? `<div class="flex flex-wrap gap-2 mt-auto pt-2">${kws(e)}</div>` : ''}${e.link ? `<button onclick="openModal(${i})" class="font-ibm text-[13px] font-bold mt-auto pt-2 text-left w-fit hover:opacity-70 transition-opacity ${e.linkClass}">${e.link} →</button>` : ''}`;
        return `<div class="${e.block} bg-card border border-border rounded-2xl overflow-hidden flex flex-col">${img}<div class="flex flex-col gap-3 p-6 flex-1">${body}</div></div>`;
    }).join('');
}).catch(err => console.error("Errore caricamento pcto.json:", err));

function openModal(i) {
    const e = exps[i];
    const single = !e.popupSections?.length;
    const secs = single ? [{ img: e.img, title: e.title, text: e.popupText ?? e.text }] : e.popupSections;

    document.getElementById('modal-body').innerHTML = `<div class="w-full flex flex-col overflow-y-auto">${secs.map((s, i2) => `
        <div class="flex flex-col ${i2 % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse'} w-full border-b border-border/50 last:border-0">
            <div class="md:w-5/12 w-full h-64 ${single ? 'md:h-[60vh]' : 'md:h-auto'} relative bg-[#0a0a0a]"><img src="${s.img}" class="absolute inset-0 w-full h-full object-cover" /></div>
            <div class="md:w-7/12 w-full p-8 md:p-12 flex flex-col justify-center gap-6">
                ${i2 === 0 ? tag(e) : ''}
                <h2 class="font-raleway text-white ${single ? 'text-[32px] md:text-[40px]' : 'text-[28px] md:text-[36px]'} font-black leading-tight">${s.title}</h2>
                <p class="font-ibm text-muted text-[15px] leading-relaxed">${s.text}</p>
                ${i2 === secs.length - 1 && e.keywords?.length ? `<div class="mt-4 border-t border-border pt-6"><p class="font-ibm text-faint text-[12px] uppercase tracking-widest mb-4">Competenze chiave</p><div class="flex flex-wrap gap-2">${kws(e, true)}</div></div>` : ''}
            </div>
        </div>`).join('')}</div>`;

    const modal = document.getElementById('modal-backdrop');
    modal.classList.remove('hidden');
    void modal.offsetWidth;
    modal.classList.remove('opacity-0');
    document.getElementById('modal-content').classList.remove('scale-95');
    document.body.style.overflow = 'hidden';
}

function closeModal(ev) { if (ev.target.id === 'modal-backdrop') forceCloseModal(); }

function forceCloseModal() {
    const modal = document.getElementById('modal-backdrop');
    modal.classList.add('opacity-0');
    document.getElementById('modal-content').classList.add('scale-95');
    setTimeout(() => { modal.classList.add('hidden'); document.body.style.overflow = 'auto'; }, 300);
}