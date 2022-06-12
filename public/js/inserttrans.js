function myFunction() {
    var x = document.getElementById("inputtrans").value;
    var y = document.getElementById("inputfee").value;
    xx = parseInt(x);
    yy = parseInt(y);

    if (xx == null && yy != null)
    {
        total = -yy;
        document.getElementById("total").innerHTML = "Rp." + total;
    }
    if (xx != null && yy == null)
    {
        total = xx;
        document.getElementById("total").innerHTML = "Rp." + total;
    }
    else
    {
        total = xx-yy;
        document.getElementById("total").innerHTML = "Rp." + total;
    }

  }
