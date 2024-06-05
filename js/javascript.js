$(document).ready(function () {
  $(".card_servico").click(function () {
    var idServico = $(this).attr("id_serviço");
    window.location.href = "servico.php?id_servico=" + idServico;
  });

  $(".card_servico").css("height", $(".card_servico").width());

  const cores = ["#FF8A00", "#2A8433", "#0375DF", "#1400FF", "#8F00FF"];
  const elementos = document.querySelectorAll(".tecnologia");

  elementos.forEach((elemento, index) => {
    const corIndex = index % cores.length;
    const cor = cores[corIndex];
    elemento.style.color = cor;
  });

  // criar serviço -------------------------------------------------------------------------------
  $(".btn_modal_criar_servico").click(function () {
    $(".moda_criar_servico").css("display", "block");
  });

  // menu line -----------------------------------------------------------------------------------
});

function toggleMenu() {
  $(".menu-btn").toggleClass("change");

  var sidebar = $(".sidebar");
  if (!$(".menu-btn").hasClass("change")) {
    sidebar.removeClass("ativado");
    $("body").css("overflow", "auto");
  } else {
    sidebar.addClass("ativado");
    $("body").css("overflow", "hidden");
  }
}

// links -------------------------------------------------------------------------------------
$(document).ready(function () {
  $(".moedas_usuario_mobile").click(function () {
    console.log("fssvadfmi");
    window.location.href = "shop.php";
  });

  // btns -------------------------------------------------------------------------------------

  $(".btn_servico_publicar").click(function () {
    alert("fgfxz");
    $("#criar_servico").submit();
  });

  $(".btn_atualizar_usuario").click(function () {
    window.location.href = "perfil.php?atualizar=true";
  });
  $(".btn_cancelar_usuario").click(function () {
    window.location.href = "perfil.php";
  });
  $(".btn_deslogar").click(function () {
    window.location.href = window.location.href + "?deslogar=true";
  }); 
  $("#btn_filtrar_home").click(function () {
       $("#filtro_form_home").submit();
  });
  $(".btn_ativa_modal").click(function () {
    if ($(".modal").hasClass("modal_ativado")) {
      $(".modal").removeClass("modal_ativado");
      $(".container_modal").css("display","none ");
    
    } else {
      $(".modal").addClass("modal_ativado");
      $(".container_modal").css("display","flex");
  
    }
  }); 
   $(".close_modal").click(function () {
      $(".modal").removeClass("modal_ativado");
      $(".container_modal").css("display","none ");
    }); 

  // shop----------------------------------------------------------------

  $("#pS").click(function () {
    window.open("https://buy.stripe.com/test_28o2b36ef8PFaVafYZ", "_blank");
  });
  $("#pM").click(function () {
    window.open("https://buy.stripe.com/test_fZe5nf1XZ8PF6EU4gi", "_blank");
  });
  $("#pA").click(function () {
    window.open("https://buy.stripe.com/test_28odTLfOPc1R0gwfZ1", "_blank");
  });
});
// functions -validacao -----------------------------------------------------------
function validacaoInputTelefone(input) {
  input.addEventListener("input", function (e) {
    var x = e.target.value
      .replace(/\D/g, "")
      .match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
    e.target.value = !x[2]
      ? x[1]
      : "(" + x[1] + ") " + x[2] + (x[3] ? "-" + x[3] : "");
  });
}
