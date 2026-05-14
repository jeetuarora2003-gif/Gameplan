document.addEventListener('DOMContentLoaded', () => {
  // Mobile Menu Toggle
  const menuToggle = document.querySelector('.mobile-menu-toggle');
  const mainNav = document.querySelector('.main-nav');
  const setMenuOpen = (isOpen) => {
    if (!menuToggle || !mainNav) {
      return;
    }

    menuToggle.classList.toggle('is-active', isOpen);
    mainNav.classList.toggle('is-open', isOpen);
    document.body.classList.toggle('mobile-menu-open', isOpen);
    menuToggle.setAttribute('aria-expanded', String(isOpen));
  };
  
  if (menuToggle && mainNav && menuToggle.dataset.menuBound !== 'true') {
    menuToggle.dataset.menuBound = 'true';
    menuToggle.setAttribute('type', 'button');

    menuToggle.addEventListener('click', (event) => {
      event.preventDefault();
      event.stopPropagation();
      setMenuOpen(!mainNav.classList.contains('is-open'));
    });

    mainNav.addEventListener('click', (event) => {
      event.stopPropagation();
    });

    mainNav.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        setMenuOpen(false);
      });
    });

    document.addEventListener('click', (event) => {
      if (
        mainNav.classList.contains('is-open') &&
        !mainNav.contains(event.target) &&
        !menuToggle.contains(event.target)
      ) {
        setMenuOpen(false);
      }
    });

    document.addEventListener('keydown', (event) => {
      if (event.key === 'Escape' && mainNav.classList.contains('is-open')) {
        setMenuOpen(false);
      }
    });

    window.addEventListener('resize', () => {
      if (window.innerWidth > 1024 && mainNav.classList.contains('is-open')) {
        setMenuOpen(false);
      }
    });
  }

  // Sticky Header Scroll Effect
  const header = document.querySelector('.site-header');
  const getHeaderOffset = () => (header ? header.offsetHeight : 0) + 20;
  const pendingHashKey = 'gameplanPendingSection';

  const getHashTargetId = (href) => {
    const hashIndex = href.indexOf('#');
    return hashIndex > -1 ? href.slice(hashIndex + 1) : '';
  };

  const rememberPendingSection = (targetId) => {
    if (!targetId) {
      return;
    }

    try {
      window.sessionStorage.setItem(pendingHashKey, targetId);
    } catch (error) {
      // Storage can be unavailable in some privacy modes; the URL hash still works.
    }
  };

  const getPendingTargetId = () => {
    if (window.location.hash) {
      return window.location.hash.substring(1);
    }

    try {
      return window.sessionStorage.getItem(pendingHashKey) || '';
    } catch (error) {
      return '';
    }
  };

  const clearPendingSection = () => {
    try {
      window.sessionStorage.removeItem(pendingHashKey);
    } catch (error) {
      // Ignore unavailable storage.
    }
  };

  const closeMobileMenu = () => {
    setMenuOpen(false);
  };

  const scrollToTargetElement = (targetElement, behavior = 'smooth') => {
    const offsetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - getHeaderOffset();

    window.scrollTo({
      top: Math.max(offsetPosition, 0),
      behavior
    });
  };

  const scrollToCurrentHash = (behavior = 'auto') => {
    const targetId = getPendingTargetId();

    if (!targetId) {
      return;
    }

    const targetElement = document.getElementById(targetId);
    if (targetElement) {
      if (!window.location.hash && history.replaceState) {
        history.replaceState(null, '', `#${targetId}`);
      }

      scrollToTargetElement(targetElement, behavior);
      clearPendingSection();
    }
  };

  if (header) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
  }

  // Smooth Scroll for Anchor Links
  document.querySelectorAll('a[href^="#"], a[href*="/#"], a[href*="index.html#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      const targetId = getHashTargetId(href);
      
      if (!targetId) {
        return;
      }

      rememberPendingSection(targetId);
      const targetElement = document.getElementById(targetId);

      if (targetElement) {
        e.preventDefault();
        closeMobileMenu();
        scrollToTargetElement(targetElement);
        clearPendingSection();
      }
    });
  });

  // Handle cross-page anchor scrolling on load
  if (window.location.hash || getPendingTargetId()) {
    if ('scrollRestoration' in history) {
      history.scrollRestoration = 'manual';
    }

    requestAnimationFrame(() => scrollToCurrentHash('auto'));
    [100, 350, 800, 1600, 2800].forEach(delay => {
      setTimeout(() => scrollToCurrentHash('auto'), delay);
    });

    window.addEventListener('load', () => scrollToCurrentHash('auto'), { once: true });
    window.addEventListener('pageshow', () => scrollToCurrentHash('auto'));
    window.addEventListener('hashchange', () => scrollToCurrentHash('smooth'));

    if (document.fonts && document.fonts.ready) {
      document.fonts.ready.then(() => scrollToCurrentHash('auto'));
    }
  }

  // GSAP Animations (Ensure GSAP and ScrollTrigger are loaded)
  if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
    gsap.registerPlugin(ScrollTrigger);

    // Fade up sections on scroll
    const fadeUpElements = document.querySelectorAll('.gsap-fade-up');
    
    fadeUpElements.forEach(el => {
      gsap.to(el, {
        scrollTrigger: {
          trigger: el,
          start: 'top 85%',
          toggleActions: 'play none none reverse'
        },
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: 'power3.out'
      });
    });

    // Staggered expertise list
    const expertiseItems = document.querySelectorAll('.expertise-list-item');
    if (expertiseItems.length > 0) {
      gsap.fromTo(expertiseItems, 
        { opacity: 0, x: 20 },
        {
          scrollTrigger: {
            trigger: '.expertise-list-container',
            start: 'top 80%',
          },
          opacity: 1,
          x: 0,
          duration: 0.6,
          stagger: 0.1,
          ease: 'power2.out'
        }
      );
    }
  }

  // --- Premium Newsletter Modal Logic ---
  const newsletterModal = document.getElementById('newsletterModal');
  const newsletterForm = document.getElementById('premiumNewsletterForm');
  const newsletterSuccess = document.getElementById('newsletterSuccess');

  window.openNewsletter = function(e) {
    if (e) e.preventDefault();
    if (!newsletterModal) return;
    newsletterModal.classList.add('active');
    newsletterModal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  };

  window.closeNewsletter = function() {
    if (!newsletterModal) return;
    newsletterModal.classList.remove('active');
    newsletterModal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
    // Reset form state after close animation
    setTimeout(() => {
      if (newsletterForm) {
        const submitBtn = newsletterForm.querySelector('button');
        newsletterForm.style.display = 'block';
        newsletterForm.reset();
        if (submitBtn) {
          submitBtn.innerHTML = 'Subscribe <span>&rarr;</span>';
          submitBtn.disabled = false;
        }
      }
      if (newsletterSuccess) {
        newsletterSuccess.style.display = 'none';
      }
    }, 500);
  };

  if (newsletterForm) {
    newsletterForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const emailInput = newsletterForm.querySelector('input[type="email"]');
      const subscriberEmail = emailInput ? emailInput.value.trim() : '';
      const submitBtn = newsletterForm.querySelector('button');
      const originalText = submitBtn.innerHTML;
      submitBtn.innerHTML = 'Processing...';
      submitBtn.disabled = true;

      setTimeout(() => {
        if (subscriberEmail) {
          window.location.href = `mailto:connect@gameplanlegal.com?subject=Newsletter%20subscription&body=Please%20subscribe%20${encodeURIComponent(subscriberEmail)}%20to%20the%20Gameplan%20Legal%20newsletter.`;
        }
        newsletterForm.style.display = 'none';
        newsletterSuccess.style.display = 'block';
        
        // GSAP Success Animation if available
        if (typeof gsap !== 'undefined') {
          gsap.from('.success-icon', { scale: 0, duration: 0.5, ease: 'back.out(1.7)' });
          gsap.from('#newsletterSuccess h3, #newsletterSuccess p', { 
            opacity: 0, 
            y: 20, 
            stagger: 0.1, 
            duration: 0.4 
          });
        }
      }, 1200);
    });
  }

  // Close on Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && newsletterModal && newsletterModal.classList.contains('active')) {
      closeNewsletter();
    }
  });
});
