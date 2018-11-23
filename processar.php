<html>
<head>
<title>Resultado de busca - Curso básico de PHP</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

</head>
<body>


	<div class="album py-5 bg-light">
		<div class="container">
			<div class="row">
			<div class="text-center mb-12">
				<?php

					set_time_limit(0);
					
					require('funcoes.php');
					
					//Recebendo a expressão que vai ser utilizada e o link a procurar.
					$link = $_POST['url'];
					$siteOrigem = $link;
					$expressao = $_POST['expressao'];
					
					
					//Definição de data e hora para fazer o cálculo do tempo de extração, e definiçõa inicial das variaveis de controle.	
					date_default_timezone_set("Brazil/East"); //Define hora do brasil
					$horaAntes = date('H:i');
					$linksPercorridos = 0;
					$extracoes = 0;
					
					
					$folderWay = "extracoes/";
					
					$nomeArquivo = nomeiaArquivo(@$_SESSION['usuarioLogin']);
					
					//Inicio da criação do arquivo.
					@mkdir($folderWay); //Cria pasta com o nome do usuário.
					
					$caminhoArquivo = $folderWay."/".$nomeArquivo;

					
					
					
					//Definição do caminho do arquivo a ser criado já com nome e formato.
					//$caminhoArquivo = $folderWay."/".$nomeArquivo;
					
					//Ponteiro para arquivo a criar.
					$fp = fopen($caminhoArquivo, 'a');
					
					//Cria um vetor GRAVAR com os dados capturados
					$gravar = @pegaDados($link, $expressao);	
					
					//Realiza a gravação dos dados passados no ponteiro passado
					@gravaDados($gravar, $fp);
					$extracoes = count($gravar);

					//Pega os links da página em questão.
					$array = @pegaLink($link, $linksPercorridos);
					//$linksPercorridos = count($array);

					//Entra em um loop para pegar os dados de cada página dos links parrados no vetor.
					foreach(array_unique($array[0]) as $link){
							$gravar = @pegaDados($link, $expressao);
							
							//Realiza a gravação dos dados passados no ponteiro passado
							@gravaDados($gravar, $fp);
							$extracoes = $extracoes + count($gravar);
					}
					
					//Fechando o ponteiro.
					fclose($fp);

					
					//Abreviando vars
					$ip = "Ip: ".$_SERVER["REMOTE_ADDR"];	
					date_default_timezone_set("Brazil/East"); //Define hora do brasil
					$data = date("d:m:Y");
					
					
					echo "<div><h1 class='h1 mb-3 font-weight-normal'>Relatório de extração.</h1></div>";
						
					$tempo = @calcular_tempo_trasnc(date('H:i'),$horaAntes); 
					echo "<div>";
					echo "Site  de origem: ".$siteOrigem."<br>";
					echo "Tempo de execução: ".$tempo."<br>";
					echo "Links percorridos: ".$linksPercorridos."<br>";
					echo "Telefones extraidos: ".$extracoes."<br>";

					if($extracoes > 0){
						echo '<div style="margin-top: 2em;">
								<a target="_blank" href="'.$caminhoArquivo.'"><img src="img/download.png" width="15%" alt="Arquivo" /></a>';
					}
					echo "</div>";


				?>
			</div>
			</div>
		</div>
	</div>


</body>
</html>