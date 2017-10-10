//produtos
function p1()
{
    document.getElementsByName("oper")[1].value = "I";
    document.getElementsByName("idp")[1].value = "";
    document.getElementById("produto").value = "";
    document.getElementById("custo").value = "";
    document.getElementById("venda").value = "";
    document.getElementById("produto").placeholder = "";
    document.getElementById("custo").placeholder = "";
    document.getElementById("venda").placeholder = "";
    document.getElementById("0").selected = "true";
}
function p2(idP, prod, custo, valor, categoria){
    document.getElementsByName("oper")[1].value = "A";
    document.getElementsByName("idp")[1].value = idP;
    document.getElementById("produto").value = prod;
    document.getElementById("produto").placeholder = prod;
    document.getElementById("custo").value = custo;
    document.getElementById("custo").placeholder = custo;
    document.getElementById("venda").value = valor;
    document.getElementById("venda").placeholder = valor;
    document.getElementById(categoria).selected ="true";
}
function p3(e) {
    var id = e;
    document.getElementsByName("idp")[0].value = id;
    document.getElementsByName("oper")[0].value = "E";
}


//categorias
function c1()
{
    document.getElementById("oper").value = "I";
    document.getElementById("id").value = "";
    document.getElementById("desc").value = "";
    document.getElementById("desc").placeholder = "";
}
function c2(e,cat){
    var id = e;
    var desc = cat;
    document.getElementById("id").value = id;
    document.getElementById("desc").value = desc;
    document.getElementById("desc").placeholder = desc;
    document.getElementById("oper").value = "A";
}
function c3(e) {
    var id = e;
    document.getElementsByName("id")[1].value = id;
    document.getElementsByName("oper")[1].value = "E";
}

//usuarios
function u1()
{
    document.getElementsByName("oper")[1].value = "I";
    document.getElementsByName("idu")[1].value = "";
    document.getElementById("nome").value = "";
    document.getElementById("login").value = "";
    document.getElementById("senha").value = "";
    document.getElementById("login").placeholder = "";
    document.getElementById("nome").placeholder = "";
    document.getElementById("0").selected = "true";
}
function u2(senha){
    document.getElementById("senhau").value = senha;
}
function u3(e) {
    var id = e;
    document.getElementsByName("idu")[0].value = id;
    document.getElementsByName("oper")[0].value = "E";
}

//Venda Produto
function vP(idP, preco) {
    document.getElementById("idP").value = idP;
    document.getElementById("preco").value = preco;
}