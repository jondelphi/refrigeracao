
function CriaRequest(){
    var httpRequest;
if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    httpRequest = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
}
return httpRequest;
}

function grafico(lista) {

    
    // Declaração de Variáveis
 
    var result = document.getElementById("chart");
    var xmlreq = CriaRequest();
    let ordem='';
if(lista.length==0)
{
ordem='tbproduto.minestoque >0 and tbproduto.maxestoque>0';
}else{
    for (i =0;i < lista.length;i++){
        ordem=ordem+' tbproduto.codigo = \''+lista[i]+ '\' or '
    }
  ordem=ordem.substring(0,(ordem.length-3))
}

    // Exibi a imagem de progresso
   // result.innerHTML = '<img src="content/loading.gif" style="width:150px;">';

    // Iniciar uma requisição
    xmlreq.open('POST',"Controller/grafico.php",true);
    xmlreq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// especifica os dados que deseja enviar   
xmlreq.send("lista="+ordem);

console.log(ordem);
    // Atribui uma função para ser executada sempre que houver uma mudança de ado
    xmlreq.onreadystatechange = function(){

        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {
            console.log(ordem);
            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) {
                result.innerHTML = xmlreq.responseText;
                console.log(ordem);
            }else{
                result.innerHTML = "Erro: " + xmlreq.statusText;
            }
        }
    };
   
}
