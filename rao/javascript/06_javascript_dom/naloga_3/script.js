const button = document.getElementById('button');

button.style.position = 'absolute';

button.addEventListener('mouseover', () => {
  button.style.left =
    Math.random() * (window.innerWidth - button.offsetWidth) + 'px';
  button.style.top =
    Math.random() * (window.innerHeight - button.offsetHeight) + 'px';
});

button.addEventListener('click', () => {
  document.body.style.backgroundColor = 'lightgreen';
});
