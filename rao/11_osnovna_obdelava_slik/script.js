const canvas = document.getElementById('canvas');
canvas.width = innerWidth;
canvas.height = innerHeight;

const ctx = canvas.getContext('2d');

const image = new Image();
image.src = 'banana.png';

image.addEventListener('load', () => {
  ctx.drawImage(image, 0, 0, image.width, image.height);

  grayscale(image.width, 0);
  treshold(255 / 2, image.width * 2, 0);
});

function grayscale(x, y) {
  const imageData = ctx.getImageData(0, 0, image.width, image.height);

  let { data } = imageData;

  for (let i = 0; i < data.length; i += 4) {
    const v = data[i] * 0.3 + data[i + 1] * 0.59 + data[i + 2] * 0.11;
    data[i] = v;
    data[i + 1] = v;
    data[i + 2] = v;
  }

  ctx.putImageData(imageData, x, y);
}

function treshold(t, x, y) {
  const imageData = ctx.getImageData(0, 0, image.width, image.height);

  let { data } = imageData;

  for (let i = 0; i < data.length; i += 4) {
    const v = data[i] * 0.3 + data[i + 1] * 0.59 + data[i + 2] * 0.11;

    if (v > t) {
      data[i] = data[i + 1] = data[i + 2] = 0;
    } else {
      data[i] = data[i + 1] = data[i + 2] = 255;
    }
  }

  ctx.putImageData(imageData, x, y);
}
