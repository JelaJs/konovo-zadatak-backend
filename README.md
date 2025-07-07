## BACKEND IMPLMENTACIJA

### Dohvatanje i obrada proizvoda:
API treba da omogući pristup informacijama o proizvodima.

Neophodno je da koristi JWT token dobijen od eksternog API-ja za autentifikaciju prilikom dohvatanja podataka o proizvodima.

Prilikom obrade, za proizvode iz kategorije "Monitori", cenu treba uvećati za 10%.

Takođe, u opisu svih proizvoda, reč "brzina" treba zameniti sa "performanse" (case-insensitive).

API bi trebalo da podržava filtriranje i pretragu obrađenih proizvoda na osnovu kategorije i unetog teksta.

Očekivani izlaz je JSON format.


### Pristup pojedinačnom proizvodu:

API treba da omogući dohvat detalja specifičnog proizvoda na osnovu njegovog ID-a.

Potrebno je primeniti istu logiku obrade podataka kao i za listu proizvoda.

Ukoliko traženi proizvod ne postoji, API treba da vrati odgovarajući status (npr. 404 Not Found).
