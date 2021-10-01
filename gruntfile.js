module.exports = function(grunt) {
	
	grunt.initConfig({
		sass: {
			dist: {
				files: {
					'style.css': 'sass/style.scss',
					'responsive.css': 'sass/responsive.scss',
				},
				sourceComments: true
			}
		},
		uglify: {
			my_target: {
				files: {
					'js/navigation.min.js': 'js/navigation.js',
					'js/skip-link-focus-fix.min.js': 'js/skip-link-focus-fix.js',
					'js/theme.min.js': 'js/theme.js',
					'inc/customizer/customizer-controls.min.js': 'inc/customizer/customizer-controls.js',
					'inc/customizer/customizer.min.js': 'inc/customizer/customizer.js',
					'inc/customizer/custom-controls/spacing-control.min.js': 'inc/customizer/custom-controls/spacing-control.js',
					'inc/customizer/custom-controls/font-selector-assets/js/select.min.js': 'inc/customizer/custom-controls/font-selector-assets/js/select.js',
				}
			}
		},
		watch: {
			css: {
				files: ['sass/**/*.scss'],
				tasks: ['sass'],
				options: {
					livereload: true,
				},
			},
		},
	});
	
	
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	
	grunt.registerTask('default', ['sass', 'uglify']);
	
};
