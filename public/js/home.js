$(document).ready(function(){

    $(".parseUpper").on("keyup", function(){
        $(this).val($(this).val().toUpperCase())
    })

    $(".lista-box").on("click", ".editBox", function(){

        $("#numeroEdit").val("");
        $("#latitudeEdit").val("");
        $("#longitudeEdit").val("");
        $("#idEdit").val("");

        $("#numeroEdit").val($(this).data('numero'));
        $("#latitudeEdit").val($(this).data('latitude'));
        $("#longitudeEdit").val($(this).data('longitude'));
        $("#idEdit").val($(this).data('id'));

        $("#editBoxModal").modal("show");
    });

    $(".addBox").on("click", function(){

        $("#numeroAdd").val("");
        $("#latitudeAdd").val("");
        $("#longitudeAdd").val("");

        $("#addBoxModal").modal("show");
    });

    $("#formSearchBox").submit(function(e) {
        e.preventDefault();
       
        search();
    }); 

    $("#formEditBox").submit(function(e) {
        e.preventDefault();
       
        Swal.queue([{
            title: 'Carregando...',
            allowOutsideClick: false,
            allowEscapeKey: false,
            onOpen: () => {
                Swal.showLoading();
                $.post(window.location.origin + "/edit-box", {
                    numero : $("#numeroEdit").val(),
                    latitude : $("#latitudeEdit").val(),
                    longitude : $("#longitudeEdit").val(),
                    id : $("#idEdit").val(),
                }).then(function(data) {
                    if(data.status == 'success') {

                        $("#editBoxModal").modal("hide");

                        Swal.fire({
                            icon: 'success',
                            text: 'Caixa editada com sucesso!',
                            showConfirmButton: false,
                            showCancelButton: true,
                            cancelButtonText: "OK",
                            onClose: () => {
                                search();
                            }
                        });

                    } else if (data.status == 'error') {
                        // showError(data.message);
                        Swal.fire({
                            icon: 'error',
                            text: data.message,
                            showConfirmButton: false,
                            showCancelButton: true,
                            cancelButtonText: "OK",
                            onClose: () => {
                                search();
                            }
                        });
                    }
                }).catch();
            }
        }]);
    }); 

    $("#formAddBox").submit(function(e) {
        e.preventDefault();
       
        Swal.queue([{
            title: 'Carregando...',
            allowOutsideClick: false,
            allowEscapeKey: false,
            onOpen: () => {
                Swal.showLoading();
                $.post(window.location.origin + "/add-box", {
                    numero : $("#numeroAdd").val(),
                    latitude : $("#latitudeAdd").val(),
                    longitude : $("#longitudeAdd").val()
                }).then(function(data) {
                    if(data.status == 'success') {

                        $("#addBoxModal").modal("hide");

                        Swal.fire({
                            icon: 'success',
                            text: 'Caixa cadastrada com sucesso!',
                            showConfirmButton: false,
                            showCancelButton: true,
                            cancelButtonText: "OK",
                            onClose: () => {
                                search();
                            }
                        });

                    } else if (data.status == 'error') {
                        // showError(data.message);
                        Swal.fire({
                            icon: 'error',
                            text: data.message,
                            showConfirmButton: false,
                            showCancelButton: true,
                            cancelButtonText: "OK",
                            onClose: () => {
                                search();
                            }
                        });
                    }
                }).catch();
            }
        }]);
    }); 

    $(".lista-box").on("click", ".deletBox", function(){

        destroy($(this).data('numero'), $(this).data('id'))
    });

    function destroy(caixa, id) {

        Swal.fire({
            title: 'Atenção!',
            text: `Deseja realmente deletar a caixa ${caixa}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não',
          }).then((result) => {
            if (result.value) {

                Swal.queue([{
                    title: 'Carregando...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    onOpen: () => {
                        Swal.showLoading();
                        $.post(window.location.origin + "/delete-box", {
                            id : id,
                        }).then(function(data) {
                            if(data.status == 'success') {
        
                                Swal.fire({
                                    icon: 'success',
                                    text: 'Caixa deletada com sucesso!',
                                    showConfirmButton: false,
                                    showCancelButton: true,
                                    cancelButtonText: "OK",
                                    onClose: () => {
                                        search();
                                    }
                                });
        
                            } else if (data.status == 'error') {
                                // showError(data.message);
                                Swal.fire({
                                    icon: 'error',
                                    text: data.message,
                                    showConfirmButton: false,
                                    showCancelButton: true,
                                    cancelButtonText: "OK",
                                    onClose: () => {
                                        search();
                                    }
                                });
                            }
                        }).catch();
                    }
                }]);

            }
          })


    }
    


    function search() {

        let nivel = $("#nivel").val();

        if($("#input-box").val() != ""){

            Swal.queue([{
                title: 'Carregando...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                onOpen: () => {
                    Swal.showLoading();
                    $.post(window.location.origin + "/search-box", {
                        box: $("#input-box").val()
                    }).then(function(data) {
                        if(data.status == 'success') {

                            if(data.data.length == 500){
                                $(".totalText").html(`Mais de ${data.data.length} resultados encontrados.`)
                            }else if(data.data.length == 1){
                                $(".totalText").html(`${data.data.length} resultado encontrado.`)
                            }else{
                                $(".totalText").html(`${data.data.length} resultados encontrados.`)
                            }

                            $(".lista-box").html("");

                            if(data.data.length > 0){

                                $(".totalBox").show();
                                $(".resultBox").show();

                                for (var i in data.data) {

                                    $(".lista-box").append(`
                                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            ${data.data[i].numero}
                                            <span class="cursor-pointer badge badge-default badge-pill" title="Ir para o mapa">
                                                
                                                ${nivel==1?`
                                                    <a class="btn btn-danger deletBox" style="margin-right:7px" data-numero="${data.data[i].numero}" data-latitude="${data.data[i].latitude}" data-longitude="${data.data[i].longitude}" data-id="${data.data[i].id}" href="#">
                                                        <i class="fas fa-trash" style="color:#fff"></i>
                                                    </a>
                                                    <a class="btn btn-warning editBox" style="background-color:#f49424; margin-right:7px" data-numero="${data.data[i].numero}" data-latitude="${data.data[i].latitude}" data-longitude="${data.data[i].longitude}" data-id="${data.data[i].id}" href="#">
                                                        <i class="fas fa-pen" style="color:#fff"></i>
                                                    </a>
                                                `:``}
                                            
                                                <a class="btn btn-warning" style="background-color:#f49424" target="_blank" href="https://www.google.com/maps/search/?api=1&query=${data.data[i].latitude},${data.data[i].longitude}">
                                                    <i class="fas fa-map-marker-alt" style="color:#fff"></i>
                                                </a>
                                            </span>
                                        </li>
                                    `);

                                }

                            }else{

                                $(".totalBox").hide();
                                $(".resultBox").show();

                                $(".lista-box").append(`
                                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center text-center">
                                        Nenhum resultado encontrado.
                                    </li>
                                `);
                            }

                            Swal.close();

                        } else if (data.status == 'error') {
                            $(".totalBox").hide();
                            $(".resultBox").hide();
                            showError(data.message);
                        }
                    }).catch();
                }
            }]);

        }

    }


});