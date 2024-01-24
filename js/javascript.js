$(document).ready(function () {

    $(".card_servico").click(function () {
        var idServico = $(this).attr("id_serviço");
        window.location.href = "servico.php?id_servico=" + idServico;
    });

    $(".card_servico").css("height", $(".card_servico").width());

    const cores = ['#FF8A00', '#2A8433', '#0375DF', '#1400FF', '#8F00FF'];
    const elementos = document.querySelectorAll('.tecnologia');

    elementos.forEach((elemento, index) => {
        const corIndex = index % cores.length;
        const cor = cores[corIndex];
        elemento.style.color = cor;
    });

    // shop
    const options = document.getElementsByClassName("opcoes_moedas");

    var myFunction = function () {
        var option = this.getAttribute("value");
        switch (option) {
            case "optS":
                window.open("https://buy.stripe.com/test_28o2b36ef8PFaVafYZ", "_blank");
                break;
            case "optM":
                window.open("https://buy.stripe.com/test_fZe5nf1XZ8PF6EU4gi", "_blank");
                break;
            case "optA":
                window.open("https://buy.stripe.com/test_28odTLfOPc1R0gwfZ1", "_blank");
                break;
        }
    };

    for (var i = 0; i < options.length; i++) {
        options[i].addEventListener('click', myFunction, false);
    }

    // criar serviço
    $(".btn_modal_criar_servico").click(function () {
        $(".moda_criar_servico").css("display", "block");
    });

    // menu line
});

 function toggleMenu() {
        $('.menu-btn').toggleClass('change');

        var sidebar = $('.sidebar');
        if (!$('.menu-btn').hasClass('change')) {
            sidebar.removeClass('ativado');
        } else {
            sidebar.addClass('ativado');
        }
    }


