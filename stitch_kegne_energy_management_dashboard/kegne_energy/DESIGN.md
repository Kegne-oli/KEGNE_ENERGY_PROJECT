---
name: KEGNE ENERGY
colors:
  surface: '#f8f9ff'
  surface-dim: '#d0dbed'
  surface-bright: '#f8f9ff'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#eff4ff'
  surface-container: '#e6eeff'
  surface-container-high: '#dee9fc'
  surface-container-highest: '#d9e3f6'
  on-surface: '#121c2a'
  on-surface-variant: '#43474f'
  inverse-surface: '#27313f'
  inverse-on-surface: '#eaf1ff'
  outline: '#737780'
  outline-variant: '#c3c6d1'
  surface-tint: '#3a5f94'
  primary: '#00254d'
  on-primary: '#ffffff'
  primary-container: '#0d3b6e'
  on-primary-container: '#82a6e0'
  inverse-primary: '#a7c8ff'
  secondary: '#006497'
  on-secondary: '#ffffff'
  secondary-container: '#58b8ff'
  on-secondary-container: '#00476e'
  tertiary: '#362000'
  on-tertiary: '#ffffff'
  tertiary-container: '#533400'
  on-tertiary-container: '#e09508'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#d5e3ff'
  primary-fixed-dim: '#a7c8ff'
  on-primary-fixed: '#001b3b'
  on-primary-fixed-variant: '#1f477b'
  secondary-fixed: '#cce5ff'
  secondary-fixed-dim: '#92ccff'
  on-secondary-fixed: '#001d31'
  on-secondary-fixed-variant: '#004b73'
  tertiary-fixed: '#ffddb4'
  tertiary-fixed-dim: '#ffb955'
  on-tertiary-fixed: '#291800'
  on-tertiary-fixed-variant: '#633f00'
  background: '#f8f9ff'
  on-background: '#121c2a'
  surface-variant: '#d9e3f6'
typography:
  h1:
    fontFamily: Manrope
    fontSize: 48px
    fontWeight: '800'
    lineHeight: '1.2'
    letterSpacing: -0.02em
  h2:
    fontFamily: Manrope
    fontSize: 32px
    fontWeight: '700'
    lineHeight: '1.3'
    letterSpacing: -0.01em
  h3:
    fontFamily: Manrope
    fontSize: 24px
    fontWeight: '600'
    lineHeight: '1.4'
    letterSpacing: '0'
  body-lg:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
  body-md:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.5'
  label-sm:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '500'
    lineHeight: '1.2'
    letterSpacing: 0.01em
  label-xs:
    fontFamily: Inter
    fontSize: 12px
    fontWeight: '600'
    lineHeight: '1.1'
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  base: 4px
  xs: 0.25rem
  sm: 0.5rem
  md: 1rem
  lg: 1.5rem
  xl: 2rem
  xxl: 4rem
  container-margin: 2rem
  gutter: 1.5rem
---

## Brand & Style
This design system embodies a **Modern Corporate** aesthetic tailored for the high-stakes sector of renewable energy management. Inspired by the precision of Tesla and the clarity of Stripe, the visual direction focuses on industrial reliability fused with digital-first agility. 

The brand personality is authoritative yet optimistic, utilizing a "Solar Amber" highlight to represent clean energy production against a "Deep Navy" structural foundation. The style emphasizes **Minimalism** and **Functionalism**, prioritizing data density without sacrificing breathable whitespace. The emotional response is one of control, transparency, and technological sophistication.

## Colors
The palette is engineered for high legibility in complex dashboard environments. **Deep Navy** serves as the structural anchor, applied to persistent navigation elements and sidebars to provide a "frame" for the data. **Electric Blue** is the primary action color, reserved for interactive elements like buttons and active states.

**Solar Amber** is used sparingly as a high-intent highlight color for critical energy metrics (e.g., current output, battery levels) to draw the eye to the core product value. Neutral tones follow a strict scale to maintain hierarchical clarity between background and surface layers.

## Typography
The system employs a dual-font strategy to balance character with utility. **Manrope** is used for headlines to provide a modern, technical, and slightly wide-tracking "Tesla-inspired" feel that signals premium quality. **Inter** is used for all UI components, body text, and data tables due to its exceptional legibility and neutral, systematic tone.

Bold weights are prioritized for headlines and primary metrics to ensure information architecture is clear at a glance. Small labels use a medium weight and slight tracking to remain legible even on complex monitoring charts.

## Layout & Spacing
This design system utilizes a **12-column fluid grid** for the main content area, allowing the dashboard to scale from tablet to ultra-wide displays seamlessly. A 4px baseline grid ensures consistent vertical rhythm.

Layouts should favor a "Sidebar-Heavy" structure, where the Deep Navy navigation remains fixed, and the content surface scrolls independently. Margins and gutters are generous (24px to 32px) to prevent data-heavy tables and charts from feeling cluttered.

## Elevation & Depth
Depth is conveyed through **Tonal Layers** and **Soft Shadows**. The background layer (#F8FAFC) sits at the lowest elevation. Surfaces (#FFFFFF) sit atop this background, utilizing 12px border radii and subtle, highly diffused shadows to create separation.

Shadows should be "Natural" (0px 4px 20px rgba(13, 59, 110, 0.08)), using a hint of the Deep Navy primary color in the shadow's tint to ensure a cohesive color profile. Active interactive elements or hovered cards should elevate further with a slightly more pronounced shadow and a 1px border stroke using the Action color.

## Shapes
The shape language is defined by a consistent **12px (0.75rem)** radius for cards, buttons, and input fields. This moderate roundedness softens the industrial nature of the data, making the system feel modern and approachable rather than purely utilitarian.

Smaller components like checkboxes or tags should use a 4px or 6px radius to maintain visual harmony with their larger parent containers. Icons should follow a "linear" style with 2px strokes and slightly rounded terminals to match the typography.

## Components

### Buttons
Primary buttons utilize the **Electric Blue** fill or the **Deep Navy to Blue Gradient** for high-priority calls to action. They feature white text and the standard 12px radius. Secondary buttons use a ghost style with a subtle #E5E7EB border that shifts to Electric Blue on hover.

### Cards
Cards are the primary container for data. They must feature the 12px radius, a white surface, and a 1px border (#E5E7EB). Headers within cards should use a 16px bottom padding and a thin separator line.

### Inputs & Selects
Input fields should have a height of 44px for a comfortable touch and click target. The border should be #E5E7EB, darkening to Electric Blue on focus. Labels sit outside the input field in **Inter SemiBold**.

### Energy Metrics (Custom Component)
Use the **Solar Amber** for "live" data points. These should be paired with a "pulse" animation or a high-contrast background within a small pill-shaped chip to indicate real-time activity.

### Status Indicators
Status chips (Success, Warning, Danger) should use a "Soft" style: a 10% opacity background of the status color with a 100% opacity text color. This ensures the dashboard remains colorful but not overwhelming.