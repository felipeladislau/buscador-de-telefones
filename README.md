# Buscador de telefones.

Projeto desenvolvido para treinamento de alunos do curso de PHP básico, o projeto utiliza [Bootstrap](https://getbootstrap.com/) como seu estilo padrão e a biblioteca [jQuery](https://jquery.com/).

O arquivo index realiza a seleção do URL a ser pesquisado e conta com seis regex diferentes para telefones, assim que o usuário seleciona a opção de busca a index apresenta um preloader até que a consulta seja concluída.

É aconselhável que o PHP esteja configurado com um limite de memória razoável (32Mb) e com um tempo de processamento limite de 30 minutos para scripts, de forma que a busca não seja interrompida.

O script realiza a busca de telefones no formato similar na página fornecida e em todas as sub páginas encontradas, portanto o mesmo enquanto busca os telefones também busca por URL's.

Após a pesquisa realizada em ***processar.php*** o sistema grava os telefones em um arquivo de texto sequencial e fornece o mesmo ao usuário.

Projeto desenvolvido por **Felipe Ladislau**.
