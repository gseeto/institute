/* SQLEditor (MySQL (2))*/

CREATE TABLE address
(
id INT AUTO_INCREMENT UNIQUE,
address_1 TEXT,
city TEXT,
state TEXT,
zip_code TEXT,
country TEXT,
PRIMARY KEY (id)
);

CREATE TABLE category_type
(
id INTEGER AUTO_INCREMENT UNIQUE,
value VARCHAR(255) UNIQUE,
PRIMARY KEY (id)
);

CREATE TABLE canned_kpi
(
id INTEGER AUTO_INCREMENT UNIQUE,
strategy_id INTEGER,
kpi VARCHAR(1024),
PRIMARY KEY (id)
);

CREATE TABLE canned_action_item
(
id INTEGER AUTO_INCREMENT UNIQUE,
action TEXT,
strategy_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE company
(
id INTEGER AUTO_INCREMENT UNIQUE,
name TEXT,
address_id INT,
PRIMARY KEY (id)
);

CREATE TABLE canned_strategy
(
id INTEGER AUTO_INCREMENT UNIQUE,
strategy VARCHAR(1024),
category_type_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE conditional_type
(
id INTEGER AUTO_INCREMENT UNIQUE,
token VARCHAR(255) UNIQUE,
PRIMARY KEY (id)
);

CREATE TABLE country_list
(
id INTEGER AUTO_INCREMENT UNIQUE,
name VARCHAR(255) UNIQUE,
PRIMARY KEY (id)
);

CREATE TABLE f_category_type
(
id INTEGER AUTO_INCREMENT UNIQUE,
value VARCHAR(255) UNIQUE,
PRIMARY KEY (id)
);

CREATE TABLE giants
(
id INTEGER AUTO_INCREMENT,
giant TEXT,
country TEXT,
PRIMARY KEY (id)
);

CREATE TABLE industry
(
id INTEGER AUTO_INCREMENT UNIQUE,
value VARCHAR(514),
PRIMARY KEY (id)
);

CREATE TABLE company_industry_assn
(
company_id INTEGER NOT NULL,
industry_id INTEGER NOT NULL
);

CREATE TABLE integration_category_type
(
id INTEGER AUTO_INCREMENT UNIQUE,
value VARCHAR(255) UNIQUE,
PRIMARY KEY (id)
);

CREATE TABLE integration_questions
(
id INTEGER AUTO_INCREMENT UNIQUE,
count INTEGER UNIQUE,
text VARCHAR(514),
category_id INTEGER,
invert BOOLEAN,
PRIMARY KEY (id)
);

CREATE TABLE integration_results
(
id INTEGER AUTO_INCREMENT UNIQUE,
question_id INTEGER,
assessment_id INTEGER,
result INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE kingdom_business_questions
(
id INTEGER AUTO_INCREMENT UNIQUE,
count INTEGER,
text VARCHAR(514),
category_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE kingdom_business_results
(
id INTEGER AUTO_INCREMENT UNIQUE,
question_id INTEGER,
assessment_id INTEGER,
performance INTEGER,
importance INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE lemon_assessment_results
(
id INTEGER AUTO_INCREMENT UNIQUE,
question_id INTEGER,
assessment_id INTEGER,
value INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE lemon_type
(
id INTEGER AUTO_INCREMENT UNIQUE,
name VARCHAR(255) UNIQUE,
PRIMARY KEY (id)
);

CREATE TABLE lemon_assessment_questions
(
id INTEGER AUTO_INCREMENT UNIQUE,
count INTEGER UNIQUE,
text VARCHAR(514),
lemon_type_id INTEGER,
inverse BOOLEAN,
PRIMARY KEY (id)
);

CREATE TABLE lra_category_type
(
id INTEGER AUTO_INCREMENT UNIQUE,
value VARCHAR(255) UNIQUE,
PRIMARY KEY (id)
);

CREATE TABLE lra_questions
(
id INTEGER AUTO_INCREMENT UNIQUE,
count INTEGER UNIQUE,
text VARCHAR(514),
category_id INTEGER,
invert BOOLEAN,
PRIMARY KEY (id)
);

CREATE TABLE lra_results
(
id INTEGER AUTO_INCREMENT UNIQUE,
question_id INTEGER,
assessment_id INTEGER,
head INTEGER,
hands INTEGER,
heart INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE resource
(
id INTEGER NOT NULL AUTO_INCREMENT,
name VARCHAR(255),
PRIMARY KEY (id)
);

CREATE TABLE group_assessment_list
(
id INTEGER AUTO_INCREMENT UNIQUE,
total_keys INTEGER,
keys_left INTEGER,
resource_id INTEGER,
key_code VARCHAR(255) UNIQUE,
description VARCHAR(255),
PRIMARY KEY (id)
);

CREATE TABLE resource_status
(
id INTEGER AUTO_INCREMENT UNIQUE,
value VARCHAR(255),
PRIMARY KEY (id)
);

CREATE TABLE role
(
id INTEGER AUTO_INCREMENT UNIQUE,
name VARCHAR(255),
PRIMARY KEY (id)
);

CREATE TABLE scorecard
(
id INTEGER AUTO_INCREMENT UNIQUE,
company_id INTEGER,
name TEXT,
resource_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE login
(
username TEXT,
password TEXT,
id INTEGER AUTO_INCREMENT UNIQUE,
role_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE seasonal_category_type
(
id INTEGER AUTO_INCREMENT UNIQUE,
value VARCHAR(255) UNIQUE,
PRIMARY KEY (id)
);

CREATE TABLE seasonal_questions
(
id INTEGER AUTO_INCREMENT UNIQUE,
count INTEGER UNIQUE,
text VARCHAR(514),
category_id INTEGER,
invert BOOLEAN,
PRIMARY KEY (id)
);

CREATE TABLE seasonal_results
(
id INTEGER AUTO_INCREMENT UNIQUE,
question_id INTEGER,
assessment_id INTEGER,
result INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE spheres
(
id INTEGER,
sphere TEXT,
PRIMARY KEY (id)
);

CREATE TABLE status_type
(
id INTEGER AUTO_INCREMENT,
value VARCHAR(255) UNIQUE,
PRIMARY KEY (id)
);

CREATE TABLE strategy_giant_assn
(
strategy_id INTEGER NOT NULL,
giant_id INTEGER NOT NULL
);

CREATE TABLE strategy_sphere_assn
(
strategy_id INTEGER NOT NULL,
sphere_id INTEGER NOT NULL
);

CREATE TABLE ten_f_questions
(
id INTEGER AUTO_INCREMENT UNIQUE,
count INTEGER UNIQUE,
text VARCHAR(514),
category_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE ten_f_results
(
id INTEGER AUTO_INCREMENT UNIQUE,
question_id INTEGER,
assessment_id INTEGER,
performance INTEGER,
importance INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE ten_p_questions
(
id INTEGER AUTO_INCREMENT UNIQUE,
count INTEGER UNIQUE,
text VARCHAR(514),
category_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE strategy_question_conditional
(
id INTEGER AUTO_INCREMENT UNIQUE,
question_id INTEGER,
strategy_id INTEGER,
conditional_type INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE ten_p_results
(
id INTEGER AUTO_INCREMENT UNIQUE,
question_id INTEGER,
assessment_id INTEGER,
performance INTEGER,
importance INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE tenure_list
(
id INTEGER AUTO_INCREMENT UNIQUE,
`range` VARCHAR(255),
PRIMARY KEY (id)
);

CREATE TABLE time_results
(
id INTEGER AUTO_INCREMENT UNIQUE,
assessment_id INTEGER,
time INTEGER,
activity VARCHAR(514),
career BOOLEAN,
calling BOOLEAN,
community BOOLEAN,
creativity BOOLEAN,
margin BOOLEAN,
PRIMARY KEY (id)
);

CREATE TABLE title_list
(
id INTEGER AUTO_INCREMENT UNIQUE,
name VARCHAR(255) UNIQUE,
PRIMARY KEY (id)
);

CREATE TABLE upward_category_type
(
id INTEGER AUTO_INCREMENT UNIQUE,
value VARCHAR(255) UNIQUE,
PRIMARY KEY (id)
);

CREATE TABLE upward_questions
(
id INTEGER AUTO_INCREMENT UNIQUE,
count INTEGER,
text VARCHAR(514),
category_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE upward_results
(
id INTEGER AUTO_INCREMENT UNIQUE,
question_id INTEGER,
assessment_id INTEGER,
performance INTEGER,
importance INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE user
(
id INTEGER AUTO_INCREMENT UNIQUE,
login_id INTEGER,
first_name TEXT,
last_name TEXT,
email TEXT,
gender BOOLEAN,
country_id INTEGER,
department VARCHAR(255),
title_id INTEGER,
tenure_id INTEGER,
career_length INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE scorecard_user_assn
(
user_id INTEGER NOT NULL,
scorecard_id INTEGER NOT NULL
);

CREATE TABLE integration_assessment
(
id INTEGER AUTO_INCREMENT UNIQUE,
resource_status_id INTEGER,
resource_id INTEGER,
user_id INTEGER,
group_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE strategy
(
id INTEGER AUTO_INCREMENT UNIQUE,
strategy TEXT,
priority INTEGER,
count INTEGER,
scorecard_id INTEGER,
category_type_id INTEGER,
modified_by INTEGER,
modified TIMESTAMP,
PRIMARY KEY (id)
);

CREATE TABLE ten_f_assessment
(
id INTEGER AUTO_INCREMENT UNIQUE,
resource_status_id INTEGER,
resource_id INTEGER,
user_id INTEGER,
group_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE kpis
(
id INTEGER AUTO_INCREMENT,
strategy_id INTEGER,
scorecard_id INTEGER,
rating INTEGER,
kpi TEXT,
count INTEGER,
comments TEXT,
modified_by INTEGER,
modified TIMESTAMP,
PRIMARY KEY (id)
);

CREATE TABLE action_items
(
id INTEGER AUTO_INCREMENT UNIQUE,
action TEXT,
strategy_id INTEGER,
scorecard_id INTEGER,
who INTEGER,
`when` DATE,
status_type INTEGER,
comments TEXT,
category_id INTEGER,
count INTEGER,
modified_by INTEGER,
modified TIMESTAMP,
rank BOOLEAN,
PRIMARY KEY (id)
);

CREATE TABLE statement
(
id INTEGER AUTO_INCREMENT UNIQUE,
value VARCHAR(1024),
scorecard_id INTEGER,
is_purpose BOOLEAN,
modified_by INTEGER,
modified TIMESTAMP,
PRIMARY KEY (id)
);

CREATE TABLE resource_user_assn
(
resource_id INTEGER NOT NULL,
user_id INTEGER NOT NULL
);

CREATE TABLE lra_assessment
(
id INTEGER AUTO_INCREMENT UNIQUE,
resource_status_id INTEGER,
resource_id INTEGER,
user_id INTEGER,
group_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE company_user_assn
(
company_id INTEGER NOT NULL,
user_id INTEGER NOT NULL
);

CREATE TABLE assessment_manager_assn
(
user_id INTEGER NOT NULL,
group_assessment_id INTEGER NOT NULL
);

CREATE TABLE kingdom_business_assessment
(
id INTEGER AUTO_INCREMENT UNIQUE,
company_id INTEGER,
resource_id INTEGER,
user_id INTEGER,
resource_status_id INTEGER,
group_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE seasonal_assessment
(
id INTEGER AUTO_INCREMENT UNIQUE,
resource_status_id INTEGER,
resource_id INTEGER,
user_id INTEGER,
group_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE lemon_assessment
(
id INTEGER AUTO_INCREMENT UNIQUE,
user_id INTEGER,
company_id INTEGER,
resource_id INTEGER,
resource_status_id INTEGER,
group_id INTEGER,
l INTEGER,
e INTEGER,
m INTEGER,
o INTEGER,
n INTEGER,
date_modified DATE,
PRIMARY KEY (id)
);

CREATE TABLE ten_p_assessment
(
id INTEGER AUTO_INCREMENT UNIQUE,
resource_status_id INTEGER,
company_id INTEGER,
resource_id INTEGER,
user_id INTEGER,
group_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE time_assessment
(
id INTEGER AUTO_INCREMENT UNIQUE,
resource_status_id INTEGER,
resource_id INTEGER,
user_id INTEGER,
group_id INTEGER,
PRIMARY KEY (id)
);

CREATE TABLE upward_assessment
(
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
resource_status_id INTEGER,
company_id INTEGER,
resource_id INTEGER,
user_id INTEGER,
group_id INTEGER,
PRIMARY KEY (id)
);

ALTER TABLE canned_kpi ADD FOREIGN KEY strategy_id_idxfk (strategy_id) REFERENCES canned_strategy (id);

ALTER TABLE canned_action_item ADD FOREIGN KEY strategy_id_idxfk_1 (strategy_id) REFERENCES canned_strategy (id);

ALTER TABLE company ADD FOREIGN KEY address_id_idxfk (address_id) REFERENCES address (id);

ALTER TABLE canned_strategy ADD FOREIGN KEY category_type_id_idxfk (category_type_id) REFERENCES category_type (id);

ALTER TABLE company_industry_assn ADD FOREIGN KEY company_id_idxfk (company_id) REFERENCES company (id);

ALTER TABLE company_industry_assn ADD FOREIGN KEY industry_id_idxfk (industry_id) REFERENCES industry (id);

ALTER TABLE integration_questions ADD FOREIGN KEY category_id_idxfk (category_id) REFERENCES integration_category_type (id);

ALTER TABLE integration_results ADD FOREIGN KEY question_id_idxfk (question_id) REFERENCES integration_questions (id);

ALTER TABLE integration_results ADD FOREIGN KEY assessment_id_idxfk (assessment_id) REFERENCES integration_assessment (id);

ALTER TABLE kingdom_business_questions ADD FOREIGN KEY category_id_idxfk_1 (category_id) REFERENCES category_type (id);

ALTER TABLE kingdom_business_results ADD FOREIGN KEY question_id_idxfk_1 (question_id) REFERENCES kingdom_business_questions (id);

ALTER TABLE kingdom_business_results ADD FOREIGN KEY assessment_id_idxfk_1 (assessment_id) REFERENCES kingdom_business_assessment (id);

ALTER TABLE lemon_assessment_results ADD FOREIGN KEY question_id_idxfk_2 (question_id) REFERENCES lemon_assessment_questions (id);

ALTER TABLE lemon_assessment_results ADD FOREIGN KEY assessment_id_idxfk_2 (assessment_id) REFERENCES lemon_assessment (id);

ALTER TABLE lemon_assessment_questions ADD FOREIGN KEY lemon_type_id_idxfk (lemon_type_id) REFERENCES lemon_type (id);

ALTER TABLE lra_questions ADD FOREIGN KEY category_id_idxfk_2 (category_id) REFERENCES lra_category_type (id);

ALTER TABLE lra_results ADD FOREIGN KEY question_id_idxfk_3 (question_id) REFERENCES lra_questions (id);

ALTER TABLE lra_results ADD FOREIGN KEY assessment_id_idxfk_3 (assessment_id) REFERENCES lra_assessment (id);

ALTER TABLE group_assessment_list ADD FOREIGN KEY resource_id_idxfk (resource_id) REFERENCES resource (id);

ALTER TABLE scorecard ADD FOREIGN KEY company_id_idxfk_1 (company_id) REFERENCES company (id);

ALTER TABLE scorecard ADD FOREIGN KEY resource_id_idxfk_1 (resource_id) REFERENCES resource (id);

ALTER TABLE login ADD FOREIGN KEY role_id_idxfk (role_id) REFERENCES role (id);

ALTER TABLE seasonal_questions ADD FOREIGN KEY category_id_idxfk_3 (category_id) REFERENCES seasonal_category_type (id);

ALTER TABLE seasonal_results ADD FOREIGN KEY question_id_idxfk_4 (question_id) REFERENCES seasonal_questions (id);

ALTER TABLE seasonal_results ADD FOREIGN KEY assessment_id_idxfk_4 (assessment_id) REFERENCES seasonal_assessment (id);

ALTER TABLE strategy_giant_assn ADD FOREIGN KEY strategy_id_idxfk_2 (strategy_id) REFERENCES strategy (id);

ALTER TABLE strategy_giant_assn ADD FOREIGN KEY giant_id_idxfk (giant_id) REFERENCES giants (id);

ALTER TABLE strategy_sphere_assn ADD FOREIGN KEY strategy_id_idxfk_3 (strategy_id) REFERENCES strategy (id);

ALTER TABLE strategy_sphere_assn ADD FOREIGN KEY sphere_id_idxfk (sphere_id) REFERENCES spheres (id);

ALTER TABLE ten_f_questions ADD FOREIGN KEY category_id_idxfk_4 (category_id) REFERENCES f_category_type (id);

ALTER TABLE ten_f_results ADD FOREIGN KEY question_id_idxfk_5 (question_id) REFERENCES ten_f_questions (id);

ALTER TABLE ten_f_results ADD FOREIGN KEY assessment_id_idxfk_5 (assessment_id) REFERENCES ten_f_assessment (id);

ALTER TABLE ten_p_questions ADD FOREIGN KEY category_id_idxfk_5 (category_id) REFERENCES category_type (id);

ALTER TABLE strategy_question_conditional ADD FOREIGN KEY question_id_idxfk_6 (question_id) REFERENCES ten_p_questions (id);

ALTER TABLE strategy_question_conditional ADD FOREIGN KEY strategy_id_idxfk_4 (strategy_id) REFERENCES canned_strategy (id);

ALTER TABLE strategy_question_conditional ADD FOREIGN KEY conditional_type_idxfk (conditional_type) REFERENCES conditional_type (id);

CREATE INDEX question_id_idx ON ten_p_results (question_id);
ALTER TABLE ten_p_results ADD FOREIGN KEY question_id_idxfk_7 (question_id) REFERENCES ten_p_questions (id);

CREATE INDEX assessment_id_idx ON ten_p_results (assessment_id);
ALTER TABLE ten_p_results ADD FOREIGN KEY assessment_id_idxfk_6 (assessment_id) REFERENCES ten_p_assessment (id);

ALTER TABLE time_results ADD FOREIGN KEY assessment_id_idxfk_7 (assessment_id) REFERENCES time_assessment (id);

ALTER TABLE upward_questions ADD FOREIGN KEY category_id_idxfk_6 (category_id) REFERENCES upward_category_type (id);

ALTER TABLE upward_results ADD FOREIGN KEY question_id_idxfk_8 (question_id) REFERENCES upward_questions (id);

ALTER TABLE upward_results ADD FOREIGN KEY assessment_id_idxfk_8 (assessment_id) REFERENCES upward_assessment (id);

ALTER TABLE user ADD FOREIGN KEY login_id_idxfk (login_id) REFERENCES login (id);

ALTER TABLE user ADD FOREIGN KEY country_id_idxfk (country_id) REFERENCES country_list (id);

ALTER TABLE user ADD FOREIGN KEY title_id_idxfk (title_id) REFERENCES title_list (id);

ALTER TABLE user ADD FOREIGN KEY tenure_id_idxfk (tenure_id) REFERENCES tenure_list (id);

ALTER TABLE scorecard_user_assn ADD FOREIGN KEY user_id_idxfk (user_id) REFERENCES user (id);

ALTER TABLE scorecard_user_assn ADD FOREIGN KEY scorecard_id_idxfk (scorecard_id) REFERENCES scorecard (id);

ALTER TABLE integration_assessment ADD FOREIGN KEY resource_status_id_idxfk (resource_status_id) REFERENCES resource_status (id);

ALTER TABLE integration_assessment ADD FOREIGN KEY resource_id_idxfk_2 (resource_id) REFERENCES resource (id);

ALTER TABLE integration_assessment ADD FOREIGN KEY user_id_idxfk_1 (user_id) REFERENCES user (id);

ALTER TABLE integration_assessment ADD FOREIGN KEY group_id_idxfk (group_id) REFERENCES group_assessment_list (id);

CREATE INDEX priority_idx ON strategy (priority);
ALTER TABLE strategy ADD FOREIGN KEY scorecard_id_idxfk_1 (scorecard_id) REFERENCES scorecard (id);

CREATE INDEX category_type_id_idx ON strategy (category_type_id);
ALTER TABLE strategy ADD FOREIGN KEY category_type_id_idxfk_1 (category_type_id) REFERENCES category_type (id);

ALTER TABLE strategy ADD FOREIGN KEY modified_by_idxfk (modified_by) REFERENCES user (id);

ALTER TABLE ten_f_assessment ADD FOREIGN KEY resource_status_id_idxfk_1 (resource_status_id) REFERENCES resource_status (id);

ALTER TABLE ten_f_assessment ADD FOREIGN KEY resource_id_idxfk_3 (resource_id) REFERENCES resource (id);

ALTER TABLE ten_f_assessment ADD FOREIGN KEY user_id_idxfk_2 (user_id) REFERENCES user (id);

ALTER TABLE ten_f_assessment ADD FOREIGN KEY group_id_idxfk_1 (group_id) REFERENCES group_assessment_list (id);

ALTER TABLE kpis ADD FOREIGN KEY strategy_id_idxfk_5 (strategy_id) REFERENCES strategy (id);

ALTER TABLE kpis ADD FOREIGN KEY scorecard_id_idxfk_2 (scorecard_id) REFERENCES scorecard (id);

ALTER TABLE kpis ADD FOREIGN KEY modified_by_idxfk_1 (modified_by) REFERENCES user (id);

CREATE INDEX strategy_id_idx ON action_items (strategy_id);
ALTER TABLE action_items ADD FOREIGN KEY strategy_id_idxfk_6 (strategy_id) REFERENCES strategy (id);

CREATE INDEX scorecard_id_idx ON action_items (scorecard_id);
ALTER TABLE action_items ADD FOREIGN KEY scorecard_id_idxfk_3 (scorecard_id) REFERENCES scorecard (id);

ALTER TABLE action_items ADD FOREIGN KEY who_idxfk (who) REFERENCES user (id);

ALTER TABLE action_items ADD FOREIGN KEY status_type_idxfk (status_type) REFERENCES status_type (id);

CREATE INDEX category_id_idx ON action_items (category_id);
ALTER TABLE action_items ADD FOREIGN KEY category_id_idxfk_7 (category_id) REFERENCES category_type (id);

ALTER TABLE action_items ADD FOREIGN KEY modified_by_idxfk_2 (modified_by) REFERENCES user (id);

ALTER TABLE statement ADD FOREIGN KEY scorecard_id_idxfk_4 (scorecard_id) REFERENCES scorecard (id);

ALTER TABLE statement ADD FOREIGN KEY modified_by_idxfk_3 (modified_by) REFERENCES user (id);

ALTER TABLE resource_user_assn ADD FOREIGN KEY resource_id_idxfk_4 (resource_id) REFERENCES resource (id);

ALTER TABLE resource_user_assn ADD FOREIGN KEY user_id_idxfk_3 (user_id) REFERENCES user (id);

ALTER TABLE lra_assessment ADD FOREIGN KEY resource_status_id_idxfk_2 (resource_status_id) REFERENCES resource_status (id);

ALTER TABLE lra_assessment ADD FOREIGN KEY resource_id_idxfk_5 (resource_id) REFERENCES resource (id);

ALTER TABLE lra_assessment ADD FOREIGN KEY user_id_idxfk_4 (user_id) REFERENCES user (id);

ALTER TABLE lra_assessment ADD FOREIGN KEY group_id_idxfk_2 (group_id) REFERENCES group_assessment_list (id);

ALTER TABLE company_user_assn ADD FOREIGN KEY company_id_idxfk_2 (company_id) REFERENCES company (id);

ALTER TABLE company_user_assn ADD FOREIGN KEY user_id_idxfk_5 (user_id) REFERENCES user (id);

ALTER TABLE assessment_manager_assn ADD FOREIGN KEY user_id_idxfk_6 (user_id) REFERENCES user (id);

ALTER TABLE assessment_manager_assn ADD FOREIGN KEY group_assessment_id_idxfk (group_assessment_id) REFERENCES group_assessment_list (id);

ALTER TABLE kingdom_business_assessment ADD FOREIGN KEY company_id_idxfk_3 (company_id) REFERENCES company (id);

ALTER TABLE kingdom_business_assessment ADD FOREIGN KEY resource_id_idxfk_6 (resource_id) REFERENCES resource (id);

ALTER TABLE kingdom_business_assessment ADD FOREIGN KEY user_id_idxfk_7 (user_id) REFERENCES user (id);

ALTER TABLE kingdom_business_assessment ADD FOREIGN KEY resource_status_id_idxfk_3 (resource_status_id) REFERENCES resource_status (id);

ALTER TABLE kingdom_business_assessment ADD FOREIGN KEY group_id_idxfk_3 (group_id) REFERENCES group_assessment_list (id);

ALTER TABLE seasonal_assessment ADD FOREIGN KEY resource_status_id_idxfk_4 (resource_status_id) REFERENCES resource_status (id);

ALTER TABLE seasonal_assessment ADD FOREIGN KEY resource_id_idxfk_7 (resource_id) REFERENCES resource (id);

ALTER TABLE seasonal_assessment ADD FOREIGN KEY user_id_idxfk_8 (user_id) REFERENCES user (id);

ALTER TABLE seasonal_assessment ADD FOREIGN KEY group_id_idxfk_4 (group_id) REFERENCES group_assessment_list (id);

ALTER TABLE lemon_assessment ADD FOREIGN KEY user_id_idxfk_9 (user_id) REFERENCES user (id);

ALTER TABLE lemon_assessment ADD FOREIGN KEY company_id_idxfk_4 (company_id) REFERENCES company (id);

ALTER TABLE lemon_assessment ADD FOREIGN KEY resource_id_idxfk_8 (resource_id) REFERENCES resource (id);

ALTER TABLE lemon_assessment ADD FOREIGN KEY group_id_idxfk_5 (group_id) REFERENCES group_assessment_list (id);

ALTER TABLE ten_p_assessment ADD FOREIGN KEY resource_status_id_idxfk_5 (resource_status_id) REFERENCES resource_status (id);

ALTER TABLE ten_p_assessment ADD FOREIGN KEY company_id_idxfk_5 (company_id) REFERENCES company (id);

ALTER TABLE ten_p_assessment ADD FOREIGN KEY resource_id_idxfk_9 (resource_id) REFERENCES resource (id);

ALTER TABLE ten_p_assessment ADD FOREIGN KEY user_id_idxfk_10 (user_id) REFERENCES user (id);

ALTER TABLE ten_p_assessment ADD FOREIGN KEY group_id_idxfk_6 (group_id) REFERENCES group_assessment_list (id);

ALTER TABLE time_assessment ADD FOREIGN KEY resource_status_id_idxfk_6 (resource_status_id) REFERENCES resource_status (id);

ALTER TABLE time_assessment ADD FOREIGN KEY resource_id_idxfk_10 (resource_id) REFERENCES resource (id);

ALTER TABLE time_assessment ADD FOREIGN KEY user_id_idxfk_11 (user_id) REFERENCES user (id);

ALTER TABLE time_assessment ADD FOREIGN KEY group_id_idxfk_7 (group_id) REFERENCES group_assessment_list (id);

ALTER TABLE upward_assessment ADD FOREIGN KEY user_id_idxfk_12 (user_id) REFERENCES user (id);

ALTER TABLE upward_assessment ADD FOREIGN KEY group_id_idxfk_8 (group_id) REFERENCES group_assessment_list (id);
