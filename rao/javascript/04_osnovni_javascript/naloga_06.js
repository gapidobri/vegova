const arr1 = '31ca'.split('');
const arr2 = '57db'.split('');

let sum = '';
while (arr1.length || arr2.length) {
  sum += arr1.shift();
  sum += arr2.shift();
}

console.log(sum);
