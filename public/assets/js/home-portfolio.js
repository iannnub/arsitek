// assets/js/home-portfolio.js

document.addEventListener('DOMContentLoaded', function() {
    // Cache DOM elements
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    const modal = document.getElementById('project-modal');
    const modalOverlay = document.getElementById('modal-overlay');
    const modalContainer = document.getElementById('modal-container');
    const modalClose = document.getElementById('modal-close');
    const modalImage = document.getElementById('modal-image');
    const modalTitle = document.getElementById('modal-title');
    const modalCategory = document.getElementById('modal-category');
    const modalDescription = document.getElementById('modal-description');
    const modalContactBtn = document.getElementById('modal-contact-btn');
    const modalClient = document.getElementById('modal-client');
    const modalYear = document.getElementById('modal-year');
    const modalLocation = document.getElementById('modal-location');
    const modalArea = document.getElementById('modal-area');

    const ANIMATION_DURATION_MS = 300;
    const ITEM_ANIMATION_DELAY_MS = 50;

    /**
     * Styles a filter button based on its active state.
     * @param {HTMLButtonElement} button - The filter button element.
     * @param {boolean} isActive - Whether the button should be styled as active.
     */
    function styleFilterButton(button, isActive) {
        if (isActive) {
            button.classList.add('active', 'bg-primary-500', 'text-white');
            button.classList.remove('bg-white', 'dark:bg-gray-700', 'text-secondary-700', 'dark:text-gray-300', 'hover:bg-primary-50', 'dark:hover:bg-gray-600');
        } else {
            button.classList.remove('active', 'bg-primary-500', 'text-white');
            button.classList.add('bg-white', 'dark:bg-gray-700', 'text-secondary-700', 'dark:text-gray-300', 'hover:bg-primary-50', 'dark:hover:bg-gray-600');
        }
    }

    /**
     * Shows or hides a portfolio item with animation.
     * @param {HTMLElement} item - The portfolio item element.
     * @param {boolean} show - Whether to show or hide the item.
     * @param {number} delay - Delay before starting the animation.
     */
    function animatePortfolioItem(item, show, delay = 0) {
        if (show) {
            item.classList.remove('hidden');
            setTimeout(() => {
                item.classList.remove('opacity-0', 'scale-95');
                item.classList.add('opacity-100', 'scale-100');
            }, delay);
        } else {
            item.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                item.classList.add('hidden');
            }, ANIMATION_DURATION_MS); // Match transition duration
        }
    }

    /**
     * Applies the selected filter to the portfolio items.
     * @param {string} filterValue - The category to filter by ('all' or specific category).
     */
    function applyPortfolioFilter(filterValue) {
        portfolioItems.forEach(item => {
            const itemCategory = item.getAttribute('data-category');
            const matchesFilter = (filterValue === 'all' || itemCategory === filterValue);
            animatePortfolioItem(item, matchesFilter, ITEM_ANIMATION_DELAY_MS);
        });
    }

    /**
     * Initializes filter button event listeners.
     */
    function initializeFilterButtons() {
        if (filterBtns.length === 0) return;

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => styleFilterButton(b, false)); // Deactivate all
                styleFilterButton(this, true); // Activate clicked
                
                const filterValue = this.getAttribute('data-filter');
                applyPortfolioFilter(filterValue);
            });
        });
    }

    /**
     * Opens the project details modal with animation.
     */
    function openModal() {
        if (!modal || !modalOverlay || !modalContainer) return;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
        setTimeout(() => {
            modalOverlay.classList.add('opacity-100');
            modalContainer.classList.remove('scale-90', 'opacity-0');
            modalContainer.classList.add('scale-100', 'opacity-100');
        }, 10); // Short delay for CSS transition to catch up
    }

    /**
     * Closes the project details modal with animation.
     */
    function closeModal() {
        if (!modal || !modalOverlay || !modalContainer || modal.classList.contains('hidden')) return;
        modalOverlay.classList.remove('opacity-100');
        modalContainer.classList.remove('scale-100', 'opacity-100');
        modalContainer.classList.add('scale-90', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = ''; // Restore background scrolling
        }, ANIMATION_DURATION_MS);
    }

    /**
     * Initializes modal event listeners (close button, overlay click, Escape key).
     */
    function initializeModalEventListeners() {
        if (modalClose) modalClose.addEventListener('click', closeModal);
        if (modalOverlay) modalOverlay.addEventListener('click', closeModal);
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });

        if (modalContactBtn) {
            modalContactBtn.addEventListener('click', closeModal); // Closes modal before navigating
        }
    }
    
    /**
     * Populates and opens the project modal. Exposed globally.
     * @param {string} title - Project title.
     * @param {string} imageSrc - Project image URL.
     * @param {string} descriptionHTML - Project description (HTML, line breaks as <br>).
     * @param {string} category - Project category.
     * @param {string} client - Client name.
     * @param {string} year - Project year.
     * @param {string} location - Project location.
     * @param {string} area - Project area.
     */
    window.openProjectModal = function(title, imageSrc, descriptionHTML, category, client, year, location, area) {
        // Guard clauses for all modal content elements
        if (!modalTitle || !modalImage || !modalCategory || !modalDescription || 
            !modalClient || !modalYear || !modalLocation || !modalArea) {
            console.error("One or more modal elements are not found in the DOM.");
            return;
        }

        modalTitle.textContent = title || '';
        modalImage.src = imageSrc || '';
        modalImage.alt = title || 'Project Image';
        modalCategory.textContent = category || '';
        modalDescription.innerHTML = descriptionHTML ? descriptionHTML.replace(/\n/g, '<br>') : '';
        modalClient.textContent = client || '';
        modalYear.textContent = year || '';
        modalLocation.textContent = location || '';
        modalArea.textContent = area || '';
        
        openModal();
    };

    /**
     * Animates the initial display of portfolio items.
     */
    function animateInitialPortfolioItems() {
        if (portfolioItems.length === 0) return;
        portfolioItems.forEach((item, index) => {
            // Ensure items are visible before animation starts if they were hidden by default
            item.classList.remove('hidden'); 
            animatePortfolioItem(item, true, ITEM_ANIMATION_DELAY_MS * (index + 1));
        });
    }

    // Initialize all functionalities
    initializeFilterButtons();
    initializeModalEventListeners();
    animateInitialPortfolioItems();
});
