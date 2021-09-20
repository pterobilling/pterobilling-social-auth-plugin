import 'react-i18next'
import socialAuthLocale from '../../lang/en.json'

declare module 'react-i18next' {
  interface CustomTypeOptions {
    resources: {
      socialAuth: typeof socialAuthLocale
    }
  }
}
