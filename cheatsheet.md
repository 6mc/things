# AES
UPDATE `poem` SET `name` = CAST(AES_DECRYPT(first_name, 'usa2010') AS CHAR(50)) WHERE id=10
01648df6671bced13398239e7aae978801648df6671bced13398239e7aae9788
01648df6671bced13398239e7aae9788

# the working ones

## encryption
UPDATE `poem` SET `poem` = AES_ENCRYPT("mehmet", 'deneme') WHERE id=10

## decryption
UPDATE `poem` SET `name` = CAST(AES_DECRYPT(UNHEX('01648df6671bced13398239e7aae9788'), 'deneme') AS CHAR(50)) WHERE id=10