CREATE DATABASE bankauth;
CREATE TABLE "users" (
    "id" SERIAL NOT NULL,
    "username" varchar(100) NOT NULL,
    "password" varchar(255) NOT NULL,
    "email" varchar(254) NOT NULL,
    "activation_selector" varchar(255),
    "activation_code" varchar(255),
    "forgotten_password_selector" varchar(255),
    "forgotten_password_code" varchar(255),
    "forgotten_password_time" int,
    "remember_selector" varchar(255),
    "remember_code" varchar(255),
    "created_on" int,
    "last_login" int,
    "active" int4 DEFAULT 1,
    "first_name" varchar(50),
    "last_name" varchar(50),
    "phone" varchar(20),
  PRIMARY KEY("id"),
  CONSTRAINT "uc_email" UNIQUE ("email"),
  CONSTRAINT "uc_activation_selector" UNIQUE ("activation_selector"),
  CONSTRAINT "uc_forgotten_password_selector" UNIQUE ("forgotten_password_selector"),
  CONSTRAINT "uc_remember_selector" UNIQUE ("remember_selector"),
  CONSTRAINT "check_id" CHECK(id >= 0),
  CONSTRAINT "check_active" CHECK(active >= 0)
);


CREATE TABLE "groups" (
    "id" SERIAL NOT NULL,
    "name" varchar(20) NOT NULL,
    "description" varchar(100) NOT NULL,
  PRIMARY KEY("id"),
  CONSTRAINT "check_id" CHECK(id >= 0)
);


CREATE TABLE "users_groups" (
    "id" SERIAL NOT NULL,
    "user_id" integer NOT NULL,
    "group_id" integer NOT NULL,
  PRIMARY KEY("id"),
  CONSTRAINT "uc_users_groups" UNIQUE (user_id, group_id),
  CONSTRAINT "users_groups_check_id" CHECK(id >= 0),
  CONSTRAINT "users_groups_check_user_id" CHECK(user_id >= 0),
  CONSTRAINT "users_groups_check_group_id" CHECK(group_id >= 0)
);


INSERT INTO groups (id, name, description) VALUES
      (1,'admin','Administrator'),
    (2,'professional','Professional'),
    (3,'client','Client');
INSERT INTO users (username, password, email, activation_code, forgotten_password_code, created_on, last_login, active, first_name, last_name, phone) VALUES
    ('administrator','$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa','admin@admin.com','',NULL,'1268889823','1268889823','1','Admin','istrator','0');

INSERT INTO users_groups (user_id, group_id) VALUES
    (1,1);
   

CREATE TABLE "login_attempts" (
    "id" SERIAL NOT NULL,
    "ip_address" varchar(45),
    "login" varchar(100) NOT NULL,
    "time" int,
  PRIMARY KEY("id"),
  CONSTRAINT "check_id" CHECK(id >= 0)
);

