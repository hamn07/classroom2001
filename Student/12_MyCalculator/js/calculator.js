// x op y = result;
var x = "";
var op = ""; //operator, ex: + - * /
var y = "";
var result = "";
window.onload = function() {
    var symbols = ['c', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '*', '+', '-', '='];
    for (i = 0; i < symbols.length; i++) {
        var symbol = symbols[i];
        // init button obj, set id, value, text
        var btn = document.createElement("button");
        var t = document.createTextNode(symbol);
        btn.appendChild(t);
        btn.value = symbol;
        btn.id = symbol;
        // click event
        btn.addEventListener("click", function(e) {
            // 運算元處理
            if (isNaN(this.value)) {

                if (x != "" && y != "") {
                    if (op == "+") {
                        result = Number(x) + Number(y);
                        x = result;
                        y = "";
                    } else if (op == "-") {
                        result = Number(x) - Number(y);
                        x = result;
                        y = "";
                    } else if (op == "*") {
                        result = Number(x) * Number(y);
                        x = result;
                        y = "";
                    }
                }

                if (this.value == "=") {
                    op = "";
                    x = "";
                    y = "";
                }
                else if (this.value == "c"){
                    op = "";
                    x = "";
                    y = "";
                    result ="";
                }
                else if (x != "") {
                    op = this.value;
                }
                // 數字處理
            } else {
                if (op == "") {
                    x = x + this.value;
                } else {
                    y = y + this.value;
                }
            }
            document.getElementById("px").innerHTML = x;
            document.getElementById("pop").innerHTML = op;
            document.getElementById("py").innerHTML = y;
			document.getElementById("presult").innerHTML = result;


        }, false);
        // append to div
        document.getElementById("calFrame").appendChild(btn);
    }
};
