
CREATE DATABASE IF NOT EXISTS job_werkurenv2;

USE job_werkurenv2;

CREATE TABLE users IF NOT EXISTS (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(50),
    userphoto VARCHAR(500),
    email VARCHAR(100),
    password VARCHAR(32),
    PRIMARY KEY(id)
);

