CREATE TABLE `bloques` (
 `ID` int(11) NOT NULL,
 `don_name` text , 
  `don_link` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `bloques`
ADD PRIMARY KEY (`ID`);

ALTER TABLE `bloques`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE `donaciones` (
 `donación_ID` int(11) NOT NULL,
 `monto` int (11) NOT NULL ,
 `bloques` text NOT NULL,
 `don_name` text NOT NULL,
 `don_telefono` int(11) ,
 `don_mail` text ,
 `don_link` text NOT NULL, 
  `publicidad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `donaciones`
ADD PRIMARY KEY (`donación_ID`);

ALTER TABLE `donaciones`
MODIFY `donación_ID` int(11) NOT NULL AUTO_INCREMENT;