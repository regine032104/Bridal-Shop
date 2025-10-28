<?php
/**
 * Embedded copy of output.css to allow removing the .css file from disk
 * while preserving identical UI/UX by inlining styles at runtime.
 */
if (!function_exists('getEmbeddedOutputCss')) {
  function getEmbeddedOutputCss(): string
  {
    return <<<'CSS'
/*! tailwindcss v4.1.14 | MIT License | https://tailwindcss.com */
@import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&family=Unna:ital,wght@0,400;0,700;1,400;1,700&display=swap');
@layer properties;
@layer theme, base, components, utilities;
@layer theme {
  :root, :host {
    --font-sans: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji",
      "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    --font-mono: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono",
      "Courier New", monospace;
    --color-red-50: oklch(97.1% 0.013 17.38);
    --color-red-100: oklch(93.6% 0.032 17.717);
    --color-red-200: oklch(88.5% 0.062 18.334);
    --color-red-500: oklch(63.7% 0.237 25.331);
    --color-red-600: oklch(57.7% 0.245 27.325);
    --color-red-700: oklch(50.5% 0.213 27.518);
    --color-red-800: oklch(44.4% 0.177 26.899);
    --color-amber-700: oklch(55.5% 0.163 48.998);
    --color-amber-900: oklch(41.4% 0.112 45.904);
    --color-yellow-50: oklch(98.7% 0.026 102.212);
    --color-yellow-100: oklch(97.3% 0.071 103.193);
    --color-yellow-200: oklch(94.5% 0.129 101.54);
    --color-yellow-500: oklch(79.5% 0.184 86.047);
    --color-yellow-800: oklch(47.6% 0.114 61.907);
    --color-green-100: oklch(96.2% 0.044 156.743);
    --color-green-600: oklch(62.7% 0.194 149.214);
    --color-green-700: oklch(52.7% 0.154 150.069);
    --color-green-800: oklch(44.8% 0.119 151.328);
    --color-blue-100: oklch(93.2% 0.032 255.585);
    --color-blue-800: oklch(42.4% 0.199 265.638);
    --color-purple-100: oklch(94.6% 0.033 307.174);
    --color-purple-800: oklch(43.8% 0.218 303.724);
    --color-pink-50: oklch(97.1% 0.014 343.198);
    --color-pink-100: oklch(94.8% 0.028 342.258);
    --color-pink-200: oklch(89.9% 0.061 343.231);
    --color-pink-300: oklch(82.3% 0.12 346.018);
    --color-pink-400: oklch(71.8% 0.202 349.761);
    --color-pink-500: oklch(65.6% 0.241 354.308);
    --color-pink-600: oklch(59.2% 0.249 0.584);
    --color-pink-700: oklch(52.5% 0.223 3.958);
    --color-pink-800: oklch(45.9% 0.187 3.815);
    --color-pink-900: oklch(40.8% 0.153 2.432);
    --color-pink-950: oklch(28.4% 0.109 3.907);
    --color-rose-50: oklch(96.9% 0.015 12.422);
    --color-rose-400: oklch(71.2% 0.194 13.428);
    --color-rose-500: oklch(64.5% 0.246 16.439);
    --color-slate-200: oklch(92.9% 0.013 255.508);
    --color-slate-300: oklch(86.9% 0.022 252.894);
    --color-slate-400: oklch(70.4% 0.04 256.788);
    --color-slate-500: oklch(55.4% 0.046 257.417);
    --color-slate-700: oklch(37.2% 0.044 257.287);
    --color-slate-800: oklch(27.9% 0.041 260.031);
    --color-slate-900: oklch(20.8% 0.042 265.755);
    --color-gray-50: oklch(98.5% 0.002 247.839);
    --color-gray-100: oklch(96.7% 0.003 264.542);
    --color-gray-300: oklch(87.2% 0.01 258.338);
    --color-gray-400: oklch(70.7% 0.022 261.325);
    --color-gray-600: oklch(44.6% 0.03 256.802);
    --color-gray-700: oklch(37.3% 0.034 259.733);
    --color-gray-800: oklch(27.8% 0.033 256.848);
    --color-gray-900: oklch(21% 0.034 264.665);
    --color-neutral-50: oklch(98.5% 0 0);
    --color-neutral-100: oklch(97% 0 0);
    --color-neutral-200: oklch(92.2% 0 0);
    --color-neutral-300: oklch(87% 0 0);
    --color-black: #000;
    --color-white: #fff;
    --spacing: 0.25rem;
    --breakpoint-xl: 80rem;
    --container-md: 28rem;
    --container-lg: 32rem;
    --container-xl: 36rem;
    --container-2xl: 42rem;
    --container-3xl: 48rem;
    --container-4xl: 56rem;
    --container-5xl: 64rem;
    --container-6xl: 72rem;
    --text-xs: 0.75rem;
    --text-xs--line-height: calc(1 / 0.75);
    --text-sm: 0.875rem;
    --text-sm--line-height: calc(1.25 / 0.875);
    --text-base: 1rem;
    --text-base--line-height: calc(1.5 / 1);
    --text-lg: 1.125rem;
    --text-lg--line-height: calc(1.75 / 1.125);
    --text-xl: 1.25rem;
    --text-xl--line-height: calc(1.75 / 1.25);
    --text-2xl: 1.5rem;
    --text-2xl--line-height: calc(2 / 1.5);
    --text-3xl: 1.875rem;
    --text-3xl--line-height: calc(2.25 / 1.875);
    --text-4xl: 2.25rem;
    --text-4xl--line-height: calc(2.5 / 2.25);
    --text-5xl: 3rem;
    --text-5xl--line-height: 1;
    --text-7xl: 4.5rem;
    --text-7xl--line-height: 1;
    --font-weight-medium: 500;
    --font-weight-semibold: 600;
    --font-weight-bold: 700;
    --tracking-wide: 0.025em;
    --tracking-widest: 0.1em;
    --leading-relaxed: 1.625;
    --radius-md: 0.375rem;
    --radius-lg: 0.5rem;
    --radius-xl: 0.75rem;
    --radius-2xl: 1rem;
    --radius-3xl: 1.5rem;
    --ease-in-out: cubic-bezier(0.4, 0, 0.2, 1);
    --default-transition-duration: 150ms;
    --default-transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    --default-font-family: var(--font-sans);
    --default-mono-font-family: var(--font-mono);
    --font-GreatVibes: "Great Vibes", sans-serif;
    --font-Tinos: "Tinos", sans-serif;
    --font-Unna: "Unna", sans-serif;
  }
}
@layer base {
  *, ::after, ::before, ::backdrop, ::file-selector-button {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    border: 0 solid;
  }
  html, :host {
    line-height: 1.5;
    -webkit-text-size-adjust: 100%;
    tab-size: 4;
    font-family: var(--default-font-family, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji");
    font-feature-settings: var(--default-font-feature-settings, normal);
    font-variation-settings: var(--default-font-variation-settings, normal);
    -webkit-tap-highlight-color: transparent;
  }
  hr {
    height: 0;
    color: inherit;
    border-top-width: 1px;
  }
  abbr:where([title]) {
    -webkit-text-decoration: underline dotted;
    text-decoration: underline dotted;
  }
  h1, h2, h3, h4, h5, h6 {
    font-size: inherit;
    font-weight: inherit;
  }
  a {
    color: inherit;
    -webkit-text-decoration: inherit;
    text-decoration: inherit;
  }
  b, strong {
    font-weight: bolder;
  }
  code, kbd, samp, pre {
    font-family: var(--default-mono-font-family, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace);
    font-feature-settings: var(--default-mono-font-feature-settings, normal);
    font-variation-settings: var(--default-mono-font-variation-settings, normal);
    font-size: 1em;
  }
  small {
    font-size: 80%;
  }
  sub, sup {
    font-size: 75%;
    line-height: 0;
    position: relative;
    vertical-align: baseline;
  }
  sub {
    bottom: -0.25em;
  }
  sup {
    top: -0.5em;
  }
  table {
    text-indent: 0;
    border-color: inherit;
    border-collapse: collapse;
  }
  :-moz-focusring {
    outline: auto;
  }
  progress {
    vertical-align: baseline;
  }
  summary {
    display: list-item;
  }
  ol, ul, menu {
    list-style: none;
  }
  img, svg, video, canvas, audio, iframe, embed, object {
    display: block;
    vertical-align: middle;
  }
  img, video {
    max-width: 100%;
    height: auto;
  }
  button, input, select, optgroup, textarea, ::file-selector-button {
    font: inherit;
    font-feature-settings: inherit;
    font-variation-settings: inherit;
    letter-spacing: inherit;
    color: inherit;
    border-radius: 0;
    background-color: transparent;
    opacity: 1;
  }
  :where(select:is([multiple], [size])) optgroup {
    font-weight: bolder;
  }
  :where(select:is([multiple], [size])) optgroup option {
    padding-inline-start: 20px;
  }
  ::file-selector-button {
    margin-inline-end: 4px;
  }
  ::placeholder {
    opacity: 1;
  }
  @supports (not (-webkit-appearance: -apple-pay-button))  or (contain-intrinsic-size: 1px) {
    ::placeholder {
      color: currentcolor;
      @supports (color: color-mix(in lab, red, red)) {
        color: color-mix(in oklab, currentcolor 50%, transparent);
      }
    }
  }
  textarea {
    resize: vertical;
  }
  ::-webkit-search-decoration {
    -webkit-appearance: none;
  }
  ::-webkit-date-and-time-value {
    min-height: 1lh;
    text-align: inherit;
  }
  ::-webkit-datetime-edit {
    display: inline-flex;
  }
  ::-webkit-datetime-edit-fields-wrapper {
    padding: 0;
  }
  ::-webkit-datetime-edit, ::-webkit-datetime-edit-year-field, ::-webkit-datetime-edit-month-field, ::-webkit-datetime-edit-day-field, ::-webkit-datetime-edit-hour-field, ::-webkit-datetime-edit-minute-field, ::-webkit-datetime-edit-second-field, ::-webkit-datetime-edit-millisecond-field, ::-webkit-datetime-edit-meridiem-field {
    padding-block: 0;
  }
  ::-webkit-calendar-picker-indicator {
    line-height: 1;
  }
  :-moz-ui-invalid {
    box-shadow: none;
  }
  button, input:where([type="button"], [type="reset"], [type="submit"]), ::file-selector-button {
    appearance: button;
  }
  ::-webkit-inner-spin-button, ::-webkit-outer-spin-button {
    height: auto;
  }
  [hidden]:where(:not([hidden="until-found"])) {
    display: none !important;
  }
}
@layer utilities {
  .pointer-events-none {
    pointer-events: none;
  }
  .invisible {
    visibility: hidden;
  }
  .visible {
    visibility: visible;
  }
  .sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip-path: inset(50%);
    white-space: nowrap;
    border-width: 0;
  }
  .absolute {
    position: absolute;
  }
  .fixed {
    position: fixed;
  }
  .relative {
    position: relative;
  }
  .sticky {
    position: sticky;
  }
  .inset-0 {
    inset: calc(var(--spacing) * 0);
  }
  .inset-x-0 {
    inset-inline: calc(var(--spacing) * 0);
  }
  .top-0 {
    top: calc(var(--spacing) * 0);
  }
  .top-1\/2 {
    top: calc(1/2 * 100%);
  }
  .top-3 {
    top: calc(var(--spacing) * 3);
  }
  .top-full {
    top: 100%;
  }
  .right-0 {
    right: calc(var(--spacing) * 0);
  }
  .right-3 {
    right: calc(var(--spacing) * 3);
  }
  .bottom-0 {
    bottom: calc(var(--spacing) * 0);
  }
  .bottom-3 {
    bottom: calc(var(--spacing) * 3);
  }
  .left-0 {
    left: calc(var(--spacing) * 0);
  }
  .left-1\/2 {
    left: calc(1/2 * 100%);
  }
  .-z-10 {
    z-index: calc(10 * -1);
  }
  .z-10 {
    z-index: 10;
  }
  .z-50 {
    z-index: 50;
  }
  .col-span-full {
    grid-column: 1 / -1;
  }
  .container {
    width: 100%;
    @media (width >= 40rem) {
      max-width: 40rem;
    }
    @media (width >= 48rem) {
      max-width: 48rem;
    }
    @media (width >= 64rem) {
      max-width: 64rem;
    }
    @media (width >= 80rem) {
      max-width: 80rem;
    }
    @media (width >= 96rem) {
      max-width: 96rem;
    }
  }
  .m-6 {
    margin: calc(var(--spacing) * 6);
  }
  .m-auto {
    margin: auto;
  }
  .mx-4 {
    margin-inline: calc(var(--spacing) * 4);
  }
  .mx-auto {
    margin-inline: auto;
  }
  .my-2 {
    margin-block: calc(var(--spacing) * 2);
  }
  .my-4 {
    margin-block: calc(var(--spacing) * 4);
  }
  .mt-1 {
    margin-top: calc(var(--spacing) * 1);
  }
  .mt-2 {
    margin-top: calc(var(--spacing) * 2);
  }
  .mt-3 {
    margin-top: calc(var(--spacing) * 3);
  }
  .mt-4 {
    margin-top: calc(var(--spacing) * 4);
  }
  .mt-6 {
    margin-top: calc(var(--spacing) * 6);
  }
  .mt-8 {
    margin-top: calc(var(--spacing) * 8);
  }
  .mt-10 {
    margin-top: calc(var(--spacing) * 10);
  }
  .mt-12 {
    margin-top: calc(var(--spacing) * 12);
  }
  .mr-1 {
    margin-right: calc(var(--spacing) * 1);
  }
  .mr-2 {
    margin-right: calc(var(--spacing) * 2);
  }
  .mb-1 {
    margin-bottom: calc(var(--spacing) * 1);
  }
  .mb-2 {
    margin-bottom: calc(var(--spacing) * 2);
  }
  .mb-3 {
    margin-bottom: calc(var(--spacing) * 3);
  }
  .mb-4 {
    margin-bottom: calc(var(--spacing) * 4);
  }
  .mb-6 {
    margin-bottom: calc(var(--spacing) * 6);
  }
  .mb-8 {
    margin-bottom: calc(var(--spacing) * 8);
  }
  .mb-12 {
    margin-bottom: calc(var(--spacing) * 12);
  }
  .mb-16 {
    margin-bottom: calc(var(--spacing) * 16);
  }
  .mb-24 {
    margin-bottom: calc(var(--spacing) * 24);
  }
  .ml-1 {
    margin-left: calc(var(--spacing) * 1);
  }
  .ml-2 {
    margin-left: calc(var(--spacing) * 2);
  }
  .ml-4 {
    margin-left: calc(var(--spacing) * 4);
  }
  .block {
    display: block;
  }
  .contents {
    display: contents;
  }
  .flex {
    display: flex;
  }
  .grid {
    display: grid;
  }
  .hidden {
    display: none;
  }
  .inline {
    display: inline;
  }
  .inline-block {
    display: inline-block;
  }
  .inline-flex {
    display: inline-flex;
  }
  .table {
    display: table;
  }
  .aspect-\[3\/4\] {
    aspect-ratio: 3/4;
  }
  .aspect-\[10\/10\] {
    aspect-ratio: 10/10;
  }
  .aspect-square {
    aspect-ratio: 1 / 1;
  }
  .h-2 {
    height: calc(var(--spacing) * 2);
  }
  .h-4 {
    height: calc(var(--spacing) * 4);
  }
  .h-5 {
    height: calc(var(--spacing) * 5);
  }
  .h-6 {
    height: calc(var(--spacing) * 6);
  }
  .h-8 {
    height: calc(var(--spacing) * 8);
  }
  .h-10 {
    height: calc(var(--spacing) * 10);
  }
  .h-12 {
    height: calc(var(--spacing) * 12);
  }
  .h-14 {
    height: calc(var(--spacing) * 14);
  }
  .h-16 {
    height: calc(var(--spacing) * 16);
  }
  .h-20 {
    height: calc(var(--spacing) * 20);
  }
  .h-32 {
    height: calc(var(--spacing) * 32);
  }
  .h-40 {
    height: calc(var(--spacing) * 40);
  }
  .h-48 {
    height: calc(var(--spacing) * 48);
  }
  .h-56 {
    height: calc(var(--spacing) * 56);
  }
  .h-80 {
    height: calc(var(--spacing) * 80);
  }
  .h-auto {
    height: auto;
  }
  .h-full {
    height: 100%;
  }
  .h-px {
    height: 1px;
  }
  .max-h-\[65vh\] {
    max-height: 65vh;
  }
  .max-h-\[calc\(100svh-2rem\)\] {
    max-height: calc(100svh - 2rem);
  }
  .min-h-\[3\.5rem\] {
    min-height: 3.5rem;
  }
  .min-h-\[180px\] {
    min-height: 180px;
  }
  .min-h-\[200px\] {
    min-height: 200px;
  }
  .min-h-\[320px\] {
    min-height: 320px;
  }
  .min-h-\[360px\] {
    min-height: 360px;
  }
  .min-h-screen {
    min-height: 100vh;
  }
  .w-1\/4 {
    width: calc(1/4 * 100%);
  }
  .w-2 {
    width: calc(var(--spacing) * 2);
  }
  .w-4 {
    width: calc(var(--spacing) * 4);
  }
  .w-5 {
    width: calc(var(--spacing) * 5);
  }
  .w-6 {
    width: calc(var(--spacing) * 6);
  }
  .w-8 {
    width: calc(var(--spacing) * 8);
  }
  .w-10 {
    width: calc(var(--spacing) * 10);
  }
  .w-12 {
    width: calc(var(--spacing) * 12);
  }
  .w-14 {
    width: calc(var(--spacing) * 14);
  }
  .w-16 {
    width: calc(var(--spacing) * 16);
  }
  .w-20 {
    width: calc(var(--spacing) * 20);
  }
  .w-32 {
    width: calc(var(--spacing) * 32);
  }
  .w-full {
    width: 100%;
  }
  .max-w-2xl {
    max-width: var(--container-2xl);
  }
  .max-w-3xl {
    max-width: var(--container-3xl);
  }
  .max-w-4xl {
    max-width: var(--container-4xl);
  }
  .max-w-5xl {
    max-width: var(--container-5xl);
  }
  .max-w-6xl {
    max-width: var(--container-6xl);
  }
  .max-w-lg {
    max-width: var(--container-lg);
  }
  .max-w-md {
    max-width: var(--container-md);
  }
  .max-w-none {
    max-width: none;
  }
  .max-w-screen-xl {
    max-width: var(--breakpoint-xl);
  }
  .max-w-xl {
    max-width: var(--container-xl);
  }
  .min-w-\[22px\] {
    min-width: 22px;
  }
  .min-w-\[220px\] {
    min-width: 220px;
  }
  .flex-1 {
    flex: 1;
  }
  .flex-shrink-0 {
    flex-shrink: 0;
  }
  .flex-grow {
    flex-grow: 1;
  }
  .border-collapse {
    border-collapse: collapse;
  }
  .-translate-x-1\/2 {
    --tw-translate-x: calc(calc(1/2 * 100%) * -1);
    translate: var(--tw-translate-x) var(--tw-translate-y);
  }
  .translate-y-0 {
    --tw-translate-y: calc(var(--spacing) * 0);
    translate: var(--tw-translate-x) var(--tw-translate-y);
  }
  .translate-y-10 {
    --tw-translate-y: calc(var(--spacing) * 10);
    translate: var(--tw-translate-x) var(--tw-translate-y);
  }
  .scale-95 {
    --tw-scale-x: 95%;
    --tw-scale-y: 95%;
    --tw-scale-z: 95%;
    scale: var(--tw-scale-x) var(--tw-scale-y);
  }
  .scale-100 {
    --tw-scale-x: 100%;
    --tw-scale-y: 100%;
    --tw-scale-z: 100%;
    scale: var(--tw-scale-x) var(--tw-scale-y);
  }
  .scale-105 {
    --tw-scale-x: 105%;
    --tw-scale-y: 105%;
    --tw-scale-z: 105%;
    scale: var(--tw-scale-x) var(--tw-scale-y);
  }
  .transform {
    transform: var(--tw-rotate-x,) var(--tw-rotate-y,) var(--tw-rotate-z,) var(--tw-skew-x,) var(--tw-skew-y,);
  }
  .cursor-grabbing {
    cursor: grabbing;
  }
  .cursor-not-allowed {
    cursor: not-allowed;
  }
  .cursor-pointer {
    cursor: pointer;
  }
  .resize {
    resize: both;
  }
  .resize-none {
    resize: none;
  }
  .snap-x {
    scroll-snap-type: x var(--tw-scroll-snap-strictness);
  }
  .snap-mandatory {
    --tw-scroll-snap-strictness: mandatory;
  }
  .snap-center {
    scroll-snap-align: center;
  }
  .grid-cols-1 {
    grid-template-columns: repeat(1, minmax(0, 1fr));
  }
  .flex-col {
    flex-direction: column;
  }
  .flex-col-reverse {
    flex-direction: column-reverse;
  }
  .items-baseline {
    align-items: baseline;
  }
  .items-center {
    align-items: center;
  }
  .items-start {
    align-items: flex-start;
  }
  .justify-between {
    justify-content: space-between;
  }
  .justify-center {
    justify-content: center;
  }
  .gap-2 {
    gap: calc(var(--spacing) * 2);
  }
  .gap-3 {
    gap: calc(var(--spacing) * 3);
  }
  .gap-4 {
    gap: calc(var(--spacing) * 4);
  }
  .gap-6 {
    gap: calc(var(--spacing) * 6);
  }
  .gap-8 {
    gap: calc(var(--spacing) * 8);
  }
  .gap-12 {
    gap: calc(var(--spacing) * 12);
  }
  .space-y-1 {
    :where(& > :not(:last-child)) {
      --tw-space-y-reverse: 0;
      margin-block-start: calc(calc(var(--spacing) * 1) * var(--tw-space-y-reverse));
      margin-block-end: calc(calc(var(--spacing) * 1) * calc(1 - var(--tw-space-y-reverse)));
    }
  }
  .space-y-2 {
    :where(& > :not(:last-child)) {
      --tw-space-y-reverse: 0;
      margin-block-start: calc(calc(var(--spacing) * 2) * var(--tw-space-y-reverse));
      margin-block-end: calc(calc(var(--spacing) * 2) * calc(1 - var(--tw-space-y-reverse)));
    }
  }
  .space-y-3 {
    :where(& > :not(:last-child)) {
      --tw-space-y-reverse: 0;
      margin-block-start: calc(calc(var(--spacing) * 3) * var(--tw-space-y-reverse));
      margin-block-end: calc(calc(var(--spacing) * 3) * calc(1 - var(--tw-space-y-reverse)));
    }
  }
  .space-y-4 {
    :where(& > :not(:last-child)) {
      --tw-space-y-reverse: 0;
      margin-block-start: calc(calc(var(--spacing) * 4) * var(--tw-space-y-reverse));
      margin-block-end: calc(calc(var(--spacing) * 4) * calc(1 - var(--tw-space-y-reverse)));
    }
  }
  .space-y-6 {
    :where(& > :not(:last-child)) {
      --tw-space-y-reverse: 0;
      margin-block-start: calc(calc(var(--spacing) * 6) * var(--tw-space-y-reverse));
      margin-block-end: calc(calc(var(--spacing) * 6) * calc(1 - var(--tw-space-y-reverse)));
    }
  }
  .space-y-8 {
    :where(& > :not(:last-child)) {
      --tw-space-y-reverse: 0;
      margin-block-start: calc(calc(var(--spacing) * 8) * var(--tw-space-y-reverse));
      margin-block-end: calc(calc(var(--spacing) * 8) * calc(1 - var(--tw-space-y-reverse)));
    }
  }
  .space-x-2 {
    :where(& > :not(:last-child)) {
      --tw-space-x-reverse: 0;
      margin-inline-start: calc(calc(var(--spacing) * 2) * var(--tw-space-x-reverse));
      margin-inline-end: calc(calc(var(--spacing) * 2) * calc(1 - var(--tw-space-x-reverse)));
    }
  }
  .space-x-4 {
    :where(& > :not(:last-child)) {
      --tw-space-x-reverse: 0;
      margin-inline-start: calc(calc(var(--spacing) * 4) * var(--tw-space-x-reverse));
      margin-inline-end: calc(calc(var(--spacing) * 4) * calc(1 - var(--tw-space-x-reverse)));
    }
  }
  .self-start {
    align-self: flex-start;
  }
  .overflow-hidden {
    overflow: hidden;
  }
  .overflow-x-auto {
    overflow-x: auto;
  }
  .overflow-y-auto {
    overflow-y: auto;
  }
  .scroll-smooth {
    scroll-behavior: smooth;
  }
  .rounded {
    border-radius: 0.25rem;
  }
  .rounded-2xl {
    border-radius: var(--radius-2xl);
  }
  .rounded-3xl {
    border-radius: var(--radius-3xl);
  }
  .rounded-full {
    border-radius: calc(infinity * 1px);
  }
  .rounded-lg {
    border-radius: var(--radius-lg);
  }
  .rounded-md {
    border-radius: var(--radius-md);
  }
  .rounded-xl {
    border-radius: var(--radius-xl);
  }
  .border {
    border-style: var(--tw-border-style);
    border-width: 1px;
  }
  .border-2 {
    border-style: var(--tw-border-style);
    border-width: 2px;
  }
  .border-3 {
    border-style: var(--tw-border-style);
    border-width: 3px;
  }
  .border-t {
    border-top-style: var(--tw-border-style);
    border-top-width: 1px;
  }
  .border-b {
    border-bottom-style: var(--tw-border-style);
    border-bottom-width: 1px;
  }
  .border-b-2 {
    border-bottom-style: var(--tw-border-style);
    border-bottom-width: 2px;
  }
  .border-l-4 {
    border-left-style: var(--tw-border-style);
    border-left-width: 4px;
  }
  .border-gray-300 {
    border-color: var(--color-gray-300);
  }
  .border-neutral-200 {
    border-color: var(--color-neutral-200);
  }
  .border-neutral-300 {
    border-color: var(--color-neutral-300);
  }
  .border-pink-100 {
    border-color: var(--color-pink-100);
  }
  .border-pink-100\/40 {
    border-color: color-mix(in srgb, oklch(94.8% 0.028 342.258) 40%, transparent);
    @supports (color: color-mix(in lab, red, red)) {
      border-color: color-mix(in oklab, var(--color-pink-100) 40%, transparent);
    }
  }
  .border-pink-200 {
    border-color: var(--color-pink-200);
  }
  .border-pink-300 {
    border-color: var(--color-pink-300);
  }
  .border-pink-500 {
    border-color: var(--color-pink-500);
  }
  .border-red-200 {
    border-color: var(--color-red-200);
  }
  .border-slate-300 {
    border-color: var(--color-slate-300);
  }
  .border-slate-700 {
    border-color: var(--color-slate-700);
  }
  .border-slate-900 {
    border-color: var(--color-slate-900);
  }
  .border-transparent {
    border-color: transparent;
  }
  .border-white\/60 {
    border-color: color-mix(in srgb, #fff 60%, transparent);
    @supports (color: color-mix(in lab, red, red)) {
      border-color: color-mix(in oklab, var(--color-white) 60%, transparent);
    }
  }
  .border-yellow-200 {
    border-color: var(--color-yellow-200);
  }
  .bg-black\/50 {
    background-color: color-mix(in srgb, #000 50%, transparent);
    @supports (color: color-mix(in lab, red, red)) {
      background-color: color-mix(in oklab, var(--color-black) 50%, transparent);
    }
  }
  .bg-blue-100 {
    background-color: var(--color-blue-100);
  }
  .bg-gray-50 {
    background-color: var(--color-gray-50);
  }
  .bg-gray-100 {
    background-color: var(--color-gray-100);
  }
  .bg-green-100 {
    background-color: var(--color-green-100);
  }
  .bg-neutral-50 {
    background-color: var(--color-neutral-50);
  }
  .bg-neutral-100 {
    background-color: var(--color-neutral-100);
  }
  .bg-neutral-200 {
    background-color: var(--color-neutral-200);
  }
  .bg-pink-50 {
    background-color: var(--color-pink-50);
  }
  .bg-pink-100 {
    background-color: var(--color-pink-100);
  }
  .bg-pink-200 {
    background-color: var(--color-pink-200);
  }
  .bg-pink-300 {
    background-color: var(--color-pink-300);
  }
  .bg-pink-500 {
    background-color: var(--color-pink-500);
  }
  .bg-pink-700 {
    background-color: var(--color-pink-700);
  }
  .bg-purple-100 {
    background-color: var(--color-purple-100);
  }
  .bg-red-50 {
    background-color: var(--color-red-50);
  }
  .bg-red-100 {
    background-color: var(--color-red-100);
  }
  .bg-transparent {
    background-color: transparent;
  }
  .bg-white {
    background-color: var(--color-white);
  }
  .bg-white\/50 {
    background-color: color-mix(in srgb, #fff 50%, transparent);
    @supports (color: color-mix(in lab, red, red)) {
      background-color: color-mix(in oklab, var(--color-white) 50%, transparent);
    }
  }
  .bg-white\/80 {
    background-color: color-mix(in srgb, #fff 80%, transparent);
    @supports (color: color-mix(in lab, red, red)) {
      background-color: color-mix(in oklab, var(--color-white) 80%, transparent);
    }
  }
  .bg-white\/90 {
    background-color: color-mix(in srgb, #fff 90%, transparent);
    @supports (color: color-mix(in lab, red, red)) {
      background-color: color-mix(in oklab, var(--color-white) 90%, transparent);
    }
  }
  .bg-yellow-50 {
    background-color: var(--color-yellow-50);
  }
  .bg-yellow-100 {
    background-color: var(--color-yellow-100);
  }
  .bg-yellow-500 {
    background-color: var(--color-yellow-500);
  }
  .bg-gradient-to-b {
    --tw-gradient-position: to bottom in oklab;
    background-image: linear-gradient(var(--tw-gradient-stops));
  }
  .bg-gradient-to-br {
    --tw-gradient-position: to bottom right in oklab;
    background-image: linear-gradient(var(--tw-gradient-stops));
  }
  .bg-gradient-to-r {
    --tw-gradient-position: to right in oklab;
    background-image: linear-gradient(var(--tw-gradient-stops));
  }
  .bg-gradient-to-t {
    --tw-gradient-position: to top in oklab;
    background-image: linear-gradient(var(--tw-gradient-stops));
  }
  .from-amber-900 {
    --tw-gradient-from: var(--color-amber-900);
    --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position));
  }
  .from-gray-900 {
    --tw-gradient-from: var(--color-gray-900);
    --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position));
  }
  .from-pink-50 {
    --tw-gradient-from: var(--color-pink-50);
    --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position));
  }
  .from-pink-200 {
    --tw-gradient-from: var(--color-pink-200);
    --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position));
  }
  .from-pink-500 {
    --tw-gradient-from: var(--color-pink-500);
    --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position));
  }
  .from-transparent {
    --tw-gradient-from: transparent;
    --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position));
  }
  .from-white\/90 {
    --tw-gradient-from: color-mix(in srgb, #fff 90%, transparent);
    @supports (color: color-mix(in lab, red, red)) {
      --tw-gradient-from: color-mix(in oklab, var(--color-white) 90%, transparent);
    }
    --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position));
  }
  .via-\[var\(--color-neutral-light\)\] {
    --tw-gradient-via: var(--color-neutral-light);
    --tw-gradient-via-stops: var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-via) var(--tw-gradient-via-position), var(--tw-gradient-to) var(--tw-gradient-to-position);
    --tw-gradient-stops: var(--tw-gradient-via-stops);
  }
  .to-amber-700 {
    --tw-gradient-to: var(--color-amber-700);
    --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position));
  }
  .to-gray-700 {
    --tw-gradient-to: var(--color-gray-700);
    --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position));
  }
  .to-rose-50 {
    --tw-gradient-to: var(--color-rose-50);
    --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position));
  }
  .to-rose-400 {
    --tw-gradient-to: var(--color-rose-400);
    --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position));
  }
  .to-rose-500 {
    --tw-gradient-to: var(--color-rose-500);
    --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position));
  }
  .to-transparent {
    --tw-gradient-to: transparent;
    --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position));
  }
  .object-contain {
    object-fit: contain;
  }
  .object-cover {
    object-fit: cover;
  }
  .object-center {
    object-position: center;
  }
  .p-0 {
    padding: calc(var(--spacing) * 0);
  }
  .p-1 {
    padding: calc(var(--spacing) * 1);
  }
  .p-2 {
    padding: calc(var(--spacing) * 2);
  }
  .p-3 {
    padding: calc(var(--spacing) * 3);
  }
  .p-4 {
    padding: calc(var(--spacing) * 4);
  }
  .p-5 {
    padding: calc(var(--spacing) * 5);
  }
  .p-6 {
    padding: calc(var(--spacing) * 6);
  }
  .p-8 {
    padding: calc(var(--spacing) * 8);
  }
  .p-10 {
    padding: calc(var(--spacing) * 10);
  }
  .px-2 {
    padding-inline: calc(var(--spacing) * 2);
  }
  .px-3 {
    padding-inline: calc(var(--spacing) * 3);
  }
  .px-4 {
    padding-inline: calc(var(--spacing) * 4);
  }
  .px-5 {
    padding-inline: calc(var(--spacing) * 5);
  }
  .px-6 {
    padding-inline: calc(var(--spacing) * 6);
  }
  .px-8 {
    padding-inline: calc(var(--spacing) * 8);
  }
  .py-1 {
    padding-block: calc(var(--spacing) * 1);
  }
  .py-2 {
    padding-block: calc(var(--spacing) * 2);
  }
  .py-3 {
    padding-block: calc(var(--spacing) * 3);
  }
  .py-4 {
    padding-block: calc(var(--spacing) * 4);
  }
  .py-5 {
    padding-block: calc(var(--spacing) * 5);
  }
  .py-6 {
    padding-block: calc(var(--spacing) * 6);
  }
  .py-8 {
    padding-block: calc(var(--spacing) * 8);
  }
  .py-10 {
    padding-block: calc(var(--spacing) * 10);
  }
  .py-12 {
    padding-block: calc(var(--spacing) * 12);
  }
  .py-16 {
    padding-block: calc(var(--spacing) * 16);
  }
  .py-20 {
    padding-block: calc(var(--spacing) * 20);
  }
  .py-32 {
    padding-block: calc(var(--spacing) * 32);
  }
  .pt-2 {
    padding-top: calc(var(--spacing) * 2);
  }
  .pt-4 {
    padding-top: calc(var(--spacing) * 4);
  }
  .pt-6 {
    padding-top: calc(var(--spacing) * 6);
  }
  .pb-1 {
    padding-bottom: calc(var(--spacing) * 1);
  }
  .pb-4 {
    padding-bottom: calc(var(--spacing) * 4);
  }
  .pb-6 {
    padding-bottom: calc(var(--spacing) * 6);
  }
  .pl-4 {
    padding-left: calc(var(--spacing) * 4);
  }
  .text-center {
    text-align: center;
  }
  .text-left {
    text-align: left;
  }
  .text-right {
    text-align: right;
  }
  .align-middle {
    vertical-align: middle;
  }
  .font-GreatVibes {
    font-family: var(--font-GreatVibes);
  }
  .font-Tinos {
    font-family: var(--font-Tinos);
  }
  .font-Unna {
    font-family: var(--font-Unna);
  }
  .text-2xl {
    font-size: var(--text-2xl);
    line-height: var(--tw-leading, var(--text-2xl--line-height));
  }
  .text-3xl {
    font-size: var(--text-3xl);
    line-height: var(--tw-leading, var(--text-3xl--line-height));
  }
  .text-4xl {
    font-size: var(--text-4xl);
    line-height: var(--tw-leading, var(--text-4xl--line-height));
  }
  .text-base {
    font-size: var(--text-base);
    line-height: var(--tw-leading, var(--text-base--line-height));
  }
  .text-lg {
    font-size: var(--text-lg);
    line-height: var(--tw-leading, var(--text-lg--line-height));
  }
  .text-sm {
    font-size: var(--text-sm);
    line-height: var(--tw-leading, var(--text-sm--line-height));
  }
  .text-xl {
    font-size: var(--text-xl);
    line-height: var(--tw-leading, var(--text-xl--line-height));
  }
  .text-xs {
    font-size: var(--text-xs);
    line-height: var(--tw-leading, var(--text-xs--line-height));
  }
  .leading-7 {
    --tw-leading: calc(var(--spacing) * 7);
    line-height: calc(var(--spacing) * 7);
  }
  .leading-none {
    --tw-leading: 1;
    line-height: 1;
  }
  .leading-relaxed {
    --tw-leading: var(--leading-relaxed);
    line-height: var(--leading-relaxed);
  }
  .font-bold {
    --tw-font-weight: var(--font-weight-bold);
    font-weight: var(--font-weight-bold);
  }
  .font-medium {
    --tw-font-weight: var(--font-weight-medium);
    font-weight: var(--font-weight-medium);
  }
  .font-semibold {
    --tw-font-weight: var(--font-weight-semibold);
    font-weight: var(--font-weight-semibold);
  }
  .tracking-wide {
    --tw-tracking: var(--tracking-wide);
    letter-spacing: var(--tracking-wide);
  }
  .tracking-widest {
    --tw-tracking: var(--tracking-widest);
    letter-spacing: var(--tracking-widest);
  }
  .text-blue-800 {
    color: var(--color-blue-800);
  }
  .text-gray-400 {
    color: var(--color-gray-400);
  }
  .text-gray-600 {
    color: var(--color-gray-600);
  }
  .text-gray-700 {
    color: var(--color-gray-700);
  }
  .text-gray-800 {
    color: var(--color-gray-800);
  }
  .text-gray-900 {
    color: var(--color-gray-900);
  }
  .text-green-600 {
    color: var(--color-green-600);
  }
  .text-green-700 {
    color: var(--color-green-700);
  }
  .text-green-800 {
    color: var(--color-green-800);
  }
  .text-pink-100 {
    color: var(--color-pink-100);
  }
  .text-pink-500 {
    color: var(--color-pink-500);
  }
  .text-pink-600 {
    color: var(--color-pink-600);
  }
  .text-pink-600\/80 {
    color: color-mix(in srgb, oklch(59.2% 0.249 0.584) 80%, transparent);
    @supports (color: color-mix(in lab, red, red)) {
      color: color-mix(in oklab, var(--color-pink-600) 80%, transparent);
    }
  }
  .text-pink-700 {
    color: var(--color-pink-700);
  }
  .text-pink-800 {
    color: var(--color-pink-800);
  }
  .text-pink-800\/90 {
    color: color-mix(in srgb, oklch(45.9% 0.187 3.815) 90%, transparent);
    @supports (color: color-mix(in lab, red, red)) {
      color: color-mix(in oklab, var(--color-pink-800) 90%, transparent);
    }
  }
  .text-pink-900 {
    color: var(--color-pink-900);
  }
  .text-pink-950 {
    color: var(--color-pink-950);
  }
  .text-purple-800 {
    color: var(--color-purple-800);
  }
  .text-red-500 {
    color: var(--color-red-500);
  }
  .text-red-600 {
    color: var(--color-red-600);
  }
  .text-red-700 {
    color: var(--color-red-700);
  }
  .text-red-800 {
    color: var(--color-red-800);
  }
  .text-slate-400 {
    color: var(--color-slate-400);
  }
  .text-slate-500 {
    color: var(--color-slate-500);
  }
  .text-slate-700 {
    color: var(--color-slate-700);
  }
  .text-slate-800 {
    color: var(--color-slate-800);
  }
  .text-slate-900 {
    color: var(--color-slate-900);
  }
  .text-white {
    color: var(--color-white);
  }
  .text-white\/80 {
    color: color-mix(in srgb, #fff 80%, transparent);
    @supports (color: color-mix(in lab, red, red)) {
      color: color-mix(in oklab, var(--color-white) 80%, transparent);
    }
  }
  .text-yellow-800 {
    color: var(--color-yellow-800);
  }
  .lowercase {
    text-transform: lowercase;
  }
  .uppercase {
    text-transform: uppercase;
  }
  .underline {
    text-decoration-line: underline;
  }
  .opacity-0 {
    opacity: 0%;
  }
  .opacity-90 {
    opacity: 90%;
  }
  .opacity-100 {
    opacity: 100%;
  }
  .shadow {
    --tw-shadow: 0 1px 3px 0 var(--tw-shadow-color, rgb(0 0 0 / 0.1)), 0 1px 2px -1px var(--tw-shadow-color, rgb(0 0 0 / 0.1));
    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
  }
  .shadow-\[0_8px_30px_rgba\(210\,199\,229\,0\.12\)\] {
    --tw-shadow: 0 8px 30px var(--tw-shadow-color, rgba(210,199,229,0.12));
    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
  }
  .shadow-\[0_8px_30px_rgba\(236\,72\,153\,0\.08\)\] {
    --tw-shadow: 0 8px 30px var(--tw-shadow-color, rgba(236,72,153,0.08));
    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
  }
  .shadow-\[0_10px_30px_rgba\(2\,6\,23\,0\.15\)\] {
    --tw-shadow: 0 10px 30px var(--tw-shadow-color, rgba(2,6,23,0.15));
    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
  }
  .shadow-\[0_10px_30px_rgba\(236\,72\,153\,0\.06\)\] {
    --tw-shadow: 0 10px 30px var(--tw-shadow-color, rgba(236,72,153,0.06));
    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
  }
  .shadow-\[0_10px_30px_rgba\(236\,72\,153\,0\.08\)\] {
    --tw-shadow: 0 10px 30px var(--tw-shadow-color, rgba(236,72,153,0.08));
    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
  }
  .shadow-lg {
    --tw-shadow: 0 10px 15px -3px var(--tw-shadow-color, rgb(0 0 0 / 0.1)), 0 4px 6px -4px var(--tw-shadow-color, rgb(0 0 0 / 0.1));
    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
  }
  .shadow-md {
    --tw-shadow: 0 4px 6px -1px var(--tw-shadow-color, rgb(0 0 0 / 0.1)), 0 2px 4px -2px var(--tw-shadow-color, rgb(0 0 0 / 0.1));
    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
  }
  .shadow-sm {
    --tw-shadow: 0 1px 3px 0 var(--tw-shadow-color, rgb(0 0 0 / 0.1)), 0 1px 2px -1px var(--tw-shadow-color, rgb(0 0 0 / 0.1));
    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
  }
  .ring-1 {
    --tw-ring-shadow: var(--tw-ring-inset,) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color, currentcolor);
    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
  }
  .ring-pink-50 {
    --tw-ring-color: var(--color-pink-50);
  }
  .ring-slate-200 {
    --tw-ring-color: var(--color-slate-200);
  }
  .blur {
    --tw-blur: blur(8px);
    filter: var(--tw-blur,) var(--tw-brightness,) var(--tw-contrast,) var(--tw-grayscale,) var(--tw-hue-rotate,) var(--tw-invert,) var(--tw-saturate,) var(--tw-sepia,) var(--tw-drop-shadow,);
  }
  .transition {
    transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, --tw-gradient-from, --tw-gradient-via, --tw-gradient-to, opacity, box-shadow, transform, translate, scale, rotate, filter, -webkit-backdrop-filter, backdrop-filter, display, content-visibility, overlay, pointer-events;
    transition-timing-function: var(--tw-ease, var(--default-transition-timing-function));
    transition-duration: var(--tw-duration, var(--default-transition-duration));
  }
  .transition-all {
    transition-property: all;
    transition-timing-function: var(--tw-ease, var(--default-transition-timing-function));
    transition-duration: var(--tw-duration, var(--default-transition-duration));
  }
  .transition-colors {
    transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, --tw-gradient-from, --tw-gradient-via, --tw-gradient-to;
    transition-timing-function: var(--tw-ease, var(--default-transition-timing-function));
    transition-duration: var(--tw-duration, var(--default-transition-duration));
  }
  .transition-opacity {
    transition-property: opacity;
    transition-timing-function: var(--tw-ease, var(--default-transition-timing-function));
    transition-duration: var(--tw-duration, var(--default-transition-duration));
  }
  .transition-transform {
    transition-property: transform, translate, scale, rotate;
    transition-timing-function: var(--tw-ease, var(--default-transition-timing-function));
    transition-duration: var(--tw-duration, var(--default-transition-duration));
  }
  .duration-200 {
    --tw-duration: 200ms;
    transition-duration: 200ms;
  }
  .duration-300 {
    --tw-duration: 300ms;
    transition-duration: 300ms;
  }
  .duration-500 {
    --tw-duration: 500ms;
    transition-duration: 500ms;
  }
  .duration-700 {
    --tw-duration: 700ms;
    transition-duration: 700ms;
  }
  .ease-in-out {
    --tw-ease: var(--ease-in-out);
    transition-timing-function: var(--ease-in-out);
  }
  .group-hover\:visible {
    &:is(:where(.group):hover *) {
      @media (hover: hover) {
        visibility: visible;
      }
    }
  }
  .group-hover\:scale-105 {
    &:is(:where(.group):hover *) {
      @media (hover: hover) {
        --tw-scale-x: 105%;
        --tw-scale-y: 105%;
        --tw-scale-z: 105%;
        scale: var(--tw-scale-x) var(--tw-scale-y);
      }
    }
  }
  .group-hover\:rotate-180 {
    &:is(:where(.group):hover *) {
      @media (hover: hover) {
        rotate: 180deg;
      }
    }
  }
  .group-hover\:opacity-100 {
    &:is(:where(.group):hover *) {
      @media (hover: hover) {
        opacity: 100%;
      }
    }
  }
  .hover\:scale-105 {
    &:hover {
      @media (hover: hover) {
        --tw-scale-x: 105%;
        --tw-scale-y: 105%;
        --tw-scale-z: 105%;
        scale: var(--tw-scale-x) var(--tw-scale-y);
      }
    }
  }
  .hover\:scale-110 {
    &:hover {
      @media (hover: hover) {
        --tw-scale-x: 110%;
        --tw-scale-y: 110%;
        --tw-scale-z: 110%;
        scale: var(--tw-scale-x) var(--tw-scale-y);
      }
    }
  }
  .hover\:rotate-90 {
    &:hover {
      @media (hover: hover) {
        rotate: 90deg;
      }
    }
  }
  .hover\:bg-neutral-100 {
    &:hover {
      @media (hover: hover) {
        background-color: var(--color-neutral-100);
      }
    }
  }
  .hover\:bg-pink-200 {
    &:hover {
      @media (hover: hover) {
        background-color: var(--color-pink-200);
      }
    }
  }
  .hover\:bg-pink-300 {
    &:hover {
      @media (hover: hover) {
        background-color: var(--color-pink-300);
      }
    }
  }
  .hover\:bg-pink-400 {
    &:hover {
      @media (hover: hover) {
        background-color: var(--color-pink-400);
      }
    }
  }
  .hover\:bg-pink-500 {
    &:hover {
      @media (hover: hover) {
        background-color: var(--color-pink-500);
      }
    }
  }
  .hover\:bg-pink-600 {
    &:hover {
      @media (hover: hover) {
        background-color: var(--color-pink-600);
      }
    }
  }
  .hover\:bg-white {
    &:hover {
      @media (hover: hover) {
        background-color: var(--color-white);
      }
    }
  }
  .hover\:bg-white\/10 {
    &:hover {
      @media (hover: hover) {
        background-color: color-mix(in srgb, #fff 10%, transparent);
        @supports (color: color-mix(in lab, red, red)) {
          background-color: color-mix(in oklab, var(--color-white) 10%, transparent);
        }
      }
    }
  }
  .hover\:bg-white\/40 {
    &:hover {
      @media (hover: hover) {
        background-color: color-mix(in srgb, #fff 40%, transparent);
        @supports (color: color-mix(in lab, red, red)) {
          background-color: color-mix(in oklab, var(--color-white) 40%, transparent);
        }
      }
    }
  }
  .hover\:text-pink-400 {
    &:hover {
      @media (hover: hover) {
        color: var(--color-pink-400);
      }
    }
  }
  .hover\:text-pink-500 {
    &:hover {
      @media (hover: hover) {
        color: var(--color-pink-500);
      }
    }
  }
  .hover\:text-pink-600 {
    &:hover {
      @media (hover: hover) {
        color: var(--color-pink-600);
      }
    }
  }
  .hover\:text-pink-800 {
    &:hover {
      @media (hover: hover) {
        color: var(--color-pink-800);
      }
    }
  }
  .hover\:text-pink-950 {
    &:hover {
      @media (hover: hover) {
        color: var(--color-pink-950);
      }
    }
  }
  .hover\:text-red-700 {
    &:hover {
      @media (hover: hover) {
        color: var(--color-red-700);
      }
    }
  }
  .hover\:text-slate-700 {
    &:hover {
      @media (hover: hover) {
        color: var(--color-slate-700);
      }
    }
  }
  .hover\:text-slate-900 {
    &:hover {
      @media (hover: hover) {
        color: var(--color-slate-900);
      }
    }
  }
  .hover\:text-white {
    &:hover {
      @media (hover: hover) {
        color: var(--color-white);
      }
    }
  }
  .hover\:underline {
    &:hover {
      @media (hover: hover) {
        text-decoration-line: underline;
      }
    }
  }
  .hover\:shadow-\[0_0_30px_rgba\(234\,179\,8\,0\.25\)\] {
    &:hover {
      @media (hover: hover) {
        --tw-shadow: 0 0 30px var(--tw-shadow-color, rgba(234,179,8,0.25));
        box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
      }
    }
  }
  .hover\:shadow-\[0_0_30px_rgba\(236\,72\,153\,0\.25\)\] {
    &:hover {
      @media (hover: hover) {
        --tw-shadow: 0 0 30px var(--tw-shadow-color, rgba(236,72,153,0.25));
        box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
      }
    }
  }
  .hover\:shadow-\[0_0_40px_rgba\(236\,72\,153\,0\.25\)\] {
    &:hover {
      @media (hover: hover) {
        --tw-shadow: 0 0 40px var(--tw-shadow-color, rgba(236,72,153,0.25));
        box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
      }
    }
  }
  .hover\:shadow-\[0_12px_40px_rgba\(210\,199\,229\,0\.2\)\] {
    &:hover {
      @media (hover: hover) {
        --tw-shadow: 0 12px 40px var(--tw-shadow-color, rgba(210,199,229,0.2));
        box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
      }
    }
  }
  .hover\:shadow-xl {
    &:hover {
      @media (hover: hover) {
        --tw-shadow: 0 20px 25px -5px var(--tw-shadow-color, rgb(0 0 0 / 0.1)), 0 8px 10px -6px var(--tw-shadow-color, rgb(0 0 0 / 0.1));
        box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
      }
    }
  }
  .focus\:ring-2 {
    &:focus {
      --tw-ring-shadow: var(--tw-ring-inset,) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color, currentcolor);
      box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
    }
  }
  .focus\:ring-pink-400 {
    &:focus {
      --tw-ring-color: var(--color-pink-400);
    }
  }
  .focus\:ring-pink-500 {
    &:focus {
      --tw-ring-color: var(--color-pink-500);
    }
  }
  .focus\:ring-slate-700 {
    &:focus {
      --tw-ring-color: var(--color-slate-700);
    }
  }
  .focus\:ring-offset-2 {
    &:focus {
      --tw-ring-offset-width: 2px;
      --tw-ring-offset-shadow: var(--tw-ring-inset,) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    }
  }
  .focus\:ring-offset-\[\#a8c4d6\] {
    &:focus {
      --tw-ring-offset-color: #a8c4d6;
    }
  }
  .focus\:ring-offset-pink-100 {
    &:focus {
      --tw-ring-offset-color: var(--color-pink-100);
    }
  }
  .focus\:outline-none {
    &:focus {
      --tw-outline-style: none;
      outline-style: none;
    }
  }
  .sm\:m-8 {
    @media (width >= 40rem) {
      margin: calc(var(--spacing) * 8);
    }
  }
  .sm\:h-48 {
    @media (width >= 40rem) {
      height: calc(var(--spacing) * 48);
    }
  }
  .sm\:h-64 {
    @media (width >= 40rem) {
      height: calc(var(--spacing) * 64);
    }
  }
  .sm\:max-h-\[calc\(100svh-4rem\)\] {
    @media (width >= 40rem) {
      max-height: calc(100svh - 4rem);
    }
  }
  .sm\:min-h-\[3rem\] {
    @media (width >= 40rem) {
      min-height: 3rem;
    }
  }
  .sm\:min-h-\[420px\] {
    @media (width >= 40rem) {
      min-height: 420px;
    }
  }
  .sm\:max-w-5xl {
    @media (width >= 40rem) {
      max-width: var(--container-5xl);
    }
  }
  .sm\:min-w-\[260px\] {
    @media (width >= 40rem) {
      min-width: 260px;
    }
  }
  .sm\:grid-cols-2 {
    @media (width >= 40rem) {
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }
  }
  .sm\:flex-row {
    @media (width >= 40rem) {
      flex-direction: row;
    }
  }
  .sm\:items-center {
    @media (width >= 40rem) {
      align-items: center;
    }
  }
  .sm\:justify-between {
    @media (width >= 40rem) {
      justify-content: space-between;
    }
  }
  .sm\:p-10 {
    @media (width >= 40rem) {
      padding: calc(var(--spacing) * 10);
    }
  }
  .sm\:px-6 {
    @media (width >= 40rem) {
      padding-inline: calc(var(--spacing) * 6);
    }
  }
  .sm\:px-10 {
    @media (width >= 40rem) {
      padding-inline: calc(var(--spacing) * 10);
    }
  }
  .sm\:py-5 {
    @media (width >= 40rem) {
      padding-block: calc(var(--spacing) * 5);
    }
  }
  .sm\:py-12 {
    @media (width >= 40rem) {
      padding-block: calc(var(--spacing) * 12);
    }
  }
  .sm\:py-28 {
    @media (width >= 40rem) {
      padding-block: calc(var(--spacing) * 28);
    }
  }
  .sm\:py-32 {
    @media (width >= 40rem) {
      padding-block: calc(var(--spacing) * 32);
    }
  }
  .sm\:text-2xl {
    @media (width >= 40rem) {
      font-size: var(--text-2xl);
      line-height: var(--tw-leading, var(--text-2xl--line-height));
    }
  }
  .sm\:text-3xl {
    @media (width >= 40rem) {
      font-size: var(--text-3xl);
      line-height: var(--tw-leading, var(--text-3xl--line-height));
    }
  }
  .sm\:text-4xl {
    @media (width >= 40rem) {
      font-size: var(--text-4xl);
      line-height: var(--tw-leading, var(--text-4xl--line-height));
    }
  }
  .sm\:text-5xl {
    @media (width >= 40rem) {
      font-size: var(--text-5xl);
      line-height: var(--tw-leading, var(--text-5xl--line-height));
    }
  }
  .sm\:text-base {
    @media (width >= 40rem) {
      font-size: var(--text-base);
      line-height: var(--tw-leading, var(--text-base--line-height));
    }
  }
  .sm\:text-lg {
    @media (width >= 40rem) {
      font-size: var(--text-lg);
      line-height: var(--tw-leading, var(--text-lg--line-height));
    }
  }
  .sm\:text-xl {
    @media (width >= 40rem) {
      font-size: var(--text-xl);
      line-height: var(--tw-leading, var(--text-xl--line-height));
    }
  }
  .md\:col-span-4 {
    @media (width >= 48rem) {
      grid-column: span 4 / span 4;
    }
  }
  .md\:col-span-8 {
    @media (width >= 48rem) {
      grid-column: span 8 / span 8;
    }
  }
  .md\:mx-0 {
    @media (width >= 48rem) {
      margin-inline: calc(var(--spacing) * 0);
    }
  }
  .md\:flex {
    @media (width >= 48rem) {
      display: flex;
    }
  }
  .md\:hidden {
    @media (width >= 48rem) {
      display: none;
    }
  }
  .md\:aspect-\[3\/2\] {
    @media (width >= 48rem) {
      aspect-ratio: 3/2;
    }
  }
  .md\:aspect-\[3\/4\] {
    @media (width >= 48rem) {
      aspect-ratio: 3/4;
    }
  }
  .md\:h-5 {
    @media (width >= 48rem) {
      height: calc(var(--spacing) * 5);
    }
  }
  .md\:h-20 {
    @media (width >= 48rem) {
      height: calc(var(--spacing) * 20);
    }
  }
  .md\:h-72 {
    @media (width >= 48rem) {
      height: calc(var(--spacing) * 72);
    }
  }
  .md\:min-h-\[520px\] {
    @media (width >= 48rem) {
      min-height: 520px;
    }
  }
  .md\:w-5 {
    @media (width >= 48rem) {
      width: calc(var(--spacing) * 5);
    }
  }
  .md\:w-12 {
    @media (width >= 48rem) {
      width: calc(var(--spacing) * 12);
    }
  }
  .md\:w-72 {
    @media (width >= 48rem) {
      width: calc(var(--spacing) * 72);
    }
  }
  .md\:w-auto {
    @media (width >= 48rem) {
      width: auto;
    }
  }
  .md\:w-full {
    @media (width >= 48rem) {
      width: 100%;
    }
  }
  .md\:min-w-\[320px\] {
    @media (width >= 48rem) {
      min-width: 320px;
    }
  }
  .md\:snap-start {
    @media (width >= 48rem) {
      scroll-snap-align: start;
    }
  }
  .md\:grid-cols-2 {
    @media (width >= 48rem) {
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }
  }
  .md\:grid-cols-12 {
    @media (width >= 48rem) {
      grid-template-columns: repeat(12, minmax(0, 1fr));
    }
  }
  .md\:flex-row {
    @media (width >= 48rem) {
      flex-direction: row;
    }
  }
  .md\:items-center {
    @media (width >= 48rem) {
      align-items: center;
    }
  }
  .md\:items-start {
    @media (width >= 48rem) {
      align-items: flex-start;
    }
  }
  .md\:justify-between {
    @media (width >= 48rem) {
      justify-content: space-between;
    }
  }
  .md\:justify-start {
    @media (width >= 48rem) {
      justify-content: flex-start;
    }
  }
  .md\:gap-0 {
    @media (width >= 48rem) {
      gap: calc(var(--spacing) * 0);
    }
  }
  .md\:gap-8 {
    @media (width >= 48rem) {
      gap: calc(var(--spacing) * 8);
    }
  }
  .md\:space-y-0 {
    @media (width >= 48rem) {
      :where(& > :not(:last-child)) {
        --tw-space-y-reverse: 0;
        margin-block-start: calc(calc(var(--spacing) * 0) * var(--tw-space-y-reverse));
        margin-block-end: calc(calc(var(--spacing) * 0) * calc(1 - var(--tw-space-y-reverse)));
      }
    }
  }
  .md\:space-x-8 {
    @media (width >= 48rem) {
      :where(& > :not(:last-child)) {
        --tw-space-x-reverse: 0;
        margin-inline-start: calc(calc(var(--spacing) * 8) * var(--tw-space-x-reverse));
        margin-inline-end: calc(calc(var(--spacing) * 8) * calc(1 - var(--tw-space-x-reverse)));
      }
    }
  }
  .md\:p-12 {
    @media (width >= 48rem) {
      padding: calc(var(--spacing) * 12);
    }
  }
  .md\:px-2 {
    @media (width >= 48rem) {
      padding-inline: calc(var(--spacing) * 2);
    }
  }
  .md\:px-6 {
    @media (width >= 48rem) {
      padding-inline: calc(var(--spacing) * 6);
    }
  }
  .md\:py-5 {
    @media (width >= 48rem) {
      padding-block: calc(var(--spacing) * 5);
    }
  }
  .md\:py-10 {
    @media (width >= 48rem) {
      padding-block: calc(var(--spacing) * 10);
    }
  }
  .md\:py-12 {
    @media (width >= 48rem) {
      padding-block: calc(var(--spacing) * 12);
    }
  }
  .md\:py-20 {
    @media (width >= 48rem) {
      padding-block: calc(var(--spacing) * 20);
    }
  }
  .md\:py-32 {
    @media (width >= 48rem) {
      padding-block: calc(var(--spacing) * 32);
    }
  }
  .md\:text-left {
    @media (width >= 48rem) {
      text-align: left;
    }
  }
  .md\:text-2xl {
    @media (width >= 48rem) {
      font-size: var(--text-2xl);
      line-height: var(--tw-leading, var(--text-2xl--line-height));
    }
  }
  .md\:text-4xl {
    @media (width >= 48rem) {
      font-size: var(--text-4xl);
      line-height: var(--tw-leading, var(--text-4xl--line-height));
    }
  }
  .md\:text-7xl {
    @media (width >= 48rem) {
      font-size: var(--text-7xl);
      line-height: var(--tw-leading, var(--text-7xl--line-height));
    }
  }
  .md\:text-xl {
    @media (width >= 48rem) {
      font-size: var(--text-xl);
      line-height: var(--tw-leading, var(--text-xl--line-height));
    }
  }
  .md\:tracking-\[0\.6em\] {
    @media (width >= 48rem) {
      --tw-tracking: 0.6em;
      letter-spacing: 0.6em;
    }
  }
  .lg\:sticky {
    @media (width >= 64rem) {
      position: sticky;
    }
  }
  .lg\:top-24 {
    @media (width >= 64rem) {
      top: calc(var(--spacing) * 24);
    }
  }
  .lg\:h-80 {
    @media (width >= 64rem) {
      height: calc(var(--spacing) * 80);
    }
  }
  .lg\:w-96 {
    @media (width >= 64rem) {
      width: calc(var(--spacing) * 96);
    }
  }
  .lg\:min-w-\[360px\] {
    @media (width >= 64rem) {
      min-width: 360px;
    }
  }
  .lg\:grid-cols-2 {
    @media (width >= 64rem) {
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }
  }
  .lg\:grid-cols-3 {
    @media (width >= 64rem) {
      grid-template-columns: repeat(3, minmax(0, 1fr));
    }
  }
  .lg\:flex-row {
    @media (width >= 64rem) {
      flex-direction: row;
    }
  }
  .lg\:px-8 {
    @media (width >= 64rem) {
      padding-inline: calc(var(--spacing) * 8);
    }
  }
  .lg\:text-5xl {
    @media (width >= 64rem) {
      font-size: var(--text-5xl);
      line-height: var(--tw-leading, var(--text-5xl--line-height));
    }
  }
  .lg\:tracking-\[0\.8em\] {
    @media (width >= 64rem) {
      --tw-tracking: 0.8em;
      letter-spacing: 0.8em;
    }
  }
}
@layer theme {
  :root {
    --color-primary: #FF80AB;
    --color-primary-dark: hsl(359, 64%, 60%);
    --color-primary-light: #e14c51;
    --color-secondary: #FF5C8D;
    --color-secondary-dark: #b70585;
    --color-secondary-light: #9e3385;
    --color-surface: #FAF8F6;
    --color-surface-dark: #E8E2DD;
    --color-neutral: #A5948B;
    --color-neutral-dark: #8F7F75;
    --color-neutral-light: #DCD6D0;
    --color-accent: #F9C0AF;
    --color-accent-dark: #E8A085;
    --color-accent-light: #FCE4D9;
    --color-lavender: #D4B5D8;
    --color-lavender-light: #E8D5EB;
    --color-yellow: #F9D71C;
    --font-heading: 'Playfair Display', serif;
    --font-body: 'Lato', sans-serif;
    --font-script: 'Great Vibes', cursive;
    --font-display: 'Tinos', serif;
    --font-secondary: 'Unna', serif;
    --shadow-soft: 0 4px 20px rgba(165, 148, 139, 0.1);
    --shadow-medium: 0 8px 30px rgba(165, 148, 139, 0.15);
    --shadow-strong: 0 12px 40px rgba(165, 148, 139, 0.2);
    --gradient-primary: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
    --gradient-secondary: linear-gradient(135deg, var(--color-secondary), var(--color-surface));
    --gradient-background: linear-gradient(135deg, var(--color-neutral-light), var(--color-surface));
  }
}
@layer base {
  :root {
    color-scheme: only light;
  }
  body {
    background-color: var(--color-surface);
    color: var(--color-neutral);
    font-family: var(--font-body);
    line-height: 1.65;
    font-weight: 400;
  }
  h1, h2, h3, h4, h5, h6 {
    font-family: var(--font-heading);
    color: var(--color-neutral-dark);
    font-weight: 500;
    line-height: 1.35;
  }
  h1 {
    font-size: 2.5rem;
  }
  h2 {
    font-size: 2rem;
  }
  h3 {
    font-size: 1.75rem;
  }
  h4 {
    font-size: 1.5rem;
  }
  h5 {
    font-size: 1.25rem;
  }
  h6 {
    font-size: 1.125rem;
  }
  *:focus {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
  }
  ::-webkit-scrollbar {
    width: 8px;
  }
  ::-webkit-scrollbar-track {
    background: var(--color-neutral-light);
  }
  ::-webkit-scrollbar-thumb {
    background: var(--color-primary);
    border-radius: 4px;
  }
  ::-webkit-scrollbar-thumb:hover {
    background: var(--color-secondary);
  }
}
@layer components {
  .btn-primary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 9999px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    color: #fff;
    background-image: var(--gradient-primary);
    box-shadow: var(--shadow-soft);
    transition: transform 150ms ease, box-shadow 200ms ease, background-image 200ms ease;
  }
  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-medium);
    background-image: linear-gradient(135deg, var(--color-primary-dark), var(--color-secondary-dark));
  }
  .btn-outline {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 9999px;
    border: 2px solid var(--color-primary);
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    color: var(--color-primary);
    transition: background-color 200ms ease, color 200ms ease, transform 150ms ease;
  }
  .btn-outline:hover {
    background-color: var(--color-primary);
    color: #fff;
    transform: translateY(-1px);
  }
  .btn-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    border: 1px solid var(--color-neutral);
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    color: var(--color-neutral-dark);
    background-color: transparent;
    transition: background-color 200ms ease, color 200ms ease;
  }
  .btn-secondary:hover {
    background-color: var(--color-neutral);
    color: #fff;
  }
  .card {
    border-radius: 24px;
    border: 1px solid var(--color-neutral-light);
    background-color: #fff;
    padding: 1.5rem;
    box-shadow: var(--shadow-soft);
    transition: transform 150ms ease, box-shadow 200ms ease;
  }
  .card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-medium);
  }
  .card-soft {
    border-radius: 24px;
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.9);
    box-shadow: var(--shadow-soft);
  }
  .modal-panel {
    position: fixed;
    inset: 0;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    background-color: rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(8px);
    z-index: 60;
  }
  .modal-panel.is-open {
    display: flex;
  }
  .modal-backdrop {
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.45);
  }
  .modal-surface {
    position: relative;
    z-index: 10;
    width: 100%;
    max-width: 48rem;
    border-radius: 20px;
    overflow: hidden;
    background-color: #fff;
    box-shadow: var(--shadow-strong);
  }
  .modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding: 1.25rem 1.5rem;
    background: var(--gradient-primary);
    color: #fff;
  }
  .modal-body {
    padding: 1.5rem;
  }
  .modal-footer {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    padding: 1.5rem;
    border-top: 1px solid var(--color-neutral-light);
    background-color: #fff;
  }
  .close-btn {
    border: none;
    background: transparent;
    color: rgba(255, 255, 255, 0.75);
    font-size: 1.75rem;
    line-height: 1;
    cursor: pointer;
    transition: color 150ms ease;
  }
  .close-btn:hover {
    color: #fff;
  }
  .headline {
    font-size: 1.75rem;
    font-weight: 600;
    color: inherit;
  }
  .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.4em;
    font-size: 0.75rem;
    color: var(--color-neutral-dark);
  }
  .form-input {
    width: 100%;
    border-radius: 12px;
    border: 2px solid var(--color-neutral-light);
    background-color: #fff;
    padding: 0.75rem 1rem;
    color: var(--color-neutral-dark);
    transition: border-color 200ms ease, box-shadow 200ms ease;
  }
  .form-input:focus {
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(247, 198, 199, 0.15);
    outline: none;
  }
  .form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: var(--color-neutral-dark);
  }
  .product-card {
    display: flex;
    flex-direction: column;
    overflow: hidden;
    border-radius: 20px;
    border: 1px solid var(--color-neutral-light);
    background-color: #fff;
    box-shadow: var(--shadow-soft);
    transition: transform 150ms ease, box-shadow 200ms ease;
  }
  .product-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-medium);
  }
  .wishlist-btn {
    border: none;
    border-radius: 9999px;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 0.75rem;
    color: var(--color-accent);
    box-shadow: 0 8px 20px rgba(249, 192, 175, 0.15);
    transition: background-color 150ms ease, transform 150ms ease;
    cursor: pointer;
  }
  .wishlist-btn:hover {
    background-color: #fff;
    transform: translateY(-2px);
  }
}
@layer utilities {
  .font-Tinos {
    font-family: var(--font-display);
  }
  .font-Unna-regular {
    font-family: var(--font-secondary);
    font-weight: 400;
  }
  .font-Unna-bold {
    font-family: var(--font-secondary);
    font-weight: 700;
  }
  .font-GreatVibes {
    font-family: var(--font-script);
  }
  .bg-candy-cream {
    background-color: var(--color-surface);
  }
  .bg-candy-pink {
    background-color: var(--color-accent);
  }
  .bg-candy-pink-light {
    background-color: var(--color-accent-light);
  }
  .bg-candy-lavender {
    background-color: var(--color-lavender);
  }
  .bg-candy-lavender-light {
    background-color: var(--color-lavender-light);
  }
  .bg-candy-mint {
    background-color: #a8c4d6;
  }
  .text-candy-peach {
    color: var(--color-accent);
  }
  .text-candy-peach-dark {
    color: var(--color-accent-dark);
  }
  .text-primary {
    color: var(--color-primary);
  }
  .text-secondary {
    color: var(--color-secondary);
  }
  .text-neutral {
    color: var(--color-neutral);
  }
  .text-dark {
    color: var(--color-neutral-dark);
  }
  .border-candy-lavender {
    border-color: var(--color-lavender);
  }
  .border-candy-lavender-light {
    border-color: var(--color-lavender-light);
  }
  .border-candy-peach {
    border-color: var(--color-accent);
  }
  .border-light {
    border-color: var(--color-neutral-light);
  }
  .hover\:bg-candy-lavender-light:hover {
    background-color: var(--color-lavender-light);
  }
  .hover\:bg-candy-peach:hover {
    background-color: var(--color-accent);
  }
  .hover\:bg-candy-cream:hover {
    background-color: var(--color-surface);
  }
  .hover\:text-candy-peach:hover {
    color: var(--color-accent);
  }
  .hover\:text-candy-peach-dark:hover {
    color: var(--color-accent-dark);
  }
  .hover\:text-white:hover {
    color: #fff;
  }
  .focus\:ring-candy-peach:focus {
    --tw-ring-color: var(--color-accent);
  }
  .focus\:ring-candy-yellow:focus {
    --tw-ring-color: var(--color-yellow);
  }
  .focus\:ring-offset-candy-cream:focus {
    --tw-ring-offset-color: var(--color-surface);
  }
  .animate-glow {
    animation: glow 2s ease-in-out infinite alternate;
  }
}
@layer utilities {
  @keyframes glow {
    from {
      text-shadow: 0 0 10px rgba(249, 192, 175, 0.5);
    }
    to {
      text-shadow: 0 0 20px rgba(249, 192, 175, 0.8);
    }
  }
}
@property --tw-translate-x {
  syntax: "*";
  inherits: false;
  initial-value: 0;
}
@property --tw-translate-y {
  syntax: "*";
  inherits: false;
  initial-value: 0;
}
@property --tw-translate-z {
  syntax: "*";
  inherits: false;
  initial-value: 0;
}
@property --tw-scale-x {
  syntax: "*";
  inherits: false;
  initial-value: 1;
}
@property --tw-scale-y {
  syntax: "*";
  inherits: false;
  initial-value: 1;
}
@property --tw-scale-z {
  syntax: "*";
  inherits: false;
  initial-value: 1;
}
@property --tw-rotate-x {
  syntax: "*";
  inherits: false;
}
@property --tw-rotate-y {
  syntax: "*";
  inherits: false;
}
@property --tw-rotate-z {
  syntax: "*";
  inherits: false;
}
@property --tw-skew-x {
  syntax: "*";
  inherits: false;
}
@property --tw-skew-y {
  syntax: "*";
  inherits: false;
}
@property --tw-scroll-snap-strictness {
  syntax: "*";
  inherits: false;
  initial-value: proximity;
}
@property --tw-space-y-reverse {
  syntax: "*";
  inherits: false;
  initial-value: 0;
}
@property --tw-space-x-reverse {
  syntax: "*";
  inherits: false;
  initial-value: 0;
}
@property --tw-border-style {
  syntax: "*";
  inherits: false;
  initial-value: solid;
}
@property --tw-gradient-position {
  syntax: "*";
  inherits: false;
}
@property --tw-gradient-from {
  syntax: "<color>";
  inherits: false;
  initial-value: #0000;
}
@property --tw-gradient-via {
  syntax: "<color>";
  inherits: false;
  initial-value: #0000;
}
@property --tw-gradient-to {
  syntax: "<color>";
  inherits: false;
  initial-value: #0000;
}
@property --tw-gradient-stops {
  syntax: "*";
  inherits: false;
}
@property --tw-gradient-via-stops {
  syntax: "*";
  inherits: false;
}
@property --tw-gradient-from-position {
  syntax: "<length-percentage>";
  inherits: false;
  initial-value: 0%;
}
@property --tw-gradient-via-position {
  syntax: "<length-percentage>";
  inherits: false;
  initial-value: 50%;
}
@property --tw-gradient-to-position {
  syntax: "<length-percentage>";
  inherits: false;
  initial-value: 100%;
}
@property --tw-leading {
  syntax: "*";
  inherits: false;
}
@property --tw-font-weight {
  syntax: "*";
  inherits: false;
}
@property --tw-tracking {
  syntax: "*";
  inherits: false;
}
@property --tw-shadow {
  syntax: "*";
  inherits: false;
  initial-value: 0 0 #0000;
}
@property --tw-shadow-color {
  syntax: "*";
  inherits: false;
}
@property --tw-shadow-alpha {
  syntax: "<percentage>";
  inherits: false;
  initial-value: 100%;
}
@property --tw-inset-shadow {
  syntax: "*";
  inherits: false;
  initial-value: 0 0 #0000;
}
@property --tw-inset-shadow-color {
  syntax: "*";
  inherits: false;
}
@property --tw-inset-shadow-alpha {
  syntax: "<percentage>";
  inherits: false;
  initial-value: 100%;
}
@property --tw-ring-color {
  syntax: "*";
  inherits: false;
}
@property --tw-ring-shadow {
  syntax: "*";
  inherits: false;
  initial-value: 0 0 #0000;
}
@property --tw-inset-ring-color {
  syntax: "*";
  inherits: false;
}
@property --tw-inset-ring-shadow {
  syntax: "*";
  inherits: false;
  initial-value: 0 0 #0000;
}
@property --tw-ring-inset {
  syntax: "*";
  inherits: false;
}
@property --tw-ring-offset-width {
  syntax: "<length>";
  inherits: false;
  initial-value: 0px;
}
@property --tw-ring-offset-color {
  syntax: "*";
  inherits: false;
  initial-value: #fff;
}
@property --tw-ring-offset-shadow {
  syntax: "*";
  inherits: false;
  initial-value: 0 0 #0000;
}
@property --tw-blur {
  syntax: "*";
  inherits: false;
}
@property --tw-brightness {
  syntax: "*";
  inherits: false;
}
@property --tw-contrast {
  syntax: "*";
  inherits: false;
}
@property --tw-grayscale {
  syntax: "*";
  inherits: false;
}
@property --tw-hue-rotate {
  syntax: "*";
  inherits: false;
}
@property --tw-invert {
  syntax: "*";
  inherits: false;
}
@property --tw-opacity {
  syntax: "*";
  inherits: false;
}
@property --tw-saturate {
  syntax: "*";
  inherits: false;
}
@property --tw-sepia {
  syntax: "*";
  inherits: false;
}
@property --tw-drop-shadow {
  syntax: "*";
  inherits: false;
}
@property --tw-drop-shadow-color {
  syntax: "*";
  inherits: false;
}
@property --tw-drop-shadow-alpha {
  syntax: "<percentage>";
  inherits: false;
  initial-value: 100%;
}
@property --tw-drop-shadow-size {
  syntax: "*";
  inherits: false;
}
@property --tw-duration {
  syntax: "*";
  inherits: false;
}
@property --tw-ease {
  syntax: "*";
  inherits: false;
}
@layer properties {
  @supports ((-webkit-hyphens: none) and (not (margin-trim: inline))) or ((-moz-orient: inline) and (not (color:rgb(from red r g b)))) {
    *, ::before, ::after, ::backdrop {
      --tw-translate-x: 0;
      --tw-translate-y: 0;
      --tw-translate-z: 0;
      --tw-scale-x: 1;
      --tw-scale-y: 1;
      --tw-scale-z: 1;
      --tw-rotate-x: initial;
      --tw-rotate-y: initial;
      --tw-rotate-z: initial;
      --tw-skew-x: initial;
      --tw-skew-y: initial;
      --tw-scroll-snap-strictness: proximity;
      --tw-space-y-reverse: 0;
      --tw-space-x-reverse: 0;
      --tw-border-style: solid;
      --tw-gradient-position: initial;
      --tw-gradient-from: #0000;
      --tw-gradient-via: #0000;
      --tw-gradient-to: #0000;
      --tw-gradient-stops: initial;
      --tw-gradient-via-stops: initial;
      --tw-gradient-from-position: 0%;
      --tw-gradient-via-position: 50%;
      --tw-gradient-to-position: 100%;
      --tw-leading: initial;
      --tw-font-weight: initial;
      --tw-tracking: initial;
      --tw-shadow: 0 0 #0000;
      --tw-shadow-color: initial;
      --tw-shadow-alpha: 100%;
      --tw-inset-shadow: 0 0 #0000;
      --tw-inset-shadow-color: initial;
      --tw-inset-shadow-alpha: 100%;
      --tw-ring-color: initial;
      --tw-ring-shadow: 0 0 #0000;
      --tw-inset-ring-color: initial;
      --tw-inset-ring-shadow: 0 0 #0000;
      --tw-ring-inset: initial;
      --tw-ring-offset-width: 0px;
      --tw-ring-offset-color: #fff;
      --tw-ring-offset-shadow: 0 0 #0000;
      --tw-blur: initial;
      --tw-brightness: initial;
      --tw-contrast: initial;
      --tw-grayscale: initial;
      --tw-hue-rotate: initial;
      --tw-invert: initial;
      --tw-opacity: initial;
      --tw-saturate: initial;
      --tw-sepia: initial;
      --tw-drop-shadow: initial;
      --tw-drop-shadow-color: initial;
      --tw-drop-shadow-alpha: 100%;
      --tw-drop-shadow-size: initial;
      --tw-duration: initial;
      --tw-ease: initial;
    }
  }
}
CSS;
  }
}
?>