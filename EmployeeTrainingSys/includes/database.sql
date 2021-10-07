create table users(
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
	name varchar(256) not null,
	password varchar(256) not null,
	age int(11) not null,
	sex varchar(11) not null,
	email varchar(256) not null,
	phone_number int(11) not null,
	position varchar(256) not null,
	required_courses varchar(256)
);

create table courses(
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
	name varchar(256) not null
);

create table chapters(
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
	_course_name varchar(256) not null,
	name varchar(256) not null,
	wikipage text(512) not null 
);

create table quizzes(
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
	_chapter_name varchar(256) not null,
	title varchar(256) not null,
	option_1 text(512),
	option_2 text(512),
	option_3 text(512),
	option_4 text(512),
	correct text(512)
);

create table log(
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
	user_id int(11) not null,
	course_name varchar(256) not null,
	chapter_name varchar(256) not null,
	corrects int(11) not null,
	total int(11) not null
);


#add courses
INSERT INTO courses(name)
VALUES ('')

#add chapters
INSERT INTO chapters(_course_name, name, wikipage)
VALUES('Install the Apache Web Server on Ubuntu 16.04', '', '')


#add quizzes
INSERT INTO quizzes(_chapter_name,  title, option_1, option_2, option_3, option_4, correct)
VALUES ('Initial Server Setup with Ubuntu 16.04', '', '', '', '', '', '')




INSERT INTO users (name,password,age,sex,email,phone_number,position) 
VALUES ('$input_name','$input_password','$input_age','$input_sex','$input_email','$input_phone_number','$input_position');

//select * from users id='1' OR username = 'chengruixin'

UPDATE users SET username = 'chengrui123', password = '123456' WHERE id = '1'

//DELETE FROM users WHERE id='1'

//SELECT * FROM users ORDER BY id DESC/ASC

//$first = mysqli_real_escape_string($connection, $_POST['first']);

