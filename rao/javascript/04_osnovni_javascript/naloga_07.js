function fibonaci(n) {
  if (n <= 2) return 1;
  return fibonaci(n - 2) + fibonaci(n - 1);
}
