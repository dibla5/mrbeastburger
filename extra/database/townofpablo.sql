-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 10, 2022 alle 11:25
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `townofpablo`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `id` int(11) NOT NULL,
  `dataOraOrdine` varchar(255) DEFAULT NULL,
  `indirizzo` varchar(255) DEFAULT NULL,
  `statoOrdine` int(11) DEFAULT NULL,
  `prezzo` int(11) NOT NULL,
  `usernameUtente` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`id`, `dataOraOrdine`, `indirizzo`, `statoOrdine`, `prezzo`, `usernameUtente`) VALUES
(199223125, '22-02-2022 22:06:19', 'Corso Luigi Andrea Martinetti, 23/5', 1, 25, 'dibla5');

-- --------------------------------------------------------

--
-- Struttura della tabella `portata`
--

CREATE TABLE `portata` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `prezzo` int(11) NOT NULL,
  `tipologia` varchar(255) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `allergeni` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `portata`
--

INSERT INTO `portata` (`id`, `nome`, `prezzo`, `tipologia`, `descrizione`, `allergeni`, `img`) VALUES
(1, 'Karl\'s Deluxe', 8, 'Hamburger', 'Un patty melt servito alla Karl\'s Style con un croccante patty di manzo stagionato, cipolle caramellate e formaggio su un panino tostato', 'Latte, glutine, sesamo, uova', 'img/Burger/karl_s-deluxe.png'),
(2, 'Beast Style', 9, 'Hamburger', 'Polpette di manzo croccanti schiacciate con condimento della casa, formaggio americano, sottaceti, cipolla bianca a dadini, maionese, ketchup e senape', 'Latte, glutine, sesamo, uova', 'img/Burger/beast-style.png'),
(3, 'Chandler Style', 9, 'Hamburger', 'Due polpette di manzo croccanti schiacciate con condimento della casa, servite con formaggio americano su un panino', 'Latte, glutine, sesamo, uova', 'img/Burger/chandler-style.png'),
(4, 'Chris Style ', 10, 'Hamburger', 'Due polpette di manzo croccanti schiacciate con condimento della casa, formaggio americano, pancetta e patatine fritte', 'Latte, glutine, sesamo, uova', 'img/Burger/chris-style.png'),
(5, 'Impossible Karl\'s Deluxe', 12, 'Impossible Burgers', 'Un patty melt servito alla Karl\'s Style con un croccante patty Impossible stagionato, cipolle caramellate e formaggio su un panino tostato', 'Latte, glutine, sesamo, uova', 'img/Impossible_Burger/impossible-karl_s-deluxe.png'),
(6, 'Impossible Beast Style', 13, 'Impossible Burgers', 'Polpette croccanti Impossible schiacciate con condimento della casa, formaggio americano, sottaceti, cipolla bianca a cubetti, maionese, ketchup e senape marrone su un panino morbido', 'Latte, glutine, arachidi, uova', 'img/Impossible_Burger/impossible-beast-style.png'),
(7, 'Impossible Chandler Style', 13, 'Impossible Burgers', 'Due polpette Impossible croccanti schiacciate con condimenti della casa, servite semplici con formaggio americano su un panino', 'Latte, glutine, arachidi, uova', 'img/Impossible_Burger/impossible-chandler-style.png'),
(8, 'Impossible Chris Style', 14, 'Impossible Burgers', 'Due croccanti polpette Impossible schiacciate con condimento della casa, formaggio americano, bacon e patatine fritte', 'Latte, glutine, arachidi, uova', 'img/Impossible_Burger/impossible-chris-style.png'),
(9, 'Karl\'s Grilled Cheese', 6, 'Sandwiches', '3 fette di formaggio americano grigliato e croccante su un panino rovesciato', 'Latte', 'img/Sandwich/karl_s-grilled-cheese.png'),
(10, 'Crispy Chicken Tender Sandwich', 8, 'Sandwiches', 'con maionese, lattuga tagliuzzata e sottaceti', 'Latte, uova', 'img/Sandwich/crispy-chicken-tender-sandwich.png'),
(11, 'Nashville Hot Chicken Tender Sandwich', 9, 'Sandwiches', 'con maionese, ketchup, lattuga tritata e sottaceti', 'Latte, uova', 'img/Sandwich/nashville-hot-chicken-tender-sandwich.png'),
(12, 'Patatine Fritte', 4, 'Patatine fritte', 'Patatine fritte condite con peperoncino piccante, aglio, paprika, zucchero e un pizzico di lime', '', 'img/Contorni/patatine-fritte.png'),
(13, 'Beast Potatoes', 5, 'Patatine fritte', 'Patatine fritte condite ripiene di cipolle caramellate, formaggio americano, sottaceti, maionese, ketchup e senape', 'Latte, uova', 'img/Contorni/beast-style-fries.png'),
(14, 'Milkshake fragola', 3, 'Milkshake', 'Una cremosa bevanda fredda a base di latte con sciroppo alla fragola', 'latte', 'img/bevande/milkshake.png'),
(15, 'Milkshake vaniglia', 3, 'Milkshake', 'Una cremosa bevanda fredda a base di latte con sciroppo alla vaniglia', 'Latte, uova, soia', 'img/bevande/milkshake.png'),
(16, 'Milkshake cioccolato', 3, 'Milkshake', 'Una cremosa bevanda fredda a base di latte con sciroppo al cioccolato', 'Latte', 'img/bevande/milkshake.png'),
(17, 'Milkshake banana', 3, 'Milkshake', 'Una cremosa bevanda fredda a base di latte con sciroppo alla banana', 'Latte', 'img/bevande/milkshake.png'),
(18, 'Milkshake amarena', 3, 'Milkshake', 'Una cremosa bevanda fredda a base di latte con sciroppo all\'amarena', 'Latte', 'img/bevande/milkshake.png'),
(19, 'Milkshake caramello', 3, 'Milkshake', 'Una cremosa bevanda fredda a base di latte con sciroppo al caramello', 'Latte', 'img/bevande/milkshake.png'),
(20, 'Milkshake oreo', 3, 'Milkshake', 'Una cremosa bevanda fredda a base di latte con sciroppo all\'oreo', 'Latte, grano, soia, arachidi', 'img/bevande/milkshake.png'),
(21, 'Coca cola', 2, 'Bevande', '', '', 'img/bevande/coca.png'),
(22, 'Coca cola zero', 2, 'Bevande', '', '', 'img/bevande/cocaZ.png'),
(23, 'Fanta', 2, 'Bevande', '', '', 'img/bevande/fanta.png'),
(24, 'Sprite', 2, 'Bevande', '', '', ''),
(25, 'Thè pesca', 2, 'Bevande', '', '', 'img/bevande/pesca.png'),
(26, 'Thè limone', 2, 'Bevande', '', '', 'img/bevande/limone.png'),
(27, 'Birra', 3, 'Bevande', '', '', 'img/bevande/lattinabirra.png'),
(28, 'Acqua naturale', 1, 'Bevande', '', '', 'img/bevande/nat.png'),
(29, 'Acqua frizzante', 1, 'Bevande', '', '', 'img/bevande/frizz.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `numprenotazione` int(100) NOT NULL,
  `dataPrenotazione` date NOT NULL,
  `usernameUtente` varchar(255) NOT NULL,
  `numTavoloPrenotato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`numprenotazione`, `dataPrenotazione`, `usernameUtente`, `numTavoloPrenotato`) VALUES
(22, '2022-03-19', 'dibla5', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `tavolo`
--

CREATE TABLE `tavolo` (
  `numTavolo` int(11) NOT NULL,
  `numPosti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tavolo`
--

INSERT INTO `tavolo` (`numTavolo`, `numPosti`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 3),
(9, 3),
(10, 3),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 6),
(17, 6),
(18, 8),
(19, 10),
(20, 20);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `username` varchar(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `numTelefono` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`username`, `nome`, `cognome`, `numTelefono`, `email`, `password`) VALUES
('admin', '-', 'Amministratore', '3295358554', 'mrbeastburger@townofpablo.top', 'admin'),
('danipese03', 'Daniel Hilmy', 'Dawood Pesenti', '3365985445', '2strong4u@gmail.com', 'ciao123'),
('dibla5', 'Andrea ', 'Di Blasi', '3295358554', 'andredibla5@gmail.com', 'ciao123');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `portata`
--
ALTER TABLE `portata`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`numprenotazione`),
  ADD KEY `usernameUtente` (`usernameUtente`),
  ADD KEY `numTavoloPrenotato` (`numTavoloPrenotato`);

--
-- Indici per le tabelle `tavolo`
--
ALTER TABLE `tavolo`
  ADD PRIMARY KEY (`numTavolo`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `numprenotazione` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `prenotazione_ibfk_1` FOREIGN KEY (`usernameUtente`) REFERENCES `utente` (`username`),
  ADD CONSTRAINT `prenotazione_ibfk_2` FOREIGN KEY (`numTavoloPrenotato`) REFERENCES `tavolo` (`numTavolo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
