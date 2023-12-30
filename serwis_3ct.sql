CREATE DATABASE serwis_3ct_wojtekb;
USE serwis_3ct_wojtekb;
CREATE TABLE klient(
    id_klienta int unsigned not null auto_increment,
    imie_k varchar(20) not null,
    nazwisko_k varchar(35) not null,
    firma_k varchar(70) null,
    ulica_k varchar(30) not null,
    nr_domu_k varchar(5) not null,
    nr_lokalu_k int unsigned not null,
    kod_p_k varchar(6) not null,
    miejscowosc_k varchar(30) not null,
    telefon_k varchar(15) not null unique,   
    email_k varchar(60) not null unique, 
    PRIMARY KEY(id_klienta)
)
Engine=InnoDB default charset='utf8';
CREATE INDEX idx1 on klient(nazwisko_k);

CREATE TABLE konto (
    login varchar(25) not null,
    haslo varchar(255) BINARY not null,
    data_rejestracji DATE not null,
    status ENUM('A', 'N') not null default 'N',
    PRIMARY KEY(login),
        id_klienta int unsigned not null,
            CONSTRAINT konto_id_klienta_fk
            FOREIGN KEY(id_klienta)
            REFERENCES klient(id_klienta)
)
Engine=InnoDB default charset='utf8';


CREATE TABLE oddzial (
    id_odzialu int not null primary key auto_increment,
    nazwa_oddzialu varchar(60) not null,
    ulica_o varchar(30) not null,
    numer_domu_o varchar(4) not null,
    numer_lokalu_o int,
    kod_o varchar(6) not null,
    miejscowosc_o varchar(25) not null,
    telefon_o varchar(15) not null unique

)
Engine=InnoDB default charset='utf8';


CREATE TABLE pracownik (
    id_pracownika int not null primary key auto_increment,
    imie_p varchar(15) not null,
    nazwisko_p varchar(35) not null,
    telefon_k varchar(15) not null unique,
    email_k varchar(60) not null,

    id_odzialu int not null,
    CONSTRAINT pracownik_id_oddzialu_fk
    FOREIGN KEY(id_odzialu)
    REFERENCES oddzial(id_odzialu)

)
Engine=InnoDB default charset='utf8';
CREATE INDEX idx2 on pracownik(nazwisko_p);

CREATE TABLE sprzet(
    id_urzadzenia int not null primary key auto_increment, 
    nr_seryjny varchar(60) not null,
    producent varchar(20),
    model varchar(30),
    kategoria ENUM('RTV', 'AGD', 'PC')
)
Engine=InnoDB default charset='utf8';
CREATE INDEX idx3 on sprzet(nr_seryjny);

CREATE TABLE zgloszenie(
    id_zgloszenia int not null primary key auto_increment,
    opis text not null,
    data_zgloszenia DATE not null,
    data_odbioru DATE,

    id_klienta int unsigned not null,
    CONSTRAINT zgloszenie_id_klienta_fk
    FOREIGN KEY(id_klienta)
    REFERENCES klient(id_klienta),

    id_pracownika int not null,
    CONSTRAINT zgloszenie_id_pracownika_fk
    FOREIGN KEY(id_pracownika)
    REFERENCES pracownik(id_pracownika),

    id_urzadzenia int not null,
    CONSTRAINT zgloszenie_id_urzadzenia_fk
    FOREIGN KEY(id_urzadzenia)
    REFERENCES sprzet(id_urzadzenia)
)
Engine=InnoDB default charset='utf8';


CREATE TABLE status_naprawy(
    id_statusu int not null primary key auto_increment,
    data_zmiany DATE,
    status ENUM('Przyjęto w oddziale', 'W trakcie naprawy', 'Gotowy do odbioru') default 'Przyjęto w oddziale',

    id_urzadzenia int not null,
    CONSTRAINT status_naprawy_id_urzadzenia_fk
    FOREIGN KEY(id_urzadzenia)
    REFERENCES sprzet(id_urzadzenia)
)
Engine=InnoDB default charset='utf8';

CREATE TABLE czynnosci_serwisowe(
    id_czynnosci int not null primary key auto_increment,
    opis_czynnosci varchar(200) not null,
    cena decimal(6,2) not null,

    id_urzadzenia int not null,
    CONSTRAINT czynnosci_serwisowe_id_urzadzenia_fk
    FOREIGN KEY(id_urzadzenia)
    REFERENCES sprzet(id_urzadzenia)
)
 Engine=InnoDB default charset='utf8';