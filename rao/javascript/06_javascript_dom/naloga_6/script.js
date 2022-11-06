const doors = Array.from(document.getElementsByClassName('door'));
const roomNumber = document.getElementById('room-number');
const message = document.getElementById('message');
const checkpointText = document.getElementById('checkpoint');

const catUrl =
  'https://images.unsplash.com/photo-1573865526739-10659fec78a5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=830&q=80';
const rooms = [
  ['cat', 'next', 'reset'],
  ['reset', 'reset', 'next'],
  ['checkpoint', 'reset', 'reset'],
  ['reset', 'cat', 'next'],
  ['reset', 'next', 'reset'],
  ['cat', 'reset', 'next'],
];

let room = 0;
let checkpoint = 0;

doors.forEach((door, i) => {
  door.addEventListener('click', () => {
    doors.forEach((door) => {
      door.style.backgroundImage = '';
      door.style.backgroundColor =
        '#' + Math.floor(Math.random() * 0xffffff).toString(16);
    });

    switch (rooms[room][i]) {
      case 'cat':
        door.style.backgroundImage = `url("${catUrl}")`;
        message.innerText = 'Našel si sliko mačke!';
        break;
      case 'next':
        room++;
        message.innerText = 'Pravilna vrata!';
        break;
      case 'checkpoint':
        room++;
        checkpoint = room;
        message.innerText = 'Našel si checkpoint';
        break;
      case 'reset':
        room = checkpoint;
        message.innerText = 'Poskusi znova';
        break;
    }

    if (room === rooms.length) {
      message.innerText = 'Zmagal si';
      alert('Zmagal si!');
      room = 0;
      checkpoint = 0;
    }

    roomNumber.innerText = room + 1;
    checkpointText.innerText = checkpoint + 1;
  });
});
