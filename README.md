# SellAsist recruitment task
Projekt został stworzony zgodnie z zasadami MVC

Informacje techniczne:
PHP: 8.2
Laravel: 11.31
Docker: 27.3.1

## Przygotowanie projektu
Aby uruchomić projekt, wykonaj poniższe kroki:
1. Skopiuj plik docker-compose.override.yml.dist, tworząc na jego podstawie docker-compose.override.yml.
2. W pliku docker-compose.override.yml ustaw swoje własne porty.
3. Wykonaj następujące polecenia:
```
docker network create sellasist-project
```

```
docker compose build
```

```
docker compose up -d
```

## Uwagi
W pliku PetDTO pole ID jest ustawiane za pomocą losowej wartości (rand(1, 10000)), aby uniknąć problemu, który występuje, gdy w żądaniu przekazujemy null. W takiej sytuacji API zwraca zawsze to samo ID, co utrudnia testowanie operacji takich jak pobieranie, edycja czy usuwanie. Losowe ID pozwala na bardziej wiarygodne i różnorodne scenariusze testowe.
