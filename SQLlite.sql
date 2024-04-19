drop table action_figures;
drop table merchandises;
drop table manga_book;
drop table seller;
drop table author;
drop table customer;
drop table users;

create table users(
    /*u_id int primary key,*/
    u_name varchar(250),
    u_password varchar(250),
    u_contact varchar(250)
) 

/*insert into users values(id,name,password,contact)*/

insert into users values('mrugaja','mrugaja123','mrugaja12@gmail.com');
insert into users values('yash','yashw123','yashw08@gmail.com');
insert into users values('yashraj','yashp2408','yashp24@gmail.com');
insert into users values('sujay','sjay2100','sjaym@gmail.com');
insert into users values('reshma','reshma28','reshma0203@gmail.com');

create table customer(
    c_id int primary key,
    c_name varchar(250),
    c_password varchar(250),
    c_email varchar(250),
    c_contact integer(250),
    c_address varchar(250),
    c_gender varchar(250)
)

/*insert into customers values(id,name,password,email,contact,address,gender)*/

insert into customer values(11,'mayuri','mayurim','mayuri02@gmail.com',9486353682,'Navi mumbai','female');
insert into customer values(12,'lakshya','lakshya87','lakshya23@gmail.com',7654391027,'Madhya pradesh','male');
insert into customer values(13,'sakshi','sakshi12','sakshi657@gmail.com',8645328910,'Bihar','female');
insert into customer values(14,'rutuja','rutu456','rutujab18@gmail.com',9372292908,'Ranchi','female');
insert into customer values(15,'anshuree','anushree12345','sanushree27@gmail.com',8362975542,'Pune','female');

create table author(
    a_id int,
    a_name varchar(250) primary key,
    a_password varchar(250),
    a_email varchar(250),
    a_contact integer
)

/*insert into author values(id,name,password,email,contact)*/

insert into author values(21,'Gege Akutami','gege1234','gege364@gmail.com',7589930232);
insert into author values(22,'Koyoharu Gotouge','koyo3467','koyo28@gmail.com',9087642319); 
insert into author values(23,'Hajime Isayama','hajime8904','hajime34@gmail.com',9087642319); 
insert into author values(24,'Mashashi Kishimoto','Mashashi4563','mashashi32@gmail.com',9087642319); 
insert into author values(25,'Eiichiro Oda','Oda902','Eicchioda234@gmail.com',9087642319); 
insert into author values(26,'','902','@gmail.com',9456387235); 
insert into author values(27,'','902','@gmail.com',8456327890); 
insert into author values(28,'Kohei Horikoshi','902','kohei12@gmail.com',7654890352); 
insert into author values(29,'Tatasuki Fujimoto','902','tatasukif@gmail.com',9984563289); 
insert into author values(30,'Yuki Tabata','902','yuki12@gmail.com',8845673289); 
insert into author values(31,'Tsugumi Ohba','Ohba123','tsugumi345@gmail.com',9579830483); 

create table seller(
    s_id int primary key,
    s_name varchar(255),
    s_password varchar(250),
    s_contact integer(250),
    s_email varchar(255)
)

/*insert into seller values(id,name,password,contact,email)*/

insert into seller values(31,'isha','isha234',7634892902,'isham78@gmail.com');
insert into seller values(32,'raju','raju290',7633538738,'rajus7633@gmail.com');
insert into seller values(33,'vijay','vijay345',8465839203,'rajus7633@gmail.com');
insert into seller values(34,'prafull','praful675',9127454373,'rajus7633@gmail.com');
insert into seller values(35,'chinmay','chinmay0921',7523856658,'rajus7633@gmail.com');


create table manga_book(
    m_id int primary key,
    m_name varchar(250),
    m_pages int,
    m_duration varchar,
    m_volume int ,
    a_name varchar(250) references author(a_name),

)

/*insert into manga_book values(id,name,pages,duration,volume,a_id)*/

insert into manga_book values(41,'Jujutsu Kaisen',180,'30 min',21,'Gege Akutami');
insert into manga_book values(42,'Demon Slayer',230,'30 min',23,'Koyoharu Gotouge');
insert into manga_book values(43,'Attack on Titan',200,'30 min',33,'Hajime Isayama');
insert into manga_book values(44,'Naruto',400,'45 min',72,'Masashi Kishimoto');
insert into manga_book values(45,'One Piece',380,'0 min',106,'Eiichiro Oda');
insert into manga_book values(46,'Dragon Ball Z',220,'0 min',42,'Akira Toriyama');
insert into manga_book values(47,'Boruto',100,'0 min',16,'Ukyo Kodachi');
insert into manga_book values(48,'My Hero Academia',37,'0 min',73,'Kohei Horikoshi');
insert into manga_book values(49,'Chainsaw Man',500,'0 min',16,'Tatasuki Fujimoto');
insert into manga_book values(50,'Black Clover',300,'0 min',56,'Yuki Tabata');
insert into manga_book values(51,'Death Note',480,'0 min',120,'Tsugumi Ohba');


create table merchandises(
    m_id int primary key,
    m_name varchar(250),
    m_price int
);

/*insert into merchandise values(m_id,m_name,m_price,)*/

insert into merchandises values(51,'Cup',699);
insert into merchandises values(52,'Painting',2599);
insert into merchandises values(53,'Hoodies',899);
insert into merchandises values(54,'keyChain',299);
insert into merchandises values(55,'Sword',2999);
insert into merchandises values(56,'Laptop Skin',399);
insert into merchandises values(57,'Anime Caps',799);
insert into merchandises values(58,'Bagpack',1299);
insert into merchandises values(59,'Aluminium Water Bottle',289);

create table action_figures(
    af_id int primary key,
    af_name varchar(250),
    af_price int
);
/*insert into Action_figures(id,name,price)*/

insert into action_figures values(61,'Zoro',2699);
insert into action_figures values(62,'Luffy',2599);
insert into action_figures values(63,'Goku',3599);
insert into action_figures values(64,'Kakashi',3299);
insert into action_figures values(65,'Madara',1599);
insert into action_figures values(66,'Ryuk',1399);
insert into action_figures values(67,'Demon slayer set of 4',2799);
insert into action_figures values(68,'Nezuko',1299);



select *from users;
select *from customers;
select *from author;
select *from seller;
select *from manga_book;
select *from merchandises;
select *from action_figures;