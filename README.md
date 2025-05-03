# Sprawiedliwi dla Ukraińców
Autor: Kacper Grzesik // kgrzesik17
### [sprawiedliwidlaukraincow.pl]

## Implementacja i konfiguracja

1. Zmień nazwę pliku .env.example na .env

![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/rm-pictures/Pasted%20image%2020250503191517.png?raw=true)

3. Ustaw odpowiednie wartości dla połączenia z bazą danych

![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/rm-pictures/Pasted%20image%2020250503191718.png?raw=true)

5. **WAŻNE!** Po załadowaniu bazy danych, utwórz administratora, przechodząc na witrynę {domena}/register. **Uwaga!** Każdy utworzony użytkownik. Należy zrobić przed upublicznieniem strony, ponieważ dla pierwszej rejestracji nie jest sprawdzane czy dokonuje jej zalogowany administrator.
   
![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/rm-pictures/Pasted%20image%2020250503192008.png?raw=true)
## Funkcjonalność

### Modularny frontend - Blade
Modularny frontend zaimplementowany w Blade pozwala na prostą modyfikację wyglądu strony.

### Strona główna
Strona główna pokazuje w pierwszym kafelku najnowszy utworzony post.

### Użytkownicy
Zaimplementowano system użytkowników w celu autoryzacji administratora.

- Normalni użytkownicy **nie** powinni posiadać konta.
- Poufne dane są hashowane.
- Zalogowani użytkownicy (w tej implementacji - administratorzy) mają dostęp do Panelu Administratora

### Panel administratora
Dla administratorów dostępny jest panel, który znacznie ułatwia administrację artykułami oraz użytkownikami.

- Tworzenie, edycja oraz usuwanie artykułów
- Tworzenie oraz usuwanie użytkowników (administratorów)

### Artykuły
Zaimplementowano system artykułów (postów).

- Sortowanie postów po kategorii.
  System jest dynamiczny i automatycznie pobiera wszystkie dostępne kategorie z tabeli categories w bazie danych
  
![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/rm-pictures/Pasted%20image%2020250503192326.png?raw=true)

- Intuicyjny routing
  
![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/rm-pictures/Pasted%20image%2020250503192351.png?raw=true)

