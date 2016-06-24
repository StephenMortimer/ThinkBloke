-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2016 at 03:38 PM
-- Server version: 5.6.29-1~dotdeb+7.1
-- PHP Version: 5.6.21-1~dotdeb+7.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sth742`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_account`
--

CREATE TABLE IF NOT EXISTS `tb_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilePicture` varchar(100) NOT NULL,
  `personalised` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `tb_account`
--

INSERT INTO `tb_account` (`id`, `email`, `username`, `password`, `profilePicture`, `personalised`) VALUES
(105, 'test@test.test', 'test', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991', 'miniheader.png', 'checked'),
(106, 'admin@thinkbloke.co.uk', 'admin', '7fcf4ba391c48784edde599889d6e3f1e47a27db36ecc050cc92f259bfac38afad2c68a1ae804d77075e8fb722503f3eca2b2c1006ee6f6c7b7628cb45fffd1d', 'gadget.png', 'checked'),
(107, 'email@email.com', 'JakeB', '804f50ddbaab7f28c933a95c162d019acbf96afde56dba10e4c7dfcfe453dec4bacf5e78b1ddbdc1695a793bcb5d7d409425db4cc3370e71c4965e4ef992e8c4', 'miniheader.png', 'checked'),
(109, 'j.parmar@edu.salford.ac.uk', 'jay', 'f1ecb37cc45de7b5e816917b042f258e37bd81e95a4352723c172d20095418d82e3c05838912b8801f4f0d215969c0188509868f26735eddc5293880ef0a4c06', 'miniheader.png', ''),
(111, 'Charliewalker1994@gmail.com', 'charlie', '830214dd9532b63e83a8b0d103490a2dddab03054b8427dfd5d71d35f18258fc05e98b449fba46e24c2df21061f76a2cb60328aedbf1e9f7449cc94a2160bb69', 'miniheader.png', ''),
(113, 'change@testemail.com', 'testaccount', 'e18563a6284b884fa86a8abd9dadd19ccf32232b92613d4cd04f8ac13973498ae8748743e22993b30b2eb0174e9d502d2feac71d2a611f089cbd4056f4fdd17e', 'miniheader.png', 'checked'),
(119, 'stephen_mortimer@live.co.uk', 'ste', 'c70b5dd9ebfb6f51d09d4132b7170c9d20750a7852f00680f65658f0310e810056e6763c34c9a00b0e940076f54495c169fc2302cceb312039271c43469507dc', 'miniheader.png', 'checked'),
(121, 'stephen.mortimer@hotmail.co.uk', 'stephen', '47d80e3d06534ada8054f085b1e04d1eb9e0ecab0c1ca75bdcc701a37170b7fd38d6583eb89eadc380445da3ccbed0ee488b86a69d5db61caf967e0b4b6d7427', 'pop-batman.jpg', 'checked'),
(122, 'cwhitfield@netmonkeys.co.uk', 'Colin Whitfield', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 'miniheader.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_likes`
--

CREATE TABLE IF NOT EXISTS `tb_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `likeDislike` varchar(7) NOT NULL,
  `category` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=942 ;

--
-- Dumping data for table `tb_likes`
--

INSERT INTO `tb_likes` (`id`, `productId`, `username`, `likeDislike`, `category`) VALUES
(867, 123, 'admin', 'like', 'Entertainment'),
(868, 106, 'admin', 'like', 'Entertainment'),
(880, 170, 'admin', 'like', 'Gadgets'),
(881, 169, 'JakeB', 'like', 'Gaming'),
(882, 169, 'jay', 'dislike', 'Gaming'),
(883, 167, 'admin', 'like', 'Food '),
(884, 169, 'testaccount', 'like', 'Gaming'),
(885, 27, 'testaccount', 'dislike', 'Gadgets'),
(887, 142, 'admin', 'like', 'Gadgets'),
(888, 110, 'admin', 'like', 'Gadgets'),
(890, 171, 'abc123', 'like', 'Gadgets'),
(891, 170, 'abc123', 'like', 'Gadgets'),
(892, 169, 'abc123', 'like', 'Gaming'),
(893, 167, 'abc123', 'like', 'Food'),
(894, 113, 'Admin', 'like', 'Entertainment'),
(895, 165, 'admin', 'like', 'Food'),
(896, 27, 'admin', 'dislike', 'Gadgets'),
(899, 116, 'admin', 'like', 'Gadgets'),
(900, 171, 'admin', 'like', 'Gadgets'),
(909, 171, 'stephen', 'dislike', 'Gadgets'),
(911, 79, 'stephen', 'dislike', 'Novelty'),
(912, 5, 'stephen', 'dislike', 'Entertainment'),
(915, 136, 'stephen', 'dislike', 'Novelty'),
(916, 145, 'stephen', 'dislike', 'Novelty'),
(922, 169, 'admin', 'like', 'Gaming'),
(923, 158, 'admin', 'like', 'Food'),
(924, 159, 'admin', 'like', 'Gadgets'),
(925, 150, 'admin', 'like', 'Food'),
(926, 139, 'admin', 'like', 'Gadgets'),
(928, 165, 'stephen', 'like', 'Food'),
(929, 161, 'stephen', 'dislike', 'Novelty'),
(930, 171, 'ste', 'like', 'Gadgets'),
(931, 169, 'ste', 'like', 'Gaming'),
(932, 167, 'ste', 'dislike', 'Food'),
(934, 152, 'Admin', 'like', 'Food'),
(935, 157, 'Colin Whitfield', 'like', 'Food'),
(936, 171, 'charlie', 'like', 'Gadgets'),
(937, 165, 'Charlie', 'dislike', 'Food'),
(938, 169, 'Charlie', 'like', 'Gaming'),
(939, 166, 'Charlie', 'like', 'Gaming'),
(940, 104, 'Charlie', 'like', 'Gaming'),
(941, 103, 'Charlie', 'like', 'Gaming');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE IF NOT EXISTS `tb_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` text NOT NULL,
  `pcategory` varchar(40) NOT NULL,
  `pimage` varchar(100) NOT NULL,
  `psummary` text NOT NULL,
  `pprice` float NOT NULL,
  `plink` varchar(255) NOT NULL,
  `plikes` int(11) NOT NULL,
  `pdislikes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id`, `pname`, `pcategory`, `pimage`, `psummary`, `pprice`, `plink`, `plikes`, `pdislikes`) VALUES
(5, 'Dancing Water Speakers', 'Entertainment', 'ws.jpg', 'I know what you''re thinking, "I really wish there were speakers with water inside that danced to the beat of my music..."\n\nWell you''re in luck! ', 19.35, 'http://www.amazon.co.uk/gp/product/B00FF8OE7M/ref=as_li_tl?ie=UTF8&camp=1634&creative=19450&creativeASIN=B00FF8OE7M&linkCode=as2&tag=think0c8-21&linkId=RBUQGQPO4ZD2JPLE', 0, 3),
(27, 'Smart Phone Projector', 'Gadgets', 'sp.jpg', 'Picture this: You''re looking at cat videos on your smart phone when you realise your screen just isn''t big enough. What do you do? You buy one of these!', 28.99, 'http://www.amazon.co.uk/Luckies-2-0-Smart-Phone-Projector-black/dp/B00IR9J6F6', 0, 4),
(29, 'Fire Extinguisher Lighter', 'Novelty', '31k2VL-W8ML.jpg', 'Sick of those plain old boring fire extinguishers that put out fires instead of creating them? Well, have I got a product for you!', 6.25, 'http://www.amazon.co.uk/Cute-Extinguisher-Lighter-Light-lighter/dp/B00ITFQ6P6/', 0, 1),
(31, 'Man Bowl', 'Food&Drink', 'mbowl.jpg', 'Dogs have it so much better than us blokes... they get to do nothing but eat and sleep all day! At least now you can get a taste of what that life is like with the ceramic MAN bowl.', 12.97, 'http://www.amazon.co.uk/Thumbs-Up-MANBOWL-Thumbsup-Bowl/dp/B0053FUFES', 0, 1),
(34, 'Bamboo Bicycle Kit', 'Sports', 'bb.jpg', 'Bikes. So mainstream right? Well, what if I told you that there was a bike you could tell all your friends you had ''before it was cool?'' Behold, the Bamboo Bicycle Build Kit! Now wasn''t that a mouthful...', 320, 'http://www.notonthehighstreet.com/bamboobicycleclub/product/build-a-bicycle', 1, 0),
(43, 'Chilli Powders in a Matchbox', 'Food&Drink', 'hsuasfdh.jpg', 'Hmm... you look too comfortable. I know, you need your taste buds setting on fire! Try some of the hottest chilli powders around, all available in this convenient little matchbox.', 6, 'http://www.notonthehighstreet.com/marvlingbros/product/hot-stuff-in-a-matchbox', 1, 0),
(44, 'Moustache Gloves', 'Novelty', 'gloves.jpg', 'Check these out! Any opportunity to show others that you are a top bloke is an opportunity worth taking... And why not do so by showing off your MOUSTACHE GLOVES!', 22.23, 'https://www.etsy.com/uk/listing/199450676/valentines-day-gift-mustache-beige?ref=br_feed_26&br_feed_tlp=gifts', 0, 1),
(45, 'Legless Corkscrew', 'Food&Drink', 'leglesscorkscrewlife.jpg', 'Ahoy there matey! Arr ye having problems opening yer fancy wine? Fer a few dubloons you can get yerself one of these corkscrew thingies!', 9.95, 'http://www.red5.co.uk/lifestyle-gadgets/tools-survival-gadgets/legless-corkscrew.aspx', 1, 0),
(79, 'USB Pet Rock', 'Novelty', 'petrock.jpg', 'Have you ever wanted your own pet that doesn''t do anything? Of course you answered yes, so here is your very own USB Pet Rock!', 18.46, 'http://www.amazon.co.uk/ThinkGeek-USB-Pet-Rock/dp/B00A9TH6B8/ref=sr_1_1?ie=UTF8&qid=1423865785&sr=8-1&keywords=usb+pet+rock', 0, 2),
(81, 'Scratch off World Map Poster', 'Novelty', 'scratchoff.png', 'The perfect way to keep track of which parts of the world you''ve stepped foot on. Just scratch off the place you''ve been to (just like all those scratch cards I bet you lost money on) and mark your territory.', 12.99, 'http://www.amazon.co.uk/Luckies-Scratch-Map-Personalised-World/dp/B003NCIPS6/ref=sr_1_1?ie=UTF8&qid=1423920243&sr=8-1&keywords=scratch+off+world+map', 0, 1),
(84, 'Game of Thrones Coasters', 'Food&Drink', 'gof.jpg', 'Winter is coming... no wait, it''s going! Which means it''ll soon be beer garden weather... so get your Game of Thrones coasters and prove your loyalty to your house!', 19.99, 'https://www.etsy.com/uk/listing/124549948/game-of-thrones-coasters-variety-pack-of?ref=br_feed_44&br_feed_tlp=gifts', 1, 0),
(85, 'Moustache Cufflinks', 'Novelty', 'mcl.jpg', 'Only real Blokes show off their moustache at every opportunity. These Cufflinks are the perfect way to add accessory to that famous moustache of yours.', 14.26, 'https://www.etsy.com/uk/listing/180171471/moustache-cufflinks-walnut-wood-5th-year?ref=br_feed_1&br_feed_tlp=gifts', 1, 1),
(90, 'Guitar Ice Cube Tray', 'Food&Drink', 'normal_guitar-ice-cubes.jpg', 'Aren''t regular old ice cubes just plain and boring? This Ice Cube Tray will liven up your drink, perfect for any Bloke that enjoys his music.', 10, 'http://www.notonthehighstreet.com/poshtottydesignsinteriors/product/guitar-ice-cube-trays', 1, 0),
(91, 'Muffin Top Cupcake', 'Food&Drink', 'muffin.jpg', 'Put on a bit too much weight over Christmas with all that turkey and beer? Well, now as well as having a muffin top you can bake cupcakes to match it!', 15, 'http://www.notonthehighstreet.com/poshtottydesignsinteriors/product/muffin-top-cupcake-moulds', 0, 1),
(92, 'Perfect Draft Beer', 'Food&Drink', '61uFaHjprjS._SL1000_.jpg', 'Now bear with me here, because I might just have the best beer product in the world. The PERFECT draft beer dispenser, just insert your keg and drink!', 290.51, 'http://www.amazon.co.uk/Philips-25-Perfect-Draft-dispenser/dp/B004GCK1IE/ref=sr_1_1?ie=UTF8&qid=1424011135&sr=8-1&keywords=draft+beer+system', 2, 0),
(99, 'Beard Comb\\Bottle Opener', 'Novelty', 'beardopener.jpg', 'Some products just don''t do exactly what you want them to do. This product however, can open your bottle WHILST combing your beard! Isn''t that neat?', 19, 'http://www.notonthehighstreet.com/mangunbear/product/beard-comb-and-bottle-opener', 0, 1),
(101, 'Wall Climbing Key Holder', 'Novelty', '41l2uWnOwPL._SY355_.jpg', 'A fun little novelty item of a stick-figure climbing a wall and holding your keys for you, who wants one? I do.', 1.98, 'http://www.amazon.co.uk/Novelty-Climbing-Strong-Magnetic-Keyring/dp/B00NQKZDOO/ref=sr_1_38?ie=UTF8&qid=1424705601&sr=8-38&keywords=novelty+gifts', 0, 1),
(102, '1880 Beer Holster', 'Food&Drink', 'beerholder.jpg', 'Be the envy of all blokes with your beer holster. Draw your beer out of your holster like an old western film and all the ladies will come to you. Well, okay I might have lied there, but it''s still pretty cool.', 14.9, 'http://www.amazon.co.uk/GreatGadgets-1880-Beer-Holster-Classic/dp/B007N9OWKU/ref=sr_1_11?ie=UTF8&qid=1424767700&sr=8-11&keywords=unique+gifts+for+men', 2, 0),
(103, 'Constructible Tetris Light', 'Gaming', 'stackabletetris.jpg', 'Want to add a retro look to your room? Want to be able to see things? Well the answer to both of those questions is the constructible tetris light!', 21, 'http://www.amazon.co.uk/gp/product/B00JZGD930/ref=as_li_tl?ie=UTF8&camp=1634&creative=19450&creativeASIN=B00JZGD930&linkCode=as2&tag=think0c8-21&linkId=JA3UV3MTQKP2FXN6', 2, 0),
(104, 'Companion Cube Dice', 'Gaming', 'portalDice.jpg', 'Now, everyone loves Portal. Spending countless hours dragging that companion cube around trying to get to the next puzzle. Now you get to drag the cube around in real life, in the form of dice!', 18.78, 'http://shutupandtakemymoney.com/store/toys/portal-companion-cube-dice', 2, 0),
(106, 'Fake Goldfish', 'Entertainment', 'eb56.gif', 'Who needs real pets? So high maintenance... What you want is something like that looks just like a real pet but you don''t have to worry about dying, like this fake goldfish!', 34.99, 'http://www.amazon.co.uk/Gemmy-34167G-Fincredibles-Fake-Goldfish/dp/B005KUJ16O/ref=sr_1_1?ie=UTF8&qid=1424947182&sr=8-1&keywords=Fincredibles+Fake+Goldfish', 1, 1),
(107, 'Sengled Pulse Solo', 'Entertainment', 'seng.JPG', 'Light bulbs... aren''t they boring? Not to mention you have to get up to go switch them on or off, and they don''t even play music! Well, they do now, with the Sengled Pulse!', 49, 'http://www.amazon.co.uk/World-Premier-JBL-smartphone-Sengled-white/dp/B00QKXFOK2', 2, 0),
(109, 'AIRWHEEL X3', 'Gadgets', 'airwheel-main-3.jpg', 'Who even needs legs anymore? All that walking and having to balance, when this Airwheel can do it all for you, and at 17mph!', 494.95, 'http://www.red5.co.uk/airwheel-x3.aspx', 1, 0),
(110, 'Bluetooth Wireless Speaker ', 'Gadgets', 'il_570xN_714579830_2sio.jpg', 'Alright so this a little on the expensive side for a bluetooth speaker... But have you seen this thing?! It''s made entirely out of wood and brass, has great sound and is entirely handmade. Excellent!', 468.33, 'https://www.etsy.com/uk/listing/219275001/bluetooth-wireless-speaker-horn-stereo?ref=related-0', 2, 0),
(111, 'Captain America Shield Light', 'Novelty', '49463b.jpg', 'I don''t think I need to explain this one. It''s Captain America''s shield stuck in your wall! Oh and it lights stuff up too.', 34.99, 'http://www.menkind.co.uk/captain-america-shield-3d-deco-light', 1, 1),
(112, 'Half Pint Glass', 'Novelty', 'half-pint-glass.jpg', 'All the size of a regular pint glass, only sliced in half. What more can I say?', 9.95, 'http://www.red5.co.uk/half-pint-glass.aspx', 1, 1),
(113, 'Jellyfish Tank', 'Entertainment', 'jellyfish_tank_mini4.jpg', 'Okay so this is cool. Electronic jellyfish that require no care whatsoever, because why not right?', 17.95, 'http://www.red5.co.uk/jellyfish-tank-mini.aspx', 4, 0),
(114, 'Lightsaber', 'Gadgets', 'il_570xN_465912862_2zf1.jpg', 'Literally the closest thing you can get to owning a real lightsaber. Not too shabby!', 314.99, 'https://www.etsy.com/uk/listing/153030940/hero-edition-sinister-prophecy-custom?ref=br_feed_16&br_feed_tlp=gifts', 2, 0),
(115, 'Metal Art T-Rex', 'Novelty', 'metal_art_t-rex-ls-3b.jpg', 'This''ll look great in any bloke''s room. Like Dinosaurs? Like Art? Like, err, metal? Then go get yourself one of these!', 119.95, 'http://www.red5.co.uk/home-gadgets/metal-art-sculptures/metal-art-t-rex.aspx', 0, 1),
(116, 'Instant Print Camera', 'Gadgets', 'PolaroidZ2300.jpg', 'Ever watch an old movie where they have those cameras that print one of those pictures right out of the bottom? Now you can own a more modern version of that camera courtesy of Polaroid.', 159.99, 'http://www.amazon.co.uk/Polaroid-Z2300-Digital-Instant-Camera-White/dp/B008GVXL1A/ref=sr_1_1?ie=UTF8&qid=1426512454&sr=8-1&keywords=Polaroid+Z2300', 2, 0),
(117, 'POP! Vinyl - Batman', 'Novelty', 'pop-batman.jpg', 'These vinyl figures are great, get yourself one of Batman from The Dark Knight Rises.', 12.95, 'http://www.red5.co.uk/toys-and-games/pop-vinyl-figures/pop-vinyl-dark-knight-rises.aspx', 1, 1),
(118, 'POP! Vinyl - Heisenberg', 'Novelty', 'pop-vinyl-heisenberg.jpg', 'A POP! Figure of none other than Walter White, AKA Heisenberg. I want one.', 12.95, 'http://www.red5.co.uk/toys-and-games/pop-vinyl-figures/pop-vinyl-heisenberg.aspx', 2, 1),
(119, 'POP! Vinyl - Joker', 'Novelty', 'pop-joker.jpg', 'One of DC Comics greatest villains, the Joker, is now available in POP! Vinyl figure form.', 12.95, 'http://www.red5.co.uk/pop-vinyl-figures/pop-vinyl-dark-knight-joker.aspx', 1, 1),
(120, 'Solar Powered Fire Starter', 'Gadgets', 'fire-starter.jpg', 'Ever used to burn ants with magnifying glasses as a kid? I can only imagine this is how this product works.', 37, 'http://www.amazon.co.uk/Aurora-Fire-Starter-Tinder-HOT/dp/B00FQCRJGA/ref=sr_1_fkmr0_2?ie=UTF8&qid=1426514211&sr=8-2-fkmr0&keywords=Tinder+Solar+Powered+Fire+Starter', 1, 0),
(121, 'Steampunk Mens Cufflinks ', 'Novelty', 'il_570xN_150001884.jpg', 'Steampunk is so aesthetically pleasing to Blokes. Or at least I think so. Don''t take my word for it anyway, take a look at this fashionable cufflinks.', 86.99, 'https://www.etsy.com/uk/listing/49009249/steampunk-mens-cufflinks-elgin-watch?ref=br_feed_39&br_feed_tlp=gifts', 1, 1),
(122, 'The Beer Briefcase', 'Food&Drink', 'ivvg_beer_briefcase.jpg', 'For those boring office meetings am I right guys? No seriously I wouldn''t drink on the job... Unless you''re trying to get fired. Still, a nifty little product nonetheless.', 27.04, 'http://www.thinkgeek.com/product/iivg/?pfm=HP_ProdTab_1_6_WhatsNew_iivg', 2, 0),
(123, 'Captain Jules''s Useless Box', 'Entertainment', '1522_captain_jules_useless_box.gif', 'This literally amazes me, I''ve never seen such a useless product in my entire life, and yet... I want one.', 27.04, 'http://www.thinkgeek.com/product/1522/', 3, 0),
(124, 'Automatic Guitar Tuner', 'Gadgets', 'automatic-guitar-tuner.jpg', 'I''m sure this''ll appeal to all you music-playing blokes out there. It literally tunes your guitar for you. You''re welcome.', 78.74, 'http://www.amazon.co.uk/gp/product/B00ON9WQ1A/ref=as_li_tl?tag=shupantamym01-21&ie=UTF8&camp=1789&creative=390957&creativeASIN=B00ON9WQ1A&linkCode=as2&linkId=X6ZLLI5LWNJHOA4D', 1, 0),
(125, 'All-Terrain Skateboard', 'Sports', 'rockboard-tank-skateboard.jpg', 'Skateboards are fun right, but you just can''t ride them everywhere... Well this all-terrain skateboard aims to prove otherwise.', 92, 'http://www.amazon.co.uk/Rockboard-Descender-Downhill-All-Terrain-Skateboard/dp/B00BYR7VKU/ref=sr_1_1?ie=UTF8&qid=1426521126&sr=8-1&keywords=All+Terrain+Skateboard', 2, 0),
(126, 'Ostrich Pillow', 'Novelty', '41Mn8IHZwnL._SY355_.jpg', 'Hide from all your troubles and stick your head in the sand... or this ostrich pillow, I think I know which one I''d choose.', 49.72, 'http://www.amazon.co.uk/Studio-Banana-Things-OP-1-Ostrich/dp/B00B4S6SLW/ref=sr_1_3?ie=UTF8&qid=1426521475&sr=8-3&keywords=Ostrich+Pillow', 2, 1),
(130, 'Briefcase Vinyl Player', 'Gadgets', '915qEOSwQpL._SL1500_.jpg', 'For you vinyl lovers out there, this is literally a must-have. Like everything nowadays, it even supports USB! This vinyl player is definitely one of my favourites.', 69.49, 'http://www.amazon.co.uk/Crosley-Briefcase-Three-Speed-Portable-Turntable/dp/B00990Z4W6/ref=sr_1_2?ie=UTF8&qid=1426531153&sr=8-2&keywords=record+player', 3, 0),
(132, 'Wooden Mechanical Clock', 'Gadgets', 'woodenclock.gif', 'This mechanical clock has the added satisfaction of being able to build it yourself, for those who like that sort of thing. Not to mention how cool it looks!', 47.17, 'http://www.thinkgeek.com/product/hshg/', 2, 0),
(133, 'Reel-to-Reel Bag ', 'Novelty', 'Reel2Reel.jpg', 'Luxury hand-crafted reel-to-reel bag for those music lovers than want to make a statement. Pretty nice.', 121.32, 'https://www.etsy.com/uk/listing/74127763/reel-to-reel-bag-akai-77-music-lover?ulsfg=true', 1, 1),
(134, 'iPhone 6 Projector', 'Gadgets', 'iphone6Projector.jpg', 'Slot your iPhone 6 in, out comes a large fully functioning projector! Excellent iPhone accessory.', 229, 'http://www.amazon.co.uk/Aiptek-MobileCinema-Pico-Projector-iPhone/dp/B00T5LMU9E/ref=sr_1_3?ie=UTF8&qid=1426584471&sr=8-3&keywords=iphone+6+projector', 1, 0),
(136, 'Human Face Candle', 'Novelty', 'HumanFaceCandle.jpg', 'This is pretty freaky I''m not gonna lie, and that''s exactly why I want one. I''d love to see what this looks like once it''s melted.', 19.99, 'https://www.etsy.com/uk/listing/201346996/bodily-candle-face-candle-ears-candle?ref=shop_home_active_6', 0, 2),
(139, 'iFingerLock', 'Gadgets', 'iFingerLock.jpg', 'Physical padlock that locks with your fingerprint. Seriously the future is here... Excellent idea.', 77.9, 'http://www.amazon.com/dp/B00FQ6MW4K/?tag=coolmaterial-20', 3, 0),
(142, 'Tribe Marvel USB 8GB', 'Gadgets', 'tribe_usb_marvel6b.jpg', 'For marvel fans this is a fun little product for you. You get to plug the hulk into your pc when you want to backup your files - nice!', 14.95, 'http://www.red5.co.uk/tribe-marvel-usb-8gb.aspx', 5, 0),
(143, 'Magic Music Monkey', 'Entertainment', 'monkey-speaker.gif', 'A magic little monkey that enjoys listening to your music almost as much as you do. Oh and it doubles as a speaker,so you two can have a little dance to your music!', 19.95, 'http://www.red5.co.uk/toys-and-games/critters-creatures/magic-music-monkey.aspx', 1, 0),
(144, 'Mr.Tea Infuser', 'Food&Drink', 'MrTeaInfuser.jpg', 'Watch as this little guy helps to create the perfect cuppa whilst chilling out at the top of your mug, I like it.', 1.69, 'http://www.amazon.co.uk/Estone%C2%AE-Silicone-Infuser-Strainer-Diffuser/dp/B00N0PC9MY/ref=sr_1_3?s=kitchen&ie=UTF8&qid=1426599904&sr=1-3&keywords=NOKI', 0, 1),
(146, 'Campervan Toaster', 'Food&Drink', 'campervanToaster.jpg', 'For the campers... that want toast. Basically, or I don''t know, if you like campervans - I admit this a pretty niche product but hey, here you go.', 39.99, 'http://www.menkind.co.uk/campervan-toaster', 1, 0),
(149, 'Motorbike Pizza Cutter', 'Food&Drink', 'PizzaChopper.jpg', 'Motorbike that cuts your pizza. Disclaimer - not an actual motorbike. But you knew that already, right?', 7.45, 'http://www.amazon.co.uk/NOKI-Pizza-Chopper-Motobike-Cutter/dp/B00CBUNBB2/ref=sr_1_5?s=kitchen&ie=UTF8&qid=1426600271&sr=1-5&keywords=NOKI', 2, 1),
(150, 'Luchador Bottle Opener', 'Food&Drink', 'LUCHADORBOTTLE.jpg', 'Wrestle that bottle open with ease with this luchador bottle opener. Fun way to crack open a beer.', 8.13, 'http://www.amazon.co.uk/Kikkerland-Rubberized-Coating-Luchador-Bottle/dp/B00J0GA2XK/ref=pd_sim_sbs_kh_1?ie=UTF8&refRID=1KT4B353NG695G27EWG7', 2, 1),
(151, 'Pocket Pint', 'Food&Drink', 'pocket_pint1b.jpg', 'For those emergencies when you have cans but have no time to grab a glass to pour them in, you can carry this little nifty thing around in your pocket. A pint cup that folds down to 4cm!', 5.95, 'http://www.red5.co.uk/lifestyle-gadgets/outdoor-gadgets/pocket-pint.aspx', 1, 1),
(152, 'Matterhorn Whisky Glass', 'Food&Drink', 'MatterhornWhiskyGlass.jpg', 'I love this already. Drink your whiskey in style with the famous Matterhorn Mountain inside. Nice touch.', 29.99, 'http://www.amazon.co.uk/Tale-MATTERHORN-GLASS-Crystal-Matterhorn/dp/B00DAX30NI/ref=sr_1_1?ie=UTF8&qid=1426599413&sr=8-1&keywords=MATTERHORN+GLASSES', 5, 0),
(153, 'Pug in A Mug', 'Food&Drink', 'puginmug.jpg', 'Pugs are great aren''t they? I mean who doesn''t love Pugs... And pug lovers, guess what, now you can get your very own Pug in a Mug!', 5.99, 'http://www.amazon.co.uk/NOKI-Pug-Mug-Silicone-Infuser/dp/B00KBSTDWC/ref=sr_1_12?ie=UTF8&qid=1426599809&sr=8-12&keywords=pug+mug', 2, 0),
(155, 'Egg Cup and Toast Cutter', 'Food&Drink', 'eggtank.jpg', 'For those blokes with kids. Get them eating their eggs with this tank egg cup, (if you can even call it a cup) complete with soldier shaped toast cutters.', 6.99, 'http://www.amazon.co.uk/NOKI-Egg-Splode-Egg-Toast-Cutter/dp/B00CBUN64Y/ref=sr_1_1?s=kitchen&ie=UTF8&qid=1426600166&sr=1-1&keywords=NOKI', 1, 1),
(157, 'Whisky Stones', 'Food&Drink', 'WhiskeyStones.jpg', 'Nobody likes watered down whisky. But some like it cold, how do you solve this problem? With these whisky stones of course.', 6.99, 'http://www.amazon.co.uk/SAVFY%C2%AE-Whisky-Chilling-Whiskey-Granite/dp/B00AZFJO2A/ref=sr_1_1?ie=UTF8&qid=1426599217&sr=8-1&keywords=whisky+stones', 4, 0),
(158, 'Secret Binocular Flask', 'Food&Drink', 'SecretBinocularFlask.jpg', 'You''re out on a boring camping trip and you want to spice things up a bit? Carry your secret binocular flask around and pour your favourite spirit in for a good time.', 33.5, 'http://www.amazon.co.uk/Secret-Binocular-Flask-by-HomeWetBar/dp/B00OSCGFSW/ref=sr_1_5?ie=UTF8&qid=1426673461&sr=8-5&keywords=Secret+Binocular+Flask', 3, 0),
(159, 'Desktop Henry Vacuum', 'Gadgets', 'DesktopHenry.jpg', 'Your keyboard getting a little messy? Get Henry on the case, works just like the regular Henry vacuum cleaner but, you know, smaller.', 11.44, 'http://www.amazon.co.uk/Paladone-PP0119-Desktop-Vacuum-Cleaner/dp/B001GNTLGY/ref=sr_1_2?ie=UTF8&qid=1426601399&sr=8-2&keywords=usb+hoover', 4, 1),
(160, 'USB Mini Fridge', 'Gadgets', 'USBMiniFridge.jpg', 'Working away (or playing games) at your pc and you need a drink right? Keep your drink cool with this USB mini fridge.', 14.9, 'http://www.amazon.co.uk/GreatGadgets-3072-Mini-Fridge-Black/dp/B0038P9LJ0/ref=sr_1_12?ie=UTF8&qid=1426712505&sr=8-12&keywords=vending+machine', 4, 1),
(161, 'Samurai Sword Kitchen Knife', 'Novelty', 'SamuraiSword.jpg', 'For the times when you need to look badass whilst slicing those onions, get your samurai sword kitchen knife out!', 10.69, 'http://www.amazon.co.uk/Close-Up-Samurai-Kitchen-Knife/dp/B00O1AGLJE/ref=sr_1_20?s=kitchen&ie=UTF8&qid=1426752713&sr=1-20&keywords=samurai+sword', 2, 2),
(165, 'Beer Hammer Bottle Opener', 'Food&Drink', 'beerhammer.jpg', 'You can''t exactly get much manlier than this, crack open your beer with a hammer, and then go proceed to bleed some radiators or fix cars or whatever blokes do nowadays.', 6.99, 'http://www.amazon.co.uk/ThinkGeek-Beer-Hammer-Bottle-Opener/dp/B00DIL7FQA/ref=sr_1_1?ie=UTF8&qid=1426757956&sr=8-1&keywords=beer+hammer+bottle+opener', 7, 1),
(166, 'iCade for iPad', 'Gaming', 'iCade.jpg', 'Mini arcade using apps on your ipad, for a steal of a price! Who doesn''t want one?', 35, 'http://www.amazon.co.uk/iCade-Arcade-Gaming-Cabinet-iPad/dp/B004YC4NH6/ref=sr_1_1?ie=UTF8&qid=1426758055&sr=8-1&keywords=ION+icade', 6, 0),
(167, 'Beer Making Kit', 'Food&Drink', 'beermakingkit.jpg', 'Who needs branded beer when you can make your own! Complete with all ingredients and a step-by-step guide, this is foolproof.', 46.49, 'http://www.amazon.co.uk/Brooklyn-Brew-Beer-Making-Everyday/dp/B005G20IIG/ref=sr_1_16?ie=UTF8&qid=1426758941&sr=8-16&keywords=beer+making+kit', 7, 2),
(169, 'Pac Man Ghost Lamp', 'Gaming', 'pacmanlamp.jpg', 'Add to your retro arcade style bedroom with this pac man ghost lamp. It changes colour and everything!', 29.99, 'http://www.amazon.co.uk/Pac-Man-Ghost-Lamp/dp/B00NEWPMMW/ref=sr_1_cc_2?s=aps&ie=UTF8&qid=1426753109&sr=1-2-catcorr&keywords=pac+man+ghost+lamp', 6, 1),
(170, 'Robot Cleaning Ball', 'Gadgets', 'RobotCleaningBall.gif', 'Blokes don''t have time to clean. They''re too busy doing bloke things, so now you can get this robot cleaning ball to do some of the cleaning for you!', 32.21, 'http://www.amazon.co.uk/Automatic-Corocoro-Cleaning-cleaner-Microfiber/dp/B00B6ZN7IA/ref=sr_1_1?ie=UTF8&qid=1426760174&sr=8-1&keywords=robot+cleaning+ball', 6, 0),
(171, 'Time-lapse Turntable', 'Gadgets', 'PhoneTimelapse.jpg', 'If you have an iPhone you can create amazing timelapses with this little tool, it turns 360 degrees and creates a professional looking timelapse, every time.', 20, 'http://www.amazon.co.uk/Veho-VCC-100-XL-Photography-Timelapse-Accessory/dp/B00AJIZBWA/ref=sr_1_1?ie=UTF8&qid=1426761121&sr=8-1&keywords=Smartphone+Time-lapse+Turntable', 7, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
