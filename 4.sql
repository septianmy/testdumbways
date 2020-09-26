SELECT * FROM product_tb INNER JOIN importir_tb where importir_tb.id = product_tb.importir_id

SELECT product_tb.name, importir_tb.name FROM product_tb INNER JOIN importir_tb where importir_tb.id = product_tb.importir_id AND importir_tb.id = 1

INSERT INTO product_tb (name, importir_id, photo, qty, price) VALUES('Mini Velo','1','images/minivelo.jpg','2','2000000')

INSERT INTO importir_tb(name, address, phone) VALUES('PT. Jayamakmur Sepeda','Solo, Jawa Tengah','089191991')