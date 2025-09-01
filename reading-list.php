<?php // Reading List page for Naija ReadFest PHP version ?>
<div class="w-full mt-10 mb-16 shadow-xl overflow-hidden" style="min-height: 420px;">
  <div class="w-full h-full flex flex-col items-center justify-center py-16 px-4" style="background: linear-gradient(90deg, #29984A 0%, #232d23 50%, #C0392B 100%);">
    <div class="flex flex-row items-center justify-center space-x-6 mb-6">
      <img src="public/naijareadfest-logo.png" alt="ReadFest Logo" class="h-16 bg-white rounded shadow p-1" loading="lazy" width="64" height="64" />
      <img src="public/gwr.png" alt="Official Attempt" class="h-16 bg-white rounded shadow p-1" loading="lazy" width="64" height="64" />
    </div>
    <h1 class="text-5xl md:text-6xl font-extrabold text-white text-center mb-2 drop-shadow">Naija ReadFest Reading List</h1>
    <h2 class="text-xl md:text-2xl font-bold text-yellow-300 text-center mb-6 drop-shadow" style="text-shadow: 0 2px 8px rgba(0,0,0,0.10)">Guinness World Record – Official Attempt: Celebrating Nigerian Literature</h2>
    <div class="flex flex-wrap justify-center gap-4 mb-4">
      <span class="bg-gray-800/80 text-white px-6 py-2 rounded-full text-lg font-semibold flex items-center gap-2 border border-white/20">424-Hour Guinness World Record – Official Attempt COMPLETED</span>
    </div>
    <div class="flex justify-center">
      <span class="inline-block bg-yellow-300 text-black font-bold px-8 py-3 rounded-full text-lg shadow border-2 border-white" style="letter-spacing: 0.04em;">🎉 RECORD ACHIEVED! 🎉</span>
    </div>
  </div>
</div>
<div class="w-full max-w-7xl mx-auto px-2 md:px-8 pb-16 mt-0">
  <h2 class="text-5xl font-extrabold text-green-700 text-center mb-2 mt-2">Books Successfully Read</h2>
  <div class="text-xl text-gray-700 text-center mb-2">
    50+ Nigerian Masterpieces Successfully Read During the Naija ReadFest <span class="text-red-600 font-bold">Guinness World Record – Official Attempt</span>
  </div>
  <div class="flex justify-center mb-8">
    <span class="block w-24 h-1 bg-yellow-400 rounded-full"></span>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="reading-list-books">
    <?php
    $books = [
      ["Father's wish", "Oluremi Bolorunduro"],
      ["In Dependence", "Sarah Ladipo Manyika"],
      ["Purple Hibiscus", "Chimamanda Adiche"],
      ["The Return Of Ikenga", "Chukwuemeka Ohuka"],
      ["Hero Number One", "Emman Eboh"],
      ["A Man Of The People", "Chinua Achebe"],
      ["The Worshippers", "Victor Thorpe"],
      ["Last Days at Forcados High", "A.H. Muhammed"],
      ["A Spell Of Good Things", "Ayobami Adebayo"],
      ["Mother's Choice", "Agbo Areo"],
      ["Happiness Like Water", "Chinelo Okparanta"],
      ["The Girl with the Louding Voice", "Abi Dare"],
      ["Daughter who walks this path", "Yejide Kilanko"],
      ["The secret lives of Baba segi's wives", "Lola Shoneyin"],
      ["Ake The Years of Childhood", "Wole Soyinka"],
      ["Onyeka and the Rise of the Rebels", "Tolá Okogwu"],
      ["Time to Shine at the River School", "Sabine Adeyinka"],
      ["All For Oil", "J.P. Clark"],
      ["Lagoon", "Nnedi Okorafor"],
      ["Leaving the Tarmac", "Aigboje Aig-Imoukhuede"],
      ["Falmata and the Owners of God", "David Wanedam"],
      ["Civil War Child", "Nestor Udoh"],
      ["Warri No Dey Carry Last", "Idede Osayende"],
      ["Dear Mother", "Nora Santa"],
      ["The Last Duty", "Isidore Okpewho"],
      ["Successful Nigerian Entrepreneurs and How They Started", "YouWin Connect"],
      ["Measuring Time", "Helon Habila"],
      ["Destiny", "Okon Ibanga Udoh"],
      ["The Governor's Office", "Dominic Kidzu"],
      ["A Bit of Difference", "Sefi Atta"],
      ["Village Boy", "Anietie Usen"],
      ["An African Night Entertainment", "Cyprian Ekwensi"],
      ["New York, My Village", "Uwem Akpan"],
      ["The Palmwine Drinkard", "Amos Tutuola"],
      ["The Power of Vision", "Tony Elumelu"],
      ["The Famished Road", "Ben okri"],
      ["Becoming Nigerian: A Guide", "Elnathan John"],
      ["Previous Hours of My Present Days", "Emmanuel Abraham"],
      ["Fine Boys", "Eghosa Imasuen"],
      ["Akpan and The Smugglers", "Rosemary Uwemedimo"],
      ["See Morocco, See Spain", "Ndidi Chiazor-Enenmor"],
      ["The Third Side of A Coin", "Hyginus Ekwazi"],
      ["Wish Maker", "Uchechukwu Peter Umezurike"],
      ["Bode's Birthday Party", "Akanmi Festis Olaniyi"],
      ["The Concubine", "Elechi Amadi"],
      ["Wahala", "Nikki May"],
      ["Tales of A Troubadour", "Wale okediran"],
      ["Echoes of The Traditional Society", "Akpandem James"],
      ["A Trip To The Atlantic", "M. J. Akpabio"],
      ["An Adventure To Juju Island", "Gabriel Okara"],
      ["While She Slept", "Kumashe Yaakugh"],
      ["I Do Not Come To You By Chance", "Adaobi Tricia Nwaubani"],
      ["Haunted By Hope", "Triumph Adekunle"],
      ["The Tale of June 12: The Betrayal of the Democratic Rights of Nigerians (1993)", "Omo Omoruyi"],
      ["The Adventures of Dozie and friends", "Susan Nnenna Adebanjo"],
      ["Boom Boom", "Jude Idada"],
      ["Emeka's Money", "Onyinye Ough"],
      ["Wifi Kids and Analog Parents", "Temi Olajide"],
      ["The Peoples of Nigeria", "Olúwalãnù Agusto"],
      ["Big Small People", "Jesudubami Jemima Aganaba"],
      ["From Oloibiri to Bonny", "Godswill S. Ihetu"],
      ["My Command: An Account of the Nigerian Civil War 1967-1970", "Olusegun Obasanjo"],
      ["The Man, The Soldier, The Patriot, Biography of Lt. General Ibrahim Attahiru", "Niran Adedokun"],
      ["Arrest the Music: Fela & His Rebel Art & Politics", "Tejumola Olaniyan"],
      ["Honour For Sale", "Major Debo Basorun Ret"],
      ["No Nigerian Will Make Heaven? Tales From An Aspiring Failed Nation-State.", "Peter Aghogho Omuvwie"],
      ["From Frying Pan to Fire", "Olusegun Adeniyi"],
      ["Lagos Sugar Baby", "Ebere Joy Ekekwe"],
      ["Obalende: A Nation in Motion", "Wale Adeduro"],
      ["Hafsatu Bebi", "Fatima Bala"],
      ["The Retrial of Ken Saro-wiwa", "Uwem Udoko"],
      ["Years of Shame", "Obinna Udenwe"],
      ["Nine Lives", "El-Nukoya"]
    ];
    foreach ($books as $idx => $book) {
      $extra = $idx >= 20 ? ' style="display:none"' : '';
      $bookId = 'book-' . ($idx + 1);
             echo '<div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-green-500 flex flex-col justify-between min-h-[140px] transition duration-300 hover:scale-105 hover:shadow-2xl hover:-translate-y-1 reading-list-extra"'.$extra.'>';
      echo '<div class="flex items-center mb-2">';
      echo '<span class="text-2xl font-bold text-green-700 mr-2">' . ($idx + 1) . '.</span>';
      echo '<span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">Book</span>';
      echo '</div>';
             echo '<div class="text-lg font-semibold text-gray-900 mb-1">';
       echo '<span>' . htmlspecialchars($book[0]) . '</span>';
       echo '<span class="italic text-green-700 ml-2">by ' . htmlspecialchars($book[1]) . '</span>';
       echo '</div>';
      echo '</div>';
    }
    ?>
  </div>
  <div class="flex justify-center mt-8">
    <button id="showMoreBtn" class="px-6 py-2 rounded-full bg-yellow-400 text-gray-900 font-bold shadow hover:bg-yellow-500 transition" onclick="toggleBooks()">Show More</button>
  </div>
</div>
<div class="flex justify-center w-full mt-12 mb-8">
  <div class="bg-white border-2 border-red-200 rounded-2xl shadow p-8 max-w-xl w-full text-center">
    <h3 class="text-2xl md:text-3xl font-bold mb-3">Celebrating Our Achievement</h3>
    <div class="text-gray-700 text-lg mb-6">
      We successfully completed our Guinness World Record attempt by reading these incredible Nigerian stories. This achievement celebrates the richness and diversity of Nigerian literature and our commitment to promoting reading culture.
    </div>
    <div class="bg-green-100 text-green-700 px-6 py-3 rounded-full text-lg font-semibold">
      🎉 Mission Accomplished! 🎉
    </div>
  </div>
</div>

<script>
function toggleBooks() {
  var extras = document.querySelectorAll('.reading-list-extra');
  var btn = document.getElementById('showMoreBtn');
  var showing = btn.getAttribute('data-showing') === 'true';
  extras.forEach(function(el, idx) { if(idx >= 20) el.style.display = showing ? 'none' : 'block'; });
  btn.textContent = showing ? 'Show More' : 'Show Less';
  btn.setAttribute('data-showing', showing ? 'false' : 'true');
}
</script> 