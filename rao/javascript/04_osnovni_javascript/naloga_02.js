let number;

while (true) {
  const input = prompt('Vpiši število');

  number = parseInt(input);

  if (!isNaN(number)) break;
}

let pra = false;
for (let i = 2; i < number; i++) {
  if (number % i !== 0) {
    pra = true;
    break;
  }
}

console.log(`Število ${number} ${pra ? 'je' : 'ni'} praštevilo`);
