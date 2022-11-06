for (let i = 0; i < 10; i++) {
  console.log(i);

  const node = document.createElement('span');
  node.appendChild(document.createTextNode(i));

  const colorHex = Math.floor(Math.random() * 0xffffff).toString(16);
  node.style.color = '#' + colorHex;

  document.body.appendChild(node);
}
