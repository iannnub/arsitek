// assets/js/content-toggle.js
document.addEventListener('DOMContentLoaded', () => {
    // --- Element Selection ---
    const btnLayanan = document.getElementById('btn-layanan');
    const btnPencapaian = document.getElementById('btn-pencapaian');
    const panelLayanan = document.getElementById('panel-layanan');
    const panelPencapaian = document.getElementById('panel-pencapaian');

    // --- Initial Check ---
    if (!btnLayanan || !btnPencapaian || !panelLayanan || !panelPencapaian) {
        console.warn('Content toggle elements not found. Ensure IDs are correct: btn-layanan, btn-pencapaian, panel-layanan, panel-pencapaian.');
        return;
    }

    // --- Styling and Visibility Functions ---

    /**
     * Styles a button as active or inactive.
     * @param {HTMLElement} button - The button element to style.
     * @param {boolean} isActive - True if the button should be styled as active, false for inactive.
     */
    function styleButton(button, isActive) {
        if (isActive) {
            button.classList.add('bg-emerald-500', 'text-white');
            button.classList.remove('text-gray-300', 'hover:text-white');
        } else {
            button.classList.remove('bg-emerald-500', 'text-white');
            button.classList.add('text-gray-300', 'hover:text-white');
        }
    }

    /**
     * Shows one panel and hides another.
     * @param {HTMLElement} panelToShow - The panel to make visible.
     * @param {HTMLElement} panelToHide - The panel to hide.
     */
    function togglePanelVisibility(panelToShow, panelToHide) {
        panelToShow.classList.remove('hidden');
        panelToHide.classList.add('hidden');
    }

    // --- Core Tab Activation Logic ---

    /**
     * Activates a specific tab, styling buttons and showing the corresponding panel.
     * @param {HTMLElement} buttonToActivate - The button for the tab to activate.
     * @param {HTMLElement} buttonToDeactivate - The button for the tab to deactivate.
     * @param {HTMLElement} panelToShow - The panel to display.
     * @param {HTMLElement} panelToHide - The panel to conceal.
     * @param {boolean} [initializeCountersInPanel=false] - Whether to initialize counters in the panel being shown.
     */
    function activateTab(buttonToActivate, buttonToDeactivate, panelToShow, panelToHide, initializeCountersInPanel = false) {
        styleButton(buttonToActivate, true);
        styleButton(buttonToDeactivate, false);
        togglePanelVisibility(panelToShow, panelToHide);

        if (initializeCountersInPanel && typeof initializeCounters === 'function') {
            initializeCounters(panelToShow);
        }
    }

    // --- Event Listener Initialization ---

    /**
     * Sets up event listeners for the toggle buttons.
     */
    function initializeToggleControls() {
        btnLayanan.addEventListener('click', () => {
            activateTab(btnLayanan, btnPencapaian, panelLayanan, panelPencapaian);
        });

        btnPencapaian.addEventListener('click', () => {
            activateTab(btnPencapaian, btnLayanan, panelPencapaian, panelLayanan, true);
        });
    }

    // --- Initial State Setup ---

    /**
     * Sets the initial active tab when the page loads.
     * Defaults to 'Layanan' being active.
     */
    function setInitialState() {
        activateTab(btnLayanan, btnPencapaian, panelLayanan, panelPencapaian);
    }

    // --- Initialization ---
    initializeToggleControls();
    setInitialState();
});
