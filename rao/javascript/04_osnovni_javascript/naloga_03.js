const sadezi = ['banana', 'jabolko', 'breskev', 'mandarina', 'paradižnik'];

let max = sadezi[0];
for (const sadez of sadezi) {
  console.log(`${sadez} ima dolžino ${sadez.length}`);
  if (sadez.length > max.length) {
    max = sadez;
  }
}

console.log(`Najdaljši sadež je ${max}`);
