const commands = {
    help: () => `
        <p class="text-[#62BA1B] font-bold mt-1">Available commands:</p>
        <p><span class="text-[#FFA217]">help</span>       — show this menu</p>
        <p><span class="text-[#FFA217]">about</span>      — who I am</p>
        <p><span class="text-[#FFA217]">github</span>     — my skills/projects</p>
        <p><span class="text-[#FFA217]">pcto</span>       — view my professional experiences</p>
        <p><span class="text-[#FFA217]">clear</span>      — clear the terminal</p>
    `,
    about: () => `
        <p class="text-[#9C9C9C] mt-1">👤 <span class="text-white font-bold">Francesco Scanni</span></p>
        <p class="text-[#9C9C9C]">Student passionate about technology, AI, and web development.</p>
        <p class="text-[#9C9C9C]">I love turning ideas into code and learning something new every day.</p>
    `,
    // REDIRECT PCTO
    exp: () => {
        window.location.href = "components/pcto/pcto.html";
        return `<p class="text-[#62BA1B] mt-1">⟶ Redirecting to the page...</p>`;
    },

    // REDIRECT PROJECTS
    github: () => {
        window.open("https://github.com/francescoscanni", "_blank");
        return `<p class="text-[#62BA1B] mt-1">↓ Opening the projects section...</p>`;
    },

    // REDIRECT ARTICLES
    articles: () => {
        window.open("components/desktop/articoli.php", "_blank");
        return `<p class="text-[#62BA1B] mt-1">📰 Opening articles...</p>`;
    },

    clear: () => {
        const history = document.getElementById("term-history");
        if (history) history.innerHTML = "";
        return null;
    },
};

// 1. COMMAND SUBMISSION (Global Keydown Delegation)
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

        // Render the command line entered by the user
        const cmdLine = document.createElement("div");
        cmdLine.className = "flex items-start gap-2";
        cmdLine.innerHTML = `
            <span class="text-[#62BA1B] font-bold select-none whitespace-nowrap">guest@portfolio:~$</span>
            <span class="text-white">${cmd}</span>
        `;
        history.appendChild(cmdLine);

        // Process the command output
        const outputHTML = commands[cmd] 
            ? commands[cmd]() 
            : `<p class="text-red-400">Command not recognized: <span class="text-white">${cmd}</span>. Type <span class="text-[#FFA217]">help</span> for available commands.</p>`;

        if (outputHTML) {
            const out = document.createElement("div");
            out.className = "flex flex-col gap-0.5 ml-1 mb-1";
            out.innerHTML = outputHTML;
            history.appendChild(out);
        }

        // Force scroll to bottom
        body.scrollTop = body.scrollHeight;
    }
});

// 2. FOCUS MANAGEMENT ON CLICK (Global Click Delegation)
document.addEventListener("click", (e) => {
    if (e.target.closest("#term-body")) {
        const input = document.getElementById("term-input");
        if (input) input.focus();
    }
});

// 3. AUTO-FOCUS ON OPEN (DOM Mutation Observer)
const terminalObserver = new MutationObserver(() => {
    const input = document.getElementById("term-input");
    if (input && document.activeElement !== input) {
        input.focus();
    }
});
terminalObserver.observe(document.body, { childList: true, subtree: true });