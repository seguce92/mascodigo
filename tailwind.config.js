const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  theme: {
    extend: {},
    pagination: {
      color: '#718096',
      linkFirst: 'mr-6 border rounded',
      linkSecond: 'rounded-l border-l',
      linkBeforeLast: 'rounded-r border-r',
      linkLast: 'ml-6 border rounded'
    },
    customForms: {
      horizontalPadding: defaultTheme.spacing[3],
      verticalPadding: defaultTheme.spacing[2],
      lineHeight: defaultTheme.lineHeight.normal,
      fontSize: defaultTheme.fontSize.base,
      borderColor: defaultTheme.borderColor.default,
      borderWidth: defaultTheme.borderWidth.default,
      borderRadius: defaultTheme.borderRadius.default,
      backgroundColor: defaultTheme.colors.white,
      focusBorderColor: defaultTheme.colors.blue[400],
      focusBoxShadow: defaultTheme.boxShadow.outline,
      boxShadow: defaultTheme.boxShadow.none,
      checkboxSize: '1em',
      radioSize: '1em',
      checkboxIcon: `<svg viewBox="0 0 16 16" fill="#fff" xmlns="http://www.w3.org/2000/svg"><path d="M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z"/></svg>`,
      radioIcon: `<svg viewBox="0 0 16 16" fill="#fff" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="3"/></svg>`,
      checkedColor: defaultTheme.colors.blue[500],
      selectIcon: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="${defaultTheme.colors.gray[500]}"><path d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z"/></svg>`,
      selectIconOffset: defaultTheme.spacing[2],
      selectIconSize: '1.5em',
    }
  },
  variants: {
    flexWrap: ['responsive', 'hover', 'focus'],
    pointerEvents: ['responsive', 'hover', 'focus'],
  },
  plugins: [
    require('tailwindcss-plugins/pagination'),
    require('@tailwindcss/custom-forms')
  ]
}
