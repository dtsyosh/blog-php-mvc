drop database if exists `blog`; 

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


# Roles _-_-_-_-_-__

insert into `roles` (`name`,`description`) values
('super-admin', 'can do anything'),
('admin', 'editor plus manage posts'),
('editor', 'simple-user plus create posts'),
('simple-user', 'can manage own comments');

# Permissions _-_-__-_-_--_--
insert into `permissions` (`name`,`description`) values
('create-post', 'creates a post'),
('edit-post', 'edits a post'),
('delete-post', 'deletes a post'),
('create-comment', 'creates a comment'),
('edit-comment', 'edits a comment'),
('delete-comment', 'deletes a comment'),
('create-user', 'creates a user'),
('edit-user', 'edits a user'),
('delete-user', 'deletes a user');

# Linking permissions to roles
insert into `permission_role` (`permission_id`, `role_id`) values
(1, 1),(1, 2),(1, 3),(2, 1),(2, 2),(3, 1),(3, 2),(4, 1),(4, 2),(4, 3),(4, 4),(5, 1),(5, 2),(5, 3),(5, 4),(6, 1),(6, 2),(6, 3),(6, 4),(7, 1),(8, 1),(9, 1);

# Some data _-_-_-_-_
insert into `users` (`name`, `email`, `password`) values
 ('Diego Tsuyoshi', 'dttsuyoshi@gmail.com', '123456'),
 ('Geovana Helena', 'geovanahsps@gmail.com', '123456');

insert into `role_user` (`role_id`, `user_id`) values
(1, 3), (2, 4);

 insert into `posts` (`title`, `body`, `user_id`) values
 ('Lorem Ipsum', 'In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam id dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris dictum', 1),
 ('Segundo Lorem Ipsum','Etiam posuere quam ac quam. Maecenas aliquet accumsan leo. Nullam dapibus fermentum ipsum. Etiam quis quam. Integer lacinia. Nulla est. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Integer vulputate sem a nibh rutrum consequat. Maecenas lorem. Pellentesque pretium lectus id turpis. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Fusce wisi. Phasellus faucibus molestie nisl. Fusce eget urna. Curabitur vitae diam non enim vestibulum interdum. Nulla quis diam. Ut tempus purus at lorem. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Aliquam erat volutpat. Nunc auctor. Mauris pretium quam et urna. Fusce nibh. Duis risus. Curabitur sagittis hendrerit ante. Aliquam erat volutpat. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Duis condimentum augue id magna semper rutrum. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Fusce consectetuer risus a nunc. Aliquam ornare wisi eu metus. Integer pellentesque quam vel velit. Duis pulvinar.
',2);


# Query to test the foreign key
#select permissions.name as Permissão, roles.name as Função from permission_role as p_r inner join
#permissions on p_r.permission_id = permissions.id  inner join
#roles on p_r.role_id = roles.id order by roles.id;