module.exports = {
	default: {
		options: {
			style:     'expanded',
			sourcemap: 'none',
			require:   'susy'
		},
		files: {
			'style.css':                    'assets/css/sass/project.scss',
			'editor-style.css':             'assets/css/sass/editor-style.scss',
			'admin-style.css':              'assets/css/admin/main.scss'
		}
	}
};
