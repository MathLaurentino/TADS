$("#submit").on("click", function(){
    calculoPreco();
});


function calculoPreco(){
        const valor = $("#valor").val();
        const quantidade = $("#quantidade").val()
        const labelPreco = $("#preco");

        const preco = valor * quantidade;
        // alert(preco);
        $("#preco").text(preco);
        $("#preco").css("background-color", "lightgreen");
        // labelPreco.innerText = preco;
}



