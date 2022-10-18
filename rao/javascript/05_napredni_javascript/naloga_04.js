class Avto {
  constructor(lastnik, konjskaMoc, cena, barva) {
    this.lastnik = lastnik;
    this.konjskaMoc = konjskaMoc;
    this.cena = cena;
    this.barva = barva;
  }

  mocNaCeno() {
    return this.konjskaMoc / this.cena;
  }
}

function primerjaj(avtomobili) {
  let najboljsi = avtomobili[0];
  for (const avto of avtomobili) {
    console.log(avto.mocNaCeno(), najboljsi.mocNaCeno());
    if (avto.mocNaCeno() > najboljsi.mocNaCeno()) {
      najboljsi = avto;
    }
  }
  return najboljsi;
}

const avti = [
  new Avto("Lastnik 1", 200, 130, "Rdeč"),
  new Avto("Lastnik 2", 150, 120, "Moder"),
  new Avto("Lastnik 3", 70, 120, "Zelen"),
  new Avto("Lastnik 4", 150, 80, "Rumen"),
];

console.log(primerjaj(avti));
