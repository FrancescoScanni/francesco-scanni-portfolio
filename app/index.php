<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/style.css">
    <title>Francesco Scanni - Portfolio</title>
</head>
<body class="scroll-smooth bg-white text-black antialiased">

<?php if (isset($_SESSION['success'])): ?>
        
        <?php if ($_SESSION['success'] === true): ?>
            <div class="fixed top-6 right-6 z-50 max-w-sm w-full bg-white rounded-2xl border border-slate-100 shadow-xl p-4 flex items-start gap-3 transition-all duration-300">
                <div class="flex-shrink-0 text-emerald-500 mt-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                
                <div class="flex-1">
                    <p class="text-sm font-extrabold text-[#1B1B1B] tracking-tight">Message sent!</p>
                    <p class="text-xs text-slate-400 mt-0.5 font-medium">I will get back to you as soon as possible.</p>
                </div>
                
                <button onclick="this.closest('.fixed').remove()" class="text-slate-400 hover:text-slate-600 transition-colors ml-2 mt-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        <?php else: ?>
            <div class="fixed top-6 right-6 z-50 max-w-sm w-full bg-white rounded-2xl border border-slate-100 shadow-xl p-4 flex items-start gap-3 transition-all duration-300">
                <div class="flex-shrink-0 text-rose-500 mt-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                </div>
                
                <div class="flex-1">
                    <p class="text-sm font-extrabold text-[#1B1B1B] tracking-tight">Submission failed</p>
                    <p class="text-xs text-slate-400 mt-0.5 font-medium">Please try again or email me directly.</p>
                </div>
                
                <button onclick="this.closest('.fixed').remove()" class="text-slate-400 hover:text-slate-600 transition-colors ml-2 mt-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        <?php endif; ?>

        <?php unset($_SESSION['success']); ?>

    <?php endif; ?>


    <div id="popup" class="fixed top-8 left-1/2 -translate-x-1/2 bg-gradient-to-r from-green-500 to-transparent text-white text-[18px] px-8 py-4 font-bold opacity-0 pointer-events-none transition-opacity duration-500 z-50 flex items-center gap-2 shadow-lg rounded-md">
        <img src="https://img.icons8.com/ios-filled/24/ffffff/checkmark--v1.png" alt="check" class="w-5 h-5" />
        <span>Successful</span>
    </div>
    <div class="hover:scale-[1.1] transition duration-[500ms] fixed bottom-6 right-6 lg:bottom-10 lg:right-10 w-[44px] h-[44px] bg-[#D9D9D9] rounded-full flex justify-center items-center z-50 homeSphere lg:w-[60px] lg:h-[60px] shadow-lg">
        <a href="#"><img class="w-[28px] h-[28px] active:scale-[1.2] transition-transform duration-300" src="static\media\images\Home.png" alt="home"></a>
    </div>

    <div data-include="components/header.html" class="header w-full h-[70px] bg-[#1B1B1B] flex justify-between items-center px-6 z-40 lg:fixed lg:top-0 lg:left-1/2 lg:-translate-x-1/2 lg:w-[86%] lg:max-w-7xl lg:rounded-b-[8px] lg:px-12">
        </div>

    <div data-include="components/intro.html" class="min-h-screen bg-[#080808] flex flex-col justify-center py-20 lg:py-0 lg:pt-[10vh]">
        </div>
    <div class="w-full bg-white hidden lg:block">
        <div data-include="/components/content.html" id="content" class="w-full flex flex-col items-center py-20 px-6">
            </div>
        
        <div data-include="/components/contacts.php" id="contacts" class="w-full flex flex-col  items-center py-20 px-6 bg-[#080808]">
            </div>

        <footer class="w-full bg-[#1B1B1B] border-t border-[#222222] py-6 lg:py-8 flex flex-col justify-center items-center gap-1 z-10">
            <p class="text-[#9C9C9C] text-center text-[13px] lg:text-[14px] font-normal tracking-wider ibm transition-colors duration-300 hover:text-white cursor-default">
                © Francesco Scanni
            </p>
            <p class="text-[#666666] text-center text-[10px] lg:text-[12px] font-normal tracking-wider ibm">
                Last update 08/2025
            </p>
        </footer>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="component_loader.js"></script>
    <script src="static/js/cards.js" defer></script>
    <script src="static/js/terminal.js" defer></script>
</body>
</html>