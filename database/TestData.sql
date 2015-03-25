USE FluidSale;

SET SQL_SAFE_UPDATES=0;

delete from MenuTransPlate;
delete from RewardsMember;
delete from Sale;
delete from Rewards;
delete from Member;
delete from Drawer;
delete from Staff;
delete from StaffRole;
delete from MenuItem;
delete from Menu;

insert into Rewards values (001, "Free Soft Drink");
insert into Rewards values (005, "Free Coffee");
insert into Rewards values (010, "Free Smoothie");
insert into Rewards values (015, "Free Dessert");
insert into Rewards values (020, "20% Off Any Menu Item");
insert into Rewards values (025, "50% Off Any Beverage");
insert into Rewards values (030, "10% Off Total");
insert into Rewards values (035, "Free Esspresso Drink");
insert into Rewards values (040, "Free Appitizer");
insert into Rewards values (045, "Free Entre");

insert into Member values(9785010610, "Michael", "Donaruma", 0);
insert into Member values(9785010613, "Brianne", "Reynolds", 0);
insert into Member values(9785010618, "Braden", "Strainge", 0);
insert into Member values(9785010614, "Michael", "Eldridge", 0);

insert into StaffRole values(001, "Owner");
insert into StaffRole values(002, "Shift Manager");
insert into StaffRole values(003, "Associate Trainer");
insert into StaffRole values(004, "Associate");

insert into Staff values(001, 001, "Travis", "Johnson", "password");
insert into Staff values(002, 002, "David", "Jackson", "password");
insert into Staff values(003, 002, "Rachel", "Johnson", "password");
insert into Staff values(004, 002, "Jake", "Geller", "password");
insert into Staff values(005, 003, "Jack", "Johnson", "password");
insert into Staff values(006, 003, "Ed", "Sheeren", "password");
insert into Staff values(007, 004, "Chet", "Faker", "password");
insert into Staff values(008, 004, "Ross", "Geller", "password");
insert into Staff values(009, 004, "Burton", "Smith", "password");
insert into Staff values(010, 004, "Emma", "Considine", "password");
insert into Staff values(011, 004, "Ryan", "Smithson", "password");
insert into Staff values(012, 004, "Kristen", "Weller", "password");

insert into Drawer values(0001, 001, 999.23, 0, 0);

insert into Menu values(001, "Spring 2015", '2015-01-01', '2015-03-28');
insert into Menu values(002, "Summer 2015", '2015-03-29', '2015-08-28');
insert into Menu values(003, "Fall 2015", '2015-08-29', '2015-10-28');
insert into Menu values(004, "Winter 2015", '2015-10-29', '2015-12-31');

insert into MenuItem values(001, 001, "BBQ Chicken Flat Bread", "Savory pulled chicken with our homemade bbq sauce", 6.23);
insert into MenuItem values(002, 001, "Turkey Chilli", "Our famous spring Chilli is back!", 5.99);

insert into Sale (saleID, dID, mPhone, custFN, mealCost, paymentMethod) values(12,0001,9785010610, "Michael",152.36, "visa");
insert into Sale (saleID, dID, mPhone, custFN, mealCost, paymentMethod) values(13,0001,9785010610, "Michael", 65.36, "visa");
insert into Sale (saleID, dID, mPhone, custFN, mealCost, paymentMethod) values(14,0001,9785010614, "Michael", 65.36, "visa");

insert into MenuTransPlate values(1,12,"nuts");

select * from MenuTransPlate;
select * from RewardsMember;
select * from Sale;
select * from Rewards;
select * from Member;
select * from Drawer;
select * from Staff;
select * from StaffRole;
select * from MenuItem;
select * from Menu;