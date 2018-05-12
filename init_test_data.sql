INSERT INTO categories VALUES ('an','Anime','A category for anime. No manga, no hentai.');
INSERT INTO categories VALUES ('ma','Manga','A category for manga. No anime, no hentai.');
INSERT INTO categories VALUES ('gif','GIFs','Collection of gif and webm files.');
INSERT INTO categories VALUES ('pr','Programming','Anything programming related comes here!');
INSERT INTO categories VALUES ('b','Random','Literally anything');
INSERT INTO categories VALUES ('q','Quantum','Stuff about quantummechanincs.');

INSERT INTO threads VALUES(1,'Best Pencils', 'Hey! What kind of pencils do u use for making sketches of pens?', '', now(), 'b');
INSERT INTO threads VALUES(2,'Best pens', 'Hi, What kind of pens do u use for taking notes during a class?', '', now(), 'b');
INSERT INTO threads VALUES(3,'Python multithreading projects', 'Hey! Any ideas on beginner projects for python multithreading? thx', '', now(), 'pr');

INSERT INTO replies VALUES(1, 'Hey, I use Zebra Super Fine H-8000 0.5 from my local shop, and i love it', '', now(), 2);
INSERT INTO replies VALUES(2, 'python sucks, only indians play with snakes', '', now(), 3);
INSERT INTO replies VALUES(3, 'Hi, I just started multithreading, and I am writing an IRC client', '', now(), 3);

