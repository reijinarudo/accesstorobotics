# Access to Robotics — Finley Robotics Initiative

Static website for the Finley Robotics Initiative at https://accesstorobotics.org/

Plain HTML, CSS, and a small amount of vanilla JavaScript. No build step, no framework, no dependencies. Deploys to GitHub Pages or Netlify as-is.

## File layout

```
accesstorobotics/
├── index.html          Home
├── about.html          Founder bio, founding context
├── mission.html        Mission, theory of change, outcomes
├── scholarship.html    Eligibility, requirements, timeline, apply CTA
├── reachy.html         Reachy Mini details, parent/counselor section
├── showcase.html       Scholar projects (empty-state until Spring 2027)
├── donors.html         Sponsorship tiers, giving methods, transparency
├── contact.html        Contact form (Formspree)
├── privacy.html        Privacy policy
├── terms.html          Terms of use
├── 404.html            Custom not-found page
├── CNAME               Custom domain for GitHub Pages
├── .nojekyll           Tells GH Pages to skip Jekyll processing
├── robots.txt
├── sitemap.xml
└── assets/
    ├── css/style.css   The full design system, one file
    ├── js/main.js      Mobile nav, scroll reveals, current-page highlighting
    └── images/         (place portrait and Reachy Mini photos here)
```

## Before you deploy: three placeholders to replace

These are the items you need to swap before the site is fully functional. Search each file or grep the project root.

### 1. Scholarship Google Form URL
In `scholarship.html`, find:
```html
<a class="btn btn--accent" href="https://forms.gle/REPLACE-WITH-FORM-ID" target="_blank" rel="noopener">
```
Replace `https://forms.gle/REPLACE-WITH-FORM-ID` with your Google Form share URL.

### 2. Contact form endpoint
In `contact.html`, find:
```html
<form class="form" action="https://formspree.io/f/REPLACE-WITH-FORM-ID" method="POST">
```
Replace with your Formspree form endpoint, or follow the alternative Netlify Forms instructions in the commented block above the form tag.

### 3. Images
Two image placeholders use `onerror="this.style.display='none'"` so they fail gracefully if missing:
- `assets/images/reginald-finley.jpg` — portrait, shown on the About page (square or 4:5 portrait orientation works best)
- `assets/images/reachy-mini.jpg` — Reachy Mini photo, shown on the Reachy page

The pages will look fine without the images, but they look better with them.

## Deployment

### GitHub Pages

1. Replace the entire current repo contents with the files in this folder. **Delete `contact.php` and `contactus.php`** since GitHub Pages does not execute PHP.
2. Commit and push to the `main` branch.
3. In repository settings, under "Pages," set Source to "Deploy from a branch" and Branch to `main` / root.
4. The CNAME file points the deployment to `accesstorobotics.org`. Make sure your DNS A and CNAME records are configured for GitHub Pages (Apex `A` records pointing to 185.199.108.153, 185.199.109.153, 185.199.110.153, 185.199.111.153, and a `www` CNAME pointing to your `<username>.github.io`).

### Netlify (alternative)

1. Drag-drop this folder into a new Netlify site, or connect the GitHub repo.
2. No build command needed. Publish directory is the project root.
3. Set the custom domain to `accesstorobotics.org` in site settings.
4. If using Netlify Forms instead of Formspree, follow the commented instructions in `contact.html`.

## Editing content

All copy lives directly in the HTML files. To change a heading or paragraph, open the relevant `.html` file in any text editor and edit between the tags. Keep the surrounding markup intact.

To change global colors or typography, edit the `:root` block at the top of `assets/css/style.css`. The site reads its entire palette from those CSS variables.

## Design notes

- **Typography**: Fraunces (display, variable serif), IBM Plex Sans (body), JetBrains Mono (technical labels). All loaded from Google Fonts.
- **Palette**: Warm off-white paper background, deep ink for text, copper accent. Uses subtle SVG noise overlay for paper-grain texture.
- **Layout**: Editorial / documentary feel. Numbered sections, hairline rules, asymmetric two-column layouts on interior pages.
- **No tracking**: No Google Analytics, no Facebook pixel, no cookies. If you add analytics, update `privacy.html` accordingly.

## Once 501(c)(3) status is granted

Three places need updating:

1. `index.html` — remove or revise the 501(c)(3)-pending mention in the donor invitation section.
2. `donors.html` — the orange-bordered disclosure box at the top, and the second giving-method block about online card giving.
3. `privacy.html` and `terms.html` — language about pending status.

Search for the phrase "501(c)(3)" across the project to find every occurrence.
