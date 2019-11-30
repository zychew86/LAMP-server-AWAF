// insert img tags with random parameter to avoid browser caching
function rnd_string() {
  var chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  var ret;
  for (r=0; r<10; r++) {
      ret += chars.charAt(Math.floor(Math.random() * chars.length));
  }
  return ret;
}
