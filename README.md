# Sprawiedliwi dla Ukraińców
Autor: Kacper Grzesik // kgrzesik17
### [sprawiedliwidlaukraincow.pl]

## Implementacja i konfiguracja

1. Zmień nazwę pliku .env.example na .env
![[Pasted image 20250503191543.png]]

2. Ustaw odpowiednie wartości dla połączenia z bazą danych
![[Pasted image 20250503191748.png]]

3. **WAŻNE!** Po załadowaniu bazy danych, utwórz administratora, przechodząc na witrynę {domena}/register. **Uwaga!** Każdy utworzony użytkownik. Należy zrobić przed upublicznieniem strony, ponieważ dla pierwszej rejestracji nie jest sprawdzane czy dokonuje jej zalogowany administrator.
 ![[Pasted image 20250503192008.png]]
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

- Sortowanie postów
![[Pasted image 20250503192329.png]]

- Intuicyjny routing
![[Pasted image 20250503192353.png]]

