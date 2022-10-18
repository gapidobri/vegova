function sestavi(nizi, vzorci) {
  let niz = "";
  for (let i = 0; i < vzorci; i++) {
    const rand = Math.round(Math.random() * vzorci - 1);
    niz += nizi[rand];
  }
  return niz;
}

const niz = sestavi(["asdas", "jsdgdf", "dsfjisdj", "dfkdkfod"], 3);
console.log(niz);
