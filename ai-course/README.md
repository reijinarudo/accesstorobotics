# AI-Epistemic Resilience — Course Subfolder

A self-contained, static course for the `/ai-course/` subfolder of accesstorobotics.org.
No build step, no dependencies, no platform. Just HTML and one CSS file.

## File layout

```
ai-course/
├── index.html          Course landing page + table of contents
├── module-1.html       COMPLETE — corrected content from prior work
├── module-2.html       Scaffolded — paste your text
├── module-3.html       Scaffolded — paste your text
├── module-4.html       Scaffolded — paste your text
├── module-5.html       Scaffolded — paste your text
├── module-6.html       Scaffolded — paste your text
├── module-7.html       Scaffolded — paste your text
├── module-8.html       Scaffolded — paste your text
└── assets/css/course.css
```

## To deploy

Drop the whole `ai-course/` folder into the root of your site. It will be live at
`accesstorobotics.org/ai-course/`. The CSS is namespaced (`.aier-*`) so it will not
collide with your existing `assets/css/style.css`.

## What is finished vs. what needs you

- **Module 1** is complete with the corrected content (regulatory-elements vocabulary,
  fluency-versus-fidelity language, 2026 book citation only). The only thing missing is
  the Figure 1 image.
- **Modules 2–8** are scaffolded: real objectives, correct navigation, and a flagged spot
  for the lesson prose. Paste your corrected text where each page says so.

## The three things to fill in

1. **Figure 1 diagram.** Save the loop diagram as `assets/img/figure-1.png`, then in
   `module-1.html` replace the placeholder block with the `<img>` tag shown in the amber
   author-note on that page.
2. **Module text (2–8).** Paste corrected prose under the "Lesson content" heading on each
   page, following Module 1's pattern.
3. **Author notes.** Every amber dashed box labeled "AUTHOR NOTE — remove before publishing"
   is a message to you, not the learner. They are hidden when the page is printed, but
   delete them before going live.

## Editable decisions left open

- **Attribution.** The landing page and footers currently credit the course to you
  personally, hosted through Access to Robotics, framed as a separate offering. If you
  decide otherwise with your board advisor, it is a one-line change per page.
- **Assessment + certificate.** Deferred by your choice. Module 8 has a note marking where
  the final assessment will link. When ready, the simplest path is a Google Form (quiz mode,
  auto-graded) for the multiple-choice and true/false questions, reflective items left
  on-page and ungraded, and a single fixed certificate template you fill manually.
