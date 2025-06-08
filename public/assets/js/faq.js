// FAQ interactivity: category switching & accordion
// Vanilla JS, modular, no redundancy

document.addEventListener('DOMContentLoaded', function () {
  // Category switching
  document.querySelectorAll('.faq-category').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.querySelectorAll('.faq-category').forEach(function (b) {
        b.classList.remove('bg-primary-500', 'text-white');
        b.classList.add('text-gray-300');
      });
      btn.classList.add('bg-primary-500', 'text-white');
      btn.classList.remove('text-gray-300');
      var cat = btn.getAttribute('data-category');
      document.querySelectorAll('.faq-panel').forEach(function (panel) {
        panel.classList.toggle('hidden', panel.getAttribute('data-category') !== cat);
      });
    });
  });
  // Accordion
  document.querySelectorAll('.faq-question').forEach(function (q) {
    q.addEventListener('click', function () {
      var answer = q.parentElement.querySelector('.faq-answer');
      if (answer) {
        answer.classList.toggle('hidden');
        var icon = q.querySelector('.faq-toggle-icon');
        if (icon) icon.classList.toggle('rotate-180');
      }
    });
  });
});
