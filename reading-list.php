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
      <span class="inline-block bg-yellow-300 text-black font-bold px-8 py-3 rounded-full text-lg shadow border-2 border-white" style="letter-spacing: 0.04em;">⏳ CERTIFICATION PENDING</span>
    </div>
  </div>
</div>
<div class="w-full max-w-7xl mx-auto px-2 md:px-8 pb-16 mt-0">
  <h2 class="text-5xl font-extrabold text-green-700 text-center mb-2 mt-2">Official Naija ReadFest Reading List</h2>
  <div class="text-xl text-gray-700 text-center mb-2">
    The Official 80 Nigerian Literary Masterpieces Successfully Read During the Naija ReadFest <span class="text-red-600 font-bold">Guinness World Record – Official Attempt</span>
  </div>
  <div class="flex justify-center mb-8">
    <span class="block w-24 h-1 bg-yellow-400 rounded-full"></span>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="reading-list-books">
    <?php
    $books = [
      ["Civil War Child", "Nestor Udoh"],
      ["The Rage Of Rajuno", "Dominic Kidzu"],
      ["Purple Hibiscus", "Chimamanda Ngozi Adichie"],
      ["Measuring Time", "Helon Habila"],
      ["Daughters Who Walk this Path", "Yejide Kilanko"],
      ["The Governor's Office", "Dominic Kidzu"],
      ["Diamonds in the flame", "Triumph En"],
      ["Becoming Nigeria", "Elnathan John"],
      ["Onyeka & The Rises of the Rebel", "Tola Okogwu"],
      ["Dishonourable Honorable", "Jobi mike Tobi"],
      ["Igho goes to Farm", "Anote Ajelooru"],
      ["The Kiss of Death", "Prince Adekola Abmibola"],
      ["Self Reborn", "M.O. Adeleye"],
      ["The Blind's Money", "Kayode Adeyemo"],
      ["Secret Lives of Baba Segi Wives", "Lola Shoneyin"],
      ["Haunted by Hope", "Triumph Adekunle"],
      ["A Bit of Difference", "Sefi Attita"],
      ["Boom Boom", "Jude Idada"],
      ["Ake : The Years of Childhood", "Wole Soyinka"],
      ["The Previous Hours of my Present Day", "Emmanuel T. Abraham"],
      ["In dependence", "Sarah Manyika"],
      ["The Thing Around your Neck", "Chimamanda Ngozi Adichie"],
      ["Calicasian Ovtcharka", "Kasham Keltuma"],
      ["Years of Shame", "Obinna Udenwe"],
      ["Bride of the Infidels", "Anote Ajeluorou"],
      ["Like a Bottle in the smoke", "Deji Dania"],
      ["The Bridge", "A.O. Hassan"],
      ["Halima Saves Her village", "Wale Okediran"],
      ["Jumoke Follow Follow", "Godwin Precious James, Olasupon Success, Nwangwa Isaac, Igbeneme Somto, Igbokoyi Ayomide"],
      ["Mirror of our Lives", "Abdulsalam El-Mubashir"],
      ["Dear Mother", "Nora Sanya"],
      ["See Morocco, see Spain", "N. C. Enenmor"],
      ["The Baron of Broad Street", "El Nukoya"],
      ["The Lagos Love Journal I – Lekki Bride", "Layemi O-I"],
      ["The Lagos Love Journals II – Ikoyi Princess", "Layemi O-I"],
      ["The Lagos Love Journal III – Meet the dutchess", "Layemi O-I"],
      ["Conspiracy Against the Wise", "Abdulmumin Mahmud"],
      ["Who Stole the Money", "Olusola Fadiya"],
      ["The White Mallam", "Usman Al-Hassan"],
      ["Bayo owns A Bicycle", "Niyi Josef"],
      ["The Antelope Wife", "Ayo Orioke"],
      ["Wish Masker", "U.P. Umezurike"],
      ["Ali the Obedient Boy", "Adeboyo Azeez"],
      ["Bode the Brave Boy", "Akachi adimora Ezeigbo"],
      ["The Last Duty", "Isidore Okpewho"],
      ["While She Slept", "Kumashe Yaakugh"],
      ["Coming Out of Grief", "Mkpoisonke Umoette"],
      ["Carnivirous City", "Toni Kan"],
      ["Nine Lives", "El Nukoya"],
      ["Who Drove Nearly All Lagos Men Mad ?", "Ugochukwu Ugonna"],
      ["Happiness like Water", "Chinelo Okparanta"],
      ["My Origin", "Mkpoisonke Okon Umoette"],
      ["The Fourth Canadidate", "Yemi Adebiyi"],
      ["No Nigerian will Make Heaven", "Peter Aghogho Omuvwie"],
      ["Prepare For Your Wedding", "Osaka Comforts .o"],
      ["Protection Tips For Children", "Hammed Abodunrin"],
      ["A visit to GrandMa and GrandPa", "Chigozie Anuli Mbadugha"],
      ["Beyond the Surface", "Chigozie Anuli Mbadugha"],
      ["Echoes Of Morenikeji", "Adeleke JP ( Egbin Orun), Temilade Adegunlehin Akran"],
      ["My Father Land ; The Land of Milk & Honey", "Mary-Joan Nwaogu"],
      ["Graced to Glory : A Memoir Of Success", "Gloria Olufunke Okoya"],
      ["Married But Single", "Ojemba Isu-Oko"],
      ["Beyond The Trial", "Chigozie Anuli Mbadugha"],
      ["Murder on Site - An Inspector Tunde Osbourne Investigation", "C. M . Okonkwo"],
      ["Fragment of Glass And Time", "Tewa Meda"],
      ["Minding My Manners", "Vivian Osemeka Abia"],
      ["Start Small Scale Big", "Abimbola Balogun"],
      ["Dear Diary", "Ijeoma Benita Nwaogu"],
      ["Soul Rants", "Halima Abdulazeez"],
      ["A Nation with Wounds", "Prisca Onyinye Nwokorie"],
      ["Stagnant Mirage", "Prisca Onyinye Nwokorie"],
      ["Alake the Sachet Water Seller", "Omolara Fadiya"],
      ["All about Mums", "Moseifeoluwa Omoniyi Nkechi"],
      ["Psychology in the Workplace", "Dr Tomi Oyesola"],
      ["Shadows From The Past", "Chigozie Anuli Mbadugha"],
      ["Entangled", "Kayode Adebiyi"],
      ["Erased Reproach", "Chigozie Anuli Mbadugha"],
      ["God is not Here", "Elsie O. Dennis"],
      ["Book launch", "Awele Ilusanami"],
      ["Making It Big", "Femi Otedola"]
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