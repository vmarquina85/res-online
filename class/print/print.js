// patron strategy
class printReport {
  constructor(type,contenido=""){
    this.type=type;
    this.contenido=contenido;
  }
  // metodos de la interfaz
  setContenido() {
    this.contenido=this.type.setContenidoType();
  }
  printContenido(){
    var ventana = window.open('','PRINT','height=400,width=600');
    ventana.document.write('<html><head><style>table{border: 1px solid gray ;border-collapse:collapse;margin-right: auto;margin-left: auto;}td{border: 1px solid gray ;padding:3px;}th{border: 1px solid gray;padding:3px;}</style><head><body><div>')
    ventana.document.write(this.contenido);
    ventana.document.write('</div></body></html>');
    ventana.document.close();
    ventana.focus();
    ventana.print();
    ventana.close()
  }
}
const reporteCentro={
  setContenidoType: function(){
    var data=document.getElementById('tb_comp_I11').innerHTML;
     return data
  }
};
const reporteMes={
  setContenidoType: function(){
    var data=document.getElementById('tb_comp_I21').innerHTML;
     return data
  }
};
const reporteEspecialidad={
  setContenidoType: function(){
    var data=document.getElementById('tb_comp_I31').innerHTML;;
    return data
  }
};
const reporteFecha={
  setContenidoType: function(){
    var data=document.getElementById('tb_comp_I41').innerHTML;
     return data
   }
};
const reporteFecha2={
  setContenidoType: function(){
    var data=document.getElementById('tb_comp_I51').innerHTML;;
     return data
   }
};
