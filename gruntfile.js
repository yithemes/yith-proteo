module.exports = function(grunt) {
	
	grunt.initConfig({
		sass: {
			dist: {
				files: {
					'style.css': 'sass/style.scss',
				}
			}
		}
	});
	
	
	grunt.loadNpmTasks('grunt-contrib-sass');
	
	grunt.registerTask('default', ['sass']);
	
};