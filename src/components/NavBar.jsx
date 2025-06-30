import React, { useState } from "react";

const NAV_LINKS = [
  { name: "Home", id: "home" },
  { name: "About", id: "about" },
  { name: "Objectives", id: "objectives" },
  { name: "Live Stream", id: "live-stream" },
  { name: "Contact", id: "contact" },
];

const DISCOVER_LINKS = [
  { name: "Team", id: "team" },
  { name: "Schedule", id: "schedule" },
  { name: "Reading List", id: "reading-list" },
  { name: "Partners", id: "partners" },
  { name: "Gallery", id: "gallery" },
  { name: "Volunteer", id: "volunteer" },
];

export default function NavBar({ currentPage, setCurrentPage }) {
  const [mobileOpen, setMobileOpen] = useState(false);
  const [discoverOpen, setDiscoverOpen] = useState(false);
  const [scrolled, setScrolled] = useState(false);

  React.useEffect(() => {
    const handleScroll = () => setScrolled(window.scrollY > 10);
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const handleNav = (id) => {
    setCurrentPage(id);
    setMobileOpen(false);
    setDiscoverOpen(false);
  };

  return (
    <nav className={`sticky top-0 z-50 transition-all duration-300 ${scrolled ? "shadow-lg bg-white/90 backdrop-blur-sm" : "bg-white"}`}>
      <div className={`container mx-auto px-4 transition-all duration-300 ${scrolled ? "py-2" : "py-4"}`}>
        <div className="flex justify-between items-center">
          <button onClick={() => handleNav("home")} className="flex items-center space-x-2 hover:opacity-80 transition-opacity">
            <img src="/logos/naijareadfest-logo.png" alt="Naija ReadFest Logo" className={`transition-all duration-300 ${scrolled ? "h-8" : "h-10"} w-auto rounded`} />
            <span className="text-xl font-bold" style={{ color: "#008000" }}>Naija ReadFest</span>
          </button>
          <div className="md:hidden">
            <button onClick={() => setMobileOpen(!mobileOpen)} className="text-gray-800 hover:text-gray-600 focus:outline-none">
              <svg className="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d={mobileOpen ? "M6 18L18 6M6 6l12 12" : "M4 6h16M4 12h16M4 18h16"} />
              </svg>
            </button>
          </div>
          <div className="hidden md:flex items-center space-x-1">
            {NAV_LINKS.map((link) => (
              <button
                key={link.id}
                onClick={() => handleNav(link.id)}
                className={`px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200 relative group ${currentPage === link.id ? "text-green-600" : "text-gray-700 hover:text-green-600"}`}
              >
                {link.name}
                <span className={`absolute bottom-0 left-0 w-full h-0.5 bg-green-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ${currentPage === link.id ? "scale-x-100" : ""}`}></span>
              </button>
            ))}
            <div className="relative">
              <button
                onClick={() => setDiscoverOpen(!discoverOpen)}
                className={`flex items-center px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200 group ${discoverOpen || DISCOVER_LINKS.some((l) => l.id === currentPage) ? "text-green-600" : "text-gray-700 hover:text-green-600"}`}
              >
                Discover
                <svg className={`ml-1 transition-transform ${discoverOpen ? "rotate-180" : ""}`} width={16} height={16} fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
              {discoverOpen && (
                <ul className="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20 ring-1 ring-black ring-opacity-5">
                  {DISCOVER_LINKS.map((link) => (
                    <li key={link.id}>
                      <button
                        onClick={() => handleNav(link.id)}
                        className={`block w-full text-left px-4 py-2 text-sm transition-colors duration-200 ${currentPage === link.id ? "text-green-600 bg-gray-100" : "text-gray-700 hover:text-green-600"}`}
                      >
                        {link.name}
                      </button>
                    </li>
                  ))}
                </ul>
              )}
            </div>
          </div>
        </div>
        {/* Mobile menu */}
        {mobileOpen && (
          <div className="md:hidden mt-2 space-y-1">
            {NAV_LINKS.map((link) => (
              <button
                key={link.id}
                onClick={() => handleNav(link.id)}
                className={`block w-full text-left px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200 ${currentPage === link.id ? "text-green-600 bg-gray-100" : "text-gray-700 hover:text-green-600"}`}
              >
                {link.name}
              </button>
            ))}
            <div className="border-t my-2"></div>
            <button
              onClick={() => setDiscoverOpen(!discoverOpen)}
              className="block w-full text-left px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200 text-gray-700 hover:text-green-600"
            >
              Discover
              <svg className={`ml-1 inline transition-transform ${discoverOpen ? "rotate-180" : ""}`} width={16} height={16} fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            {discoverOpen && (
              <ul className="pl-4">
                {DISCOVER_LINKS.map((link) => (
                  <li key={link.id}>
                    <button
                      onClick={() => handleNav(link.id)}
                      className={`block w-full text-left px-4 py-2 text-sm transition-colors duration-200 ${currentPage === link.id ? "text-green-600 bg-gray-100" : "text-gray-700 hover:text-green-600"}`}
                    >
                      {link.name}
                    </button>
                  </li>
                ))}
              </ul>
            )}
          </div>
        )}
      </div>
    </nav>
  );
} 