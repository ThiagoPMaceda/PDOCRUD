CRUD em PHP utilizando Orientação a Objetos e PDO que registra nome e e-mail dos usarios.

Para utilizar clonar o repositorio ou fazer download.

Colocar na pasta htdocs no XAMPP ou outro similar.

criar o BD utilizando a query abaixo
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


dados para o db

INSERT INTO `usuarios` (`id`, `nome`, `email`) VALUES
(1, 'Thiago Maceda', 'thiagopmaceda@gmail.com');
