const images = document.getElementsByClassName('image');
const texts = document.getElementsByClassName('text');

for (const image of images) {
  image.style.border = '3px black solid';
}

const fonts = ['Times New Roman', 'Courier New', 'Arial'];

for (const text of texts) {
  text.style.fontFamily = fonts[Math.floor(Math.random() * 3)];
}

const image2 = document.getElementById('image-2');
image2.width = image2.width / 2;
