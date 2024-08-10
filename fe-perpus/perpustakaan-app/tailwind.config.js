/** @type {import('tailwindcss').Config} */ 

module.exports = {
	content: [
		'./index.html',
		'./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}',
		'./node_modules/preline/preline.js',
		'node_modules/preline/dist/*.js'
	],
	darkMode: 'class',
	theme: {
		extend: {},
	},
	plugins: [
		require('preline/plugin.js'),
	],
}