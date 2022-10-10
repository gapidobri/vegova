const input = prompt('Vpiši število');

let sum = 0;
for (let i = 0; i < input.length; i++) {
  sum += parseInt(input[i]);
}

console.log(`Seštevek števk je ${sum}`);
