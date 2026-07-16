<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['mail']) && isset($_POST['message'])) {
            $email = $_POST['mail'];
            $cellulare = $_POST['tel'] ?? '';
            $messaggio = $_POST['message'];
        }
        echo "Email: " . $email . "<br>";
        echo "Cellulare: " . $cellulare . "<br>";
        echo "Messaggio: " . $messaggio . "<br>";
        
    }
?>
<div class="contMe raleway text-white text-[40px] font-black mb-4">Contattami</div>
            <p class="text-[#9c9c9c] text-center ibm text-[16px] font-normal leading-relaxed tracking-wide max-w-2xl mb-12">Se desideri metterti in contatto con me, farmi delle domande o discutere di un progetto, non esitare a scrivermi! Sono sempre aperto a nuove idee, feedback o semplicemente a una chiacchierata informale.</p>
            
            <form action="components/cont.php" method="POST" id="formContacts" class="inputSet w-full max-w-md flex flex-col gap-6 bg-[#111111] p-8 rounded-2xl shadow-2xl">
                <div class="inputItem w-full">
                    <p class="ibm text-white font-semibold mb-2">Email</p>
                    <input name="mail" class="w-full h-[44px] px-4 rounded bg-[#F8F8F8] border border-transparent focus:border-[#62BA1B] text-[#333] font-normal ibm text-[14px] outline-none transition-colors" type="email" placeholder="Inserisci la tua email" required/>
                </div>
                <div class="inputItem w-full">
                    <p class="ibm text-white font-semibold mb-2">Cellulare</p>
                    <input name="tel" class="w-full h-[44px] px-4 rounded bg-[#F8F8F8] border border-transparent focus:border-[#62BA1B] text-[#333] font-normal ibm text-[14px] outline-none transition-colors" type="tel" placeholder="Inserisci il tuo numero (opzionale)">
                </div>
                <div class="inputItem w-full">
                    <p class="ibm text-white font-semibold mb-2">Messaggio</p>
                    <textarea name="message" class="w-full h-[140px] px-4 py-3 rounded bg-[#F8F8F8] border border-transparent focus:border-[#62BA1B] text-[#333] font-normal ibm text-[14px] outline-none resize-none transition-colors" placeholder="Scrivi qui il tuo messaggio" required></textarea>
                </div>

                <input id="message" class="hover:scale-105 transition-transform duration-300 w-full h-[50px] mt-2 rounded border border-[#62BA1B] bg-[#3F8E00] shadow-[0_8px_30px_rgba(63,142,0,0.5)] text-white text-[16px] font-extrabold ibm cursor-pointer" type="submit" value="Invia">
            </form>