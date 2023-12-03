# Strategy pattern (Behavioral)
- SRP (Single Responsibility principle) -> Šablonas leidžia išskaidyti dideles klases į mažesnes, pvz. Character į AttackType, ArmorType, bet leidžia jiems sąveikauti tarpusavyje.
- OCP (Open-closed principle) -> Šablonas duoda galimybė modifikuoti ar praplėsti klasė, be jos kodo pakeitimo.

# Builder pattern (Creational)
- Builder/CharacterBuilder
- SRP (Single Responsibility principle) -> atskiria objekto sukūrimo logiką nuo objekto panaudojimo

# Factory pattern (Creational)
- Builder/CharacterBuilderFactory

# Observer pattern (Behavioral)
- GameApplication -> subject, pranešia observeriams kai darbas baigtas.
- Observer/XpEarnedObserver -> Observer realizuoja GameObserverInterface
- GameApplication klasei nereikia rūpintis XP ir lygių kėlimo logika. 
Ji tiesiog praneša apie tai savo observeriams ir jie gali daryti savo darbą.

# Decorator pattern (Structural)
- OutputtingXpCalculator dekoruoja klasė XpCalculator servisą.
Pakilus veikėjo lygiui, pasirodo sveikinimo pranešimas.
- Kodas prieš ir po originalaus metodo addXp() kvietimo.
- Dekoratorius sukuriamas čia: App\Command\GameCommand:31