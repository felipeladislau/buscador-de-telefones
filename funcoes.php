<?PHP

/* 
Função para pegar dados de um link usando uma expressão, passe como parâmetro um link e uma regex válida,
a função vai procurar os resultados dessa expressão no link e salvar cada um como único em um array resultados.
A função vai retornar um array com todos os resultados.
*/
function pegaDados($link, $expressao){

	$url = @file_get_contents($link);

	preg_match_all($expressao, $url, $matches);
	$j=0;
	for($i = 0; $i < count($matches[0]); $i++) $matches[0][$i] = strtolower($matches[0][$i]);
		foreach(array_unique($matches[0]) as $email){
			$gravar[$j] = $email;
			$j++;
			}
			return $gravar;

}


/*
A função pega todos os links em uma determinada página, e retorna todos estes
links em um array, únicos ou não.
*/
function pegaLink($linkorig, &$linksPercorridos){

	$url = @file_get_contents($linkorig);
	
	preg_match_all('/href="([^\s"]+)/', $url, $resultados);

		
        for($i = 0; $i < count($resultados[0]); $i++) $resultados[0][$i] = strtolower($resultados[0][$i]);
		

			for($j=0; $j < count($resultados[0]); $j++){
			$linksPercorridos++;
		}

		for($k=0; $k<count($resultados[0]); $k++){
		
		$temporaria = explode('href="', $resultados[0][$k]);
		$resultados[0][$k] = $temporaria[1];	
		
		$temporaria2 = explode("://", $resultados[0][$k]);
		
		if($temporaria2[0] != "http"){ 
		$resultados[0][$k] = $linkorig.$temporaria2[0];
		}
		
		}

return $resultados;
}

/*
A função recebe como parâmetros duas horas, no formato minutos e horas,
depois ela calcula o tempo decorrido a partir da primeira até a segunda
e retorna o tempo no formato XX Minutos.
*/
function calcular_tempo_trasnc($hora1,$hora2){ 
    $separar[1]=explode(':',$hora1); 
    $separar[2]=explode(':',$hora2); 

	$total_minutos_trasncorridos[1] = ($separar[1][0]*60)+$separar[1][1]; 
	$total_minutos_trasncorridos[2] = ($separar[2][0]*60)+$separar[2][1]; 
	$total_minutos_trasncorridos = $total_minutos_trasncorridos[1]-$total_minutos_trasncorridos[2]; 
	
	if($total_minutos_trasncorridos<=59) return($total_minutos_trasncorridos.' Minutos'); 
	elseif($total_minutos_trasncorridos>59){ 
	$HORA_TRANSCORRIDA = round($total_minutos_trasncorridos/60); 
	if($HORA_TRANSCORRIDA<=9) $HORA_TRANSCORRIDA='0'.$HORA_TRANSCORRIDA; 
	$MINUTOS_TRANSCORRIDOS = $total_minutos_trasncorridos%60; 
	if($MINUTOS_TRANSCORRIDOS<=9) $MINUTOS_TRANSCORRIDOS='0'.$MINUTOS_TRANSCORRIDOS; 
	return ($HORA_TRANSCORRIDA.':'.$MINUTOS_TRANSCORRIDOS.' Horas'); 

	} 
} 

/*
A função nomeia um arquivo, você deve passar o nome do usuário, e a 
função vai procurar na pasta dele de extrações, contar quantos arquivos
existem na mesma e vai retornar o nome no formato XXXX.txt
*/
function nomeiaArquivo($usuario){
	
		//URL onde o arquivo PHP vai ficar
		$pasta_arquivos = "../extracoes/".$usuario;
		$arquivos = array();
		
		//Loop que percorre a pasta das imagens e armazena o nome de todos os arquivos
		foreach(glob($pasta_arquivos . '/{*.txt}', GLOB_BRACE) as $file) {	
			
			$arquivos[] = $file;
		
	}
		$qtd = count($arquivos);
		$qtd += 1;
		
		if($qtd < 10 ){
		$nome = "000".$qtd.".txt";
		}
		if($qtd > 9 && $qtd < 100 ){
		$nome = "00".$qtd.".txt";
		}
		if($qtd > 99 && $qtd < 1000 ){
		$nome = "0".$qtd.".txt";
		}
		if($qtd > 999){
		$nome = $qtd.".txt";
		}
				
		return $nome;
}

/*	
Função recbe um vetor e um ponteiro, e pega este vetor e grava ele 
usando o ponteiro passado, retorna true ou false.
*/
function gravaDados($gravar, $fp){

	$posicoes = count($gravar);
	
	for($i=0; $i<$posicoes; $i++){
			$stream = $gravar[$i]."\n\r";
			fwrite($fp, $stream);
	}
	
	return true;
	
}

?>