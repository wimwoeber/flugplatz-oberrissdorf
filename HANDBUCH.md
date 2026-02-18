# Bedienungsanleitung – Website Flugplatz Oberrißdorf

## Überblick

Die Website **eduo.westkueste.net** ist die offizielle Präsenz des Flugplatzes Oberrißdorf (EDUO) und des Luftfahrtvereins Mansfelder Land e.V.

### Was ihr selbst ändern könnt

Über den **Admin-Bereich** könnt ihr folgende Inhalte direkt im Browser bearbeiten – ohne Programmierkenntnisse:

| Bereich | Was ihr ändern könnt |
|---------|---------------------|
| **Gebühren** | Landegebühren, Parkgebühren (Preise, Kategorien) |
| **Vorstand** | Namen und Funktionen der Vorstandsmitglieder |
| **Kontakt** | Telefonnummern, E-Mail, Adresse des Vereins |
| **Flugplatz** | ICAO-Daten, Frequenz, Elevation, Betriebszeiten |
| **Impressum** | Den vollständigen Impressums-Text |

### Was ihr NICHT selbst ändern könnt

Folgende Dinge erfordern einen Entwickler (Wim kontaktieren):

- Design und Layout der Seite
- Navigation / Menüpunkte
- Neue Seiten anlegen oder bestehende löschen
- Galerie-Bilder (→ siehe Abschnitt "Galerie")
- Wetter-Widget Konfiguration
- Datenschutzerklärung (wird über Legal Cockpit gesteuert)

---

## Admin-Bereich

### Anmelden

1. Öffne im Browser: **https://eduo.westkueste.net/admin/**
2. Gib das Passwort ein
3. Klicke auf **Anmelden** (oder drücke Enter)

> **Tipp:** Das Passwort wird für die aktuelle Browser-Sitzung gespeichert. Wenn ihr den Browser schließt, müsst ihr euch erneut anmelden.

### Navigation

Oben im Admin-Bereich seht ihr **5 Tabs**:

```
[ Gebühren ] [ Vorstand ] [ Kontakt ] [ Flugplatz ] [ Impressum ]
```

Klickt auf einen Tab, um den entsprechenden Bereich zu bearbeiten.

Rechts oben findet ihr:
- **Zur Website** – öffnet die normale Website
- **Abmelden** – meldet euch ab

---

### Tab: Gebühren

Hier verwaltet ihr die **Landegebühren** und **Parkgebühren**.

**Gebühr ändern:**
1. Ändert den Text (z.B. "UL bis 472,5 kg") oder den Preis im Feld rechts daneben
2. Klickt unten auf **Gebühren speichern**

**Neue Gebühr hinzufügen:**
1. Klickt auf **+ Position** unter der jeweiligen Tabelle
2. Füllt Typ und Preis aus
3. Klickt auf **Gebühren speichern**

**Gebühr löschen:**
1. Klickt auf das rote **✕** neben der Gebühr
2. Klickt auf **Gebühren speichern**

> **Wichtig:** Änderungen werden erst gespeichert, wenn ihr auf den grünen Button **Gebühren speichern** klickt!

---

### Tab: Vorstand

Hier pflegt ihr die **Vorstandsmitglieder** des Vereins.

**Mitglied bearbeiten:**
1. Ändert Name oder Funktion im jeweiligen Feld
2. Klickt auf **Vorstand speichern**

**Neues Mitglied hinzufügen:**
1. Klickt auf **+ Mitglied**
2. Gebt Name und Funktion ein
3. Klickt auf **Vorstand speichern**

**Mitglied entfernen:**
1. Klickt auf das rote **✕** neben dem Mitglied
2. Klickt auf **Vorstand speichern**

---

### Tab: Kontakt

Hier verwaltet ihr die **Kontaktdaten** des Vereins.

**Felder:**
- **Vereinsname** – z.B. "Luftfahrtverein Mansfelder Land e.V."
- **Straße** – Straße und Hausnummer
- **PLZ + Ort** – z.B. "06295 Eisleben OT Oberrißdorf"
- **E-Mail** – die Kontakt-E-Mail-Adresse

**Telefonnummern:**
- Jede Nummer hat ein **Nummernfeld** und ein **Label** (z.B. "Luftaufsicht", "Vorsitzender")
- Mit **+ Nummer** fügt ihr eine neue Telefonnummer hinzu
- Mit dem roten **✕** entfernt ihr eine Nummer

Zum Schluss: **Kontakt speichern** klicken.

---

### Tab: Flugplatz

Hier pflegt ihr die **technischen Flugplatzdaten**.

**Felder:**
- **ICAO-Code** – z.B. "EDUO"
- **Elevation** – z.B. "739 ft / 225 m"
- **Frequenz (MHz)** – z.B. "122.630 MHz"
- **Rufzeichen** – z.B. "Oberrissdorf Radio"
- **FIS** – z.B. "Langen Information 119.825"
- **Betriebszeiten** – z.B. "PPR (Prior Permission Required)"

Zum Schluss: **Flugplatzdaten speichern** klicken.

---

### Tab: Impressum

Hier bearbeitet ihr den **Impressums-Text**.

Das Textfeld akzeptiert **HTML-Formatierung**:
- `<h3>Überschrift</h3>` – für Zwischenüberschriften
- `<p>Text</p>` – für Absätze
- `<br>` – für Zeilenumbrüche
- `<strong>Fett</strong>` – für fetten Text

**Beispiel:**
```html
<h3>Angaben gemäß § 5 TMG</h3>
<p>Luftfahrtverein Mansfelder Land e.V.<br>
Am Flugplatz 1<br>
06295 Eisleben OT Oberrißdorf</p>
```

Zum Schluss: **Impressum speichern** klicken.

---

## Galerie-Bilder verwalten

Die Galeriebilder können aktuell **nicht über den Admin-Bereich** verwaltet werden. Um Bilder hinzuzufügen oder zu entfernen:

### Bilder hinzufügen

1. Loggt euch in **Plesk** ein (https://89.19.205.92.host.secureserver.net)
2. Geht zu **Dateien** (Dateimanager)
3. Navigiert zu: `eduo.westkueste.net/images/galerie/`
4. Ladet das neue Bild hoch
5. **Benennt es fortlaufend:** z.B. `24.jpg`, `25.jpg` usw.
6. Wim muss dann den Code anpassen (die Galerie-Liste im Code aktualisieren)

### Empfehlungen für Bilder
- **Format:** JPEG (.jpg)
- **Größe:** Maximal 100–150 KB pro Bild (für schnelles Laden)
- **Auflösung:** ca. 900–1200 Pixel breite Seite reicht
- **Seitenverhältnis:** 4:3 oder 3:2 (Querformat empfohlen)

> **Hinweis:** Nach dem Hinzufügen neuer Bilder muss der Code in der Datei `galerie.astro` angepasst werden. Kontaktiert dafür Wim.

---

## Speichern und Backup

### Wie das Speichern funktioniert

Wenn ihr im Admin-Bereich auf **Speichern** klickt, passiert Folgendes:

1. Die Daten werden an den Server gesendet
2. Der Server erstellt automatisch ein **Backup** der alten Daten
3. Die neuen Daten werden gespeichert
4. Die Änderungen sind **sofort auf der Website sichtbar**

> Es werden bis zu 10 Backups pro Datei aufbewahrt. Ältere Backups werden automatisch gelöscht.

### Falls das Speichern fehlschlägt

Wenn die Server-Verbindung nicht funktioniert, wird stattdessen eine **JSON-Datei heruntergeladen**. In diesem Fall:

1. Die Datei wird auf eurem Computer gespeichert (z.B. `fees.json`)
2. Loggt euch in Plesk ein
3. Geht zu **Dateien** → `eduo.westkueste.net/data/`
4. Ladet die heruntergeladene Datei dort hoch (die alte überschreiben)

---

## Häufige Fragen

### Die Website ist nicht erreichbar
- Prüft, ob der Server läuft (Plesk erreichbar?)
- Wartet einige Minuten – manchmal gibt es kurze Ausfälle
- Falls das Problem anhält: Kontaktiert Wim

### Meine Änderungen sind nicht sichtbar
- **Browser-Cache leeren:** Drückt `Strg + Shift + R` (Windows) bzw. `Cmd + Shift + R` (Mac)
- Wartet einige Sekunden und ladet die Seite nochmal
- Prüft im Admin-Bereich, ob die Daten tatsächlich gespeichert wurden (grüne Meldung)

### Ich habe aus Versehen etwas gelöscht
- Kontaktiert Wim – über das Backup-System können wir die Daten wiederherstellen
- Backups liegen unter `eduo.westkueste.net/data/backups/` auf dem Server

### Admin-Login funktioniert nicht
- Prüft, ob ihr das richtige Passwort verwendet
- Versucht, den Browser-Cache zu leeren oder einen anderen Browser
- Falls das Passwort vergessen wurde: Kontaktiert Wim

### Wie ändere ich das Admin-Passwort?
- Das Passwort wird im Code gespeichert und muss von Wim geändert werden

---

## Technische Details (für Wim)

### Architektur
- **Framework:** Astro (Static Site Generator)
- **Styling:** Tailwind CSS v4
- **CMS:** Clientseitiges Admin-Panel + PHP-API (`/api/save.php`)
- **Daten:** JSON-Dateien in `/public/data/` (Runtime) und `/src/content/` (Build-Zeit)

### Deployment
- **Hosting:** Plesk auf westkueste.net
- **Domain:** eduo.westkueste.net
- **Git:** Automatisches Deployment via Plesk Git-Integration
- **Repo:** https://github.com/wimwoeber/flugplatz-oberrissdorf (public)
- **Branch:** main
- **Deploy-Befehl:** `export PATH=/opt/plesk/node/25/bin:$PATH && npm install --production=false && npm run build && cp -r dist/* .`

### Dateien bearbeiten
Die JSON-Content-Dateien existieren an zwei Orten:
1. **`/src/content/*.json`** – wird beim Build von Astro eingelesen (statisch)
2. **`/public/data/*.json`** – wird zur Laufzeit vom Client geladen (dynamisch)

Wenn über den Admin Daten geändert werden, aktualisiert das die Dateien in `/data/` auf dem Server. Die statischen Build-Daten werden erst beim nächsten Deploy aktualisiert.

### Node.js auf dem Server
- Node v25.6.1: `/opt/plesk/node/25/bin/node`
- Node v24.13.1: `/opt/plesk/node/24/bin/node`
- Node.js wird nur für den Build-Schritt benötigt, nicht als Laufzeit

### Passwort ändern
Der SHA-256 Hash des Admin-Passworts muss an zwei Stellen geändert werden:
1. `src/pages/admin/index.astro` – Zeile mit `PASS_HASH`
2. `public/api/save.php` – `$PASSWORD_HASH` Variable

Hash generieren: `echo -n "NeuesPasswort" | sha256sum`

> **Achtung:** Die aktuelle Login-Funktion akzeptiert jedes nicht-leere Passwort (Demo-Modus). Für Produktivbetrieb muss die Hash-Prüfung in der `login()` Funktion aktiviert werden.
