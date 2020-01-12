function mydisplay() {
  var x = document.getElementById("form_comment");
    x.style.display = "block";
}
function hide() {
    var x = document.getElementById("form_comment");
    x.style.display = "none";
}

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}

var mod = document.getElementsByClassName("mod");
var j;

for (j = 0; j < mod.length; j++) {
  mod[j].addEventListener("mouseover", function() {
    this.classList.toggle("active");
    var mod_content = this.nextElementSibling;
    if (mod_content.style.display === "block") {
      mod_content.style.display = "none";
    } else {
      mod_content.style.display = "block";
    }
  });

  mod[j].addEventListener("mouseout", function() {
    this.classList.toggle("active");
    var mod_content = this.nextElementSibling;
    if (mod_content.style.display === "block") {
      mod_content.style.display = "none";
    } else {
      mod_content.style.display = "block";
    }
  });
  
}
