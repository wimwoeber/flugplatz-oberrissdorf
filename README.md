# Flugplatz Oberrißdorf (EDUO) - Website

Moderne Website des **Luftfahrtverein Mansfelder Land e.V.** mit integriertem Admin-Panel.

## Tech-Stack

- **Astro** v5 - Static Site Generator
- **Tailwind CSS** v4 - Styling
- **PHP** - Admin-API (JSON-Dateien speichern)
- **Holfuy** - Wetter-Widget

## Voraussetzungen

- **Node.js** v18+ (nur zum Bauen, nicht im Betrieb)
- **npm** (kommt mit Node.js)
- **Webspace** mit PHP (fuer Admin-Panel)

## Installation & Entwicklung

```bash
# Repository klonen
git clone https://github.com/wimwoeber/flugplatz-oberrissdorf.git
cd flugplatz-oberrissdorf

# Abhaengigkeiten installieren
npm install

# Entwicklungsserver starten (http://localhost:4321)
npm run dev

# Produktions-Build erstellen
npm run build

# Build lokal testen
npm run preview
```

## Projekt-Struktur

```
src/
├── content/          # JSON-Dateien mit allen Inhalten
│   ├── site.json     # Kontaktdaten, Verein, Telefonnummern
│   ├── airfield.json # Flugplatzdaten (ICAO, Frequenz etc.)
│   ├── fees.json     # Lande- und Parkgebuehren
│   ├── team.json     # Vorstandsmitglieder
│   ├── aircraft.json # Fluggeraete und Aktivitaeten
│   └── impressum.json# Impressum-Text (HTML)
├── layouts/
│   └── Layout.astro  # Hauptlayout (Header, Footer, Meta)
├── components/
│   ├── Header.astro  # Navigation (responsive, Hamburger-Menu)
│   └── Footer.astro  # Footer
├── pages/
│   ├── index.astro       # Startseite (Hero, Wetter, Info-Cards)
│   ├── flugplatz.astro   # Flugplatz-Infos + Anflugkarte
│   ├── gebuehren.astro   # Gebuehrentabellen
│   ├── verein.astro      # Geschichte, Vorstand, Fluggeraete
│   ├── galerie.astro     # Bildergalerie mit Lightbox
│   ├── kontakt.astro     # Kontakt + OSM-Karte + Formular
│   ├── impressum.astro   # Impressum
│   ├── datenschutz.astro # Datenschutz (Legal Cockpit Platzhalter)
│   └── admin/
│       └── index.astro   # Admin-Panel (CMS)
└── styles/
    └── global.css        # Tailwind-Konfiguration + Farben

public/
├── api/
│   └── save.php      # PHP-API zum Speichern der JSON-Dateien
├── data/             # JSON-Dateien fuer Produktivbetrieb
├── images/           # Bilder (Hero, Galerie, Anflugkarte)
└── favicon.svg
```

## Deployment auf Webspace

### 1. Build erstellen

```bash
npm run build
```

Erzeugt alle Dateien in `/dist/`.

### 2. Dateien hochladen

Den kompletten Inhalt von `/dist/` per FTP/SFTP auf den Webspace hochladen:

```
dist/
├── index.html
├── admin/index.html
├── flugplatz/index.html
├── gebuehren/index.html
├── verein/index.html
├── galerie/index.html
├── kontakt/index.html
├── impressum/index.html
├── datenschutz/index.html
├── api/save.php         <- PHP-API
├── data/*.json          <- Bearbeitbare Content-Dateien
├── _astro/              <- CSS + JS
└── images/              <- Bilder
```

### 3. Konfiguration auf dem Server

**Schreibrechte setzen:**
```bash
chmod 755 data/
chmod 644 data/*.json
```

**Admin-Passwort aendern:**

1. Neuen SHA-256-Hash erzeugen (z.B. auf https://emn178.github.io/online-tools/sha256.html)
2. Hash in `api/save.php` eintragen (Konstante `PASSWORD_HASH`)
3. Gleichen Hash in `src/pages/admin/index.astro` eintragen (Variable `PASS_HASH`)
4. Neu bauen und hochladen

### 4. Bilder hinzufuegen

Folgende Bilder in `public/images/` ablegen (vor dem Build):

- `hero.jpg` - Luftbild des Flugplatzes (fuer die Startseite)
- `anflugkarte.jpg` - Visual Operation Chart
- `galerie/` - Ordner mit Galeriebildern

## Admin-Panel

Erreichbar unter `/admin` auf der Website.

### Funktionen

- **Gebuehren** - Lande- und Parkgebuehren bearbeiten
- **Vorstand** - Vorstandsmitglieder verwalten
- **Kontakt** - Vereinsdaten, Telefonnummern, E-Mail
- **Flugplatz** - ICAO, Frequenz, Elevation etc.
- **Impressum** - Impressum-Text (HTML) bearbeiten

### So funktioniert es

1. Einloggen mit Passwort unter `/admin`
2. Daten in den Formularen bearbeiten
3. "Speichern" klicken
4. Die PHP-API speichert die JSON-Datei auf dem Server
5. Aenderungen sind sofort sichtbar (kein Rebuild noetig!)

Falls die PHP-API nicht verfuegbar ist, wird die JSON-Datei stattdessen als Download angeboten. Diese kann dann manuell per FTP hochgeladen werden.

## Datenschutz / Legal Cockpit

Die Datenschutzseite ist vorbereitet fuer die Einbindung von Legal Cockpit. In `src/pages/datenschutz.astro` das Script/Widget einbinden:

```html
<script src="https://legal-cockpit.de/embed/IHRE-ID.js"></script>
```

## Farbschema

| Farbe       | Hex       | Verwendung              |
|-------------|-----------|-------------------------|
| Primary     | `#1e3a5f` | Dunkelblau (Hauptfarbe) |
| Accent      | `#d4a843` | Gold/Bernstein (Akzente)|
| Background  | `#f8f9fa` | Hellgrau (Hintergrund)  |
| Text        | `#1a1a2e` | Dunkelgrau (Fliesstext) |
