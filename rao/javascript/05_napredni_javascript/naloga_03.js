function diamant(n) {
  if (n <= 0) return;
  let inc = 1;
  for (let i = 0; i >= 0; i += inc) {
    for (let j = n - i; j > 0; j--) {
      process.stdout.write(" ");
    }
    for (let j = 0; j < i * 2 + 1; j++) {
      process.stdout.write("*");
    }
    process.stdout.write("\n");
    if (i + 1 == n) {
      inc = -1;
    }
  }
}

diamant(3);
