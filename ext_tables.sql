CREATE TABLE tx_mywebsite_domain_model_urls
(
    url   varchar(100) DEFAULT '' NOT NULL,
    type  varchar(10)  DEFAULT '' NOT NULL,
    title varchar(20) DEFAULT '0' NOT NULL
);

CREATE TABLE tx_mywebsite_domain_model_qualifications
(
    category VARCHAR(20) DEFAULT '' NOT NULL,
    time_from YEAR NOT NULL,
    time_to YEAR NOT NULL,
    company VARCHAR(20) NOT NULL,
    city VARCHAR(20) NOT NULL,
    job_name VARCHAR(20) DEFAULT '' NOT NULL,
    job_description TEXT NOT NULL
);

CREATE TABLE tx_mywebsite_domain_model_skills
(
    category VARCHAR(20) DEFAULT '' NOT NULL,
    name VARCHAR(20) DEFAULT '' NOT NULL
);