users

INSERT INTO `users`(`First_Name`, `Last_Name`, `Birthday`, `Education`, `Email`, `Password`, `Tickets`, `Spin_Eligibility`)
VALUES ('John', 'Lennon', '1968-10-25', '1', 'john@lennon.com', 'imagine', '200', '1');
INSERT INTO `users`(`First_Name`, `Last_Name`, `Birthday`, `Education`, `Email`, `Password`, `Tickets`, `Spin_Eligibility`)
VALUES ('Mark', 'Yeet', '1966-10-25', '2', 'mark@yeet.com', 'leet', '10', '1');
INSERT INTO `users`(`First_Name`, `Last_Name`, `Birthday`, `Education`, `Email`, `Password`, `Tickets`, `Spin_Eligibility`)
VALUES ('Karen', 'Donald', '1967-10-25', '3', 'karen@donald.com', 'trump', '230', '1');



educations

INSERT INTO `educations`(`Education_Name`, `Education_ID`) VALUES ('Multimediedesign', '1');
INSERT INTO `educations`(`Education_Name`, `Education_ID`) VALUES ('Datamatiker', '2');
INSERT INTO `educations`(`Education_Name`, `Education_ID`) VALUES ('Finansmedister', '3');




matches

INSERT INTO `matches`(`Email`, `Match_ID`) VALUES ('john@lennon.com', '1');
INSERT INTO `matches`(`Email`, `Match_ID`) VALUES ('mark@yeet.com', '1');




interests

INSERT INTO `interests`(`Interest_Name`, `Interest_ID`) VALUES ('Hockey', '1');
INSERT INTO `interests`(`Interest_Name`, `Interest_ID`) VALUES ('Kage', '2');
INSERT INTO `interests`(`Interest_Name`, `Interest_ID`) VALUES ('Din mor', '3');




user_interests

INSERT INTO `user_interests`(`Email`, `Interest_ID`) VALUES ('john@lennon.com', '1');
INSERT INTO `user_interests`(`Email`, `Interest_ID`) VALUES ('john@lennon.com', '3');
INSERT INTO `user_interests`(`Email`, `Interest_ID`) VALUES ('mark@yeet.com', '2');
INSERT INTO `user_interests`(`Email`, `Interest_ID`) VALUES ('karen@donald.com', '3');

shop

INSERT INTO `shop`(`Rewards`, `Description`, `Price`) VALUES ('Coca-cola', 'Hentes i kantinen', '50');
INSERT INTO `shop`(`Rewards`, `Description`, `Price`) VALUES ('Chips', 'Hentes i kantinen', '550');
INSERT INTO `shop`(`Rewards`, `Description`, `Price`) VALUES ('Kage', 'Bager du selv', '5');




purchase_history

INSERT INTO `purchase_history`(`Rewards`, `Email`, `Timestamp`, `Cash_In`) VALUES ('Coca-cola', john@lennon.com', '2020-03-24 20:39:31', '1');
INSERT INTO `purchase_history`(`Rewards`, `Email`, `Timestamp`, `Cash_In`) VALUES ('Kage', john@lennon.com', '2020-03-24 20:39:35', '2');




chat_group

INSERT INTO `chat_group`(`Chat_ID`, `Chat_Name`) VALUES ('1', 'Fisk');
INSERT INTO `chat_group`(`Chat_ID`, `Chat_Name`) VALUES ('2', 'Frikadelle');
INSERT INTO `chat_group`(`Chat_ID`, `Chat_Name`) VALUES ('3', 'Bodega');



message

INSERT INTO `message`(`Chat_ID`, `Email`, `Message_ID`, `Timestamp`, `Details`) VALUES ('1', 'john@lennon.com', '1', '2020-03-24 21:39:35', 'Hej hvad så din kæmge bøgs');
INSERT INTO `message`(`Chat_ID`, `Email`, `Message_ID`, `Timestamp`, `Details`) VALUES ('1', 'mark@yeet.com', '2', '2010-03-24 21:39:35', 'Jeg fra fortiden');
INSERT INTO `message`(`Chat_ID`, `Email`, `Message_ID`, `Timestamp`, `Details`) VALUES ('2', 'john@lennon.com', '3', '2020-03-24 21:34:35', 'Åh hej med dig kkkkaran');




user_list

INSERT INTO `user_list`(`Email`, `Chat_ID`) VALUES ('mark@yeet.com', '1');
INSERT INTO `user_list`(`Email`, `Chat_ID`) VALUES ('john@lennon.com', '1');
INSERT INTO `user_list`(`Email`, `Chat_ID`) VALUES ('john@lennon.com', '2');



category

INSERT INTO `category`(`Category_Name`, `Category_ID`) VALUES ('Musik', '1');
INSERT INTO `category`(`Category_Name`, `Category_ID`) VALUES ('Sport', '2');
INSERT INTO `category`(`Category_Name`, `Category_ID`) VALUES ('Zumba', '3');


events

INSERT INTO `events`(`Owner_Email`, `Event_ID`, `Event_Name`, `Description`, `Date`, `Location`, `Category_ID`)
VALUES ('john@lennon.com', '1', 'Guitar spillere', 'Kom og se mig spille Imagine', '2020-03-24 23:24:38', 'Nede på havnen', '1');
INSERT INTO `events`(`Owner_Email`, `Event_ID`, `Event_Name`, `Description`, `Date`, `Location`, `Category_ID`)
VALUES ('karen@donald.com', '2', 'Corona protest', 'Kom og protester ligesom Palludan imod Corona. Regeringen skal lave tiltag for at fjerne Corona nu, vi gider ikke mere, tak.', '2120-03-24 23:24:38', 'Rådhuset', '3');



participants

INSERT INTO `participants`(`Event_ID`, `Email`) VALUES ('1', 'john@lennon.com');
INSERT INTO `participants`(`Event_ID`, `Email`) VALUES ('1', 'mark@yeet.com');
INSERT INTO `participants`(`Event_ID`, `Email`) VALUES ('2', 'mark@yeet.com');
INSERT INTO `participants`(`Event_ID`, `Email`) VALUES ('2', 'karen@donald.com');
