function scrollToSection(id) {
    const section = document.querySelector(id);
    window.scrollTo({
      behavior: 'smooth',
      top: section.offsetTop
    });
  }

  // Event listeners for menu items
  document.querySelectorAll('.nav-effect').forEach(item => {
    item.addEventListener('click', () => {
      const sectionId = item.getAttribute('href');
      scrollToSection(sectionId);
    });
  });

  const navbarLinks = document.querySelectorAll('.nav-effect');

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

  const sections = document.querySelectorAll('.section');

  // Function to check if element is in view
  function isInView(element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  // Function to update active link
  function updateActiveLink() {
    sections.forEach(section => {
      const link = document.querySelector(`.navbar a[href="#${section.id}"]`);
      if (isInView(section)) {
        link.classList.add('active-nav');
      } else {
        link.classList.remove('active-nav');
      }
    });
  }

  // Add scroll event listener
  window.addEventListener('scroll', updateActiveLink);

  // Initial call to update active link on page load
  updateActiveLink();
