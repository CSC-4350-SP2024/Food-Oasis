
-- creation of db
create database food_oasis;
use food_oasis;

-- creation of vendors table
create table vendors (
vendorID int auto_increment primary key,
username varchar(30),
password varchar(30),
vendorName varchar(64),
bio varchar(255),
website varchar(64),
phone varchar(15),
hours text,
address varchar(255),
latitude varchar(255),
longitude varchar(255)
);

-- insert vendor values for testing
INSERT INTO vendors (username, password, vendorName, bio, website, phone, hours,
address, latitude, longitude) VALUES
('peachtreeFM', 'password', 'Peachtree Farmers Market', 'Fresh local produce and artisan
goods.', 'http://www.peachtreefarmersmarket.com', '123-456-7890', 'Saturday: 9am-1pm', '123
Peachtree St, Atlanta, GA', '33.772874', '-84.384823'),
('grantParkFM', 'password', 'Grant Park Farmers Market', 'Community-focused market offering
organic produce.', 'http://www.grantparkmarket.org', '456-789-0123', 'Sunday: 9am-1pm', '456
Grant Park Ave, Atlanta, GA', '33.734364', '-84.369813'),
('EAVFM', 'password', 'East Atlanta Village Farmers Market', 'Supporting local farmers and food
artisans.', 'http://www.eastatlantafarmersmarket.com', '789-012-3456', 'Thursday: 4pm-8pm',
'789 East Atlanta St, Atlanta, GA', '33.740784', '-84.344478');

-- creation of highlights table
create table highlights (
label varchar(64) primary key,
details text,
vendorID int,
image blob,
foreign key (vendorID) references vendors(vendorID)
);

-- insert highlights table values for testing - missing images right now
INSERT INTO highlights (label, details, vendorID) VALUES
('Fresh Produce', 'Find a variety of fresh fruits and vegetables from local farmers.', 1),
('Artisan Goods', 'Discover handcrafted artisan goods made by local artisans.', 1),
('Organic Offerings', 'Explore a selection of organic produce straight from the farm.', 2),
('Community Gathering', 'Join the community every Sunday for fresh food and live music.', 2),
('Local Favorites', 'Support local businesses and enjoy a diverse range of products.', 3),
('Foodie Delights', 'Indulge in delicious food and drink options from Atlanta vendors.', 3);