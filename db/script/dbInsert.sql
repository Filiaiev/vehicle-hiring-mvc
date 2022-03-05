INSERT INTO Role(roleName) VALUES
	('CUSTOMER'),
	('SHOP_MANAGER'),
	('EVENT_COORDINATOR');

INSERT INTO User(email, pass, roleId) VALUES
	('k2177281@kingston.ac.uk', '$2y$10$8ywYlNlEqxHzuDtfxcWwe.9mFlDlQeUVehJK9FFELO6P4RrsFE9WG', 1),
	('popadiuk@gmail.com', '$2a$12$Ia13LRyt.15LG0x4H8MJBOV0iFDnOKcMD4W3YyPjlAUo7CrIe6mZ6', 1),
	('n.mykh', '$2a$12$LG76zkEzYvqEqgsLEQMOg.E/QZCCndM30096ppVOrTjgZIwh6jGtG', 3),
	('farynka13@gmail.com', '$2a$12$DV5Y79iVyaEE9OkqJSjGLeoOSZvPAvcWdVfCTTn/jgjxb4Waxf4Gy', 2),
	('roberts@gmail.com', '$2a$12$pnT2vhlVpQbZ3d8YInxMmeFTA8EybkwlbgnxMd1J.WvRAj9apsBB6', 1);

INSERT INTO Address(addressLine1, city, postcode) VALUES
	('35 Smith Street', 'Surbiton', 'KT5 8CW'),
	('72 Hobill Walk', 'Surbiton', 'KT5 8SQ'),
	('336 Raeburn Ave', 'Surbiton', 'KT5 9HG'),
	('57 Eden Street', 'Kingston upon Thames', 'KT1 1DA'),
	('55-59 Penhryn Road', 'Kingston upon Thames', 'KT1 2EF'),
	('41 High Street', 'Kingston upon Thames', 'KT2 6ST');

INSERT INTO ContactDetails(firstName, familyName, mobile, email, addressId) VALUES
('Vladyslav', 'Filiaiev', '+447933447549', 'k2177281@kingston.ac.uk', 2),
('Sofia', 'Popadiuk', '+447778889944', 'popadiuk@gmail.com', 1),
('Julia', 'Roberts', '+445556667788', 'roberts@gmail.com', 3);

INSERT INTO DayTrip(dayTripId, venue, price, maxPassengersNum, `date`, pickupTime, returnTime, pickupAddressId) VALUES
(1,'Science Museum',30,35,'2022-04-13','14:30:00','17:30:00',4),
(2,'Buckingham Palace',50,40,'2022-04-14','16:00:00','19:00:00',4),
(3,'Big Ben',15,32,'2022-04-15','18:00:00','19:30:00',5),
(4,'London Transport Museum',27,27,'2022-04-17','14:30:00','17:00:00',6),
(5,'Madame Tussauds',19,26,'2022-04-18','17:50:00','19:30:00',6),
(6,'Kensington Palace',29,30,'2022-04-15','17:40:00','19:40:00',5),
(7,'St.James\'s Palace',14,28,'2022-04-13','17:30:00','19:25:00',4);

INSERT INTO DayTripTicket(ticketID, purchaseDate, contactDetailsId, dayTripId) VALUES
(1,'2022-04-13',1,2),
(2,'2022-04-15',1,1),
(3,'2022-04-14',2,5),
(4,'2022-04-12',3,4),
(5,'2022-04-11',2,7);

INSERT INTO VehiclesBooking(bookingId, bookingDateTime, totalcost, contactDetailsId) VALUES
(1,'2021-01-01 11:30:00',130,1),
(2,'2021-01-11 01:30:00',50,1),
(3,'2021-01-15 17:30:00',25,2),
(4,'2021-02-11 10:30:00',100,3),
(5,'2021-02-15 15:30:00',50,2),
(6,'2021-03-04 12:30:00',25,3),
(7,'2021-03-07 11:30:00',35,3);

INSERT INTO DriverLicenseType(licenseTypeId, licenseTypeName) VALUES
(1,'Category A'),
(2,'Category B'),
(3,'Category C'),
(4,'Category D1');

INSERT INTO VehicleType(vehicleTypeId, typeName, licenseTypeId) VALUES
(1,'Motorbike',1),
(2,'Car',2),
(3,'Large vehicle',3),
(4,'Minibus', 4);

INSERT INTO Brand(brandId, brandName) VALUES
(1,'BMW'),
(2,'Toyota'),
(3,'Hyundai'),
(4,'Porsche'),
(5,'Peugeot'),
(6,'Audi'),
(7,'Suzuki');

INSERT INTO Model(modelId, modelName, brandId, vehicleTypeId) VALUES
(1,'R 1250 RS',1,1),
(2,'R nineT Pure',1,1),
(3,'Hayabusa GSX1300RR',7,1),
(4,'GSX-R750',7,1),
(5,'X5',1,2),
(6,'4 Series Convertible',1,2),
(7,'RAV4 hybrid',2,2),
(8,'Camry',2,2),
(9,'Tucson',3,2),
(10,'Santa fe',3,2),
(11,'Cayenne turbo s',4,2),
(12,'Panamera',4,2),
(13,'2008',5,2),
(14,'A5',6,2),
(15,'Boxer Dropside Single Cab L3',5,3),
(16,'Mighty',3,3),
(17,'H350',3,4),
(18,'Proace',2,4);

INSERT INTO Vehicle(regNum, modelId, dailyRate, imageUrl, maxPassangerNumber, postDate) VALUES
('LG25 RCZ',1,155,'https://mediapool.bmwgroup.com/cache/P9/202106/P90426994/P90426994-bmw-r-1250-rs-light-white-style-sport-06-2021-2121px.jpg',1,'2022-02-10'),
('LG37 HXT',2,130,'https://www.unitgarage.com/data/thumb_cache/_data_cat_img_r_ninet_pure_3_jpg_rw_900.jpg',1,'2022-02-09'),
('LG15 NXO',3,173,'https://www.rgbbikes.com/wp-content/uploads/2020/01/Suzuki-Hayabusa-GSX1300R-Glass-Sparkle-Black-Candy-Burnt-Gold.jpg',1,'2022-02-08'),
('LG20 AST',4,116,'https://ultimatemotorcycling.com/wp-content/uploads/2020/01/2020-Suzuki-GSX-R750-Buyers-Guide-sport-motorcycle-1.jpg',1,'2022-02-10'),
('LG07 VTG',5,240,'https://s0.rbk.ru/v6_top_pics/media/img/2/44/755363161541442.jpg',5,'2022-02-07'),
('LG10 MBE',5,240,'https://bmw.autoportal.ua/img/newcars34/min/bmw_x5_m_2019_34.jpg',5,'2022-02-05'),
('LG18 CPY',6,215,'https://cdn.euroncap.com/media/62848/bmw-4-series-convertible.png',4,'2022-02-06'),
('LG21 HIB',7,220,'https://www.motortrend.com/uploads/2021/11/2022_Toyota_RAV4_SE_Hybrid_001-1.jpg',5,'2022-02-10'),
('LG09 MYR',8,207,'https://images.southernstar.ie/uploads/2021/02/12124447/toyota-camry-2019-gallery-19-full_tcm-3044-1592456.jpg',5,'2022-02-05'),
('LG17 VSP',9,210,'https://s.auto.drom.ru/img4/catalog/photos/fullsize/hyundai/tucson/hyundai_tucson_174056.jpg',5,'2022-02-04'),
('LG18 CPX',10,255,'https://www.autostat.ru/application/includes/blocks/big_photo/images/cache/000/058/289/367d495f-670-0.jpg',7,'2022-02-03'),
('LG03 BOA',11,270,'https://www.domkrat.by/upload/resize_cache/img_catalog/cayenne/870_544_2/porsche_cayenne_1.jpg',5,'2022-02-03'),
('LG18 ZIT',12,266,'https://autogpbl.ru/upload/delight.webpconverter/upload/automarket/Content/auto/offers/2586353/9ad05b48-e035-4590-a247-502479a798b4.jpg.webp?163054898672848',5,'2022-02-02'),
('LG01 VXT',13,235,'https://www.happyrent.it/img/veicoli/1605372719Noleggio-lungo-termine-Peugeot-2008-GT-Line-2020-happyrent-.jpg',5,'2022-02-01'),
('LG14 XOI',14,222,'https://www.autobild.es/sites/autobild.es/public/styles/main_element/public/dc/fotos/Audi-A5_Coupe-2017-C01.jpg?itok=KDf3AxqF',4,'2022-02-02'),
('LG19 LSQ',15,200,'https://commercialvehiclecontracts.co.uk/image.ashx?filename=boxer-dropside-crew-cab-pebc-22.jpg&view=front',3,'2022-02-05'),
('LG11 MZT',16,215,'https://wroom.ru/i/cars2/hyundai_mighty_3.jpg',3,'2022-02-06'),
('LG21 XAY',17,260,'https://autoregion.com.ua/wp-content/uploads/2018/05/hyundai-h350bus-1.jpg',14,'2022-02-08'),
('LG13 AXU',18,265,'https://t1-cms-3.images.toyota-europe.com/toyotaone/plpl/toyota-proace-verso-2020-gallery-022-full_tcm-1015-1822763.jpg',9,'2022-02-07'),
('LG06 PIS',18,265,'https://www.meinauto.de/pics/wpimages/2017/11/toyota-proace-verso-2017-ausen-vorne.jpg',9,'2022-02-07');

INSERT INTO VehiclesBookingItem(bookingDetailId, startDate, endDate, bookingId, regNum) VALUES
(1,'2021-01-01','2021-01-05',1,'LG25 RCZ'),
(2,'2021-01-01','2021-01-05',1,'LG03 BOA'),
(3,'2021-01-12','2021-01-15',2,'LG01 VXT'),
(4,'2021-01-12','2021-01-13',2,'LG18 CPY'),
(5,'2021-01-12','2021-01-15',2,'LG15 NXO'),
(6,'2021-01-15','2021-01-25',3,'LG25 RCZ'),
(7,'2021-01-15','2021-01-25',3,'LG07 VTG'),
(8,'2021-02-12','2021-01-13',4,'LG15 NXO'),
(9,'2021-02-15','2021-01-19',5,'LG01 VXT'),
(10,'2021-03-04','2021-01-05',6,'LG17 VSP'),
(11,'2021-03-04','2021-01-05',6,'LG25 RCZ'),
(12,'2021-03-07','2021-01-28',7,'LG17 VSP'),
(13,'2021-03-07','2021-01-28',7,'LG18 CPX'),
(14,'2021-03-07','2021-01-28',7,'LG09 MYR');