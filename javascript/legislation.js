document.addEventListener('DOMContentLoaded', function () {
const toggleMoreLinks = document.querySelectorAll('.toggle-more');

toggleMoreLinks.forEach(link => {
  link.addEventListener('click', function (e) {
    e.preventDefault();
    
    const targetId = this.getAttribute('data-target');
    const targetCard = document.getElementById(targetId);

    const isExpanded = targetCard.classList.contains('expanded');
    document.querySelectorAll('.legislation-card').forEach(card => {
      card.classList.remove('expanded');
      card.classList.remove('shrink');
    });

    if (!isExpanded) {
      targetCard.classList.add('expanded');
      document.querySelectorAll('.legislation-card').forEach(card => {
        if (card !== targetCard) {
          card.classList.add('shrink');
        }
      });
      this.textContent = 'See Less';
    } else {
      this.textContent = 'See More';
    }
  });
});
});