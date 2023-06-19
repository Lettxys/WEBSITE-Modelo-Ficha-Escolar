function mascara(mascaraInput) {

    const tamanhoInputTelFixo = document.getElementById('telmae').maxLength
    let valorInputTelFixo = document.getElementById('telmae').value
    const mascaraTelFixo = {
        TelMae: valorInputTelFixo.replace(/[^\d]/g, "").replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3')
    };

    if (valorInputTelFixo.length == tamanhoInputTelFixo) {
        document.getElementById('telmae').value = mascaraTelFixo[mascaraInput]
    }
}

function mascaraa(mascaraInput) {

    const tamanhoInputTelFixo = document.getElementById('telpai').maxLength
    let valorInputTelFixo = document.getElementById('telpai').value
    const mascaraTelFixo = {
        TelPai: valorInputTelFixo.replace(/[^\d]/g, "").replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3')
    };

    if (valorInputTelFixo.length == tamanhoInputTelFixo) {
        document.getElementById('telpai').value = mascaraTelFixo[mascaraInput]
    }
}

function mascaraa(mascaraInput) {

    const tamanhoInputTelFixo = document.getElementById('cel').maxLength
    let valorInputTelFixo = document.getElementById('cel').value
    const mascaraTelFixo = {
        cel: valorInputTelFixo.replace(/[^\d]/g, "").replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3')
    };

    if (valorInputTelFixo.length == tamanhoInputTelFixo) {
        document.getElementById('cel').value = mascaraTelFixo[mascaraInput]
    }
}

function mascaraCM(mascaraInput) {

    const cpf = document.getElementById('cpfmae').maxLength
    let valorcpf = document.getElementById('cpfmae').value
    const mascaracpf = {
        CpfMae: valorcpf.replace(/[^\d]/g, "").replace(/^(\d{3})(\d{3})(\d{3})(\d{2}).*/, '$1.$2.$3-$4')
    };

    if (valorcpf.length == cpf) {
        document.getElementById('cpfmae').value = mascaracpf[mascaraInput]
    }
}

function mascaraCP(mascaraInput) {

    const cpf = document.getElementById('cpfpai').maxLength
    let valorcpf = document.getElementById('cpfpai').value
    const mascaracpf = {
        CpfPai: valorcpf.replace(/[^\d]/g, "").replace(/^(\d{3})(\d{3})(\d{3})(\d{2}).*/, '$1.$2.$3-$4')
    };

    if (valorcpf.length == cpf) {
        document.getElementById('cpfpai').value = mascaracpf[mascaraInput]
    }
}

function mascaraCA(mascaraInput) {

    const cpf = document.getElementById('cpfal').maxLength
    let valorcpf = document.getElementById('cpfal').value
    const mascaracpf = {
        Cpfal: valorcpf.replace(/[^\d]/g, "").replace(/^(\d{3})(\d{3})(\d{3})(\d{2}).*/, '$1.$2.$3-$4')
    };

    if (valorcpf.length == cpf) {
        document.getElementById('cpfal').value = mascaracpf[mascaraInput]
    }
}

function verifica(value) {
    var input = document.getElementById("alergiasInpI");

    if (value == "SIM") {
        input.disabled = false;
    } else if (value == "NAO") {
        input.disabled = true;
    } else if (value == "selecione") {
        input.disabled = true;
    }
};


function verifica1(value) {
    var input = document.getElementById("restAlInpI");

    if (value == "SIM") {
        input.disabled = false;
    } else if (value == "NAO") {
        input.disabled = true;
    } else if (value == "selecione") {
        input.disabled = true;
    }
};


function verifica2(value) {
    var input = document.getElementById("tratamentoMInI");

    if (value == "SIM") {
        input.disabled = false;
    } else if (value == "NAO") {
        input.disabled = true;
    } else if (value == "selecione") {
        input.disabled = true;
    }
};


function verifica3(value) {
    var input = document.getElementById("medicacaoInpI");

    if (value == "SIM") {
        input.disabled = false;
    } else if (value == "NAO") {
        input.disabled = true;
    } else if (value == "selecione") {
        input.disabled = true;
    }
};


function verifica4(value) {
    var input = document.getElementById("informacaoInpI");

    if (value == "SIM") {
        input.disabled = false;
    } else if (value == "NAO") {
        input.disabled = true;
    } else if (value == "selecione") {
        input.disabled = true;
    }
};

function handleInput(e) {
    var ss = e.target.selectionStart;
    var se = e.target.selectionEnd;
    e.target.value = e.target.value.toUpperCase();
    e.target.selectionStart = ss;
    e.target.selectionEnd = se;
}

$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 20) {
            $('#btn-topo').fadeIn();
        } else {
            $('#btn-topo').fadeOut();
        }
    });

    $('#btn-topo').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });
});