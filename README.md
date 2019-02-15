## RES-ONLINE V 2.9.1
Repotes de Operaciones

>ChangeLog 2.9.1

* Se modifico la **clase Print** para que esta pueda imprimir el reporte en tiempo real (es decir, tomando los cambios del reporte en pantalla ej: ordenar tabla de Mayor a menor)
* se agregó el método **printContenido()** en la **clase print** para minimizar el uso de memoria al ejecutar la funcion Imprimir() en **redo1.js**
* Se agregó los años en el TOTAL DE INGRESOS, ahora el sistema mostrará **TOTAL DE INGRESOS [AÑO 1] y TOTAL DE INGRESOS [AÑO 2]** donde Año1 y Año2 serán los años colocados en la consulta.
* Se modifico la clase css **.table-responsive** en lo que respecta a height de Auto a 300px;
* Se optimizó funcion **KillerSession()** actualmente evalua si el usuario esta más de 19 min en estado inactivo (idle) antes de cerrar la sesión de forma automática
<<<<<<< HEAD
* Se revirtio problema de seguridad que impedía que el usuario ingresara al sistema.
=======
>>>>>>> 85aa5736e5f99e43851b09073221cc91e2fdd3c2

>ChangeLog 2.9:

* Se implementó la Impresión de Reportes según el tab seleccionado (creación de **clase print**)
* Cambios en el diseño del modulo Resumen de Operaciones (se reorganizaron los controles de búsqueda, y se agrego la opcion de "Ocultar Mensaje inicial")
* Se modificó el label de del checkbox **"fecha de actualización"** por **"Comparar Años a la Fecha"**
* Se agrego un tooltip explicativo para el checkbox **"Comparar Años a la Fecha"**
* Se modificó el evento click para el checkbox **"Comparar Años a la Fecha"** actualmente ya no permite que se ingresen meses cuando ya se ha seleccionado la comparación por fecha.
