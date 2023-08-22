import "./bootstrap";

const doorButton = document.querySelector('.door-button');
const doorIcon = document.querySelector('.door-icon');

doorButton.addEventListener('mouseover', () => {
  const doorIcon = document.querySelector('.door-icon');
  doorIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open door-icon" viewBox="0 0 16 16"> <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/> <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/> </svg>';
});

doorButton.addEventListener('mouseout', () => {
  const doorIcon = document.querySelector('.door-icon');
  doorIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="door-icon" viewBox="0 0 16 16"> <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/> <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/> </svg>';
});
