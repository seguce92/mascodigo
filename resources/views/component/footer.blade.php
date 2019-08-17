<footer class="h-64" style="background:#880e4f">
</footer>

<script>
  var navMenuDiv = document.getElementById("nav-content");
  var navMenu = document.getElementById("nav-toggle");
  document.onclick = check;
  function check(e) {
    var target = (e && e.target) || (event && event.srcElement);
    if (!checkParent(target, navMenuDiv)) {
      if (checkParent(target, navMenu)) {
        if (navMenuDiv.classList.contains("hidden")) {
          navMenuDiv.classList.remove("hidden");
          navMenu.classList.add("change");
        } else {
          navMenuDiv.classList.add("hidden");
          navMenu.classList.remove("change")
        }
      } else {
        navMenuDiv.classList.add("hidden");
        navMenu.classList.remove("change")
      }
    }
  }
  function checkParent(t, elm) {
    while(t.parentNode) {
      if( t == elm ) {return true;}
      t = t.parentNode;
    }
    return false;
  }
</script>