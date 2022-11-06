const form = document.getElementById('form');

const username = 'username';
const password = 'password';

form.addEventListener('submit', (event) => {
  event.preventDefault();
  const data = new FormData(form);

  if (data.get('username') === username && data.get('password') === password) {
    document.body.style.backgroundColor = 'lightgreen';
  } else {
    document.body.style.backgroundColor = 'red';
  }
});
