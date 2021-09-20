const mix = require('laravel-mix')
const path = require('path')
const ESLintPlugin = require('eslint-webpack-plugin')

/*
 * Configure Options
 */
mix.options({
  postCss: [require('autoprefixer'), require('tailwindcss')],
})

mix.setPublicPath('public')

// Aliases
mix.alias({
  '@': path.join(__dirname, 'resources/js'),
  '@p': path.join(__dirname, '../../pterobilling/resources/js/common'),
  '@p/typings*': path.join(__dirname, '../../pterobilling/resources/js/typings'),
})

// ESLint / Prettier
mix.webpackConfig({
  plugins: [
    new ESLintPlugin({
      overrideConfigFile: path.resolve(__dirname, '.eslintrc.js'),
      context: path.resolve(__dirname, 'resources/js'),
      extensions: ['ts', 'tsx'],
      fix: true,
      threads: true,
    }),
  ],
  output: {
    library: 'socialAuthPlugin',
    libraryTarget: 'window',
    clean: true,
  },
})

mix.react()

if (mix.inProduction()) {
  mix.version()
} else {
  mix.sourceMaps()
}

mix
  .ts('./resources/js/index.ts', 'public/social-auth.js')
  .sass('./resources/css/index.scss', 'public/social-auth.css')
