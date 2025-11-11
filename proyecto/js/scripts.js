// Toggle sidebar
const toggleBtn = document.querySelector('.toggleSidebar');
  const sidebar = document.querySelector('.sidebar');

  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
  });

//Remove Item from list