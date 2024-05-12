function scrollToSection(id) {
    const section = document.querySelector(id);
    window.scrollTo({
      behavior: 'smooth',
      top: section.offsetTop
    });
  }

  // Event listeners for menu items
  document.querySelectorAll('.nav-link').forEach(item => {
    item.addEventListener('click', () => {
      const sectionId = item.getAttribute('href');
      scrollToSection(sectionId);
    });
  });

  const navbarLinks = document.querySelectorAll('.nav-link');

  // Add event listener to each navbar link
  navbarLinks.forEach(link => {
    link.addEventListener('click', function() {
      // Remove 'active' class from all links
      navbarLinks.forEach(link => {
        link.classList.remove('active-nav');
      });

      // Add 'active' class to the clicked link
      this.classList.add('active-nav');
    });
  });