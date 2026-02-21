# EDUQUEST — Academic Exam Generator & Question Bank Platform
EduQuest is a web-based platform designed to help lecturers and academic institutions (especially in **STEM / engineering physics**) **store**, **manage**, and **generate** exam sheets from a structured question bank. It solves a common pain point in STEM assessment: writing **mathematical symbols, calculus, and physics equations** cleanly in digital forms—by integrating **LaTeX + MathJax** for real-time rendering.
## 1) Background & Project Goals
Creating STEM exam questions digitally is often slowed down by:- Difficulty typing and formatting equations (integrals, limits, matrices, etc.).- Copy–paste workflows from Word that are time-consuming and error-prone.- Lack of a centralized, structured repository for large volumes of questions.
EduQuest addresses this by acting as:- A **digital vault (bank soal)** to store and categorize thousands of questions.- A **smart exam generator** that can assemble a print-ready exam sheet in seconds using filters (**course + difficulty**).
## 2) System Architecture & Technology Stack
EduQuest follows a modern **Model–View–Controller (MVC)** architecture.
**Backend**- PHP **Laravel** (routing, scalable codebase structure, server-side validation).
**Database**- **MySQL** with Laravel **Eloquent ORM** for efficient relational data handling.
**Frontend**- **HTML5**, **CSS3**, and **Bootstrap 5** for a clean, responsive UI.
**Math Rendering**- **MathJax** to render LaTeX syntax into publication-grade equations in real time.
## 3) Relational Database Design
The system centers on two core entities with a **one-to-many** relationship:
### A. `courses` (Master Data: Mata Kuliah)
Stores curriculum-level information:- `course_code` (unique)- `course_name`- `credits` (SKS)
### B. `questions` (Transactional Data: Bank Soal)
Central question repository:- `course_id` (foreign key → `courses`)- `topic` / `chapter`- `question_text`- `option_a`, `option_b`, `option_c`, `option_d`- `correct_answer` (A/B/C/D)- `difficulty` (Easy / Medium / Hard)
> Notes: this schema is intentionally minimal and scalable—ready for extension (tags, images, explanations, randomization, etc.).
## 4) Core Modules & Features
### A. Course Management (CRUD)- Create, read, update, delete course data.- Server-side validation ensures **no duplicate course codes**, maintaining clean academic records.
### B. LaTeX-Integrated Question Bank
This is the core differentiator.- Lecturers can input questions and multiple-choice options using LaTeX syntax.- MathJax renders LaTeX **instantly** for preview.
**Example LaTeX input**- Integral: `\( \int_0^\infty e^{-x}\,dx \)`- Matrix: `\( \begin{bmatrix} a & b \\ c & d \end{bmatrix} \)`
### C. Dynamic Exam Generator (Smart Filter)
Replaces manual copy–paste workflows.- Filter by:
  - **Course**
  - **Difficulty level**- Laravel Eloquent queries fetch matching items instantly for preview.
### D. Print-to-PDF Exam Sheet- Generates a print-friendly exam page (no navigation UI).- Includes:
  - Institutional header (kop surat)
  - Student identity fields (Name & Student ID / NIM)
  - Cleanly formatted question list with rendered formulas- A small automation script can trigger the browser’s print dialog after MathJax finishes rendering.
## 5) User Workflow
1. Lecturer creates / registers a **Course**.
2. Lecturer gradually adds questions to the **Question Bank** throughout the semester:
   - Sets topic/chapter and difficulty
   - Writes equations in LaTeX
3. Before **Midterm (UTS)** or **Final (UAS)**, lecturer opens **Exam Generator**.
4. Lecturer selects:
   - Course
   - Target difficulty level
5. System shows a preview of selected questions.
6. Lecturer clicks **Print**, and the exam sheet is ready to export as **PDF** and distribute.--
## Project Scope (Summary)- Focus: structured STEM question bank + fast exam generation + LaTeX rendering- Target users: lecturers / instructors / academic staff- Output: print-ready exam sheet via browser print-to-PDF workf