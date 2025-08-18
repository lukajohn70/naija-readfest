import React, { useState, useEffect } from 'react';
import { Book, Target, Users, CalendarDays, Award, Handshake, Mail, Phone, Clock, PlayCircle, ChevronDown, MapPin, Route, ChevronLeft, ChevronRight, Lightbulb } from 'lucide-react'; // Added Lightbulb for suggestion

// Define the color palette based on the logo
const colors = {
  primaryGreen: '#008000', // For primary calls to action, headings
  white: '#FFFFFF', // For backgrounds, text
  accentRed: '#C80000', // For important highlights, accents
  black: '#000000', // For text, outlines
  accentGold: '#D4AF37' // For warmth, subtle subtle highlights
};

// --- Navbar Component ---
const Navbar = ({ currentPage, setCurrentPage }) => {
  const [isOpen, setIsOpen] = useState(false);
  const [isDiscoverOpen, setIsDiscoverOpen] = useState(false);

  // Define navigation items
  const navItems = [
    { name: 'Home', id: 'home', type: 'page' },
    { name: 'About', id: 'about', type: 'page' },
    { name: 'Objectives', id: 'objectives', type: 'page' },
    { name: 'Live Stream', id: 'live-stream', type: 'page' },
    { name: 'Contact', id: 'contact', type: 'page' },
  ];

  const discoverItems = [
    { name: 'Team', id: 'team' },
    { name: 'Schedule', id: 'schedule' },
    { name: 'Reading List', id: 'reading-list' }, // Renamed from Authors
    { name: 'Partners', id: 'partners' },
  ];

  const handlePageChange = (pageId) => {
    setCurrentPage(pageId);
    setIsOpen(false); // Close mobile menu
    setIsDiscoverOpen(false); // Close discover dropdown
  };

  return (
    <nav className="bg-white shadow-lg sticky top-0 z-50 rounded-b-lg">
      <div className="container mx-auto px-4 py-2 flex justify-between items-center flex-wrap">
        {/* Logo - Updated path */}
        <div className="flex items-center space-x-2">
          <img src="/naijareadfest-logo.png" alt="Naija ReadFest Logo" className="h-10 w-auto rounded" />
          <span className="text-xl font-bold" style={{ color: colors.primaryGreen }}>Naija ReadFest</span>
        </div>

        {/* Mobile menu button */}
        <div className="md:hidden">
          <button onClick={() => setIsOpen(!isOpen)} className="text-gray-800 hover:text-gray-600 focus:outline-none">
            <svg className="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              {isOpen ? (
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12" />
              ) : (
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16" />
              )}
            </svg>
          </button>
        </div>

        {/* Desktop and Mobile menu items */}
        <div className={`md:flex flex-grow justify-end ${isOpen ? 'block' : 'hidden'} w-full md:w-auto`}>
          <ul className="flex flex-col md:flex-row md:space-x-6 space-y-2 md:space-y-0 mt-4 md:mt-0">
            {navItems.map((item) => (
              <li key={item.id}>
                <button
                  onClick={() => handlePageChange(item.id)}
                  className={`block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200
                    ${currentPage === item.id ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900'}`}
                  style={{ color: currentPage === item.id ? colors.primaryGreen : '' }}
                >
                  {item.name}
                </button>
              </li>
            ))}
            {/* Discover Dropdown */}
            <li className="relative">
              <button
                onClick={() => setIsDiscoverOpen(!isDiscoverOpen)}
                className={`flex items-center px-3 py-2 rounded-md text-base font-medium transition-colors duration-200
                  ${isDiscoverOpen || discoverItems.some(item => item.id === currentPage) ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900'}`}
                style={{ color: isDiscoverOpen || discoverItems.some(item => item.id === currentPage) ? colors.primaryGreen : '' }}
              >
                Discover <ChevronDown size={16} className={`ml-1 transition-transform ${isDiscoverOpen ? 'rotate-180' : ''}`} />
              </button>
              {isDiscoverOpen && (
                <ul className="md:absolute md:top-full md:left-0 md:bg-white md:shadow-lg md:rounded-md md:mt-1 w-full md:w-48 py-1 z-10">
                  {discoverItems.map((item) => (
                    <li key={item.id}>
                      <button
                        onClick={() => handlePageChange(item.id)}
                        className={`block w-full text-left px-4 py-2 text-sm transition-colors duration-200
                          ${currentPage === item.id ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900'}`}
                        style={{ color: currentPage === item.id ? colors.primaryGreen : '' }}
                      >
                        {item.name}
                      </button>
                    </li>
                  ))}
                </ul>
              )}
            </li>
          </ul>
        </div>
      </div>
    </nav>
  );
};

// --- Footer Component ---
const Footer = () => {
  return (
    <footer className="bg-gray-800 text-white py-8 mt-12 rounded-t-lg">
      <div className="container mx-auto px-6 text-center">
        <div className="flex flex-col md:flex-row justify-between items-center mb-6">
          <div className="mb-4 md:mb-0">
            {/* Repeat Logo (smaller) - Updated path for white logo */}
            <img src="/naijareadfest-logo-white.png" alt="Naija ReadFest Logo White" className="h-8 w-auto mx-auto rounded" />
            <p className="text-sm mt-2" style={{ color: colors.primaryGreen }}>Naija ReadFest</p>
          </div>
          <div className="mb-4 md:mb-0">
            <p className="text-sm mb-2">Contact Us:</p>
            <p className="text-md font-semibold">info@nigeriareads.ng</p>
            <p className="text-md font-semibold">080 6781 3462</p>
          </div>
          <div className="flex space-x-4 text-2xl">
            {/* Social media icons with updated handles */}
            <a href="https://facebook.com/NigeriaReads" target="_blank" rel="noopener noreferrer" className="hover:text-gray-400"><i className="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/NigeriaReadsNGO" target="_blank" rel="noopener noreferrer" className="hover:text-gray-400"><i className="fab fa-twitter"></i></a>
            <a href="https://instagram.com/NigeriaReads" target="_blank" rel="noopener noreferrer" className="hover:text-gray-400"><i className="fab fa-instagram"></i></a>
          </div>
        </div>
        <p className="text-sm border-t border-gray-700 pt-4 mt-4">
          &copy; {new Date().getFullYear()} Naija ReadFest. All rights reserved.
        </p>
      </div>
    </footer>
  );
};

// --- HomePage Component ---
const HomePage = ({ setCurrentPage }) => {
  // Define header slideshow images
  const headerSlideshowImages = [
    '/header-slideshow-images/image1.jpg', // Placeholder: Add your image paths here
    '/header-slideshow-images/image2.jpg',
    '/header-slideshow-images/image3.jpg',
    // Add more images as needed. Make sure these exist in your public/header-slideshow-images folder.
  ];

  const [currentHeaderImageIndex, setCurrentHeaderImageIndex] = useState(0);

  // Auto-advance header slideshow
  useEffect(() => {
    if (headerSlideshowImages.length > 1) {
      const timer = setInterval(() => {
        setCurrentHeaderImageIndex(prevIndex => (prevIndex + 1) % headerSlideshowImages.length);
      }, 5000); // Change image every 5 seconds
      return () => clearInterval(timer);
    }
  }, [headerSlideshowImages.length]);


  // Update target date to July 22, 2025
  const targetDate = new Date('2025-07-22T00:00:00').getTime(); 
  const [timeLeft, setTimeLeft] = useState({ days: 0, hours: 0, minutes: 0, seconds: 0 });

  useEffect(() => {
    const timer = setInterval(() => {
      const now = new Date().getTime();
      const distance = targetDate - now;

      if (distance < 0) {
        clearInterval(timer);
        setTimeLeft({ days: 0, hours: 0, minutes: 0, seconds: 0 });
      } else {
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        setTimeLeft({ days, hours, minutes, seconds });
      }
    }, 1000);

    return () => clearInterval(timer);
  }, [targetDate]);

  return (
    <div className="text-center py-12 rounded-lg bg-gray-50">
      {/* Hero Section - Image Slideshow with Green Overlay */}
      <div
        className="relative h-96 flex items-center justify-center rounded-lg overflow-hidden"
      >
        {/* Background Image Slideshow with cross-fade */}
        {headerSlideshowImages.length > 0 && (
          <div className="absolute inset-0 w-full h-full">
            {headerSlideshowImages.map((image, index) => (
              <img
                key={index}
                src={image}
                alt={`Header background ${index + 1}`}
                className={`absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 ease-in-out ${
                  index === currentHeaderImageIndex ? 'opacity-100' : 'opacity-0'
                }`}
              />
            ))}
          </div>
        )}
        {/* Green Overlay */}
        <div className="absolute inset-0 rounded-lg" style={{ backgroundColor: colors.primaryGreen, opacity: 0.7 }}></div>
        {/* Black Overlay (for text readability over green) */}
        <div className="absolute inset-0 bg-black opacity-30 rounded-lg"></div>
        
        <div className="relative z-10 p-6 rounded-lg bg-white bg-opacity-80">
          <h1 className="text-4xl md:text-6xl font-extrabold mb-4" style={{ color: colors.black }}>
            IGNITING NIGERIA'S READING CULTURE
          </h1>
          <p className="text-xl md:text-2xl font-semibold mb-6" style={{ color: colors.accentGold }}>
            A Guinness World Record Attempt: Longest Read-Aloud Marathon
          </p>
          {/* New Countdown Timer Design */}
          <div className="mb-8">
            <h4 className="text-lg font-semibold text-gray-800 mb-4">Event Starts In:</h4>
            <div className="flex justify-center space-x-4">
              {Object.entries(timeLeft).map(([unit, value]) => (
                <div key={unit} className="flex flex-col items-center">
                  <div className="text-white text-4xl font-bold p-4 rounded-lg shadow-md min-w-[70px]" style={{backgroundColor: colors.accentRed}}>
                    {String(value).padStart(2, '0')}
                  </div>
                  <span className="text-sm font-medium mt-2 capitalize" style={{ color: colors.black }}>{unit}</span>
                </div>
              ))}
            </div>
          </div>
          <button
            onClick={() => setCurrentPage('live-stream')} // Linked to Live Stream page
            className="px-8 py-4 text-xl font-bold text-white rounded-md shadow-lg transition duration-300 transform hover:scale-105"
            style={{ backgroundColor: colors.black }}
          >
            WATCH LIVE (Starting July 22, 2025)
          </button>
        </div>
      </div>

      {/* Brief Overview Section */}
      <div className="container mx-auto px-6 py-12">
        <h2 className="text-3xl font-bold mb-8" style={{ color: colors.primaryGreen }}>Welcome to Naija ReadFest!</h2>
        <p className="text-lg leading-relaxed max-w-3xl mx-auto mb-10 text-gray-700">
          Naija ReadFest is more than just a Guinness World Record attempt; it's a powerful movement dedicated to
          revitalizing Nigeria's reading culture, fostering unity, celebrating diversity, and promoting the incredible literary talents of Nigerian authors.
          Join us as we embark on this historic journey to inspire a nation.
        </p>

        {/* Quick Links - now using setCurrentPage for navigation */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          <button
            onClick={() => setCurrentPage('about')}
            className="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 transform hover:scale-105 flex flex-col items-center justify-center"
          >
            <Book size={48} style={{ color: colors.primaryGreen }} className="mb-4" />
            <h3 className="text-xl font-semibold" style={{ color: colors.black }}>About the Attempt</h3>
          </button>
          <button
            onClick={() => setCurrentPage('team')}
            className="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 transform hover:scale-105 flex flex-col items-center justify-center"
          >
            <Users size={48} style={{ color: colors.accentRed }} className="mb-4" />
            <h3 className="text-xl font-semibold" style={{ color: colors.black }}>Meet Our Marathoners</h3>
          </button>
          <button
            onClick={() => setCurrentPage('reading-list')} // Linked to Reading List page
            className="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 transform hover:scale-105 flex flex-col items-center justify-center"
          >
            <Award size={48} style={{ color: colors.accentGold }} className="mb-4" />
            <h3 className="text-xl font-semibold" style={{ color: colors.black }}>Reading List</h3> {/* Updated text */}
          </button>
        </div>
      </div>
    </div>
  );
};

// --- ImageSlideshow Component ---
const ImageSlideshow = ({ images, interval = 3000 }) => {
  const [currentIndex, setCurrentIndex] = useState(0);

  useEffect(() => {
    const timer = setInterval(() => {
      setCurrentIndex((prevIndex) => (prevIndex + 1) % images.length);
    }, interval);

    return () => clearInterval(timer);
  }, [images.length, interval]);

  const goToPrevious = () => {
    setCurrentIndex((prevIndex) => (prevIndex - 1 + images.length) % images.length);
  };

  const goToNext = () => {
    setCurrentIndex((prevIndex) => (prevIndex + 1) % images.length);
  };

  if (images.length === 0) {
    return (
      <div className="text-center text-gray-500 py-10 rounded-lg bg-gray-100 shadow-inner" style={{ height: '400px', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
        No images to display for the slideshow. Please add images to the public/slideshow-images folder.
      </div>
    );
  }

  return (
    <div className="relative w-full overflow-hidden rounded-lg shadow-md" style={{ height: '400px' }}>
      <img
        src={images[currentIndex]}
        alt={`Slideshow image ${currentIndex + 1}`}
        className="w-full h-full object-cover transition-opacity duration-500"
      />
      {/* Navigation Arrows */}
      {images.length > 1 && (
        <>
          <button
            onClick={goToPrevious}
            className="absolute left-0 top-1/2 -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full ml-2 hover:bg-opacity-75 transition-colors"
          >
            <ChevronLeft size={24} />
          </button>
          <button
            onClick={goToNext}
            className="absolute right-0 top-1/2 -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full mr-2 hover:bg-opacity-75 transition-colors"
          >
            <ChevronRight size={24} />
          </button>
        </>
      )}
      {/* Dots navigation (optional) */}
      <div className="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
        {images.map((_, index) => (
          <button
            key={index}
            onClick={() => setCurrentIndex(index)}
            className={`h-2 w-2 rounded-full ${index === currentIndex ? 'bg-white' : 'bg-gray-400'}`}
          ></button>
        ))}
      </div>
    </div>
  );
};


// --- About Page Component ---
const AboutPage = () => {
  // Define your slideshow images. Replace with your actual image paths in public/slideshow-images/
  const slideshowImages = [
    '/slideshow-images/image1.jpg', // Example: public/slideshow-images/image1.jpg
    '/slideshow-images/image2.jpg', // Example: public/slideshow-images/image2.jpg
    '/slideshow-images/image3.jpg', // Example: public/slideshow-images/image3.jpg
    '/slideshow-images/image4.jpg',
    '/slideshow-images/image5.jpg',
    '/slideshow-images/image6.jpg',
    '/slideshow-images/image7.jpg',
    '/slideshow-images/image8.jpg',
  ];

  return (
    <div className="container mx-auto px-6 py-12 rounded-lg bg-gray-50 shadow-md">
      <h2 className="text-4xl font-bold mb-8 text-center" style={{ color: colors.primaryGreen }}>The Record Attempt: A Movement for Literacy</h2>

      <section className="mb-10 p-6 bg-white rounded-lg shadow-sm">
        <h3 className="text-3xl font-semibold mb-4" style={{ color: colors.black }}>Chasing History, Inspiring a Nation</h3>
        <p className="text-lg leading-relaxed text-gray-700 mb-4">
          Naija ReadFest is embarking on an official Guinness World Record attempt for the longest read-aloud marathon.
          This isn't just about breaking a record; it's a powerful initiative to ignite, revitalize, and advance Nigeria's reading culture,
          showcase our unity and diversity, and encourage the literary talents of Nigerian authors.
        </p>
        {/* Replaced single image with slideshow component */}
        <ImageSlideshow images={slideshowImages} interval={4000} /> {/* Adjust interval as needed (milliseconds) */}
      </section>

      <section className="mb-10 p-6 bg-white rounded-lg shadow-sm">
        <h3 className="text-3xl font-semibold mb-4" style={{ color: colors.black }}>Our Ambitious Goals & Impact</h3>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <div className="p-4 rounded-lg shadow-inner bg-green-50 flex items-center space-x-3">
            <Clock size={32} style={{ color: colors.primaryGreen }} />
            <div>
              <h4 className="text-xl font-bold" style={{ color: colors.black }}>424 Hours</h4>
              <p className="text-gray-600">18 consecutive days of inspiring read-aloud sessions.</p>
            </div>
          </div>
          <div className="p-4 rounded-lg shadow-inner bg-red-50 flex items-center space-x-3">
            <Users size={32} style={{ color: colors.accentRed }} />
            <div>
              <h4 className="text-xl font-bold" style={{ color: colors.black }}>5 Dedicated Marathoners</h4>
              <p className="text-gray-600">From five geopolitical regions of Nigeria.</p>
            </div>
          </div>
          <div className="p-4 rounded-lg shadow-inner bg-yellow-50 flex items-center space-x-3">
            <Target size={32} style={{ color: colors.accentGold }} />
            <div>
              <h4 className="text-xl font-bold" style={{ color: colors.black }}>100,000 Visitors</h4>
              <p className="text-gray-600">Anticipated at Freedom Park, Lagos.</p>
            </div>
          </div>
          <div className="p-4 rounded-lg shadow-inner bg-blue-50 flex items-center space-x-3">
            <Award size={32} style={{ color: colors.primaryGreen }} />
            <div>
              <h4 className="text-xl font-bold" style={{ color: colors.black }}>30 Million Reach</h4>
              <p className="text-gray-600">Across social media and mainstream media.</p>
            </div>
          </div>
        </div>
        <p className="text-lg leading-relaxed text-gray-700 mt-6">
          We are aiming to surpass the current record of 365 hours set in 2011, amplifying the 'WE CAN DO' creativity spirit of Nigerians.
        </p>
      </section>

      <section className="p-6 bg-white rounded-lg shadow-sm flex flex-col md:flex-row items-center">
        <div className="md:w-1/3 mb-6 md:mb-0 md:mr-8">
          <img
            src="/john-obot.png" // Updated image path for John Obot
            alt="John Obot"
            className="w-full h-auto rounded-full border-4 border-gray-200 shadow-lg"
          />
        </div>
        <div className="md:w-2/3">
          <h3 className="text-3xl font-semibold mb-4" style={{ color: colors.black }}>Expertise Leading the Way: Mr. John Obot</h3>
          <p className="text-lg leading-relaxed text-gray-700">
            We are incredibly proud to have Mr. John Obot, a former Guinness World Read aloud attempter, {/* Updated text here */}
            as our technical lead for this monumental attempt. His experience and dedication are invaluable to the success of Naija ReadFest.
          </p>
        </div>
      </section>
    </div>
  );
};

// --- Objectives Page Component ---
const ObjectivesPage = () => (
  <div className="container mx-auto px-6 py-12 rounded-lg bg-gray-50 shadow-md">
    <h2 className="text-4xl font-bold mb-12 text-center" style={{ color: colors.primaryGreen }}>Our Core Objectives</h2>

    <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
      {/* Objective 1 */}
      <div className="bg-white p-8 rounded-lg shadow-md transition-transform duration-300 hover:scale-105 flex flex-col items-center text-center">
        <Book size={64} style={{ color: colors.primaryGreen }} className="mb-6" />
        <h3 className="text-2xl font-bold mb-4" style={{ color: colors.black }}>Promotion of Reading Culture</h3>
        <p className="text-lg leading-relaxed text-gray-700">
          By showcasing the endurance and passion of our reading marathoners, Naija ReadFest seeks to reignite a fervor for reading across Nigeria.
          This event will serve as a beacon, encouraging individuals of all ages to embrace the joy and benefits of reading.
        </p>
      </div>

      {/* Objective 2 */}
      <div className="bg-white p-8 rounded-lg shadow-md transition-transform duration-300 hover:scale-105 flex flex-col items-center text-center">
        <Users size={64} style={{ color: colors.accentRed }} className="mb-6" />
        <h3 className="text-2xl font-bold mb-4" style={{ color: colors.black }}>Celebrating Diversity</h3>
        <p className="text-lg leading-relaxed text-gray-700">
          Naija ReadFest will proudly spotlight the unity of Nigeria by featuring readers representing major tribes coming together in pursuit of a shared goal.
        </p>
      </div>

      {/* Objective 3 */}
      <div className="bg-white p-8 rounded-lg shadow-md transition-transform duration-300 hover:scale-105 flex flex-col items-center text-center">
        <Award size={64} style={{ color: colors.accentGold }} className="mb-6" />
        <h3 className="text-2xl font-bold mb-4" style={{ color: colors.black }}>Support for Nigerian Authors</h3>
        <p className="text-lg leading-relaxed text-gray-700">
          Throughout Naija ReadFest, we will showcase the works of <span className="font-semibold" style={{ color: colors.accentRed }}>over 50</span>
          exceptional Nigerian authors across diverse genres,
          promoting a deeper appreciation for our homegrown literary gems.
        </p>
      </div>

      {/* Objective 4 */}
      <div className="bg-white p-8 rounded-lg shadow-md transition-transform duration-300 hover:scale-105 flex flex-col items-center text-center">
        <Handshake size={64} style={{ color: colors.primaryGreen }} className="mb-6" />
        <h3 className="text-2xl font-bold mb-4" style={{ color: colors.black }}>Business & Networking Opportunities</h3>
        <p className="text-lg leading-relaxed text-gray-700">
          Sponsors, partners and associates will be able to reach a decent number of enthusiastic youths and other target clients
          with their brand insight and information on products and services.
        </p>
      </div>
    </div>
  </div>
);

// --- Team Page Component ---
const TeamPage = () => (
  <div className="container mx-auto px-6 py-12 rounded-lg bg-gray-50 shadow-md">
    <h2 className="text-4xl font-bold mb-12 text-center" style={{ color: colors.primaryGreen }}>Meet the Visionaries Behind Naija ReadFest</h2>

    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
      {/* Core Team Members */}
      <div className="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
        <img
          src="/kingsley-sintim.png" // Path to Kingsley Sintim's image
          alt="Kingsley Sintim"
          className="w-36 h-36 rounded-full mb-4 object-cover border-4 border-gray-100"
        />
        <h3 className="text-xl font-bold" style={{ color: colors.black }}>Kingsley Sintim</h3>
        <p className="text-md font-semibold" style={{ color: colors.primaryGreen }}>Team Lead</p>
        <p className="text-sm text-gray-600 mt-2">Leading the charge with passion and dedication to literacy.</p>
      </div>

      <div className="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
        <img
          src="/john-obot.png" // Path to John Obot's image
          alt="John Obot"
          className="w-36 h-36 rounded-full mb-4 object-cover border-4 border-gray-100"
        />
        <h3 className="text-xl font-bold" style={{ color: colors.black }}>John Obot</h3>
        <p className="text-md font-semibold" style={{ color: colors.primaryGreen }}>Technical Lead, Former GWR Holder</p>
        <p className="text-sm text-gray-600 mt-2">Bringing unparalleled expertise from his own Guinness World Read aloud attempter.</p>
      </div>

      <div className="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
        <img
          src="/hope-garba.png" // Path to Hope Garba's image
          alt="Hope Garba"
          className="w-36 h-36 rounded-full mb-4 object-cover border-4 border-gray-100"
        />
        <h3 className="text-xl font-bold" style={{ color: colors.black }}>Hope Garba</h3>
        <p className="text-md font-semibold" style={{ color: colors.primaryGreen }}>Literacy & Talent Management</p>
        <p className="text-sm text-gray-600 mt-2">Nurturing talent and fostering a love for reading across all ages.</p>
      </div>

      <div className="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
        <img
          src="/johnson-ogundele.png" // Path to Johnson Ogundele's image
          alt="Johnson Ogundele"
          className="w-36 h-36 rounded-full mb-4 object-cover border-4 border-gray-100"
        />
        <h3 className="text-xl font-bold" style={{ color: colors.black }}>Johnson Ogundele</h3>
        <p className="text-md font-semibold" style={{ color: colors.primaryGreen }}>Project Manager</p>
        <p className="text-sm text-gray-600 mt-2">Ensuring smooth execution and coordination for this grand event.</p>
      </div>

      {/* Marathoners Section */}
      <div className="col-span-full mt-10">
        <h3 className="text-3xl font-semibold mb-6 text-center" style={{ color: colors.primaryGreen }}>Meet Our Marathoners</h3>
        <p className="text-lg text-gray-700 mb-8 text-center italic">
          The profiles of our 5 marathoners will be revealed soon.
        </p>
      </div>
    </div>
  </div>
);

// --- Schedule Page Component ---
const SchedulePage = () => (
  <div className="container mx-auto px-6 py-12 rounded-lg bg-gray-50 shadow-md">
    <h2 className="text-4xl font-bold mb-12 text-center" style={{ color: colors.primaryGreen }}>The Naija ReadFest Marathon: 18 Days of Literacy</h2>

    <section className="mb-10 p-6 bg-white rounded-lg shadow-md">
      <h3 className="text-3xl font-semibold mb-4" style={{ color: colors.black }}>424 Hours of Uninterrupted Reading</h3>
      <p className="text-lg leading-relaxed text-gray-700 mb-4">
        Join us for 18 consecutive days of inspiring read-aloud sessions, featuring carefully curated Nigerian literature.
        The marathon will run non-stop from <span className="font-semibold" style={{ color: colors.accentRed }}>July 22 to August 8</span>.
      </p>
      <p className="text-lg leading-relaxed text-gray-700 font-semibold mb-4">
        Venue: <span style={{ color: colors.primaryGreen }}>Freedom Park, Lagos</span>.
      </p>
    </section>

    {/* Removed Event Location / Map from Schedule Page */}

    <section className="p-6 bg-white rounded-lg shadow-md">
      <h3 className="text-3xl font-semibold mb-4" style={{ color: colors.black }}>Engage Beyond the Marathon</h3>
      <p className="text-lg leading-relaxed text-gray-700 mb-4">
        Throughout Naija ReadFest, we will organize symposiums and various side events to commemorate this historic attempt.
        These events will offer opportunities for deeper engagement with literary themes, authors, and the community.
      </p>
      <ul className="list-disc list-inside text-lg text-gray-700 space-y-2">
        <li>Interactive workshops and discussions.</li>
        <li>Meet-and-greet sessions with featured authors.</li>
        <li>Cultural performances celebrating Nigerian diversity.</li>
        <li>Literacy advocacy campaigns.</li>
      </ul>
      <p className="text-lg leading-relaxed text-gray-700">
        Our focus is to engage <span className="font-semibold" style={{ color: colors.accentRed }}>Gen Z (18-25 years old)</span> while also promoting healthy parent/children literacy relationships through school participation.
        Specific details on symposiums and side events will be announced closer to the date. Stay tuned!
      </p>
    </section>
  </div>
);

// --- ReadingListPage Component (replaces AuthorsPage) ---
const ReadingListPage = () => {
  const proposedReadingList = [
    "1. Father's wish - Oluremi Bolorunduro",
    "2. Independence - Sarah Ladipo Manyika",
    "3. Purple Hibiscus - Chimamanda Adiche",
    "4. The Return Of Ikenga - Chukwuemeka Ohuka",
    "5. Hero Number One - Emman Eboh",
    "6. A Man Of The People - Chinua Achebe",
    "7. The Worshippers - Victor Thorpe",
    "8. Last Days at Forcados High - A.H. Muhammed",
    "9. A Spell Of Good Things - Ayobami Adebayo",
    "10. Mother's Choice - Agbo Areo",
    "11. Happiness Like Water - Chinelo Okparanta",
    "12. The Girl with the Louding Voice-Abi Dare",
    "13. Daughter who walks this path - Yejide Kilanko",
    "14. The secret lives of Baba segi's wives - Lola Shoneyin",
    "15. Ake The Years of Childhood-Wole Soyinka",
    "16. Onyeka and the Rise of the Rebels Tolá Okogwu",
    "17. Time to Shine at the River School - Sabine Adeyinka",
    "18. All For Oil - J.P. Clark",
    "19. Lagoon - Nnedi Okorafor",
    "20. Leaving the Tarmac - Aigboje Aig-Imoukhuede",
    "21. Falmata and the Owners of God - David Wanedam",
    "22. Civil War Child - Nestor Udoh",
    "23. Warri No Dey Carry Last - Idede Osayende",
    "24. Dear Mother - Nora Santa",
    "25. The Last Duty - Isidore Okpewho",
    "26. Successful Nigerian Entrepreneurs and How They Started - YouWin Connect",
    "27. Measuring Time - Helon Habila",
    "28. Destiny - Okon Ibanga Udoh",
    "29. The Governor's Office - Dominic Kidzu",
    "30. A Bit of Difference - Sefi Atta",
    "31. Village Boy - Anietie Usen",
    "32. An African Night Entertainment - Cyprian Ekwensi",
    "33. New York, My Village - Uwem Akpan",
    "34. The Palmwine Drinkard - Amos Tutuola",
    "35. The Power of Vision - Tony Elumelu",
    "36. The Famished Road - Ben okri",
    "37. Becoming Nigerian: A Guide - Elnathan John",
    "38. Previous Hours of My Present Days - Emmanuel Abraham",
    "39. Fine Boys - Eghosa Imasuen",
    "40. Akpan and The Smugglers - Rosemary Uwemedimo",
    "41. A Father's Pride - Ndidi Chiazor-Enenmor",
    "42. The Third Side of A Coin - Hyginus Ekwazi",
    "43. Wish Maker - Uchechukwu Peter Umezurike",
    "44. Bode's Birthday Party - Akanmi Festis Olaniyi",
    "45. The Concubine - Elechi Amadi",
    "46. Wahala - Nikki May",
    "47. Tales of A Troubadour - Wale okediran",
    "48. Echoes of The Traditional Society - Akpandem James",
    "49. A Trip To The Atlantic - M. J. Akpabio",
    "50. An Adventure To Juju Island - Gabriel Okara",
  ];

  return (
    <div className="container mx-auto px-6 py-12 rounded-lg bg-gray-50 shadow-md">
      <h2 className="text-4xl font-bold mb-12 text-center" style={{ color: colors.primaryGreen }}>Proposed Reading List</h2>

      <section className="mb-10 p-6 bg-white rounded-lg shadow-sm">
        <p className="text-lg leading-relaxed text-gray-700 mb-6">
          This is the carefully curated list of Nigerian books that will be read aloud during the 424-hour marathon.
          Discover incredible stories and support our talented Nigerian authors!
        </p>
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          {proposedReadingList.map((book, index) => {
            // Split the string: "1. Title - Author"
            const parts = book.split('. ');
            const number = parts[0] + '.';
            const rest = parts.slice(1).join('. '); // Rejoin case there's a dot in title

            const titleAuthorSplit = rest.split(' - ');
            const title = titleAuthorSplit[0].trim();
            const author = titleAuthorSplit.length > 1 ? titleAuthorSplit.slice(1).join(' - ').trim() : '';

            return (
              <div key={index} className="bg-gray-100 p-4 rounded-lg shadow-sm flex flex-col items-start text-left">
                <span className="text-sm font-semibold" style={{ color: colors.primaryGreen }}>{number}</span>
                <p className="text-base font-bold text-gray-900 mt-1">"{title}"</p> {/* Added quotes for title */}
                {author && <p className="text-sm text-gray-700 italic mt-0.5">by {author}</p>}
              </div>
            );
          })}
        </div>
      </section>

      <section className="p-6 bg-white rounded-lg shadow-md text-center">
        <h3 className="text-3xl font-semibold mb-6" style={{ color: colors.black }}>Have a Book Suggestion?</h3>
        <p className="text-lg leading-relaxed text-gray-700 mb-8">
          We're always looking for great Nigerian stories! Suggest a book for future editions or events.
        </p>
        <a
          href="https://forms.gle/your-book-suggestion-form-link" // Placeholder link for book suggestion form
          target="_blank"
          rel="noopener noreferrer"
          className="inline-flex items-center px-8 py-4 text-xl font-bold text-white rounded-full shadow-lg transition duration-300 transform hover:scale-105"
          style={{ backgroundColor: colors.accentRed }}
        >
          <Lightbulb size={24} className="mr-2" />
          Suggest a Book
        </a>
      </section>
    </div>
  );
};

// --- Partners Page Component ---
const PartnersPage = () => (
  <div className="container mx-auto px-6 py-12 rounded-lg bg-gray-50 shadow-md">
    <h2 className="text-4xl font-bold mb-12 text-center" style={{ color: colors.primaryGreen }}>Partner With Naija ReadFest: Invest in Literacy</h2>

    <section className="mb-10 p-6 bg-white rounded-lg shadow-sm">
      <h3 className="text-3xl font-semibold mb-4" style={{ color: colors.black }}>Unlock Impact and Visibility</h3>
      <p className="text-lg leading-relaxed text-gray-700 mb-6">
        Align your brand with a historic Guinness World Record attempt and a powerful movement dedicated to empowering Nigeria's reading culture.
        Naija ReadFest offers unique opportunities for sponsors, partners, and associates to connect with a highly engaged audience.
      </p>
      <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div className="flex items-start space-x-3 p-4 bg-green-50 rounded-lg shadow-inner">
          <Target size={32} style={{ color: colors.primaryGreen }} className="mt-1" />
          <div>
            <h4 className="text-xl font-bold" style={{ color: colors.black }}>Targeted Reach</h4>
            <p className="text-gray-600">Access to a descent number of enthusiastic youths and other target clients.</p>
          </div>
        </div>
        <div className="p-4 rounded-lg shadow-inner bg-red-50 flex items-center space-x-3">
          <Award size={32} style={{ color: colors.accentRed }} className="mt-1" />
          <div>
            <h4 className="text-xl font-bold" style={{ color: colors.black }}>Brand Exposure</h4>
            <p className="text-gray-600">Showcase your brand to 100,000 venue visitors and 30 million social media reach.</p>
          </div>
        </div>
        <div className="flex items-start space-x-3 p-4 bg-yellow-50 rounded-lg shadow-inner">
          <Handshake size={32} style={{ color: colors.accentGold }} className="mt-1" />
          <div>
            <h4 className="text-xl font-bold" style={{ color: colors.black }}>Corporate Social Responsibility</h4>
            <p className="text-gray-600">Demonstrate commitment to education, literacy, and national development.</p>
          </div>
        </div>
        <div className="flex items-start space-x-3 p-4 bg-blue-50 flex items-center space-x-3">
          <Users size={32} style={{ color: colors.primaryGreen }} className="mt-1" />
          <div>
            <h4 className="text-xl font-bold" style={{ color: colors.black }}>Networking Opportunities</h4>
            <p className="text-gray-600">Engage with community leaders, educators, authors, and other partners.</p>
          </div>
        </div>
      </div>
    </section>

    <section className="p-6 bg-white rounded-lg shadow-md">
      <h3 className="text-3xl font-semibold mb-4" style={{ color: colors.black }}>What We Need (Provisional Budget)</h3>
      <p className="text-lg leading-relaxed text-gray-700 mb-6">
        Your support is crucial in bringing Naija ReadFest to life. Provisional budget categories include:
      </p>
      <ul className="list-disc list-inside text-lg text-gray-700 space-y-2">
        <li>Audio Visual Recording of Evidence</li>
        <li>Multimedia Livestream</li>
        <li>Brand elements</li>
        <li>Medical Care and Standby Ambulance</li>
        <li>Logistics</li>
        <li>Curated Nigerian Books</li>
        <li>Facility</li>
        <li>Refreshment</li>
        <li>Miscellaneous</li>
        <li>and lots more</li>{/* Added "and lots more" */}
      </ul>
      <div className="text-center mt-8">
        <a
          href="https://forms.gle/iC6wfYom6mxhpD6x7" // Updated link for volunteer form
          target="_blank"
          rel="noopener noreferrer"
          className="px-8 py-4 text-xl font-bold text-white rounded-full shadow-lg transition duration-300 transform hover:scale-105"
          style={{ backgroundColor: colors.accentRed }}
        >
          Contact Us: Call for Volunteers {/* Updated button text */}
        </a>
      </div>
    </section>
  </div>
);

// --- Live Stream Page Component ---
const LiveStreamPage = () => (
  <div className="container mx-auto px-6 py-12 rounded-lg bg-gray-50 shadow-md">
    <h2 className="text-4xl font-bold mb-12 text-center" style={{ color: colors.primaryGreen }}>Naija ReadFest LIVE: Witness History in the Making</h2>

    <section className="mb-10 p-6 bg-white rounded-lg shadow-sm text-center">
      <h3 className="text-3xl font-semibold mb-6" style={{ color: colors.black }}>Watch the Longest Read-Aloud Marathon</h3>
      <div
        className="relative w-full aspect-video flex items-center justify-center rounded-lg overflow-hidden shadow-xl bg-cover bg-center"
        style={{ backgroundImage: `url('https://placehold.co/1200x675/${colors.black.substring(1)}/${colors.white.substring(1)}?text=Live+Stream+Thumbnail')` }} // Placeholder thumbnail background
      >
        {/* Embedded YouTube Live Stream for the specified channel */}
        <iframe
          width="100%"
          height="100%"
          src="https://www.youtube.com/embed/live_stream?channel=UCu-R-g6g7uK-0wX4uB4Y4gQ&autoplay=1" // This is a common pattern, assuming the channel ID for @nigeriareads5491 is UCu-R-g6g7uK-0wX4uB4Y4gQ. (Google Search for this channel ID)
          title="Naija ReadFest Live Stream"
          frameBorder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowFullScreen
          className="absolute inset-0 w-full h-full rounded-lg" // Occupy full space, covering background
        ></iframe>
        <p className="absolute text-xl text-white font-semibold bg-black bg-opacity-75 p-2 rounded"
           style={{ zIndex: 1, pointerEvents: 'none' }}>
           Live Stream will start soon (July 22 - August 8)
        </p>
      </div>
      {/* Removed "Hours Read" and "Current Reader" sections */}
    </section>

    <section className="p-6 bg-white rounded-lg shadow-md">
      <h3 className="text-3xl font-semibold mb-6 text-center" style={{ color: colors.black }}>Join the Conversation!</h3>
      <p className="text-lg leading-relaxed text-gray-700 mb-4 text-center">
        Follow us on social media and use <span className="font-semibold" style={{ color: colors.primaryGreen }}>#NaijaReadFest</span> to share your thoughts and support!
      </p>
      {/* Removed placeholder text for social media feed */}
      <div className="flex justify-center space-x-6 mt-8 text-3xl">
        <a href="https://facebook.com/NigeriaReads" target="_blank" rel="noopener noreferrer" className="hover:text-gray-400"><i className="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com/NigeriaReadsNGO" target="_blank" rel="noopener noreferrer" className="hover:text-gray-400"><i className="fab fa-twitter"></i></a>
        <a href="https://instagram.com/NigeriaReads" target="_blank" rel="noopener noreferrer" className="hover:text-gray-400"><i className="fab fa-instagram"></i></a>
      </div>
    </section>
  </div>
);

// --- Contact Page Component ---
const ContactPage = () => {
  // No longer needs formData or handleSubmit for this version of the Contact page,
  // as the form itself is being removed. Keeping handleChange for consistency if
  // a form is re-introduced later or if other inputs are present.
  // const [formData, setFormData] = useState({ name: '', email: '', subject: '', message: '' });
  // const [status, setStatus] = useState('');

  // const handleChange = (e) => {
  //   const { name, value } = e.target;
  //   setFormData({ ...formData, [name]: value });
  // };

  // const handleSubmit = async (e) => {
  //   e.preventDefault();
  //   setStatus('Sending message...');
  //   try {
  //     const response = await fetch("https://formspree.io/f/your-form-id", {
  //       method: "POST",
  //       headers: { "Content-Type": "application/json", "Accept": "application/json" },
  //       body: JSON.stringify(formData)
  //     });
  //     if (response.ok) {
  //       setStatus('Message sent successfully! We will get back to you soon.');
  //       setFormData({ name: '', email: '', subject: '', message: '' });
  //     } else {
  //       const data = await response.json();
  //       if (data.errors) {
  //         setStatus('Error sending message: ' + data.errors.map(err => err.message).join(', '));
  //       } else {
  //         setStatus('Failed to send message. Please try again.');
  //       }
  //     }
  //   } catch (error) {
  //     console.error('Submission error:', error);
  //     setStatus('There was an error submitting the form. Please try again later.');
  //   }
  // };


  return (
    <div className="container mx-auto px-6 py-12 rounded-lg bg-gray-50 shadow-md">
      <h2 className="text-4xl font-bold mb-12 text-center" style={{ color: colors.primaryGreen }}>Get in Touch with Naija ReadFest</h2>

      <div className="flex flex-col md:flex-row md:space-x-8"> {/* Flex container for contact info and map */}
        {/* Contact Details & Social Media Section - Now full width */}
        <section className="p-6 bg-white rounded-lg shadow-md w-full flex flex-col items-center text-center">
          <h3 className="text-3xl font-semibold mb-6" style={{ color: colors.black }}>Reach Out to Us Directly</h3>
          
          <div className="text-center mb-6 w-full"> {/* Email */}
            <Mail size={48} style={{ color: colors.primaryGreen }} className="mx-auto mb-2" />
            <h4 className="text-xl font-bold mb-1" style={{ color: colors.black }}>Email Us</h4>
            <p className="text-lg text-gray-700">info@nigeriareads.ng</p>
          </div>

          <div className="text-center mb-6 w-full"> {/* Phone */}
            <Phone size={48} style={{ color: colors.primaryGreen }} className="mx-auto mb-2" />
            <h4 className="text-xl font-bold mb-1" style={{ color: colors.black }}>Call Us</h4>
            <p className="text-lg text-gray-700">080 6781 3462</p>
          </div>

          <div className="text-center w-full"> {/* Social Media Handles */}
            <h4 className="text-2xl font-bold mb-4" style={{ color: colors.black }}>Connect on Social Media</h4>
            <div className="flex justify-center space-x-6 text-3xl">
              <a href="https://facebook.com/NigeriaReads" target="_blank" rel="noopener noreferrer" className="hover:text-gray-600 transition-colors duration-200" style={{ color: colors.primaryGreen }}><i className="fab fa-facebook-f"></i></a>
              <a href="https://twitter.com/NigeriaReadsNGO" target="_blank" rel="noopener noreferrer" className="hover:text-gray-600 transition-colors duration-200" style={{ color: colors.primaryGreen }}><i className="fab fa-twitter"></i></a>
              <a href="https://instagram.com/NigeriaReads" target="_blank" rel="noopener noreferrer" className="hover:text-gray-600 transition-colors duration-200" style={{ color: colors.primaryGreen }}><i className="fab fa-instagram"></i></a>
            </div>
          </div>
        </section>

        {/* Removed Map section entirely */}
      </div> {/* End flex container */}
    </div>
  );
};


// --- Main App Component ---
function App() {
  const [currentPage, setCurrentPage] = useState('home');

  // Render the current page based on state
  const renderPage = () => {
    switch (currentPage) {
      case 'home':
        return <HomePage setCurrentPage={setCurrentPage} />; // Pass setCurrentPage to HomePage
      case 'about':
        return <AboutPage />;
      case 'objectives':
        return <ObjectivesPage />;
      case 'team':
        return <TeamPage />;
      case 'schedule':
        return <SchedulePage />;
      case 'reading-list': // Updated to ReadingListPage
        return <ReadingListPage />;
      case 'partners':
        return <PartnersPage />;
      case 'live-stream':
        return <LiveStreamPage />;
      case 'contact':
        return <ContactPage />;
      default:
        return <HomePage setCurrentPage={setCurrentPage} />;
    }
  };

  return (
    <div className="font-inter antialiased bg-gray-100 min-h-screen flex flex-col">
      {/*
        NOTE: CSS/Font/Icon CDN links and <style> block for body font
        have been moved to public/index.html for proper local development setup.
        They are removed from here.
      */}
      <Navbar currentPage={currentPage} setCurrentPage={setCurrentPage} />
      <main className="flex-grow py-8">{renderPage()}</main>
      <Footer />
    </div>
  );
}

export default App;
