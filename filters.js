    var filter = document.querySelector("select.data");
    var num = document.querySelectorAll("ul.item li");
    
    filter.addEventListener("change", () => {
      var items = document.querySelector("select.data option:checked").getAttribute("data-filter");
      console.log(items);

      var text = document.getElementById("product").textContent;
      var reItems = text.replace(text,items);
    
      document.getElementById("product").innerHTML = reItems;

      for (var j = 0; j < num.length; j++) {
        var val = num[j].getAttribute("data-category");
        console.log(val);
    
        if ((items == val)||(items == "All")) {
              num[j].style.display = "inline-block";
        } else {
              num[j].style.display = "none";
      }
      }
    });
    
