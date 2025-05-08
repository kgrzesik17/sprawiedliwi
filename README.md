# Sprawiedliwi dla Ukraińców
Autor: Kacper Grzesik // kgrzesik17
### [sprawiedliwidlaukraincow.pl]

## Implementacja i konfiguracja

1. Zmień nazwę pliku .env.example na .env

![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/Pasted%20image%2020250503191517.png?raw=true)

3. Ustaw odpowiednie wartości dla połączenia z bazą danych

![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/Pasted%20image%2020250503191718.png?raw=true)

5. **WAŻNE!** Po załadowaniu bazy danych, utwórz administratora, przechodząc na witrynę {domena}/register. **Uwaga!** Każdy utworzony użytkownik. Należy zrobić przed upublicznieniem strony, ponieważ dla pierwszej rejestracji nie jest sprawdzane czy dokonuje jej zalogowany administrator.
   
![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/Pasted%20image%2020250503192008.png?raw=true)

## Funkcjonalność

### Modularny frontend - Blade
Modularny frontend zaimplementowany w Blade pozwala na prostą modyfikację wyglądu strony.

![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/blade1.png?raw=true)


### Strona główna
Strona główna pokazuje w pierwszym kafelku najnowszy utworzony post.

![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/index1.png?raw=true)

### Użytkownicy
Zaimplementowano system użytkowników w celu autoryzacji administratora.

- Normalni użytkownicy **nie** powinni posiadać konta. Widok dla zwykłego użytkownika:
  
![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/1.png?raw=true)

- Poufne dane są hashowane.
  
![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/2.png?raw=true)

- Zalogowani użytkownicy (w tej implementacji - administratorzy) mają dostęp do Panelu Administratora
  
![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/3.png?raw=true)


### Panel administratora
Dla administratorów dostępny jest panel, który znacznie ułatwia administrację artykułami oraz użytkownikami.

Routing:
- {domena}/panel
- {domena}/login
- {domena}/register
  
![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/panel1.png?raw=true)

- Tworzenie, edycja oraz usuwanie artykułów

![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/panel2.png?raw=true)

![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/panel3.png?raw=true)
  
- Tworzenie użytkowników (administratorów). 

- Dla większego bezpieczeństwa, usuwanie użytkowników odbywa się za pomocą bazy danych

### Artykuły
Zaimplementowano system artykułów (postów).

- Artykuły mogą być pisane z użyciem znaczników HTML. W przypadku udostępnienia tej możliwości użytkownikom, należy zmodyfikować kod.

  ![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/post1.png?raw=true)
  ![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/post2.png?raw=true)

- Sortowanie postów po kategorii.
  System jest dynamiczny i automatycznie pobiera wszystkie dostępne kategorie z tabeli categories w bazie danych
  
![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/Pasted%20image%2020250503192326.png?raw=true)

- Intuicyjny routing
  
![](https://github.com/kgrzesik17/sprawiedliwi/blob/main/readme-pictures/Pasted%20image%2020250503192351.png?raw=true)

