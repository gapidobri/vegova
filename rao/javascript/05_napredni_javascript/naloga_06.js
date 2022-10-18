class Lik {
  ploscina() {}
}

class Pravokotnik extends Lik {
  /**
   * @param {number} a
   */
  set a(a) {
    this.a = a;
  }

  get a() {
    return this.a;
  }

  /**
   * @param {number} b
   */
  set b(b) {
    this.b = b;
  }

  get b() {
    return this.b;
  }

  ploscina() {
    return this.a * this.b;
  }
}

class Krog extends Lik {
  /**
   * @param {number} polmer
   */
  set polmer(polmer) {
    this.polmer = polmer;
  }

  get polmer() {
    return this.polmer;
  }

  /**
   * @param {number} premer
   */
  set premer(premer) {
    this.polmer = premer / 2;
  }

  get premer() {
    return this.polmer * 2;
  }

  ploscina() {
    return 2 * Math.PI * Math.pow(this.polmer, 2);
  }
}
