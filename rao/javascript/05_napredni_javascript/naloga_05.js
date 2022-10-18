function starost(datum) {
  const now = new Date();
  let diff = new Date().getFullYear() - datum.getFullYear();
  if (
    now.getMonth() - datum.getMonth() < 0 ||
    now.getDay() - datum.getDay() < 0
  ) {
    diff--;
  }

  console.log(`Tvoja starost je ${diff} let`);
}

starost(new Date("2004-12-04"));
