
---

## 🎨 Design Language

- **Base Theme:** BizCore360 / Metronic-inspired
- **Fonts:** `'Poppins', 'Inter', sans-serif`
- **Font Size:** `14px` (slightly smaller for cleaner layout)
- **Weight:** `400–500`
- **Border Radius:** `12px`
- **Shadow:** `0 1px 4px rgba(0, 0, 0, 0.08)`
- **Primary Color:** `#28a745` (Loan Central green)
- **Accent Color:** `#218838` (hover/active)
- **Neutral Border:** `#e9ecef`
- **Tables/Cards:** Rounded corners, light shadow, no bold text on Appraisal/CD fields
- **Responsive:** Fully mobile-adaptive with stacked grid layout

---

## 🧭 Navigation System

**Top Bar:**
- Hamburger icon (reserved for sidebar)
- App Title: **Loan Central**

**Bottom Navigation:**
- Home  
- Prospects  
- Escrow  
- Funded  
- Admin  

**Behavior:**
- Each bottom menu item filters customers by file status.
- Filter state is reflected in the table.

---

## 🏠 Main Dashboard (`index.html`)

**Purpose:**  
Serves as the central hub displaying all active, pending, or closed loan files.

**Core Features:**
- **Customer List Tables:** Filtered dynamically by loan status.  
- **Star Icon:** Marks a file as “Favorite.”  
- **Default Status:** Pending.  
- **Columns:** Uniform across all sections.  
- **Edit Column:** Removed.  
- **Responsive:** Cards and tables auto-resize.  

**Visual Layout:**
- Rounded table edges (`12px` radius)
- Unified shadow and border style  
- Clean small-font typography  

---

## 👤 Customer File v8 (`customer.html`)

**Purpose:**  
Displays detailed information and workflow for an individual loan file.

**Sections:**
1. **Header Bar**
   - Borrower name (`Customer Name`)  
   - “Exit” button (saves & returns to dashboard)  
   - AIUS icon (toggles assistant panel)
2. **Subnav Tabs**
   - Summary  
   - Conditions  
   - Tasks  
   - Financials  
   - Notes
3. **Tab Content Layouts**
   - `Summary:` Milestones + key metrics (4-column grid)
   - `Conditions:` Dynamic filterable checklist + edit modal
   - `Tasks:` Assigned actions (checkbox list)
   - `Financials:` Editable grid with auto-format for currency/percent/integer fields
   - `Notes:` Add/view notes with autosave in localStorage

**Panels & Overlays:**
- **Condition Edit Panel:** Slide-in sidebar with fields for description, section, owner, status, due date, toggles (Priority, Coordinating)
- **AIUS Assistant Panel:** Chat overlay with simulated responses and message history (local)
- **Responsive:** Collapses grids to 1 column on mobile; full-width side panels.

**Local Data Persistence:**
- Uses `localStorage` per customer for:
  - Tasks  
  - Conditions  
  - Financials  
  - Notes  
- All data auto-saves when editing or exiting.

**Code Structure:**
- Inline `<style>` and `<script>` blocks for standalone testing.
- Will later migrate to:
  - `/assets/css/customer.css`
  - `/assets/js/customer.js`

**Version Tag:**  
`Loan Central - Customer File v8`

---

## 🧩 Core Features Summary

| Feature | Description |
|----------|-------------|
| **LocalStorage Sync** | Saves and restores customer data locally (offline compatible). |
| **Dynamic Tabs** | Instantly switches sections without reloading. |
| **AIUS Panel** | Slide-in chat panel for AI assistant interactions. |
| **Condition Editing** | Editable conditions with side panel form. |
| **Financials Section** | Auto-formats inputs as currency, percent, or integer. |
| **Notes Module** | Add, edit, and auto-save notes per customer. |
| **Responsive Grid System** | Auto-adjusts to mobile layouts. |
| **Tooltips** | Bootstrap tooltips enabled throughout. |

---

## 🧠 Data Model (LocalStorage Keys)

Each customer’s data is stored using this naming convention:

| Data Type | Key Example |
|------------|-------------|
| Tasks | `loanCentral_JohnDoe_tasks` |
| Conditions | `loanCentral_JohnDoe_conditions` |
| Financials | `loanCentral_JohnDoe_financials` |
| Notes | `loanCentral_JohnDoe_notes` |

---

## 🪞 Future Expansion

**Next Planned Features:**
1. Add **Search & Filter** above customer tables.  
2. Add **Add New Loan** modal form.  
3. Create **User Login** (Phase 2).  
4. Integrate AIUS backend logic (API-ready structure exists).  
5. Build **Realtor Central** (clone) version with adapted workflows and UI terms.  
6. Move inline CSS/JS to separate files for scalability.  

---

## 🧬 Future Clone: *Realtor Central*

**Purpose:**  
Repurpose this Loan Central core structure for real estate agents.

**Expected Adjustments:**
- Menu titles → *Listings, Offers, Closed Sales, Clients*  
- Condition/Task logic adapted to transactions instead of loans.  
- Keep same rounded layout and table structure.  

---

### 📌 Notes

- `index.html` serves as the master dashboard.  
- `customer.html` (v8) is now the official detailed loan file template.  
- This document tracks all major UI/UX and data structure updates.  

---

**End of Document**
