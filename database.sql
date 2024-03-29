CREATE DATABASE crudtreino;

CREATE TABLE crudtreino.account (
    _id int(11) not null auto_increment ,
    name VARCHAR(32) not null,
    balance DOUBLE not null DEFAULT 0,
    color VARCHAR(8),
    description VARCHAR(255),
    created_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(_id)

);

CREATE TABLE crudtreino.card (
    _id int(11) not null auto_increment,
    name VARCHAR(32) not null,
    closeday DATE not null,
    lastday DATE not null,
    climit DOUBLE DEFAULT 0,
    PRIMARY KEY(_id)
);

CREATE TABLE crudtreino.category (
    _id int(11) not null auto_increment,
    name VARCHAR(32) not null,
    PRIMARY KEY(_id)
);

CREATE TABLE crudtreino.transaction (
    _id int(11) not null auto_increment,
    acc_id int(11) not null,
    value DOUBLE not null,
    date DATE not null,
    type ENUM('in', 'out'),
    category VARCHAR(32) not null,
    PRIMARY KEY(_id),
    FOREIGN KEY(acc_id) REFERENCES account(_id)
);

CREATE TABLE crudtreino.entry (
    _id int(11) not null auto_increment ,
    card_id int(11) not null,
    value DOUBLE not null,
    date DATE not null,
    category VARCHAR(32),
    PRIMARY KEY(_id),
    FOREIGN KEY(card_id) REFERENCES card(_id)
);

CREATE TRIGGER `updateBalanceAdd` AFTER INSERT ON `transaction`
 FOR EACH ROW IF NEW.type = "in" THEN
	UPDATE crudtreino.account SET balance = balance + NEW.value  
    WHERE NEW.acc_id = account._id;
ELSE
	UPDATE crudtreino.account SET balance = balance - NEW.value
     WHERE NEW.acc_id = account._id;
END IF

CREATE TRIGGER `updateBalanceRemove` AFTER DELETE ON `transaction`
 FOR EACH ROW IF OLD.type = "in" THEN
	UPDATE crudtreino.account SET balance = balance - OLD.value  
    WHERE OLD.acc_id = account._id;
ELSE
	UPDATE crudtreino.account SET balance = balance + OLD.value
     WHERE OLD.acc_id = account._id;
END IF