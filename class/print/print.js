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
  // printContenido(){
  //   this.type.printContenidoType();
  // }
}
const reporteCentro={
  setContenidoType: function(){var data=printC; return data},
  printContenidoType: function(){window.print();}
};
const reporteMes={
  setContenidoType: function(){var data=printM; return data},
  printContenidoType: function(){window.print();}
};
const reporteFecha={
  setContenidoType: function(){var data=printF; return data},
  printContenidoType: function(){window.print();}
};
const reporteEspecialidad={
  setContenidoType: function(){var data=printE; return data},
  printContenidoType: function(){window.print();}
};
