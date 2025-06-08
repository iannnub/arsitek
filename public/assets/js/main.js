// assets/js/main.js

/**
 * Initializes counters with an animation effect when they become visible.
 * @param {HTMLElement} container - The parent element containing counter elements. Defaults to document.
 */
function initializeCounters(container = document) {
    const counters = container.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        counter.innerText = '0'; // Initialize text to 0

        let current = 0;
        const increment = target / 100; // Animate in 100 steps
        const animationSpeed = 15; // Milliseconds per step

        const updateCount = () => {
            if (current < target) {
                current += increment;
                if (current > target) current = target; // Ensure not to overshoot
                counter.innerText = Math.ceil(current);
                setTimeout(updateCount, animationSpeed);
            } else {
                counter.innerText = target; // Ensure final value is exact
            }
        };

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    updateCount();
                    obs.unobserve(counter);
                }
            });
        }, { threshold: 0.01 }); // Start animation when 1% visible
        observer.observe(counter);
    });
}

/**
 * Styles a navigation link based on its active state.
 * @param {HTMLAnchorElement} link - The navigation link element.
 * @param {boolean} isActive - Whether the link should be styled as active.
 * @param {boolean} isMobile - Whether the link is a mobile navigation item.
 */
function styleNavLink(link, isActive, isMobile) {
    const underline = !isMobile ? link.querySelector('span') : null;

    if (isActive) {
        link.classList.add('text-primary-400');
        link.classList.remove('text-gray-300');
        if (isMobile && link.classList.contains('hover:bg-gray-800')) {
            link.classList.add('bg-gray-800');
        }
        if (underline) {
            underline.classList.add('scale-x-100');
            underline.classList.remove('scale-x-0');
        }
    } else {
        link.classList.remove('text-primary-400');
        if (isMobile) link.classList.remove('bg-gray-800');
        link.classList.add('text-gray-300');
        if (underline) {
            underline.classList.add('scale-x-0');
            underline.classList.remove('scale-x-100');
        }
    }
}

/**
 * Determines the ID of the currently visible section based on scroll position.
 * @param {NodeListOf<HTMLElement>} sections - A list of section elements.
 * @param {number} headerHeight - The height of the header element.
 * @param {number} offset - Additional offset for triggering section change.
 * @returns {string} The ID of the current section, or 'home' by default.
 */
function getCurrentSectionId(sections, headerHeight, offset = 70) {
    let currentSectionId = '';
    const scrollPosition = window.pageYOffset;

    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        if (scrollPosition >= (sectionTop - headerHeight - offset)) {
            currentSectionId = section.getAttribute('id');
        }
    });
    
    // Default to 'home' if above the first section or if no section is matched yet
    if (!currentSectionId && sections.length > 0 && scrollPosition < (sections[0].offsetTop - headerHeight - offset)) {
        return 'home';
    }
    
    // If scrolled past the last section, keep the last section active
    if (!currentSectionId && sections.length > 0 && scrollPosition >= (sections[sections.length - 1].offsetTop + sections[sections.length - 1].offsetHeight - headerHeight - offset)) {
        return sections[sections.length - 1].getAttribute('id');
    }

    return currentSectionId || 'home'; // Default to 'home' if no section is active (e.g., very top of page)
}


/**
 * Updates the active state of navigation links based on the current scroll position.
 */
function updateActiveNavLinks() {
    const header = document.querySelector('header');
    if (!header) return;

    const navLinks = document.querySelectorAll('header nav a.nav-item');
    const mobileNavLinks = document.querySelectorAll('#mobile-menu a.mobile-nav-item');
    const sections = document.querySelectorAll('main section[id]');
    const headerHeight = header.offsetHeight;

    // Handle homepage root with no sections (e.g. a true single page without scrollable sections)
    if (sections.length === 0 && window.location.pathname === '/' && !window.location.hash) {
        navLinks.forEach(link => styleNavLink(link, (link.getAttribute('href') === '#home' || link.getAttribute('href') === '/'), false));
        mobileNavLinks.forEach(link => styleNavLink(link, (link.getAttribute('href') === '#home' || link.getAttribute('href') === '/'), true));
        return;
    }

    if (sections.length === 0) return; // No sections to link to

    const currentSectionId = getCurrentSectionId(sections, headerHeight);

    navLinks.forEach(link => {
        styleNavLink(link, link.getAttribute('href') === `#${currentSectionId}`, false);
    });

    mobileNavLinks.forEach(link => {
        styleNavLink(link, link.getAttribute('href') === `#${currentSectionId}`, true);
    });
}

/**
 * Initializes sticky header behavior.
 * @param {HTMLElement} header - The header element.
 */
/**
 * Initializes generic scroll-triggered animations for elements.
 */
function initializeScrollAnimations() {
    const animatedElements = document.querySelectorAll(
        '[class*="opacity-0"][class*="transition-all"]'
    );

    if (!animatedElements.length) return;

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                el.classList.remove('opacity-0');
                el.classList.add('opacity-100');

                // More robustly find and replace transform/scale classes
                const classesToRemove = [];
                const classesToAdd = [];

                el.classList.forEach(cls => {
                    if (cls.startsWith('translate-y-') && cls !== 'translate-y-0') {
                        classesToRemove.push(cls);
                        if (!classesToAdd.includes('translate-y-0')) classesToAdd.push('translate-y-0');
                    }
                    if (cls.startsWith('translate-x-') && cls !== 'translate-x-0') {
                        classesToRemove.push(cls);
                        if (!classesToAdd.includes('translate-x-0')) classesToAdd.push('translate-x-0');
                    }
                    if (cls.startsWith('scale-') && cls !== 'scale-100') {
                        classesToRemove.push(cls);
                        if (!classesToAdd.includes('scale-100')) classesToAdd.push('scale-100');
                    }
                });

                classesToRemove.forEach(cls => el.classList.remove(cls));
                classesToAdd.forEach(cls => el.classList.add(cls));
                
                obs.unobserve(el);
            }
        });
    }, { threshold: 0.1 });

    animatedElements.forEach(el => {
        observer.observe(el);
    });
}


/**
 * Initializes sticky header behavior.
 * @param {HTMLElement} header - The header element.
 */
function initializeStickyHeader(header) {
    if (!header) return;

    const stickyPadding = 'py-3';
    const defaultPadding = 'py-6'; // Assumes header has py-6 by default

    // Store initial classes to handle dark mode correctly for bg-transparent
    const isInitiallyDarkTransparent = header.classList.contains('dark:bg-transparent');

    window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > 50) {
            header.classList.add('bg-white/80', 'dark:bg-gray-900/80', 'backdrop-blur-md', 'shadow-lg');
            header.classList.remove('bg-transparent', 'dark:bg-transparent');
            
            if (header.classList.contains(defaultPadding)) {
                header.classList.remove(defaultPadding);
            }
            if (!header.classList.contains(stickyPadding)) {
                header.classList.add(stickyPadding);
            }
        } else {
            header.classList.remove('bg-white/80', 'dark:bg-gray-900/80', 'backdrop-blur-md', 'shadow-lg');
            header.classList.add('bg-transparent');
            if (isInitiallyDarkTransparent) {
                 header.classList.add('dark:bg-transparent'); // Restore if it was initially dark transparent
            }
            // header.classList.add('shadow-none'); // This is often default, but explicit removal of shadow-lg is better

            if (header.classList.contains(stickyPadding)) {
                header.classList.remove(stickyPadding);
            }
            if (!header.classList.contains(defaultPadding)) {
                header.classList.add(defaultPadding);
            }
        }
    });
}

/**
 * Adjusts main content padding to account for fixed header height.
 * @param {HTMLElement} mainContent - The main content element.
 * @param {HTMLElement} header - The header element.
 */
function adjustMainContentPadding(mainContent, header) {
    if (mainContent && header) {
        mainContent.style.paddingTop = `${header.offsetHeight}px`;
    }
}

/**
 * Initializes mobile menu toggle functionality.
 * @param {HTMLButtonElement} button - The mobile menu button.
 * @param {HTMLElement} menu - The mobile menu element.
 */
function initializeMobileMenu(button, menu) {
    if (!button || !menu) return;

    button.addEventListener('click', () => {
        const isHidden = menu.classList.toggle('hidden');
        button.setAttribute('aria-expanded', String(!isHidden));
        menu.classList.remove('animate-fadeIn', 'animate-fadeOut');
        menu.classList.add(isHidden ? 'animate-fadeOut' : 'animate-fadeIn');
    });

    menu.querySelectorAll('a.mobile-nav-item').forEach(link => {
        link.addEventListener('click', () => {
            if (!menu.classList.contains('hidden')) {
                menu.classList.remove('animate-fadeIn');
                menu.classList.add('animate-fadeOut');
                setTimeout(() => menu.classList.add('hidden'), 300); // Match animation duration
                button.setAttribute('aria-expanded', 'false');
            }
        });
    });

    // Ensure menu is hidden by default and aria-expanded is correct
    if (!menu.classList.contains('hidden')) {
        menu.classList.add('hidden');
    }
    button.setAttribute('aria-expanded', 'false');
}

/**
 * Initializes active link highlighting for navigation.
 */
function initializeActiveLinkHighlighting() {
    const hasScrollableSections = document.querySelector('main section[id]');
    const isHomePageRoot = window.location.pathname === '/' && !window.location.hash;

    if (hasScrollableSections || isHomePageRoot) {
        updateActiveNavLinks(); // Initial call
        window.addEventListener('scroll', updateActiveNavLinks);
    }
}


/**
 * Initializes smooth scrolling for anchor links.
 * @param {string} selector - CSS selector for anchor links.
 */
function initializeSmoothScroll(selector = 'a[href^="#"]') {
    document.querySelectorAll(selector).forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const hrefAttribute = this.getAttribute('href');
            // Ensure it's a valid hash link and not just "#"
            if (hrefAttribute && hrefAttribute.length > 1 && hrefAttribute.startsWith('#')) {
                try {
                    const targetElement = document.querySelector(hrefAttribute);
                    if (targetElement) {
                        e.preventDefault();
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                    }
                } catch (error) {
                    // Catch invalid selector errors, e.g., if hrefAttribute is not a valid ID
                    console.warn(`Smooth scroll failed for selector: ${hrefAttribute}`, error);
                }
            }
        });
    });
}

// Main DOMContentLoaded event listener
document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('header');
    const mainContent = document.querySelector('main');
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    initializeStickyHeader(header);
    adjustMainContentPadding(mainContent, header);
    initializeMobileMenu(mobileMenuButton, mobileMenu);
    initializeActiveLinkHighlighting();
    initializeScrollAnimations();
    initializeSmoothScroll();
    initializeCounters(); // Initialize counters globally or pass a specific container
});
