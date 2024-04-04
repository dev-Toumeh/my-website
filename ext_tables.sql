CREATE TABLE tx_mywebsite_domain_model_urls
(
    url   varchar(255) DEFAULT '' NOT NULL,
    type  varchar(10)  DEFAULT '' NOT NULL,
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

CREATE TABLE tx_mywebsite_domain_model_projects
(
    name VARCHAR(20) DEFAULT '' NOT NULL,
    image LONGBLOB NOT NULL,
    description TEXT NOT NULL,
    github_url VARCHAR(50) DEFAULT '' NOT NULL,
);