const krog = { x: 25, y: 25 };

function draw(r) {
  for (let y = 0; y < 50; y++) {
    for (let x = 0; x < 50; x++) {
      const dist = Math.round(
        Math.sqrt(Math.pow(krog.x - x, 2) + Math.pow(krog.y - y, 2))
      );
      if (dist < r) {
        process.stdout.write("* ");
      } else {
        process.stdout.write("  ");
      }
    }
    process.stdout.write("\n");
  }
}

draw(3);
