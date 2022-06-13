
function myFunction() {
    var x = document.getElementById("inputtrans").value;
    var y = document.getElementById("inputfee").value;
    xx = parseInt(x);
    yy = parseInt(y);

    total = xx-yy;
    document.getElementById("total").innerHTML = "Rp. " + total;
    // document.getElementById("total").innerHTML = "Rp." + xx + " " + yy;

    // if (isNull(x) && !isNull(y))
    // {
    //     // total = -yy;
    //     document.getElementById("total").innerHTML = "Rp. " + xx;
    // }
    // else if (!isNull(x) && isNull(y))
    // {
    //     // total = xx;

    //     document.getElementById("total").innerHTML = "Rp. " + yy;
    // }
    // else if (xx != NaN && yy != NaN)
    // {
    //     total = xx-yy;
    //     document.getElementById("total").innerHTML = "Rp. " + total;
    // }

    // document.getElementById("total").innerHTML = "Rp. " + total;

  }
