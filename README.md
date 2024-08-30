<img width=100% src="https://capsule-render.vercel.app/api?type=waving&color=720FFA&height=180&section=header&text=AV02+-+Trabalho+Prático&fontSize=30&fontColor=DCDCDC&animation=twinkling&fontAlignY=35"/>


  <img src="https://raw.githubusercontent.com/MicaelliMedeiros/micaellimedeiros/master/image/computer-illustration.png" min-width="400px" max-width="400px" width="400px" align="right" alt="Computador iuriCode">


 <h1 align="center">➯ Simulador de Banco </h1>

Um projeto desenvolvido na disciplina de Fundamentos de Programação do Curso Ciência da Computação na Universidade Federal do Ceará - Campus Crateús. Sendo um simulador capaz de simular ações como criar uma conta no banco, depositar, sacar e transferir dinheiro, além de outras funções. Sendo possível novas implementações no futuro.

> :construction: Projeto em construção :construction:

 <h2 align="center"> ➯ Descrição do projeto </h2>
 
 <h3> ➥ Funções: </h3>
 
- `criarConta()`: cria uma nova conta pro usuário no simulador, sendo solicitado o nome e CPF do titular, o qual irá receber o número da sua conta e um saldo inicial zerado;
- `depositar()`: nessa função o usuário é capaz de depositar qualquer valor na conta que ele desejar, desde que ele insira o número da conta a ser depositado o valor;
- `sacar()`: tal função permite ao usuário sacar um valor (desde que exista o valor na conta) da conta em que ele digitar o número;
- `tranferir()`: essa permite transferir valores de uma conta para a outra, sendo solicitado apenas o número da conta de origem e o da de destino;
- `VizuConta()`: nessa função o usuário é capaz de ver todos os dados da conta (titular, CPF, número da conta e saldo) desde que insira o número da conta a qual deseja ver;
- `AtualizarDados()`: tal função permite ao usuário atualizar dados como nome do titular e CPF;
- `fecharConta()`: essa função permite excluir uma conta que foi criada;

<h3> ➥ Desafios enfrentados: </h3> 

- Algumas dificuldades foram em relação ao uso de vetores para armazenar as informações de cada conta, pois eles eram utilizados diversas vezes em cada função.
- Criar if e elses para cada situação dependendo da entrada do usuário também foi um desafio, pois havia várias situações a serem analisadas, por exemplo, no caso da verificação da existência de uma conta antes de realizar operações como saques, depósitos ou transferências etc.
 
<h2 align="center"> ➯ Divisão das tarefas entre os membros da equipe </h2>

Todas ajudaram no código bruto, depois dividimos as funções do simulador para cada:

- `Leticia Almeida`: responsável pela criação das funções criarConta(),  depositar() e sacar(). Além disso ficou responsável pela descrição das suas funções criadas.
- `Isabelli Pinho`: responsável pela criação das funções transferir(), VisuConta() e historicoTrans(). Além disso ficou responsável pela descrição das suas funções criadas.
- `Elislandia Horlanda`: responsável pela criação das funções AtualizarDados() e fecharConta(). Além disso ficou responsável pela criação 'bruta' do relatório e da descrição das suas funções criadas.


 <img width=100% src="https://capsule-render.vercel.app/api?type=waving&color=720FFA&height=120&section=footer"/>

