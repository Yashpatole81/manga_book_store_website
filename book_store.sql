-- Create a users table
DROP TABLE users CASCADE;
CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    emailid VARCHAR(100) NOT NULL,
    contact_no VARCHAR(15),
    address TEXT,
    user_password VARCHAR(100) NOT NULL,
    confirm_password VARCHAR(100) NOT NULL
);

-- Insert data into the users table
INSERT INTO users (username, emailid, contact_no, address, user_password, confirm_password)
VALUES
    ('yash', 'yash@gmail.com', '1234567890', '123 Main St, City', 'yash', 'yash'),
	('shruti', 'shruti@gmail.com', '1234567890', '123 Main St, City', 'nothing', 'nothing'),
    ('mrugaja', 'jane@gmail.com', '9876543210', '456 Oak St, Town', 'nothing', 'nothing');

-- Add unique constraint on emailid to ensure uniqueness
ALTER TABLE users ADD CONSTRAINT unique_email UNIQUE (emailid);

-- Add unique constraint on username to ensure uniqueness
ALTER TABLE users ADD CONSTRAINT unique_username UNIQUE (username);

drop table manga;

CREATE TABLE manga (
    id int PRIMARY KEY,
    image_src VARCHAR(255),
    year INTEGER,
    title VARCHAR(100),
    price DECIMAL(10, 2),
    monthly_price DECIMAL(10, 2),
    product_url VARCHAR(255),
    stock int
);

INSERT INTO manga (id,image_src,year,title,price,monthly_price,product_url,stock) VALUES
(1,'Manga/Jujutsu Kaisen.png', 2023, 'Jujutsu Kaisen vol-1', 299, 0, 'product pages/product1.html',20),
(2,'Manga/Demon Slayer.png', 2023, 'Demon Slayer vol-1', 399, 0, 'product pages/product2.html',20),
(3,'Manga/Aot.png', 2022, 'Attack On Titan', 399, 199, 'product pages/product3.html',20),
(4,'Manga/naruto.png', 2017, 'Naruto Vol:1', 585, 0, 'product pages/product4.html',20),
(5,'Manga/One piece.png', 2017, 'One Piece', 500, 499, 'product pages/product5.html',20),
(6,'Manga/Dragon Ball Z.png', 2018, 'Dragon Ball Z', 499, 0, 'product pages/product6.html',20),
(7,'Manga/Boruto vol 1.png', 2022, 'Boruto Vol:1', 399, 0, 'product pages/product7.html',20),
(8,'Manga/my hero academia.png', 2023, 'My Hero academia', 399, 239, 'product pages/product8.html',20);

SELECT * from manga;

drop table merchandise;
CREATE TABLE merchandise (
    id int PRIMARY KEY,
    image_src VARCHAR(255),
    year INTEGER,
    title VARCHAR(100),
    price DECIMAL(10, 2),
    monthly_price DECIMAL(10, 2),
    product_url VARCHAR(255),
    stock int
);

INSERT INTO merchandise (id,image_src,year,title,price,monthly_price,product_url,stock) VALUES
(9,'Manga/cup.png', 2023, 'Cup', 999, 699, 'product pages/product9.html',20),
(10,'Manga/painting merchandise.png', 2024, 'Painting', 799, 2599, 'product pages/product10.html',20),
(11,'Manga/Hoodie.png', 2022, 'Hoodie', 199, 899, 'product pages/product11.html',20),
(12,'Manga/KeyChains.png', 2024, 'KeyChains', 699, 299, 'product pages/product12.html',20),
(13,'Manga/sword.png', 2023, 'Sword', 3999, 2999, 'product pages/product9.html',20),
(14,'Manga/laptop skin.png', 2023, 'Laptop Skin', 399, 399, 'product pages/product10.html',20),
(15,'Manga/caps.png', 2022, 'Anime Caps', 399, 799, 'product pages/product11.html',20),
(16,'Manga/Bagpack.png', 2017, 'Bagpack', 199, 1299, 'product pages/product12.html',20);


SELECT * FROM merchandise;

drop table action_figure;
CREATE TABLE action_figure (
    id int PRIMARY KEY,
    image_src VARCHAR(255),
    year INTEGER,
    title VARCHAR(100),
    price DECIMAL(10, 2),
    monthly_price DECIMAL(10, 2),
    product_url VARCHAR(255),
    stock int
);

INSERT INTO action_figure (id,image_src,year,title,price,monthly_price,product_url,stock) VALUES
(9,'Manga/zoro.jpg', 2023, 'Zoro', 3999, 2699, 'product pages/product9.html',20),
(10,'Manga/Luffy.jpg', 2024, 'Luffy', 3799, 2599, 'product pages/product10.html',20),
(11,'Manga/goku.jpg', 2022, 'Goku', 3199, 3599, 'product pages/product11.html',20),
(12,'Manga/kakashi.jpg', 2024, 'Kakashi', 3699, 3299, 'product pages/product12.html',20),
(13,'Manga/madara.png', 2023, 'Madara', 3299, 1599, 'product pages/product9.html',20),
(14,'Manga/ryuk.webp', 2023, 'Ryuk', 4399, 1399, 'product pages/product10.html',20),
(15,'Manga/Demon slayer A.png', 2022, 'Demon Slayer set of 4', 5399, 2799, 'product pages/product11.html',20),
(16,'Manga/nezuko.png', 2017, 'Nezuko', 4199, 1299, 'product pages/product12.html',20);


SELECT * FROM action_figure;

DROP TABLE adminlogin;
create table adminlogin(login_id serial primary key,
						 username varchar(30),
						 password varchar(30));

insert into adminlogin(username,password) values	
('yashpatole','yash@2003');

select * from adminlogin;


DROP TABLE documents;

CREATE TABLE documents (
    id serial primary key,
	c_name VARCHAR(255) NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
	d_comment VARCHAR(255)
);

select * from documents;