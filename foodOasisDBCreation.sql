
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

-- creation of highlights table
create table highlights (
label varchar(64) primary key,
details text,
vendorID int,
image blob,
foreign key (vendorID) references vendors(vendorID)
);

-- insert vendor values: FIRST THREE ALREADY THERE so remove those for those who r updating already created DB
INSERT INTO vendors (username, password, vendorName, bio, website, phone, hours,
address, latitude, longitude) VALUES
('peachtreeFM', 'password', 'Peachtree Farmers Market', 'Fresh local produce and artisan goods.', 'http://www.peachtreefarmersmarket.com', '123-456-7890', 'Saturday: 9am-1pm', '123 Peachtree St, Atlanta, GA', '33.772874', '-84.384823'),
('grantParkFM', 'password', 'Grant Park Farmers Market', 'Community-focused market offering organic produce.', 'http://www.grantparkmarket.org', '456-789-0123', 'Sunday: 9am-1pm', '456 Grant Park Ave, Atlanta, GA', '33.734364', '-84.369813'),
('EAVFM', 'password', 'East Atlanta Village Farmers Market', 'Supporting local farmers and food artisans.', 'http://www.eastatlantafarmersmarket.com', '789-012-3456', 'Thursday: 4pm-8pm', '789 East Atlanta St, Atlanta, GA', '33.740784', '-84.344478');
('lithoniaFM', 'password', 'Lithonia Farmers Market', 'Discover fresh produce and foodie delights at our monthly market.', 'http://www.lithoniamarket.com', '123-456-7890', '3rd Saturday of the month: 12pm-4pm', '6290 Main Street, Lithonia, GA 30058', '33.712645', '-84.105570'),
('stoneMountainFM', 'password', 'Stone Mountain Farmers Market', 'Join us for a selection of local favorites and artisan goods.', 'http://www.stonemountainmarket.com', '456-789-0123', 'Tuesday: 4pm-7pm', '922 Main Street, Stone Mountain, GA 30083', '33.807616', '-84.172684'),
('tuckerFM', 'password', 'Tucker Farmers Market', 'Support local farmers and artisans at our weekly market.', 'http://www.tuckermarket.com', '789-012-3456', 'Thursday: 4pm-8pm', '4882 Lavista Rd, Tucker, GA 30084', '33.855856', '-84.209478'),
('alpharettaFM', 'password', 'Alpharetta Farmers Market', 'Experience the community gathering and fresh produce offerings.', 'http://www.alpharettafarmersmarket.com', '123-456-7890', 'Saturday: 8:30am-1pm', '1 South Main, Alpharetta, GA 30009', '34.075648', '-84.295912'),
('alumaFarmFM', 'password', 'Aluma Farm Farmstand', 'Find a variety of organic produce and foodie delights at our weekly farmstand.', 'http://www.alumafarm.com', '456-789-0123', 'Thursday: 4pm-8pm', '1150 Allene Avenue SW, Atlanta, GA 30310', '33.725532', '-84.412494'),
('boltonRoadFM', 'password', 'Bolton Road Farmers Market', 'Discover fresh produce and artisan goods at our weekly market.', 'http://www.boltonroadmarket.com', '789-012-3456', 'Sunday: 11am-2pm', '2081 Bolton Road NW, Atlanta, GA 30318', '33.801566', '-84.450784'),
('dunwoodyFM', 'password', 'Dunwoody Farmers Market', 'Join us for a selection of local favorites and foodie delights.', 'http://www.dunwoodymarket.com', '123-456-7890', 'Saturday: 8:30am-1pm', '4770 N. Peachtree Road, Dunwoody, GA 30338', '33.935040', '-84.287835'),
('eastPointFM', 'password', 'East Point Farmers Market', 'Experience the community gathering and fresh produce offerings.', 'http://www.eastpointmarket.com', '456-789-0123', 'Wednesday: 4pm-7pm', '2757 East Point St, East Point, GA 30344', '33.680727', '-84.439194'),
('fairburnFM', 'password', 'Fairburn Farmers Market', 'Discover fresh produce and artisan goods at our weekly market.', 'http://www.fairburnmarket.com', '789-012-3456', 'Friday: 5pm-8pm', '15 West Broad Street, Fairburn, GA 30213', '33.567650', '-84.570660'),
('freedomFM', 'password', 'Freedom Farmers Market', 'Join us for a community gathering and support local farmers.', 'http://www.freedommarket.com', '123-456-7890', 'Saturday: 9am-1pm', '453 Freedom Parkway NE, Atlanta, GA 30307', '33.773285', '-84.369021'),
('greenMarket', 'password', 'Green Market at Piedmont Park', 'Discover fresh produce and artisan goods at our weekly market.', 'http://www.greenmarket.com', '456-789-0123', 'Saturday: 9am-1pm', '1071 Piedmont Avenue NE, Atlanta, GA 30309', '33.783918', '-84.371394'),
('heritageFM', 'password', 'Heritage Sandy Springs Farmers Market', 'Join us for a selection of local favorites and community gathering.', 'http://www.heritagemarket.com', '789-012-3456', 'Saturday: 8:30am-12pm', '220 Mt. Vernon Highway NE, Sandy Springs, GA 30328', '33.930708', '-84.385886'),
('morningsideFM', 'password', 'Morningside Farmers Market', 'Discover fresh produce and artisan goods at our weekly market.', 'http://www.morningsidemarket.com', '123-456-7890', 'Saturday: 8am-11:30am', '1393 N. Highland Avenue, Atlanta, GA 30306', '33.790292', '-84.373428'),
('peachtreeRoadFM', 'password', 'Peachtree Road Farmers Market', 'Join us for a selection of local favorites and foodie delights.', 'http://www.peachtreemarket.com', '456-789-0123', 'Saturday: 8:30am-12pm', '2744 Peachtree Road NW, Atlanta, GA 30305', '33.824568', '-84.382227'),
('ponceCityFM', 'password', 'Ponce City Farmers Market', 'Discover fresh produce and artisan goods at our weekly market.', 'http://www.poncemarket.com', '789-012-3456', 'Tuesday: 4pm-8pm', '675 Ponce de Leon Avene NE, Atlanta, GA 30308', '33.772291', '-84.365804');

-- deletes first three entries of previous testing version of db
DELETE FROM highlights WHERE vendorID = 1 or 2 or 3;

-- insert highlights table values for testing - images assigned as null
INSERT INTO highlights (label, details, vendorID, image) VALUES
('Fresh Peaches', 'Juicy and delicious peaches picked at peak ripeness.', 1, NULL),
('Homemade Jams', 'Handcrafted jams bursting with flavor from locally sourced fruits.', 1, NULL),
('Organic Vegetables', 'Fresh organic vegetables straight from the farm to your table.', 2, NULL),
('Farm-fresh Eggs', 'Free-range eggs laid by happy, healthy chickens.', 2, NULL),
('Locally Roasted Coffee', 'Wake up to the aroma of freshly roasted coffee beans.', 3, NULL),
('Farm-to-Table Meats', 'Tender cuts of meat sourced from local farms.', 3, NULL),
('Organic Fruits', 'Naturally sweet and delicious fruits grown without synthetic pesticides.', 4, NULL),
('Specialty Honey', 'Pure, golden honey harvested from local beehives.', 4, NULL),
('Artisanal Chocolates', 'Indulge in decadent chocolates handcrafted with love and care.', 5, NULL),
('Freshly Baked Goods', 'Satisfy your sweet tooth with freshly baked pastries and treats.', 5, NULL),
('Handcrafted Candles', 'Illuminate your space with hand-poured candles in soothing scents.', 6, NULL),
('Farm-fresh Produce', 'A bounty of fresh fruits and vegetables harvested with care.', 6, NULL),
('Farm-fresh Flowers', 'Brighten up your home with vibrant, freshly cut flowers.', 7, NULL),
('Organic Herbs', 'Add flavor to your dishes with aromatic herbs grown organically.', 7, NULL),
('Gourmet Mushrooms', 'Discover the rich, earthy flavors of locally grown gourmet mushrooms.', 8, NULL),
('Homemade Pasta', 'Treat yourself to the authentic taste of homemade pasta.', 8, NULL),
('Freshly Baked Bread', 'Savor the aroma and taste of crusty, freshly baked bread.', 9, NULL),
('Artisanal Cheeses', 'Indulge in a selection of handcrafted cheeses from local dairy farms.', 9, NULL);
('Organic Juices', 'Quench your thirst with refreshing organic fruit juices.', 10, NULL),
('Handmade Soaps', 'Pamper your skin with luxurious handmade soaps crafted with natural ingredients.', 10, NULL),
('Artisanal Salsas', 'Add a kick to your meals with zesty artisanal salsas made from fresh ingredients.', 11, NULL),
('Freshly Roasted Nuts', 'Snack on crunchy, freshly roasted nuts packed with natural goodness.', 11, NULL),
('Homemade Pies', 'Indulge in the irresistible flavors of homemade pies made with love and care.', 12, NULL),
('Organic Teas', 'Sip on soothing organic teas infused with delicate flavors and aromas.', 12, NULL),
('Handcrafted Pottery', 'Elevate your tableware collection with unique handcrafted pottery pieces.', 13, NULL),
('Freshly Squeezed Juices', 'Start your day with a burst of freshness from our freshly squeezed juices.', 13, NULL),
('Artisanal Ice Cream', 'Treat yourself to creamy, handcrafted artisanal ice cream in various flavors.', 14, NULL),
('Organic Spices', 'Enhance the flavor of your dishes with premium organic spices sourced from around the world.', 14, NULL),
('Handmade Jewelry', 'Adorn yourself with exquisite handmade jewelry crafted with precision and care.', 15, NULL),
('Local Honey', 'Sweeten your day with pure, golden honey harvested from local beehives.', 15, NULL),
('Farm-fresh Milk', 'Enjoy the rich and creamy taste of farm-fresh milk straight from the dairy.', 16, NULL),
('Freshly Baked Cookies', 'Indulge your sweet tooth with warm, freshly baked cookies made from scratch.', 16, NULL),
('Organic Skincare Products', 'Nourish your skin with organic skincare products made from natural ingredients.', 17, NULL),
('Artisanal Bread', 'Delight your senses with the aroma and taste of freshly baked artisanal bread.', 17, NULL),
('Handcrafted Woodwork', 'Add a touch of craftsmanship to your home with handcrafted woodwork pieces.', 18, NULL),
('Organic Granola', 'Fuel your day with wholesome organic granola packed with nutritious ingredients.', 18, NULL);

-- adds images to highlights datapoints
UPDATE highlights SET image = organicGranola.webp WHERE label = 'Organic Granola';
UPDATE highlights SET image = handcraftedWoodwork.jpg WHERE label = 'Handcrafted Woodwork';
UPDATE highlights SET image = artisanalBread.jpg WHERE label = 'Artisanal Bread';
UPDATE highlights SET image = organicSkincareProducts.webp WHERE label = 'Organic Skincare Products';
UPDATE highlights SET image = freshlyBakedCookies.jpg WHERE label = 'Freshly Baked Cookies';
UPDATE highlights SET image = farmFreshMilk.jpg WHERE label = 'Farm-fresh Milk';
UPDATE highlights SET image = localHoney.webp WHERE label = 'Local Honey';
UPDATE highlights SET image = handmadeJewelry.jpg WHERE label = 'Handmade Jewelry';
UPDATE highlights SET image = farmFreshMilk.webp WHERE label = 'Farm-fresh Milk';
UPDATE highlights SET image = organicSpices.jpg WHERE label = 'Organic Spices';
UPDATE highlights SET image = artisanalIceCream.webp WHERE label = 'Artisanal Ice Cream';
UPDATE highlights SET image = freshlySqueezedJuices.jpg WHERE label = 'Freshly Squeezed Juices';
UPDATE highlights SET image = handcraftedPottery.jpg WHERE label = 'Handcrafted Pottery';
UPDATE highlights SET image = organicTeas.jpg WHERE label = 'Organic Teas';
UPDATE highlights SET image = homemadePies.jpg WHERE label = 'Homemade Pies';
UPDATE highlights SET image = freshlyRoastedNuts.jpg WHERE label = 'Freshly Roasted Nuts';
UPDATE highlights SET image = artisanalSalsas.webp WHERE label = 'Artisanal Salsas';
UPDATE highlights SET image = handmadeSoaps.webp WHERE label = 'Handmade Soaps';
UPDATE highlights SET image = organicJuices.jpg WHERE label = 'Organic Juices';
UPDATE highlights SET image = artisanalCheeses.webp WHERE label = 'Artisanal Cheeses';
UPDATE highlights SET image = freshlyBakedBread.jpg WHERE label = 'Freshly Baked Bread';
UPDATE highlights SET image = homemadePasta.webp WHERE label = 'Homemade Pasta';
UPDATE highlights SET image = gourmetMushrooms.jpg WHERE label = 'Gourmet Mushrooms';
UPDATE highlights SET image = organicHerbs.png WHERE label = 'Organic Herbs';
UPDATE highlights SET image = farmFreshFlowers.jpg WHERE label = 'Farm-fresh Flowers';
UPDATE highlights SET image = farmFreshProduce.jpg WHERE label = 'Farm-fresh Produce';
UPDATE highlights SET image = handcraftedCandles.webp WHERE label = 'Handcrafted Candles';
UPDATE highlights SET image = freshlyBakedGoods.png WHERE label = 'Freshly Baked Goods';
UPDATE highlights SET image = artisanalChocolates.webp WHERE label = 'Artisanal Chocolates';
UPDATE highlights SET image = specialtyHoney.jpeg WHERE label = 'Specialty Honey';
UPDATE highlights SET image = organicFruits.jpg WHERE label = 'Organic Fruits';
UPDATE highlights SET image = farmToTableMeats.png WHERE label = 'Farm-to-Table Meats';
UPDATE highlights SET image = locallyRoastedCoffee.jpg WHERE label = 'Locally Roasted Coffee';
UPDATE highlights SET image = farmFreshEggs.jpg WHERE label = 'Farm-fresh Eggs';
UPDATE highlights SET image = organicVegetables.jpg WHERE label = 'Organic Vegetables';
UPDATE highlights SET image = homemadeJams.jpg WHERE label = 'Homemade Jams';
UPDATE highlights SET image = freshPeaches.jpg WHERE label = 'Fresh Peaches';

