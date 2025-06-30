import React, { useState } from "react";
import NavBar from "./components/NavBar";

const PAGES = {
  home: () => (
    <div className="p-8 page-content">
      <h2 className="text-2xl font-bold mb-4">Naija ReadFest</h2>
      <p className="mb-4">
        <span className="font-bold text-green-700">Official Guinness World Record Attempt:</span> Longest Marathon Reading Aloud by a Team.<br/>
        <span className="font-bold">July 22 – August 8, 2025</span> | <span className="font-bold">Lagos, Nigeria</span>
      </p>
      <p className="mb-4">
        Naija ReadFest is not just an event—it's an <span className="font-bold text-red-700">Official Guinness World Record Attempt</span> for the <span className="font-bold text-red-700">"Longest Marathon Reading Aloud by a Team"</span>. Our mission is to ignite, revitalize, and advance Nigeria's reading culture, showcase our unity and diversity, and celebrate the literary talents of Nigerian authors—all under the global spotlight of a world record challenge.
      </p>
      <p className="mb-4">
        More than a record—it's a movement to ignite Nigeria's reading culture, celebrate our stories, and unite the nation through the power of books.
      </p>
      <button className="px-8 py-4 text-lg font-bold bg-transparent border-2 border-green-700 text-green-700 rounded-full shadow-lg transition duration-300 transform hover:scale-105 hover:bg-green-700 hover:text-white flex items-center justify-center gap-2 mt-6">
        VIEW SCHEDULE
      </button>
    </div>
  ),
  about: () => (
    <div className="p-8 page-content">
      <h2 className="text-2xl font-bold mb-4">About Naija ReadFest</h2>
      <p className="mb-4">
        Naija ReadFest is an <span className="font-bold text-red-700">Official Guinness World Record Attempt</span> for the <span className="font-bold text-red-700">"Longest Marathon Reading Aloud by a Team"</span>. Our mission is to ignite, revitalize, and advance Nigeria's reading culture, showcase our unity and diversity, and celebrate the literary talents of Nigerian authors—all under the global spotlight of a world record challenge.
      </p>
      <ul className="list-disc pl-6 mb-4">
        <li>Ignite a love for reading across Nigeria</li>
        <li>Showcase unity and diversity</li>
        <li>Celebrate Nigerian authors</li>
        <li>Attempt a world record as a nation</li>
      </ul>
      <p>
        This festival is more than a record—it's a movement to ignite Nigeria's reading culture, celebrate our stories, and unite the nation through the power of books.
      </p>
    </div>
  ),
  objectives: () => (
    <div className="p-8 page-content">
      <h2 className="text-2xl font-bold mb-4">Our Core Objectives</h2>
      <ul className="grid grid-cols-1 md:grid-cols-2 gap-6">
        <li className="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center text-center">
          <span className="font-bold text-green-700 mb-2">Promote Reading Culture</span>
          <p>Inspire a love for reading across Nigeria by showcasing the passion and endurance of our marathoners in this Guinness World Record – Official Attempt.</p>
        </li>
        <li className="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center text-center">
          <span className="font-bold text-red-700 mb-2">Celebrate Unity in Diversity</span>
          <p>Bring together readers from all major tribes, highlighting Nigeria's strength in diversity and shared goals through a world record challenge.</p>
        </li>
        <li className="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center text-center">
          <span className="font-bold text-yellow-600 mb-2">Support Nigerian Authors</span>
          <p>Showcase 50+ exceptional Nigerian authors, promoting appreciation for our homegrown literary gems on a global GWR stage.</p>
        </li>
        <li className="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center text-center">
          <span className="font-bold text-green-700 mb-2">Connect Partners & Sponsors</span>
          <p>Connect sponsors, partners, and associates with enthusiastic youths and target audiences at a Guinness World Record – Official Attempt.</p>
        </li>
      </ul>
    </div>
  ),
  team: () => (
    <div className="p-8 page-content">
      <h2 className="text-2xl font-bold mb-4">Meet the Visionaries Behind Naija ReadFest</h2>
      <p className="mb-4">Guinness World Record – Official Attempt: The team making history.</p>
      <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <div className="bg-green-100 p-4 rounded-xl shadow-md flex flex-col items-center">
          <img src="/team/kingsley-sintim.png" alt="Kingsley Sintim" className="w-24 h-24 rounded-full mb-2 object-cover border-4 border-gray-100" />
          <span className="font-bold">Kingsley Sintim</span>
          <span className="text-sm text-green-700">Team Lead</span>
        </div>
        <div className="bg-red-100 p-4 rounded-xl shadow-md flex flex-col items-center">
          <img src="/team/john-obot.png" alt="John Obot" className="w-24 h-24 rounded-full mb-2 object-cover border-4 border-gray-100" />
          <span className="font-bold">John Obot</span>
          <span className="text-sm text-red-700">GWR Marathoner</span>
        </div>
        <div className="bg-yellow-100 p-4 rounded-xl shadow-md flex flex-col items-center">
          <img src="/team/hope-garba.png" alt="Hope Garba" className="w-24 h-24 rounded-full mb-2 object-cover border-4 border-gray-100" />
          <span className="font-bold">Hope Garba</span>
          <span className="text-sm text-yellow-600">Coordinator</span>
        </div>
        <div className="bg-green-100 p-4 rounded-xl shadow-md flex flex-col items-center">
          <img src="/team/johnson-ogundele.png" alt="Johnson Ogundele" className="w-24 h-24 rounded-full mb-2 object-cover border-4 border-gray-100" />
          <span className="font-bold">Johnson Ogundele</span>
          <span className="text-sm text-green-700">Media Lead</span>
        </div>
      </div>
      <p className="mt-6">These are just a few of the dedicated individuals who will represent Nigeria's five geopolitical regions in our historic <span className="font-bold text-red-700">424-hour Guinness World Record – Official Attempt</span>.</p>
    </div>
  ),
  partners: () => (
    <div className="p-8 page-content">
      <h2 className="text-2xl font-bold mb-4">Our Partners & Sponsors</h2>
      <p className="mb-4">Connect sponsors, partners, and associates with enthusiastic youths and target audiences at a Guinness World Record – Official Attempt.</p>
      <ul className="list-disc pl-6">
        <li>Guinness World Records</li>
        <li>Nigeria Reads Initiative</li>
        <li>Freedom Park, Lagos</li>
        <li>And more...</li>
      </ul>
    </div>
  ),
  gallery: () => (
    <div className="p-8 page-content">
      <h2 className="text-2xl font-bold mb-4">Gallery</h2>
      <p>Photos and highlights from Naija ReadFest will appear here.</p>
    </div>
  ),
  volunteer: () => (
    <div className="p-8 page-content">
      <h2 className="text-2xl font-bold mb-4">Join the GWR Movement</h2>
      <p className="mb-4">Be part of history! Volunteer to support the Longest Marathon Reading Aloud by a Team, amplifying the <span className="font-bold text-green-700">"WE CAN DO"</span> creativity spirit of Nigerians.</p>
      <button className="px-10 py-4 text-xl font-bold rounded-full shadow-lg transition-transform hover:scale-105 bg-red-700 text-white border-2 border-red-700">Join the GWR Movement</button>
    </div>
  ),
  schedule: () => (
    <div className="p-8 page-content">
      <h2 className="text-2xl font-bold mb-4">Marathon Schedule</h2>
      <p className="mb-4">July 22 – August 8, 2025<br/>Freedom Park, Lagos</p>
      <p>Stay tuned for the full event schedule and reading lineup!</p>
    </div>
  ),
  "reading-list": () => (
    <div className="p-8 page-content">
      <h2 className="text-2xl font-bold mb-4">The Reading List</h2>
      <p className="mb-4">Explore 50+ Nigerian literary masterpieces featured in the marathon.</p>
      <ul className="list-disc pl-6">
        <li>Things Fall Apart – Chinua Achebe</li>
        <li>Half of a Yellow Sun – Chimamanda Ngozi Adichie</li>
        <li>The Famished Road – Ben Okri</li>
        <li>And many more...</li>
      </ul>
    </div>
  ),
  contact: () => (
    <div className="p-8 page-content">
      <h2 className="text-2xl font-bold mb-4">Contact Us</h2>
      <p className="mb-4">For inquiries, partnership, or volunteering:</p>
      <ul className="mb-4">
        <li>Email: <a href="mailto:info@nigeriareads.ng" className="text-green-700 underline">info@nigeriareads.ng</a></li>
        <li>Phone: <a href="tel:+2348067813462" className="text-green-700 underline">+234 806 781 3462</a></li>
      </ul>
      <div className="flex gap-4">
        <a href="https://twitter.com/NigeriaReadsNGO" target="_blank" rel="noopener noreferrer" className="hover:text-green-400"><i className="fab fa-x-twitter"></i></a>
        <a href="https://instagram.com/nigeria_reads" target="_blank" rel="noopener noreferrer" className="hover:text-green-400"><i className="fab fa-instagram"></i></a>
        <a href="https://tiktok.com/@nigeria.reads" target="_blank" rel="noopener noreferrer" className="hover:text-green-400"><i className="fab fa-tiktok"></i></a>
        <a href="https://www.linkedin.com/company/nigeria-reads/" target="_blank" rel="noopener noreferrer" className="hover:text-green-400"><i className="fab fa-linkedin-in"></i></a>
      </div>
    </div>
  ),
  "live-stream": () => (
    <div className="p-8 page-content">
      <h2 className="text-2xl font-bold mb-4">Live Stream</h2>
      <p>Watch the marathon reading event live here during the festival dates!</p>
    </div>
  ),
};

export default function App() {
  const [currentPage, setCurrentPage] = useState("home");
  const PageComponent = PAGES[currentPage] || (() => <div className="p-8">Page Not Found</div>);

  return (
    <div className="min-h-screen bg-gray-50">
      <NavBar currentPage={currentPage} setCurrentPage={setCurrentPage} />
      <main>
        <PageComponent />
      </main>
    </div>
  );
}
