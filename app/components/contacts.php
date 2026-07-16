<div id="contTitle" class="contMe raleway text-white text-[40px] font-black mb-4">Contact me</div>
<p class="text-[#9c9c9c] text-center ibm text-[16px] font-normal leading-relaxed tracking-wide max-w-2xl mb-12">
    If you wish to get in touch with me, ask questions, or discuss a project, don't hesitate to write! I am always open to new ideas, feedback, or simply a casual chat.
</p>

<form action="components/cont.php" method="POST" id="formContacts" class="inputSet w-full max-w-md flex flex-col gap-6 bg-[#111111] p-8 rounded-2xl shadow-2xl">
    <div class="inputItem w-full">
        <p class="ibm text-white font-semibold mb-2">Email</p>
        <input name="mail" class="w-full h-[44px] px-4 rounded bg-[#F8F8F8] border border-transparent focus:border-[#62BA1B] text-[#333] font-normal ibm text-[14px] outline-none transition-colors" type="email" placeholder="Enter your email" />
    </div>
    <div class="inputItem w-full">
        <p class="ibm text-white font-semibold mb-2">Phone</p>
        <input name="tel" class="w-full h-[44px] px-4 rounded bg-[#F8F8F8] border border-transparent focus:border-[#62BA1B] text-[#333] font-normal ibm text-[14px] outline-none transition-colors" type="tel" placeholder="Enter your number (optional)">
    </div>
    <div class="inputItem w-full">
        <p class="ibm text-white font-semibold mb-2">Message</p>
        <textarea name="message" class="w-full h-[140px] px-4 py-3 rounded bg-[#F8F8F8] border border-transparent focus:border-[#62BA1B] text-[#333] font-normal ibm text-[14px] outline-none resize-none transition-colors" placeholder="Write your message here"></textarea>
    </div>

    <input id="message" class="hover:scale-105 transition-transform duration-300 w-full h-[50px] mt-2 rounded border border-[#62BA1B] bg-[#3F8E00] shadow-[0_8px_30px_rgba(63,142,0,0.5)] text-white text-[16px] font-extrabold ibm cursor-pointer" type="submit" value="Send">
</form>