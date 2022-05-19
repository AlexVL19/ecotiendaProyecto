var boton =
document.querySelectorAll('#addProduct');
boton.forEach(add =>
    add.addEventListener('click', ()=>
    multiplicar()
    ));

function multiplicar(){
    var n1 = document.getElementById("quantity").value;
    var n2 = document.getElementById("cost").value;
    var result = document.getElementById("final_cost");
    var n3 = n1 * n2;
    result.value = n3;
}
