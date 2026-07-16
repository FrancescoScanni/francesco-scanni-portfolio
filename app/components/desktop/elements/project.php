<?php
    $footer='<footer class="w-full bg-[#1B1B1B] border-t border-[#222222] py-6 lg:py-8 flex flex-col justify-center items-center gap-1 z-10">
                <!--FOOTER-->
                <p class="text-[#9C9C9C] text-center text-[13px] lg:text-[14px] font-normal tracking-wider ibm transition-colors duration-300 hover:text-white cursor-default">
                    © Francesco Scanni
                </p>
                <p class="text-[#666666] text-center text-[10px] lg:text-[12px] font-normal tracking-wider ibm">
                    Last update 08/2025
                </p>
            </footer>';

    $header = '<div class="header w-full h-[70px] bg-[#1B1B1B] flex justify-between items-center px-6 z-40 lg:fixed lg:top-0 lg:left-1/2 lg:-translate-x-1/2 lg:w-[86%] lg:max-w-7xl lg:rounded-b-[8px] lg:px-12">
                            <div class="pfpCircle bg-[#080808] w-[45px] h-[45px] flex justify-center items-center rounded-full active:scale-[1.1] transition-transform duration-300 lg:hidden">
                        <a href="#"><img src="static/media/images/logo.png" class="pfp w-[24px] h-[24px]" alt="pfp"></a>
                    </div>
                    <div class="relative flex justify-end lg:hidden">
                     

                        <nav id="menu" class="gap-[20px] fixed w-full left-0 top-[70px] p-6 hidden flex-col h-[calc(100vh-70px)] bg-gradient-to-b from-[#080808] to-[#111111] z-40 shadow-2xl">
                            <div class="redirItem flex items-center justify-between">
                                <a href="#features"><p class="text-[#9C9C9C] raleway text-[24px] font-extrabold">Progetti</p></a>
                                <div class="social flex gap-[15px]">
                                    <a href="https://github.com/FrancescoScanni"><img src="https://ibb.co/dwDnPcjM" alt="GitHub"></a>
                                    <a href="https://instagram.com/francesco.scanni_"><img src="../elements/banners/header/Gmail.png" alt="Gmail"></a>
                                    <a href="https://www.linkedin.com/in/francesco-scanni-441605351/"><img src="../elements/banners/header/LinkedIn.png" alt="LinkedIn"></a>
                                </div>
                            </div>

                            <div class="redirItem flex items-center mt-2">
                                <a href="#features"><p class="text-[#9C9C9C] raleway text-[24px] font-extrabold">Articoli</p></a>
                            </div>

                            <div class="redirItem flex items-center mt-2">
                                <a href="#features"><p class="text-[#9C9C9C] raleway text-[24px] font-extrabold">Feedback</p></a>
                            </div>
                        </nav>
                    </div>

                    <div class="hidden lg:flex lg:gap-[50px] xl:gap-[70px] items-center">
                        <a href="../../../index.php" onclick="scrollWithOffset(event, \'mySection\')"><p class="text-[#9C9C9C] hover:text-white transition-colors ibm text-[14px] tracking-[0.14px]">Chi sono</p></a>
                        <a href="../pcto/pcto.html"><p class="text-[#9C9C9C] hover:text-white transition-colors ibm text-[14px] tracking-[0.14px]">Esperienze</p></a>
                        <a href="../../../index.php#contacts"><p class="text-[#9C9C9C] hover:text-white transition-colors ibm text-[14px] tracking-[0.14px]">Contatti</p></a>
                    </div>
                    <div class="hidden lg:flex lg:gap-[20px] items-center">
                        <a class="text-[#9C9C9C] hover:text-white transition-colors ibm text-[14px] tracking-[0.14px] mr-[60px]" href="../../../index.php">Home</a>
                    </div>
                </div>';

    $info='<section class="max-w-6xl mx-auto px-6 pt-18 pb-20 md:pt-48 md:pb-32">
                <div class="max-w-3xl">
                    <span class="text-orange-600 bg-orange-100 font-bold text-xs px-4 py-1.5 rounded-full uppercase tracking-widest mb-6 inline-block">
                        Progetti
                    </span>
                    <h1 class="text-5xl md:text-7xl font-extrabold mb-8 leading-tight tracking-tight text-[#1B1B1B]">
                        I miei progetti
                    </h1>
                    <p class="font-mono text-gray-600 text-lg md:text-xl leading-relaxed border-l-4 border-gray-300 pl-6">
                        Una raccolta dei lavori che ho realizzato, dalle idee iniziali fino al prodotto finale. Codice, creatività e problem solving.
                    </p>
                </div>
            </section>';

    $prefooter='<section class="flex justify-end max-w-6xl mx-auto px-6 pt-18 pb-20 md:pb-32">
                <div class="max-w-3xl">
                    <span class="text-blue-600 bg-blue-100 font-bold text-xs px-4 py-1.5 rounded-full uppercase tracking-widest mb-6 inline-block">
                        Altro
                    </span>
                    <h1 class="text-5xl md:text-7xl font-extrabold mb-8 leading-tight tracking-tight text-[#1B1B1B]">
                        Discover more
                    </h1>
                    <p class="font-mono text-gray-600 text-lg md:text-xl leading-relaxed border-l-4 border-gray-300 pl-6">
                        Scopri altri progetti e lavori che ho realizzato, clicca sul link di redirect verso il mio profilo GitHub per visualizzare il codice sorgente e le repository dei progetti.
                    </p>

                    <a href="https://github.com/francescoscanni" class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-700 hover:gap-3 transition-all duration-300 mt-[30px] ml-[40px]" target="_blank">
                            Vedi il profilo
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </section>';
?>