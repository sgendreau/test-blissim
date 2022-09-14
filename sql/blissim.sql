CREATE DATABASE IF NOT EXISTS test_blissim;

USE test_blissim;

CREATE TABLE `customer`
(
    id        INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(255),
    lastname  VARCHAR(255)
);

CREATE TABLE `order`
(
    id          INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    created_at  DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME ON UPDATE CURRENT_TIMESTAMP,
    customer_id INT NOT NULL,
    CONSTRAINT fk_order_customer FOREIGN KEY (customer_id) REFERENCES `customer` (id)
);

CREATE TABLE `product`
(
    id    INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title varchar(255)    NOT NULL
);

CREATE TABLE `order_product`
(
    order_id   INT REFERENCES `order` (id),
    product_id INT REFERENCES `product` (id),
    quantity   INT NOT NULL DEFAULT 1,
    PRIMARY KEY (order_id, product_id)
);

INSERT INTO `customer` (firstname, lastname) VALUES
        ('Mario', 'Nette'),
        ('Sam', 'Eugène'),
        ('Mélanie', 'Zette'),
        ('Kelly', 'Stoir'),
        ('Alain', 'Terrieur'),
        ('Alex', 'Terrieur'),
        ('Jean', 'Tenrien'),
        ('Cathy', 'Pènflam');

INSERT INTO `product` (title) VALUES
        ('Parfum sans la rose'),
        ('Crème Toudou'),
        ('Dentifreeze'),
        ('Eau Be One'),
        ('Deo Débat');

INSERT INTO `order` (customer_id) VALUES
        (1),
        (2),
        (3),
        (4),
        (5),
        (6),
        (7),
        (8),
        (1),
        (3),
        (5),
        (7);

UPDATE `order` SET created_at = '2022-09-01 10:00:00' WHERE id = 1;
UPDATE `order` SET created_at = '2022-09-01 11:00:00' WHERE id = 2;
UPDATE `order` SET created_at = '2022-09-01 12:00:00' WHERE id = 3;
UPDATE `order` SET created_at = '2022-09-01 13:00:00' WHERE id = 4;

INSERT INTO `order_product` VALUES
        (1, 1, 1),
        (1, 2, 1),
        (1, 5, 3),
        (2, 1, 1),
        (2, 4, 1),
        (3, 3, 2),
        (4, 1, 1),
        (4, 3, 2),
        (4, 5, 2),
        (4, 2, 1),
        (5, 2, 1),
        (5, 3, 1),
        (6, 1, 2),
        (7, 2, 2),
        (8, 3, 1),
        (8, 4, 1),
        (8, 5, 1),
        (9, 1, 1),
        (9, 5, 1),
        (10, 1, 1),
        (11, 2, 1),
        (12, 1, 1),
        (12, 2, 1),
        (12, 3, 1);


/* Get all customers (firstname and lastname) who order the product with ID 1 */
SELECT firstname, lastname
FROM `customer` c
JOIN `order` AS o ON c.id = o.customer_id
JOIN `order_product` AS op ON o.id = op.order_id
WHERE op.product_id = 1
GROUP BY firstname, lastname;

/* Get all products with quantity that have been ordered the last seven days */
SELECT title, SUM(op.quantity) as quantity
FROM `product` p
JOIN `order_product` AS op ON op.product_id = p.id
JOIN `order` AS o ON op.order_id = o.id
WHERE o.created_at > DATE(NOW() - INTERVAL 7 DAY)
GROUP BY title;
