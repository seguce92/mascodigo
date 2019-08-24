<footer class="h-64" style="background:#880e4f">
  asldkañlskd
</footer>

<!--script>
  var navMenuDiv = document.getElementById("nav-content");
  var navMenu = document.getElementById("nav-toggle");
  document.onclick = check;
  function check(e) {
    var target = (e && e.target) || (event && event.srcElement);
    //if (!checkParent(target, navMenuDiv)) {
      
      //if (checkParent(target, navMenu)) {
        console.log(navMenuDiv.classList)
        if (navMenuDiv.classList.contains("hidden")) {
          console.log("content")
          navMenuDiv.classList.toggle("hidden");
          navMenu.classList.toggle("change");
        } else {
          console.log("content no")
          navMenuDiv.classList.toggle("hidden");
          navMenu.classList.toggle("change")
        }
      /*} else {
        navMenuDiv.classList.add("hidden");
        navMenu.classList.remove("change")
      }
    //}*/
  }
  function checkParent(t, elm) {
    while(t.parentNode) {
      if( t == elm ) {return true;}
      t = t.parentNode;
    }
    return false;
  }
</script-->