-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Jun-2023 às 23:08
-- Versão do servidor: 8.0.31
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `oficina_mecanica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `idadministrador` int NOT NULL AUTO_INCREMENT,
  `loginadm` varchar(100) NOT NULL,
  `senhaadm` varchar(100) NOT NULL,
  PRIMARY KEY (`idadministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf16;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `loginadm`, `senhaadm`) VALUES
(1, '1', 'c4ca4238a0b923820dcc509a6f75849b'),
(3, 'phelipe soares', 'ff7757ad9eb2fa8e6b51d7ffc87b9691');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `Id_Cliente` int NOT NULL AUTO_INCREMENT,
  `Nome_cliente` varchar(100) NOT NULL,
  `Telefone_cliente` varchar(100) NOT NULL,
  `Email_cliente` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Cep_cliente` varchar(8) NOT NULL,
  `Rua_cliente` varchar(100) NOT NULL,
  `Numero_cliente` varchar(100) NOT NULL,
  `Bairro_cliente` varchar(100) NOT NULL,
  `Cidade_cliente` varchar(100) NOT NULL,
  `Estado_cliente` varchar(2) NOT NULL,
  PRIMARY KEY (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`Id_Cliente`, `Nome_cliente`, `Telefone_cliente`, `Email_cliente`, `Cep_cliente`, `Rua_cliente`, `Numero_cliente`, `Bairro_cliente`, `Cidade_cliente`, `Estado_cliente`) VALUES
(1, 'Phelipe Soawrwerwerwerw', '(18)997949925', '', '15285000', 'Anesio Antonio De Oliveira', '202', 'Centro', 'Lourdes', 'SP'),
(14, 'Teste', '(18) 99748-6533', 'humbertipozena@gmail.com', '15280000', 'neves souza', '354', 'centro', 'Turiúba', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_servicos`
--

DROP TABLE IF EXISTS `itens_servicos`;
CREATE TABLE IF NOT EXISTS `itens_servicos` (
  `Id_itensserv` int NOT NULL AUTO_INCREMENT,
  `Nome_itensserv` varchar(255) NOT NULL,
  `Valor_itensserv` float DEFAULT NULL,
  PRIMARY KEY (`Id_itensserv`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `itens_servicos`
--

INSERT INTO `itens_servicos` (`Id_itensserv`, `Nome_itensserv`, `Valor_itensserv`) VALUES
(5, 'troca pneu', 2),
(6, 'troca roda', 80.55),
(7, 'troca ar', 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `juncao`
--

DROP TABLE IF EXISTS `juncao`;
CREATE TABLE IF NOT EXISTS `juncao` (
  `Id_Juncao` int NOT NULL AUTO_INCREMENT,
  `Id_Servico` int NOT NULL,
  `Id_itensserv` int NOT NULL,
  PRIMARY KEY (`Id_Juncao`),
  KEY `juncaofk1` (`Id_itensserv`),
  KEY `juncaofk2` (`Id_Servico`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `juncao`
--

INSERT INTO `juncao` (`Id_Juncao`, `Id_Servico`, `Id_itensserv`) VALUES
(36, 18, 5),
(40, 20, 7),
(41, 20, 6),
(42, 20, 7),
(43, 20, 7),
(44, 21, 6),
(45, 21, 6),
(46, 21, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `Id_Servico` int NOT NULL AUTO_INCREMENT,
  `Observacao_servico` varchar(255) DEFAULT NULL,
  `Data_servico` date NOT NULL,
  `Valor_servico` float NOT NULL,
  `Id_Cliente` int NOT NULL,
  `Id_Veiculo` int NOT NULL,
  PRIMARY KEY (`Id_Servico`),
  KEY `servico_ibfk_1` (`Id_Cliente`),
  KEY `servico_ibfk_2` (`Id_Veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`Id_Servico`, `Observacao_servico`, `Data_servico`, `Valor_servico`, `Id_Cliente`, `Id_Veiculo`) VALUES
(18, 'hghg', '2023-05-29', 2, 1, 1),
(20, 'caavavavavav', '2023-05-30', 200.55, 1, 1),
(21, 'Carro vazamento', '2023-06-04', 201.1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

DROP TABLE IF EXISTS `veiculo`;
CREATE TABLE IF NOT EXISTS `veiculo` (
  `Id_Veiculo` int NOT NULL AUTO_INCREMENT,
  `Marca_veiculo` varchar(100) NOT NULL,
  `Modelo_veiculo` varchar(100) NOT NULL,
  `Cor_veiculo` varchar(100) NOT NULL,
  `Ano_veiculo` varchar(11) NOT NULL,
  `Placa_veiculo` varchar(8) NOT NULL,
  `Id_cliente` int NOT NULL,
  PRIMARY KEY (`Id_Veiculo`),
  KEY `Id_cliente` (`Id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`Id_Veiculo`, `Marca_veiculo`, `Modelo_veiculo`, `Cor_veiculo`, `Ano_veiculo`, `Placa_veiculo`, `Id_cliente`) VALUES
(1, 'Honda', 'Civic', 'Prata', '2022', 'ABC-4805', 1),
(2, 'Hyundai', 'HB420', 'Branco', '2023', 'FAL-1287', 1),
(19, 'Ford', 'KA', 'Azul', '2019', '15S478S', 14);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `juncao`
--
ALTER TABLE `juncao`
  ADD CONSTRAINT `juncaofk1` FOREIGN KEY (`Id_itensserv`) REFERENCES `itens_servicos` (`Id_itensserv`),
  ADD CONSTRAINT `juncaofk2` FOREIGN KEY (`Id_Servico`) REFERENCES `servico` (`Id_Servico`);

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`Id_Cliente`) REFERENCES `cliente` (`Id_Cliente`),
  ADD CONSTRAINT `servico_ibfk_2` FOREIGN KEY (`Id_Veiculo`) REFERENCES `veiculo` (`Id_Veiculo`);

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`Id_cliente`) REFERENCES `cliente` (`Id_Cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
