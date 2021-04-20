/*
  GENERI( Nome, CodGenere);
  AUTORI( CodAutore, Nome);
  ALUM( Durata, Titolo, Copertina, DataPub, CodAlbum);
  MUSICISTI( Nome, DataInizioCar, DataFineCar, Biografia, Direttore, is_orchestra, CodMusicista)
  BRANI(Titolo, Durata, CodBrano, CodMusicista, CodGenere);

  SCRIVONO(CodAutore, CodBrano);
  CONTENGONO(CodAlbum, CodBrano);

*/


CREATE TABLE GENERI (
  Nome VARCHAR(25) NOT NULL,
  CodGenere INT(3) NOT NULL,
  PRIMARY KEY(CodGenere)
);

CREATE TABLE AUTORI(
  Nome VARCHAR(25) NOT NULL,
  CodAutore INT(3) NOT NULL ,
  PRIMARY KEY(CodAutore)
);

CREATE TABLE ALUM (
  Durata TIME NOT NULL,
  Titolo VARCHAR(25) NOT NULL,
  Copertina LONGBLOB, /*TODO: Da rivedere*/
  DataPub DATE NOT NULL,
  CodAlbum INT(3) NOT NULL,

  PRIMARY KEY(CodAlbum)
);

CREATE TABLE MUSICISTI(
  Nome VARCHAR(25) NOT NULL,
  DataInizioCar DATE,
  DataFineCar DATE,
  Biografia VARCHAR(500),
  type SET('Solista', 'Gruppo', 'Orchestra'),
  Direttore VARCHAR(30) DEFAULT NULL,
  CodMusicista INT(3) NOT NULL,
  PRIMARY KEY(CodMusicista)
);

/*
BRANI(Titolo, Durata, CodBrano, CodMusicista, CodGenere);

SCRIVONO(CodAutore, CodBrano);
CONTENGONO(CodAlbum, CodBrano);

*/


CREATE TABLE BRANI(
  Titolo VARCHAR(25) NOT NULL,
  Durata TIME NOT NULL,
  CodBrano INT(3) NOT NULL,
  CodMusicista INT(3) NOT NULL,
  CodGenere INT(3) NOT NULL,

  PRIMARY KEY (CodBrano),

  FOREIGN KEY (CodMusicista) REFERENCES MUSICISTI(CodMusicista),
  FOREIGN KEY (CodGenere) REFERENCES GENERI(CodGenere)
);

CREATE TABLE SCRIVONO(
  CodAutore INT(3) NOT NULL,
  CodBrano INT(3) NOT NULL,

  PRIMARY KEY (CodAutore, CodBrano),

  FOREIGN KEY (CodAutore) REFERENCES AUTORI(CodAutore),
  FOREIGN KEY (CodBrano) REFERENCES BRANI(CodBrano)

);

CREATE TABLE CONTENGONO(
  CodAlbum INT(3) NOT NULL,
  CodBrano INT(3) NOT NULL,

  PRIMARY KEY (CodAlbum, CodBrano),

  FOREIGN KEY (CodAlbum) REFERENCES ALUM(CodAlbum),
  FOREIGN KEY (CodBrano) REFERENCES BRANI(CodBrano)
);
