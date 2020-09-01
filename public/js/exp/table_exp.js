$(document).ready(function(){

    search();

    function search() {

        Swal.queue([{
            title: 'Carregando...',
            allowOutsideClick: false,
            allowEscapeKey: false,
            onOpen: () => {
                Swal.showLoading();
                $.post(window.location.origin + "/table-exp", {

                }).then(function(data) {
                    if(data.status == 'success') {

                        $("#table_exp").html("");
                        $("#txtcx").html(`Exportar ${data.data.length} resultados`);
                        $("#box-box").show();

                        if(data.data.length > 0){

                            for (var i in data.data) {

                                $("#table_exp").append(`
                                    <tr>
                                        <td>${data.data[i].numero}</td>
                                        <td>${data.data[i].latitude}</td>
                                        <td>${data.data[i].longitude}</td>
                                    </tr>

                                `);

                            }

                        }else{

                            $("#table_exp").append(`
                                <tr>
                                    <td colspan="3">Nenhuma caixa encontrada</td>
                                </tr>

                            `);
                        }

                        Swal.close();

                    } else if (data.status == 'error') {
                        showError(data.message);
                    }
                }).catch();
            }
        }]);

    }

});