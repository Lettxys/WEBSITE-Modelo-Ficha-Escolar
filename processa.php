<?php

include("conexao.php");

if(isset($_POST['cadastrar'])) {
    $nome = $_POST['nomeAluno'];
    $dataNascimento = $_POST['dataNascimento'];
    $cpf = $_POST['cpfAluno'];
    $curso = $_POST['curso'];
    $sexo = $_POST['sexo'];
    $raca = $_POST['raca'];
    $nacionalidade = $_POST['nac'];
    $naturalidade = $_POST['nat'];
    $localizacao = $_POST['loc'];
    $telefoneResidencial = $_POST['cel'];
    $celular = $_POST['telpai'];
    $email = $_POST['emailmae'];
    $nomePai = $_POST['nomepai'];
    $cpfPai = $_POST['cpfpai'];
    $telefonePai = $_POST['telefonePai'];
    $profissao2 = $_POST['pf'];
    $nomeMae = $_POST['nomemae'];
    $cpfMae = $_POST['cpfMae'];
    $telefoneMae = $_POST['telefoneMae'];
    $pf2 = $_POST['pf2'];
    $transpEscolar = $_POST['transpEscolar'];
    $motorista = $_POST['dt'];
    $bolsaFamilia = $_POST['bolsaFamilia'];
    $nis = $_POST['nis'];
    $deficiencia = $_POST['deficiencia'];
    $recusos = $_POST['rec'];
    $anoLetivo1 = $_POST['anolet1'];
    $turma1 = $_POST['turma1'];
    $dataMatricula1 = $_POST['datamt1'];
    $anoLetivo2 = $_POST['anolet2'];
    $turma2 = $_POST['turma2'];
    $dataMatricula2 = $_POST['datamt2'];
    $anoLetivo3 = $_POST['anolet3'];
    $turma3 = $_POST['turma3'];
    $dataMatricula3 = $_POST['datamt3'];
    $anoletivo4 = $_POST['anoletivo1'];
    $escola1 = $_POST['esc1'];
    $serie1 = $_POST['serie1'];
    $disciplina1 = $_POST['disci1'];
    $resultado1 = $_POST['res1'];
    $anoletivo5 = $_POST['anoletivo2']; 
    $escola2 = $_POST['esc2'];
    $serie2 = $_POST['serie2'];
    $disciplina2 = $_POST['disci2'];
    $resultado2 = $_POST['res2'];
    $anoletivo6 = $_POST['anoletivo3']; 
    $escola3 = $_POST['esc3'];
    $serie3 = $_POST['serie3'];
    $disciplina3 = $_POST['disci3'];
    $resultado3 = $_POST['res3'];
    $anoletivo7 = $_POST['anoletivo4']; 
    $escola4 = $_POST['esc4'];
    $serie4 = $_POST['serie4'];
    $disciplina4 = $_POST['disci4'];
    $resultado4 = $_POST['res4'];
    $idadePai = $_POST['ipai'];
    $profissaoPai = $_POST['ppai'];
    $escolaridadePai = $_POST['escolPai'];
    $empregado = $_POST['empPai'];
    $idadeMae = $_POST['imae'];
    $profissaoMae = $_POST['pmae'];
    $escolaridadeMae = $_POST['escol2'];
    $empregadoMae = $_POST['empMae'];
    $idade = $_POST['ir'];
    $profissao = $_POST['pr'];
    $escolaridadeOutroResponsavel = $_POST['escol3'];
    $empregaOutroResponsavel = $_POST['emp3'];
    $moradia = $_POST['mor'];
    $quantidadeIrmaos = $_POST['qi'];
    $quantidadesResidentes = $_POST['qp'];
    $rendaMensalFamiliar = $_POST['rms'];
    $alunoMora = $_POST['am'];
    $acessoInternet = $_POST['tc'];
    $beneficioGoverno = $_POST['bg'];
    $transporteEscolarAluno = $_POST['te'];
    $alunoEnsinoFundamental = $_POST['cef'];
    $optouEEEPManoelMano = $_POST['pqeep'];
    $oquesabe = $_POST['ssc'];
    $escolhaCurso = $_POST['pqc'];
    $informacoesCurso = $_POST['oic'];
    $nomeResponsavelAluno = $_POST['rpa'];
    $responsavelMatricula = $_POST['rpm'];
    $nomeSecretaria = $_POST['ns'];
    $data1 = $_POST['data'];
    $dependentePSN = $_POST['dependentePSN'];
    $problemaSCN = $_POST['problemaSCN'];
    $alergiasN = $_POST['alergiasN'];
    $alergiasInpN = $_POST['alergiasInpN'];
    $restricaoAlN = $_POST['restricaoAlN'];
    $restAlInpN = $_POST['restAlInpN'];
    $deficienciaN = $_POST['deficienciaN'];
    $dificuldadeN = $_POST['dificuldadeN'];
    $tratamentoMN = $_POST['tratamentoMN'];
    $tratamentoMInN=$_POST['tratamentoMInN'];
    $medicacaoN = $_POST['medicacaoN'];
    $medicacaoInpN = $_POST['medicacaoInpN'];
    $vacinaN = $_POST['vacinaN'];
    $acompanhadoN = $_POST['acompanhadoN'];
    $emergencia = $_POST['emergencia'];
    $informacaoN = $_POST['informacaoN'];
    $informacaoInpN = $_POST['informacaoInpN'];

    $salvar = mysqli_query($mysqli, "INSERT INTO Dados (nome, dataNascimento, cpf, curso, sexo, raca, nacionalidade, naturalidade, localizacao, telefoneResidencial, celular, email, nomePai, cpfPai, telefonePai, profissao2, nomeMae, cpfMae, telefoneMae, pf2, transpEscolar, motorista, bolsaFamilia, nis, deficiencia, recusos, anoLetivo1, turma1, dataMatricula1, anoLetivo2, turma2, dataMatricula2, anoLetivo3, turma3, dataMatricula3, anoletivo4, escola1, serie1, disciplina1, resultado1, anoletivo5, escola2, serie2, disciplina2, resultado2, anoletivo6, escola3, serie3, disciplina3, resultado3, anoletivo7, escola4, serie4, disciplina4, resultado4, idadePai, profissaoPai, escolaridadePai, empregado, idadeMae, profissaoMae, escolaridadeMae, empregadoMae, idade, profissao, escolaridadeOutroResponsavel, empregaOutroResponsavel, moradia, quantidadeIrmaos, quantidadesResidentes, rendaMensalFamiliar, alunoMora, acessoInternet, beneficioGoverno, transporteEscolarAluno, alunoEnsinoFundamental, optouEEEPManoelMano, oquesabe, escolhaCurso, informacoesCurso, nomeResponsavelAluno, responsavelMatricula, nomeSecretaria, data1, dependentePSN, problemaSCN, alergiasN, alergiasInpN, restricaoAlN, restAlInpN, deficienciaN, dificuldadeN, tratamentoMN, tratamentoMInN, medicacaoN, medicacaoInpN, vacinaN, acompanhadoN, emergencia, informacaoN, informacaoInpN) VALUES ('$nome', '$dataNascimento', '$cpf', '$curso', '$sexo', '$raca', '$nacionalidade', '$naturalidade', '$localizacao', '$telefoneResidencial', '$celular', '$email', '$nomePai', '$cpfPai', '$telefonePai', '$profissao2', '$nomeMae', '$cpfMae', '$telefoneMae', '$pf2', '$transpEscolar', '$motorista', '$bolsaFamilia', '$nis', '$deficiencia', '$recusos', '$anoLetivo1', '$turma1', '$dataMatricula1', '$anoLetivo2', '$turma2', '$dataMatricula2', '$anoLetivo3', '$turma3', '$dataMatricula3', '$anoletivo4', '$escola1', '$serie1', '$disciplina1', '$resultado1', '$anoletivo5', '$escola2', '$serie2', '$disciplina2', '$resultado2','$anoletivo6', '$escola3', '$serie3', '$disciplina3', '$resultado3', '$anoletivo7', '$escola4', '$serie4', '$disciplina4', '$resultado4', '$idadePai', '$profissaoPai', '$escolaridadePai', '$empregado', '$idadeMae', '$profissaoMae', '$escolaridadeMae', '$empregadoMae', '$idade', '$profissao', '$escolaridadeOutroResponsavel', '$empregaOutroResponsavel', '$moradia', '$quantidadeIrmaos', '$quantidadesResidentes', '$rendaMensalFamiliar', '$alunoMora', '$acessoInternet', '$beneficioGoverno', '$transporteEscolarAluno', '$alunoEnsinoFundamental', '$optouEEEPManoelMano', '$oquesabe', '$escolhaCurso', '$informacoesCurso', '$nomeResponsavelAluno', '$responsavelMatricula', '$nomeSecretaria', '$data1', '$dependentePSN', '$problemaSCN', '$alergiasN', '$alergiasInpN', '$restricaoAlN', '$restAlInpN', '$deficienciaN', '$dificuldadeN', '$tratamentoMN', '$tratamentoMInN', '$medicacaoN', '$medicacaoInpN', '$vacinaN', '$acompanhadoN', '$emergencia', '$informacaoN', '$informacaoInpN')");
    if ($salvar) {
        header('location: form.php');
    }else{
        echo "Falha ao conectar com banco de dados.";
    }
}

?>