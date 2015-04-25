/* Post Database in SQLite. */
drop table if exists posts;


create table posts(
  id integer primary key autoincrement,
  /* Store Icon */
  title varchar(40) not null,
  message varchar(200) not null,
  user varchar(40) not null,
  datetime date,
  profile varchar(50) not null
);

drop table if exists comments;

create table comments(
  c_id integer primary key autoincrement,
  message varchar(200) not null,
  user varchar(40) not null,
  datetime date,
  p_id integer
);

insert into posts(title,message,user,datetime,profile) VALUES("Test Post", "Test Message", "Test User", "12/12/12","images/windsor.jpg");
insert into comments(message,user,datetime,p_id) VALUES("Test Message", "Test User", "12/12/12", 1);

select * from posts;
select * from comments;


