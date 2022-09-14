CREATE TABLE product_comment (
    id SERIAL NOT NULL,
    username varchar(50) NOT NULL,
    content varchar(500) NOT NULL,
    product_id INT NOT NULL,
    PRIMARY KEY (id)
);
