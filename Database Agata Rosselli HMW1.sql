drop database EsameAgataRosselli;
create database EsameAgataRosselli;
use EsameAgataRosselli;

create table Allievo(
Id integer primary key auto_increment,
Nome varchar(255),
Cognome varchar(255),
Data_nascita date
)engine='InnoDB';

create table Gallery(
Foto varchar(255) primary key
)engine='InnoDB';

create table Istruttore(
Id integer primary key auto_increment,
Nome varchar(255),
Cognome varchar(255),
Foto_profilo varchar(255),
Email varchar(255),
Username varchar(255),
Password varchar(255),
Guadagno integer default 0
)engine='InnoDB';

create table Q_combattimento(
Id integer primary key auto_increment,
Nome varchar(255)
)engine='InnoDB';

create table Q_autodifesa(
Id integer primary key auto_increment,
Nome varchar(255),
Livello integer
)engine='InnoDB';

create table Corso(
Codice integer primary key auto_increment,
Nome varchar(255)
)engine='InnoDB';

create table Cintura(
Codice integer primary key auto_increment,
Nome varchar(255)
)engine='InnoDB';

create table Acq_Combattimento(
Istruttore integer,
Combattimento integer,
Data_acqu date,
index inx_i(Istruttore),
index inx_q(Combattimento),
foreign key(Istruttore) references Istruttore(Id),
foreign key(Combattimento) references q_combattimento(Id),
primary key(Istruttore, Combattimento)
)engine='InnoDB';

create table Acq_Autodifesa(
Istruttore integer,
Autodifesa integer,
Data_acqu date,
index inx_i(Istruttore),
index inx_q(Autodifesa),
foreign key(Istruttore) references Istruttore(Id),
foreign key(Autodifesa) references q_autodifesa(Id),
primary key(Istruttore, Autodifesa)
)engine='InnoDB';


create table Iscrizione(
Allievo integer,
Istruttore integer,
Corso integer,
Costo integer,
Data date,
index inx_a(Allievo),
index inx_i(Istruttore),
index inx_c(Corso),
foreign key(Allievo) references Allievo(Id),
foreign key(Istruttore) references Istruttore(Id),
foreign key(Corso) references Corso(Codice),
primary key(Allievo, Istruttore, Corso) 
)engine='InnoDB';

create table Esame(
Cod_esame integer primary key,
Tipo varchar(255)
)engine='InnoDB';

create table Esame_cintura(
Codice integer, 
Data1 date,
index inx_e(Codice),
foreign key (Codice) references Esame(Cod_esame),
primary key(Codice, Data1)
)engine='InnoDB';

create table Partecipa(
Allievo integer,
Data_p date,
Esame_cod integer,
Esito varchar(255),
index inx_a(Allievo),
index inx_e(Esame_cod,Data_p),
foreign key(Allievo) references Allievo(Id),
foreign key(Esame_cod, Data_p) references Esame_cintura(Codice, Data1),
primary key(Allievo, Esame_cod, Data_p)
)engine='InnoDB';

create table passaggio_cintura(
Allievo integer,
Cintura integer,
Data_inizio date,
Data_fine date,
Tipo integer,
index inx_a(Allievo),
index inx_c(Cintura),
foreign key (Allievo) references Allievo(Id),
foreign key (Cintura) references Cintura(Codice),
primary key(Allievo, Cintura, Data_inizio)
)engine='InnoDB';
/*inserimento delle immagini in GALLERY*/
insert into Gallery values('tkd/1.jpg');
insert into Gallery values('tkd/2.jpg');
insert into Gallery values('tkd/3.jpg');
insert into Gallery values('tkd/4.jpg');
insert into Gallery values('tkd/5.jpg');
insert into Gallery values('tkd/6.jpg');
insert into Gallery values('tkd/7.jpg');
insert into Gallery values('tkd/8.jpg');
insert into Gallery values('tkd/9.jpg');
insert into Gallery values('tkd/10.jpg');
insert into Gallery values('tkd/11.jpg');
insert into Gallery values('tkd/12.jpg');
insert into Gallery values('tkd/13.jpg');
insert into Gallery values('tkd/14.jpg');
insert into Gallery values('tkd/15.jpg');
insert into Gallery values('tkd/16.jpg');
insert into Gallery values('tkd/17.jpg');
insert into Gallery values('tkd/18.jpg');
insert into Gallery values('tkd/19.jpg');
insert into Gallery values('tkd/20.jpg');
insert into Gallery values('tkd/21.jpg');
insert into Gallery values('tkd/22.jpg');
insert into Gallery values('tkd/23.jpg');
insert into Gallery values('tkd/24.jpg');
insert into Gallery values('tkd/25.jpg');
insert into Gallery values('tkd/26.jpg');
insert into Gallery values('tkd/27.jpg');
insert into Gallery values('tkd/28.jpg');
insert into Gallery values('tkd/29.jpg');
insert into Gallery values('tkd/30.jpg');
insert into Gallery values('tkd/31.jpg');
insert into Gallery values('tkd/32.jpg');
insert into Gallery values('tkd/33.jpg');
insert into Gallery values('tkd/34.jpg');
insert into Gallery values('tkd/35.jpg');
insert into Gallery values('tkd/36.jpg');
insert into Gallery values('tkd/37.jpg');
insert into Gallery values('tkd/38.jpg');
insert into Gallery values('tkd/39.jpg');
insert into Gallery values('tkd/40.jpg');
insert into Gallery values('tkd/41.jpg');
insert into Gallery values('tkd/42.jpg');
insert into Gallery values('tkd/43.jpg');
insert into Gallery values('tkd/44.jpg');
insert into Gallery values('tkd/45.jpg');
insert into Gallery values('tkd/46.jpg');
insert into Gallery values('tkd/47.jpg');
insert into Gallery values('tkd/48.jpg');
insert into Gallery values('tkd/49.jpg');
insert into Gallery values('tkd/50.jpg');
insert into Gallery values('tkd/51.jpg');
insert into Gallery values('tkd/52.jpg');
insert into Gallery values('tkd/53.jpg');
insert into Gallery values('tkd/54.jpg');
insert into Gallery values('tkd/55.jpg');
insert into Gallery values('tkd/56.jpg');
insert into Gallery values('tkd/57.jpg');
insert into Gallery values('tkd/58.jpg');
insert into Gallery values('tkd/59.jpg');
insert into Gallery values('tkd/60.jpg');
insert into Gallery values('tkd/61.jpg');
insert into Gallery values('tkd/62.jpg');
insert into Gallery values('tkd/63.jpg');
insert into Gallery values('tkd/64.jpg');
insert into Gallery values('tkd/65.jpg');
insert into Gallery values('tkd/66.jpg');
insert into Gallery values('tkd/67.jpg');
insert into Gallery values('tkd/68.jpg');
insert into Gallery values('tkd/69.jpg');
insert into Gallery values('tkd/70.jpg');
insert into Gallery values('tkd/71.jpg');
insert into Gallery values('tkd/72.jpg');
insert into Gallery values('tkd/73.jpg');
insert into Gallery values('tkd/74.jpg');
insert into Gallery values('tkd/75.jpg');
insert into Gallery values('tkd/76.jpg');
insert into Gallery values('tkd/77.jpg');
insert into Gallery values('tkd/78.jpg');
insert into Gallery values('tkd/79.jpg');
insert into Gallery values('tkd/80.jpg');
insert into Gallery values('tkd/81.jpg');
insert into Gallery values('tkd/dav.jpg');
insert into Gallery values('tkd/fazio.jpg');
insert into Gallery values('tkd/IMG_0267.jpg');
insert into Gallery values('tkd/IMG_20190505_163449.jpg');
insert into Gallery values('tkd/IMG_20190505_164601.jpg');
insert into Gallery values('tkd/pales.jpg');
insert into Gallery values('tkd/pales1.jpg');
insert into Gallery values('tkd/pales2.jpg');
insert into Gallery values('tkd/pales3.jpg');
insert into Gallery values('tkd/pales4.jpg');
insert into Gallery values('tkd/pales5.jpg');

/*Inserimento dei dati in ALLIEVO*/
insert into Allievo values('01', 'Agata', 'Rosselli', '1999-06-06');
insert into Allievo values('02', 'Gabriele', 'Forte', '1992-12-19');
insert into Allievo values('03', 'Gabriele', 'Fazio', '2000-12-14');
insert into Allievo values('04', 'Samuele', 'Buonocore', '1997-11-30');
insert into Allievo values('05', 'Chiara', 'Borzi', '1990-08-01');
insert into Allievo values('06', 'Rosalba', 'Risiglione', '1962-12-04');
insert into Allievo values('07', 'Gabriele', 'Sinatra', '1998-08-09');
insert into Allievo values('08', 'Laura', 'Pennisi', '1990-02-03');
insert into Allievo values(9, 'Adriana', 'Scuderi', '1999-11-24');
insert into Allievo values(10, 'Angelo', 'Santangelo', '1982-11-24');
insert into Allievo values(0, 'Federica', 'Balsamo', '2000-08-03');
insert into Allievo values(0, 'Federica', 'Laudani', '2000-04-17');
insert into Allievo values(0, 'Orazio', 'Pannitteri', '1999-11-12');
insert into Allievo values(0, 'Claudio', 'Carastro', '1999-09-18');
insert into Allievo values(0, 'Martina', 'Pappalardo', '2001-07-11');
insert into Allievo values(0, 'Martina', 'Castro', '2002-06-01');
insert into Allievo values(0, 'Orazio', 'Pannitteri', '1992-01-02');

/*INSERIMENTO DEI DATI IN CINTURA*/
insert into Cintura values('01', 'Bianca');
insert into Cintura values('02', 'Bianca gialla');
insert into Cintura values('03', 'Gialla');
insert into Cintura values('04', 'Gialla verde');
insert into Cintura values('05', 'Verde');
insert into Cintura values('06', 'Verde blu');
insert into Cintura values('07', 'Blu');
insert into Cintura values('08', 'Blu rossa');
insert into Cintura values('09', 'Rossa');
insert into Cintura values('10', 'Rossa nera');
insert into Cintura values('11', 'Nera primo dan');
insert into Cintura values('12', 'Nera secondo dan');
insert into Cintura values('13', 'Nera terzo dan');
insert into Cintura values('14', 'Nera quarto dan');
insert into Cintura values('15', 'Nera quinto dan');
insert into Cintura values('16', 'Nera sesto dan');
insert into Cintura values('17', 'Nera settimo dan');
insert into Cintura values('18', 'Nera ottavo dan');
insert into Cintura values('19', 'Nera nono dan');


/*INSERIMENTO DEI DATI IN QUALIFICA COMBATTIMENTO*/
insert into q_combattimento values('01','Taekwondo kids');
insert into q_combattimento values('02','Full contact');
insert into q_combattimento values('03','Light Contact');

/*INSERIMENTO DEI DATI IN QUALIFICA AUTODIFESA*/
insert into q_autodifesa values('01','Krav Maga', '05');
insert into q_autodifesa values('02','Tecniche di disarmo','05');
insert into q_autodifesa values('03','Antibullismo','03');
insert into q_autodifesa values('04','Autodifesa donna','04');
insert into q_autodifesa values(5, 'Grappling',6);
insert into q_autodifesa values(6, 'Quinna', 2);
insert into q_autodifesa values(7, 'Tecniche miste', 2);


/*INSERIMENTO DEI DATI IN CORSO*/
insert into Corso values('01','Forme e Combattimento');
insert into Corso values('02','Combattimento');
insert into Corso values('03','Forme');
insert into Corso values('04','Autodifesa e Combattimento');
insert into Corso values('05','Taekwondo kids');

/*INSERIMENTO DEI DATI IN ISTRUTTORE*/
insert into Istruttore values('01','Davide','Forte','','','','0' );
insert into Istruttore values('02','Carlos','Mortillaro','','','','0');
insert into Istruttore values('03','Ernesto','Figueredo','','','','0');
insert into Istruttore values('04','Alba','Balsamo','','','','0');



/*INSERIMENTO DEI DATI IN ISCRIZIONE*/
insert into Iscrizione values ('01','01','01','50','2019-02-10');
insert into Iscrizione values ('02','01','01','600','2018-09-12');
insert into Iscrizione values ('03','01','01','600','2018-11-15');
insert into Iscrizione values ('04','03','02','420','2020-02-15');
insert into Iscrizione values ('05','03','02','420','2020-02-11');
insert into Iscrizione values ('06','02','03','420','2020-06-10');
insert into Iscrizione values ('07','02','03','420','2019-11-10');
insert into Iscrizione values ('08','04','04','840','2019-07-10');
insert into Iscrizione values (9, 2, 3, 420, '2020-05-10');
insert into Iscrizione values (10, 4, 4, 840, '2020-02-10');
insert into Iscrizione values (11, 2, 3, 420, '2020-02-20');
insert into Iscrizione values (12, 2, 1, 600, '2019-12-19');
insert into Iscrizione values (13, 1, 3, 420, '2020-05-10');
insert into Iscrizione values (14, 1, 2, 420, '2019-08-10');
insert into Iscrizione values (15, 4, 4, 840, '2020-02-10');
insert into Iscrizione values (16, 1, 1, 840, '2020-05-9');
insert into Iscrizione values (17, 3, 3, 420, '2020-05-9');

/*INSERIMENTO DEI DATI IN ACQUISIZIONE QUALIFICHE COMBATTIMENTO */
insert into acq_combattimento values ('01','02','2000-10-05');
insert into acq_combattimento values ('01','01','2010-09-03');
insert into acq_combattimento values ('02','01','2002-10-12');
insert into acq_combattimento values ('02','03','2009-09-10');
insert into acq_combattimento values ('03','01','2015-01-10');
insert into acq_combattimento values ('04','02','2014-06-09');

/*INSERIMENTO DEI DATI IN ACQUISIZIONE QUALIFICHE AUTODIFESA */
insert into acq_autodifesa values('01','03','2012-11-11');
insert into acq_autodifesa values('02','04','2013-09-03');
insert into acq_autodifesa values('03','01','2001-10-11');
insert into acq_autodifesa values('03','02','2002-11-09');
insert into acq_autodifesa values('04','01','2005-06-01');
insert into acq_autodifesa values('04','02','2007-10-11');
insert into acq_autodifesa values('04','03','2009-11-03');
insert into acq_autodifesa values('04','04','2010-12-04');
insert into acq_autodifesa values(1,5,'2001-01-25');
insert into acq_autodifesa values(1,6,'2007-12-14');

/* inserimento dei dati in esame cintura */
insert into esame_cintura values (1,'2020-11-30' );
insert into esame_cintura values (1,'2020-12-25' );
/*inserisco i valori in partecipa*/
insert into partecipa values(3,'2020-11-20',2,'Negativo');
insert into partecipa values(3,'2020-11-30',1,'Negativo');
insert into partecipa values(3,'2020-12-25',1,'Negativo');
insert into partecipa values(4,'2020-11-20',2,'Negativo');
insert into partecipa values(6,'2020-11-30',1,'Negativo');
insert into partecipa values(7,'2020-11-30',1,'Negativo');
insert into partecipa values(7,'2020-12-25',1,'Negativo');
/*INSERIMENTO DEI DATI IN ESAME*/
insert into esame values('01','Pratico');
insert into esame values('02','Pratico e teorico');

/*CREO UN TRIGGER PER ALLINEARE L'ATTRIBUTO RIDONDANTE GUADAGNO*/
delimiter // 
create trigger aggiorna_guadagno_istruttore
after insert on iscrizione
for each row
begin 
if exists (select * from istruttore where Id= new.Istruttore)
then update istruttore
set guadagno = (select sum(Costo) from iscrizione where istruttore=new.Istruttore)
where Id = new.Istruttore;
end if;
end//

/*IMPLEMENTARE UNA BUSINESS RULE A PIACERE
il codice della cintura, non deve superare il numero 19 poichè le cinture sono massimo 19*/
drop trigger Impedisci_Inserimento;
delimiter //
create trigger Impedisci_Inserimento
before insert on Cintura
for each row
begin 
declare msg varchar(255);
if (select count(*) as num_cinture
from Cintura
having num_cinture >=19)
then
set msg = 'Errore non puoi inserire altre cinture';
signal sqlstate '45000' set message_text = msg;
end if;
end //
delimiter ;

/*CREO UNA PROCEDURA PER UNA SOLA ENTITA' FIGLIA*/
/*visualizzare tutte le qualifiche che hanno uguale livello  OPERAZIONE 1*/
delimiter //
create procedure leggo_entita_figlia()
begin
drop temporary table if exists temp;
create temporary table temp(
Id integer,
Nome varchar(255),
Livello integer
);
insert into temp
select q.*
from q_autodifesa q
where exists(select q1.*
from q_autodifesa q1
where q.Id<>q1.Id and q.Nome<>q1.Nome and q.Livello=q1.Livello );
select * from temp;
end//
delimiter ;

/*CREO UNA PROCEDURA DI LETTURA CHE COINVOLGE L'ATTRIBUTO RIDONDANTE GUADAGNO, dato in ingresso un dato istruttore
 leggere il suo guadagno e il nUmero di isritti al corso */
delimiter //
create procedure lettura_attr_ridondante(in id_istruttore integer)
begin
drop temporary table if exists temp;
create temporary table temp(
Nome_istruttore varchar(255),
Cognome_istruttore varchar(255),
Numero_iscritti_corso integer,
Guadagno_corso integer
);
insert into temp 

select  i.Nome, i.Cognome, 
count(distinct t.Allievo) as Numero_iscritti_corso,
sum(t.Costo) as Guadagno_singolo_Corso
from istruttore i join iscrizione t on i.Id=t.Istruttore
where t.Istruttore = id_istruttore
group by t.Corso ;
select * from temp;
end//
delimiter ;
call lettura_attr_ridondante(1);


/*CREARE UNA PROCEDURA CHE SIA DI SCRITTURA E CHE COINVOGA L'ATTRIBUTO RIDONDANTE ETA'*/
delimiter //
create procedure aggiorna_iscrizione(in Allievo1 integer, in Istruttore1 integer, in Corso1 integer, in Prezzo integer)
begin
update iscrizione i set i.Data =
(
case 
when ( select timestampdiff( year,  a.Data_nascita, current_date() ) from allievo a join iscrizione i on a.Id=i.Allievo where a.Id=Allievo1) < 12 then date_add(curdate(), interval 1 month)
when ( select timestampdiff( year, a.Data_nascita, current_date() ) from allievo a join iscrizione i on a.Id=i.Allievo where a.Id=Allievo1 ) = 12  then date_add(curdate(), interval 6 month)
when ( select timestampdiff( year, a.Data_nascita, current_date() ) from allievo a join iscrizione i on a.Id=i.Allievo where a.Id=Allievo1) >=12 then date_add(curdate(), interval 1 year)
end
), 
i.costo = case 

when ( select timestampdiff( year, a.Data_nascita, current_date() ) from allievo a join iscrizione i on a.Id=i.Allievo where a.Id=Allievo1) <12 then prezzo
when ( select timestampdiff( year, a.Data_nascita, current_date() ) from allievo a join iscrizione i on a.Id=i.Allievo where a.Id=Allievo1) =12  then prezzo*6
when ( select timestampdiff( year, a.Data_nascita, current_date() ) from allievo a join iscrizione i on a.Id=i.Allievo where a.Id=Allievo1) >=12 then prezzo*12
end
where i.Allievo=Allievo1 and i.Istruttore=Istruttore1 and i.Corso=Corso1;
end//
delimiter ;

/*CREO UNA VISTA DA UTILIZZARE NELLA PROCEDURA DI STORICIZZAZIONE, CHE MI FACCIA VEDERE TUTTI GLI ALLIEVI CON GLI STESSI ISTRUTTORI*/
create view allievi_uguali_istruttori as
select i.Allievo as Allievi, i.Istruttore as Istruttori
from  iscrizione i
where exists(
select i1.Allievo
from iscrizione i1 
where  i.Allievo<>i1.Allievo and i.Istruttore=i1.Istruttore 
order by i.Istruttore asc
);

/*CREO L'OPERAZIONE SULLA STORICIZZAZIONE CON VISTA E BINDING*/
drop procedure oper_su_storicizzazione;
delimiter //
create procedure oper_su_storicizzazione(in istruttore_nome varchar(255), in istr_cognome varchar(255))
begin
drop temporary table if exists temp;
create temporary table temp(
Allievo integer,
tempo_trascoro time
);
insert into temp
select  distinct dc.Cod_allievo, time(dc.Data_corrente - dp.Data_precedente) as Tempo_trascorso
from Data_corrente_per_allievo dc join Data_precedente_per_allievo dp on dc.Cod_istruttore=dp.Cod_istruttore 
 join istruttore i on dc.Cod_istruttore=i.Id
where i.Nome=istruttore_nome and i.Cognome=istr_cognome 
group by dc.Cod_allievo;
select * from temp;
end//
delimiter ;
call oper_su_storicizzazione ('Davide', 'Forte');

/*CON QUESTA VISTA SELEZIONO TUTTE LE DATE CORRENTI PER GLI ALLIEVI DI OGNI ISTRUTTORE*/

create view  Data_corrente_per_allievo as
select  v.Cod_istruttore, v.Cod_allievo, max(v.Data_iniziale) as Data_corrente
from vista_completa v 
where v.Tipo =1
group by v.Cod_allievo, V.Cod_istruttore
order by v.Cod_istruttore, V.Cod_allievo asc;

/*CON QUESTA VISTA MI CALCOLO LA Data della cintura precedente di ogni singolo allievo di ogni istruttore*/
create view  Data_precedente_per_allievo as
select  v.Cod_istruttore, v.Cod_allievo, max(v.Data_iniziale) as Data_precedente
from vista_completa v 
where v.Tipo =0
group by v.Cod_allievo, V.Cod_istruttore
order by v.Cod_istruttore, V.Cod_allievo asc;

create view vista_completa as
select o.Allievo as Cod_allievo, o.Cintura as Cod_cintura, o.Data_inizio as Data_iniziale, 
o.Data_fine as Data_finale, o.Tipo as Tipo, i.Istruttori as Cod_istruttore
 from cintura_ottenuta o join allievi_uguali_istruttori i on o.Allievo=i.Allievi;






-- quanti allievi per ogni istruttore, hanno superato una data cintura data in ingresso 
delimiter //
create procedure p1( in cod_c integer)
begin
drop temporary table if exists temp;
create temporary table temp(
istruttore integer,
num_allievi integer
);
insert into temp
select  v.Cod_istruttore, count(v.Allievo) as numero
 from vista1 v
where v.Cintura=cod_c
group by v.Cod_istruttore;
select * from temp;
end//
delimiter ;

call p1(3);
create view vista1 as
select  a.Cod_istruttore, c.Allievo, a.Data_corrente, c.Cintura
from data_corrente_per_allievo a join cintura_ottenuta c on c.Allievo=a.Cod_allievo
 where c.Tipo=1;

select * from vista1;



    
    
    
    
   
    

    
    


