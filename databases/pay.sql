CREATE TABLE customers(
    id VARCHAR(100) NOT NULL,
    first_name VARCHAR(250) NOT NULL,
    last_name VARCHAR(250) NOT NULL,
    email VARCHAR(250) NOT NULL,
    CONSTRAINT pk PRIMARY KEY(id)
)ENGINE=innoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE transactions(
    id VARCHAR(100) NOT NULL,
    customer_id VARCHAR(100) NOT NULL,
    amount VARCHAR(250) NOT NULL,
    currency VARCHAR(250) NOT NULL,
    CONSTRAINT pk1 PRIMARY KEY(customer_id),
    CONSTRAINT fk1 FOREIGN KEY(id) REFERENCES customers(id)
)ENGINE=innoDB DEFAULT CHARSET=utf8mb4;