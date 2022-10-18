function vTabelo(stev, smer, zamik) {
  const tab = stev
    .toString()
    .split("")
    .map((e) => parseInt(e));
  for (let i = 0; i < zamik; i++) {
    if (smer === "l") tab.unshift(tab.pop());
    else if (smer === "d") tab.push(tab.shift());
  }
  return tab;
}

const num = 1234;
const tab = vTabelo(num, "d", 1);

console.log(tab);
