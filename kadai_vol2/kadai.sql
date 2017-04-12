-- 課題_第2弾の課題1~18

# 課題1
SELECT * FROM users WHERE area="沖縄県" AND gender = "女";

# 課題2
SELECT name,email FROM users WHERE area="千葉県" AND gender = "男";

# 課題3
SELECT * FROM items ORDER BY price DESC;

# 課題4
SELECT * FROM items ORDER BY price DESC LIMIT 0,10;

# 課題5
SELECT * FROM items WHERE stock >= 100;

# 課題6
SELECT * FROM items WHERE stock BETWEEN 40 AND 100;

# 課題7
SELECT * FROM users WHERE area="愛知県" OR area="大阪府";

# 課題8
SELECT * FROM users WHERE name LIKE "%島%";

# 課題9
SELECT * FROM users WHERE name LIKE "大%";

# 課題10
SELECT * FROM users WHERE name LIKE "%郎";

# 課題11
SELECT * FROM users WHERE name LIKE "%田%" OR area LIKE "%都";

# 課題12
INSERT INTO items VALUES (1015,"ご家庭用宮古島完熟マンゴー 1kg","沖縄特産品本舗",4180,20);

# 課題13
INSERT INTO items (id,item_name,maker,price,stock) VALUES (1016,"ご家庭用宮古島完熟マンゴー 2kg","沖縄特産品本舗",8360,10);

# 課題14
UPDATE items SET item_name = "ご家庭用宮古島完熟マンゴー 10kg",maker = "沖縄特産品本舗 那覇支店",price = 5180,stock = 40 WHERE id = 1015;

# 課題15
DELETE FROM items WHERE id = 1015 OR id = 1016;

# 課題16
SELECT maker,SUM(stock) FROM items GROUP BY maker;

# 課題17
SELECT maker,SUM(stock) FROM items GROUP BY maker HAVING SUM(stock) >= 200;

# 課題18
SELECT * FROM users JOIN orders ON users.id = orders.user_id;


