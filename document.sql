DROP TABLE documents;

CREATE TABLE documents (
	c_name VARCHAR(255) NOT NULL PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
	d_comment VARCHAR(255)
);

select * from documents;