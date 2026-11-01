# Calcolo del costo di un noleggio in PHP

Compito in classe di PHP del quinto anno (maggio 2026). Un modulo HTML raccoglie i dati del noleggio e lo script PHP calcola il costo in base ai giorni e alle ore di utilizzo, con uno sconto oltre le 24 ore.

Scheda completa nel portfolio, con gli screenshot: <https://portfoliogigi.com/progetti/compito-php-noleggio/>

## Contenuto

| File | Descrizione |
|---|---|
| `index.html` | Modulo con nome, cognome, data di inizio, data di fine e ore di utilizzo giornaliero |
| `noleggio.php` | Controlli sui dati e calcolo del costo |
| `style.css` | Stile della pagina |
| `favicon.jpg` | Icona della pagina |

## Come funziona

- **Modulo HTML** con campi obbligatori, selettori di data e un campo numerico da 1 a 24 ore, inviato con `POST`.
- **Controlli in PHP:** la richiesta deve arrivare dal modulo, la data di fine non può precedere quella di inizio e le ore devono essere più di zero.
- **Calcolo:** i giorni si ottengono con `DateTime`, contando il primo e l'ultimo giorno; ore totali = giorni × ore giornaliere, a 15 € l'ora.
- **Sconto del 10%** quando le ore totali superano 24.

## Come provarlo

Serve PHP (per esempio con [XAMPP](https://www.apachefriends.org/)):

```bash
php -S localhost:8000
```

poi apri <http://localhost:8000> nel browser.

## Limiti noti

- **Dati non filtrati:** nome e cognome vengono stampati senza `htmlspecialchars()`, quindi la pagina è esposta a XSS.
- **Controlli solo nel browser:** il limite di 24 ore e il tipo numerico non vengono ricontrollati in PHP.
- **Struttura della pagina:** il risultato viene stampato dopo la chiusura del documento HTML.
- Nella consegna originale la favicon era una foto di oltre 6 MB; in questo repository è stata sostituita con un'icona di 64 × 64 pixel.

---

Autore: Luigi Lena · [portfoliogigi.com](https://portfoliogigi.com)
