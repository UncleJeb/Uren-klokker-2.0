
CREATE DATABASE IF NOT EXISTS job_werkurenv2;

USE job_werkurenv2;

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    userphoto VARCHAR(500),
    email VARCHAR(100) NOT NULL,
    password VARCHAR(32) NOT NULL,
    PRIMARY KEY(id)
);

