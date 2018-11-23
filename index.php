
<html>
<head>
<title>Buscador de telefones - Curso básico de PHP</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

<style>
.overlay {
    position: fixed; /* Sit on top of the page content */
    display: none; /* Hidden by default */
    width: 100%; /* Full width (cover the whole page) */
    height: 100%; /* Full height (cover the whole page) */
    top: 0; 
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #36465d; /* Black background with opacity */
    z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
    cursor: pointer; /* Add a pointer on hover */
}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		$("#preloader").hide();

		$("#btnCarrega").click(function(){
			$("#preloader").fadeIn();
			$("#contentPagina").load("pagina.html", function(){
				$("#preloader").fadeOut();			
			});
		});
		
	})
</script>


</head>
<body>


<div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
          
          <form method="post" id="formularios" action="processar.php">
            <h1><p>Verifica&ccedil;&atilde;o de telefones por link.</p></h1>
            <p>
              <label>Insira a URL a ser verificada:</label>
              <input class="form-control" type="text" name="url" placeholder="Exemplo: http://www.123achei.com.br/" style="width:400px" /><br>

              Formato de telefone a ser extraido:</p>
            <table width="561" border="1" cellspacing="0" cellpadding="5" bordercolor="666633">
              <tr>
                <td><label>
                  <input type="RADIO" name="expressao" value="/([0-9]{4})-([0-9]{4})/" checked />
                  XXXX-XXXX
                </label></td>
                <td><label>
                  <input name="expressao" type="RADIO" value="/([0-9]{2})-([0-9]{4})-([0-9]{4})/"  />
                  XX-XXXX-XXXX
                </label></td>
              </tr>
              <tr>
                <td><label>
                  <input type="RADIO" name="expressao" value="/([0-9]{2})-([0-9]{4})([0-9]{4})/" />
                  XX-XXXXXXXX
                </label></td>
                <td><label>
                  <input type="RADIO" name="expressao" value="/\(([0-9]{2})\)([0-9]{4})-([0-9]{4})/" />
                  (XX)XXXX-XXXX
                </label></td>
              </tr>
                  <tr>
                <td><label>
                  <input type="RADIO" name="expressao" value="/([0-9]{2})-9([0-9]{4})([0-9]{4})/" />
                  XX-9XXXXXXXX
                </label></td>
                <td><label>
                  <input type="RADIO" name="expressao" value="/9([0-9]{4})-([0-9]{4})/" />
                  9XXXX-XXXX
                </label></td>
              </tr>
            </table>
            <p><br>
              
              <input class="btn btn-lg btn-primary" id="btnCarrega" type="submit" onClick="alert('ATENÇÃO! \n O processamento pode demorar até 30 minutos, aguarde até que o relatório apareça na sua tela.')") value="Verificar link" class="botao"  />
            </p>
          </form>
    
            
    </div>
  </div>
</div>
    

<div id="preloader" class="overlay" style="text-align: center;">
	<br/>
  <div>
    <h1 class="display-3" style="color: #ffffff;">Buscando Telefones...</h1>
    <br/>
    <img src="img/loading.gif" />
    <br/>
  </div>
</div>




</body>
</html>