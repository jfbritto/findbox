$(document).ready(function(){

    search();

    function search() {

        Swal.queue([{
            title: 'Carregando...',
            allowOutsideClick: false,
            allowEscapeKey: false,
            onOpen: () => {
                Swal.showLoading();
                $.post(window.location.origin + "/logs-results", {

                }).then(function(data) {
                    if(data.status == 'success') {

                        if(data.data.length > 0){

                            for (var i in data.data) {

                                $("#table_log").append(`
                                    <tr>
                                        <td>${data.data[i].gerente}</td>
                                        <td>${data.data[i].tecnico}</td>
                                        <td>${data.data[i].dia}</td>
                                    </tr>

                                `);

                            }

                        }else{

                            $("#table_log").append(`
                                <tr>
                                    <td colspan="3">Nenhuma log encontrado</td>
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