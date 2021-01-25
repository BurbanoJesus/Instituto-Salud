$(window).on("load", function() {
    var current_li = 0;
    var current_fs, next_fs, previous_fs;
    // ----------------------------------------------------------------------
    // Funciones de ajustes
    // ---------------------------------------------------------------------
    $("#loader").delay(40).fadeOut('slow');

    $(document).ready(function(){
        if($("input[name='otro_riesgo']:checked").val() == 'no'){
            // console.debug('puta '+$("input[name='otro_riesgo']:checked").val());
            $('#otro_riesgo').hide();
        }
        else{
            $('#otro_riesgo').show('fast');
        }
    });
    // $(".nav_inf").show();
    $("input[name='otro_riesgo']").on("change", function() {
        // var otro_tb1 = this.checked;
        // var otro_tb1 = this.value;
        var otro_tb1 = $(this).val();
        console.log(otro_tb1);
        if (otro_tb1 == 'si') {
            $('#otro_riesgo').show('fast');
        } else {
            $('#otro_riesgo').hide('fast');
        }
    });
    $("#loader").delay(40).fadeOut('slow');
    // ----------------------------------------------------------------------
     var width_window = window.innerWidth;
    $("main form h1:not(.index)").css({'width': width_window+'px'});
    $(window).resize(function() {
        // var width_window = document.body.scrollWidth;
        // var width_window = document.body.clientWidth;
        width_window = window.innerWidth;
        $("main form h1:not(.index)").css({'width': width_window+'px'});
        $("main form .modal").css({'width': width_window+'px'});
    });
    // ----------------------------------------------------------------------
    // Funciones de Menu
    // ---------------------------------------------------------------------
    $(".opcion").on('click', function(){
        var index_option = $(this).index();
        if (index_option == 0) {
            $(".menu").css('display','none');
            $("#form1 h3").delay(40).fadeIn().show();
            $(".inicio").delay(40).fadeIn().show();
            $("#return_index").hide();
        }
        switch (index_option){
            case 0:
                $("#opcion").val('1');
                $(".inicio button[type='submit']").html('Registrar');
                break;
            case 1:
                $("#opcion").val('2');
                $(".inicio button[type='submit']").html('Consultar');
                break;
             case 2:
                $("#opcion").val('3');
                $("input[name='casa_numero'").prop('required',false);
                $("input[name='familia_numero'").prop('required',false);
                break;
        }
    });

    $("#return_menu").on('click', function(){
        var index_option = $(this).index();
        console.debug($(this).index());
        $(".inicio").hide();
        $("#form1 h3").hide();
        $(".menu").delay(40).fadeIn().show();
    });


    // ----------------------------------------------------------------------
    // Funciones para permitir solamente numeros en input type numero
    // ---------------------------------------------------------------------
    // jQuery('input[type="number"]').on('keydown', function (e) {
    //     console.debug(e.which);
    //     if (e.which == 101 || e.which == 45 || e.which == 46 || e.which == 43 || e.which == 44 || e.which == 47) {
    //         return false;
    //     }
    //     else if(e.which == 8 || e.which == 46 || e.which == 116 || e.which == 37 || e.which == 38 || e.which == 39 || e.which == 40){
    //         return true;
    //     }
    //     var val = soloNumeros(e);
    //     console.debug(e.which);
    //     return val;
    // });

    // function soloNumeros(e) {
    //     var key =  e.which;
    //         return (key >= 48 && key <= 57)
    // }
    // ---------------------------------------------------------------------------------------------------------
    // Funciones para agregar funcionalidad a las celdas con informacion adicional al pasar el mouse por encima
    // ---------------------------------------------------------------------------------------------------------
    $('main form table .table_info').hover(function() {
        var width_window = $(window).innerWidth();
        var width_element = $(this).outerWidth();
        var left = $(this).offset().left;
        var right = width_window - width_element - left;
        // console.log(width_window);
        // console.log(width_element);
        // console.log(left);
        if (right <= 190) {
            $(this).children('div.info').css({
                // "display":"block",
                "margin-left": "-175px",
                "width": "210px"
            });
            $(this).children('div.info').fadeIn('normal');
        } else {
            $(this).children('div.info').fadeIn('normal');
        }
    }, function(e) {
        // $('main form table .table_info').off('hover');
        $(this).children('div.info').hide('fast');
        setTimeout(function(){ $('main form table .table_info').children('div.info').finish();}, 400);
        // $(this).children('div.info').finish();
    });

    // ---------------------------------------------------------------------------------------------------------
    // Funcion del menu de consultas
    // ---------------------------------------------------------------------------------------------------------

    $('.nav_inf ul li label').hover(function() {
        $(this).children('div.info_tb').css("display", "block");
    }, function() {
        $(this).children('div.info_tb').css("display", "none");
    });

    // ---------------------------------------------------------------------------------------------------------
    // Funcion para cambiar a texto el mes
    // ---------------------------------------------------------------------------------------------------------

    $(document).ready(function() {
        var arr = $('.month_txt');
        arr.each(function(index, value){
            // console.log($(value).text());
            // console.log(value);
            // var month = $(value).text();
            // $(value).text(month_txt(month));
            var value = $(this).text();
            $(this).text(month_txt(value));
        });
    });

     // ---------------------------------------------------------------------------------------------------------
    // Funcion para cambiar el tamaño del titulo
    // ---------------------------------------------------------------------------------------------------------

    $(document).ready(function() {
        var h1 = $('.divh1');
        var divtr = $('div.table:nth-of-type(1) .tr:nth-of-type(2):not(#tb1_telefono)');
        var table = $('div.table:nth-of-type(1) table');
        var divtable = table.closest('div.table');
        console.debug(divtable);
        // console.debug(h1.width());
        // console.debug(table.width());
        h1.width(table.width()+22);
        divtr.width(table.width()+1);
        divtable.width(table.width()+1);
        var margin_left = table.css('margin-left');
        var margin_left_int = parseInt(margin_left);
        console.debug(margin_left_int);
        console.debug($('.fecha_visita').css('margin-left'));

        if (margin_left_int > 0) {
            console.debug(margin_left);
            $('.fecha_visita').css('margin-left', margin_left);
            console.debug($('.fecha_visita').css('margin-left'));
            $('.observaciones').css('margin-left', margin_left);
        }
    });
    // ---------------------------------------------------------------------
    // Funciones para agregar automatica y manualmente filas a las tablas tb1_integrantes
    // ---------------------------------------------------------------------
    var cont1 = 2;
    var cont_inputs = 12;
    var pre_cont = '';
    var clone= '';
    
    function add_fila_tb1() {
        var clone = '<tr><td>'+pre_cont+cont1+'</td> <td><input class="tb1_nombres" type="text" name="tb1_nombres_'+cont1+'" value="" /></td> <td><input class="tb1_dia" type="number" name="tb1_dia_'+cont1+'" min=1 max=31 value="" /></td> <td><input class="tb1_mes" type="number" name="tb1_mes_'+cont1+'" min=1 max=12 value="" /></td> <td><input class="tb1_año" type="number" name="tb1_año_'+cont1+'" min=1800 value="" /></td> <td><input class="tb1_edad_a" type="number" name="tb1_edad_a_'+cont1+'" value="" /></td> <td><input class="tb1_edad_m" type="number" name="tb1_edad_m_'+cont1+'" value="" /></td> <td><input class="tb1_edad_d" type="number" name="tb1_edad_d_'+cont1+'" value="" /></td> <td><input id="tb1_sexo_m_'+cont1+'" type="radio" name="tb1_sexo_'+cont1+'" value="M" /><label class="radio" for="tb1_sexo_m_'+cont1+'"></label></td> <td><input id="tb1_sexo_f_'+cont1+'" type="radio" name="tb1_sexo_'+cont1+'" value="F"/><label class="radio" for="tb1_sexo_f_'+cont1+'"></label></td> <td><input type="number" name="tb1_parentesco_'+cont1+'" value="" min=2 max=5 /></td> <td><input type="text" name="tb1_tipo_identi_'+cont1+'" value="" pattern="CC|cc|CE|ce|PA|pa|RC|rc|TI|ti|ASI|asi|MSI|msi" /></td> <td><input type="number" name="tb1_numero_identi_'+cont1+'" value="" /></td> <td><input type="number" name="tb1_escolaridad_'+cont1+'" value="" min=0 max=9 /></td> <td><input type="number" name="tb1_ocupacion_'+cont1+'" value="" min=0 max=10 /></td> <td><input type="number" name="tb1_tipo_vincula_'+cont1+'" value="" min=0 max=4 /></td> <td><input type="text" name="tb1_eps_'+cont1+'" value=""/></td> <td><input type="text" name="tb1_grupo_etnico_'+cont1+'" value="" pattern="0|1|2|3|4|5|1A|1B|1C|1D|1E|1F"/></td> <td> <input id="tb1_desplazado_'+cont1+'" type="checkbox" name="tb1_desplazado_'+cont1+'" value="si"/> <label for="tb1_desplazado_'+cont1+'" class="check"></label> </td> <td> <input class="discap_integrantes_no" id="tb1_discapacidad_'+cont1+'" type="checkbox" name="tb1_discapacidad_'+cont1+'" value="si"/> <label for="tb1_discapacidad_'+cont1+'" class="check"></label> </td> <td><input class="discap_integrantes" type="number" name="tb1_cual_'+cont1+'" min="0" max="5" value=""/></td></tr>';
        var table = $('main form#form3 table#tb1_integrantes tbody');
        table.append(clone);
    }
    $(document).ready(function(){
        // alert('hl');
        if($("main form#form3 table#tb1_integrantes.tb1_pri").length > 0){
            while (cont1 <= 15) {
                if (cont1 >= 10) {
                    pre_cont = '';
                } else {
                    pre_cont = 0;
                }
                add_fila_tb1();
                cont1 += 1;
            }
        }
    });
    $('main form#form3 table#tb1_integrantes + .button_add').on("click", function() {
        cont1 = $('main form#form3 table#tb1_integrantes tbody tr:last-child td:first-child').text();
        console.debug($('main form#form3 table#tb1_integrantes tbody tr:last-child td:first-child').text());
        cont1 = parseInt(cont1) + 1;
        if (cont1 >= 10) {
            pre_cont = '';
        } else {
            pre_cont = 0;
        }
        add_fila_tb1();
        cont1 += 1;
    });
    

    // // ------------------------------------------------------// 
    // // -------------Estadisticas-----------------------------
    // // ------------------------------------------------------
    function add_fila_tb9() {
        var clone = '<tr> <td>'+cont9+'</td> <td><input type="text" name="tb9_1_nombres_'+cont9+'" value=""></td> <td> <input id="tb9_1_sexo_si_'+cont9+'" type="radio" name="tb9_1_sexo_'+cont9+'" value="si"> <label class="radio" for="tb9_1_sexo_si_'+cont9+'" ></label> </td> <td> <input id="tb9_1_sexo_no_'+cont9+'" type="radio" name="tb9_1_sexo_'+cont9+'" value="no"> <label class="radio" for="tb9_1_sexo_no_'+cont9+'" ></label> </td> <td><input type="number" name="tb9_1_edad_'+cont9+'" value=""></td> <td> <input id="tb9_1_registrado_si_'+cont9+'" type="radio" name="tb9_1_registrado_'+cont9+'" value="si"> <label class="radio" for="tb9_1_registrado_si_'+cont9+'" ></label> </td> <td> <input id="tb9_1_registrado_no_'+cont9+'" type="radio" name="tb9_1_registrado_'+cont9+'" value="no"> <label class="radio" for="tb9_1_registrado_no_'+cont9+'" ></label> </td> <td><input type="number" name="tb9_1_parto_atendido_por_'+cont9+'" value=""></td> <td><input type="number" name="tb9_1_dia_'+cont9+'" value=""></td> <td><input type="number" name="tb9_1_mes_'+cont9+'" value=""></td> <td><input type="number" name="tb9_1_año_'+cont9+'" value=""></td> </tr>';
        var table = $('main form #tb9_1_nacidos tbody');
        table.append(clone);
    }
    $('main form#form11').ready(function() {
        if($("main form#form11 #tb9_1_nacidos.tb9_1_pri").length > 0){
            cont9 = 2;
            while (cont9 <= 5) {
                if (cont9 >= 10) {
                    pre_cont = '';
                } else {
                    pre_cont = 0;
                }
                add_fila_tb9();
                cont9 += 1;
            }
        }
    });
    $('main form#form11 #tb9_1_nacidos + .button_add').on("click", function() {
         cont9 = $('main form#form11 #tb9_1_nacidos tbody tr:last-child td:first-child').text();
        console.debug(cont9);
        cont9 = parseInt(cont9) + 1;
        if (cont9 >= 10) {
            pre_cont = '';
        } else {
            pre_cont = 0;
        }
        add_fila_tb9();
        cont9 += 1;
    });

    function add_fila_tb9_2() {
         var clone = '<tr> <td>'+cont9_2+'</td> <td><input type="text" name="tb9_2_nombres_'+cont9_2+'" value=""></td> <td> <input id="tb9_2_sexo_si_'+cont9_2+'" type="radio" name="tb9_2_sexo_'+cont9_2+'" value="si"> <label class="radio" for="tb9_2_sexo_si_'+cont9_2+'" ></label> </td> <td> <input id="tb9_2_sexo_no_'+cont9_2+'" type="radio" name="tb9_2_sexo_'+cont9_2+'" value="no"> <label class="radio" for="tb9_2_sexo_no_'+cont9_2+'" ></label> </td> <td><input type="number" name="tb9_2_edad_'+cont9_2+'" value=""></td> <td><input type="text" name="tb9_2_causa_'+cont9_2+'" value=""></td> <td><input type="text" name="tb9_2_codigo_cie_'+cont9_2+'" value=""></td> <td><input type="number" name="tb9_2_dia_'+cont9_2+'" value=""></td> <td><input type="number" name="tb9_2_mes_'+cont9_2+'" value=""></td> <td><input type="number" name="tb9_2_año_'+cont9_2+'" value=""></td> </tr>';
        var table = $('main form #tb9_2_mortalidad tbody');
        table.append(clone);
    }
    $('main form#form11').ready(function() {
        if($("main form#form11 #tb9_2_mortalidad.tb9_2_pri").length > 0){
            cont9_2 = 2;
            while (cont9_2 <= 5) {
                if (cont9_2 >= 10) {
                    pre_cont = '';
                } else {
                    pre_cont = 0;
                }
                add_fila_tb9_2();
                cont9_2 += 1;
            }
        }
    });
    $('main form#form11 #tb9_2_mortalidad + .button_add').on("click", function() {
        cont9_2 = $('main form#form11 #tb9_2_mortalidad tbody tr:last-child td:first-child').text();
        console.debug(cont9_2);
        cont9_2 = parseInt(cont9_2) + 1;
        if (cont9_2 >= 10) {
            pre_cont = '';
        } else {
            pre_cont = 0;
        }
        add_fila_tb9_2();
        cont9_2 += 1;
    });

    function add_fila_tb9_3() {
         var clone = '<tr> <td>'+cont9_3+'</td> <td><input type="text" name="tb9_3_nombres_'+cont9_3+'" value=""></td> <td> <input id="tb9_3_sexo_si_'+cont9_3+'" type="radio" name="tb9_3_sexo_'+cont9_3+'" value="si"> <label class="radio" for="tb9_3_sexo_si_'+cont9_3+'" ></label> </td> <td> <input id="tb9_3_sexo_no_'+cont9_3+'" type="radio" name="tb9_3_sexo_'+cont9_3+'" value="no"> <label class="radio" for="tb9_3_sexo_no_'+cont9_3+'" ></label> </td> <td><input type="number" name="tb9_3_edad_'+cont9_3+'" value=""></td> <td><input type="text" name="tb9_3_causa_'+cont9_3+'" value=""></td> <td><input type="text" name="tb9_3_codigo_cie_'+cont9_3+'" value=""></td> </tr>';
        var table = $('main form#form11 #tb9_3_morbilidad tbody');
        table.append(clone);
    }
    $('main form#form11').ready(function() {
        if($("main form#form11 table#tb9_3_morbilidad.tb9_3_pri").length > 0){
            cont9_3 = 2;
            while (cont9_3 <= 5) {
                if (cont9_3 >= 10) {
                    pre_cont = '';
                } else {
                    pre_cont = 0;
                }
                add_fila_tb9_3();
                cont9_3 += 1;
            }
        }
    });
    $('main form#form11 #tb9_3_morbilidad + .button_add').on("click", function() {
        cont9_3 = $('main form#form11 #tb9_3_morbilidad tbody tr:last-child td:first-child').text();
        console.debug(cont9_3);
        cont9_3 = parseInt(cont9_3) + 1;
        if (cont9_3 >= 10) {
            pre_cont = '';
        } else {
            pre_cont = 0;
        }
        add_fila_tb9_3();
        cont9_3 += 1;
    });
    
    
    // ---------------------------------------------------------------------
    // Funciones para agregar cambios a las celdas de las tablas
    // ---------------------------------------------------------------------
    // Funciones cambios de edad
    // ---------------------------------------------------------------------

    function change_day(index_tr,dia_nac,mes_nac,año_nac){
        var flag_0 = false;
        if (dia_nac >= 0 && mes_nac >= 0 && año_nac >= 1800) flag_0 = true;
        var flag_m = true;
        var flag_d = true;
        if (año_nac == year_current()) {
            if (mes_nac <= month_current()) {
                flag_m = true;
                flag_d = true;
            } else {
                flag_m = false;
            }
            if (mes_nac == month_current()) {
                if (dia_nac <= day_current()) {
                    flag_d = true;
                } else {
                    flag_d = false;
                }
            }
        }
        if (dia_nac <= 31 && mes_nac <= 12 && año_nac <= year_current() && flag_m == true && flag_d == true && flag_0 == true) {
            if (mes_nac == '' || año_nac == '') {
                console.log('mes o año no estan definidos');
            } else {
                var fecha = "" + año_nac + "-" + mes_nac + "-" + dia_nac + "";
                var edad = calcularEdad(fecha);
                console.log(edad);
                $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_edad_a').val(edad.años);
                $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_edad_m').val(edad.meses);
                $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_edad_d').val(edad.dias);
            }
        } else {
            console.log('Error de humano');
        }
    }
    // 
    // 
    function change_month(index_tr,dia_nac,mes_nac,año_nac){
        var flag_0 = false;
        if (dia_nac >= 0 && mes_nac >= 0 && año_nac >= 1800) flag_0 = true;
        var flag_m = true;
        var flag_d = true;
        if (año_nac == year_current()) {
            if (mes_nac <= month_current()) {
                flag_m = true;
                flag_d = true;
            } else {
                flag_m = false;
            }
            if (mes_nac == month_current()) {
                if (dia_nac <= day_current()) {
                    flag_d = true;
                } else {
                    flag_d = false;
                }
            }
        }
        if (dia_nac <= 31 && mes_nac <= 12 && año_nac <= year_current() && flag_m == true && flag_d == true && flag_0 == true) {
            if (dia_nac == '' || año_nac == '') {
                console.log('dia o año no estan definidos');
            } else {
                var fecha = "" + año_nac + "-" + mes_nac + "-" + dia_nac + "";
                var edad = calcularEdad(fecha);
                console.log(edad);
                $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_edad_a').val(edad.años);
                $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_edad_m').val(edad.meses);
                $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_edad_d').val(edad.dias);
            }
        } else {
            console.log('Error de humano');
        }
    }
    // 
    // 
    function change_year(index_tr,dia_nac,mes_nac,año_nac){
        var flag_0 = false;
        if (dia_nac >= 0 && mes_nac >= 0 && año_nac >= 1800) flag_0 = true;
        var flag_m = true;
        var flag_d = true;
        if (año_nac == year_current()) {
            if (mes_nac <= month_current()) {
                flag_m = true;
                flag_d = true;
            } else {
                flag_m = false;
            }
            if (mes_nac == month_current()) {
                if (dia_nac <= day_current()) {
                    flag_d = true;
                } else {
                    flag_d = false;
                }
            }
        }
        if (dia_nac <= 31 && mes_nac <= 12 && año_nac <= year_current() && flag_m == true && flag_d == true && flag_0 == true) {
            if (mes_nac == '' || dia_nac == '') {
                console.log('mes o dia no estan definidos');
            } else {
                var fecha = "" + año_nac + "-" + mes_nac + "-" + dia_nac + "";
                var edad = calcularEdad(fecha);
                console.log(edad);
                 $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_edad_a').val(edad.años);
                $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_edad_m').val(edad.meses);
                $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_edad_d').val(edad.dias);
            }
        } else {
            console.log('Error de humano');
        }
    }
    // 
    // 

    $(document).ready(function() {
        var dia_nac_arr = $("table#tb1_integrantes tbody tr td input.tb1_dia");
        dia_nac_arr.each(function(index,value){
            var index_tr = $(this).parents('tr').index();
            index_tr = index_tr + 1;
            var dia_nac = $(this).val();
            var mes_nac = $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_mes').val();
            var año_nac = $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_año').val();
            if ( dia_nac != ''){
                change_day(index_tr,dia_nac,mes_nac,año_nac);
            }
        });
        
    });

    $(document).on("change", "table#tb1_integrantes tbody tr td input.tb1_dia", function() {
        var index_tr = $(this).parents('tr').index();
        index_tr = index_tr + 1;
        var dia_nac = $(this).val();
        var mes_nac = $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_mes').val();
        var año_nac = $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_año').val();
        change_day(index_tr,dia_nac,mes_nac,año_nac);
        
    });
    $(document).on("change", "table#tb1_integrantes tbody tr input.tb1_mes", function() {
        var index_tr = $(this).parents('tr').index();
        index_tr = index_tr + 1;
        var mes_nac = $(this).val();
        console.debug(mes_nac);
        var dia_nac = $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_dia').val();
        var año_nac = $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_año').val();
        change_month(index_tr,dia_nac,mes_nac,año_nac);
    });
    $(document).on("keyup", "table#tb1_integrantes tbody tr input.tb1_año", function() {
        var index_tr = $(this).parents('tr').index();
        index_tr = index_tr + 1;
        var año_nac = $(this).val();
        var mes_nac = $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_mes').val();
        var dia_nac = $('table#tb1_integrantes tbody tr:nth-child(' + index_tr + ') input.tb1_dia').val();
        change_year(index_tr,dia_nac,mes_nac,año_nac);
    });
    // ---------------------------------------------------------------------------------
    // Cambios a las celdas de las tablas indice de masa corporal
    // ---------------------------------------------------------------------------------
    $(document).on("keyup", "table#tb2_menores_1año input.tb2_peso", function() {
        var index_tr = $(this).parents('tr').index();
        var peso = $(this).val();
        index_tr = index_tr + 1;
        var altura = $('table#tb2_menores_1año tbody tr:nth-child(' + index_tr + ') input.tb2_talla').val();
        if (altura == '') {
            console.log('altura no esta definida');
        } else {
            var result = peso / Math.pow((altura / 100), 2);
            result = Math.round10(result, -1);
            $('table#tb2_menores_1año tbody tr:nth-child(' + index_tr + ') input.tb2_imc').val(result);
        }
    });
    $(document).on("keyup", "table#tb2_menores_1año input.tb2_talla", function() {
        var index_tr = $(this).parents('tr').index();
        var altura = $(this).val();
        index_tr = index_tr + 1;
        var peso = $('table#tb2_menores_1año tbody tr:nth-child(' + index_tr + ') input.tb2_peso').val();
        if (peso == '') {
            console.log('peso no esta definido');
        } else {
            var result = peso / Math.pow((altura / 100), 2);
            result = Math.round10(result, -1);
            $('table#tb2_menores_1año tbody tr:nth-child(' + index_tr + ') input.tb2_imc').val(result);
        }
    });
    // 
    $(document).on("keyup", "table#tb3_niños_1a5 input.tb3_peso", function() {
        var index_tr = $(this).parents('tr').index();
        var peso = $(this).val();
        index_tr = index_tr + 1;
        var altura = $('table#tb3_niños_1a5 tbody tr:nth-child(' + index_tr + ') input.tb3_talla').val();
        if (altura == '') {
            console.log('altura no esta definida');
        } else {
            var result = peso / Math.pow((altura / 100), 2);
            result = Math.round10(result, -1);
            $('table#tb3_niños_1a5 tbody tr:nth-child(' + index_tr + ') input.tb3_imc').val(result);
        }
    });
    $(document).on("keyup", "table#tb3_niños_1a5 input.tb3_talla", function() {
        var index_tr = $(this).parents('tr').index();
        var altura = $(this).val();
        index_tr = index_tr + 1;
        var peso = $('table#tb3_niños_1a5 tbody tr:nth-child(' + index_tr + ') input.tb3_peso').val();
        if (peso == '') {
            console.log('peso no esta definido');
        } else {
            var result = peso / Math.pow((altura / 100), 2);
            result = Math.round10(result, -1);
            $('table#tb3_niños_1a5 tbody tr:nth-child(' + index_tr + ') input.tb3_imc').val(result);
        }
    });
    // 
    $(document).on("keyup", "table#tb4_niños_5a9 input.tb4_peso", function() {
        var index_tr = $(this).parents('tr').index();
        var peso = $(this).val();
        index_tr = index_tr + 1;
        var altura = $('table#tb4_niños_5a9 tbody tr:nth-child(' + index_tr + ') input.tb4_talla').val();
        if (altura == '') {
            console.log('altura no esta definida');
        } else {
            var result = peso / Math.pow((altura / 100), 2);
            result = Math.round10(result, -1);
            $('table#tb4_niños_5a9 tbody tr:nth-child(' + index_tr + ') input.tb4_imc').val(result);
        }
    });
    $(document).on("keyup", "table#tb4_niños_5a9 input.tb4_talla", function() {
        var index_tr = $(this).parents('tr').index();
        var altura = $(this).val();
        index_tr = index_tr + 1;
        var peso = $('table#tb4_niños_5a9 tbody tr:nth-child(' + index_tr + ') input.tb4_peso').val();
        if (peso == '') {
            console.log('peso no esta definido');
        } else {
            var result = peso / Math.pow((altura / 100), 2);
            result = Math.round10(result, -1);
            $('table#tb4_niños_5a9 tbody tr:nth-child(' + index_tr + ') input.tb4_imc').val(result);
        }
    });
    // 
    $(document).on("keyup", "table#tb5_hombresmujeres_10a59 input.tb5_peso", function() {
        var index_tr = $(this).parents('tr').index();
        var peso = $(this).val();
        index_tr = index_tr + 1;
        var altura = $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_talla').val();
        if (altura == '') {
            console.log('altura no esta definida');
        } else {
            var result = peso / Math.pow((altura / 100), 2);
            result = Math.round10(result, -1);
            $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_imc').val(result);
        }
        var estado_nutricional = '';
        if (result < 18.5) {
            estado_nutricional = 'Bajo Peso';
        } else if (result >= 18.5 && result <= 24.9) {
            estado_nutricional = 'Peso Normal';
        } else if (result >= 25 && result <= 29.9) {
            estado_nutricional = 'Sobrepeso';
        } else if (result >= 30 && result <= 34.9) {
            estado_nutricional = 'Obesidad 1';
        } else if (result >= 34.9 && result <= 39.9) {
            estado_nutricional = 'Obesidad 2';
        } else if (result >= 40) {
            estado_nutricional = 'Obesidad 3';
        }
        $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_estado_nutricional').val(estado_nutricional);
    });
    $(document).on("keyup", "table#tb5_hombresmujeres_10a59 input.tb5_talla", function() {
        var index_tr = $(this).parents('tr').index();
        var altura = $(this).val();
        index_tr = index_tr + 1;
        var peso = $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_peso').val();
        if (peso == '') {
            console.log('peso no esta definido');
        } else {
            var result = peso / Math.pow((altura / 100), 2);
            result = Math.round10(result, -1);
            $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_imc').val(result);
        }
        var estado_nutricional = '';
        if (result < 18.5) {
            estado_nutricional = 'Bajo Peso';
        } else if (result >= 18.5 && result <= 24.9) {
            estado_nutricional = 'Peso Normal';
        } else if (result >= 25 && result <= 29.9) {
            estado_nutricional = 'Sobrepeso';
        } else if (result >= 30 && result <= 34.9) {
            estado_nutricional = 'Obesidad 1';
        } else if (result >= 34.9 && result <= 39.9) {
            estado_nutricional = 'Obesidad 2';
        } else if (result >= 40) {
            estado_nutricional = 'Obesidad 3';
        }
        $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_estado_nutricional').val(estado_nutricional);
    });
    //
    $(document).on("keyup", "table#tb6_adultos_60 input.tb6_peso", function() {
        var index_tr = $(this).parents('tr').index();
        var peso = $(this).val();
        index_tr = index_tr + 1;
        var altura = $('table#tb6_adultos_60 tbody tr:nth-child(' + index_tr + ') input.tb6_talla').val();
        if (altura == '') {
            console.log('altura no esta definida');
        } else {
            var result = peso / Math.pow((altura / 100), 2);
            result = Math.round10(result, -1);
            $('table#tb6_adultos_60 tbody tr:nth-child(' + index_tr + ') input.tb6_imc').val(result);
        }
        var estado_nutricional = '';
        if (result < 18.5) {
            estado_nutricional = 'Bajo Peso';
        } else if (result >= 18.5 && result <= 24.9) {
            estado_nutricional = 'Peso Normal';
        } else if (result >= 25 && result <= 29.9) {
            estado_nutricional = 'Sobrepeso';
        } else if (result >= 30 && result <= 34.9) {
            estado_nutricional = 'Obesidad 1';
        } else if (result >= 34.9 && result <= 39.9) {
            estado_nutricional = 'Obesidad 2';
        } else if (result >= 40) {
            estado_nutricional = 'Obesidad 3';
        }
        $('table#tb6_adultos_60 tbody tr:nth-child(' + index_tr + ') input.tb6_estado_nutricional').val(estado_nutricional);
    });
    $(document).on("keyup", "table#tb6_adultos_60 input.tb6_talla", function() {
        var index_tr = $(this).parents('tr').index();
        var altura = $(this).val();
        index_tr = index_tr + 1;
        var peso = $('table#tb6_adultos_60 tbody tr:nth-child(' + index_tr + ') input.tb6_peso').val();
        if (peso == '') {
            console.log('peso no esta definido');
        } else {
            var result = peso / Math.pow((altura / 100), 2);
            result = Math.round10(result, -1);
            $('table#tb6_adultos_60 tbody tr:nth-child(' + index_tr + ') input.tb6_imc').val(result);
        }
        var estado_nutricional = '';
        if (result < 18.5) {
            estado_nutricional = 'Bajo Peso';
        } else if (result >= 18.5 && result <= 24.9) {
            estado_nutricional = 'Peso Normal';
        } else if (result >= 25 && result <= 29.9) {
            estado_nutricional = 'Sobrepeso';
        } else if (result >= 30 && result <= 34.9) {
            estado_nutricional = 'Obesidad 1';
        } else if (result >= 34.9 && result <= 39.9) {
            estado_nutricional = 'Obesidad 2';
        } else if (result >= 40) {
            estado_nutricional = 'Obesidad 3';
        }
        $('table#tb6_adultos_60 tbody tr:nth-child(' + index_tr + ') input.tb6_estado_nutricional').val(estado_nutricional);
    });
    //
    // ---------------------------------------------------------------------------------
    // Cambios a las celdas de las tablas señales de maltrato
    // ---------------------------------------------------------------------------------
    $(document).on("change", "table#tb2_menores_1año input.tb2_m_fisico, table#tb2_menores_1año input.tb2_m_psico", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = $(this).prop('checked');
        console.log(index_tr);
        index_tr = index_tr + 1;
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb2_menores_1año tbody tr:nth-child(' + index_tr + ') input.tb2_m_no').prop('checked', false);
        }
    });
    $(document).on("change", "table#tb2_menores_1año input.tb2_m_no", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = $(this).prop('checked');
        console.log(is_checked);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb2_menores_1año tbody tr:nth-child(' + index_tr + ') input.tb2_m_fisico').prop('checked', false);
            $('table#tb2_menores_1año tbody tr:nth-child(' + index_tr + ') input.tb2_m_psico').prop('checked', false);
            console.log($('table#tb2_menores_1año tbody tr:nth-child(' + index_tr + ') input.tb2_m_fisico'));
        }
    });
    // 
    $(document).on("change", "table#tb3_niños_1a5 input.tb3_m_fisico, table#tb3_niños_1a5 input.tb3_m_psico", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = $(this).prop('checked');
        console.log(index_tr);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb3_niños_1a5 tbody tr:nth-child(' + index_tr + ') input.tb3_m_no').prop('checked', false);
        }
    });
    $(document).on("change", "table#tb3_niños_1a5 input.tb3_m_no", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = $(this).prop('checked');
        console.log(is_checked);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb3_niños_1a5  tbody tr:nth-child(' + index_tr + ') input.tb3_m_fisico').prop('checked', false);
            $('table#tb3_niños_1a5  tbody tr:nth-child(' + index_tr + ') input.tb3_m_psico').prop('checked', false);
        }
    });
    // 
    $(document).on("change", "table#tb4_niños_5a9 input.tb3_m_fisico, table#tb4_niños_5a9 input.tb3_m_psico", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = $(this).prop('checked');
        console.log(index_tr);
        index_tr = index_tr + 1;
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb4_niños_5a9 tbody tr:nth-child(' + index_tr + ') input.tb3_m_no').prop('checked', false);
        }
    });
    $(document).on("change", "table#tb4_niños_5a9 input.tb4_m_no", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = $(this).prop('checked');
        console.log(is_checked);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb4_niños_5a9 tbody tr:nth-child(' + index_tr + ') input.tb4_m_fisico').prop('checked', false);
            $('table#tb4_niños_5a9 tbody tr:nth-child(' + index_tr + ') input.tb4_m_psico').prop('checked', false);
        }
    });
    $(document).on("change","table#tb10_3_animales_vivienda input.tb10_3_animal_vsi, table#tb10_3_animales_vivienda input.tb10_3_animal_vno", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = $(this).prop('checked');
        console.log(index_tr);
        index_tr = index_tr + 1;
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb10_3_animales_vivienda tbody tr:nth-child(' + index_tr + ') input.tb10_3_animal_no').prop('checked', false);
        }
    });
    $(document).on("change", ".tb10_3_animal_numero_vacunado,.tb10_3_animal_numero_vacunado_no", function() {
        var index_tr = $(this).parents('tr').index();
        var val = $(this).prop('value');
        console.log(val);
        index_tr = index_tr + 1;
        var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (val != '') {
           $('table#tb10_3_animales_vivienda tbody tr:nth-child(' + index_tr + ') input.tb10_3_animal_no').prop('checked', false);
        }
    });
    $(document).on("change", "table#tb10_3_animales_vivienda input.tb10_3_animal_no", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = $(this).prop('checked');
        console.log(is_checked);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb10_3_animales_vivienda tbody tr:nth-child(' + index_tr + ') input.tb10_3_animal_vsi').prop('checked', false);
            $('table#tb10_3_animales_vivienda tbody tr:nth-child(' + index_tr + ') input.tb10_3_animal_vno').prop('checked', false);
            $('table#tb10_3_animales_vivienda tbody tr:nth-child(' + index_tr + ') input.tb10_3_animal_numero_vacunado').prop('value','');
            $('table#tb10_3_animales_vivienda tbody tr:nth-child(' + index_tr + ') input.tb10_3_animal_numero_vacunado_no').prop('value','');
        }
    });
    // 
    // ---------------------------------------------------------------------------------
    // Cambios a las celdas de las tablas desparasitado
    // ---------------------------------------------------------------------------------
    $(document).on("change", "table#tb3_niños_1a5 input.tb3_desparasitado_si", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = ($(this).val() !== '');
        console.log(is_checked);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb3_niños_1a5 tbody tr:nth-child(' + index_tr + ') input.tb3_desparasitado_no').prop('checked', false);
            console.log($('table#tb3_niños_1a5 tbody tr:nth-child(' + index_tr + ') input.tb3_desparasitado_no'));
        }
    });
    $(document).on("change", "table#tb3_niños_1a5 input.tb3_desparasitado_no", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = $(this).prop('checked');
        console.log(is_checked);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb3_niños_1a5 tbody tr:nth-child(' + index_tr + ') input.tb3_desparasitado_si').val('');
            $('table#tb3_niños_1a5 tbody tr:nth-child(' + index_tr + ') input.tb3_desparasitado_si').val('');
            $('table#tb3_niños_1a5 tbody tr:nth-child(' + index_tr + ') input.tb3_desparasitado_si').val('');
        }
    });
    // 
    $(document).on("change", "table#tb4_niños_5a9 input.tb4_desparasitado_si", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = ($(this).val() !== '');
        console.log(is_checked);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb4_niños_5a9 tbody tr:nth-child(' + index_tr + ') input.tb4_desparasitado_no').prop('checked', false);
        }
    });
    $(document).on("change", "table#tb4_niños_5a9 input.tb4_desparasitado_no", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = $(this).prop('checked');
        console.log(is_checked);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb4_niños_5a9 tbody tr:nth-child(' + index_tr + ') input.tb4_desparasitado_si').val('');
            $('table#tb4_niños_5a9 tbody tr:nth-child(' + index_tr + ') input.tb4_desparasitado_si').val('');
            $('table#tb4_niños_5a9 tbody tr:nth-child(' + index_tr + ') input.tb4_desparasitado_si').val('');
        }
    });
    // 
    // ---------------------------------------------------------------------------------
    // Cambios a las celdas de las tabla planifica controles ultimo año
    // ---------------------------------------------------------------------------------
    $(document).on("change", "table#tb5_hombresmujeres_10a59 input.tb5_control_si", function() {
        var index_tr = $(this).parents('tr').index();
        var numero_controles = $(this).val();
        console.log(index_tr);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (numero_controles == '') {
            console.log(false);
        } else {
            $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_control_no').prop('checked', false);
        }
    });
    $(document).on("change", "table#tb5_hombresmujeres_10a59 input.tb5_control_no", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = $(this).prop('checked');
        console.log(is_checked);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_control_si').val('');
        }
    });
    //

    // ---------------------------------------------------------------------------------
    // Cambios a las celdas de las tablas planifica violencia contra la mujer
    // ---------------------------------------------------------------------------------
    $(document).on("change", "table#tb5_hombresmujeres_10a59 input.tb5_violencia_si", function() {
        var index_tr = $(this).parents('tr').index();
        var numero_violencia_mujer = $(this).val();
        console.log(index_tr);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (numero_violencia_mujer == '') {
            console.log(false);
        } else {
            $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_violencia_no').prop('checked', false);
            $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_violencia_v_si').prop('checked', true);
        }

    });
    $(document).on("change", "table#tb5_hombresmujeres_10a59 input.tb5_violencia_no", function() {
        var index_tr = $(this).parents('tr').index();
        var is_checked = $(this).prop('checked');
        console.log(is_checked);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (is_checked == false) {
            console.log(false);
        } else {
            $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_violencia_si').val('');
            $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_violencia_v_no').prop('checked', true);
        }
    });
    // 
    // ---------------------------------------------------------------------------------
    // Cambios a las celdas de las tablas Glicemia
    // ---------------------------------------------------------------------------------
    $(document).on("keyup", "table#tb5_hombresmujeres_10a59 input.tb5_glicemia", function() {
        var index_tr = $(this).parents('tr').index();
        var valor_glicemia = $(this).val();
        console.log(index_tr);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (valor_glicemia >= 70 && valor_glicemia <= 100) {
            var result = 'Normal'
        } else {
            var result = 'Anormal';
        }
        $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_estado_glicemia').val(result);
    });
    // 
    $(document).on("keyup", "table#tb6_adultos_60 input.tb6_glicemia", function() {
        var index_tr = $(this).parents('tr').index();
        var valor_glicemia = $(this).val();
        console.log(index_tr);
        index_tr = index_tr + 1;
        // var peso = $('tbody tr:nth-child('+index_tr+') td:nth-child(8) input').val();
        if (valor_glicemia >= 70 && valor_glicemia <= 100) {
            var result = 'Normal'
        } else {
            var result = 'Anormal';
        }
        $('table#tb6_adultos_60 tbody tr:nth-child(' + index_tr + ') input.tb6_glicemia_estado').val(result);
    });
    // 
    // ---------------------------------------------------------------------------------
    // Cambios a las celdas de las tablas tension arterial
    // ---------------------------------------------------------------------------------
    $(document).on("keyup", "table#tb5_hombresmujeres_10a59 input.tb5_valor_tension", function() {
        var index_tr = $(this).parents('tr').index();
        var tension = $(this).val();
        var valores = tension.split('/');
        if (valores.length <= 1) {
            valores = valores[0].split('-');
        }
        var ps = valores[0];
        var pd = valores[1];
        index_tr = index_tr + 1;
        var estado_tension = 'Error';
        if (ps <= 120 && pd <= 80 && ps >= 90 && pd >= 60) {
            estado_tension = 'Normal';
        } else if (ps >= 120 && ps <= 129 && pd < 80) {
            estado_tension = 'Elevada';
        } else if (ps >= 130 && ps <= 139 && pd >= 80 && pd <= 89) {
            estado_tension = 'Hipertension 1';
        } else if (ps >= 140 && pd > 80) {
            estado_tension = 'Hipertension 2';
        } else if (ps <= 90 || pd <= 60) {
            estado_tension = 'Hipotension';
        }
        $('table#tb5_hombresmujeres_10a59 tbody tr:nth-child(' + index_tr + ') input.tb5_estado_tension').val(estado_tension);
    });
    //
    $(document).on("keyup", "table#tb6_adultos_60 input.tb6_sistolica", function() {
        var index_tr = $(this).parents('tr').index();
        index_tr = index_tr + 1;
        var ps = $(this).val();
        var pd = $('table#tb6_adultos_60 tbody tr:nth-child(' + index_tr + ') input.tb6_diastolica').val();
        if (pd == 0) {
            console.log('Faltan datos');
        } else {
            ps = parseInt(ps);
            pd = parseInt(pd);
            var pam = (ps + 2 * pd) / 3;
            pam = Math.round10(pam, -1);
            var estado_tension = 'Error';
            if (ps <= 120 && pd <= 80 && ps >= 90 && pd >= 60) {
                estado_tension = 'Normal';
            } else if (ps >= 120 && ps <= 129 && pd < 80) {
                estado_tension = 'Elevada';
            } else if (ps >= 130 && ps <= 139 && pd >= 80 && pd <= 89) {
                estado_tension = 'Hipertension 1';
            } else if (ps >= 140 && pd > 80) {
                estado_tension = 'Hipertension 2';
            } else if (ps <= 90 || pd <= 60) {
                estado_tension = 'Hipotension';
            }
            $('table#tb6_adultos_60 tbody tr:nth-child(' + index_tr + ') input.tb6_pam').val(pam);
            $('table#tb6_adultos_60 tbody tr:nth-child(' + index_tr + ') input.tb6_estado_tension').val(estado_tension);
        }
    });
    $(document).on("keyup", "table#tb6_adultos_60 input.tb6_diastolica", function() {
        var index_tr = $(this).parents('tr').index();
        index_tr = index_tr + 1;
        var pd = $(this).val();
        var ps = $('table#tb6_adultos_60 tbody tr:nth-child(' + index_tr + ') input.tb6_sistolica').val();
        if (ps == 0) {
            console.log('Faltan datos');
        } else {
            ps = parseInt(ps);
            pd = parseInt(pd);
            var pam = (ps + 2 * pd) / 3;
            pam = Math.round10(pam, -1);
            var estado_tension = 'Error';
            if (ps <= 120 && pd <= 80 && ps >= 90 && pd >= 60) {
                estado_tension = 'Normal';
            } else if (ps >= 120 && ps <= 129 && pd < 80) {
                estado_tension = 'Elevada';
            } else if (ps >= 130 && ps <= 139 && pd >= 80 && pd <= 89) {
                estado_tension = 'Hipertension 1';
            } else if (ps >= 140 && pd > 80) {
                estado_tension = 'Hipertension 2';
            } else if (ps <= 90 || pd <= 60) {
                estado_tension = 'Hipotension';
            }
            $('table#tb6_adultos_60 tbody tr:nth-child(' + index_tr + ') input.tb6_pam').val(pam);
            $('table#tb6_adultos_60 tbody tr:nth-child(' + index_tr + ') input.tb6_estado_tension').val(estado_tension);
        }
    });
    //
    // ---------------------------------------------------------------------------------
    // Cambios a las celdas de las tablas de remitido
    // ---------------------------------------------------------------------------------
    $(document).on("keyup", "input.remitido", function() {
        var index_tr = $(this).parents('tr').index();
        index_tr = index_tr + 1;
        if ($(this).val() != '') {
            $('div.table:nth-child(1) tbody tr:nth-child(' + index_tr + ') input.remitido_no').prop('checked', false);
        }
        else{
            $('div.table:nth-child(1) tbody tr:nth-child(' + index_tr + ') input.remitido_no').prop('checked', true);
        }
    });
    //
    $(document).on("change", "input.remitido_no", function() {
        var index_tr = $(this).parents('tr').index();
        index_tr = index_tr + 1;
        // var is_checked = $(this).prop('checked');
        console.debug($('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input.remitido_no'));
        $('div.table:nth-child(1) tbody tr:nth-child(' + index_tr + ') input.remitido').prop('value', '');
    });
    //
    $(document).on("keyup", "input.discap_integrantes", function() {
        var index_tr = $(this).parents('tr').index();
        index_tr = index_tr + 1;
        if ($(this).val() != '') {
            $('div.table:nth-child(1) tbody tr:nth-child(' + index_tr + ') input.discap_integrantes_no').prop('checked', true);
        }
        else{
            $('div.table:nth-child(1) tbody tr:nth-child(' + index_tr + ') input.discap_integrantes_no').prop('checked', false);
        }
    });
    //
    $(document).on("change", "input.discap_integrantes_no", function() {
        var index_tr = $(this).parents('tr').index();
        index_tr = index_tr + 1;
        var is_checked = $(this).prop('checked');
        console.debug(is_checked);
        if (is_checked == false) {
            $('div.table:nth-child(1) tbody tr:nth-child(' + index_tr + ') input.discap_integrantes').prop('value', '');
        }
        else{

        }
    });
    //

    // ---------------------------------------------------------------------------------
    // Cambios a las celdas de las tablas de consume medicamento
    // ---------------------------------------------------------------------------------
    $(document).on("keyup", "input.consume_medicamento_txt", function() {
        var index_tr = $(this).parents('tr').index();
        index_tr = index_tr + 1;

        if ($(this).val() != '') {
            $('div.table:nth-child(1) tbody tr:nth-child(' + index_tr + ') input.consume_medicamento_no').prop('checked', false);
            $('div.table:nth-child(1) tbody tr:nth-child(' + index_tr + ') input.consume_medicamento_si').prop('checked', true);
        }
        else{
            $('div.table:nth-child(1) tbody tr:nth-child(' + index_tr + ') input.consume_medicamento_no').prop('checked', true);
            $('div.table:nth-child(1) tbody tr:nth-child(' + index_tr + ') input.consume_medicamento_si').prop('checked', false);
        }

    });
    //
    $(document).on("change", "input.consume_medicamento_no", function() {
        var index_tr = $(this).parents('tr').index();
        index_tr = index_tr + 1;
        // var is_checked = $(this).prop('checked');
        $('div.table:nth-child(1) tbody tr:nth-child(' + index_tr + ') input.consume_medicamento_txt').prop('value', '');
    });
    //

     // ---------------------------------------------------------------------
    // Funciones Javascript
    // ---------------------------------------------------------------------
    var target = "";
    $(document).ready(function(){
      $(".call_modal").click(function(){
        target = "#"+$(this).attr("target");
        // console.log($(this).attr("target"));
        $(target).css("width",width_window+"px");
        $(target).fadeIn().css("display","inline-flex");
        $(target).children(".modal_main").show().css("display","inline-flex");
        $('html').css('overflow','hidden');
          });
    });
    $(document).ready(function(){
      $(".close, .acept, .modal").click(function(e){
        e.stopPropagation();
        $(target).fadeOut();
        $(target).children(".modal_main").fadeOut();
        $('html').css('overflow','auto');
        });
      if(window.autoScroll){
          window.clearInterval(window.autoScroll);
          window.autoScroll = false;
        }
    });

    // $(document).ready(function(){
    //   $(".modal").click(function(e){
    //     e.stopPropagation();
    //     $(target).fadeOut();
    //     $(target).children(".modal_main").fadeOut();
    //       });
    // });

    $(document).ready(function(){
      $(".modal_main").click(function(e){
        e.stopPropagation();
        });
    });
     // ---------------------------------------------------------------------
    // Inicio de Sesion
    // ---------------------------------------------------------------------
    $("#form0 .sesion_input").on('keyup', function(){
        if ($(this).val().length > 0) {

            $(this).next().addClass('sesion_input_fija');
        } else {
            $(this).next().removeClass('sesion_input_fija');
        }
    });

    if ($("#form0 .sesion_input").length) {
        $("#form0 .sesion_input").get(0).value = '';
    }
    // ---------------------------------------------------------------------
    // Otros Ajustes
    // ---------------------------------------------------------------------
    $(document).ready(function(){
        $("table#tb1_integrantes input.tb1_año").prop('max', year_current());
    });

    $(document).ready(function(){
        $("table#tb1_v_actual input[name='tb1_v_actual_a'").prop('max', year_current());
        $("table#tb1_v_actual input[name='tb1_v_actual_d'").val(day_current());
        $("table#tb1_v_actual select[name='tb1_v_actual_m'").val(month_current()).css({'padding':'5px 5px','text-align':'center'});
        $("table#tb1_v_actual input[name='tb1_v_actual_a'").val(year_current());
    });
    // ---------------------------------------------------------------------
    // Otras Funciones
    // ---------------------------------------------------------------------
    /**
     * Ajuste decimal de un número.
     *
     * @param {String}  tipo  El tipo de ajuste.
     * @param {Number}  valor El numero.
     * @param {Integer} exp   El exponente (el logaritmo 10 del ajuste base).
     * @returns {Number} El valor ajustado.
     */
    function decimalAdjust(type, value, exp) {
        // Si el exp no está definido o es cero...
        if (typeof exp === 'undefined' || +exp === 0) {
            return Math[type](value);
        }
        value = +value;
        exp = +exp;
        // Si el valor no es un número o el exp no es un entero...
        if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
            return NaN;
        }
        // Shift
        value = value.toString().split('e');
        value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
        // Shift back
        value = value.toString().split('e');
        return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
    }
    // Decimal round
    if (!Math.round10) {
        Math.round10 = function(value, exp) {
            return decimalAdjust('round', value, exp);
        };
    }
    // Decimal floor
    if (!Math.floor10) {
        Math.floor10 = function(value, exp) {
            return decimalAdjust('floor', value, exp);
        };
    }
    // Decimal ceil
    if (!Math.ceil10) {
        Math.ceil10 = function(value, exp) {
            return decimalAdjust('ceil', value, exp);
        };
    }

    function calcularEdad(fecha) {
        // Si la fecha es correcta, calculamos la edad
        console.log(fecha);
        var values = fecha.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];
        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getYear();
        var ahora_mes = fecha_hoy.getMonth() + 1;
        var ahora_dia = fecha_hoy.getDate();
        // realizamos el calculo
        var edad = (ahora_ano + 1900) - ano;
        if (ahora_mes < mes) {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia)) {
            edad--;
        }
        if (edad > 1900) {
            edad -= 1900;
        }
        // calculamos los meses
        var meses = 0;
        if (ahora_mes > mes && dia > ahora_dia) meses = ahora_mes - mes - 1;
        else if (ahora_mes > mes) meses = ahora_mes - mes
        if (ahora_mes < mes && dia < ahora_dia) meses = 12 - (mes - ahora_mes);
        else if (ahora_mes < mes) meses = 12 - (mes - ahora_mes + 1);
        if (ahora_mes == mes && dia > ahora_dia) meses = 11;
        // calculamos los dias
        var dias = 0;
        if (ahora_dia > dia) dias = ahora_dia - dia;
        if (ahora_dia < dia) {
            ultimoDiaMes = new Date(ahora_ano, ahora_mes - 1, 0);
            dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
        }
        if (ahora_dia == dia){
            meses = (mes > ahora_mes) ? meses + 1: meses;
        }
        arr_edad = {
            años: edad,
            meses: meses,
            dias: dias,
        }
        return arr_edad;
    }

    function convertDateFormat(string) {
        var info = string.split('/').reverse().join('-');
        return info;
    }

    function year_current() {
        var fecha_hoy = new Date();
        return fecha_hoy.getFullYear()
    }

    function month_current() {
        var fecha_hoy = new Date();
        return 1 + fecha_hoy.getMonth()
    }

    function month_current_txt() {
        var fecha_hoy = new Date();
        var month = fecha_hoy.getMonth();
        var months = new Array('Enero','Febrero','Marzo','Abril','Mayo',
        'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
        return months[month];
    }

    function day_current() {
        var fecha_hoy = new Date();
        return fecha_hoy.getDate()
    }

    function month_txt(month) {
        var month = month-1;
        var months = new Array('Enero','Febrero','Marzo','Abril','Mayo',
        'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
        return months[month];
    }
    function esNumero(strNumber) {
        if (strNumber == null) return false;
        if (strNumber == undefined) return false;
        if (typeof strNumber === "number" && !isNaN(strNumber)) return true;
        if (strNumber == "") return false;
        if (strNumber === "") return false;
        var psInt, psFloat;
        psInt = parseInt(strNumber);
        psFloat = parseFloat(strNumber);
        return !isNaN(strNumber) && !isNaN(psFloat);
    }
});

// ---------------------------------------------------------------------
// FUNCIONES DE INSERCCION DE DATOS 
// ---------------------------------------------------------------------

// ---------------------------------------------------------------------
// FUNCIONES ONCHANGE MAPA
// ---------------------------------------------------------------------
$(document).on("change","#vereda", function(){
    var vereda = $(this).val();
    $('#barrio').val('');
    jQuery.ajax({
        url: '/instituto/core/includes/mapa.php',
        type: 'POST',
        dataType: 'json',
        data: {vereda:vereda},
        beforeSend: function(xhr){
            // xhr.setRequestHeader("Ajax_Request","true");
            // $(".content").html("<img src='img/loading.gif'>");
        },
        success:function(data){
            console.debug(data.url_mapa);
        $('#mapa').prop('src', data.url_mapa);
        }
    }).fail( function( jqXHR, textStatus, errorThrown ) {
          if (jqXHR.status === 0) {
            alert('Not connect: Verify Network.');
          } else if (jqXHR.status == 404) {
            alert('Requested page not found [404]');
          } else if (jqXHR.status == 500) {
            alert('Internal Server Error [500].');
          } else if (textStatus === 'parsererror') {
            alert('Requested JSON parse failed.');
          } else if (textStatus === 'timeout') {
            alert('Time out error.');
          } else if (textStatus === 'abort') {
            alert('Ajax request aborted.');
          } else {
            alert('Uncaught Error: ' + jqXHR.responseText);
          }
        })
});



$(document).on("change","#barrio", function(){
    var barrio = $(this).val();
    $('#vereda').val('');
    jQuery.ajax({
        url: '/instituto/core/includes/mapa.php',
        type: 'POST',
        dataType: 'json',
        data: {barrio:barrio},
        beforeSend: function(xhr){
            // xhr.setRequestHeader("Ajax_Request","true");
            // $(".content").html("<img src='img/loading.gif'>");
        },
        success:function(data){
            console.debug(data.url_mapa);
            $('#mapa').prop('src', data.url_mapa);
        }
    }).fail( function( jqXHR, textStatus, errorThrown ) {
          if (jqXHR.status === 0) {
            alert('Not connect: Verify Network.');
          } else if (jqXHR.status == 404) {
            alert('Requested page not found [404]');
          } else if (jqXHR.status == 500) {
            alert('Internal Server Error [500].');
          } else if (textStatus === 'parsererror') {
            alert('Requested JSON parse failed.');
          } else if (textStatus === 'timeout') {
            alert('Time out error.');
          } else if (textStatus === 'abort') {
            alert('Ajax request aborted.');
          } else {
            alert('Uncaught Error: ' + jqXHR.responseText);
          }
        })
});
// ----------------------------------------------
// -----------Antecedentes Funciones y Validaciones-------------
// ----------------------------------------------

$('.ante_id').toggle();

$('main form#form10 .button_add').on("click", function() {
    console.debug('variable');
    var flag = $('.ante_id').toggle();
 console.debug($('.ante_id').css('display'));
 if ($('.ante_id').css('display') == 'none') {
    $(this).html('Ver Mas');
 } else {
    $(this).html('Ver Menos');
 }
});


$('main form#form10 .antecedentes').on("change", function() {

    var index_tr = $(this).parents('tr').index();
    var index_tabla = $(this).parents('table').index() + 1;
    var val = '';
    index_tr = index_tr + 1;
    console.log($('div.table:nth-of-type(2) table:nth-of-type(' + index_tabla + ')  tbody tr:nth-child(' + index_tr + ') .antecedentes').index(this));
    if ($('div.table:nth-of-type(2) table:nth-of-type(' + index_tabla + ')  tbody tr:nth-child(' + index_tr + ') .antecedentes').index(this) > 1 ) {
        val = $(this).val();
        $('div.table:nth-of-type(2) table:nth-of-type(' + index_tabla + ')  tbody tr:nth-child(' + index_tr + ') td:nth-child(2) .antecedentes').prop('checked', true);
        $('div.table:nth-of-type(2) table:nth-of-type(' + index_tabla + ')  tbody tr:nth-child(' + index_tr + ') td:nth-child(3) .antecedentes').prop('checked', false);
    }
    var error = false;
    var is_checked = $('table:nth-of-type(' + index_tabla + ') tbody tr:nth-child(' + index_tr + ') .antecedentes:nth-of-type(1):checked').val();
    if (is_checked == 'no') {
        // console.log( $('table tbody tr:nth-child(' + index_tr + ') .antecedentes'));
        $('table:nth-of-type(' + index_tabla + ') tbody tr:nth-child(' + index_tr + ') .antecedentes').removeAttr('required');
        $('table:nth-of-type(' + index_tabla + ') tbody tr:nth-child(' + index_tr + ') .antecedentes').val('');
        $('table:nth-of-type(' + index_tabla + ') tbody tr:nth-child(' + index_tr + ') .ante_obser').val('');
        console.log( $('table:nth-of-type(' + index_tabla + ') tbody tr:nth-child(' + index_tr + ') .antecedentes'));
    } else {
        var antecedentes = $('table:nth-of-type(' + index_tabla + ') tbody tr:nth-child(' + index_tr + ') .antecedentes');
        antecedentes.each(function(index, value) {
            if (index > 1) {
                $(this).prop('required', 'true');
                var value_p = $(this).val();
                value_p = value_p.split(',');
                value_p = value_p.length;
                // console.log(value_p);
                 antecedentes.each(function(index, value) {
                    if (index > 1) {
                        var value = $(this).val();
                        value = value.split(',');
                        value = value.length;
                        if (value_p != value) {
                            error = true;
                        }
                    }
                 });
                 if (error == true) {
                    $('#error').css({'display':'block','background':'#E21F1F','color':'white'});
                    $('#error').val('Hay un Error');

                 }
                 else{
                    $('#error').css({'display':'none'});
                    $('#error').val('true');
                 }
            console.log(''+antecedentes);
            }
        });
    }
});

// 
// Menu Lateral 
$('.divimg').on("click", function(){
    // $('.divmenu').animate({width:'toggle'},350);
    $('.divmenu').toggle('slide');
});

// 
// 

$(document).on("keyup", "main form#form3 input.tb1_nombres", function() {
    var index_tr = $(this).parents('tr').index();
    var error = false;
    index_tr = index_tr + 1;
    var value = $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') .tb1_nombres').val();
    console.log(value);
    if (value != '') {
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_dia_'+index_tr+'"]').prop('required', true);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_mes_'+index_tr+'"]').prop('required', true);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_año_'+index_tr+'"]').prop('required', true);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_edad_d_'+index_tr+'"]').prop('required', true);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_edad_m_'+index_tr+'"]').prop('required', true);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_edad_a_'+index_tr+'"]').prop('required', true);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_sexo_'+index_tr+'"]').prop('required', true);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_parentesco_'+index_tr+'"]').prop('required', true);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_tipo_identi_'+index_tr+'"]').prop('required', true);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_numero_identi_'+index_tr+'"]').prop('required', true);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_escolaridad_'+index_tr+'"]').prop('required', true);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_ocupacion_'+index_tr+'"]').prop('required', true);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_tipo_vincula_'+index_tr+'"]').prop('required', true);
    }
    else{
         $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_dia_'+index_tr+'"]').prop('required', false);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_mes_'+index_tr+'"]').prop('required', false);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_año_'+index_tr+'"]').prop('required', false);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_edad_d_'+index_tr+'"]').prop('required', false);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_edad_m_'+index_tr+'"]').prop('required', false);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_edad_a_'+index_tr+'"]').prop('required', false);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_sexo_'+index_tr+'"]').prop('required', false);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_parentesco_'+index_tr+'"]').prop('required', false);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_tipo_identi_'+index_tr+'"]').prop('required', false);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_numero_identi_'+index_tr+'"]').prop('required', false);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_escolaridad_'+index_tr+'"]').prop('required', false);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_ocupacion_'+index_tr+'"]').prop('required', false);
        $('div.table:nth-of-type(1) tbody tr:nth-child(' + index_tr + ') input[name="tb1_tipo_vincula_'+index_tr+'"]').prop('required', false);
    }
});

$(document).ready(function(){
    if($('#form0,#form1,#form2,#form3').length == 0){
        console.log('keyup');
        $("input[type='number']").each(function(index,value){
            if($(this).val() == '0'){
                $(this).val('');
            }
        });
    }
});
