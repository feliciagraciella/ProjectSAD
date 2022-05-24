@include('header')
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href={{ asset('css/product.css') }} type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script type="text/javascript" src={{ asset('js/product.js') }}></script>


    <style>
        /*the container must be positioned relative:*/
        .custom-select {
          position: relative;
          font-family: Arial;
        }

        .custom-select select {
          display: none; /*hide original SELECT element:*/
        }

        .select-selected {
          background-color: white;
        }

        /*style the arrow inside the select element:*/
        .select-selected:after {
          position: absolute;
          content: "";
          /* top: 14px; */
          right: 10px;
          width: 0;
          height: 0;
        }

        /*point the arrow upwards when the select box is open (active):*/
        .select-selected.select-arrow-active:after {
          border-color: transparent transparent #fff transparent;
          /* top: 7px; */
        }

        /*style the items (options), including the selected item:*/
        .select-items div,.select-selected {
          color: black;
          padding: 8px 16px;
          cursor: pointer;
          user-select: none;
        }

        /*style items (options):*/
        .select-items {
          position: absolute;
          background-color: white;
          top: 100%;
          left: 0;
          right: 0;
          z-index: 99;
        }

        /*hide the items when the select box is closed:*/
        .select-hide {
          display: none;
        }

        .select-items div:hover, .same-as-selected {
          background-color: rgba(0, 0, 0, 0.1);
        }
        </style>

</head>

<body>
    <h5 class=title>Products List</h5>
    <div class="butinsertproduct">
        <a href="/insertproduct"><button type="button" class="btn btn-outline-secondary btn-sm" style="text-transform: unset !important; ">Insert Product <span class="iconify" data-icon="akar-icons:circle-plus-fill"></span></button></a>
    </div>
    <div class="baris1">

        {{-- <div class="dropdown-show2">
            <a class="btn btn-sm dropdown-toggle dropdown-toggle-split" href="#"
                style="text-transform:unset !important; width: 150px; " role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sort By
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" style="font-size: smaller;" href="#">Price</a>
                <a class="dropdown-item" style="font-size: smaller;" href="#">Qty</a>
                <a class="dropdown-item" style="font-size: smaller;" href="#">Size</a>
            </div>
        </div> --}}


        <div class="custom-select" style="width:200px;">
            <select class="btn-sm ">
              <option value="0">Select car:</option>
              <option value="1">Audi</option>
              <option value="2">BMW</option>
            </select>
        </div>

        <script>
            var x, i, j, l, ll, selElmnt, a, b, c;
            /*look for any elements with the class "custom-select":*/
            x = document.getElementsByClassName("custom-select");
            l = x.length;
            for (i = 0; i < l; i++) {
              selElmnt = x[i].getElementsByTagName("select")[0];
              ll = selElmnt.length;
              /*for each element, create a new DIV that will act as the selected item:*/
              a = document.createElement("DIV");
              a.setAttribute("class", "select-selected");
              a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
              x[i].appendChild(a);
              /*for each element, create a new DIV that will contain the option list:*/
              b = document.createElement("DIV");
              b.setAttribute("class", "select-items select-hide");
              for (j = 1; j < ll; j++) {
                /*for each option in the original select element,
                create a new DIV that will act as an option item:*/
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function(e) {
                    /*when an item is clicked, update the original select box,
                    and the selected item:*/
                    var y, i, k, s, h, sl, yl;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    sl = s.length;
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < sl; i++) {
                      if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                          y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                      }
                    }
                    h.click();
                });
                b.appendChild(c);
              }
              x[i].appendChild(b);
              a.addEventListener("click", function(e) {
                  /*when the select box is clicked, close any other select boxes,
                  and open/close the current select box:*/
                  e.stopPropagation();
                  closeAllSelect(this);
                  this.nextSibling.classList.toggle("select-hide");
                  this.classList.toggle("select-arrow-active");
                });
            }
            function closeAllSelect(elmnt) {
              /*a function that will close all select boxes in the document,
              except the current select box:*/
              var x, y, i, xl, yl, arrNo = [];
              x = document.getElementsByClassName("select-items");
              y = document.getElementsByClassName("select-selected");
              xl = x.length;
              yl = y.length;
              for (i = 0; i < yl; i++) {
                if (elmnt == y[i]) {
                  arrNo.push(i)
                } else {
                  y[i].classList.remove("select-arrow-active");
                }
              }
              for (i = 0; i < xl; i++) {
                if (arrNo.indexOf(i)) {
                  x[i].classList.add("select-hide");
                }
              }
            }
            /*if the user clicks anywhere outside the select box,
            then close all select boxes:*/
            document.addEventListener("click", closeAllSelect);
            </script>

        <a class="viewcat" href="/category">View Category</a>
    </div>

    <div class=table>
        <table class="table table-hover" style="width: 70%; position: absolute; left: 320px; top: 250px;">
            <thead>
                <tr>
                    <th scope="col" style="font-weight: 700; text-align:left;">Photo</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">SKU Product</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Category</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Product Name</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Qty</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Size</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Price</th>
                    <th scope="col" style="font-weight: 700; text-align:left;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $p)
                <tr>
                    <td style="text-align:center"><img src="../images/best/{{$p->SKU}}.jpg" alt="" height=70></td>
                    <td style="font-weight: 600; text-align:left;">{{$p->SKU}}</td>
                    <td style="font-weight: 600; text-align:left;">{{$p->ID_CATEGORY}}</td>
                    <td style="font-weight: 600; text-align:left;">{{$p->P_NAME}}</td>
                    <td style="font-weight: 600; text-align:left;">{{$p->STOCK}}</td>
                    <td style="font-weight: 600; text-align:left;">{{$p->SIZE}} ml</td>
                    <td style="font-weight: 600; text-align:left;">Rp {{$p->PRICE}}</td>
                    <td style="font-weight: 600; text-align:left; width: 10%;"><span style="text-align:center;"
                            class="close">&#10005;</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
