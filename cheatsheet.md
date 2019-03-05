# AES
UPDATE `poem` SET `name` = CAST(AES_DECRYPT(first_name, 'usa2010') AS CHAR(50)) WHERE id=10
01648df6671bced13398239e7aae978801648df6671bced13398239e7aae9788
01648df6671bced13398239e7aae9788

# the working ones

## encryption
UPDATE `poem` SET `poem` = AES_ENCRYPT("mehmet", 'deneme') WHERE id=10

## decryption
UPDATE `poem` SET `name` = CAST(AES_DECRYPT(UNHEX('01648df6671bced13398239e7aae9788'), 'deneme') AS CHAR(50)) WHERE id=10

## update the last item
UPDATE `poem` SET `name` = CAST(AES_DECRYPT(UNHEX('01648df6671bced13398239e7aae9788'), 'deneme') AS CHAR(50)) WHERE id = (SELECT MAX(poem.id))

UPDATE `poem` SET `encryption_key` = CAST(AES_DECRYPT(UNHEX('01648df6671bced13398239e7aae9788'), 'deneme') AS CHAR(50)) WHERE id = (SELECT id ORDER BY ID DESC LIMIT 1)



### project encryptino
UPDATE `poem` SET `poem` = AES_ENCRYPT((SELECT decrypted_text), (SELECT encryption_key)) WHERE id=11

### triggers
CREATE TRIGGER `crypt` 
AFTER UPDATE ON `poem` 
FOR EACH ROW 
UPDATE `poem` SET `poem` = AES_ENCRYPT((SELECT decrypted_text), (SELECT encryption_key)) WHERE id=NEW.id;

CREATE TRIGGER `crypt` 
AFTER UPDATE ON `poem` 
FOR EACH ROW 
IF (SELECT poem FROM poem WHERE poem=AES_ENCRYPT((SELECT decrypted_text), (SELECT encryption_key))) == NULL THEN
UPDATE `poem` SET `poem` = AES_ENCRYPT((SELECT decrypted_text), (SELECT encryption_key)) WHERE id=NEW.id;
END IF


CREATE TRIGGER `crypt`
AFTER INSERT ON `poem`
FOR EACH ROW
UPDATE poem SET poem = (AES_ENCRYPT((SELECT decrypted_text), (SELECT encryption_key))) WHERE id=NEW.id;

CREATE TRIGGER `recry`
AFTER UPDATE ON `poem`
FOR EACH ROW
INSERT INTO poem ( poem, decrypted_text, encryption_key )
   VALUES
   ( AES_ENCRYPT((SELECT NEW.decrypted_text), (SELECT NEW.encryption_key)), NEW.decrypted_text, NEW.encryption_key)


#### finalmente !!!!!!
CREATE TRIGGER `crypt` 
BEFORE UPDATE ON poem
FOR EACH ROW
SET NEW.poem = AES_ENCRYPT((SELECT NEW.decrypted_text), (SELECT NEW.encryption_key));

- this is the key trigger all of the codes run using this