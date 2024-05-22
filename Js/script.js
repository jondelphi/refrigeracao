let arr= new Array();
function montalista(d)
{
arr.push(d)    
console.log(arr)
var id = 'a'+d+'a'
let obj = document.getElementById(id).classList

obj.remove('btn-secondary')
obj.add('btn-primary')

}

function next(d)
{
    if (d.length>0) {
        let lista =d
        let ordem=''
        for (i =0;i < lista.length;i++){
            ordem=ordem+' tbproduto.codigo = \''+lista[i]+ '\' or '
        }
      ordem=ordem.substring(0,(ordem.length-3))
    window.location.href="modificado.php?lista="+d;
      
    }else{
        alert("Não tem opção definida");
    }

   
}

