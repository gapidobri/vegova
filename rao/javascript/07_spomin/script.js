const canvas = document.getElementsByTagName('canvas')[0];
const context = canvas.getContext('2d');

const count = 5;

draw();
window.addEventListener('resize', draw);

function draw() {
  const width = window.innerWidth * window.devicePixelRatio;
  const height = window.innerHeight * window.devicePixelRatio;
  context.canvas.width = width;
  context.canvas.height = height;

  const fieldSize = height * 0.5;
  const tileSize = fieldSize / count;

  for (let i = 0; i < count; i++) {
    for (let j = 0; j < count; j++) {
      context.fillRect(
        j * (tileSize + 30) + (width - fieldSize) / 2,
        i * (tileSize + 30) + (height - fieldSize) / 2,
        tileSize,
        tileSize,
      );
    }
  }
}
