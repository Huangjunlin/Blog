create table bl_user(id int unsigned not null primary key auto_increment,username char(20) not null default '' unique,password char(32) not null default '' ,logintime int(10) unsigned not null default 0,loginip char(20) not null default '');
INSERT INTO bl_user(username, password, logintime, loginip) VALUES ('root', MD5('root'), UNIX_TIMESTAMP(now()), '127.0.0.1');
INSERT INTO bl_user(username, password, logintime, loginip) VALUES ('july1115', MD5('8895228'), UNIX_TIMESTAMP(now()), '127.0.0.1');
create table bl_attr(id int unsigned not null primary key auto_increment,name char(10) not null default '', color char(10) not null default '');
create table bl_blog(id int unsigned not null primary key auto_increment,title varchar(10) not null default '',content text,time int(10) not null default 0,cid int unsigned not null,del smallint(2) not null default 0);
# 属性中间表,多对多的关系
create table bl_blog_attr(bid int unsigned not null,aid int unsigned not null,index bid(bid),index aid(aid));
# 给bl_blog添加索引字段
alter table bl_blog add index cid(cid);
# 给bl_blog添加点击次数的字段
alter table bl_blog add click smallint(6) unsigned not null default 0 after time;

create table bl_cate(id int unsigned not null primary key auto_increment,name char(15) not null default '',pid int unsigned not null default 0,sort smallint(6) not null default 100);
alter table bl_cate add index pid(pid);

#添加博文摘要字段
alter table bl_blog add summary varchar(255) not null default '' after content;