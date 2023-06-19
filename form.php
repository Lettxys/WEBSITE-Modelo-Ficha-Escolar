<?php
 include("conexao.php");
 include("protect.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EEEP Manoel Mano | Relatório</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/iconmm.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Estilização da Página -->
    <link rel="stylesheet" href="styles/form.css">
  </head>
  <body>
  
  <?php include("sidebar.php")?>

  <form action="processa.php" method="POST">
    <div class="container mt-4 px-md-0">
      <div class="order-form-container">
        <div class="form-header">
          <h2 class="h3 mb-0 text-gray-800 text-success font-weight-light">Ficha de Matrícula</h2>
          <p class="text-secondary">Documento preenchido pelos responsáveis do aluno, no instante de sua inscrição, com dados valiosos e úteis para o acompanhamento e o desenvolvimento do estudante.</p>
        </div>
          <div class="row mb-3">
            <div class="form-floating">
              <input type="text" class="form-control shadow-none" name="nomeAluno" id="none" placeholder="Nome do aluno" oninput="handleInput(event)" required>
              <label class="text-secondary" for="nomeAluno">Nome do aluno</label>
            </div>
          </div>
          <div class="row mb-3">
          <div class="form-floating col-12 col-sm-4 mb-3 mb-sm-0">
            <input type="text" name="cpfAluno" class="form-control shadow-none" id="cpfAluno" placeholder="CPF do Aluno" maxlength="11" oninput="mascaraCPFAluno('cpfAluno')" required>
            <label class="text-secondary" for="cpfAluno">CPF do Aluno</label>
          </div>
          <div class="form-floating col-12 col-sm-4 mb-3 mb-sm-0">
            <input type="date" name="dataNascimento" class="form-control text-secondary shadow-none"  id="dataNascimento" required>
          </div>
          <div class="form-floating col-12 col-sm-4 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="curso" id="curso" required>
              <option value="CURSO" disabled selected >Curso</option>
              <option value="ENFERMAGEM">ENFERMAGEM</option>
              <option value="INFORMÁTICA">INFORMÁTICA</option>
              <option value="ADMINISTRACÃO">ADMINISTRACÃO</option>
              <option value="COMÉRCIO">COMÉRCIO</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-4 px-md-0">
      <div class="order-form-container">
        <div class="form-header">
          <h2 class="h3 mb-0 text-gray-800 text-success font-weight-light pb-3">Dados Adicionais</h2>
        </div>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="sexo" id="sexo" required>
              <option value="" disabled selected >Sexo</option>
              <option value="MASCULINO">MASCULINO</option>
              <option value="FEMININO">FEMININO</option>
              <option value="OUTRO">OUTROS</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="raca" id="raca" required>
              <option value="" disabled selected >Raça</option>
              <option value="BRANCO">BRANCO</option>
              <option value="NEGRO">NEGRO</option>
              <option value="PARDO">PARDO</option>
              <option value="OUTRO">OUTRAS</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <input type="text" name="nac" placeholder="Nacional." class="form-control shadow-none" id="nac" oninput="handleInput(event)" required>
            <label class="text-secondary" for="nac">Nacionalidade</label>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <input type="text" name="nat" placeholder="Natural." class="form-control shadow-none" id="nat" oninput="handleInput(event)"required>
            <label class="text-secondary" for="nat">Naturalidade</label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <input type="text" name="loc" placeholder="Localiz." class="form-control shadow-none" id="loc" oninput="handleInput(event)" required>
            <label class="text-secondary" for="loc">Localização</label>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <input type="text" name="cel" placeholder="Telefone" class="form-control shadow-none" id="cel" maxlength="11" oninput="mascaraTelefone('cel')" required>
            <label class="text-secondary" for="cel">Telefone</label>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <input type="text" name="telpai" placeholder="Telefone" class="form-control shadow-none" id="telpai" maxlength="11" oninput="mascaraTelefone('telpai')" required>
            <label class="text-secondary" for="telpai">Celular</label>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <input type="email" name="emailmae" placeholder="E-mail" class="form-control shadow-none" id="emailmae" required>
            <label for="emailmae" class="text-secondary">E-mail</label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-6 mb-3 mb-sm-0">
            <input type="text" name="nomepai" placeholder="Nome do Pai" class="form-control shadow-none" id="nomepai" oninput="handleInput(event)" required>
            <label class="text-secondary" for="nomepai">Nome do Pai</label>
          </div>
          <div class="form-floating col-12 col-sm-2 mb-3 mb-sm-0">
            <input type="text" name="cpfpai" placeholder="N° do CPF" class="form-control shadow-none" id="cpfpai" maxlength="11" oninput="mascaraCPFAluno('cpfpai')" required>
            <label class="text-secondary" for="cpfpai">CPF</label>
          </div>
          <div class="form-floating col-12 col-sm-2 mb-3 mb-sm-0">
            <input type="text" name="telefonePai" placeholder="Celular" class="form-control shadow-none" id="telefonePai" maxlength="11" oninput="mascaraTelefone('telefonePai')" required>
            <label class="text-secondary" for="telefonePai">Celular</label>
          </div>
          <div class="form-floating col-12 col-sm-2 mb-3 mb-sm-0">
            <input type="text" name="pf" placeholder="Profissão" class="form-control shadow-none" id="pf" oninput="handleInput(event)" required>
            <label for="pf" class="text-secondary">Profissão</label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="nomemae" placeholder="Nome do Mãe" class="form-control shadow-none" id="nomemae" oninput="handleInput(event)" required>
              <label class="text-secondary" for="nomemae">Nome da Mãe</label>
            </div>
            <div class="form-floating col-12 col-sm-2 mb-3 mb-sm-0">
              <input type="text" name="cpfMae" placeholder="N° do CPF" class="form-control shadow-none" id="cpfMae" maxlength="11" oninput="mascaraCPFAluno('cpfMae')" required>
              <label class="text-secondary" for="cpfMae">CPF</label>
            </div>
            <div class="form-floating col-12 col-sm-2 mb-3 mb-sm-0">
              <input type="text" name="telefoneMae" placeholder="Celular" class="form-control shadow-none" id="telefoneMae" maxlength="11" oninput="mascaraTelefone('telefoneMae')" required>
              <label class="text-secondary" for="telefoneMae">Celular</label>
            </div>
            <div class="form-floating col-12 col-sm-2 mb-3 mb-sm-0">
              <input type="text" name="pf2" placeholder="Profissão" class="form-control shadow-none" id="pf2" oninput="handleInput(event)" required>
              <label for="pf2" class="text-secondary">Profissão</label>
            </div>
        </div>
      </div>
    </div>
    <div class="container mt-4 px-md-0">
      <div class="order-form-container">
        <div class="form-header">
          <h2 class="h3 mb-0 text-gray-800 text-success font-weight-light pb-3">Dados Complementares</h2>
        </div>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="transpEscolar" id="teun" required>
              <option value="" disabled selected>Transporte Escolar</option>
              <option value="SIM">SIM</option>
              <option value="NÃO">NÃO</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <input type="text" name="dt" placeholder="Motorista" class="form-control shadow-none" id="dt" oninput="handleInput(event)">
            <label class="text-secondary" for="dt">Motorista</label>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="bolsaFamilia" required>
              <option value="" disabled selected >Bolsa Família</option>
              <option value="SIM">SIM</option>
              <option value="NÃO">NÃO</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <input type="text" name="nis" placeholder="NISS" class="form-control shadow-none" id="nis" maxlength="14">
            <label class="text-secondary" for="nis">NISS</label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-6 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="deficiencia" id="dsd" required> 
                <option value="" disabled selected >Tipo de deficiência/TGD ou altas habilidades de superdotação</option>
                <option value="SIM">SIM</option>
                <option value="NÃO">NÃO</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-6 mb-3 mb-sm-0">
            <input type="text" name="rec" placeholder="Recursos necessários para participação em avaliações externas" class="form-control shadow-none" id="rec" oninput="handleInput(event)">
            <label class="text-secondary" for="rec">Recursos Necessários</label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-header">
            <h2 class="h3 mb-0 text-gray-800 text-success font-weight-light pb-3">Detalhamento da Matrícula</h2>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                    <th scope="col" class="text-success"></th>
                    <th scope="col" class="text-success">Ano Letivo</th>
                    <th scope="col" class="text-success">Série/Turma</th>
                    <th scope="col" class="text-success">Data de Matrícula</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="text-success">1</th>
                  <td><input type="year" name="anolet1" class="form-control form-control-sm" id="anolet1" maxlength="4"></td>
                  <td><input type="text" name="turma1" class="form-control form-control-sm" id="turma1" maxlength="1"></td>
                  <td><input type="date" name="datamt1" class="form-control form-control-sm" id="datamt1"></td>
                </tr>
                <tr>
                  <th scope="row" class="text-success">2</th>
                  <td><input type="year" name="anolet2" class="form-control form-control-sm" id="anolet2" maxlength="4"></td>
                  <td><input type="text" name="turma2" class="form-control form-control-sm" id="turma2" maxlength="1"></td>
                  <td><input type="date" name="datamt2" class="form-control form-control-sm" id="datamt2"></td>
                </tr>
                  <tr>
                    <th scope="row" class="text-success">3</th>
                    <td><input type="year" name="anolet3" class="form-control form-control-sm" id="anolet3" maxlength="4"></td>
                    <td><input type="text" name="turma3" class="form-control form-control-sm" id="turma3" maxlength="1"></td>
                    <td><input type="date" name="datamt3" class="form-control form-control-sm" id="datamt3"></td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="container border-start border-4 border-secondary mt-4 px-md-0">
      <div class="order-form-container">
        <div class="form-header pb-3">
          <h2 class="h3 mb-0 text-gray-800 text-secondary font-weight-light">Progressão Parcial</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col" class="text-start text-secondary">Ano Letivo</th>
                <th scope="col" class="text-start text-secondary">Escola</th>
                <th scope="col" class="text-start text-secondary">Série</th>
                <th scope="col" class="text-start text-secondary">Disciplina</th>
                <th scope="col" class="text-start text-secondary">Resultado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row" class="text-secondary">1</th>
                <td><input type="year" name="anoletivo1" class="form-control form-control-sm" id="anoletivo1" maxlength="4"></td>
                <td><input type="text" name="esc1" class="form-control form-control-sm" id="esc1" oninput="handleInput(event)"></td>
                <td><input type="text" name="serie1" class="form-control form-control-sm" id="serie1" maxlength="1"></td>
                <td><input type="text" name="disci1" class="form-control form-control-sm" id="disci1" oninput="handleInput(event)"></td>
                <td><input type="text" name="res1" class="form-control form-control-sm" id="res1" maxlength="3"></td>
              </tr>
              <tr>
                <th scope="row" class="text-secondary">2</th>
                <td><input type="year" name="anoletivo2" class="form-control form-control-sm" id="anoletivo2" maxlength="4"></td>
                <td><input type="text" name="esc2" class="form-control form-control-sm" id="esc2" oninput="handleInput(event)"></td>
                <td><input type="text" name="serie2" class="form-control form-control-sm" id="serie2" maxlength="1"></td>
                <td><input type="text" name="disci2" class="form-control form-control-sm" id="disci2" oninput="handleInput(event)"></td>
                <td><input type="text" name="res2" class="form-control form-control-sm" id="res2" maxlength="3"></td>
              </tr>
              <tr>
                <th scope="row" class="text-secondary">3</th>
                <td><input type="year" name="anoletivo3" class="form-control form-control-sm" id="anoletivo3" maxlength="4"></td>
                <td><input type="text" name="esc3" class="form-control form-control-sm" id="esc3" oninput="handleInput(event)"></td>
                <td><input type="text" name="serie3" class="form-control form-control-sm" id="serie3" maxlength="1"></td>
                <td><input type="text" name="disci3" class="form-control form-control-sm" id="disci3" oninput="handleInput(event)"></td>
                <td><input type="text" name="res3" class="form-control form-control-sm" id="res3" maxlength="3"></td>
              </tr>
              <tr>
                <th scope="row" class="text-secondary">4</th>
                <td><input type="year" name="anoletivo4" class="form-control form-control-sm" id="anoletivo4" maxlength="4"></td>
                <td><input type="text" name="esc4" class="form-control form-control-sm" id="esc4" oninput="handleInput(event)"></td>
                <td><input type="text" name="serie4" class="form-control form-control-sm" id="serie4" maxlength="1"></td>
                <td><input type="text" name="disci4" class="form-control form-control-sm" id="disci4" oninput="handleInput(event)"></td>
                <td><input type="text" name="res4" class="form-control form-control-sm" id="res4" maxlength="3"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="container border-start border-4 border-warning mt-4 px-md-0">
      <div class="order-form-container">
        <div class="form-header">
          <h2 class="h3 mb-0 text-gray-800 text-warning font-weight-light pb-3">Questionário Socioeconômico do Aluno</h2>
          <p class="text-secondary">O Questionário Socioeconômico do Aluno coleta dados sobre renda, moradia e recursos educacionais, fornecendo informações para ações de apoio e inclusão socioeconômica na educação.</p>
          <h3 class="h4 mb-0 text-gray-800 text-warning font-weight-light pb-3">Dados referentes aos pais ou responsáveis</h3>
        </div>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <input type="text" name="ipai" placeholder="Idade do Pai" class="form-control shadow-none" id="ipai" required>
            <label class="text-secondary" for="ipai">Idade do Pai</label>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <input type="text" name="ppai" placeholder="Profissão do Pai" class="form-control shadow-none" id="ppai" oninput="handleInput(event)" required>
            <label class="text-secondary" for="ppai">Profissão do Pai</label>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="escolPai" id="escol" required>
              <option value="" disabled selected >Escolaridade</option>
              <option value="ENSINO FUNDAMENTAL COMPLETO">ENSINO FUNDAMENTAL COMPLETO</option>
              <option value="ENSINO FUNDAMENTAL INCOMPLETO">ENSINO FUNDAMENTAL INCOMPLETO</option>
              <option value="ENSINO MÉDIO COMPLETO">ENSINO MÉDIO COMPLETO</option>
              <option value="ENSINO MÉDIO INCOMPLETO">ENSINO MÉDIO INCOMPLETO</option>
              <option value="SUPERIOR COMPLETO">SUPERIOR COMPLETO</option>
              <option value="SUPERIOR INCOMPLETO">SUPERIOR INCOMPLETO</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <select value="" class="form-select text-secondary" name="empPai" id="emp" required>
              <option value="" disabled selected >Está Empregado</option>
              <option value="SIM">SIM</option>
              <option value="NÃO">NÃO</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <input type="text" name="imae" placeholder="Idade da Mãe" class="form-control shadow-none" id="imae" required>
            <label class="text-secondary" for="imae">Idade da Mãe</label>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <input type="text" name="pmae" placeholder="Profissão da Mãe" class="form-control shadow-none" id="pmae" oninput="handleInput(event)" required>
            <label class="text-secondary" for="pmae">Profissão da Mãe</label>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
          <select class="form-select text-secondary" name="escol2" id="escol2" required>
            <option value="" disabled selected >Escolaridade</option>
            <option value="ENSINO FUNDAMENTAL COMPLETO">ENSINO FUNDAMENTAL COMPLETO</option>
            <option value="ENSINO FUNDAMENTAL INCOMPLETO">ENSINO FUNDAMENTAL INCOMPLETO</option>
            <option value="ENSINO MÉDIO COMPLETO">ENSINO MÉDIO COMPLETO</option>
            <option value="ENSINO MÉDIO INCOMPLETO">ENSINO MÉDIO INCOMPLETO</option>
            <option value="SUPERIOR COMPLETO">SUPERIOR COMPLETO</option>
            <option value="SUPERIOR INCOMPLETO">SUPERIOR INCOMPLETO</option>
          </select>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="empMae" id="emmp2" required>
              <option value="" disabled selected >Está Empregado</option>
              <option value="SIM">SIM</option>
              <option value="NÃO">NÃO</option>
            </select>
          </div>
        </div>
        <h3 class="h4 mb-0 text-gray-800 text-warning font-weight-light pb-3">Caso o aluno tenha outro responsável</h3>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <input type="text" name="ir" placeholder="Idade" class="form-control shadow-none" id="ir">
            <label class="text-secondary" for="ir">Idade</label>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
          <input type="text" name="pr" placeholder="Profissão" class="form-control shadow-none" id="pr" oninput="handleInput(event)">
          <label class="text-secondary" for="pr">Profissão</label>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="escol3" id="escol3">
              <option value="" disabled selected >Escolaridade</option>
              <option value="ENSINO FUNDAMENTAL COMPLETO">ENSINO FUNDAMENTAL COMPLETO</option>
              <option value="ENSINO FUNDAMENTAL INCOMPLETO">ENSINO FUNDAMENTAL INCOMPLETO</option>
              <option value="ENSINO MÉDIO COMPLETO">ENSINO MÉDIO COMPLETO</option>
              <option value="ENSINO MÉDIO INCOMPLETO">ENSINO MÉDIO INCOMPLETO</option>
              <option value="SUPERIOR COMPLETO">SUPERIOR COMPLETO</option>
              <option value="SUPERIOR INCOMPLETO">SUPERIOR INCOMPLETO</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-3 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="emp3" id="emp3">
              <option value="" disabled selected >Está Empregado(a)</option>
              <option value="SIM">SIM</option>
              <option value="NÃO">NÃO</option>
            </select>
          </div>
        </div>
        <h3 class="h4 mb-0 text-gray-800 text-warning font-weight-light pb-3">Dados referente a família</h3>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-4 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="mor" id="mor" required>
              <option value="" disabled selected >Moradia</option>
              <option value="PRÓPRIA">PRÓPRIA</option>
              <option value="ALUGADA">ALUGADA</option>
              <option value="OUTRA">OUTRA</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-4 mb-3 mb-sm-0">
            <input type="text" name="qi" placeholder="Quant. Irmãos" class="form-control shadow-none" id="qi" required>
            <label class="text-secondary" for="qi">Quant. Irmãos</label>
          </div>
          <div class="form-floating col-12 col-sm-4 mb-3 mb-sm-0">
           <input type="text" name="qp" placeholder="Quant. pessoas que residem" class="form-control shadow-none" id="qp" required>
           <label class="text-secondary" for="qp">Num. Membros</label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-4 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="rms" id="rms" required>
              <option value="" disabled selected >Renda Mensal</option>
              <option value="MENOS DE 1 SALÁRIO MÍNIMO">MENOS DE 1 SALÁRIO MÍNIMO</option>
              <option value="DE 1 A 2 SALÁRIOS MÍNIMOS">DE 1 A 2 SALÁRIOS MÍNIMOS</option>
              <option value="DE 3 A 4 SALÁRIOS MÍNIMOS">DE 3 A 4 SALÁRIOS MÍNIMOS</option>
              <option value="DE 4 A 5 SALÁRIOS MÍNIMOS">DE 4 A 5 SALÁRIOS MÍNIMOS</option>
              <option value="MAIOR QUE 5 SALÁRIOS MÍNIMOS">MAIOR QUE 5 SALÁRIOS MÍNIMOS</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-4 mb-3 mb-sm-0">
            <select  class="form-select text-secondary" name="am" id="am" required>
              <option value="" disabled selected >Composição Familiar</option>
              <option value="PAI">PAI</option>
              <option value="MÃE">MÃE</option>
              <option value="AMBOS">AMBOS</option>
              <option value="OUTROS">OUTROS</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-4 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="tc" id="tc" required>
              <option value="" disabled selected >Computador ao Acesso a Internet</option>
              <option value="SIM">SIM</option>
              <option value="NÃO">NÃO</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-4 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="bg" id="bg" required>
              <option value="" disabled selected >Benefício Governo</option>
              <option value="SIM">SIM</option>
              <option value="NÃO">NÃO</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-4 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="te" id="te" required>
              <option value="" disabled selected >Transporte Escolar</option>
              <option value="A PÉ">A PÉ</option>
              <option value="BICICLETA">BICICLETA</option>
              <option value="TRANSPORTE COLETIVO">TRANSPORTE COLETIVO</option>
              <option value="TRANSPORTE PRÓPRIO">TRANSPORTE PRÓPRIO</option>
              <option value="TRANSPORTE ESCOLAR">TRANSPORTE ESCOLAR</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-4 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="cef" id="cef" required>
              <option value="" disabled selected >Concluiu o Ensino Fundamental</option>
              <option value="ESCOLA PÚBLICA">ESCOLA PÚBLICA</option>
              <option value="ESCOLAR PARTICULAR">ESCOLAR PARTICULAR</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-6 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="pqeep" id="pqeep" required>
            <option value="" disabled selected >Optou pela EEEP Manoel Mano</option>
              <option value="É PERTO DA ESCOLA">É PERTO DA ESCOLA</option>
              <option value="PELA JORNADA INTEGRAL">PELA JORNADA INTEGRAL</option>
              <option value="PELO CURSO TÉCNICO">PELO CURSO TÉCNICO</option>
              <option value="PELA QUALIDADE DE ENSINO">PELA QUALIDADE DE ENSINO</option>
              <option value="PARA SE PREPARAR PARA VESTIBULARES">PARA SE PREPARAR PARA VESTIBULARES</option>
              <option value="PARA SE PREPARAR PARA JORNADA DE TRABALHO">PARA SE PREPARAR PARA JORNADA DE TRABALHO</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-6 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="ssc" id="ssc" required>
              <option value="" disabled selected >O que você sabe sobre o curso profissional</option>
              <option value="NADA SEI">NADA SEI</option>
              <option value="POUCO SEI">POUCO SEI</option>
              <option value="TENHO NOÇÕES BÁSICAS">TENHO NOÇÕES BÁSICAS</option>
              <option value="CONHEÇO O CURSO">CONHEÇO O CURSO</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-6 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="pqc" id="pqc" required>
              <option value="" disabled selected >Justifique a escolha do curso profissional</option>
              <option value="AFINIDADE DO ALUNO COM O CURSO">AFINIDADE DO ALUNO COM O CURSO</option>
              <option value="SUGESTÃO DA FAMÍLIA">SUGESTÃO DA FAMÍLIA</option>
              <option value="POR SER UM CURSO CONCEITUADO NO MERCADO DE TRABALHO">POR SER UM CURSO CONCEITUADO NO MERCADO DE TRABALHO</option>
              <option value="NÃO TINHA OUTRA OPÇÃO">NÃO TINHA OUTRA OPÇÃO</option>
            </select>
          </div>
          <div class="form-floating col-12 col-sm-6 mb-3 mb-sm-0">
            <select class="form-select text-secondary" name="oic" id="oic" required>
              <option value="" disabled selected >Onde você obteve informações sobre o curso profissional</option>
              <option value="RÁDIO, TV, LIVROS, INTERNET">RÁDIO, TV, LIVROS, INTERNET ...</option>
              <option value="PROFISSIONAIS QUE ATUAM NA ÁREA">PROFISSIONAIS QUE ATUAM NA ÁREA</option>
              <option value="NA PRÓPRIA ESCOLA">NA PRÓPRIA ESCOLA</option>
              <option value="NÃO TIVE INFORMAÇÕES">NÃO TIVE INFORMAÇÕES</option>
            </select>
          </div>
        </div>
        <h3 class="h4 mb-0 text-gray-800 text-warning font-weight-light pb-3">Dados referente conclusão do formulário</h3>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-6 mb-3 mb-sm-0">
            <input type="text" name="rpa" placeholder="Responsável do aluno" class="form-control shadow-none" id="rpa" oninput="handleInput(event)" required>
            <label class="text-secondary" for="rpa">Responsável do aluno</label>
          </div>
          <div class="form-floating col-12 col-sm-6 mb-3 mb-sm-0">
            <input type="text" name="rpm" placeholder="Responsável pela matrícula" class="form-control shadow-none" id="rpm" oninput="handleInput(event)" required>
            <label class="text-secondary" for="rpm">Responsável pela matrícula</label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-floating col-12 col-sm-6 mb-3 mb-sm-0">
            <input type="text" name="ns" placeholder="Nome do secretário(a)" class="form-control shadow-none" id="ns" oninput="handleInput(event)" required>
            <label class="text-secondary" for="ns">Nome do secretário(a)</label>
          </div>
          <div class="form-floating col-12 col-sm-6 mb-3 mb-sm-0">
            <input type="date" name="data" class="form-control text-secondary shadow-none" id="data" required>
          </div>
        </div>
      </div>
    </div>
    <div class="container border-start border-4 border-primary mt-4 px-md-0">
      <div class="order-form-container">
        <div class="form-header">
          <h2 class="h3 mb-0 text-gray-800 text-primary font-weight-light pb-3">Ficha de Saúde</h2>
          <p class="text-secondary">Documento que contém informações sobre a saúde de uma pessoa, incluindo histórico médico, alergias, medicamentos e informações de contato de emergência, sendo importante para garantir cuidados adequados e fornecer informações relevantes em casos de emergência.</p>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tbody>                        
                <tr>
                  <th scope="row" class="text-primary">1</th>
                  <td style="width:500px"><label class="text-secondary">É dependente em plano de saúde?</label></td>
                  <td style="width: 150px;"></i>
                    <select class="form-select text-secondary" name="dependentePSN" id="dependentePSI" required>
                      <option value="" class="text-secondary" disabled selected hidden>Selecione</option>
                      <option value="SIM" class="text-secondary">SIM</option>
                      <option value="NAO" class="text-secondary">NAO</option>
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row" class="text-primary">2</th>
                  <td><label class="text-secondary">Tem algum problema de saúde crônico?</label></td>
                  <td>
                    <select class="form-select text-secondary" name="problemaSCN" id="problemaSCI" required>
                        <option value="" class="text-secondary" disabled selected hidden>Selecione</option>
                        <option value="SIM" class="text-secondary">SIM</option>
                        <option value="NAO" class="text-secondary">NAO</option>
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row" class="text-primary">3</th>
                  <td>
                    <label class="text-secondary">Tem alergia(s)?</label>
                  </td>
                  <td>
                      <select class="form-select text-secondary" name="alergiasN" id="alergiasI" onchange="verifica(this.value)" required>
                          <option value="" class="text-secondary" disabled selected hidden>Selecione</option>
                          <option value="SIM" class="text-secondary">SIM</option>
                          <option value="NAO" class="text-secondary">NAO</option> 
                      </select>
                  </td>
                  <td style="text-align: center;">
                      <label class="text-secondary">Se sim, qual(is)?</label>
                  </td>
                  <td>
                      <input type="text" placeholder="Digite aqui" id="alergiasInpI" class="form-control form-control-sm" name="alergiasInpN" oninput="handleInput(event)" disabled required >
                  </td>
                </tr>
                <tr>
                  <th scope="row" class="text-primary">4</th>
                  <td><label class="text-secondary">Possui alguma restrição alimentar?</label></td>
                  <td> 
                    <select class="form-select text-secondary" name="restricaoAlN" id="restricaoAlI"  onchange="verifica1(this.value)" required>
                      <option value="" class="text-secondary" disabled selected hidden>Selecione</option>
                      <option value="SIM" class="text-secondary">SIM</option>
                      <option value="NAO" class="text-secondary">NAO</option>
                    </select>
                  </td>
                  <td style="text-align: center;">
                    <label class="text-secondary">Se sim, qual(is)?</label>
                  </td>
                  <td>
                    <input type="text" placeholder="Digite aqui" id="restAlInpI" class="form-control form-control-sm" name="restAlInpN" oninput="handleInput(event)" disabled required>
                  </td>
                </tr>
                <tr>
                  <th scope="row" class="text-primary">5</th>
                    <td>
                      <label class="text-secondary">Já recebeu diagnóstico médico de deficiência?</label>
                    </td>
                  <td>
                    <select class="form-select text-secondary" name="deficienciaN" id="deficienciaI" required>
                      <option value="" class="text-secondary" disabled selected hidden>Selecione</option>
                      <option value="SIM" class="text-secondary">SIM</option>
                      <option value="NAO" class="text-secondary">NAO</option>
                    </select>
                  </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                  <th scope="row" class="text-primary">6</th>
                    <td>
                      <label class="text-secondary">Apresenta alguma dificuldade motora, auditiva, visual, na fala ou emocional?</label>
                    </td>
                    <td style="height: 15px;">
                      <select class="form-select text-secondary" name="dificuldadeN" id="dificuldadeI" required>
                        <option value="" class="text-secondary" disabled selected hidden>Selecione</option>
                        <option value="SIM" class="text-secondary">SIM</option>
                        <option value="NAO" class="text-secondary">NAO</option>
                      </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                  <th scope="row" class="text-primary">7</th>
                  <td>
                    <label class="text-secondary">Está em tratamento médico?</label>
                  </td>
                  <td>
                    <select class="form-select text-secondary" name="tratamentoMN" id="tratamentoMI" onchange="verifica2(this.value)" required>
                      <option value="" class="text-secondary" disabled selected hidden>Selecione</option>
                      <option value="SIM" class="text-secondary">SIM</option>
                      <option value="NAO" class="text-secondary">NAO</option>
                    </select>
                  </td>
                  <td style="text-align: center;">
                    <label class="text-secondary">Se sim, qual? E para que doença?</label>
                  </td>
                  <td>
                    <input type="text" id="tratamentoMInI" placeholder="Digite aqui" class="form-control form-control-sm" name="tratamentoMInN" oninput="handleInput(event)" disabled required >
                  </td>
                </tr>
                <tr>
                <th scope="row" class="text-primary">8</th>
                <td><label class="text-secondary">Está em uso de alguma medicação?</label></td>
                <td>
                  <select class="form-select text-secondary" name="medicacaoN" id="medicacaoI" onchange="verifica3(this.value)" required>
                    <option value="" class="text-secondary" disabled selected hidden>Selecione</option>
                    <option value="SIM" class="text-secondary">SIM</option>
                    <option value="NAO" class="text-secondary">NAO</option>
                  </select>
                </td>
                <td style="text-align: center;">
                  <label class="text-secondary">Qual? Quando encerrará o uso?</label>
                </td>
                <td>
                  <input type="text" id="medicacaoInpI" placeholder="Digite aqui" class="form-control form-control-sm" name="medicacaoInpN" oninput="handleInput(event)" disabled required>
                </td>
                </tr>
                <tr>
                  <th scope="row" class="text-primary">9</th>
                  <td>
                    <label class="text-secondary">As vacinas do calendário de vacinação do Ministério da Saúde estão em dia?</label>
                  </td>
                  <td>
                    <select class="form-select text-secondary" name="vacinaN" id="vacinaI" required>
                      <option value="" class="text-secondary" disabled selected hidden>Selecione</option>
                      <option value="SIM" class="text-secondary">SIM</option>
                      <option value="NAO" class="text-secondary">NAO</option>
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row" class="text-primary">10</th>
                  <td>
                    <label class="text-secondary">É acompanhado por psicólogo, terapeuta ocupacional ou fonoaudiólogo?</label>
                  </td>
                  <td>
                  <select class="form-select text-secondary" name="acompanhadoN" id="acompanhadoI" required>
                    <option value="" class="text-secondary" disabled selected hidden>Selecione</option>
                    <option value="SIM" class="text-secondary">SIM</option>
                    <option value="NAO" class="text-secondary">NAO</option>
                  </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <th scope="row" class="text-primary">11</th>
                  <td>
                    <label class="text-secondary">Em caso de emergência para quem ligar e em qual número?</label>
                  </td>
                  <td>
                    <select class="form-select text-secondary" name="emergencia" id="emergencia" required>
                      <option value="" class="text-secondary" disabled selected hidden>Selecione</option>
                      <option value="PAI" class="text-secondary">PAI</option>
                      <option value="MAE" class="text-secondary">MÃE</option>
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                <br>
                <tr>
                  <th scope="row" class="text-primary">12</th>
                  <td>
                      <label class="text-secondary">Existe alguma outra informação a respeito da saúde do aluno que o responsável queira fazer constar desta ficha?</label>
                  </td>
                  <td>
                    <select class="form-select text-secondary" name="informacaoN" id="informacaoI" onchange="verifica4(this.value)" required>
                      <option value="" class="text-secondary" disabled selected hidden>Selecione</option>
                      <option value="SIM" class="text-secondary">SIM</option>
                      <option value="NAO" class="text-secondary">NAO</option>
                    </select>
                  </td>
                  <td style="text-align: center;">
                    <label class="text-secondary text-secondary">Se sim, qual(is)?</label>
                  </td>
                  <td>
                    <input type="text" placeholder="Digite aqui" id="informacaoInpI" name="informacaoInpN" class="form-control form-control-sm" oninput="handleInput(event)" disabled required >
                  </td>
                </tr>
            </tbody>
          </table>
       </div>
      </div>
    </div>
    <div class="container border-0 mt-4 px-md-0">
      <div class="order-form-container">
        <div class="row mb-1">
          <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-outline-success" name="cadastrar">Enviar</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <button onclick="backToTop()" id="btnTop">⇪</button>

  <!-- Script da Máscara -->
   <script src="script/mask.js"></script>
   <script>
    function mascaraCPFAluno(mascaraInput) {
      const cpf = document.getElementById(mascaraInput).maxLength;
      let valorcpf = document.getElementById(mascaraInput).value;
      const mascaracpf = valorcpf.replace(/[^\d]/g, "").replace(/^(\d{3})(\d{3})(\d{3})(\d{2}).*/, '$1.$2.$3-$4');

      if (valorcpf.length == cpf) {
        document.getElementById(mascaraInput).value = mascaracpf;
      }
    }
    function mascaraTelefone(telefoneInput) {
      const telefone = document.getElementById(telefoneInput).maxLength;
      let valorTelefone = document.getElementById(telefoneInput).value;
      const mascaraTelefone = valorTelefone.replace(/[^\d]/g, "").replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');

      if (valorTelefone.length == telefone) {
        document.getElementById(telefoneInput).value = mascaraTelefone;
      }
    }
    
    </script>

<script>
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: $(this.hash).offset().top
                    }, 600);
                });
            });
        </script>

        <script>
            window.onscroll = function() {
                scroll();
            }

            function scroll() {
                var btn = document.getElementById("btnTop");
                if (document.documentElement.scrollTop > 200) {
                    btn.style.display = "block";
                } else {
                    btn.style.display = "none";
                }
            }

            function backToTop() {
                document.documentElement.scrollTop = 0;
            }
        </script>



   <!-- Jquery -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <!-- Ajax -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
   <!-- Bootstrap Script -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</script>
  </body>
</html>