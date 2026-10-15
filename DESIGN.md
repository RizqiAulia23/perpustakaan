# Design System: RuangBaca Library Management System
**Project ID:** 12296500520255927811

## 1. Visual Theme & Atmosphere

RuangBaca embodies a **professional yet approachable library management aesthetic** that balances institutional precision with modern digital warmth. The interface feels **spacious and organized**, designed for sustained data-heavy workflows while maintaining visual breathing room. The design philosophy is **information-first without sterility**, allowing dense tables, metrics, and controls to coexist with generous whitespace and gentle color accents.

The overall mood is **purposeful and trustworthy**, creating a utilitarian environment that library staff can rely on for daily circulation tasks without visual fatigue. The atmosphere evokes a **well-maintained institutional system** that respects both data integrity and user comfort through consistent patterns and predictable interactions.

**Key Characteristics:**
- Clean Material Design 3 foundation with semantic color roles
- Generous whitespace between functional sections
- Data-dense tables and metric cards with clear hierarchy
- Soft teal-green accent creating calm focus points without distraction
- Professional sidebar navigation with persistent context
- Dual-mode support: pristine light and sophisticated dark themes
- Icon-rich interface using Material Symbols for instant recognition

## 2. Color Palette & Roles

### Light Mode Foundation
- **Serene Mint Background** (#E7FEFC) – Primary canvas color. An almost imperceptible teal-tinted white creating a calm, fresh atmosphere that reduces eye strain during extended data entry sessions.
- **Pure White Surface** (#FFFFFF) – Cards and elevated containers (surface-container-lowest). Provides crisp separation against the mint background.
- **Whisper-Soft Gray** (#F6FAF6 / #F0F5F1) – Secondary surface levels (surface-container-low). Subtle layering for nested content areas.

### Primary Action & Emphasis (Light Mode)
- **Deep Institutional Teal** (#006C50 / #00694E / #005E58) – Primary brand color. Used for call-to-action buttons, active navigation states, primary icons, and system emphasis. This sophisticated teal conveys trust and professionalism without corporate coldness.
- **Vibrant Emerald Accent** (#128463 / #10B981) – Primary container and selected states. A brighter teal for hover effects and active sidebar items, creating clear interactive feedback.

### Typography & Content Hierarchy (Light Mode)
- **Deep Charcoal** (#181D1B / #0A1F1E) – Primary text (on-surface). Strong readable contrast for headlines, body text, and data labels.
- **Soft Slate Gray** (#3E4943 / #3F4947) – Secondary text (on-surface-variant). Metadata, supporting text, and table headers maintain hierarchy without harshness.
- **Muted Blue-Gray** (#596763 / #53615D) – Tertiary text (secondary). Subtle information like timestamps and supplementary data.

### Dark Mode Foundation
- **Midnight Navy** (#0B1326 / #060E20) – Primary dark background. A deep blue-black that feels modern and reduces eye strain in low-light environments.
- **Elevated Charcoal** (#131B2E / #171F33) – Dark surface containers. Provides depth and layering against the navy base.
- **Soft Blue-Tinted Surface** (#222A3D / #2D3449) – High-level container surfaces. Creates clear visual hierarchy in dark mode.

### Primary Action & Emphasis (Dark Mode)
- **Luminous Mint Green** (#4EDEA3 / #10B981) – Primary color in dark mode. A vibrant, accessible teal-green that maintains brand identity while providing excellent contrast against dark backgrounds.
- **Bright Seafoam** (#77D9B3 / #93F6CE) – Primary fixed and accent states. Lighter mint tones for hover and selected elements.
- **Vivid Secondary Green** (#45DFA4 / #76D9B2) – Secondary and tertiary accents. Complementary green tones for badges and supporting highlights.

### Typography & Content (Dark Mode)
- **Soft Periwinkle White** (#DAE2FD) – Primary dark mode text (on-surface). Gentle blue-tinted white reduces stark contrast while maintaining readability.
- **Cool Mid-Gray** (#BBCABF / #86948A) – Secondary dark text (on-surface-variant). Maintains hierarchy in low-light conditions.

### System Feedback States (Both Modes)
- **Alert Red** (#BA1A1A light, #FFB4AB dark) – Error states, overdue warnings, critical alerts. Light mode uses deeper red, dark mode uses softer salmon for accessibility.
- **Error Container Pink** (#FFDAD6) – Error backgrounds and warning highlights. Gentle enough for extended exposure.
- **Success indicators** – Handled through primary/secondary green tones depending on context.

## 3. Typography Rules

**Primary Font Family:** Plus Jakarta Sans  
**Character:** Modern geometric sans-serif with slightly rounded terminals. Professional yet friendly, optimized for data-heavy interfaces and extended reading.

### Hierarchy & Weights
- **Display Large (H1):** Bold weight (700), 2.25rem (36px) size, tight tracking (-0.025em). Used sparingly for major page titles and dashboard headlines. Mobile: 1.75rem (28px).
- **Headline Large (H2):** Semi-bold weight (600), 1.75rem (28px), tight tracking (-0.02em). Section headers and major feature titles.
- **Headline Medium (H3):** Semi-bold weight (600), 1.375rem (22px), tracking -0.015em. Subsection headers, card titles.
- **Title Medium (H4):** Semi-bold weight (600), 1rem (16px), minimal tracking (-0.005em). Table headers, sidebar brand, metric labels.
- **Body Large:** Regular weight (400), 1rem (16px), relaxed line-height (1.625). Main content in settings and form descriptions.
- **Body Medium:** Regular weight (400), 0.875rem (14px), standard line-height (1.375). Primary UI text, table cells, card content.
- **Body Small:** Regular weight (400), 0.8125rem (13px), line-height 1.25. Compact information, metadata, secondary details.
- **Label Medium:** Semi-bold weight (600), 0.875rem (14px), tracking 0.01em. Button text, active navigation, form labels.
- **Label Small:** Semi-bold weight (600), 0.75rem (12px), tracking 0.02em, often uppercase. Badges, status tags, metric headers.
- **Data Mono:** Medium weight (500), 0.8125rem (13px), tracking 0.025em. Transaction IDs, codes, technical identifiers maintaining Plus Jakarta Sans for consistency.

### Spacing Principles
- Generous line-height for body text ensures comfortable reading in tables and lists
- Negative letter-spacing on large headlines creates modern tightness
- Positive tracking on labels and small caps improves legibility at small sizes
- Consistent 1.5rem to 2rem vertical rhythm between sections

## 4. Component Stylings

### Buttons
- **Primary CTA:** Deep Institutional Teal (#006C50) background, white text, semi-bold Label Medium (600), comfortable padding (0.625-0.75rem vertical, 1-1.5rem horizontal). Border radius: 0.75rem (xl) creating soft, modern corners.
- **Hover State:** Darkens to primary-container or shows subtle shadow elevation. Smooth 200-300ms transition.
- **Icon Integration:** Material Symbols Outlined icons at 18-20px, positioned left of label with 0.5rem gap.
- **Active State:** Slight scale reduction (0.95) on press for tactile feedback.
- **Secondary/Ghost Buttons:** Transparent background with surface-container-high fill on hover, maintaining primary text color.

### Cards & Metric Containers
- **Corner Style:** Generously rounded (0.75rem / xl radius) creating approachable, modern edges without playfulness.
- **Background:** Alternates between surface-container-lowest (white/elevated charcoal) and surface-container-low based on layering needs.
- **Shadow Strategy:** Soft by default (shadow-sm: 0 1px 8px rgba(0,0,0,0.04)). On hover, elevates slightly with shadow-md for interactive cards.
- **Border:** No visible borders by default—relies on subtle shadow and background contrast for definition.
- **Internal Padding:** Generous space-lg (1.5rem) creating comfortable breathing room for metrics and content.
- **Metric Card Pattern:** Icon badge in top-right corner (36px circle with bg-surface-container-high), large display number (display-lg), supporting metadata below, optional footer section with negative margin extending to card edges.

### Navigation Sidebar
- **Width:** Fixed 260px, full-height, surface-container-lowest background with subtle shadow.
- **Brand Section:** 64px height header with logo and institution name (title-md in primary color).
- **Nav Items:** Flexible items with Material icon (20px), label (body-md), optional badge (label-sm). Padding: space-sm (0.5rem) with space-md horizontal.
- **Active State:** Primary-container background (#128463 light, elevated in dark), on-primary-container text, font-semibold, rounded-lg shape, subtle shadow-sm.
- **Hover State:** Surface-container-high background, smooth 200ms transition, text shifts to on-surface.
- **Footer Widget:** Emerald info card (custom #128463 bg) with nested sections, borders in darker teal (#0D6E52), white text hierarchy.

### Tables & Data Display
- **Structure:** Full-width with alternating row backgrounds (transparent and surface-container-low on hover).
- **Headers:** Surface-container-low background, uppercase label-sm text in secondary color, medium padding (space-sm vertical, space-md horizontal).
- **Cells:** Body-sm to body-md text, comfortable padding (space-md), on-surface primary content with secondary metadata below in smaller text/lighter color.
- **Status Badges:** Inline rounded-md pills (px-space-xs py-1) with semantic container backgrounds (secondary-fixed, error-container, surface-container-high) and contrasting text.
- **Action Buttons:** Small ghost buttons (px-space-sm py-1, rounded-lg, surface-container-high bg on hover).

### Form Inputs & Controls
- **Border:** 1px solid outline-variant color, transitions to primary on focus.
- **Background:** Surface-container-lowest, subtle shift to surface-container-low on focus.
- **Corner Style:** Rounded-lg (0.5rem) matching button radius for visual consistency.
- **Padding:** Comfortable space-sm to space-md (0.5-1rem) for touch-friendly targets.
- **Focus State:** Border color shifts to primary with subtle outer glow (ring-2 ring-primary/20).
- **Label Typography:** Label-sm or label-md, semi-bold, on-surface-variant color.

### Top Header Bar
- **Height:** 64px fixed
- **Background:** surface-container-lowest with 90% opacity and backdrop-blur-md for modern glassmorphism effect.
- **Shadow:** Subtle 0 1px 8px rgba(0,0,0,0.04) separating from content.
- **Content:** Breadcrumb navigation (left), search bar (center-left), date/notifications/profile (right).
- **Profile Section:** 32px avatar with online indicator dot (primary color), name and role stacked (label-md semi-bold / label-sm secondary).

## 5. Layout Principles

### Grid & Structure
- **Content Max Width:** No strict max-width, relies on dashboard padding (space-xl / 2rem desktop, space-lg mobile).
- **Sidebar Layout:** Fixed 260px left sidebar, main content area with left-padding (pl-[260px]) to avoid overlap.
- **Grid System:** Responsive CSS Grid for metric cards and data sections:
  - Mobile: 1 column
  - Tablet: 2 columns (sm:grid-cols-2)
  - Desktop: 4 columns for metrics (xl:grid-cols-4), asymmetric splits for content (lg:grid-cols-12 with 7/5 or 8/4 span patterns)
- **Gap Spacing:** Consistent space-md (1rem) between grid items, space-lg (1.5rem) between major sections.

### Whitespace Strategy
- **Section Margins:** Large vertical gaps (space-xl / 2rem) between dashboard sections maintain visual separation.
- **Card Internal Padding:** Generous space-lg (1.5rem) prevents cramped feeling in data-heavy cards.
- **Table Breathing Room:** Moderate cell padding (space-md / 1rem horizontal, space-sm vertical) balances density with readability.
- **Page Padding:** Desktop uses space-xl (2rem), mobile reduces to space-lg (1.5rem) maintaining comfortable margins on all viewports.

### Responsive Behavior
- **Sidebar:** Fixed on desktop (260px), converts to off-canvas drawer or collapsible on tablet/mobile.
- **Metric Cards:** Stack vertically on mobile (1 column), 2-up on tablet, 4-up on large desktops.
- **Tables:** Horizontal scroll on mobile with sticky first column for transaction IDs, full display on desktop.
- **Header:** Simplifies on mobile—hides breadcrumb detail, condenses profile section, maintains notification and avatar.
- **Typography Scale:** Display and headline sizes reduce 20-30% on mobile (display-lg-mobile variant at 1.75rem vs 2.25rem).

### Z-Index Layering
- Sidebar: z-50 (highest persistent UI)
- Top header: z-40 (below sidebar for mobile overlay scenarios)
- Dropdown menus & modals: z-50+ as needed
- Toast notifications: z-50 (bottom-right fixed position)

### Iconography Integration
- **Material Symbols Outlined** throughout at consistent sizes:
  - Navigation: 20px
  - Buttons: 18px
  - Headers: 22px
  - Inline metadata: 14-16px
- Icons always paired with descriptive labels except in compact badge scenarios
- Color inherits from parent text color, often tinted toward primary for emphasis

## Consistency & Patterns

### Interaction Patterns
- **Hover feedback:** 200-300ms transitions on background and text color
- **Active states:** Subtle scale transforms (0.95) on buttons for tactile response
- **Loading states:** Primary-colored animated pulse dots or skeleton loaders
- **Toasts:** Bottom-right fixed position, inverse-surface background, auto-dismiss after 3-4 seconds

### Accessibility Considerations
- Strong color contrast ratios maintained in both light and dark modes
- All interactive elements meet 44x44px minimum touch target
- Focus indicators present on all keyboard-navigable components
- Icon-only buttons rare, always accompanied by tooltips or labels
- Semantic HTML structure with proper heading hierarchy

### Material Design 3 Adherence
RuangBaca follows Material Design 3's semantic color system precisely:
- `surface-*` hierarchy for elevation and layering
- `on-*` prefix for text colors ensuring proper contrast
- `*-container` variants for backgrounds of emphasized elements
- `*-fixed` and `*-fixed-dim` for badges and accent UI
- `primary`, `secondary`, `tertiary`, `error` roles with full token coverage
- Light and dark mode parity through comprehensive token mapping
