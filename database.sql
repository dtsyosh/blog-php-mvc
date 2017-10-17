create database `blog`;

use `blog`;

# Tables _-_-_-_-_-_
create table `users`(
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(50),
    `email` varchar(50) UNIQUE,
    `password` varchar(50),
    `active` tinyint(1) not null default 1
);

create table `role_user`(
    `role_id` int(11),
    `user_id` int(11)
);

create table `roles`(
    `id` int(11) primary key auto_increment,
    `name` varchar(50),
    `description` varchar(100)
);

create table `permission_role`(
    `permission_id` int(11),
    `role_id` int(11)
);

create table `permissions`(
    `id` int(11) primary key auto_increment,
    `name` varchar(50),
    `description` varchar(100)
);

create table `posts`(
    `id` int(11) primary key auto_increment,
    `title` varchar(100),
    `body` varchar(10000),
    `user_id` int(11),
    `active` tinyint(1) not null default 1
);

create table `comments`(
    `id` int(11) primary key auto_increment,
    `text` varchar(10000),
    `post_id` int(11),
    `user_id` int(11)
);

# Foreign keys _-_-_-_-_-_
alter table `permission_role` add constraint `permission_role_foreign` foreign key (`role_id`) references `roles`(`id`); 
alter table `permission_role` add constraint `role_permission_foreign` foreign key (`permission_id`) references `permissions`(`id`); 
alter table `role_user` add constraint `user_role_foreign` foreign key (`role_id`) references `roles`(`id`); 
alter table `role_user` add constraint `role_user_foreign` foreign key (`user_id`) references `users`(`id`); 
alter table `comments` add constraint `comment_post_foreign` foreign key (`post_id`) references `posts`(`id`); 
alter table `comments` add constraint `comment_user_foreign` foreign key (`user_id`) references `users`(`id`); 
alter table `posts` add constraint `post_user_foreign` foreign key (`user_id`) references `users`(`id`); 

# Some data _-_-_-_-_
insert into `users` (`name`, `email`, `password`, `active`)