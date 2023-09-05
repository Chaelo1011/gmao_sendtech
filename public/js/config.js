$(document).ready(function(){
    
    $('.dataTable').DataTable({
		//desactivar la paginación
		"paging": true,
        //Ordenar por la fila 0 "id", el mas reciente primero
		"aaSorting": [[ 0, "desc" ]],
		//Forzar a que los botones de ordenar estén en la primera fila y no en los inputs de la segunda
		"bSortCellsTop": true,
    	language: {
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Comienza a registrar tus productos",
            "sInfo":           "Mostrando registros del _START_ al _END_ de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
		} 
	});


    $('.btn-close').click(function(){
        $('.alert').remove();
    });

    var i = 1;
    var j = 1;
    var k = 1;
    var l = 1;

    $(document).on('click', '#addRepuestoRow', function() {
        $('.repuestos_container').find('#repuestoRow'+i).show();
        i++
	});

    $(document).on('click', '.dropRepuestoRow', function() {
        $('.repuestos_container').find('#repuestoRow'+(i-1)).hide();
        i--;
	});

    //####### PERSONAL ###################
    $(document).on('click', '#add-personal-row', function() {
        console.log(j);
        $('.personal-container').find('#personal-row'+j).show();
        if(j<=9) {
            j++;
        }
	});
    $(document).on('click', '.drop-personal-row', function() {
        $('.personal-container').find('#personal-row'+(j-1)).hide();
        $('.personal-container').find('#personal-row'+(j-1)).find('.personal-select').val('');
        if(j>=2) {
            j--;
        }
	});

    //####### HERRAMIENTAS ###################
    $(document).on('click', '#add-herramientas-row', function() {
        $('.herramientas-container').find('#herramientas-row'+k).show();
        if(k<=9) {
            k++;
        }
	});
    $(document).on('click', '.drop-herramientas-row', function() {
        $('.herramientas-container').find('#herramientas-row'+(k-1)).hide();
        $('.herramientas-container').find('#herramientas-row'+(k-1)).find('.herramientas-select').val('');
        if(k>=2) {
            k--;
        }
	});

    //####### REPUESTOS ###################
    $(document).on('click', '#add-repuestos-row', function() {
        $('.repuestos-container').find('#repuestos-row'+l).show();
        if(l<=9) {
            l++;
        }
	});
    $(document).on('click', '.drop-repuestos-row', function() {
        $('.repuestos-container').find('#repuestos-row'+(l-1)).hide();
        $('.repuestos-container').find('#repuestos-row'+(l-1)).find('.repuestos-select').val('');
        if(l>=2) {
            l--;
        }
	});

    //Mostrar los selects que ya vengan llenos desde la base de datos (como al editar, por ejemplo)
    $('.personal-select>option[selected="selected"]').parent().parent().parent().show();
    $('.herramientas-select>option[selected="selected"]').parent().parent().parent().show();
    $('.repuestoSelect>option[selected="selected"]').parent().parent().parent().show();

    $('.complete').click(function(){
        var fecha = $('.fecha').text();
        return confirm('Estas a punto de marcar como completado este plan de mantenimiento, ¿Seguro quieres continuar?');
    });

    $('#form-create-plan').submit(function(){

        var estatus = $(this).find('#estatus').val();
        var fecha = $(this).find('#fechaPlan').val().split("-");
        var Hoy = new Date();

        //Comprobamos que tenga formato correcto
        var Fecha1 = new Date(parseInt(fecha[0]),parseInt(fecha[1]-1),parseInt(fecha[2]));
    
        //Comprobamos si existe la fecha
        if (isNaN(Fecha1)){
            alert("Fecha introducida incorrecta");
            return false;
        }
        else {
            //La fecha existe, procedo a almacenar el anio, mes y dia de cada fecha, tanto la ingresada como la actual
            var AnyoFecha = Fecha1.getFullYear();
            var MesFecha = Fecha1.getMonth();
            var DiaFecha = Fecha1.getDate();
            
            var AnyoHoy = Hoy.getFullYear();
            var MesHoy = Hoy.getMonth();
            var DiaHoy = Hoy.getDate();

            //Si el anio es menor, por supuesto que la fecha es pasado
            if (AnyoFecha < AnyoHoy){
                console.log('primer if');
                if (estatus=='Pendiente') {
                    var decision = confirm('Estás intentando registrar un plan de mantenimiento pendiente con fecha pasada, se marcará el estatus como "Completado". ¿Desea continuar? ');
                    if (decision) {
                        $('#form-create-plan').find('#estatus').val('Completado');
                        $('#form-create-plan').submit();
                        return true;
                    }
                    return false;
                }	
            }
            else{
                if (AnyoFecha == AnyoHoy && MesFecha < MesHoy){
                    console.log('segundo if');
                    if (estatus=='Pendiente') {
                        var decision = confirm('Estás intentando registrar un plan de mantenimiento pendiente con fecha pasada, se marcará el estatus como "Completado". ¿Desea continuar? ');
                        if (decision) {
                            $('#form-create-plan').find('#estatus').val('Completado');
                            $('#form-create-plan').submit();
                            return true;
                        }
                        return false;
                    }			
                }
                else{
                    if (AnyoFecha == AnyoHoy && MesFecha == MesHoy && DiaFecha < DiaHoy){
                        console.log('tercer if');
                        if (estatus=='Pendiente') {
                            var decision = confirm('Estás intentando registrar un plan de mantenimiento pendiente con fecha pasada, se marcará el estatus como "Completado". ¿Desea continuar? ');
                            if (decision) {
                                $('#form-create-plan').find('#estatus').val('Completado');
                                $('#form-create-plan').submit();
                                return true;
                            }
                            return false;
                        }	
                    }
                    else{
                        if (AnyoFecha == AnyoHoy && MesFecha == MesHoy && DiaFecha == DiaHoy){
                            $('#form-create-plan').submit();
                            return true;
                        }
                        else{
                            if (estatus=='Completado') {
                                var decision = confirm('Estás intentando registrar un plan de mantenimiento pendiente con fecha en el futuro, se marcará el estatus como "Pendiente". ¿Desea continuar? ');
                                if (decision) {
                                    $('#form-create-plan').find('#estatus').val('Pendiente');
                                    $('#form-create-plan').submit();
                                    return true;
                                }
                                return false;
                            }
                        }
                    }
                }
            }
        } 
    });

    $(document).find('.paginate_button').addClass('btn').addClass('btn-danger');

    $(document).on('click', '.paginate_button', function() {
        $('.paginate_button').addClass('btn').addClass('btn-danger');
    });

    $('.imprimir').click(function(){
        window.print();
        return false;
    });

});