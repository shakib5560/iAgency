/**
 * RajTech BD - Theme Scripts
 * Zero-bloat, high-performance vanilla JavaScript
 */

document.addEventListener('DOMContentLoaded', function () {
  'use strict';

  // 1. Minimalist Scroll Reveal Observer
  const revealElements = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && revealElements.length > 0) {
    const revealObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('active');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -30px 0px'
    });

    revealElements.forEach(el => revealObserver.observe(el));
  } else {
    // Fallback for older browsers
    revealElements.forEach(el => el.classList.add('active'));
  }

  // 2. Stat Counter Animation
  const countElements = document.querySelectorAll('.count-up');
  if ('IntersectionObserver' in window && countElements.length > 0) {
    const countObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const el = entry.target;
          const targetVal = parseFloat(el.getAttribute('data-target'));
          if (isNaN(targetVal)) return;

          const suffix = el.getAttribute('data-suffix') || '';
          let current = 0;
          const steps = 45;
          const increment = targetVal / steps;
          const isFloat = targetVal % 1 !== 0;

          const timer = setInterval(() => {
            current += increment;
            if (current >= targetVal) {
              el.textContent = (isFloat ? targetVal.toFixed(1) : Math.round(targetVal)) + suffix;
              clearInterval(timer);
            } else {
              el.textContent = (isFloat ? current.toFixed(1) : Math.round(current)) + suffix;
            }
          }, 30);

          observer.unobserve(el);
        }
      });
    }, { threshold: 0.4 });

    countElements.forEach(el => countObserver.observe(el));
  }

  // 3. Mobile Navigation Drawer Toggle
  const mobileToggleBtn = document.getElementById('mobile-menu-toggle');
  const mobileMenuDrawer = document.getElementById('mobile-menu-drawer');
  const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');

  function toggleMobileMenu() {
    if (!mobileMenuDrawer) return;
    const isHidden = mobileMenuDrawer.classList.contains('hidden');
    if (isHidden) {
      mobileMenuDrawer.classList.remove('hidden');
      if (mobileMenuOverlay) mobileMenuOverlay.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    } else {
      mobileMenuDrawer.classList.add('hidden');
      if (mobileMenuOverlay) mobileMenuOverlay.classList.add('hidden');
      document.body.style.overflow = '';
    }
  }

  if (mobileToggleBtn) {
    mobileToggleBtn.addEventListener('click', toggleMobileMenu);
  }

  if (mobileMenuOverlay) {
    mobileMenuOverlay.addEventListener('click', toggleMobileMenu);
  }

  const mobileCloseBtn = document.getElementById('mobile-menu-close');
  if (mobileCloseBtn) {
    mobileCloseBtn.addEventListener('click', toggleMobileMenu);
  }

  // Close mobile drawer on navigation link click
  const mobileNavLinks = document.querySelectorAll('#mobile-menu-drawer a');
  mobileNavLinks.forEach(link => {
    link.addEventListener('click', function () {
      if (mobileMenuDrawer && !mobileMenuDrawer.classList.contains('hidden')) {
        toggleMobileMenu();
      }
    });
  });

  // 4. FAQ Accordion
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach(item => {
    const header = item.querySelector('.faq-header');
    if (header) {
      header.addEventListener('click', () => {
        const isActive = item.classList.contains('active');
        
        // Optional: close other items in the same container for clean accordion effect
        const parentContainer = item.closest('.faq-container');
        if (parentContainer) {
          parentContainer.querySelectorAll('.faq-item').forEach(other => {
            if (other !== item) other.classList.remove('active');
          });
        }

        if (isActive) {
          item.classList.remove('active');
        } else {
          item.classList.add('active');
        }
      });
    }
  });

  // 5. Sticky Header Border Enhance on Scroll
  const mainHeader = document.querySelector('header');
  if (mainHeader) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 20) {
        mainHeader.classList.add('shadow-xs', 'bg-white/98');
        mainHeader.classList.remove('bg-white/95');
      } else {
        mainHeader.classList.remove('shadow-xs', 'bg-white/98');
        mainHeader.classList.add('bg-white/95');
      }
    }, { passive: true });
  }

  // 6. Navigation Progress Integration
  if (window.RajTechNavProgress && typeof window.RajTechNavProgress.finish === 'function') {
    // If arriving on page, ensure top progress completes cleanly
    window.RajTechNavProgress.finish();
  }
});
